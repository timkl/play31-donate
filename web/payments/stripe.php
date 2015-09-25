<?php
  require '../../vendor/stripe/stripe-php/init.php';
  if ($_POST) {
    \Stripe\Stripe::setApiKey("sk_test_ezB4z3SpCMH55873RqC4GK2A");
    $error = '';
    $success = '';
    try {
      if (!isset($_POST['stripeToken']))
        throw new Exception("The Stripe Token was not generated correctly");
      \Stripe\Charge::create(array("amount" => 1000,
                                  "currency" => "usd",
                                  "card" => $_POST['stripeToken']));
      header('Location: http://play31.herokuapp.com/thank-you.html');
    }
    catch (Exception $e) {
      $error = $e->getMessage();
    }
  }
