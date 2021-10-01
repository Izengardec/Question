<?php
class Controller{
    private $model;
    private $view;
    public function __construct($model, $view){
        $this->model=$model;
        $this->view=$view;
    }
    public function showForm($typeForm){
        if ($typeForm==0){
            $this->view->matchForm();
        } else if ($typeForm == 1){
            $this->view->chooseForm();
        } else if ($typeForm == 2){
            $this->view->openForm();
        } else {
            echo "Ошибка обращения к форме";
        }
    }
}