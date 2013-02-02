<?php

if (isset($_POST['item']))
{
    
    $code= $_POST['item'];
    
    $dbconn = pg_connect("host=localhost port=5432 dbname=mallow_soft user=postgres password=password");
    
    if (!$dbconn)
    {
        die("Error in connection: " . pg_last_error());
    }
    
    
    $sql="select payment_terms_id from customer where customer_code='$code'";
    
    $result = pg_query($dbconn, $sql);
    
    if (!$result)
    {
        die("Error in SQL query: " . pg_last_error());
    }
    
    while ($row = pg_fetch_array($result))
    {

        $payment_id=$row[payment_terms_id];
    }
    
    $sql="select payment_terms from payment_terms where payment_terms_id='$payment_id'";
    
    $result = pg_query($dbconn, $sql);
    
    if (!$result)
    {
        die("Error in SQL query: " . pg_last_error());
    }
    
    while ($row = pg_fetch_array($result))
    {
        print($row[payment_terms]);
    }
    
    pg_close($dbconn);
    
}
?>