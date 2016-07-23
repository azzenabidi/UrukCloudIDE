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



        {text: 'Create Project',action: function(e, selector) {
          $("#dialogfile").dialog({
            autoOpen: true,
            title: 'Create Project',
            height: 200,
            width: 350

          });


        }},

        {text: 'Create File',action: function(e, selector) {
          $("#dialogfile").dialog({
            autoOpen: true,
            title: 'Create File',
            height: 200,
            width: 350

          });


        }},
        {text: 'Rename',function(e, selector) {
          $("#dialogfile").dialog({
            autoOpen: true,
            title: 'Rename ',
            height: 200,
            width: 350

          });


        }},

        {text: 'Delete', href: '#'},


      ]);

      context.attach('#editor', [

        {text: 'Copy', href: '#'},
        {text: 'Cut', href: '#'},
        {text: 'Paste', href: '#'},





      ]);

});
