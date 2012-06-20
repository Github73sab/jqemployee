<?php
require('includes/ex1.inc.php');


function getPayPalBtn($total) {
    $paypal_email = 'your_paypal_email@your.com';
    $desc = 'Your order description'; // could be based on order, or static
    $return_url = 'http://www.your_url.com/orders/thankyou.html'; // thank you page
    $cancel_url = 'http://www.your_url.com'; // if user cancels rather than paying
    // could build string of order details (product abbr, qty)
    $custom = ''; // up to 256 chars
    
    // other possible fields to add to form: invoice, shipping, tax_cart
    $str = <<<EOS
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="cmd" value="_xclick" />
    <input type="hidden" name="business" value="$paypal_email" />
    <input type="hidden" name="amount" value="$total" />
    <input type="hidden" name="item_name" value="$desc" />
    <input type="hidden" name="custom" value="$custom" />
    <input type="hidden" name="return" value="$return_url" />
    <input type="hidden" name="cancel_return" value="$cancel_url" />
    <input type="image" name="submit "border="0" 
        src="https://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" 
        alt="PayPal - The safer, easier way to pay online" /> 
</form>
EOS;
    return $str;
}

function getOrderInfo() {
    global $PRODUCTS;;
    $str = ''; $total = 0;
    while ( list($key, $val) = each($_POST) ) {
        // Check for valid quantity entries > 0
        if ( ( strpos($key, '_qty') !== false ) && is_int( (int)$val) && $val > 0  ) { 
            $pt = strrpos($key, '_qty'); 
            $name_pt = substr( $key, 0, $pt); // product abbr
            
            foreach($PRODUCTS as $product) {
                list($prod_abbr, $prod_name, $prod_price) = $product;
                if ($prod_abbr == $name_pt) {
                    $sub_tot = $val * $prod_price;
                    // build string to display order info
                    $str .= "<p>$val $prod_name at $" . number_format($prod_price, 2) . 
                        ' each for $' . number_format($sub_tot, 2) . '</p>';
                    $total += $sub_tot;
                }
            }
        }
    }
    if ( $str === '' ) {
        $str = '<p>You didn\'t order anything.</p>';
    } else {
        $str = '<h2>Your Order:</h2>' . $str . '<p>Total: $' .  number_format($total, 2) . '</p>' . getPayPalBtn($total);
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
echo getOrderInfo();
?>
    
    
<p>The PayPal button can be further configured for your use. See code comments and PayPal's documentation. </p>

<p>Back to <a href=".">index</a></p>
</body>
</html>