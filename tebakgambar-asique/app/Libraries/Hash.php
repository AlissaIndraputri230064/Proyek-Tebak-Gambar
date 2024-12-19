<?php

namespace App\Libraries;

class Hash 
{
    public static function encrypt($password) 
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function check($password, $dbUserPassword)
    {
        if(password_verify($password, $dbUserPassword))
        {
            return true;
        }

        return false;
    }
}

