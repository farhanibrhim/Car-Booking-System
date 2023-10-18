<?php
include('dbconnect.php');
include 'cbssession.php';

if (!session_id()) {
	session_start();
}

include 'headerstaff.php';

//Retrieve new bookings
$sql = "SELECT * FROM tb_b 
		LEFT JOIN tb_v ON tb_b.b_vehicle = tb_v.v_id
		LEFT JOIN tb_bookstatus ON tb_b.b_status = tb_bookstatus.s_id
		LEFT JOIN tb_user ON tb_b.b_customer = tb_user.u_id
		WHERE b_status != '1'";

$result = mysqli_query($con, $sql);

?>
<div class="container">
	<br>
	<h3>New Booking Lists</h3>
	<br>
	<table class="table table-hover">
		<form action="" method="GET">
			<div class="input-group mb-3">
				<input type="text" name="search" required value="<?php if (isset($_GET['search'])) {
					echo $_GET['search'];
				} ?>" class="form-control" placeholder="Search">
				<button type="submit" class="btn btn-primary">Search</button>
			</div>
		</form>
		<span class="counter pull-right">
		</span><br>
		<thead>
			<tr>
				<th scope="col">Booking ID</th>
				<th scope="col">Image</th>
				<th scope="col">Name</th>
				<th scope="col">Vehicle</th>
				<th scope="col">Pick-up Date</th>
				<th scope="col">Return Date</th>
				<th scope="col">Total price</th>
				<th scope="col">Status</th>
				<th scope="col">Operation</th>
			</tr>
		</thead>
		<tbody>

			<?php
			while ($row = mysqli_fetch_array($result)) {
				echo '<tr>';
				echo "<td>" . $row["b_id"] . "</td>";
				echo "<td><img style='height:150px;' src='img/vehicle/" . $row['v_media'] . "'>";
				echo "<td>" . $row["u_name"] . "</td>";
				echo "<td>" . $row["v_model"] . "</td>";
				echo "<td>" . $row["b_pickdate"] . "</td>";
				echo "<td>" . $row["b_retdate"] . "</td>";
				echo "<td>" . $row["b_totalprice"] . "</td>";
				echo "<td>" . $row["s_desc"] . "</td>";
				echo "<td>";
				echo "<a href='staffchange.php?id=" . $row['b_id'] . "' class='btn btn-outline-warning btn-sm'>Modify</a> &nbsp";
				echo "</td>";
				echo '</tr>';
			}
			?>
		</tbody>
	</table>
</div>
<script>
	window.onload = function () {
		var error = "<?php echo $_GET['error']; ?>";
		if (error) {
			alert(error);
		}
	}
</script>

<?php include'footermain.php' ?>