<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
if(!isset($_SESSION["admin_name"]) ){
    header("location: ".ADMINURL."");
}

// Fetch bookings
$Bookings = $conn->query("SELECT * FROM bookings");
$Bookings->execute();
$AllBookings = $Bookings->fetchAll(PDO::FETCH_OBJ);
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline "><b>Bookings</b></h5>
                <table class="table mt-4">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Num of Guests</th>
                            <th scope="col">Check-In Date</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($AllBookings as $Booking) : ?>
                        <tr>
                            <th scope="row"><?php echo $Booking->id; ?></th>
                            <td><?php echo htmlspecialchars($Booking->name); ?></td>
                            <td><?php echo htmlspecialchars($Booking->phone_number); ?></td>
                            <td><?php echo htmlspecialchars($Booking->num_of_guests); ?></td>
                            <td><?php echo htmlspecialchars($Booking->check_in_date); ?></td>
                            <td><?php echo htmlspecialchars($Booking->destination); ?></td>
                            <td><?php echo htmlspecialchars($Booking->payment); ?></td>
                            <td>
                                <a href="status.php?id=<?php echo $Booking->id; ?>&status=<?php echo $Booking->status; ?>"
                                   class="btn <?php echo $Booking->status == 'Pending' ? 'btn-danger' : 'btn-success'; ?> text-center">
                                   <?php echo $Booking->status == "Pending" ? "Pending" : "Booking Successfully"; ?>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table> 
            </div>
        </div>
    </div>
</div>
<?php require "../layouts/footer.php"; ?>
