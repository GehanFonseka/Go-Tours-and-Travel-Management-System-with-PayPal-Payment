<?php require "../layouts/header.php" ?>
<?php require "../../config/config.php" ?>

<?php

     $Cities = $conn->query("SELECT * FROM cities");
     $Cities->execute();

     $AllCities = $Cities->fetchAll(PDO::FETCH_OBJ);


?>

<div class="row">
    <div class="col">
        <div class="card" style="box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1); border-radius: 10px;">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Cities</h5>
                <a href="<?php echo ADMINURL; ?>/cities-admins/create-cities.php" class="btn btn-primary mb-4 text-center float-right" style="box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); transition: all 0.3s ease;">Create Cities</a>
                <table class="table" style="border-collapse: collapse; width: 100%; margin-top: 20px; background: #fff; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); border-radius: 10px; overflow: hidden;">
                    <thead style="background: #4caf50; color: white; text-transform: uppercase;">
                        <tr>
                            <th scope="col" style="padding: 12px 15px;">#</th>
                            <th scope="col" style="padding: 12px 15px;">Name</th>
                            <th scope="col" style="padding: 12px 15px;">Image</th>
                            <th scope="col" style="padding: 12px 15px;">Trip Days</th>
                            <th scope="col" style="padding: 12px 15px;">Price</th>
                            <th scope="col" style="padding: 12px 15px;">Delete</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 1rem; color: #333; background: #f9f9f9; transition: all 0.3s ease;">
                        <?php foreach ($AllCities as $city) : ?>
                        <tr style="transition: transform 0.3s ease, box-shadow 0.3s ease;">
                            <th scope="row" style="padding: 12px 15px; border-bottom: 1px solid #ddd;"><?php echo $city->id; ?></th>
                            <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;"><?php echo $city->name; ?></td>
                            <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;">
                                <img src="images_cities/<?php echo $city->image; ?>" alt="City Image" style="width: 50px; height: 50px; border-radius: 5px;">
                            </td>
                            <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;"><?php echo $city->trip_days; ?></td>
                            <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;">$<?php echo $city->price; ?></td>
                            <td style="padding: 12px 15px; border-bottom: 1px solid #ddd;">
                                <a href="delete-city.php?id=<?php echo $city->id; ?>" class="btn btn-danger text-center" style="padding: 6px 12px; font-size: 1rem; border-radius: 5px; transition: all 0.3s ease;">Delete</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS for 3D Effect and Modern Table Design -->
<style>
    /* General Table Styles */
    .table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        overflow: hidden;
    }

    /* Table Header */
    .table thead {
        background: #4caf50;
        color: white;
        text-transform: uppercase;
    }

    .table th {
        padding: 12px 15px;
        font-weight: 600;
    }

    /* Table Body */
    .table td {
        padding: 12px 15px;
        font-size: 1rem;
        color: #333;
    }

    /* Table Row Hover Effect */
    .table tbody tr {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .table tbody tr:hover {
        background-color: #f4f4f4;
        transform: translateY(-2px); /* Slight 3D lift effect */
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    /* Table Styling for Even Rows */
    .table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    /* Table Styling for Odd Rows */
    .table tbody tr:nth-child(odd) {
        background-color: #fff;
    }

    /* Table Borders */
    .table th, .table td {
        border-bottom: 1px solid #ddd;
    }

    /* Table Button */
    .btn-primary {
        border-radius: 50px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>

<script>
    // Apply 3D effect to rows when hovered
    const rows = document.querySelectorAll('.table tbody tr');
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