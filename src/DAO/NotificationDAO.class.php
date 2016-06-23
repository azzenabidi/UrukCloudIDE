<?php
namespace Devbox\DAO;
use Devbox\Config\dbConn;
class NotificationDAO{
	public $dao;
public function __construct()
{
	
	$this->dao=dbConn::getConnection();



	}


		//send notifiction info to the database
		public function addnotificationdao($text,$admin_id)
		{$data=$this->dao->prepare("insert into notifications(notification_text,admin_id) values(:text,:admin_id)");
		$data->bindParam(':text',$text);
		$data->bindParam(':admin_id',$admin_id);
		$data->execute();
		}
		public function updatenotificationdao($text,$notification_id,$admin_id)
		{
		$data=$this->dao->prepare("update notifications set notification_text=:text where notification_id=:notification_id");
		$data->bindParam(':text',$text);
		$data->bindParam(':notification_id',$notification_id);
		$data->execute();

			}
		public function deletenotificationdao($notification_id)
		{
		$data=$this->dao->prepare("delete from notifications where notification_id=:notification_id");
		$data->bindParam(':notification_id',$notification_id);
		$data->execute();
			}
	public function getnotificationsdao()
	{
		$data=$this->dao->prepare("select * from notifications order by notification_time DESC");
		$data->execute();
		return $data;
	}
	public function getnotificationsbyiddao($id)
	{
		$data=$this->dao->prepare("select * from notifications where notification_id=:id");
		$data->bindParam(':id',$id);
		$data->execute();
		return $data;

	}
	public function getlatestnotificationdao()
	{
		$data=$this->dao->prepare("select * from notifications order by notification_time DESC limit 1");
		$data->execute();
		return $data;
	}
	}
?>
