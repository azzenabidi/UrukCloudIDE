<?php
session_start();
if(!isset($_SESSION['login']))
{
header("location: ../Login/index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">


 <!-- Bootstrap Core CSS -->


    <link rel="stylesheet" href="/Devbox/src/public/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/Devbox/src/public/css/font-awesome.min.css">
<link rel="stylesheet" href="/Devbox/src/public/css/bootstrap/bootstrap-theme.min.css">
<link rel="stylesheet" href="/Devbox/src/public/css/bootstrap/context.bootstrap.css">
<link rel="stylesheet" href="/Devbox/src/public/css/bootstrap/context.standalone.css">
<!-- jquery  ui-->

<link href="/Devbox/src/public/css/jquery-ui/jquery-ui.min.css" rel="stylesheet">
<link href="/Devbox/src/public/css/jquery-ui/jquery-ui.structure.min.css" rel="stylesheet">
<link href="/Devbox/src/public/css/jquery-ui/jquery-ui.theme.min.css" rel="stylesheet">

<!-- Devbox -->

    <link href="/Devbox/src/public/css/app.css" rel="stylesheet">
   <link href="/Devbox/src/public/css/jqueryFileTree.css" rel="stylesheet" type="text/css" media="screen" />

  <title>Devbox/src</title>
<style>#dialog{
display:none;
}
#dialogfile{
display:none;
}
</style>
</head>
<body>
<div id="dialog" title="Create Project">
	<label>Project Name</label>
              <input type="text" id="prname" size="20" name="name"  required /><br><br><button id="ok">OK</button>
            </div>
<div id="dialogfile" title="Create File">
	<label>File Name</label>
              <input type="text" id="name" size="20" name="filename"  required /><br><br><button id="okfile">OK</button>
            </div>
 <div id="term"></div>
<div id="rr"></div>
    <ul class="nav nav-pills">



        <li class="dropdown">

            <a href="#" data-toggle="dropdown" class="dropdown-toggle">File <b class="caret"></b></a>

            <ul class="dropdown-menu">

				<li><a href="#" id="np">New Project</a></li>
                <li><a href="#" id="nf">New File</a></li>

                <li><a href="#" id="ss">Save</a></li>
                <li><a href="https://localhost:4200/" id="shell" target="blank">Execute</a></li>

                <li class="divider"></li>

                <li><a href="triggers/logout.php">Logout</a></li>

            </ul>

        </li>

<li class="dropdown">

            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Edit<b class="caret"></b></a>

            <ul class="dropdown-menu">

                <li><a href="#" class="disabled">Undo</a></li>

                <li><a href="#" class="disabled">Redo</a></li>

                <li><a href="#" class="disabled">Cut</a></li>

                <li><a href="#" class="disabled">Copy</a></li>

                <li><a href="#" class="disabled">Paste</a></li>

            </ul>

        </li>
<li class="dropdown">

            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Help<b class="caret"></b></a>

            <ul class="dropdown-menu">

                <li><a href="../Contact/index.php" target="blank">Contact the app Admin</a></li>
                <li><a href="../Vendor/owncloud/index.php" target="blank">Access Owncloud</a></li>

                <li><a href="../../devbox/index.php" target="blank">Website</a></li>

                <li><a href="../../devbox/documentation/index.php" target="blank">Wiki</a></li>

                <li><a href="../../devbox/forums/index.php" target="blank">Report a bug</a></li>

                <li><a href="#">About</a></li>

            </ul>

        </li>

<li class="dropdown">


            <a href="#" data-toggle="dropdown" class="dropdown-toggle">Notifications<b class="caret"></b></a>

            <ul class="dropdown-menu">

              <?php

                              require_once(__DIR__.'/../../vendor/autoload.php');
use Devbox\Controller\Notification_Controller;
                              $note= new Notification_Controller();

                              $result= $note->getlatestnotification_action();
                              while($data=$result->fetch())
                              {


               echo "<li>on   ".$data['notification_time']."<br><br>  the admin wrote '   ".$data['notification_text']."'</li>";
		   }
               ?>



            </ul>

        </li>

    </ul>

