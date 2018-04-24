<?php
/*
 * This example exhibits pulling data from the NPR API
 * The data comes packaged as XML.  We then parse that XML and display some of the data as regular HTML in a regular webpage.
 *
 * See official NPR API documentation here: http://www.npr.org/api
 * Test out the API calls here: http://www.npr.org/api/queryGenerator.php
 *
 */

//api url we got by testing from their console
//notice that our unique api key that we get when registering at NPR.org is part of the query string
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

//convert the XML into a usable PHP object using PHP's built-in SimpleXML Parser
$data = simplexml_load_string($response); 

//see usage of this data embedded in the HTML below:

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Example Usage of NPR API</title>
		<style>
 div#wrapper {
 	width: 940px; /* fix width of page */
 	margin: 0 auto; /* center page */
 	border: 1px solid #c0c0c0; /*light gray border around page */
 	padding: 20px;
 }
 section#data article {
 	padding: 10px; /* space out articles */
 	border-bottom: 1px solid #c0c0c0; /* divider between articles */
 } 
		</style>
	</head>
	<body>
		<div id="wrapper">
			<header>
				<h1>Example usage of the NPR API</h1>
				<p>
					This is a nicer version of <a href="index.php">the raw XML scraper version</a>.
				</p>.
			</header>
			<section id="data">
				<h1><?php echo $data->list->title; ?></h1>
				<p>Why do they give this data away for free?</p>

			<!-- begin loop through all the story tags in the XML object -->

<?php foreach ($data->list->story as $story) : ?>

				<article>
					<!-- output the heading for this story -->
					<h1><?php echo $story->title; ?></h1>

					<!-- output the teaser for this story -->	
					<p>
						<?php echo $story->teaser; ?>
						...<a href="<?php echo $story->link; ?>">more at NPR.org</a>...
					</p>

					<!-- output the audio tag if there is audio for this story -->
					
	<?php if ($story->audio->format->mp4) : ?>

					<audio src="<?php echo $story->audio->format->mp4; ?>" controls />

	<?php endif; ?>

				</article>

<?php endforeach; ?>

			<!-- end loop through stories -->

			</section>

		</div>
	</body>
</html>
