<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php
    
     if($_SERVER['REQUEST_METHOD'] == "POST") {

        if (empty($_POST['country_id']) or empty($_POST['price'])) {
            echo "<script>alert('some inputs are empty');</script>";
     
        }else{
            $country_id = $_POST['country_id'];
            $price = $_POST['price'];

            $searchs = $conn->query("SELECT * FROM cities WHERE country_id = '$country_id'AND price < $price");
            $searchs->execute();

            $AllSearchs = $searchs->fetchAll(PDO::FETCH_OBJ);

            //var_dump($AllSearchs);
        }
    }else{
      header("location: index.php");

    }


?>


  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Search Results</h4>
          <h2>Amazing Prices &amp; More</h2>
        </div>
      </div>
    </div>
  </div>

  

  <div class="amazing-deals">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="section-heading text-center">
          <h2>Best Weekly Offers In Each City</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
        </div>
      </div>
      
      <?php foreach($AllSearchs as $search) : ?>
      <div class="col-lg-6 col-sm-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-6">
                <div style="height:350px" class="image">
                <img src="<?php echo CITIESIMAGES; ?>/<?php echo $search->image; ?>" alt="">
                </div>
              </div>
              <div class="col-lg-6 align-self-center">
                <div class="content">
                  <span class="info">*Limited Offer Today</span>
                  <h4><?php echo $search->name; ?></h4>
                  <div class="row">
                    <div class="col-6">
                      <i class="fa fa-clock"></i>
                      <span class="list"><?php echo $search->trip_days; ?> Days</span>
                    </div>
                    <div class="col-6">
                      <i class="fa fa-map"></i>
                      <span class="list">Daily Places</span>
                    </div>
                  </div>
                  <p>Limited Price: $<?php echo $search->price; ?> Per Person</p>
                  <?php if (isset($_SESSION['username'])): ?>
                  <div class="main-button">
                    <a href="reservation.php?id=<?php echo $search->id; ?>">Make a Reservation</a>
                  </div>
                  <?php else : ?>
                    <p style="color: #000000; font-weight: bold;">Please Login to make a Reservation</p>
                  <?php endif; ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
     
    </div>
  </div>
</div>


 <?php require "includes/footer.php"; ?>