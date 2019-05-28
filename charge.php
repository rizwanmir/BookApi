<!DOCTYPE html>
<html>
<head>
  <title>Payment Sucess</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<pre>
<?php
require_once('vendor/stripe/stripe-php/init.php');
\Stripe\Stripe::setApiKey('sk_test_L1w99WKGPKXDQ1MBMbYUUDHT00m4sLKyaO'); //YOUR_STRIPE_SECRET_KEY
// Get the token from the JS script
$token = $_POST['stripeToken'];
// This is a 20.00 charge in SEK.
// Charging a Customer
// Create a Customer

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$adress = $_POST['adress'];
$email = $_POST['email'];
$state = $_POST['state'];
$post_code = $_POST['post_code'];
$country = $_POST['country'];
$phone = $_POST['phone'];
$user_info = [
    'First Name' => $first_name,
    'Last Name' => $last_name,
    'Adress' => $adress,
    'State' => $state,
    'Post Code' => $post_code,
    'Country' => $country,
    'Phone' => $phone
];

// $customer_id = 'cus_F6Ai4gLolcMAb3';
if (isset($customer_id)) {
    try {
        // Use Stripe's library to make requests...
        $customer = \Stripe\Customer::retrieve($customer_id);
    } catch (\Stripe\Error\Card $e) {
        // Since it's a decline, \Stripe\Error\Card will be caught
        $body = $e->getJsonBody();
        $err  = $body['error'];
    
        print('Status is:' . $e->getHttpStatus() . "\n");
        print('Type is:' . $err['type'] . "\n");
        print('Code is:' . $err['code'] . "\n");
        // param is '' in this case
        print('Param is:' . $err['param'] . "\n");
        print('Message is:' . $err['message'] . "\n");
    } catch (\Stripe\Error\RateLimit $e) {
        // Too many requests made to the API too quickly
    } catch (\Stripe\Error\InvalidRequest $e) {
        // Invalid parameters were supplied to Stripe's API
    } catch (\Stripe\Error\Authentication $e) {
        // Authentication with Stripe's API failed
        // (maybe you changed API keys recently)
    } catch (\Stripe\Error\ApiConnection $e) {
        // Network communication with Stripe failed
    } catch (\Stripe\Error\Base $e) {
        // Display a very generic error to the user, and maybe send
        // yourself an email
    } catch (Exception $e) {
        // Something else happened, completely unrelated to Stripe
    }
} else {
    try {
        // Use Stripe's library to make requests...
        $customer = \Stripe\Customer::create(array(
            'email' => $email,
            'source' => $token,
            'metadata' => $user_info,
        ));
    } catch (\Stripe\Error\Card $e) {
        // Since it's a decline, \Stripe\Error\Card will be caught
        $body = $e->getJsonBody();
        $err  = $body['error'];
    
        print('Status is:' . $e->getHttpStatus() . "\n");
        print('Type is:' . $err['type'] . "\n");
        print('Code is:' . $err['code'] . "\n");
        // param is '' in this case
        print('Param is:' . $err['param'] . "\n");
        print('Message is:' . $err['message'] . "\n");
    } catch (\Stripe\Error\RateLimit $e) {
        // Too many requests made to the API too quickly
    } catch (\Stripe\Error\InvalidRequest $e) {
        // Invalid parameters were supplied to Stripe's API
    } catch (\Stripe\Error\Authentication $e) {
        // Authentication with Stripe's API failed
        // (maybe you changed API keys recently)
    } catch (\Stripe\Error\ApiConnection $e) {
        // Network communication with Stripe failed
    } catch (\Stripe\Error\Base $e) {
        // Display a very generic error to the user, and maybe send
        // yourself an email
    } catch (Exception $e) {
        // Something else happened, completely unrelated to Stripe
    }
}
if (isset($customer)) {
   // print_r($customer);
   ?>
   <h2>Books API </h2>
   <div class="alert alert-success">
    <strong>Success!</strong> All went well with your data!
  </div>
  <?php
    $charge_customer = true;
    // Save the customer id in your own database!
    // Charge the Customer instead of the card
    try {
        // Use Stripe's library to make requests...
        $charge = \Stripe\Charge::create(array(
            'amount' => 2000,
            'description' => 'Getting books details by entering ISBN',
            'currency' => 'SEK',
            'customer' => $customer->id,
            'metadata' => $user_info
        ));
    } catch (\Stripe\Error\Card $e) {
        // Since it's a decline, \Stripe\Error\Card will be caught
        $body = $e->getJsonBody();
        $err  = $body['error'];
    
        print('Status is:' . $e->getHttpStatus() . "\n");
        print('Type is:' . $err['type'] . "\n");
        print('Code is:' . $err['code'] . "\n");
        // param is '' in this case
        print('Param is:' . $err['param'] . "\n");
        print('Message is:' . $err['message'] . "\n");
        $charge_customer = false;
    } catch (\Stripe\Error\RateLimit $e) {
        // Too many requests made to the API too quickly
    } catch (\Stripe\Error\InvalidRequest $e) {
        // Invalid parameters were supplied to Stripe's API
    } catch (\Stripe\Error\Authentication $e) {
        // Authentication with Stripe's API failed
        // (maybe you changed API keys recently)
    } catch (\Stripe\Error\ApiConnection $e) {
        // Network communication with Stripe failed
    } catch (\Stripe\Error\Base $e) {
        // Display a very generic error to the user, and maybe send
        // yourself an email
    } catch (Exception $e) {
        // Something else happened, completely unrelated to Stripe
    }
    if ($charge_customer) {
      ?>
      <div class="alert alert-success">
    <strong>Success!</strong> Success with your payment!
  </div>
  <a href="<?php print_r($charge['receipt_url']);?>">Kvitto </a>
  <form action="./CSV/csv_file.php">
    <input type="submit" value="Försätta>>">
</form>
  <?php
    }
}


?>

</body>
</html>