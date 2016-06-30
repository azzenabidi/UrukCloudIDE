<?php
namespace Devbox\DAO;
use Devbox\Config\dbConn;
class UserDAO{
public $dao;
public function __construct()
{
	$this->dao=dbConn::getConnection();


	}
	//send allusers data
	public function getusersdao()
	{
	$data=$this->dao->prepare("select * from users");
	$data->execute();
return $data;
		}
	//sends users data based on login
		public function getusersbylogindao($login)
		{


		$data=$this->dao->prepare("select * from users where user_login= :cond");
		$data->bindParam(':cond',$login);
		$data->execute();
		return $data;
			}
			public function getusersbyiddao($id)
			{


			$data=$this->dao->prepare("select * from users where user_id= :cond");
			$data->bindParam(':cond',$id);
			$data->execute();
			return $data;
				}
		//authentificate user
		public function authentificatedao($login,$password)
		{
		$data=$this->dao->prepare("select * from users where user_login= :username and user_password= :pwd");
		$data->bindParam(':username',$login);
		$data->bindParam(':pwd',$password);
		$data->execute();
		return $data->rowCount();
			}
		//check if user already exists
		public function checkuserdao($login)
		{
		$data=$this->dao->prepare("select * from users where user_login= :username");
		$data->bindParam(':username',$login);
		$data->execute();
		return $data->rowCount();
			}
		//send user info to the database
		public function adduserdao($username,$login,$password)
		{$data=$this->dao->prepare("insert into users(user_name,user_login,user_password) values(:username,:login,:pwd)");
		$data->bindParam(':username',$username);
		$data->bindParam(':login',$login);
		$data->bindParam(':pwd',$password);
		$data->execute();
		$path=__DIR__."/../App/Users/".$login;
		mkdir($path);
		

		}
		public function update_userstatus($login,$status)
		{
		$data=$this->dao->prepare("update users set  status=:status where user_login=:login");
		$data->bindParam(':login',$login);
		$data->bindParam(':status',$status);
		$data->execute();}
		public function updateuserdao($oldlogin,$user_id,$login,$username,$password)
		{
		$data=$this->dao->prepare("update users set user_name=:username ,user_password=:pwd,user_login=:login where user_id=:user_id");
		$data->bindParam(':username',$username);
		$data->bindParam(':user_id',$user_id);
		$data->bindParam(':login',$login);
		$data->bindParam(':pwd',$password);
		$data->execute();
		$abspath=dirname(__FILE__) . '/';
		$path=__DIR__."/../App/Users/".$login;
	$path=__DIR__."/../App/Users/".$oldlogin;
		rename($oldpath,$newpath);


			}
		public function deleteuserdao($login)
		{
		$data=$this->dao->prepare("delete from users where user_login=:username");
		$data->bindParam(':username',$login);
		$data->execute();
		$path=__DIR__."/../App/Users/".$login;
		system('rm -rf ' . escapeshellarg($path), $retval);
    return $retval == 0;
			}
	}
?>
