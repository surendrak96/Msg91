<html>
<head>
<style>
h1{
    margin-top: 200px;
    text-align: center;
}

</style>

</head>
<body>

<h1>Message API's using MSG91</h1>

<form action="<?php echo $_SELF ?>" method="post">
    Message TO :<input name="to" placeholder="Enter the Reciver mobile No"/>
    Message <input name="message" placeholder="Enter the Message"/>
    <input type="submit" name="submit" value="SEND SMS"/>
</body>


</html>

<?php
$to=$_POST['to'];
$msg=$_POST['message'];

if(isset($_POST['submit'])){

// first create a demo account in msg91.com 


$authKey = "Your authentication key";
$senderId = "your sender id";


$message = urlencode("Hai this is a demo message ");
 
$route = "default";

//Prepare you post parameters
$postData = array(
    'authkey' => $authKey,
    'mobiles' => $to,
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
 echo '<script>';
    echo 'alert("SMS sent Successfully");';
      
    echo '</script>';
    ;

}
 
?>
