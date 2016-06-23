<?php
namespace Devbox\Model;
use Devbox\DAO\NotificationDAO;
class Notification{
public $content;
public $note_id;
public $admin_id;
//load the DAO Notification Object

public function __construct()
{

$this->db=new NotificationDAO();
	}
public function defaultconstructor($content,$admin_id)
{
$this->content=$content;
$this->admin_id=$admin_id;
}


//Notification Class setters
public function setnotificationid($id)
{
	$this->note_id=$id;
}
public function setcontent($content)
{
$this->content=$content;
	}
	public function setadminid($admin_id)
	{
	$this->admin_id=$admin_id;
		}

//notification class getters
public function getnotificationid()
{
return $this->note_id;
	}
	public function getcontent()
	{
	return $this->content;}

	public function getadminid()
	{
	return $this->admin_id;}

//************************************Notification Data Management Methods*************************************************************

//this method adds a user

public function addnotification()
{
/*check if the user already exists
 * send an error if the user already exists
 * add the user if they are new
 * */
$this->db->addnotificationdao($this->content,$this->admin_id);

return 1;}


//this method update notification
public function updatenotification()
{
$this->db->updatenotificationdao($this->content,$this->note_id);
	return 1;
	}


public function deletenotification()
{
$this->db->deletenotificationdao($this->note_id);
	return 1;
	}
public function getnotifications()
{
$data=$this->db->getnotificationsdao();
return $data;
	}
public function getnotificationsbyid()
{
$data=$this->db->getnotificationsbyiddao($this->note_id);
return $data;
	}
public function getlatestnotification()
	{
	$data=$this->db->getlatestnotificationdao();
return $data;
	}

}
?>
