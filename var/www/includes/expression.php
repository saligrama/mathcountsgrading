<?php

$operators = [
    '+' => ['precedence' => 0, 'associativity' => 'left'],
    '-' => ['precedence' => 0, 'associativity' => 'left'],
    '*' => ['precedence' => 1, 'associativity' => 'left'],
    '/' => ['precedence' => 1, 'associativity' => 'left'],
    '%' => ['precedence' => 1, 'associativity' => 'left'],
    '^' => ['precedence' => 2, 'associativity' => 'right'],
];

function format($input) {

    $implicit_constfunc_regex = "/(\d)(PI|E|SQRT|ABS|ACOS|COS|ATAN|TAN|ASIN|SIN|CEIL|FLOOR|LOG|LN)/";
    $implicit_constfunc_replace="$1 * $2";

    $ops = ['+', '*', '-', '/', '^', '%'];
    for ($i = 0; $i < 6; $i++) {

        $opspace_regex = "/(\d|PI|E|\))\\" . $ops[$i] . "(\d|PI|E|SQRT|ABS|ACOS|COS|ATAN|TAN|ASIN|SIN|CEIL|FLOOR|LOG|LN)/";
        $opspace_replace = "$1 " . $ops[$i] . " $2";
        $input = preg_replace($opspace_regex, $opspace_replace, $input);

    }

    return preg_replace($implicit_constfunc_regex, $implicit_constfunc_replace, $input);

}

function tokenize($input)
{
    return array_map('trim', explode(' ', preg_replace('#[ ]+#', ' ', format($input))));
}

function shunting_yard(array $tokens, array $operators)
{
    $stack = new \SplStack();
    $output = new \SplQueue();
    foreach (array_reverse($tokens) as $token) {
        if (is_numeric($token) || $token == "PI" || $token == "E" ||
            preg_match("/(SQRT|ABS|ACOS|COS|ATAN|TAN|ASIN|SIN|CEIL|FLOOR|LOG|LN)\(\d\.?\d*\)/", $token)) {
            $output->enqueue($token);
        } elseif (isset($operators[$token])) {
            $o1 = $token;
            while (has_operator($stack, $operators) && ($o2 = $stack->top()) && has_lower_precedence($o1, $o2, $operators)) {
                $output->enqueue($stack->pop());
            }
            $stack->push($o1);
        } elseif ('(' === $token) {
            $stack->push($token);
        } elseif (')' === $token) {
            while (count($stack) > 0 && '(' !== $stack->top()) {
                $output->enqueue($stack->pop());
            }
            if (count($stack) === 0) {
                throw new \InvalidArgumentException(sprintf('Mismatched parenthesis in input: %s', json_encode($tokens)));
            }
            // pop off '('
            $stack->pop();
        } else {
            throw new \InvalidArgumentException(sprintf('Invalid token: %s', $token));
        }
    }
    while (has_operator($stack, $operators)) {
        $output->enqueue($stack->pop());
    }
    if (count($stack) > 0) {
        throw new \InvalidArgumentException(sprintf('Mismatched parenthesis or misplaced number in input: %s', json_encode($tokens)));
    }

    $i = 0;
    $pn = array_reverse(iterator_to_array($output));

    $operators_meta = array();

    while (isset($pn[$i])) {

        if (isset($operators[$pn[$i]])) {

            $operators_meta[] = array("type" => "operator", "id" => $i, "symbol" => $pn[$i], "op1_ndx" => find_operand_ndx($i, $pn, 1, $operators), "op2_ndx" => find_operand_ndx($i, $pn, 2, $operators));

        }

        else {
            $operators_meta[] = array("type" => "operand", "id" => $i, "value" => $pn[$i]);
        }

        $i++;

    }

    return $operators_meta;
}

function find_operand_ndx($operator_ndx, $arr, $opno, $operators) {

    $cur = $operator_ndx;

    if ($opno == 1)
        return $cur + 1;
    else {
        if (isset($operators[$arr[$cur + 1]]))
            return find_operand_ndx($cur + 1, $arr, 2, $operators) + 1;
        else
            return $cur + 2;
    }

}

$expr1_arr = shunting_yard(tokenize($expr1), $operators);
$expr2_arr = shunting_yard(tokenize($expr2), $operators);

echo compare($expr1_arr, $expr2_arr) ? 1 : 0;
echo "\n";

function compare($arr1, $arr2) {

    if ($arr1 == $arr2)
        return true;

    elseif (count($arr1) != count($arr2))
        return false;

    else {

        $compares = [];
        return evaluateCompares(block_compare($arr1, $arr2, $compares));

    }

}
// compare simplest order operations => $e1, $e2 each have one unary operator and two constant/numerical operands
function simple_compare($e1, $e2) {

    if ($e1[0]["symbol"] == $e2[0]["symbol"]) {
        if ($e1[1]["value"] == $e2[1]["value"] && $e1[2]["value"] == $e2[2]["value"]) {
            return true;
        }
        elseif (($e1[0]["symbol"] == "+" || $e1[0]["symbol"] == "*") && $e1[1] == $e2[2] && $e1[2] == $e2[1]) {
            return true;
        }
        else {
            return false;
        }

    }

}

