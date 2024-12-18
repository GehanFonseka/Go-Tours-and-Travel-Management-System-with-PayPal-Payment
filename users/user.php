<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

if (!isset($_SESSION["username"])) {
    header("location: " . APPURL . "");
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $user_bookings = $conn->query("SELECT * FROM bookings WHERE user_id='$id'");
    $user_bookings->execute();

    $AllUserBookings = $user_bookings->fetchAll(PDO::FETCH_OBJ);

} else {

    header("location: 404.php");
}



?>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <table class="table table-striped table-hover"
                style="margin-top: 50px; margin-bottom:80px; border-radius: 10px; overflow: hidden; background-color: #ffffff; border: 1px solid #dee2e6; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); ">
                <thead
                    style="font-weight: bold; color: #ffffff; background-color: #22b3c1; font-size: 1rem; padding: 12px; text-align: center;">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Number of Guests</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Check-In Date</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Status</th>
                        <th scope="col">Payment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($AllUserBookings as $Booking): ?>
                        <tr style="text-align: center; font-size: 1rem; color: #495057; padding: 12px;">
                            <td style="padding: 12px;"><?php echo $Booking->name; ?></td>
                            <td style="padding: 12px;"><?php echo $Booking->num_of_guests; ?></td>
                            <td style="padding: 12px;"><?php echo $Booking->phone_number; ?></td>
                            <td style="padding: 12px;"><?php echo $Booking->check_in_date; ?></td>
                            <td style="padding: 12px;"><?php echo $Booking->destination; ?></td>
                            <td style="padding: 12px;"><?php echo $Booking->status; ?></td>
                            <td style="padding: 12px;">$<?php echo $Booking->payment; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    tr:nth-child(even) {
        background-color: #f8f9fa;
        /* Very Light Gray */
    }

    tr:hover {
        background-color: #e2e6ea;
        /* Subtle hover effect */
    }

    th,
    td {
        font-size: 1rem;
        padding: 12px;
    }
</style>



<?php require "../includes/footer.php"; ?>