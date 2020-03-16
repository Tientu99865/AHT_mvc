<?php
namespace App\Models;
class TaskRepository{
    public function model($model){
        require_once "./app/Core/".$model.".php";
        return new $model;
    }
}
?>
