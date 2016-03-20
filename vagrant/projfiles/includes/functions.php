<?php

    function render($template, $values = []) {
        // if template exists, render it
        if (file_exists("../templates/$template")) {
            
            // extract variables into local scope
            extract($values);
            
            // render template
            require("../templates/$template");

        }

        // else err
        else
            trigger_error("Invalid template: $template", E_USER_ERROR);
            
    }


?>
