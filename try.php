<!DOCTYPE html>
<html>
<head>
    <title>PHP SMS</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" />
</head>
<body>

    <h1>PHP SMS</h1>
    <form method="post" action="?send">
        <label for="number">Number</label>
        <input type="text" name="number" id="number" />
        <label for="message">Message</label>
        <textarea name="message" id="message"></textarea>
        <fieldset>
            <legend>Provider</legend>
            <label>
                <input type="radio" name="provider" value="infobip" checked /> Infobip
            </label>
            <br />
            <label>
                <input type="radio" name="provider" value="twilio" /> Twilio
            </label>
        </fieldset>
        <button>Send</button>
    </form>

    <?php 
        use Infobip\Configuration;
        use Infobip\Api\SmsApi;
        use Infobip\Model\SmsDestination;
        use Infobip\Model\SmsTextualMessage;
        use Infobip\Model\SmsAdvancedTextualRequest;
        // use Twilio\Rest\Client;
        
        require __DIR__ . "/vendor/autoload.php";
        
        // $number = $_POST["number"];
        // $message = $_POST["message"];
        
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     require __DIR__ . "/vendor/autoload.php";
    
        //     $number = $_POST["number"];
        //     $message = $_POST["message"];
    
        //     if ($_POST["provider"] === "infobip") {
    
        //         $base_url = "rgndvl.api.infobip.com";
        //         $api_key = "b3a464222c9d70546eaf00e498349128-d48bb16a-e946-4389-8a7d-314bb5950668";
    
        //         $configuration = new Infobip\Configuration();
        //         $configuration->setHost($base_url);
        //         $configuration->setApiKey($api_key);
    
        //         $api = new Infobip\Api\SmsApi($configuration);
    
        //         $destination = new Infobip\Model\SmsDestination();
        //         $destination->setTo($number);
    
        //         $smsMessage = new Infobip\Model\SmsTextualMessage();
        //         $smsMessage->setDestinations([$destination]);
        //         $smsMessage->setText($message);
        //         $smsMessage->setFrom("Bawigarogine");
    
        //         $request = new Infobip\Model\SmsAdvancedTextualRequest();
        //         $request->setMessages([$smsMessage]);
    
        //         try {
        //             $response = $api->sendSmsMessage($request);
        //             echo "Message sent.";
        //         } catch (Exception $e) {
        //             echo "Error: " . $e->getMessage();
        //         }
    
        //     }
        // }
        
    ?>

<?php
// require_once 'HTTP/Request2.php';
$request = new HTTP_Request2();
$request->setUrl('https://rgndvl.api.infobip.com/sms/2/text/advanced');
$request->setMethod(HTTP_Request2::METHOD_POST);
$request->setConfig(array(
    'follow_redirects' => TRUE
));
$request->setHeader(array(
    'Authorization' => 'App b3a464222c9d70546eaf00e498349128-d48bb16a-e946-4389-8a7d-314bb5950668',
    'Content-Type' => 'application/json',
    'Accept' => 'application/json'
));
$request->setBody('{"messages":[{"destinations":[{"to":"639516746357"}],"from":"ServiceSMS","text":"Congratulations on sending your first message.\\nGo ahead and check the delivery report in the next step."}]}');
try {
    $response = $request->send();
    if ($response->getStatus() == 200) {
        echo $response->getBody();
    }
    else {
        echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
        $response->getReasonPhrase();
    }
}
catch(HTTP_Request2_Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>

</body>
</html>