<?php
namespace Devbox\Model;
use Devbox\DAO\UserDAO;
class User extends Person{
public $user_id;
public $user_name;
public $oldlogin;
public $login;
public $password;
private $status;
public $db;
//load the DAO USER Object

public function __construct()
{
	
$this->db=new UserDAO();
	}

//custom login constructor

public function loginconstructor($login,$password)
{
$this->login=$login;
$this->password=md5($password);
	}
//default constructor


public function defaultconstructor($user_name,$login,$password)
{
$this->user_name=$user_name;
$this->login=$login;
$this->password=md5($password);

	}
//User Class setters

public function setusername($user_name)
{
$this->user_name=$user_name;
	}

public function setlogin($login)
{
$this->login=$login;
	}
	public function setoldlogin($oldlogin)
{
$this->oldlogin=$oldlogin;
	}
	public function setuserid($user_id)
	{
	$this->user_id=$user_id;
		}
public function setpassword($password)
{
$this->password=md5($password);
	}
	public function setstatus($status)
	{
	$this->status=$status;
		}

//User class getters

public function getusername()
{
return $this->user_name;
	}

public function getlogin()
{
return $this->login;
	}
public function getpassword()
{
return $this->password;
	}

//User main actions
public function connect()
{
$data=$this->db->authentificatedao($this->login,$this->password);

if($data!=0)
{
$this->db->update_userstatus($this->login,"online");
	return 1;
}
else
{
return 0;}
	}
public function disconnect()
{
	$this->db->update_userstatus($this->login,"offline");
session_destroy();
session_unset();
return 1;

	}
//************************************User Data Management Methods*************************************************************

//this method adds a user

public function adduser()
{
/*check if the user already exists
 * send an error if the user already exists
 * add the user if they are new
 * */
$data=$this->db->checkuserdao($this->login);
if ($data>0)
{
return 0;
	}
	else
	{
$this->db->adduserdao($this->user_name,$this->login,$this->password);

return 1;}
	}

//this method update user info
public function updateuser()
{
$data=$this->db->checkuserdao($this->login);
if($data>0)
return 0;
else
{
$this->db->updateuserdao($this->oldlogin,$this->user_id,$this->login,$this->user_name,$this->password);
return 1;}
	}


public function deleteuser()
{
$this->db->deleteuserdao($this->login);
return 1;
	}
public function getusers()
{
$data=$this->db->getusersdao();
return $data;
	}
public function getusersbylogin()
{
$data=$this->db->getusersbylogindao($this->login);
return $data;
	}
	public function getusersbyid()
	{
	$data=$this->db->getusersbyiddao($this->user_id);
	return $data;
		}

}
?>
