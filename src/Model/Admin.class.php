<?php
namespace Devbox\Model;
use Devbox\DAO\AdminDAO;
class Admin extends Person{
public $admin_name;
public $admin_login;
public $admin_password;
public $db;
public function __construct()
{

$this->db=new AdminDAO();
	}
public function loginconstructor($login,$password)
{
	$this->admin_login=$login;
	$this->admin_password=md5($password);

}
public function setadminlogin($admin_login)
{
$this->admin_login=$admin_login;
	}
public function connect()
 {
$data=$this->db->authentificatedao($this->admin_login,$this->admin_password);
return $data;
}
public function disconnect()
{
	session_destroy();
	session_unset();
	return 1;
	}
	}
?>
