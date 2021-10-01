<?php
    require_once 'model.php';
    class TestModel extends Model{
        private $idTest;
        public function __construct($link,$idTest)
        {
            $this->idTest = $idTest;
            parent::__construct($link);
        }

        public function insertQ($textQ,$form){
            $query="INSERT INTO `texts_question`(`text`, `idtest`,type) VALUES ( '$textQ', $this->idTest,$form)";
            $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
            $query="SELECT MAX(id) FROM texts_question WHERE text='$textQ' ";
            $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
            $row =mysqli_fetch_row($result2);
            return $row[0];//получим айди этого вопроса
        }
        public function insertOpenA($textA, $idQ){
            $query="INSERT INTO `answers_open`(`answer`, `idQuestion`) VALUES ( '$textA', $idQ)";
            $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
        }
        public function  insertChooseA($true,$text,$idQ){
            $query="INSERT INTO `answers_choose`( `truely`, `text`, `idQuestion`) VALUES ( $true,'$text', $idQ)";
            $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
        }
        public function  insertMatchA($text1, $text2, $idQ){
            $query="INSERT INTO `answers_match`( `answer`, `answer2`, `idQuestion`) VALUES ( '$text1', '$text2', $idQ)";
            $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
        }
    }