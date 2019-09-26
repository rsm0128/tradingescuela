<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pnlinh\InfobipSms\Facades\InfobipSms;
use App\TraitsFolder\CommonTrait;
use App\BasicSetting;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailSender;
use Log;
use App\User;
use App\Signal;


define('MULTIPART_BOUNDARY','-----------------------'.md5(time()));
define('EOL',"\r\n");// PHP_EOL cannot be used for emails we need the CRFL '\r\n'

class TestController extends Controller
{
    use CommonTrait;
private $from = "suberth";
private $subject = "test subject";

private function setPostData($to, $text)
{
return [
'from' => $this->from,
'to'   => (array) $to,
'subject' => $this->subject,
'text' => $text,
];
}


/*
 * Method to convert an associative array of parameters into the HTML body string
*/
private function getBody($fields) {
    $content = '';
    foreach ($fields as $FORM_FIELD => $value) {
        $content .= '--' . MULTIPART_BOUNDARY . EOL;
        $content .= 'Content-Disposition: form-data; name="' . $FORM_FIELD . '"' . EOL;
        $content .= EOL . $value . EOL;
    }
    return $content . '--' . MULTIPART_BOUNDARY . '--'; // Email body should end with "--"
}

/*
 * Method to get the headers for a basic authentication with username and passowrd
*/
private function getHeader($username, $password){
    // basic Authentication
    $auth = base64_encode("$username:$password");

    // Define the header
    return array("Authorization:Basic $auth", 'Content-Type: multipart/form-data ; boundary=' . MULTIPART_BOUNDARY );
}
public function testFunction()
{
    // echo md5('abcde');
    // exit();
    // var_dump(date("Y-m-d H:i:s"));
    // send sms
    // $response = InfobipSms::send('8617139261632', 'Hello Infobip');
    // return $response;
    
    // define('MULTIPART_BOUNDARY','-----------------------'.md5(time()));
    // define('EOL',"\r\n");// PHP_EOL cannot be used for emails we need the CRFL '\r\n'
    
    // /*
    //  * Method to convert an associative array of parameters into the HTML body string
    // */
    // function getBody($fields) {
    //     $content = '';
    //     foreach ($fields as $FORM_FIELD => $value) {
    //         $content .= '--' . MULTIPART_BOUNDARY . EOL;
    //         $content .= 'Content-Disposition: form-data; name="' . $FORM_FIELD . '"' . EOL;
    //         $content .= EOL . $value . EOL;
    //     }
    //     return $content . '--' . MULTIPART_BOUNDARY . '--'; // Email body should end with "--"
    // }
    
    // /*
    //  * Method to get the headers for a basic authentication with username and passowrd
    // */
    // function getHeader($username, $password){
    //     // basic Authentication
    //     $auth = base64_encode("$username:$password");
    
    //     // Define the header
    //     return array("Authorization:Basic $auth", 'Content-Type: multipart/form-data ; boundary=' . MULTIPART_BOUNDARY );
    // }
    
    // // URL to the API that sends the email.
    // $url = 'https://xnnm3.api.infobip.com/email/1/send';
    
    // // Associate Array of the post parameters to be sent to the API
    // $postData = array(
    //     'from' => 'company@somecompany.com',
    //     'to' => 'scar20181228@gmail.com',
    //     'subject' => 'Mail subject text',
    //     'text' => 'Mail body text',
    // );
    
    // // Create the stream context.
    // $context = stream_context_create(array(
    //     'http' => array(
    //           'method' => 'POST',
    //           'header' => getHeader('username', 'password'),
    //           'content' =>  getBody($postData),
    //     )
    // ));
    
    // // Read the response using the Stream Context.
    // $response = file_get_contents($url, false, $context);
    

    $basic = BasicSetting::first();
    $user = User::findOrFail(565);
    $signal = Signal::findOrFail(7);

    $text = "<b>$signal->title</b></<br></<br>$signal->description";
    $body = $basic->email_body;
    $body = str_replace("{{name}}", $user->name, $body);
    $body = str_replace("{{message}}", $text, $body);
    $body = str_replace("{{site_title}}", $basic->title, $body);
    

    $header = ['Content-Type:multipart/form-data'];
    $postUrl = 'https://xnnm3.api.infobip.com/email/1/send';
    $to = 'scar20181228@gmail.com';
    // $to1 = 'scar20181206@hotmail.com';
    $text = 'test email';
    // $from = 'info@signals.club';
    $from = 'clients@clientes.signals.club';
    $applyTo = 'info@signals.club';
    $subject = 'test subject';
    // $postDataJson = json_encode($this->setPostData($from, $to, $subject, $text));
    // array_push($to, ('scar20181228@gmail.com'));
    // array_push($to, ('scar20181228@gmail.com'));
    
    $fields = array(
    	'from' => ($from),
    	'to' => ($to),
    	'applyTo' => ($applyTo),
    	'subject' => ($subject),
    	'html' => $body,
    );
    // $fields_string = http_build_query($fields);
    // var_dump($fields_string);
    // exit;
    $retrytime = 0;
    retry_from_here:

    $ch = curl_init();
    // Setting options
    curl_setopt($ch, CURLOPT_URL, $postUrl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, 'shuberth'.':'.'Hola321@.');
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 2);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    // Response of the POST request
    $response = curl_exec($ch);

