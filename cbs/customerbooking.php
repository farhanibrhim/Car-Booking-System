<?php
include('dbconnect.php');
include 'cbssession.php';

if (!session_id()) {
    session_start();
}

include 'headercustomer.php';

$sql = "SELECT * FROM tb_v";
$result = mysqli_query($con, $sql);

$sql1 = "SELECT * FROM tb_user
        WHERE u_id = '$uid'";
$result1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_array($result1);
?>

<body>
    <div class="container py-4 py-xl-5">
        <h1>Welcome, <?php echo $row1['u_name']; ?></h1><br>
        <div class="row mb-5">
            <div class="col-md-8 col-xl-6 text-center mx-auto">
                <h2>Book Your Cars Now</h2>
                <p class="w-lg-50">List cars that available. Choose your car and enjoy your trip !</p>
            </div>
        </div>
        <div style="text-align: left;padding-bottom: 20px;"><button class="btn btn-success" type="button"
                style="height: 47px;" data-bs-target="#modalBook" data-bs-toggle="modal"><svg class="bi bi-plus-circle"
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z">
                    </path>
                </svg> &quot; Book Cars &quot;</button>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <?php
            while ($row = mysqli_fetch_array($result)) {
                $floatValue = $row['v_price'];
                $formattedValue = number_format($floatValue, 2);
                if ($row['v_viewType'] == 1) {
                    echo '<div class="col">';
                    echo "<div class='card'><img id='vmedia" . $row['v_media'] . " class='card-img-top w-100 d-block card-img-top w-100 fit-cover' style='height:200px;'' src='img/vehicle/" . $row['v_media'] . "'>";
                    echo '<div class="card-body p-4">';
                    echo '<h4 id="vmodel' . $row['v_model'] . '" class="card-title" style="max-height: 150px; overflow:hidden;">' . $row["v_model"] . '</h4>';
                    echo '<p id="vtype' . $row['v_type'] . '" class="text card-text mb-0">Vehicle Type: ' . $row["v_type"] . '</p>';
                    echo '<p id="vyear' . $row['v_year'] . '" class="text card-text mb-0">Vehicle Year: ' . $row["v_year"] . '</p>';
                    echo '<p id="vprice' . $row['v_price'] . '" class="text card-text mb-0">Vehicle Price (per day): RM' . $formattedValue . '</p>';
                    echo '<div class="d-flex">
                                        <div>';
                    echo '</div>';
                    echo '<form>';
                    echo '<fieldset>
                                            <input type="hidden" name="cid" value="' . $row['v_id'] . '">
                                        </fieldset>';
                    echo '</div>';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
    <?php include('bookModal.php'); ?>
    <script src="js/bootstrap.min.js"></script>
</body>
<?php include'footermain.php' ?>