<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Contact the administrator</title>

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
<?php
require_once(__DIR__.'/../../vendor/autoload.php');
use UrukCloudIDE\Controller\User_Controller;

$user= new User_Controller();
$result=$user->searchbylogin_action($_SESSION['login']);
while ($data=$result->fetch()) {
    ?>



        <!-- Page Content -->
        <div id="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Contact the Administrator</h1>
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
         <form method="post" action="#" id="msgform">
			<div class="form-group">

                                            <input type="hidden" class="form-control" placeholder="" name="userid" id="userid" value="<?php echo $data['user_id'];} ?>">
                                        </div>
             <div class="form-group">
                                            <label>Write Down Your Message</label>
                                            <textarea class="form-control" rows="3" id="note" name="note"></textarea>
                                        </div>
                                        <center> <button type="submit" class="btn btn-default">Send </button></center>

        </form>
        <div id="div1"></div>

        </div>
        <!-- /#page-wrapper -->


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

			$('#msgform').validate({
                    rules:{


                        "note":{
                            required:true,
                            maxlength:100
                        }
                        },

                    messages:{


                        "note":{
                            required:"Please Write Down Your Message "

                        }
                        }



            })

        });
        </script>


    <script>

    $(document).ready(function() {
      $("form").submit(function(e){
        e.preventDefault();
        $.ajax({
          url : "sendmsg.php",
          method : "GET",
          data : {
            id   : $("#userid").val(),
            note : $("textarea").val()

          },
          success : function(data) {
            $("#div1").html(data).fadeOut(2400);
          }
        });
      });
    });
        </script>
</body>

</html>