    if ($response === '' && $retrytime <= static::RETRY_TIME) {
        $retrytime++;
        goto retry_from_here;
    }

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $responseBody = json_decode($response);
    curl_close($ch);

    return [$httpCode, $responseBody];
        



// // URL to the API that sends the email.
// $url = 'https://api.infobip.com/email/1/send';

// // Associate Array of the post parameters to be sent to the API
// $postData = array(
//     'from' => 'company@somecompany.com',
//     'to' => 'scar20181228@gmail.com',
//     'subject' => 'Mail subject text',
//     'text' => 'Mail body text',
// );

// // Create the stream context.
// $context = stream_context_create(array(
//     'http' => array(
//           'method' => 'POST',
//           'header' => $this->getHeader('shuberth', 'Hola321@.'),
//           'content' =>  $this->getBody($postData),
//     )
// ));
// $return = $this->getHeader('shuberth', 'Hola321@.');
// // $return = $this->getBody($postData);
// return $return;
// Read the response using the Stream Context.
// $response = file_get_contents($url, false, $context);
    // $curl = curl_init($url);
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // curl_setopt($curl, CURLOPT_POST, 1);
    // curl_setopt($curl, CURLOPT_POSTFIELDS, $context);
    // $response = curl_exec($curl);
    
    //     $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    // $responseBody = json_decode($response);
    // curl_close($curl);

    // return [$httpCode, $responseBody];
        
        
        
        
        
        
        //send mail test
        // $user = \App\User::where('email', 'scar20181228@gmail.com')->get()->first();
        // for ( $i = 0; $i < count($users); $i++ )
        // {
        //     $user = $users[$i];
        //     try {
        //         $this->sendMail($user->email, $user->name, "expire subject", "subject text");
        //         echo "success";
        //     }catch(\Swift_TransportException $r){
        //         $i--;
        //         sleep(2);
        //     } catch(\Exception $e) {
        //     }
        // }
        
        // $basic = BasicSetting::first();
        // $body = $basic->email_body;
        // $body = str_replace("{{name}}", $user->name, $body);
        // $body = str_replace("{{message}}", "texts texts texts texts texts texts texts texts ", $body);
        // $body = str_replace("{{site_title}}", $basic->title, $body);
        
        // $data['body'] = $body;
        // $data['subject'] = "Nueva Señal de Trading";
        // $data['g_title'] = $basic->email_sender_name;
        // $data['name'] = "me";
        // $data['from'] = 'alerts@signals.club';
        
