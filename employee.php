<script type="text/javascript">
	$(document).ready(function(){
		$('a.show-detail').click(function(){
			$(this).parent().parent().next().fadeToggle("slow");
		});
		
		$('.add-employee').click(function(){
			$("#add-employee").fadeToggle()
		});
	});
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
				<label class="control-label span1" for="full-name">Full Name &nbsp;</label>
				<div class="controls"><input type="text" class="input-large" id="full-name"></div>
			</div>
			<div class="control-group">
				<label class="control-label span1" for="address">Address &nbsp;</label>
				<div class="controls"><textarea type="text" class="input-large" id="address"></textarea></div>
			</div>				
			<div class="control-group">
				<label class="control-label span1" for="birth-date">Birth Date &nbsp;</label>
				<div class="controls"><input type="text" class="input-small" id="birth-date"></div>
			</div>			
			<div class="control-group">
				<label class="control-label span1" for="post-code">Post Code &nbsp;</label>
				<div class="controls"><input type="text" class="input-small" id="post-code"></div>
			</div>	
			<div class="control-group">
				<label class="control-label span1" for="phone">Phone Number &nbsp;</label>
				<div class="controls"><input type="text" class="input-small" id="phone"></div>
			</div>			
				<div class="control-group" style="float:right;padding-right:40px;">
					<a class="btn add-employee">Cancel</a>
					<a class="btn btn-primary add-employee">Submit</a>
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
    		
    	$data_detail .= " Address = ". $row['Address']." <br/> ";
    	$data_detail .= " Address = ". $row['Address']." <br/> ";
		$data_detail .= " Address = ". $row['Address']." <br/> ";
		$data_detail .= " Address = ". $row['Address']." <br/> ";
		
    	$tbl->addRow();
    	$tbl->addCell($row['Id']);
		$tbl->addCell('<a class="show-detail" href="#">'.$row['FullName'].'</a>');
		$tbl->addCell($row['EmployeeID']);
		$tbl->addCell($row['Mobile']);
    	$tbl->addRow($class="hide");
    	$tbl->addCell();
		$tbl->addCell('<table ><tr><td>'.$row["Address"].' '.$row["PostCode"].'</td></tr></table>',NULL,'data',array('colspan'=>3));
    }
	
	echo $tbl->display();
  }

  $DB = null;        // Disconnect

?>