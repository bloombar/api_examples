<?php

//connect to db
$mysqli = new mysqli(	"warehouse.cims.nyu.edu", 
						"amos", 
						"pqvksah8",
						"amos_api_example_db");	

//output connection errors
print($mysqli->connect_error);

//assemble the where clause of the query
$whereClause = ""; //default blank
$resultsHeading = "";
if (!empty($_REQUEST['letter'])) {
	//if letter exists, use it in where clause
	$letter = $mysqli->real_escape_string($_REQUEST['letter']);
	if (!empty($letter)) {
		$whereClause = " AND name LIKE '{$letter}%' ";
		$resultsHeading = " starting with '{$letter}'";
	}
}

//make a query
$result = $mysqli->query("SELECT * FROM animals WHERE 1 {$whereClause} ORDER BY name ASC");

//output any query errors
print($mysqli->error);

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Animal API Example</title>
		<link rel="stylesheet" type="text/css" href="/~ab1258/api_examples/custom_api/css/main.css" />
	</head>
	<body>
		<div class="container">
			<h1>Animal List</h1>
			<p>Pulling data from the Animal API</p>
			<nav>

				<a href="/~ab1258/api_examples/custom_api/get/all">Show all</a>

				<ul>
<?php $letters = range('A', 'Z'); ?>
<?php foreach ($letters as $letter) : ?>

					<li>
						<a href="/~ab1258/api_examples/custom_api/get/letter/<?php print($letter); ?>">
							<?php print($letter); ?>
						</a>
					</li>

<?php endforeach; ?>
					<div class="clear"></div>
				</ul>
			</nav>

			<p class="results_heading">Showing <?php print($result->num_rows); ?> animals <?php print($resultsHeading); ?></p>

			<ul>

<?php while ($row = $result->fetch_assoc()) : ?>

				<li><?php echo $row['name']; ?></li>

<?php endwhile; ?>

			</ul>

	</body>
</html>
