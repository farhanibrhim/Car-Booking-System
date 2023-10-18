<?php
include("dbconnect.php");
include 'cbssession.php';

if (!session_id()) {
	session_start();
}

include 'headerstaff.php';

// get booking id from URL
if (isset($_GET['id'])) {
	$bid = $_GET['id'];
}

//Retrieve new bookings
$sql = "SELECT * FROM tb_b 
		LEFT JOIN tb_v ON tb_b.b_vehicle = tb_v.v_id
		LEFT JOIN tb_bookstatus ON tb_b.b_status = tb_bookstatus.s_id
		LEFT JOIN tb_user ON tb_b.b_customer = tb_user.u_id
		WHERE b_id = $bid";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

?>

<div class="container">
	<br>
	<h3>New Booking Details</h3>

		<table class="table table-hover">
			<tr>
				<td>Booking ID</td>
				<td>
					<?php echo $bid; ?>
				</td>
			</tr>
			<tr>
				<td>Customer Name</td>
				<td>
					<?php echo $row["u_name"]; ?>
				</td>
			</tr>
			<tr>
				<td>Customer Contact</td>
				<td>
					<?php echo $row["u_phone"]; ?>
				</td>
			</tr>
			<tr>
				<td>Customer Address</td>
				<td>
					<?php echo $row["u_address"]; ?>
				</td>
			</tr>
			<tr>
				<td>Vehicle</td>
				<td>
					<?php echo $row["v_model"]; ?>
				</td>
			</tr>
			<tr>
				<td>Vehicle Image</td>
				<td><img style='height:150px;' src="img/vehicle/<?php echo $row['v_media']; ?>" /></td>
			</tr>
			<tr>
				<td>Pickup Date</td>
				<td>
					<?php echo $row["b_pickdate"]; ?>
				</td>
			</tr>
			<tr>
				<td>Return Date</td>
				<td>
					<?php echo $row["b_retdate"]; ?>
				</td>
			</tr>
			<tr>
				<td>Total price</td>
				<?php
				$floatValue = $row['b_totalprice'];
				$formattedValue = number_format($floatValue, 2);
				?>
				<td>RM
					<?php echo $formattedValue ?>
				</td>
			</tr>
			<tr>
				<td>Approval</td>
				<td>
					<?php echo $row["s_desc"]; ?>
				</td>
			</tr>
		</table>
		<a href="staff.php" type="button" class="btn btn-outline-success" >Back</a>
	<script>
		window.onload = function () {
			var error = "<?php echo $_GET['error']; ?>";
			if (error) {
				alert(error);
			}
		}
	</script>
</div>
<?php include'footermain.php' ?>