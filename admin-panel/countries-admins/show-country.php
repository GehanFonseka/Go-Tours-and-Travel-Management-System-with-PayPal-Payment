<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>

<?php 
       
    $Countries = $conn->query("SELECT * FROM countries");
    $Countries->execute();

    $AllCountries = $Countries->fetchAll(PDO::FETCH_OBJ);

?>

          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Countries</h5>
             <a  href="<?php echo ADMINURL; ?>/countries-admins/create-country.php" class="btn btn-primary mb-4 text-center float-right">Create Country</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">image</th>
                    <th scope="col">continent</th>
                    <th scope="col">population(M)</th>
                    <th scope="col">territory(Km2)</th>
                    <th scope="col">delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($AllCountries as $Country) : ?>
                  <tr>
                    <th scope="row"><?php echo $Country->id; ?></th>
                    <td><?php echo $Country->name; ?></td>
                    <td><image style="width:50px; height:50px;" src="images_countries/<?php echo $Country->image; ?>"></image></td>
                    <td><?php echo $Country->continent; ?></td>
                    <td><?php echo $Country->territory; ?></td>
                    <td><?php echo $Country->population; ?></td>
                    <td><a href="delete-country.php?id=<?php echo $Country->id; ?>" class="btn btn-danger  text-center ">Delete</a></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>


<?php require "../layouts/footer.php" ?>

  