// compare blocks (PN expressions with simple PN expressions within, like + * 9 PI 4)
function block_compare($e1, $e2, $compares) {

    // find blocks
    $e1_op1 = array_slice($e1, $e1[0]["op1_ndx"], $e1[0]["op2_ndx"] - $e1[0]["op1_ndx"]);
    $e1_op2 = array_slice($e1, $e1[0]["op2_ndx"]);
    $e2_op1 = array_slice($e2, $e2[0]["op1_ndx"], $e2[0]["op2_ndx"] - $e2[0]["op1_ndx"]);
    $e2_op2 = array_slice($e2, $e2[0]["op2_ndx"]);

    $e1_op1_isblock = (count($e1_op1) > 1) ? 1 : 0;
    $e1_op2_isblock = (count($e1_op2) > 1) ? 1 : 0;
    $e2_op1_isblock = (count($e2_op1) > 1) ? 1 : 0;
    $e2_op2_isblock = (count($e2_op2) > 1) ? 1 : 0;

    $e1_operator = $e1[0];
    $e2_operator = $e2[0];

    if ($e1_operator["symbol"] != $e2_operator["symbol"]) {

        $compares[] = 0;

    }

    else {

        if ($e1_op1_isblock && $e2_op1_isblock && simple_compare($e1_op1, $e2_op1)) {

            $compares[] = simple_compare($e1_op1, $e2_op1) ? 1 : 0;

            if ($e1_op2_isblock && $e2_op2_isblock) {

                $compares[] = simple_compare($e1_op2, $e2_op2) ? 1 : 0;

            }
            elseif(!$e1_op2_isblock && !$e2_op2_isblock) {

                $compares[] = ($e1_op2[0]["value"] == $e2_op2[0]["value"]) ? 1 : 0;

            }
            else {
                $compares[] = 0;
            }

        }

        elseif (($e1_operator["symbol"] == "+" || $e1_operator["symbol"] == "*") && $e1_op1_isblock && $e2_op2_isblock && simple_compare($e1_op1, $e2_op2)) {

            $compares[] = simple_compare($e1_op1, $e2_op2) ? 1 : 0;

            if ($e1_op2_isblock && $e2_op1_isblock) {

                $compares[] = simple_compare($e1_op2, $e2_op1) ? 1 : 0;

            }
            elseif(!$e1_op2_isblock && !$e2_op1_isblock) {

                $compares[] = ($e1_op2[0]["value"] == $e2_op1[0]["value"]) ? 1 : 0;

            }
            else {
                $compares[] = 0;
            }

        }

        elseif (!$e1_op1_isblock && !$e2_op1_isblock) {

            $compares[] = ($e1_op1[0]["value"] == $e2_op1[0]["value"]) ? 1 : 0;

            if ($e1_op2_isblock && $e2_op2_isblock) {

                $compares[] = simple_compare($e1_op2, $e2_op2) ? 1 : 0;

            }
            elseif(!$e1_op2_isblock && !$e2_op2_isblock) {

                $compares[] = ($e1_op2[0]["value"] == $e2_op2[0]["value"]) ? 1 : 0;

            }
            else {
                $compares[] = 0;
            }

        }

        elseif (($e1_operator["symbol"] == "+" || $e1_operator["symbol"] == "*") && !$e1_op1_isblock && !$e2_op2_isblock) {

            $compares[] = ($e1_op1[0]["value"] == $e2_op2[0]["value"]) ? 1 : 0;

            if ($e1_op2_isblock && $e2_op1_isblock) {

                $compares[] = simple_compare($e1_op2, $e2_op1) ? 1 : 0;

            }
            elseif(!$e1_op2_isblock && !$e2_op1_isblock) {

                $compares[] = ($e1_op2[0]["value"] == $e2_op1[0]["value"]) ? 1 : 0;

            }
            else {
                $compares[] = 0;
            }

        }

        else {
            $compares[] = 0;
        }

    }

    return $compares;

}

function evaluateCompares($compares) {

    $i=0;
    while (isset($compares[$i])) {

        if (!$compares[$i]) {
            return false;
            break;
        }
        $i++;

    }

    return true;

}

function integer_currency_compare($c1, $c2) {

    if ($c1 == $c2 || $c1 . '00' == $c2)
        return true;
    else
        return false;
        
}

function has_operator(\SplStack $stack, array $operators)
{
    return count($stack) > 0 && ($top = $stack->top()) && isset($operators[$top]);
}

function has_lower_precedence($o1, $o2, array $operators)
{
    $op1 = $operators[$o1];
    $op2 = $operators[$o2];
    return ('left' === $op1['associativity'] && $op1['precedence'] === $op2['precedence']) || $op1['precedence'] < $op2['precedence'];
}


?>
