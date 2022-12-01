<?php

define ('HMAC_SHA256', 'sha256');
define ('SECRET_KEY', 'f829d265446b41fcbc9aaf76e35a5e73d824a550ced645338ab4d4dff8d4010c2eabe85b39d54628bcd1a6f1acb112b21f81d6c96baf4fc0961cd9bf9ab70c4f61dc0dfcdc4b4f55b6071ea0852e769f63430c904d10467cbf64925e7a198c2e7d827d9b35e144028d3732a78c5e2d23d8f87d6efed94ffebed5777af0615ef5');

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
