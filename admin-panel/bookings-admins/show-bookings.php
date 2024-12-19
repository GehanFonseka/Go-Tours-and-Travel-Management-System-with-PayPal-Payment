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
        <div class="card" style="box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1); border-radius: 10px;">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline"><b>Bookings</b></h5>
                <table class="table" style="border-collapse: collapse; width: 100%; margin-top: 20px; background: #fff; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); border-radius: 10px; overflow: hidden;">
                    <thead style="background-color: #4caf50; color: white; text-transform: uppercase;">
                        <tr>
                            <th scope="col" style="padding: 12px 15px;">#</th>
                            <th scope="col" style="padding: 12px 15px;">Name</th>
                            <th scope="col" style="padding: 12px 15px;">Phone Number</th>
                            <th scope="col" style="padding: 12px 15px;">Num of Guests</th>
                            <th scope="col" style="padding: 12px 15px;">Check-In Date</th>
                            <th scope="col" style="padding: 12px 15px;">Destination</th>
                            <th scope="col" style="padding: 12px 15px;">Payment</th>
                            <th scope="col" style="padding: 12px 15px;">Status</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 1rem; color: #333; background: #f9f9f9; transition: all 0.3s ease;">
                        <?php foreach($AllBookings as $Booking) : ?>
                        <tr style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <th scope="row" style="padding: 12px 15px; border-bottom: 1px solid #ddd;"><?php echo $Booking->id; ?></th>
                            <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;"><?php echo htmlspecialchars($Booking->name); ?></td>
                            <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;"><?php echo htmlspecialchars($Booking->phone_number); ?></td>
                            <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;"><?php echo htmlspecialchars($Booking->num_of_guests); ?></td>
                            <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;"><?php echo htmlspecialchars($Booking->check_in_date); ?></td>
                            <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;"><?php echo htmlspecialchars($Booking->destination); ?></td>
                            <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;">$<?php echo htmlspecialchars($Booking->payment); ?></td>
                            <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;">
                                <a href="status.php?id=<?php echo $Booking->id; ?>&status=<?php echo $Booking->status; ?>"
                                   class="btn <?php echo $Booking->status == 'Pending' ? 'btn-danger' : 'btn-success'; ?> text-center"
                                   style="padding: 8px 20px; font-size: 1rem; border-radius: 5px; transition: all 0.3s ease;">
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

<!-- Custom CSS for 3D Effect and Modern Table Design -->
<style>
    /* General Table Styles */
    .table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    /* Table Header */
    .table thead {
        background-color: #4caf50;
        color: white;
        text-transform: uppercase;
    }

    .table th {
        padding: 12px 15px;
        font-weight: 600;
    }

    /* Table Body */
    .table td {
        padding: 12px 15px;
        font-size: 1rem;
        color: #333;
    }

    /* Table Row Hover Effect */
    .table tbody tr {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .table tbody tr:hover {
        background-color: #f4f4f4;
        transform: translateY(-2px); /* Slight 3D lift effect */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Table Styling for Even Rows */
    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* Table Styling for Odd Rows */
    .table tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    /* Table Borders */
    .table th, .table td {
        border-bottom: 1px solid #ddd;
    }

    /* Table Button */
    .btn {
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-danger {
        background-color: #dc3545;
    }

    .btn-success {
        background-color: #28a745;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-success:hover {
        background-color: #218838;
    }
</style>

<script>
    // Apply 3D effect to rows when hovered
    const rows = document.querySelectorAll('.table tbody tr');
    rows.forEach(row => {
        row.addEventListener('mouseenter', function() {
            row.style.transform = 'scale(1.03)';
            row.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.15)';
        });
        row.addEventListener('mouseleave', function() {
            row.style.transform = '';
            row.style.boxShadow = '';
        });
    });
</script>

<?php require "../layouts/footer.php"; ?>
