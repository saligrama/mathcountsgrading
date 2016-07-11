<?php

class Token {

    const   T_NUMBER                  = 1, // int or float
            T_SYMBOL                  = 2, // symbols like pi or e
            T_FUNCTION                = 3, // functions like sqrt()
            T_COMMUTATIVE_OPERATOR    = 4, // addition + or multiplication *
            T_NONCOMMUTATIVE_OPERATOR = 5, // subtraction - or division /
            T_EXPONENT                = 6; // exponent operator

    public $type, $value, $argc = 0;

    public function __construct($type, $value) {

        $this->type = $type;
        $this->value = $value;

    }

}

?>
