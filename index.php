<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>

<?php 
  // Selecting countries
  $countries = $conn->query("SELECT 
    countries.id AS id, 
    countries.name AS name, 
    countries.image AS image, 
    countries.continent AS continent, 
    countries.population AS population,
    countries.territory AS territory, 
    countries.description AS description,
    AVG(cities.price) AS avg_price 
  FROM countries 
  LEFT JOIN cities ON countries.id = cities.country_id
  GROUP BY countries.id");
  $countries->execute();
  $allCountries = $countries->fetchAll(PDO::FETCH_OBJ);
?>

<!-- ***** Main Banner Area Start ***** -->
<section id="section-1">
  <div class="content-slider">
    <?php foreach( $allCountries as $index => $country) : ?>
      <input type="radio" id="banner<?php echo $country->id; ?>" class="sec-1-input" name="banner" <?php echo $index === 0 ? 'checked' : ''; ?>>
    <?php endforeach; ?>

    <div class="slider">
      <?php foreach( $allCountries as $country) : ?>
        <div id="top-banner-<?php echo $country->id; ?>" class="banner">
          <div class="banner-inner-wrapper header-text">
            <div class="main-caption">
              <h2>Take a Glimpse Into The Beautiful Country Of:</h2>
              <h1><?php echo htmlspecialchars($country->name); ?></h1>
              <div class="border-button"><a href="about.php?id=<?php echo $country->id; ?>">Go There</a></div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="more-info">
                    <div class="row">
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-user"></i>
                        <h4><span>Population:</span><br><?php echo $country->population; ?> M</h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-globe"></i>
                        <h4><span>Territory:</span><br><?php echo $country->territory; ?> KM<em>2</em></h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-home"></i>
                        <h4><span>AVG Price:</span><br>$<?php echo $country->avg_price; ?></h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <div class="main-button">
                          <a href="about.php?id=<?php echo $country->id; ?>">Explore More</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <nav>
      <div class="controls">
        <?php foreach( $allCountries as $country) : ?>
          <label for="banner<?php echo $country->id; ?>"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text"><?php echo $country->id; ?></span></label>
        <?php endforeach; ?> 
      </div>
    </nav>
  </div>
</section>
<!-- ***** Main Banner Area End ***** -->

<!-- Visit Countries Section -->
<div class="visit-country">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <div class="section-heading">
          <h2>Visit One Of Our Countries Now</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-8">
        <div class="items">
          <div class="row">
            <?php foreach($allCountries as $country) : ?>
              <div class="col-lg-12">
                <div class="item">
                  <div class="row">
                    <div class="col-lg-4 col-sm-5">
                      <div class="image">
                        <img src="<?php echo COUNTRIESIMAGES . '/' . $country->image; ?>" alt="">
                      </div>
                    </div>
                    <div class="col-lg-8 col-sm-7">
                      <div class="right-content">
                        <h4><?php echo htmlspecialchars($country->name); ?></h4>
                        <span><?php echo htmlspecialchars($country->continent); ?></span>
                        <div class="main-button">
                          <a href="about.php?id=<?php echo $country->id; ?>">Explore More</a>
                        </div>
                        <p><?php echo htmlspecialchars($country->description); ?></p>
                        <ul class="info">
                          <li><i class="fa fa-user"></i> <?php echo $country->population; ?> Mil People</li>
                          <li><i class="fa fa-globe"></i> <?php echo $country->territory; ?> km2</li>
                          <li><i class="fa fa-home"></i> $<?php echo $country->avg_price; ?></li>
                        </ul>
                        <div class="text-button">
                          <a href="about.php?id=<?php echo $country->id; ?>">Need Directions ? <i class="fa fa-arrow-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="side-bar-map">
          <div class="row">
            <div class="col-lg-12">
              <div id="map">
                <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="550px" frameborder="0" style="border:0; border-radius: 23px;" allowfullscreen=""></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require "includes/footer.php"; ?>