        // // Mail::to($user->email)->queue((new EmailSender($data)));
        // Mail::to('scar20181228@gmail.com')->queue((new EmailSender($data)));
        
        
        // $this->sendMail($user->email, $user->name, $basic->expire_email_subject, $basic->expire_email_text, $basic->expire_email_title);
        
        //telegram bot
        // $botToken = "808034100:AAHfD2AK2ki2p6s7V6Hr77901tnmI5sslys";
        // $website = "https://api.telegram.org/bot" . $botToken;
        // $update = file_get_contents($website . "/getupdates");
        // $updateArray = json_decode($update, TRUE);
        // $lastData = $updateArray["result"][count($updateArray["result"]) - 1];
        // $message = $lastData["message"];
        // return $message;
        
        // $commandPos = strpos($message, ":");
        // if(substr($message, 0, $commandPos) != "/register")
        // {
        //     return "no";
        // }
        // $emailPos = strpos($message, " ");
        // $email = substr($message, $commandPos + 1, $emailPos - $commandPos);
        // $password = substr($message, $emailPos + 1);
        // return "email : " . $email . "</br>" . "password : " . $password;
        
        // kickChatMember(-1001412054969, 884393878);
        // $result = file_get_contents($website . "/unbanChatMember?chat_id=-1001412054969&user_id=884393878");
        // return $result;
        
        
        // define('MULTIPART_BOUNDARY','-----------------------'.md5(time()));
        // define('EOL',"\r\n");// PHP_EOL cannot be used for emails we need the CRFL '\r\n'
        
        // /*
        // * Method to convert an associative array of parameters into the HTML body string
        // */
        // function getBody($fields) {
        //     $content = '';
        //     foreach ($fields as $FORM_FIELD => $value) {
        //         $content .= '--' . MULTIPART_BOUNDARY . EOL;
        //         $content .= 'Content-Disposition: form-data; name="' . $FORM_FIELD . '"' . EOL;
        //         $content .= EOL . $value . EOL;
        //     }
        //     return $content . '--' . MULTIPART_BOUNDARY . '--'; // Email body should end with "--"
        // }
        
        // /*
        // * Method to get the headers for a basic authentication with username and passowrd
        // */
        // function getHeader($username, $password){
        //     // basic Authentication
        //     $auth = base64_encode("$username:$password");
            
        //     // Define the header
        //     return array("Authorization:Basic $auth", 'Content-Type: multipart/form-data ; boundary=' . MULTIPART_BOUNDARY );
        // }
        
        // // URL to the API that sends the email.
        // $url = 'https://xnnm3.api.infobip.com/email/1/send';
        
        // // Associate Array of the post parameters to be sent to the API
        // $postData = array(
        //     'from' => 'infosignalsclub@gmail.com',
        //     'to' => 'scar20181228@gmail.com',
        //     'subject' => 'Mail subject text',
        //     'text' => 'Mail body text',
        //     );
        
        // // Create the stream context.
        // $context = stream_context_create(array(
        //     'http' => array(
        //     'method' => 'POST',
        //     'header' => getHeader('shuberth', 'Hola321@.'),
        //     'content' =>  getBody($postData),
        //     )
        // ));
        
        // // Read the response using the Stream Context.
        // // $response = file_get_contents($url, false, $context);
        // $curl_handle=curl_init();
        // curl_setopt($curl_handle, CURLOPT_URL, $url);
        // curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        // curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        // $query = curl_exec($curl_handle);
        // curl_close($curl_handle);
        // echo $query;
        
        // $basic = BasicSetting::first();
        // $users = User::whereDate('expire_time','<', Carbon::now())->where('payment_type','!=',null)->where('plan_status', 1)->get();
        // foreach($users as $user)
        // {
        //     $user->plan_status = 0;
        //     $user->save();
        // }
        
        // $users = User::whereDate('expire_time','=', date('Y-m-d', strtotime('+10 days')))->where('payment_type','!=', null)->where('plan_status', 1)->get();
        // foreach($users as $user)
        // {
        //     echo $user->email . "</br>";
        // }
    }
}
