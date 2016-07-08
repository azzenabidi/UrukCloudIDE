<?php
namespace Devbox\DAO;

use Devbox\Config\dbConn;

class ProjectDAO
{
    public $dao;
    public function __construct()
    {

//Load Database class and create an instance to manipulate the database

    $this->dao=dbConn::getConnection();
    }
    //check if project already exists
        public function checkprojectdao($project_name, $user_id, $user_login)
        {
            $data=$this->dao->prepare("select * from projects where project_name= :projectname and user_id= :user_id");
            $data->bindParam(':projectname', $project_name);
            $data->bindParam(':user_id', $user_id);
            $data->execute();
            $path=__DIR__."/../App/Users/".$user_login."/".$projectname;
            if ((file_exists($path)) and ($data->rowCount()!=0)) {
                return 1;
            } else {
                return 0;
            }
        }
        //send project info to the database
        public function addprojectdao($projectname, $user_id, $user_login)
        {
            $data=$this->dao->prepare("insert into projects(project_name,user_id) values(:projectname,:user_id)");
            $data->bindParam(':projectname', $projectname);
            $data->bindParam(':user_id', $user_id);
            $data->execute();

            $path=__DIR__."/../App/Users/".$user_login."/".$projectname;
            mkdir($path);
        }
    public function renameprojectdao($rel_pr, $oldprojectname, $newprojectname, $project_id)
    {
        $data=$this->dao->prepare("update projects set project_name=:projectname where project_id=:project_id");
        $data->bindParam(':projectname', $rel_pr);
        $data->bindParam(':project_id', $project_id);
        $data->execute();
        $target = $oldprojectname;
        $newName = $newprojectname;
        $renameResult = rename($oldprojectname, $newprojectname);
// Evaluate the value returned from the function if needed
if ($renameResult == true) {
    return 1;
} else {
    return 0;
}
    }
    public function deleteprojectdao($project_id, $project_name, $path)
    {
        $data=$this->dao->prepare("delete from projects where project_id=:project_id ");
        $data->bindParam(':project_id', $project_id);
        $data->bindParam(':user_id', $user_id);
        $data->execute();

        if (rmdir($path.$project_name)) {
            return 1;
        } else {
            return 0;
        }
    }
    public function getprojectiddao($project_name, $user_id)
    {
        $data=$this->dao->prepare("select * from projects where project_name= :projectname and user_id= :user_id");
        $data->bindParam(':projectname', $project_name);
        $data->bindParam(':user_id', $user_id);
        $data->execute();
        return $data;
    }
}
