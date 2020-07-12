<?php


namespace App\Utilities;


class Sms
{
    private static $username = "namavar";
    private static $password = "";

    public static function send($message, $mobile) {
        $url = 'http://wsapp.barinclinic.ir/api/SendSMS';
        $data = array('LockCode' => Sms::$username, 'Key' => Sms::$password,'Message'=>$message,'MobileNo'=>$mobile);

        $postRequest = array(
            'LockCode' => Sms::$username,
            'Key' => Sms::$password,
            'Message' => $message,
            'MobileNo' => $mobile,
        );
        $fields_string = "";
        foreach($postRequest as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');
        $cURLConnection = curl_init($url);
        curl_setopt($cURLConnection, CURLOPT_POST, 1);
        curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

        $str = curl_exec($cURLConnection);
        curl_close($cURLConnection);

// $apiResponse - available data from the API request
        //$jsonArrayResponse = json_decode($apiResponse);
// use key 'http' even if you send the request to https://...
//        $options = array(
//            'http' => array(
//                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
//                'method'  => 'POST',
//                'content' => http_build_query($data)
//            )
//        );
//        $context  = stream_context_create($options);
//        $str=file_get_contents($url, false, $context);
//        $obj =json_decode(trim(str_replace("\\","",$str),'"'));
//        $result=$obj->error;
        $obj =json_decode(trim(str_replace("\\","",$str),'"'));
        $result=$obj->error;
        if ($result == 0)///Success
        {
            return 200;
        }
        else if ($result == -1003 ) //Error in Input values
        {
            return -3;
        }
        else if ($result == -1002 ) ///Username or Password is wrong
        {
            return -2;
        }
        else if($result==-1001 )///Not enough credit
        {
            return -4;
        }else ///other Errors
        {
            return 0;
        }
    }
}
