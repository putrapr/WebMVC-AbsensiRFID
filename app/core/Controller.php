<?php

class Controller {
  public function view($view, $data = []){
    require_once 'app/views/'. $view .'.php';
  }

  public function model($model){
    date_default_timezone_set('Asia/Jakarta');
    require_once 'app/models/'. $model .'.php';
    return new $model;
  }
}