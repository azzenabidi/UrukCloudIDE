<?php
/* Admin_Controller
	A controller for the Admin Model

# Copyright (c) 2015 azzen abidi <abidi.azzen@yahoo.fr>
# This Program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.
# This Program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this library. If not, see <http://www.gnu.org/licenses/>.*/

namespace Devbox\Controller;
use Devbox\Model\Person;
use Devbox\Model\Admin;
class Admin_Controller{
// a variable to manipulate the admin model
public $admin;
//default constructor
public function __construct()
{//Load the needed classes

$this->admin= new Admin();
}
public function admin_connect_action($login,$password)
{
if (!empty($password) and !empty($login))
{
$this->admin->loginconstructor($login,$password);
$verify=$this->admin->connect();
if($verify==1)
{
session_start();
$_SESSION["admin_login"] = $login;
$_SESSION["admin_password"] = $password;
header('location:../Adm/index.php');

}
else
{ echo "username or password is invalid!";}
}
else
{
echo "All fields are required";
}

}
public function admin_disconnect_action($login)
{

	$this->admin->setadminlogin($login);
	$result=$this->admin->disconnect();
	if ($result==1) {

	header("location: ../../Login/index.php");

}}}
?>
