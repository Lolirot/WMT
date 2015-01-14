//Commented code is for accessing variables returned from the query on the database will change depending on query

<?php
    $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
    $yql_query = 'INSERT QUERY';
    $yql_query_url = $BASE_URL."?q=".urlencode($yql_query)."&format=json&env=http%3A%2F%2Fdatatables.org%2Falltables.env";
    $session = curl_init($yql_query_url);
    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
    $json = curl_exec($session);
    $phpObj =  json_decode($json);
    //$symbols = $phpObj->query->results->quote[0]->symbol;
    //echo $symbols;
?>
