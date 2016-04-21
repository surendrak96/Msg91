 <?php

// first create a demo account in msg91.com 




$authKey = "Your authentication key";

//Multiple mobiles numbers separated by comma
$mobileNumber = "999999999";

$senderId = "your sender id";
$sender="Surender Reddy"
$message = urlencode(" message from $sender");
//it sends message from Surendra Reddy 

//Define route 
$route = "4";
//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $mobileNumber,
    'message' => $message,
    'sender' => $senderId,
    'route' => $route
);

//API URL
$url="https://control.msg91.com/api/sendhttp.php";

// init the resource
$ch = curl_init();
curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData
    //,CURLOPT_FOLLOWLOCATION => true
));


//Ignore SSL certificate verification
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//get response
$output = curl_exec($ch);

 if(curl_errno($ch))
{
    echo 'error:' . curl_error($ch);
}

curl_close($ch);

 
?>
