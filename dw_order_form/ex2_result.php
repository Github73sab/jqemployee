<?php
require('includes/ex2.inc.php');

function sendAdminEmail($total, $order) {
    $admin_email = 'your_addy@your.com';
    $subject = 'Order Information';
    $name = stripslashes( strip_tags( $_POST['first_name'] ) ) . ' ' . 
        stripslashes( strip_tags( $_POST['last_name'] ) );
    
    $email = stripslashes( strip_tags( $_POST['email'] ) );
    // check for valid email address
    $regex = '/^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/';
    if ( !preg_match($regex, $_POST['email']) ) {
        // don't send email
        echo '<p>Your email appears to be invalid. Please hit your browser back button to return to the previous page to enter a vaild email address.</p>';
        return;
    }
    $phone = stripslashes( strip_tags( $_POST['phone'] ) );
    $msg_body = "Order placed for: 
    $order 
    
    Total: $$total
    
    Name: $name
    Email: $email
    Phone: $phone";
    
    //echo nl2br($msg_body); // for testing
    
    //@mail($admin_email, $subject, $msg_body );
}


function handleOrderInfo() {
    global $PRODUCTS;;
    $str = ''; $total = 0; $order = '';
    while ( list($key, $val) = each($_POST) ) {
        // Check for valid quantity entries > 0
        if ( ( strpos($key, '_qty') !== false ) && is_int( (int)$val) && $val > 0  ) { 
            $pt = strrpos($key, '_qty'); // get product abbr
            $name_pt = substr( $key, 0, $pt);
            
            foreach($PRODUCTS as $product) {
                list($prod_abbr, $prod_name, $prod_price) = $product;
                if ($prod_abbr == $name_pt) {
                    $sub_tot = $val * $prod_price;
                    // build string to display order info
                    $str .= "<p>$val $prod_name at $" . number_format($prod_price, 2) . 
                        ' each for $' . number_format($sub_tot, 2) . '</p>';
                    $total += $sub_tot;
                    $order .= "$val $prod_abbr, ";
                }
            }
        }
    }
    $total = number_format($total, 2);
    $order = rtrim($order, ', ');
    if ( $str === '' ) {
        $str = '<p>You didn\'t order anything.</p>';
    } else {
        $str = "<h2>Your Order:</h2>$str<p>Total: $$total</p>";
        sendAdminEmail($total, $order);
    }
    
    return $str;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Your Order</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="includes/ex.css" type="text/css" />
</head>
<body>

<?php
echo handleOrderInfo();
?>
    
    
<p>&nbsp;</p>
<p>A <code>sendAdminEmail</code> function is included in the head of this file. You will need to place your email address there (<code>$admin_email</code>) and uncomment the <code>mail</code> function to send the emails.</p>

<p>Back to <a href=".">index</a></p>

</body>
</html>