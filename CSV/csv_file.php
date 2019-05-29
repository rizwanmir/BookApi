<pre>
<?php
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
//include_once '../charge.php';
$filename = '../UploadedFiles/books.txt';
// The nested array to hold all the arrays
$books = [];
$books[] = ['ISBN', 'Book title', 'Pages'];
// Open the file for reading
if ($file_handle = fopen($filename, 'r')) {
    // Read one line from the csv file, use comma as separator
    while ($data = fgetcsv($file_handle)) {
        $books[] = fill_book($data[0]);
    }
    // Close the file
    fclose($file_handle);
}
// Display the code in a readable format
// var_dump($books);

if ($books) {
    $filename = 'new_books.csv';
    $file_to_write = fopen($filename, 'w');
    $file_success = true;
    foreach ($books as $book) {
//        $book = fill_book($book[0]);
        //var_dump($book);
        $file_success = $file_success && fputcsv($file_to_write, $book);
    }
    fclose($file_to_write);
    if ($file_success) {
        echo '<h2>Books API</h2>';
        foreach($result['results'] as $obj) {
            echo "<table>";
             echo '<tr><td><strong>ISBN:</strong></td><td>'.$obj["ISBN"].'</td></tr>';
             echo '<tr><td><strong>Title:</strong></td><td>'.$obj["Namn"].'</td></tr>';
             //echo '<tr><td>Description:</td><td>'.$obj["Beskrivning"].'</td></tr>';
             echo '<tr><td><strong>Number of Pages:</strong></td><td>'.$obj["Sidantal"].'</td></tr>';
             echo '</table>';
             echo '</br>';
            }
        echo '<a href="' . $filename . '">Download file</a>';
    } else {
        echo 'There is some error';
    }
}
function fill_book($isbn)
{
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

    $book = [];
    $book[0] = $result['results'][0]['ISBN'];
    $book[1] = $result['results'][0]['Namn'];
    $book[2] = $result['results'][0]['Sidantal'];
    return $book;
    
}