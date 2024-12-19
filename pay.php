<?php 
ob_start();
require "includes/header.php"; 
 require "config/config.php"; ?>   <!-- Include the configuration file -->
<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
        header('location: http://localhost/wooxtravel/index.php');
        exit;
    }
 ob_end_flush();
?>
<title>Pay with PayPal</title>

<!-- PayPal SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=AUSl1vCveBkYIFxtVOxfssIw8tSQb66uA1eyYwsNFPcWSesunm8_K1NAGH8UQr7_u3UmAahmlfHQr1tg&currency=USD"></script>

<style>
  /* Ensure the body covers the entire height of the screen */
  html, body {
    height: 100%;
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    overflow-y: auto; /* Enable scrolling */
  }

  .container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
    box-sizing: border-box;
    min-height: 100%; /* Ensure content can grow beyond the viewport height */
  }

  h1 {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 20px;
  }

  p {
    font-size: 1.25rem;
    color: #555;
    margin-bottom: 30px;
  }

  .paypal-button-container {
    margin-top: 0px;
    width: 100%;
    max-width: 700px; /* Limit the max width of PayPal button */
  }

  .card {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;
    padding: 20px;
    background-color: #fff;
    box-sizing: border-box;
  }

  .card-header {
    background-color: #007bff;
    color: white;
    padding: 15px;
    text-align: center;
  }

  .card-body {
    padding: 20px;
    text-align: center;
  }

  /* Footer positioning */
  footer {
    width: 100%;
    padding: 10px;
    background-color: #333;
    color: white;
    text-align: center;
  }
</style>
</head>
<body>
  <!-- Page content -->
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h1>Pay with PayPal</h1>
      </div>
      <div class="card-body">
        <p>Click the button below to make a secure payment:</p>

        <!-- PayPal Button Container -->
        <div id="paypal-button-container" class="paypal-button-container"></div>
        
        <script>
          paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
              return actions.order.create({
                purchase_units: [{
                  amount: {
                    value: <?php echo $_SESSION['payment']; ?> // Referencing the session variable for the payment amount
                  }
                }]
              });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
              return actions.order.capture().then(function(orderData) {
                window.location.href = 'index.php'; // Redirect after payment success
              });
            }
          }).render('#paypal-button-container'); // Render PayPal button
        </script>
      </div>
    </div>
  </div>

</body>

<?php require "includes/footer.php"; ?> <!-- Include the footer -->

