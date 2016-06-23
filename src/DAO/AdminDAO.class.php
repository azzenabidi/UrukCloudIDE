<?php
namespace Devbox\DAO;
use Devbox\Config\dbConn;

class AdminDAO{
public $dao;
public function __construct()
{
	//Load Database class and create an instance to manipulate the database

	$this->dao=dbConn::getConnection();


	}

		//authentificate admin

		public function authentificatedao($login,$password)
		{
		$data=$this->dao->prepare("select * from admins where 	admin_login= :username and admin_password= :pwd");
		$data->bindParam(':username',$login);
		$data->bindParam(':pwd',$password);
		$data->execute();
		return $data->rowCount();
			}
		//check if admin already exists
		public function checkadmindao($login)
		{
		$data=$this->dao->prepare("select * from admins where admin_login= :username");
		$data->bindParam(':username',$login);
		$data->execute();
		return $data->rowCount();
			}
		//send admin info to the database
		public function addadmindao($username,$login,$password)
		{$data=$this->dao->prepare("insert into admins(admin_name,admin_login,admin_password) values(:username,:login,:pwd)");
		$data->bindParam(':r',$username);
		$data->bindParam(':username',$login);
		$data->bindParam(':pwd',$password);
		$data->execute();
		}
		}
?>
