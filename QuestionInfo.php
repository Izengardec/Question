<?php


class QuestionInfo
{
    public $value1 = array();
    public $value2 = array();
    public $value3 = array();
    public function setValue1($i){
        array_push($this->value1, $i);
    }
    public function setValue2($i){
        array_push($this->value2, $i);
    }
    public function setValue3($i){
        array_push($this->value3, $i);
    }
}