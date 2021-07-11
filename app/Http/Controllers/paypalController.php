<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Api\PaymentExecution;
class paypalController extends Controller
{
     public function index(Request $request)
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'Aay2M2JYZSPT2IR9GhmKlWe44arptHyjAJ2qv91edFUBA3i8E7Bodkzl5Vw5-Tm9tPoBKJFB3Qr_xVFM',     // ClientID
                'EFs6QEy7uMxyJUYj4mnKZbPtrtUiPcNURxxuDnzjJ4AmztcrMJy_aFTYcZGacmdle3tOlCziLIkgSHef'      // ClientSecret
            )
    );

$payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod('paypal');

$amount = new \PayPal\Api\Amount();
$amount->setTotal('576.00');
$amount->setCurrency('USD');

$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount);

$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl(route('product_return'))
    ->setCancelUrl(route('product_cancel'));

$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions(array($transaction))
    ->setRedirectUrls($redirectUrls);
    // After Step 3
try {
    $payment->create($apiContext);
    echo $payment;

    echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
    return redirect( $payment->getApprovalLink()); 
}
catch (\PayPal\Exception\PayPalConnectionException $ex) {
    // This will print the detailed information on the exception.
    //REALLY HELPFUL FOR DEBUGGING
    echo $ex->getData();
}
}

public function productReturn()
 {  
    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'Aay2M2JYZSPT2IR9GhmKlWe44arptHyjAJ2qv91edFUBA3i8E7Bodkzl5Vw5-Tm9tPoBKJFB3Qr_xVFM',     // ClientID
            'EFs6QEy7uMxyJUYj4mnKZbPtrtUiPcNURxxuDnzjJ4AmztcrMJy_aFTYcZGacmdle3tOlCziLIkgSHef'      // ClientSecret
        )
        );
    //  dd(\request()->all());

// Get payment object by passing paymentId
// $paymentId = $_GET['paymentId'];
// $payment =  \PayPal\Api\Payment::get($paymentId, $apiContext);
// $payerId = $_GET['PayerID'];

// // Execute payment with payer ID
// $execution = new PaymentExecution();
// $execution->setPayerId($payerId);

// // try {
//   // Execute payment
//   $result = $payment->execute($execution, $apiContext);
// //   dd($result);

// } catch ( \PayPal\Exception\PayPalConnectionException $ex) {
//   echo $ex->getCode();
//   echo $ex->getData();
//   die($ex);
// }       

// Get payment object by passing paymentId
$paymentId = $_GET['paymentId'];
$payment = \PayPal\Api\Payment::get($paymentId, $apiContext);
$payerId = $_GET['PayerID'];

// Execute payment with payer ID
$execution = new PaymentExecution();
$execution->setPayerId($payerId);
// dd($payment);
try {
  // Execute payment
  $result = $payment->execute($execution, $apiContext);
//   var_dump('$welcim');
} catch (PayPal\Exception\PayPalConnectionException $ex) {
  echo $ex->getCode();
  echo $ex->getData();
  die($ex);
}
}

public function productCancel()
 {  
return "Order canceled";
}




}
