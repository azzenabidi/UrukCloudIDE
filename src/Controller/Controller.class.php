<?php
abstract class Controller
{
    public $model;
    public $url;
    public $action;
    public $obj;
    public function __construct($model, $url, $action)
    {
        $this->model=$model;
        $this->url=$url;
        $this->action=$action;
        require_once('../Model/'.$this->model.'.class.php');
        $this->obj=new $this->model();
        if ($this->action=='add') {
            $this->insert_action();
        } elseif ($this->action=='update') {
            $this->update_action();
        } elseif ($this->action=='delete') {
            $this->delete_action();
        } elseif ($this->action=='view') {
            $this->index();
        } else {
            echo "invalid value for action parameter";
        }
    }
    public function redirect($url)
    {
        header('Location: '.$this->url);
    }
    
    abstract public function index();

    abstract public function insert_action();

    abstract public function update_action();
    
    abstract public function delete_action();
}
