<?php
include('dbconnect.php');
include 'cbssession.php';

if (!session_id()) {
	session_start();
}

include 'headerstaff.php';

$sql1 = "SELECT * FROM tb_v
		LEFT JOIN tb_viewtype ON tb_v.v_viewType = tb_viewtype.viewType";

$result1 = mysqli_query($con, $sql1);

if (!$result1) {
    echo "Error: " . mysqli_error($con);
    exit();
}

//Retrieve new bookings
$sql2 = "SELECT * FROM tb_b 
		LEFT JOIN tb_v ON tb_b.b_vehicle = tb_v.v_id
		LEFT JOIN tb_bookstatus ON tb_b.b_status = tb_bookstatus.s_id
		LEFT JOIN tb_viewtype ON tb_v.v_viewType = tb_viewtype.viewType
		LEFT JOIN tb_user ON tb_b.b_customer = tb_user.u_id";

$result2 = mysqli_query($con, $sql2);

if (!$result2) {
    echo "Error: " . mysqli_error($con);
    exit();
}
?>
<body>
    <!--INVENTORY-->
        <div class="row space-rows">
        <div class="col">
            <div class="card cards-shadown cards-hover" data-aos="flip-left" data-aos-duration="950">
                <div class="card-header">
                    <div class="cardheader-text">
                        <?php
                        $sql3 = "SELECT COUNT(*) AS total FROM tb_v";
                        $result3 = $con->query($sql3);
                        if ($result3->num_rows > 0) {
                          // output data of each row
                          while($row3 = $result3->fetch_assoc()) {
                              echo "<h4 id='heading-card-1' style='font-size: 156px;text-align: center;'>". $row3["total"] . "</h4>";
                          }
                      } else {
                          echo'<h4 id="heading-card-1" style="font-size: 156px;text-align: center;">0</h4>';
                      }?>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text cardbody-sub-text">Total Vehicle</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card cards-shadown cards-hover" data-aos="flip-left" data-aos-duration="950">
                <div class="card-header">
                    <div class="cardheader-text">
                        <?php
                        $sql4 = "SELECT COUNT(*) AS total FROM tb_v WHERE v_viewType = '1'";
                        $result4 = $con->query($sql4);
                        if ($result4->num_rows > 0) {
                          // output data of each row
                          while($row4 = $result4->fetch_assoc()) {
                              echo "<h4 id='heading-card-1' style='font-size: 156px;text-align: center;'>". $row4["total"] . "</h4>";
                          }
                      } else {
                          echo'<h4 id="heading-card-1" style="font-size: 156px;text-align: center;">0</h4>';
                      }?>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text cardbody-sub-text">Total Vehicle Available</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card cards-shadown cards-hover" data-aos="flip-left" data-aos-duration="950">
                <div class="card-header">
                    <div class="cardheader-text">
                        <?php
                        $sql6 = "SELECT COUNT(*) AS total FROM tb_b";
                        $result6 = $con->query($sql6);
                        if ($result6->num_rows > 0) {
                          // output data of each row
                          while($row6 = $result6->fetch_assoc()) {
                              echo "<h4 id='heading-card-1' style='font-size: 156px;text-align: center;'>". $row6["total"] . "</h4>";
                          }
                      } else {
                          echo'<h4 id="heading-card-1" style="font-size: 156px;text-align: center;">0</h4>';
                      }?>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text cardbody-sub-text">Total Booking</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card cards-shadown cards-hover" data-aos="flip-left" data-aos-duration="950">
                <div class="card-header">
                    <div class="cardheader-text">
                        <?php
                        $sql5 = "SELECT COUNT(*) AS total FROM tb_user WHERE u_type = '2'";
                        $result5 = $con->query($sql5);
                        if ($result5->num_rows > 0) {
                          // output data of each row
                          while($row5 = $result5->fetch_assoc()) {
                              echo "<h4 id='heading-card-1' style='font-size: 156px;text-align: center;'>". $row5["total"] . "</h4>";
                          }
                      } else {
                          echo'<h4 id="heading-card-1" style="font-size: 156px;text-align: center;">0</h4>';
                      }?>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text cardbody-sub-text">Total Account Customer</p>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap1.min.js"></script>
    <script src="assets/js/aos.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
	<!-- BOOKING LIST -->
	<div class="container">
		<br><br><br>
		<h3>New Booking Lists</h3>
		<table class="table table-hover" style="margin-bottom: 100px;">
			<thead>
				<tr>
					<th scope="col">Booking ID</th>
					<th scope="col">Name</th>
					<th scope="col">Vehicle</th>
					<th scope="col">Pick-up Date</th>
					<th scope="col">Return Date</th>
					<th scope="col">Total price</th>
					<th scope="col">Status</th>
					<th scope="col">Info</th>
				</tr>
			</thead>
			<tbody>
				<?php
				while ($row2 = mysqli_fetch_array($result2)) {
					$floatValue = $row2['b_totalprice'];
					$formattedValue = number_format($floatValue, 2);

					echo '<tr>';
					echo "<td>" . $row2['b_id'] . "</td>";
					echo "<td>" . $row2['u_name'] . "</td>";
					echo "<td>" . $row2['v_model'] . "</td>";
					echo "<td>" . $row2['b_pickdate'] . "</td>";
					echo "<td>" . $row2['b_retdate'] . "</td>";
					echo "<td>RM" . $formattedValue . "</td>";
					echo "<td>" . $row2['s_desc'] . "</td>";
					echo "<td><a href='staffbookinginfo.php?id=" . $row2['b_id'] . "'>Info</a></td>";
					echo '</tr>';
				}
				?>
			</tbody>
		</table>
	</div>

	<!-- VEHICLE INVENTORY -->
	<div class="container py-4 py-xl-5">
		<div class="row mb-5">
			<div class="col-md-8 col-xl-6 text-center mx-auto">
				<h2>Vehicles Inventory</h2>
				<p class="w-lg-50">List cars that available. Here manage the list cars</p>
			</div>
		</div>
		<div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
			<?php
			while ($row1 = mysqli_fetch_array($result1)) {
				$floatValue = $row1['v_price'];
				$formattedValue = number_format($floatValue, 2);
				echo '<div class="col">';
				echo "<div class='card'><img id='vmedia" . $row1['v_media'] . " class='card-img-top w-100 d-block card-img-top w-100 fit-cover' style='height:200px;'' src='img/vehicle/" . $row1['v_media'] . "'>";
				echo '<div class="card-body p-4">';
				echo '<h4 id="vmodel' . $row1['v_model'] . '" class="card-title" style="max-height: 150px; overflow:hidden;">' . $row1["v_model"] . '</h4>';
				echo '<p id="vtype' . $row1['v_type'] . '" class="text card-text mb-0">Vehicle Type: ' . $row1["v_type"] . '</p>';
				echo '<p id="vyear' . $row1['v_year'] . '" class="text card-text mb-0">Vehicle Year: ' . $row1["v_year"] . '</p>';
				echo '<p id="vreg' . $row1['v_reg'] . '" class="text card-text mb-0">Vehicle Registration Number: ' . $row1["v_reg"] . '</p>';
				echo '<p id="vprice' . $row1['v_price'] . '" class="text card-text mb-0">Vehicle Price (per day): RM' . $formattedValue . '</p>';
				echo '<p id="vviewtype' . $row1['viewType'] . '" class="text card-text mb-0">View Type: ' . $row1["viewType_desc"] . '</p>';
				echo '<div class="d-flex">
                                        <div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
			}
			?>
		</div>
	</div>
</body>
<?php include 'footermain.php' ?>