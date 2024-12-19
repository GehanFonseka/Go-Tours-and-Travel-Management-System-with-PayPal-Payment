<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php
    
    $cities = $conn->query("SELECT * FROM cities ORDER BY price ASC LIMIT 4");
    $cities->execute();

    $AllCities = $cities->fetchAll(PDO::FETCH_OBJ);

    //GRAPPING COUNTRIES
    $countries = $conn->query("SELECT * FROM countries");
    $countries->execute();

    $AllCountries = $countries->fetchAll(PDO::FETCH_OBJ);

?>


  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Discover Our Weekly Offers</h4>
          <h2>Amazing Prices &amp; More</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="search-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <form id="search-form"  method="POST" role="search" action="search.php">
            <div class="row">
              <div class="col-lg-2">
                <h4>Sort Deals By:</h4>
              </div>
              <div class="col-lg-4">
                  <fieldset>
                      <select name="country_id" class="form-select" aria-label="Default select example" id="chooseLocation" onChange="this.form.click()">
                          <option selected>Destinations</option>
                          <?php foreach($AllCountries as $country) : ?>
                          <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                          <?php endforeach; ?>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-4">
                  <fieldset>
                      <select name="price" class="form-select" aria-label="Default select example" id="choosePrice" onChange="this.form.click()">
                          <option selected>Price Range</option>
                          <option value="100">Less than $100</option>
                          <option value="250">Less than $250</option>
                          <option value="500">Less than $500</option>
                          <option value="1000">Less than $1,000</option>
                          <option value="2500">Less than $2,500</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-2">                        
                  <fieldset>
                      <button type="submit" name="submit" class="border-button">Search Results</button>
                  </fieldset>
              </div>
            </div>
          </form>
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
      
      <!-- Corrected div structure for city items -->
      <?php foreach ($AllCities as $City) : ?>
        <div class="col-lg-6 col-sm-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-6">
                <div style="height:350px"  class="image">
                <img src="<?php echo CITIESIMAGES; ?>/<?php echo $City->image; ?>" alt="">
                </div>
              </div>
              <div class="col-lg-6 align-self-center">
                <div class="content">
                  <span class="info">*Limited Offer Today</span>
                  <h4><?php echo $City->name; ?></h4>
                  <div class="row">
                    <div class="col-6">
                      <i class="fa fa-clock"></i>
                      <span class="list"><?php echo $City->trip_days; ?> Days</span>
                    </div>
                    <div class="col-6">
                      <i class="fa fa-map"></i>
                      <span class="list">Daily Places</span>
                    </div>
                  </div>
                  <p>Limited Price: $<?php echo $City->price; ?> Per Person</p>
                  <?php if (isset($_SESSION['username'])): ?>
                  <div class="main-button">
                    <a href="reservation.php?id=<?php echo $City->id; ?>">Make a Reservation</a>
                  </div>
                  <?php else : ?>
                    <p style="color: #000000; font-weight: bold;">Please Login to make a Reservation</p>
                  <?php endif;  ?>

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