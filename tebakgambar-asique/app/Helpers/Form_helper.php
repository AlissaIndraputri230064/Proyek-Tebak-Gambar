<?php

    function display_form_errors($validation, $field) 
    {
        return $validation->hasError($field) ? $validation->getError($field) : '';
    }


