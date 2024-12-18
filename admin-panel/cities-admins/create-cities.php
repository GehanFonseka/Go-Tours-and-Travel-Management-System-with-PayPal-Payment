<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>
<?php

if(!isset($_SESSION["admin_name"]) ){
  header("location: ".ADMINURL."");
}
  $Countries = $conn->query("SELECT * FROM countries");
  $Countries->execute();

  $allCountries = $Countries->fetchAll(PDO::FETCH_OBJ);

if (isset($_POST['submit'])) {

  if (empty($_POST['name']) or empty($_POST['trip_days']) or empty($_POST['price']) or empty($_POST['country_id']) ) {
      echo "<script>alert('some inputs are empty');</script>";
  } else {
      $name = $_POST['name'];
      $image = $_FILES['image']['name'];
      $trip_days = $_POST['trip_days'];
      $price = $_POST['price'];
      $country_id = $_POST['country_id'];

     
      
      $dir = "images_cities/" . basename($image);
  
      $insert = $conn->prepare("INSERT INTO cities (name, image, trip_days, price, country_id) 
      VALUES (:name, :image, :trip_days, :price, :country_id)");
  
      $insert->execute([
          ":name" => $name,
          ":image" => $image,
          ":trip_days" => $trip_days,
          ":price"=> $price,
          "country_id"=> $country_id
  
      ]);
  
      if(move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
  
      header("location: show-cities.php ");
  
  }
  }
  }
  ?>



       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Cities</h5>
          <form method="POST" action="create-cities.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control"  />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="trip_days" id="form2Example1" class="form-control" placeholder="trip_days" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">

                  <select name="country_id" class="form-select  form-control" aria-label="Default select example">
                    <option selected>Choose Country</option>
                    <?php foreach($allCountries as $country) : ?>
                    <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <br>
              

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
 
<?php require "../layouts/footer.php" ?>