<?php
require('includes/html_table.class.php');
require('includes/html_form.class.php');
require('includes/ex2.inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Order Form - Example 2</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="includes/ex.css" type="text/css" />
<script src="includes/validation.js" type="text/javascript"></script>
<script src="includes/ex2.js" type="text/javascript"></script>
<script type="text/javascript">
// <![CDATA[
var PRODUCT_ABBRS = <?php echo json_encode( getProductAbbrs() ) ?>;
// ]]>
</script>
</head>
<body>

<h1>Order Form - Example 2</h1>

<?php
echo getOrderForm2();
?>

</body>
</html>
