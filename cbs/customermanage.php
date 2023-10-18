<?php
include('dbconnect.php');
include 'cbssession.php';

if (!session_id()) {
	session_start();
}

include 'headercustomer.php';

$uid = $_SESSION['uid'];
?>

<div class="container">
	<br>
	<h3>Your Booking Lists</h3>
	<table class="table table-hover">
		<form action="" method="GET">
			<div class="input-group mb-3">
				<input type="text" name="search" value="<?php if (isset($_GET['search'])) {
					echo $_GET['search'];
				} ?>" class="form-control" placeholder="Search your booking id or car's model">
				<button type="submit" class="btn btn-primary">Search</button>
			</div>
		</form>
		<thead>
			<tr>
				<th scope="col">Booking ID</th>
				<th scope="col">Image</th>
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
			if (isset($_GET['search'])) {
				$filtervalues = $_GET['search'];
				$query = "SELECT * FROM tb_b 
               				LEFT JOIN tb_v ON tb_b.b_vehicle = tb_v.v_id
							LEFT JOIN tb_bookstatus ON tb_b.b_status = tb_bookstatus.s_id
							LEFT JOIN tb_user ON tb_b.b_customer = tb_user.u_id
							WHERE b_customer='$uid' AND (v_model LIKE '%$filtervalues%' OR b_id LIKE '%$filtervalues%')";
				$query_run = mysqli_query($con, $query);

				if (mysqli_num_rows($query_run) > 0) {
					foreach ($query_run as $items) {
						?>
						<?php

						$floatValue = $items['b_totalprice'];
						$formattedValue = number_format($floatValue, 2);

						echo '<tr>';
						echo "<td>" . $items["b_id"] . "</td>";
						echo "<td><img style='height:100px;' src='img/vehicle/" . $items['v_media'] . "'>";
						echo "<td>" . $items["v_model"] . "</td>";
						echo "<td>" . $items["b_pickdate"] . "</td>";
						echo "<td>" . $items["b_retdate"] . "</td>";
						echo "<td>RM" . $formattedValue . "</td>";
						echo "<td>" . $items["s_desc"] . "</td>";
						echo "<td>";
						echo "<a href='customermodify.php?id=" . $items['b_id'] . "' class='btn btn-warning'>Modify</a> &nbsp";
						echo "<a href='customercancel.php?id=" . $items['b_id'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to cancel the booking?\");'>Cancel</a>";
						echo "</td>";
						echo '</tr>';
					}
				} else {
					?>
					<tr>
						<td colspan="4">No Record Found</td>
					</tr>
					<?php
				}
			} else {
				if (isset($_GET['search']) == "") {
					$sql = "SELECT * FROM tb_b 
					 		LEFT JOIN tb_v ON tb_b.b_vehicle = tb_v.v_id
							LEFT JOIN tb_bookstatus ON tb_b.b_status = tb_bookstatus.s_id
							LEFT JOIN tb_user ON tb_b.b_customer = tb_user.u_id
							WHERE b_customer='$uid'";

					$result = mysqli_query($con, $sql);

					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) {

							$floatValue = $row['b_totalprice'];
							$formattedValue = number_format($floatValue, 2);

							echo '<tr>';
							echo "<td>" . $row["b_id"] . "</td>";
							echo "<td><img style='height:100px;' src='img/vehicle/" . $row['v_media'] . "'>";
							echo "<td>" . $row["v_model"] . "</td>";
							echo "<td>" . $row["b_pickdate"] . "</td>";
							echo "<td>" . $row["b_retdate"] . "</td>";
							echo "<td>RM" . $formattedValue . "</td>";
							echo "<td>" . $row["s_desc"] . "</td>";
							echo "<td>";
							echo "<a href='customermodify.php?id=" . $row['b_id'] . "' class='btn btn-warning'>Modify</a> &nbsp";
							echo "<a href='customercancel.php?id=" . $row['b_id'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to cancel the booking?\");'>Cancel</a>";
							echo "</td>";
							echo '</tr>';
						}
					} else {
						echo "No data in the table.";
					}
				}
			} ?>
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