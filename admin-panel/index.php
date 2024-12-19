<?php require "layouts/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php 
if(!isset($_SESSION["admin_name"])){
    header("location: ".APPURL."/admins/login-admins.php");
}

    $countries = $conn->query("SELECT COUNT(*) AS countries_count FROM countries");
    $countries->execute();

    $AllCountries = $countries->fetch(PDO::FETCH_OBJ);

    $cities = $conn->query("SELECT COUNT(*) AS cities_count FROM cities");
    $cities->execute();

    $AllCities = $cities->fetch(PDO::FETCH_OBJ);

    $admins = $conn->query("SELECT COUNT(*) AS admins_count FROM admins");
    $admins->execute();

    $AllAdmins = $admins->fetch(PDO::FETCH_OBJ);

    $bookings = $conn->query("SELECT COUNT(*) AS bookings_count FROM bookings");
    $bookings->execute();

    $AllBookings = $bookings->FETCH(PDO::FETCH_OBJ);

?>
<div class="container-fluid">
    <div class="row">
        <!-- Card for Countries -->
        <div class="col-md-3">
            <div class="card custom-card countries-card">
                <div class="card-body">
                    <h5 class="card-title">Countries</h5>
                    <p class="card-text">Number of countries: <?php echo $AllCountries->countries_count; ?></p>
                </div>
            </div>
        </div>
        <!-- Card for Cities -->
        <div class="col-md-3">
            <div class="card custom-card cities-card">
                <div class="card-body">
                    <h5 class="card-title">Cities</h5>
                    <p class="card-text">Number of cities: <?php echo $AllCities->cities_count; ?></p>
                </div>
            </div>
        </div>
        <!-- Card for Admins -->
        <div class="col-md-3">
            <div class="card custom-card admins-card">
                <div class="card-body">
                    <h5 class="card-title">Admins</h5>
                    <p class="card-text">Number of admins: <?php echo $AllAdmins->admins_count; ?></p>
                </div>
            </div>
        </div>
        <!-- Card for Bookings -->
        <div style= "right:-265px; margin-top: 10px;" class="col-md-4">
            <div class="card custom-card bookings-card">
                <div class="card-body">
                    <h5 class="card-title">Bookings</h5>
                    <p class="card-text">Number of bookings: <?php echo $AllBookings->bookings_count; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require "layouts/footer.php"; ?>

<!-- Custom CSS for 3D Effect and Layout Adjustment -->
<style>
    /* General Styles */
  /* General Styles */
body {
    background: #f9f9f9;
    font-family: 'Arial', sans-serif;
}

/* Adjust the margin to shift content left */
.container-fluid {
    margin-left: 150px; /* Reduced space for the sidebar */
    padding: 20px;
}

/* Sidebar Adjustment */
.navbar-nav.side-nav {
    position: fixed;
    top: 56px;
    left: 0;
    width: 220px;
    height: 100%;
    background: #343a40;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
    padding-top: 20px;
}

.navbar-nav.side-nav a {
    color: white;
    text-decoration: none;
}

.navbar-nav.side-nav a:hover {
    background-color: #495057;
    padding-left: 20px;
}

/* Card Styles */
.card {
    border-radius: 10px;
    background: #fff;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    overflow: hidden;
}

.card:hover {
    transform: translateY(-10px) scale(1.05);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

.custom-card {
    padding: 20px;
    transition: all 0.3s ease;
}

/* Colorful Card Backgrounds */
.countries-card {
    background: #ff6f61; /* Warm Coral */
    color: white;
}

.cities-card {
    background: #4caf50; /* Green */
    color: white;
}

.admins-card {
    background: #3f51b5; /* Indigo */
    color: white;
}

.bookings-card {
    background: #f44336; /* Red */
    color: white;
}

/* Card Body Text */
.card-body {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

.card-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 10px;
    color: #fff;
}

.card-text {
    font-size: 1.1rem;
    color: #fff;
}

/* Responsive layout */
@media (max-width: 767px) {
    .container-fluid {
        margin-left: 0; /* No space for sidebar */
    }
    .card {
        margin-bottom: 15px;
    }
}

</style>
