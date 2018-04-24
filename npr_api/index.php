<?php
/*
 *
 * This example exhibits pulling data from the NPR API
 * The data comes packaged as XML.  In a real-world application, you would parse that XML and display some of the data as regular HTML in a regular webpage.
 *
 * See official NPR API documentation here: http://www.npr.org/api
 * Test out the API calls here: http://www.npr.org/api/queryGenerator.php
 *
 */

//api url we got by testing from their console
//notice that our unique api key that we get when registering is part of the query string
$apiURL = "http://api.npr.org/query?id=1056&apiKey=MDEyNzMzMzk4MDEzODYyNzkwOTRkNDA5Ng001";

//use the PHP curl library to request data from the API
$ch = curl_init();

//set URL to request
curl_setopt($ch, CURLOPT_URL, $apiURL);

//tell curl not to output the response automatically
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//set the user agent string that is sent with the request
//our program is pretending to be Google Chrome
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_8_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/29.0.1547.62 Safari/537.36");

//execute the http request and store the response
$response = curl_exec($ch);

//send to the browser the data we get back from the request
echo $response; //this is for debugging only

//in a real application, you would now extract the parts of this data that you were interested in, and display it nicely using HTML and CSS to make it look nice.
//to do this would require you to parse the XML code
//there are ready-to-use XML parser libraries available in all major programming languages
//see the other file in this folder for an example

?>