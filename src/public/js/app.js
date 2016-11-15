ace.require("ace/ext/language_tools");

var editor = ace.edit("editor");
editor.setTheme("ace/theme/tomorrow");
editor.session.setMode("ace/mode/java");

// enable autocompletion and snippets
editor.setOptions({
    enableBasicAutocompletion: true,
    enableSnippets: true,
    enableLiveAutocompletion: true
});


  	$(document).ready( function() {

      context.init({preventDoubleContext: false});



      context.settings({compress: true});



      context.attach('#fileexplorer', [


        {text: 'Reload', action: function(e, selector) { $("#fileexplorer").fileTree({ root: '<?php echo __DIR__."/../../App/Users/eva/";?>', script: '../../App/triggers/jqueryFileTree.php' }, function(file) {
          alert(file);

        });}} ,


        {text: 'Rename', function(e, selector) {
        alert("Rename test alert");
      }},


        {text: 'Delete', function(e, selector) {
        alert("delete test alert");
        }}
      ]);

      context.attach('#editor', [

        {text: 'Copy', href: '#'},
        {text: 'Cut', href: '#'},
        {text: 'Paste', href: '#'},





      ]);
      //project management
      $("#createp").click(function(){
        $.ajax({
          url : "triggers/add_user.php",
          method : "GET",
          data : {
            username : $("#username").val(),
            login : $("#login").val(),
            pwd : $("#pwd").val()
          },
          success : function(data) {
            $("#div1").html(data).fadeOut(2400);
          }
        });

});
//file management
$("#createf").click(function(){
  $.ajax({
    url : "triggers/add_user.php",
    method : "GET",
    data : {
      username : $("#username").val(),
      login : $("#login").val(),
      pwd : $("#pwd").val()
    },
    success : function(data) {
      $("#div1").html(data).fadeOut(2400);
    }
  });

});
//text management
$("#savef").click(function(){
  $.ajax({
    url : "triggers/add_user.php",
    method : "GET",
    data : {
      username : $("#username").val(),
      login : $("#login").val(),
      pwd : $("#pwd").val()
    },
    success : function(data) {
      $("#div1").html(data).fadeOut(2400);
    }
  });

});
//Delete Project
$("#savef").click(function(){
  $.ajax({
    url : "triggers/add_user.php",
    method : "GET",
    data : {
      username : $("#username").val(),
      login : $("#login").val(),
      pwd : $("#pwd").val()
    },
    success : function(data) {
      $("#div1").html(data).fadeOut(2400);
    }
  });

});
//Delete File
$("#savef").click(function(){
  $.ajax({
    url : "triggers/add_user.php",
    method : "GET",
    data : {
      username : $("#username").val(),
      login : $("#login").val(),
      pwd : $("#pwd").val()
    },
    success : function(data) {
      $("#div1").html(data).fadeOut(2400);
    }
  });

});
//Rename Project
$("#savef").click(function(){
  $.ajax({
    url : "triggers/add_user.php",
    method : "GET",
    data : {
      username : $("#username").val(),
      login : $("#login").val(),
      pwd : $("#pwd").val()
    },
    success : function(data) {
      $("#div1").html(data).fadeOut(2400);
    }
  });

});
//Rename File
$("#savef").click(function(){
  $.ajax({
    url : "triggers/add_user.php",
    method : "GET",
    data : {
      username : $("#username").val(),
      login : $("#login").val(),
      pwd : $("#pwd").val()
    },
    success : function(data) {
      $("#div1").html(data).fadeOut(2400);
    }
  });

});

});
