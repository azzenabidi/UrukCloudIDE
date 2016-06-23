<?php
namespace Devbox\DAO;
use Devbox\Config\dbConn;
class MessageDAO{
	public $dao;
public function __construct()
{
	
	$this->dao=dbConn::getConnection();

	}


		//send message to admin
		public function contactdao($msg,$user_id)
		{$data=$this->dao->prepare("insert into messages(message_content,user_id) values(:msg,:user_id)");
		$data->bindParam(':msg',$msg);
		$data->bindParam(':user_id',$user_id);
		$data->execute();
		}
		public function viewdao()
		{
		$data=$this->dao->prepare("select * from messages order by message_time DESC");
		$data->execute();
		return $data;

			}
		public function getmsgbyiddao($msg_id)
		{
			$data=$this->dao->prepare("select * from messages where message_id=:msg");
			$data->bindParam(':msg',$msg_id);
			$data->execute();
			return $data;

		}
		public function getlatestdao()
		{
			$data=$this->dao->prepare("select * from messages order by message_time DESC limit 4 ");
			$data->execute();
			return $data;
		}
	}
?>
