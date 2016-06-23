<?php
namespace Devbox\DAO;
use Devbox\Config\dbConn;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
class FileDAO{
public $dao;
public $fs;
public function __construct()
{
	$this->$fs = new Filesystem();

	$this->dao=dbConn::getConnection();


	}


		//check if file already exists
		public function checkfiledao($filename,$project_id,$projectname,$user_login)
		{
		$data=$this->dao->prepare("select * from files where file_name= :filename and project_id=:project_id");
		$data->bindParam(':filename',$filename);
		$data->bindParam(':project_id',$project_id);
		$data->execute();
		$abspath=dirname(__FILE__) . '/';
		$path=substr($abspath, 0, 21)."App/Users/".$user_login."/".$projectname."/".$filename;
		if((file_exists($path)) and ($data->rowCount()!=0))
		return 1;
		else
		return 0;

			}
		//send file info to the database
		public function addfiledao($filename,$project_id,$projectname,$user_login)
		{$data=$this->dao->prepare("insert into files(file_name,project_id) values(:filename,:project)");
		$data->bindParam(':filename',$filename);
		$data->bindParam(':project',$project_id);
		$data->execute();
		$abspath=dirname(__FILE__) . '/';
		$testpath= str_replace("/DAO","/App/Users",$abspath);
		$path= $testpath.$user_login."/".$projectname."/".$filename;
		$myfile=fopen($path,'w');
		chown($path, "azzenovic");
		chmod($path, 0777);
		return 1;

		}
		public function rename_filedao($oldfilepath,$oldfilename,$newfilepath,$newfilename,$file_id)
		{
		$data=$this->dao->prepare("update files set file_name=:filename where file_id=:id");
		$data->bindParam(':filename',$newfilename);
		$data->bindParam(':id',$file_id);

		$data->execute();
		$old = $oldfilepath;
$new = $newfilepath;
$result =rename($old, $new) ;
if($result)
return 1;
else
return 0;

			}
			public function save_filedao($filename,$data)
			{
				$myFile = $filename;
	$fh = fopen($myFile, 'w') or die("can't open file");
	$stringData =$data;
	fwrite($fh, $stringData);
	return 1;
			}
		public function delete_filedao($id,$filename,$user_login,$project_name)
		{
		$data=$this->dao->prepare("delete from files where file_id=:id");
		$data->bindParam(':id',$id);
		$data->execute();
		$path="/var/www/html/editor/App/Users/".$user_login."/".$project_name."/".$filename;
		unlink($path);
		if (!file_exists($path))
		{
		return 1 ;
			}
			else
			{
		return 0;
			}
			}
	}
?>
