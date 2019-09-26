<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Telegram;
use App\TelegramCommand;
use App\TelegramSpam;
use Illuminate\Support\Facades\Log;

class TelegramController extends Controller
{
    public function __construct()
    {
    }
    
    public function isAdmin($chatId, $userId)
    {
        $member = Telegram::getChatMember([
            'chat_id' => $chatId,
            'user_id' => $userId,
        ]);
        if($member->status == 'member')
            return false;
        else
            return true;
    }
    
    public function responseUpdate()
    {
        $updates = Telegram::getWebhookUpdates();
        $chatId = $updates->getMessage()->getChat()->getId();
        $userId = $updates->getMessage()->from->id;
        $messageId = $updates->getMessage()->getMessageId();
        $text = $updates->getMessage()->getText();
        // $command = TelegramCommand::where("name", $text)->get()->first();
        $commands = TelegramCommand::all();
        $command = null;
        
        foreach($commands as $command_)
        {
            if (strpos(strtoupper($text), strtoupper($command_->name)) !== false)
            {
                $command = $command_;
                break;
            }
        }
        
        // $noMatchMessage = TelegramCommand::where('name', 'NoMatch')->get()->first();
        
        //delete spam messages
        // $spams = TelegramSpam::all();
        // foreach($spams as $spam)
        // {
        //     if (strpos(strtoupper($text), strtoupper($spam->keyword)) !== false && $this->isAdmin($chatId, $userId) === false)
        //     {
        //         Telegram::deleteMessage([
        //             'chat_id' => $chatId,
        //             'message_id' =>$messageId ]);
        //             return;
        //     }
        // }
        
        // reply to messages
        if(!$command)
        {
            // Telegram::sendMessage([
            //     'chat_id' => $chatId,
            //     'text' => 'no match',
            //     'parse_mode' => 'HTML']);
        }
        else
        {
            Telegram::sendMessage([
                'chat_id' => $chatId,
                'text' => $command->message,
                'parse_mode' => 'HTML']);
        }
        // $message = $updates->getMessage();
        // $arrNewMembers = $message->new_chat_members;
        // if($arrNewMembers)
        // {
        //     $welcome_message = TelegramCommand::where('name', '{welcome}')->get()->first()->message;
        //     $welcome_message_group = TelegramCommand::where('name', '{welcome_to_group}')->get()->first()->message;
        //     foreach($arrNewMembers as $newChatMember)
        //     {
        //         $first_name = $newChatMember["first_name"];
        //         $last_name = $newChatMember["last_name"];
        //         $welcome_message = str_replace('{first_name}', $first_name, $welcome_message);
        //         $welcome_message = str_replace('{last_name}', $last_name, $welcome_message);
        //         $welcome_message_group = str_replace('{first_name}', $first_name, $welcome_message_group);
        //         $welcome_message_group = str_replace('{last_name}', $last_name, $welcome_message_group);
        //         Telegram::sendMessage([
        //             'chat_id' => $newChatMember["id"],
        //             'text' => $welcome_message,
        //             'parse_mode' => 'HTML']);
        //         Telegram::sendMessage([
        //             'chat_id' => -1001495859801,
        //             'text' => $welcome_message_group,
        //             'parse_mode' => 'HTML']);
        //     }
        // }
    }
    
    public function testFunction()
    {
        // $param = array("url"=>"https://signals.club/api/803650442:AAG0HZNhgJtX27ttj4r8-J7w41H2-SUJD3Q", "certificate"=>null, "max_connections"=>200);
        // $result = Telegram::setWebhook($param);
        // echo $result;

        // $i = 0;
        // $count = 0;
        // for($i = 0; $i < 300; $i++)
        // {
        //     try {
        //         $updates = file_get_contents("https://api.telegram.org/bot803650442:AAG0HZNhgJtX27ttj4r8-J7w41H2-SUJD3Q/getupdates");
        //         $count++;
        //         // echo json_encode($updates);
        //     } catch(HttpException $ex) {
        //         $count--;
        //         continue;
        //     }
        //     // break;
        // }
        // return $count;
        
        // Telegram::sendMessage([
        //     'chat_id' => -1001495859801,
        //     'text' => 'Good morning everybody',
        //     'parse_mode' => 'HTML']);
        
        
        /*
        define('MULTIPART_BOUNDARY','-----------------------'.md5(time()));
        define('EOL',"\r\n");// PHP_EOL cannot be used for emails we need the CRFL '\r\n'
        
        function getBody($fields) {
            $content = '';
            foreach ($fields as $FORM_FIELD => $value) {
                $content .= '--' . MULTIPART_BOUNDARY . EOL;
                $content .= 'Content-Disposition: form-data; name="' . $FORM_FIELD . '"' . EOL;
                $content .= EOL . $value . EOL;
            }
            return $content . '--' . MULTIPART_BOUNDARY . '--'; // Email body should end with "--"
        }
        
        function getHeader($username, $password){
            // basic Authentication
            $auth = base64_encode("$username:$password");
            
            // Define the header
            return array("Authorization:Basic $auth", 'Content-Type: multipart/form-data ; boundary=' . MULTIPART_BOUNDARY );
        }
        
        // URL to the API that sends the email.
        $url = 'https://xnnm3.api.infobip.com/email/1/send';
        
        // Associate Array of the post parameters to be sent to the API
        $postData = array(
            'from' => 'company@somecompany.com',
            'to' => 'scar20181228@gmail.com',
            'subject' => 'Mail subject text',
            'text' => 'Mail body text',
            );
        
        // Create the stream context.
        $context = stream_context_create(array(
            'http' => array(
                'method' => 'POST',
                'header' => getHeader('shuberth', 'Hola321@.'),
                'content' =>  getBody($postData),
            )
        ));
        
        // Read the response using the Stream Context.
        // $response = file_get_contents($url, false, $context);
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,'https://xnnm3.api.infobip.com/email/1/send');
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        return $query;
        curl_close($curl_handle);
        */
        
    }
}
