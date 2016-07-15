<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

     <title>UrukCloudIDE - Control Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>
#addnote{
float:right;
	}
</style>
<style>
.error{
color:red;
font-weight: bold;
font-size:30px;
}
.error2{
color:red;
font-weight: bold;
font-size:30px;
margin-left:220px;
}
.success{
color:green;
font-weight: bold;
font-size:30px;
margin-left:220px;
}
</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">UrukCloudIDE - Admin Dashboard</a>
            </div>
            <!-- /.navbar-header -->

                        <ul class="nav navbar-top-links navbar-right">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-messages">
                                    <?php

                                    require_once(__DIR__.'/../../vendor/autoload.php');
                                    use UrukCloudIDE\Controller\User_Controller;
                                    use UrukCloudIDE\Controller\Message_Controller;

                                    $msg= new Message_Controller();
                                          $user= new User_Controller();
                                          $result= $msg->viewmsgbox();
                                          if ($result==0) {
                                              echo "No messages!";
                                          } else {
                                              while ($data=$result->fetch()) {
                                                  echo "<li>"; ?>
                                           <a href='message.php?id=<?php echo $data['message_id']; ?>'>
                                            <div>
                                              <?php $users=$user->search_action($data['user_id']);
                                                  while ($data2=$users->fetch()) {
                                                      echo " <strong>".$data2['user_name']."</strong>";
                                                      echo '<span class="pull-right text-muted">';
                                                      echo"<em>".$data['message_time']."</em>";
                                                      echo "</span>";
                                                      echo "</div>";
                                                      echo "<div>".substr($data['message_content'], 0, 30)."...</div>";
                                                      echo "</a>";
                                                  }

                                                  echo "</li>";
                                                  echo '<li class="divider"></li>';
                                              }
                                          }
                                    ?>
                                    <li>
                                        <a class="text-center" href="#">
                                            <strong>Read All Messages</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                                <!-- /.dropdown-messages -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">

                          <li><a href="triggers/logoutadm.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a  href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a  class="active" href="users.php"><i class="fa fa-bar-chart-o fa-fw"></i>Users Management</a>
                                                 </li>
                        <li>
                            <a   href="notifications.php"><i class="fa fa-table fa-fw"></i>Notifications Management</a>
                        </li>

                            </ul>


                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Modify Notification</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid --><style>
.error{
color:red;
font-weight: bold;
font-size:30px;
}
.error2{
color:red;
font-weight: bold;
font-size:30px;
margin-left:220px;
}
.success{
color:green;
font-weight: bold;
font-size:30px;
margin-left:220px;
}
</style>
<?php

use UrukCloudIDE\Controller\Notification_Controller;

if (isset($_GET['id'])) {
    $notification= new Notification_Controller();
    $result=$notification->search_action($_GET['id']);
    while ($data=$result->fetch()) {
        ?>
             <form method="post" action="#" id="upform">
			<div class="form-group">

                                            <input type="hidden" class="form-control" placeholder="" name="noted" id="noteid" value="<?php echo $data['notification_id']  ; ?>">
                                        </div>
             <div class="form-group">
                                            <label>Notification Text</label>
                                            <textarea class="form-control" rows="3" id="note" name="note"><?php echo $data['notification_text']; ?></textarea>
                                        </div>
                                         <button type="submit" class="btn btn-default">Modify Notification</button>
                                        <button type="reset" class="btn btn-default">Cancel</button>
        </form>
        <div id="div1"></div>
         <?php

    }
} else {
    echo "<b>Ooops! The Page you are requesting doesn't exist anymore!</b>";
}
                                         ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
<script src="js/jquery.validate.js"></script>
            <script type="text/javascript">
            $(document).ready(function(){

			$('#upform').validate({
                    rules:{


                        "note":{
                            required:true,
                            maxlength:100
                        }
                        },

                    messages:{


                        "note":{
                            required:"Please enter a notification text"

                        }
                        }



            })

        });
        </script>

<script>
$(document).on('submit', 'form', function(e) {
var note=$("textarea").val();
var id=$("#noteid").val();
var encodednote = encodeURIComponent(note);
var encodedid = encodeURIComponent(id);
   $("#div1").load("triggers/modify_notification.php?note="+encodednote+"&id="+encodedid);
	$("#div1").fadeOut(2400);
    e.preventDefault();


});
    </script>
</body>

</html>
