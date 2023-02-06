<?php
// prepare to gather data
    $host = 'localhost';
    $dbname = 'cmuh crs cancer database';
    $username = 'root';
    $password = '12345678';
try {
$dbo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}

// gather data for result table
try {
    $sql2 = 'SELECT Chart, ID, Name, Gender, Time FROM basic_information ORDER BY 
    Chart ASC';
	
    $q = $dbo->query($sql2);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>CMUH CRS Cancer Database</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
<div id="container">
	<h1>CMUH CRS Cancer Database</h1><br>
	<form name="form1" method="post">
		<select id="table-filter">
			<option value="Chart" selected>病歷號</option>
			<option value="ID">身分證</option>
			<option value="Name">姓名</option>
			<option value="Time">編輯時間</option>
			<!-- Add options for each rank category in categories -->
		</select>
	</form>
	<table class="table table-bordered table-condensed">
		<thead>
		<tr>
			<th>No.</th>
			<th>病歷號</th>
			<th>身分證</th>
			<th>姓名</th>
			<th>性別</th>
			<th>編輯時間</th>
		</tr>
		</thead>
		<tbody>
		<?php while ($row = $q->fetch()): ?>
			<tr>
			<td><?php echo htmlspecialchars($row['id']) ?></td>
			<td><?php echo htmlspecialchars($row['Chart']); ?></td>
			<td><?php echo htmlspecialchars($row['ID']); ?></td>
			<td><?php echo htmlspecialchars($row['Name']); ?></td>
			<td><?php echo htmlspecialchars($row['Gender']); ?></td>
			<td><?php echo htmlspecialchars($row['Time']); ?></td>
			</tr>
		<?php endwhile; ?>
		</tbody>
	</table>
</div>
<script>
  	const tablefilter = document.getElementById("table-filter");

	tablefilter.addEventListener("change", function() {
	const selectedRank = this.value;

	// Update the WHERE clause of the SELECT query to filter by the selected option
	let query = "SELECT * FROM basic_information";
	if (selectedRank) {
		query += ` ORDER BY ${selectedRank} ASC`;
	}

	// Execute the updated query and update the HTML table with the results
	executeQuery(query);
	});
</script>
</body>
</html>