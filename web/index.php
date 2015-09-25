<?php
require '../vendor/stripe/stripe-php/init.php';
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
    $success = 'Your payment was successful.';
  }
  catch (Exception $e) {
    $error = $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    </head>
    <body>


<?php if ($_POST) { ?>

Thank you


<?php } else { ?>





        <form action="index.php" method="POST">
          <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="pk_test_vn5LbJcdJtuqBonjRtTIC6hM"
            data-amount="2000"
            data-name="Demo Site"
            data-description="2 widgets ($20.00)"
            data-image="/128x128.png"
            data-locale="auto">
          </script>
        </form>


<?php } ?>



    </body>
</html>
