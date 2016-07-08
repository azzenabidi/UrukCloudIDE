<?php
abstract class Model
{
    public $dao;
    public $db;
    public function __construct($dao)
    {
        $this->dao=$dao;
        require_once('../DAO/'.$this->dao.'.class.php');
        $this->db=new $this->dao();
    }
}