<div id="fileexplorer"></div>
<pre id="editor"></pre>

<!-- JQUERY -->

<script src="/Devbox/src/public/js/jquery.min.js"></script>
 <script src="/Devbox/src/public/js/jquery.easing.js" type="text/javascript"></script>
 <script src="/Devbox/src/public/js/jqueryFileTree.js" type="text/javascript"></script>

 <!-- JQUERY UI-->
<script src="/Devbox/src/public/js/jquery-ui.min.js"></script>

	<!-- BOOTSTRAP -->

		<script src="/Devbox/src/public/js/bootstrap/bootstrap.min.js"></script>
		<script src="/Devbox/src/public/js/bootstrap/context.js"></script>

<!-- ACE Devbox/src -->

<script src="ace/ace.js" type="text/javascript" charset="utf-8"></script>
<script src="ace/ext-language_tools.js" type="text/javascript" charset="utf-8"></script>
<script src="ace/snippets/pascal.js" type="text/javascript" charset="utf-8"></script>

<!-- DevBox UI Interactions -->

<script>
ace.require("ace/ext/language_tools");
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/eclipse");
    editor.getSession().setMode("ace/mode/pascal");
    editor.setOptions({
      enableBasicAutocompletion: true,
  enableSnippets: true,
  enableLiveAutocompletion: true
});


    	$(document).ready( function() {

				$('#fileexplorer').fileTree({ root: '/var/www/html/Devbox/src/App/Users/<?php echo $_SESSION['login']."/";?>', script: 'triggers/jqueryFileTree.php', folderEvent: 'click', expandSpeed: 750, collapseSpeed: 750, multiFolder: true,loadMessage:'Loading...' }, function(file) {
					var test =file.slice(25,file.length);

					$.ajax({
  url: 'file.php',
  type: 'GET',
  data: 'file='+test,
  success: function(data) {
	//called when successful
	Devbox/src.setValue(data);
  },
  error: function(e) {
	//called when there is an error
	//console.log(e.message);
  }
});


				});

$("#ss").click(function(e){
	e.preventDefault();
	var encoded = encodeURIComponent(editor.getValue());
        $("#rr").load("triggers/savefile.php?data="+encoded);
        $("#rr").fadeOut(2400);
    });
 $("#np").click(function (e) {
			  e.preventDefault();
           $("#dialog").dialog({
                autoOpen: true,
                title: 'Create Project',
                height: 200,
      width: 350

                });

        });

       $("#nf").click(function (e) {
			  e.preventDefault();
           $("#dialogfile").dialog({
                autoOpen: true,
                title: 'Create File',
                height: 200,
      width: 350

                });

        });
        $("#okfile").click(function (e) {
		e.preventDefault();
		var test= $("#name").val();
		var encoded = encodeURIComponent(test);
		$("#rr").load("triggers/addfile.php?filename="+encoded);
		$("#rr").fadeOut(2400);
	 $("#dialogfile").dialog( "close" );

 });

     $("#ok").click(function (e) {
		e.preventDefault();

		var test= $("#prname").val();
		var encoded = encodeURIComponent(test);
		$("#rr").load("triggers/addproject.php?projectname="+encoded);
		$("#fileexplorer").fileTree({ root: '/var/www/html/Devbox/src/App/Users/<?php echo $_SESSION['login']."/";?>', script: 'triggers/jqueryFileTree.php' }, function(file) {
        alert(file);

    });
		$("#rr").fadeOut(2400);
    $("#dialog").dialog( "close" );

        });


context.init({preventDoubleContext: false});



	context.settings({compress: true});



	context.attach('#fileexplorer', [


	{text: 'Reload', action: function(e, selector) { $("#fileexplorer").fileTree({ root: '/var/www/html/Devbox/src/App/Users/<?php echo $_SESSION['login']."/";?>', script: 'triggers/jqueryFileTree.php' }, function(file) {
        alert(file);

    }); } },



	{text: 'Create', href: '#'},

	{text: 'Rename', href: '#'},

	{text: 'Delete', href: '#'},


	]);


});
</script>


</body>
</html>
