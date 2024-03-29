<?php
// IMPORTANT: This sample code should be studied in reference to MPU Merchant Integration Guide.

// replace with actual Secret Key provided by the Bank or MPU
$secret_key = "W21TFCTIJBMITOFF4EQXMA4AI0AI41XS";

$pgw_test_url = env('KBZ_TEST_URL');
$pgw_live_url = "https://www.mpu-ecommerce.com/Payment/Payment/pay";






?>

<!--

Create a form that contains hidden fields whose names and values are identical to the ones from $_POST
    as well as new hidden field hashValue.
From JS, automatically submit the hidden form (POST).
In case JS is disabled, show a visible Submit button with msg
    like "Click here if the site is taking too long to redirect!"

-->

<html>

<head>
</head>

<body>
<h1>Redirecting to MPU Payment Gateway ...</h1>

<form id="hidden_form" name="hidden_form" method="post" action="<?php echo $pgw_live_url; ?>">
{{--    <input type="submit" value="Click here if it is taking too long to redirect!" />--}}
     <div style="visibility: hidden;">
      <div>
        <?php foreach($data as $key => $value): ?>
        <?php if ($value != ""): ?>
        <label><?php echo htmlspecialchars($key); ?></label>
        <input type="hidden" name="<?php echo htmlspecialchars($key); ?>"
               value="<?php echo htmlspecialchars($value); ?>" />
        <br />
        <?php endif; ?>
        <?php endforeach; ?>
        <input type="hidden" name="hashValue" value="{{$hash}}" />
        <br />
    </div>
    </div>
</form>



<script>
    function submitForm()
    {
        document.forms["hidden_form"].submit();
    }

    //window.onload = submitForm();

    if(window.attachEvent)
    {
        window.attachEvent("onload", submitForm);
    }
    else
    {
        window.addEventListener("load", submitForm, false);
    }
</script>
</body>

</html>
