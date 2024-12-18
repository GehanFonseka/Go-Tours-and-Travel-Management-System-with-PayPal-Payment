<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php
if(!empty($_GET['id']) && !empty($_GET['status'])) {
    $id = intval($_GET['id']);
    $status = htmlspecialchars($_GET['status']);

    try {
        $update = $conn->prepare("UPDATE bookings SET status=? WHERE id=?");
        $newStatus = $status === "Pending" ? "Booking Successfully" : "Pending";
        $update->execute([$newStatus, $id]);
        header("location: show-bookings.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("location: show-bookings.php");
}
?>
<?php require "../layouts/footer.php"; ?>
