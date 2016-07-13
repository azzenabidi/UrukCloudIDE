<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

     <title>Devbox - Control Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                 <a class="navbar-brand" href="index.php">Devbox - Admin Dashboard</a>
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
                                    use Devbox\Controller\User_Controller;
                                    use Devbox\Controller\Message_Controller;

                                    $msg= new Message_Controller();
                                          $user= new User_Controller();
                                          $result= $msg->viewmsgbox();
                                          if ($result==0) {
                                            echo "No messages!";
                                          }
                                          else {


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
                                          }}
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
                        <li class="divider"></li>
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
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="users.php"><i class="fa fa-bar-chart-o fa-fw"></i>Users Management</a>
                                                 </li>
                        <li>
                            <a href="notifications.php"><i class="fa fa-table fa-fw"></i>Notifications Management</a>
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
						<?php
            require_once(__DIR__.'/../../vendor/autoload.php');
            use Devbox\Controller\User_Controller;
            use Devbox\Controller\Message_Controller;
						if(isset($_GET['id']))
						{
                              $msg= new Message_Controller();
                              $user= new User_Controller();
                              $result= $msg->readmsg_action($_GET['id']);
                              while($data=$result->fetch())
                              { $users=$user->search_action($data['user_id']);

							while($data2=$users->fetch())
							{



						?>
                        <h1 class="page-header"><?php echo "Message From ".$data2['user_name']." on ".$data['message_time']; }?></h1>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <?php echo $data ['message_content'];} }?>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
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

</body>

</html>
