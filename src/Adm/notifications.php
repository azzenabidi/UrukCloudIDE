<?php
session_start();
if($_SESSION['admin_loggedin']==false)
{
  header("location: ../Login/index.php");
}


?>

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
                            <a   href="users.php"><i class="fa fa-bar-chart-o fa-fw"></i>Users Management</a>
                                                 </li>
                        <li>
                            <a   class="active" href="notifications.php"><i class="fa fa-table fa-fw"></i>Notifications Management</a>
                        </li>

                            </ul>


                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Notifications List      </h1><div id="div1"></div><h1 id="addnote"><a href="add_notification_view.php">Add a notification</a></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <?php

            use UrukCloudIDE\Controller\Notification_Controller;

            $note= new Notification_Controller();
            $result=$note->index();
            if ($result==0) {
                echo "No Notification found";
            } else {
                ?>
            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Notification_ID</th>
                                            <th>Notification Text</th>
                                            <th>Notification_Time</th>
                                            <th>Operations</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      while ($data=$result->fetch()) {
                                          echo '<tr class="odd gradeC" id="line'.$data['notification_id'].'">';
                                          echo"<td>".$data['notification_id']."</td>";
                                          echo"<td>".$data['notification_text']."</td>";
                                          echo"<td>".$data['notification_time']."</td>"; ?>
											<td>
                        <a href="modify_notification_view.php?id=<?php echo $data['notification_id']; ?>"
                           >Modify</a>
                        <a  class="delete" href="#" data-id="<?php echo $data['notification_id']; ?>">Delete</a></td>

											<?php
                                      echo "</tr>";
                                      }
            }
                                      ?>
                                    </tbody>
                                </table>
                            </div>
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

    <!-- Custom Theme JavaScript -->var parent = $(this).parent();
    <script src="js/sb-admin-2.js"></script>
    <script>

$(document).ready(function() {
  $(".delete").click(function(e){
    e.preventDefault();
    var x=$(this).data("id");

    $.ajax({
      url : "triggers/delete_notification.php",
      method : "GET",
      datatype: "JSON",
      data : {

        id : $(this).data("id")
      },
      success : function(data) {


            $("#line"+x ).remove();

            $("#div1").html(data).fadeOut(2400);







}
});

});
});

</script>

</body>

</html>
