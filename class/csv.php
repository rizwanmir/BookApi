<?php

class CSV 
{
    public function fill_book($isbn)
    {
    $book = [];
    $book[0] = $isbn;
    $curl = curl_init();
  
    // books api for getting data
    curl_setopt_array($curl, array(
    CURLOPT_URL => "http://apiprojekt.mistert.se/APIcourse/Pages/query_response.php?table=Books&apikey=5cec0d2413d45&ISBN=$isbn",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache"
    ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
$result = json_decode($response, true);
    
    $book[1] = $result['results'][0]['Namn'];
    $book[2] = $result['results'][0]['Sidantal'];
    $book[3] = $result['results'][0]['Pubid'];

    $pub_id = $book[3];

    if (isset($pub_id)) 
        {
    //$book[0] = $isbn;
    $curl = curl_init();
  
    // api to get the publishers against books
    curl_setopt_array($curl, array(
    CURLOPT_URL => "http://apiprojekt.mistert.se/APIcourse/Pages/query_response.php?table=Publisher&apikey=5cec0d2413d45&id=$pub_id",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache"
    ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
$result = json_decode($response, true);

$book[4] = $result['results'][0]['Namn'];
        }
    return $book;
    }

}