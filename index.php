<?php include_once("header.html"); ?>
	<div class="row">
		<div class="span3">
			<aside id="sidebar">
				<ul class="nav nav-list">
					<li><a href="#">Home</a></li>
					<li><a href="#">Reviews</a></li>
					<li><a href="#">News</a></li>
					<li><a href="#">Home</a></li>
				</ul>
			</aside>
		</div>
		<div class="span9">
			<div id="content">

			</div>
		</div>
	</div>
</div>

<!-- SCRIPTS -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap-transition.js"></script>
<script src="assets/js/bootstrap-alert.js"></script>
<script src="assets/js/bootstrap-modal.js"></script>
<script src="assets/js/bootstrap-dropdown.js"></script>
<script src="assets/js/bootstrap-tab.js"></script>
<script src="assets/js/bootstrap-tooltip.js"></script>
<script src="assets/js/bootstrap-popover.js"></script>
<script src="assets/js/bootstrap-button.js"></script>
<script src="assets/js/bootstrap-collapse.js"></script>
<script src="assets/js/bootstrap-typeahead.js"></script>
<script language="javascript">

/* Content loader */
function loadData(node){
    $("#content").html('<span class="load"><img src="assets/img/loading.gif" alt="Loading..." /></span>');
	var url = "view_post.php";
	$.post(url, {id: node}, function(data) {
		$("#content").html(data).hide().fadeIn("slow");
		var title = document.getElementsByTagName("H1")[0];
		document.title = title.innerHTML;
	});
}

function loadFile(page){
    $("#content").html('<span class="load"><img src="assets/img/loading.gif" alt="Loading..." /></span>');
    $.click(function(){
        $.get( "" + page + "" , function(data){
            $("#content").html(data).hide().fadeIn("slow");
        });
    });
}


/* Default display*/
$(document).ready(function(){
    $.get("employee.php", function(data){
        $("#content").html(data).hide().fadeIn("slow");
    });
});

</script>
</body>
</html>