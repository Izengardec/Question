<?php
require_once 'model.php';
class CreateQModel extends Model{
    public function count_win($player){
        $query="SELECT COUNT( idGame ) FROM `games`WHERE idUser =$player and result=1";
        $result2=mysqli_query($this->link,$query)or die("Ошибка запроса".mysqli_error($this->link));
        $row =mysqli_fetch_row($result2);
        return $row[0];
    }
}
