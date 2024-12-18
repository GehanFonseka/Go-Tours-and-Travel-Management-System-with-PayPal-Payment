<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>
<?php
if (isset($_POST['submit'])) {

if (empty($_POST['name']) or empty($_POST['continent']) or empty($_POST['population']) 
    or empty($_POST['territory']) or empty($_POST['description']) ) {
    echo "<script>alert('some inputs are empty');</script>";
} else {
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $continent = $_POST['continent'];
    $population = $_POST['population'];
    $territory = $_POST['territory'];
    $description = $_POST['description'];
    
    $dir = "images_countries/" . basename($image);

    $insert = $conn->prepare("INSERT INTO countries (name, image, continent, population, territory, description) 
    VALUES (:name, :image, :continent, :population, :territory, :description)");

    $insert->execute([
        ":name" => $name,
        ":image" => $image,
        ":continent" => $continent,
        ":population"=> $population,
        ":territory"=> $territory,
        ":description"=> $description,

    ]);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {

    header("location: show-country.php ");

}
}
}
?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Countries</h5>
          <form method="POST" action="create-country.php " enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control" />
                 
                </div>  
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="continent" id="form2Example1" class="form-control" placeholder="continent" />
                 
                </div> 
                 <div class="form-outline mb-4 mt-4">
                  <input type="text" name="population" id="form2Example1" class="form-control" placeholder="population" />
                 
                </div>  <div class="form-outline mb-4 mt-4">
                  <input type="text" name="territory" id="form2Example1" class="form-control" placeholder="territory" />
                 
                </div> 
                <div class="form-floating">
                  <textarea name="description" class="form-control" placeholder="description" id="floatingTextarea2" style="height: 100px"></textarea>
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
    