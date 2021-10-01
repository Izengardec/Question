<?php
require_once 'model.php';
require_once 'QuestionInfo.php';
class CreateAModel extends Model{
    public function getOpenQ($idQ): QuestionInfo
    {
        $query="SELECT  answer,  texts_question.text FROM `answers_open`,texts_question WHERE idQuestion=$idQ and texts_question.id=$idQ";
        $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
        $arr = new QuestionInfo();
        for ($i = 0; $i < mysqli_num_rows($result2); $i++){
            $row =mysqli_fetch_row($result2);
            $arr->setValue1($row[0]);
            $arr->setValue2($row[1]);
        }
        return $arr;
    }
    public function getChooseQ($idQ): QuestionInfo
    {
        $query="SELECT  `truely`, asnwers_choose.text, texts_question.text FROM `asnwers_choose`,texts_question WHERE idQuestion=$idQ and texts_question.id=$idQ";
        $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
        $arr = new QuestionInfo();
        for ($i = 0; $i < mysqli_num_rows($result2); $i++){
            $row =mysqli_fetch_row($result2);
            $arr->setValue1($row[0]);
            $arr->setValue2($row[1]);
            $arr->setValue3($row[2]);
        }
        return $arr;
    }
    public function getMatchQ($idQ): QuestionInfo
    {
        $query="SELECT  answer, answer2, texts_question.text FROM `answers_match`,texts_question WHERE idQuestion=$idQ and texts_question.id=$idQ";
        $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
        $arr = new QuestionInfo();
        for ($i = 0; $i < mysqli_num_rows($result2); $i++){
            $row =mysqli_fetch_row($result2);
            $arr->setValue1($row[0]);
            $arr->setValue2($row[1]);
            $arr->setValue3($row[2]);
        }
        return $arr;
    }
}
