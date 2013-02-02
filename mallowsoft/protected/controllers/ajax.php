<?php
if (isset($_POST['item']))
{

    $code= $_POST['item'];
    
    $dbconn = pg_connect("host=localhost port=5432 dbname=mallow_soft user=postgres password=password");
    
    if (!$dbconn)
    {
        die("Error in connection: " . pg_last_error());
    }
        
    $sql="select destination_port,delivery_terms_id,payment_terms_id,currency_id from customer where customer_code='$code'";
    
    $result = pg_query($dbconn, $sql);
    
    if (!$result)
    {
        die("Error in SQL query: " . pg_last_error());
    }
    
    while ($row = pg_fetch_array($result))
    {
        print($row[destination_port]);
    }
    

    pg_close($dbconn);
    
}
?>
