<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>

<?php 
       
    $Countries = $conn->query("SELECT * FROM countries");
    $Countries->execute();

    $AllCountries = $Countries->fetchAll(PDO::FETCH_OBJ);

?>

<div class="row">
    <div class="col">
        <div class="card" style="box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1); border-radius: 10px;">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Countries</h5>
                <a href="<?php echo ADMINURL; ?>/countries-admins/create-country.php" class="btn btn-primary mb-4 text-center float-right" style="box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">Create Country</a>
                <table class="table" style="border-collapse: collapse; width: 100%; margin-top: 20px; background: #fff; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); border-radius: 10px; overflow: hidden;">
                    <thead style="background: #4caf50; color: white; text-transform: uppercase;">
                        <tr>
                            <th scope="col" style="padding: 12px 15px;">#</th>
                            <th scope="col" style="padding: 12px 15px;">Name</th>
                            <th scope="col" style="padding: 12px 15px;">Image</th>
                            <th scope="col" style="padding: 12px 15px;">Continent</th>
                            <th scope="col" style="padding: 12px 15px;">Population (M)</th>
                            <th scope="col" style="padding: 12px 15px;">Territory (Km²)</th>
                            <th scope="col" style="padding: 12px 15px;">Delete</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 1rem; color: #333; background: #f9f9f9; transition: all 0.3s ease;">
                        <?php foreach ($AllCountries as $Country) : ?>
                        <tr style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <th scope="row" style="padding: 12px 15px; border-bottom: 1px solid #ddd;"><?php echo $Country->id; ?></th>
                            <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;"><?php echo $Country->name; ?></td>
                            <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;"><img src="images_countries/<?php echo $Country->image; ?>" alt="Country Image" style="width: 50px; height: 50px; border-radius: 5px;"></td>
                            <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;"><?php echo $Country->continent; ?></td>
                            <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;"><?php echo $Country->population; ?></td>
                            <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;"><?php echo $Country->territory; ?></td>
                            <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;"><a href="delete-country.php?id=<?php echo $Country->id; ?>" class="btn btn-danger text-center" style="padding: 6px 12px; font-size: 1rem; border-radius: 5px; transition: all 0.3s ease;">Delete</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Apply 3D effect to rows when hovered
    const rows = document.querySelectorAll('tbody tr');
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



<?php require "../layouts/footer.php" ?>

  