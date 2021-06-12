<?php
include 'connection.php';
$output = '';
$search=$_POST['formid']?:"";


	
	$query = pg_query("
	SELECT * FROM stocks 
	WHERE name LIKE '".$search."%'");

// $result = pq_query($query);
if(pg_num_rows($query))
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Customer Name</th>
							<th>Current Market Price</th>
							<th>Stock P/E</th>
							<th>Dividend Yield</th>
							<th>Roce %</th>
						</tr>';
	while($row = pg_fetch_array($query))
	{
		$output .= '
			<tr>
				<td>'.$row["name"].'</td>
				<td>'.$row["current_price"].'</td>
				<td>'.$row["market_cap"].'</td>
				<td>'.$row["stock_pe"].'</td>
				<td>'.$row["dividendyield"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>