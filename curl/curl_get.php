<pre>
<?php
// Set URL.
$url = 'http://apiprojekt.mistert.se/APIcourse/Pages/query_response.php?table=Books&apikey=5ce27b7a92ccf';
//$url = 'http://jsonplaceholder.typicode.com/posts/3';
// Create a curl instance.
$ch = curl_init($url);
// Setup curl options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Perform the request and get the response.
$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
// print_r($result['results'][0]['ISBN']);

 // echo $result['results'][0]['ISBN'];
foreach($result['results'] as $obj) {
echo "<table>";
 echo '<tr><td>ISBN:</td><td>'.$obj["ISBN"].'</td></tr>';
 echo '<tr><td>Title:</td><td>'.$obj["Namn"].'</td></tr>';
 //echo '<tr><td>Description:</td><td>'.$obj["Beskrivning"].'</td></tr>';
 echo '<tr><td>Number of Pages:</td><td>'.$obj["Sidantal"].'</td></tr>';
 echo '</table>';
}