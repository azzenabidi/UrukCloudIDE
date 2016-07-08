<?php

namespace Devbox\Controller;

use Devbox\Model\Project;

class Project_Controller
{
    public $project;
    public function __construct()
    {
        $this->project= new Project();
    }
    public function addproject_action($projectname, $user_id, $user_login)
    {
        if (!empty($projectname) and !empty($user_id) and !empty($user_login)) {
            $this->project->creationconstructor($projectname, $user_id, $user_login);
            $result=$this->project->addproject();
            if ($result==1) {
                echo "Project Added successfully";
            } else {
                echo "Project already exists! Choose another name please";
            }
        } else {
            echo "Please Enter your project name";
        }
    }
    public function updateproject_action($newprojectname, $user_login, $user_id, $projectname, $project_id)
    {
        if (!empty($projectname) and !empty($newprojectname) and !empty($user_login) and !empty($project_id) and !empty($user_id)) {
            $this->project->defaultconstructor($project_id, $projectname, $user_id, $user_login);
            $this->project->setnewprojectname($newprojectname);
            $result=$this->project->updateproject();
            if ($result==1) {
                echo "Project Updated successfully!";
            } else {
                echo "Ooops! Something went wrong";
            }
        } else {
            echo "The new project name Field must not be empty";
        }
    }
    public function deleteproject_action($project_id, $project_name, $user_id, $user_login)
    {
        if (!empty($project_id) and !empty($project_name) and !empty($user_id) and !empty($user_login)) {
            $this->project->defaultconstructor($project_id, $project_name, $user_id, $user_login);
            $result=$this->project->deleteproject();
            if ($result==1) {
                echo "Project Deleted successfully!";
            } else {
                echo "Ooops! Something went wrong";
            }
        } else {
            echo " An unexpected bug happened!";
        }
    }
    public function getprojectid_action($projectname, $user_id)
    {
        if (!empty($projectname) and !empty($user_id)) {
            $this->project->defaultconstructor("", $projectname, $user_id, "")    ;
            return $this->project->getprojectid();
        } else {
            echo " An unexpected bug happened!";
        }
    }
}
