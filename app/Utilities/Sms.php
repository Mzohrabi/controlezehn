<?php


namespace App\Utilities;


class SMS
{
    private static $username = "afshin.namavar";
    private static $password = "gfh432";

    public static function send($message, $mobile) {
        $url = 'http://wsapp.barinclinic.ir/api/SendSMS';
        $data = array('LockCode' => SMS::$username, 'Key' => SMS::$password,'Message'=>$message,'MobileNo'=>$mobile);

// use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $str=file_get_contents($url, false, $context);
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
