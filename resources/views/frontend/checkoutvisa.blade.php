<?php
// IMPORTANT: This sample code should be studied in reference to MPU Merchant Integration Guide.

// replace with actual Secret Key provided by the Bank or MPU
//$secret_key = "W21TFCTIJBMITOFF4EQXMA4AI0AI41XS";

$pgw_test_url = 'https://testsecureacceptance.cybersource.com/pay';
//$pgw_live_url = "https://www.mpu-ecommerce.com/Payment/Payment/pay";






?>
<?php

define ('HMAC_SHA256', 'sha256');
define ('SECRET_KEY', env('MASTER_SEC'));

function sign ($params) {
    return signData(buildDataToSign($params), SECRET_KEY);
}

function signData($data, $secretKey) {
    return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
}

function buildDataToSign($params) {
    $signedFieldNames = explode(",",$params["signed_field_names"]);
    foreach ($signedFieldNames as $field) {
        $dataToSign[] = $field . "=" . $params[$field];
    }
    return commaSeparate($dataToSign);
}

function commaSeparate ($dataToSign) {
    return implode(",",$dataToSign);
}

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
<h1>Redirecting to Master Visa Payment Gateway ...</h1>

<form id="hidden_form" name="hidden_form" method="post" action="<?php echo $pgw_test_url; ?>">
    {{--    <input type="submit" value="Click here if it is taking too long to redirect!" />--}}
    <div style="visibility: hidden;">
        <?php foreach($data as $key => $value): ?>
        <label><?php echo htmlspecialchars($key); ?></label>
        <input type="hidden" name="<?php echo htmlspecialchars($key); ?>"
               value="<?php echo htmlspecialchars($value); ?>"/>
        <br/>
        <?php endforeach; ?>
        <?php

        echo "<input type=\"hidden\" id=\"signature\" name=\"signature\" value=\"" . sign($data) . "\"/>\n";
        ?>
        <br/>
    </div>

    <span>card_type:</span><input type="text" type="hidden" name="card_type"><br/>
    <span>card_number:</span><input type="text" type="hidden" name="card_number"><br/>
    <span>card_expiry_date:</span><input type="text" type="hidden" name="card_expiry_date"><br/>
</form>


<script>
    function submitForm() {
        document.forms["hidden_form"].submit();
    }

    //window.onload = submitForm();

    if (window.attachEvent) {
        // window.attachEvent("onload", submitForm);
    } else {
        window.addEventListener("load", submitForm, false);
    }
</script>
</body>

</html>
