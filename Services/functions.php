<?php

class functions
{
    public function stringIsValid($str){
        if(strlen($str)<3) return false;
        $illegal=array("="," ","(",")","'",'"');
        foreach($illegal as $v)
            if(strpos($str, $v)!==false)return false;
        return true;
    }

    public function strongPassword($password){
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialchars = preg_match('@[^\w]@', $password);

        if(!$uppercase || !$lowercase || !$number || !$specialchars || strlen($password) < 8) {
            return true;
        }
        else{
            return false;
        }
    }
}