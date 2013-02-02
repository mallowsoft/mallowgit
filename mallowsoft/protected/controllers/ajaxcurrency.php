<?php

if (isset($_POST['item']))
{
    
    $code= $_POST['item'];
    
    $dbconn = pg_connect("host=localhost port=5432 dbname=mallow_soft user=postgres password=password");
    
    if (!$dbconn)
    {
        die("Error in connection: " . pg_last_error());
    }
    
    
    $sql="select currency_id from customer where customer_code='$code'";
    
    $result = pg_query($dbconn, $sql);
    
    if (!$result)
    {
        die("Error in SQL query: " . pg_last_error());
    }
    
    while ($row = pg_fetch_array($result))
    {

        $curr_id=$row[currency_id];
    }
    
    $sql="select currency_code,currency_symbol from currency where currency_id ='$curr_id'";
    
    $result = pg_query($dbconn, $sql);
    
    if (!$result)
    {
        die("Error in SQL query: " . pg_last_error());
    }
    
    while ($row = pg_fetch_array($result))
    {
        print($row[currency_code]);
    }
    
    pg_close($dbconn);
    
}
?>