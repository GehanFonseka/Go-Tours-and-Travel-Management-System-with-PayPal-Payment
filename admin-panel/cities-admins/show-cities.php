<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>

<?php

     $Cities = $conn->query("SELECT * FROM cities");
     $Cities->execute();

     $AllCities = $Cities->fetchAll(PDO::FETCH_OBJ);


?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Cities</h5>
              <a  href="<?php echo ADMINURL; ?>/cities-admins/create-cities.php" class="btn btn-primary mb-4 text-center float-right">Create cities</a>

              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th scope="col">trip_days</th>
                    <th scope="col">price</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                 <?php foreach($AllCities as $city) : ?>
                  <tr>
                    <th scope="row"><?php echo $city->id; ?> </th>
                    <td><?php echo $city-> name; ?></td>
                    <td><image style="height:50px; width:50px;" src="images_cities/<?php echo $city->image; ?>"></image></td>
                    <td><?php echo $city->trip_days; ?></td>
                    <td>$<?php echo $city->price; ?></td>
                     <td><a href="delete-city.php?id=<?php echo $city->id; ?>" class="btn btn-danger  text-center ">delete</a></td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

<?php require "../layouts/footer.php" ?>