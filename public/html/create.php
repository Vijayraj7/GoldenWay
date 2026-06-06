<?php

$url = 'https://globalmarketstars.com/html/create.html';


// Initialize cURL session
$curl = curl_init($url);

// Set cURL options
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Return the response instead of outputting it
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true); // Follow redirects if any

// Execute cURL session and fetch data
$response = curl_exec($curl);

// Close cURL session
curl_close($curl);

// Output the response from the JavaScript function
// Check for errors
if ($response === false) {
    $error = curl_error($curl);
    echo "cURL Error: " . $error;
} else {
    // Process the $response data as needed
    echo $response;
}