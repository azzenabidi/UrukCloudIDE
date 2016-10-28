<?php

namespace UrukCloudIDE\Controller;

use UrukCloudIDE\Model\User;

class User_Controller
{
    public $user;
    public $homepage;
    public function __construct()
    {
        $this->user= new User();
        $this->homepage="/editor/App";
    }
    public function user_connect_action($login, $password)
    {
        if (!empty($password) and !empty($login)) {
            $this->user->loginconstructor($login, $password);
            $verify=$this->user->connect();
            if ($verify==1) {
                $result=$this->user->getusersbylogin($login);
                while ($data=$result->fetch()) {
                    session_start();
                    $_SESSION['user_id']=$data['user_id'];
                    $_SESSION["login"] = $login;
                    $_SESSION["password"] = $password;
                    $_SESSION['loggedin']=true;
                    header('location:../App/index.php');
                }
            } else {
                return "username or password is invalid!";
            }
        } else {
            return "All fields are required";
        }
    }
    public function user_disconnect_action($login)
    {
        $this->user->setlogin($login);
        $_SESSION['loggedin']=false;
        $result=$this->user->disconnect();

        if ($result==1) {
            header("location: ../../Login/index.php");
        }
    }
    public function search_action($id)
    {
        $this->user->setuserid($id);
        return $this->user->getusersbyid();
    }
    public function adduser_action($user_name, $login, $password)
    {
        if (!empty($user_name) and !empty($login) and !empty($password)) {
            $this->user->defaultconstructor($user_name, $login, $password);
            $result=$this->user->adduser();
            if ($result==1) {
                echo "<p class='success'> User Added successfully!</p>";
            } else {
                echo "<p class='error2'>Ooops! User already exists! Choose another login please</p>";
            }
        } else {
            echo "<p class='error2'>All fields are required!</p>";
        }
    }
    public function updateuser_action($oldlogin, $user_id, $login, $user_name, $password)
    {
        if (!empty($user_id) and !empty($login) and !empty($oldlogin) and  !empty($user_name) and !empty($password)) {
            $this->user->setuserid($user_id);
            $this->user->setlogin($login);
            $this->user->setoldlogin($oldlogin);
            $this->user->setusername($user_name);
            $this->user->setpassword($password);
            $result=$this->user->updateuser();
            if ($result==1) {
                echo "<p class='success'>User Updated successfully!</p>";
            } else {
                echo "<p class='error2'>Ooops! The new Login already exists!</p>";
            }
        } else {
            echo "All Fields are required!";
        }
    }
    public function deleteuser_action($user_login)
    {
        if (!empty($user_login)) {
            $this->user->setlogin($user_login);
            $result=$this->user->deleteuser();
            if ($result==1) {
                echo "<p class='success'>User Deleted successfully!</p>";
            } else {
                echo "Ooops! Something went wrong";
            }
        } else {
            echo "An expected bug happened !";
        }
    }
    public function index()
    {
        $data=$this->user->getusers();
        if ($data->rowCount()==0) {
            return 0;
        } else {
            return $data ;
        }
    }
    public function searchbylogin_action($login)
    {
        $this->user->setlogin($login);
        return $this->user->getusersbylogin();
    }
}
