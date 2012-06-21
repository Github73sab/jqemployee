<script type="text/javascript">
	$(document).ready(function(){
		$('a.show-detail').click(function(){
			$(this).parent().parent().next().fadeToggle("slow");
		});
		
		$('.add-employee').click(function(){
			$("#add-employee").fadeToggle();
		});

	});
</script>

<script type="text/javascript">
			
		$('form').submit(function(){			
			var eid = ($'#employee-id').attr('value');
			var fullname = ($'#fullname').attr('value');
			var address = ($'#address').attr('value');
			var birthdate = ($'#birthdate').attr('value');
			var postcode = ($'#postcode').attr('value');
			var phone = ($'#phone').attr('value');					
		})
	
</script>
<div class="btn-group">
	<a class="btn add-employee"><i class="icon-plus"></i> Add</a>
	<a class="btn"><i class="icon-edit"></i> Edit</a>
</div>
<br/>

<!-- Add employee -->
<div id="add-employee">
	<form class="form-horizontal">	
			<div class="control-group">
				<label class="control-label span1" for="employee-id">Employee ID &nbsp;</label>
				<div class="controls"><input type="text" class="input-small" id="employee-id"></div>
			</div>
			<div class="control-group">
				<label class="control-label span1" for="fullname">Full Name &nbsp;</label>
				<div class="controls"><input type="text" class="input-large" id="fullname"></div>
			</div>
			<div class="control-group">
				<label class="control-label span1" for="address">Address &nbsp;</label>
				<div class="controls"><textarea type="text" class="input-large" id="address"></textarea></div>
			</div>				
			<div class="control-group">
				<label class="control-label span1" for="birthdate">Birth Date &nbsp;</label>
				<div class="controls"><input type="text" class="input-small" id="birthdate"></div>
			</div>			
			<div class="control-group">
				<label class="control-label span1" for="postcode">Post Code &nbsp;</label>
				<div class="controls"><input type="text" class="input-small" id="postcode"></div>
			</div>	
			<div class="control-group">
				<label class="control-label span1" for="phone">Phone Number &nbsp;</label>
				<div class="controls"><input type="text" class="input-small" id="phone"></div>
			</div>			
				<div class="control-group" style="float:right;padding-right:40px;">
					<a class="btn add-employee">Cancel</a>
					<input type="submit" class="btn btn-primary add-employee">Submit</a>
				</div>										
	</form>
</div>
<br/>

<?php
require("db.inc.php");
require("table.class.php");

$query = "SELECT * FROM employee";
$result = $DB->query($query);

if($result !== false) {
    $rows = $result->rowCount();           // Number of returned columns
    $data_detail = "";
	$tbl = new HTML_Table($id=NULL,$class="table table-bordered");
	$tbl->addRow();
	$tbl->addCell('No.',NULL,'header');
	$tbl->addCell('Nama Lengkap',NULL,'header');
	$tbl->addCell('Employee ID',NULL,'header');
	$tbl->addCell('Phone',NULL,'header');
	
    // Parse the result set
    foreach($result as $row) {
		
    	$tbl->addRow();
    	$tbl->addCell($row['uid']);
		$tbl->addCell('<a class="show-detail" href="#">'.$row['full_name'].'</a>');
		$tbl->addCell($row['employee_id']);
		$tbl->addCell($row['phone']);
    	$tbl->addRow($class="hide");
    	$tbl->addCell();
		$tbl->addCell('<table class="table table-bordered">
							<tr><th>Address</th><th>PostCode</th></tr>
							<tr><td>'.$row["address"].'</td><td>'.$row["postcode"].'</td></tr>
						</table>',
						NULL,'data',array('colspan'=>3));
    }
	
	echo $tbl->display();
  }

  $DB = null;        // Disconnect

?>