<!doctype html>

<head>



<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<style>
#draggable { width: 100px; height: 100px; padding: 0.5em; float: left; margin: 10px 10px 10px 0; }
#droppable { width: 150px; height: 150px; padding: 0.5em; float: left; margin: 10px; }
</style>
<script>
$(function() {
$( ".draggable" ).draggable();
$( ".droppable" ).droppable({
drop: function( event, ui ) {
$( this )
.addClass( "ui-state-highlight" )
.find( "p" )
.html( "Dropped!" );
}
});
});
</script>
</head>
<body>

<div class="draggable">
<p><img src="../img/avatars/6.png" height="120" width="120" title="" alt="" /></p>
</div>
<div class="droppable">
<p>Drop here</p>
</div>
</body>
</html>