<?php
namespace Devbox\Model;
use Devbox\DAO\FileDAO;
class File{
public $file_id;
public $file_name;
public $newfile_name;
public $project_id;
public $project_name;
public $user_login;
public $user_id;
public $db;
private $data;
//load the DAO File Object

public function __construct()
{


$this->db=new FileDAO();
	}

	public function deletefileconstructor($file_id,$file_name,$user_login,$project_name)
	{
	$this->file_id=$file_id;
	$this->file_name=$file_name;
	$this->user_login=$user_login;
	$this->project_name=$project_name;
	}
//custom login constructor

public function savefileconstructor($file_name,$data)
{

$this->file_name=$file_name;
$this->data=$data;

	}



	public function renamefileconstructor($file_id,$file_name,$newfile_name,$project_name,$user_login)
{
$this->file_id=$file_id;
$this->file_name=$file_name;
$this->newfile_name=$newfile_name;
$this->project_name=$project_name;
$this->user_login=$user_login;
}
//default constructor

public function defaultconstructor($file_name,$project_id,$project_name,$user_login)
{
	$this->file_name=$file_name;
	$this->project_id=$project_id;
	$this->project_name=$project_name;
	$this->user_login=$user_login;
	}
//File Class setters

public function setfileid($file_id)
{
$this->file_id=$file_id;
	}

public function setfilename($file_name)
{
$this->file_name=$file_name;
	}
public function setprojectid($project_id)
{
$this->project_id=$project_id;
	}
public function setnewfilename($newfile_name)
{
$this->newfile_name=$newfile_name;
	}
//User class getters
public function getfileid()
{
return $this->file_id;
	}
public function getfilename()
{
return $this->file_name;
	}
public function getprojectid()
{
return $this->project_id;
	}


//************************************File Data Management Methods*************************************************************

//this method adds a file

public function addfile()
{
/*check if the user already exists
 * send an error if the user already exists
 * add the user if they are new
 * */
$data=$this->db->checkfiledao($this->file_name,$this->project_id,$this->project_name,$this->user_login);
if ($data>0)
{
return 0;
	}
	else
	{
$this->db->addfiledao($this->file_name,$this->project_id,$this->project_name,$this->user_login);

return 1;}
	}
//this method rename file
public function renamefile()
{
$result=$this->db->rename_filedao("/var/www/html/editor/App/Users/".$this->user_login."/".$this->project_name."/".$this->file_name,$this->file_name,"/var/www/html/editor/App/Users/".$this->user_login."/".$this->project_name."/".$this->newfile_name,$this->newfile_name,$this->file_id);
return $result;
	}

//this method update file info
public function save_file()
{
$result=$this->db->save_filedao($this->file_name,$this->data);
return $result;

	}


public function delete_file()
{
return $this->db->delete_filedao($this->file_id,$this->file_name,$this->user_login,$this->project_name);
	}


}
?>
