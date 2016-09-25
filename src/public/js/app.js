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

});
