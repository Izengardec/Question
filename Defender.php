<?php


class Defender
{
    public function defend($string){
        $string = addslashes($string);
        $string = htmlspecialchars($string);
        return $string;
    }
}