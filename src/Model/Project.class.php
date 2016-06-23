<?php
namespace Devbox\Model;
use Devbox\DAO\ProjectDAO;
class Project{
public $project_id;
public $project_name;
public $creation_date;
public $newproject_name;
public $user_id;
public $user_login;

//load the DAO Project Object

public function __construct()
{

$this->db=new ProjectDAO();
	}
public function defaultconstructor($project_id,$project_name,$user_id,$user_login)
{
	$this->project_id=$project_id;
$this->project_name=$project_name;
$this->user_id=$user_id;
$this->user_login=$user_login;

	}
public function creationconstructor($project_name,$user_id,$user_login)
{
	$this->project_name=$project_name;
	$this->user_id=$user_id;
	$this->user_login=$user_login;

}
//Project Class setters
public function setprojectid($project_id)
{
$this->project_id=$project_id;
}
public function setnewprojectname($newproject_name)
{
$this->newproject_name=$newproject_name;
}
public function setuserid($user_id)
{
$this->user_id=$user_id;
}
/// finish setters and getters
//finish Controller and test it
// Finish File Controller
// Finish Front End issues
public function setoldprojectname($newproject_name)
{
$this->newproject_name=$newproject_name;
}

// Project Class getters

//************************************Project Data Management Methods*************************************************************

//this method adds a project

public function addproject()
{
/*check if the project already exists
 * send an error if the project already exists
 * add the project if they are new
 * */
$data=$this->db->checkprojectdao($this->project_name,$this->user_id,$this->user_login);
if ($data>0)
{
return 0;
	}
	else
	{
$this->db->addprojectdao($this->project_name,$this->user_id,$this->user_login);

return 1;}
	}

//this method update project info
public function updateproject()
{
$data=$this->db->renameprojectdao($this->newproject_name,"/var/www/html/editor/App/Users/".$this->user_login."/".$this->project_name,"/var/www/html/editor/App/Users/".$this->user_login."/".$this->newproject_name,$this->project_id);
	return $data;
	}


public function deleteproject()
{
$data=$this->db->deleteprojectdao($this->project_id,$this->project_name,$this->user_id,"/var/www/html/editor/App/Users/".$this->user_login."/");
	return $data;
	}
	public function getprojectid()
	{
	return $this->db->getprojectiddao($this->project_name,$this->user_id);
		}

}
?>
