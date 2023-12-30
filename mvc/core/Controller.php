<?php
class Controller{

    public function model($model){
        require_once MODEL_PATH . $model.".php";
        return new $model;
    }

    public function view($view, $data=[]){
        require_once VIEW_PATH . $view.".php";
    }

}
?>
