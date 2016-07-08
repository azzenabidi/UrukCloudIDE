<?php

namespace Devbox\Controller;

use Devbox\Model\File;

class File_Controller
{
    public $file;
    public function __construct()
    {
        $this->file= new File();
    }
    public function addfile_action($file_name, $project_id, $project_name, $user_login)
    {
        if (!empty($file_name) and !empty($project_id) and !empty($project_name) and !empty($user_login)) {
            $this->file->defaultconstructor($file_name, $project_id, $project_name, $user_login);
            $result=$this->file->addfile();
            if ($result==1) {
                echo "File Added successfully";
            } else {
                echo "File already exits! Choose another file name please";
            }
        } else {
            echo "Please enter a file name";
        }
    }
    public function renamefile_action($file_id, $oldfilename, $newfilename, $project_name, $user_login)
    {
        if (!empty($file_id) and !empty($oldfilename) and !empty($newfilename) and !empty($project_name) and !empty($user_login)) {
            $this->file->renamefileconstructor($file_id, $oldfilename, $newfilename, $project_name, $user_login);
            $result=$this->file->renamefile();
            if ($result==1) {
                echo "File renamed successfully";
            } else {
                echo "Oops! Something went wrong";
            }
        } else {
            echo "Please enter new file name!";
        }
    }
    public function savefile_action($file_name, $data)
    {
        if (!empty($file_name)) {
            $this->file->savefileconstructor($file_name, $data);
            $result=$this->file->save_file();
            if ($result==1) {
                echo "File has been saved successfully";
            } else {
                echo "Oops! File couldn't be saved";
            }
        } else {
            echo "An unexpected bug happened!";
        }
    }
    public function deletefile_action($file_id, $file_name, $user_login, $project_name)
    {
        if (!empty($file_id) and !empty($file_name) and !empty($user_login) and !empty($project_name)) {
            $this->file->deletefileconstructor($file_id, $file_name, $user_login, $project_name);
            $result=$this->file->delete_file();
            if ($result==1) {
                echo "File deleted successfully!";
            } else {
                echo "File Could not be deleted";
            }
        } else {
            echo "An unexpected bug happened!";
        }
    }
}
