<?php

namespace App\TraitsFolder;

use App\BasicSetting;
use App\EmailSetting;
use App\Signal;
use App\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\EmailSender;
use PHPMailer\PHPMailer;

trait CommonTrait
{
    public function __construct()
    {

    }

    public function sendMail($email, $name, $subject, $text, $title='')
    {
        $basic = BasicSetting::first();
        $mail_val = [
            'email' => $email,
            'name' => $name,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => $subject,
        ];
        $body = $basic->email_body;
        $body = str_replace("{{name}}", $name, $body);
        $body = str_replace("{{message}}", $text, $body);
        $body = str_replace("{{site_title}}", $title, $body);

        Mail::send('emails.email', ['body' => $body], function ($m) use ($mail_val) {
            $m->from($mail_val['g_email'], $mail_val['g_title']);
            $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
        });

    }

    public function sendSignalMail($userId, $signalID)
    {
        $basic = BasicSetting::first();
        $user = User::findOrFail($userId);
        $signal = Signal::findOrFail($signalID);
        $mail_val = [
            'email' => $user->email,
            'name' => $user->name,
            'g_email' => 'alerts@signals.club',
            'g_title' => $basic->email_sender_name,
            'subject' => "Nueva Señal de Trading",
        ];
        $text = "<b>$signal->title</b></<br></<br>$signal->description";
        $body = $basic->email_body;
        $body = str_replace("{{name}}", $user->name, $body);
        $body = str_replace("{{message}}", $text, $body);
        $body = str_replace("{{site_title}}", $basic->title, $body);

        $data['body'] = $body;
        $data['subject'] = "Nueva Señal de Trading";
        $data['g_title'] = $basic->email_sender_name;
        $data['name'] = $user->name;
        $data['from'] = 'alerts@signals.club';
        
        Mail::to($user->email)->queue((new EmailSender($data)));
        // Mail::to('scar20181228@gmail.com')->queue((new EmailSender($data)));
    }
    public function sendSignalMailInfobip($userId, $signalID)
    {
        $basic = BasicSetting::first();
        $user = User::findOrFail($userId);
        $signal = Signal::findOrFail($signalID);
        
        $text = "<b>$signal->title</b></<br></<br>$signal->description";
        $body = $basic->email_body;
        $body = str_replace("{{name}}", $user->name, $body);
        $body = str_replace("{{message}}", $text, $body);
        $body = str_replace("{{site_title}}", $basic->title, $body);

        $header = ['Content-Type:multipart/form-data'];
        $postUrl = 'https://xnnm3.api.infobip.com/email/1/send';
        $to = 'scar20181228@gmail.com';
        // $to = $user->email;
        $text = $body;
        $from = 'info@tradingescuela';
        $applyTo = 'info@tradingescuela';
        $subject = "Trading Escuela";
        $fields = array(
        	'from' => ($from),
        	'to' => ($to),
        	'applyTo' => ($applyTo),
        	'subject' => ($subject),
        	'html' => ($text),
        );
        
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
    }
    public function sendWelcomeMail($userId, $password)
    {
        $basic = BasicSetting::first();
        $user = User::findOrFail($userId);
        $mail_val = [
            'email' => $user->email,
            'name' => $user->name,
            'g_email' => 'info@tradingescuela',
            'g_title' => $basic->email_sender_name,
            'subject' => "Bienvenidos a Trading Escuela",
        ];
        $youtube_var = array();
        $url=$basic->welcome_message_youtube;
        parse_str( parse_url( $url, PHP_URL_QUERY ), $youtube_var );
        if(count($youtube_var) != 0)
        {
            $thumbnail_url = "http://img.youtube.com/vi/" . $youtube_var['v'] . "/mqdefault.jpg";
            $replace_text = "<a href='". $basic->welcome_message_youtube . "'><img src='".$thumbnail_url."' alt='signal club ad'></a>";
            $text = "<b>$basic->welcome_message_title</b></<br></<br>$basic->welcome_message_body</br>";
            $text = preg_replace('!(http|ftp|scp)(s)?(:\/\/[a-zA-Z0-9.?&_/]+[=][^<]+)<!', "<a href='$1$2$3'><img src='". $thumbnail_url . "' alt=''/></a><",$text);
        }
        else
        {
            $text = "<b>$basic->welcome_message_title</b></<br><div>Email: " . $user->email . ", Contraseña: " . $password . "</div></<br>$basic->welcome_message_body</br>";
        }
        $body = $basic->email_body;
        $body = str_replace("{{name}}", $user->name, $body);
        $body = str_replace("{{message}}", $text, $body);
        $body = str_replace("{{site_title}}", $basic->welcome_message_title, $body);
        // var_dump($body);
        // exit;
        // $data['body'] = $body;
        // $data['body'] = "testing...";
        // $data['subject'] = "Bienvenidos a Trading Escuela";
        // $data['g_title'] = $basic->email_sender_name;
        // $data['name'] = 'name';
        // $data['from'] = 'info@tradingescuela';

        // mail('scar20181228@gmail.com','subject','message');
        $mail = new PHPMailer\PHPMailer();
        try {
            $mail->isSMTP(); // tell to use smtp
            $mail->CharSet = "utf-8"; // set charset to utf8
            $mail->SMTPAuth = true;  // use smpt auth
            $mail->SMTPSecure = "tls"; // or ssl
            $mail->Host = "mail.tradingescuela.com";
            $mail->Port = 25; // most likely something different for you. This is the mailtrap.io port i use for testing. 
            $mail->Username = "info@tradingescuela.com";
            $mail->Password = "}TB&Uko7@KlY";
            $mail->setFrom("info@tradingescuela.com",$basic->email_sender_name);
            $mail->Subject = "Bienvenidos a Trading Escuela";
            $mail->MsgHTML($body);
            $mail->addAddress($user->email);
            $mail->send();
        } catch (phpmailerException $e) {
            var_dump("fail1");
            exit;
        } catch (Exception $e) {
            var_dump("fail2");
            exit;
        }
        // Mail::to($user->email)->queue((new EmailSender($data)));
        // Mail::to('scar20181228@gmail.com')->send((new EmailSender($data)));
        // if (Mail::failures()) {
        //     var_dump("fail");
        //     exit;
        // } else {
        //     var_dump("success");
        //     exit;
        // }
    }

    public function verificationSend($id)
    {
        $user = User::findOrFail($id);
        $basic = BasicSetting::first();
        $mail_val = [
            'email' => $user->email,
            'name' => $user->name,
            'g_email' => $basic->email,
            'g_title' => $basic->email_sender_name,
            'subject' => "Verificación de Email",
        ];


        $text = '<h3>Por favor verifica tu email.</h3><h3>Tu código de verificación es: ' . $user->email_code . '</h3>';

        $body = $basic->email_body;
        $body = str_replace("{{name}}", $user->name, $body);
        $body = str_replace("{{message}}", $text, $body);
        $body = str_replace("{{site_title}}", $basic->title, $body);

        Mail::send('emails.email', ['body' => $body], function ($m) use ($mail_val) {
            $m->from($mail_val['g_email'], $mail_val['g_title']);
            $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
        });

    }

    public function phoneVerification($userID)
    {
        $basic = BasicSetting::first();
        $user = User::findOrFail($userID);
        $text = 'Tu código de verificación de Tradin Escuela móvil es ' . $user->phone_code;
        $appi = $basic->smsapi;
        $text = urlencode($text);
        $appi = str_replace("{{number}}", $user->country_code . $user->phone, $appi);
        $appi = str_replace("{{message}}", $text, $appi);
        $result = file_get_contents($appi);

    }

    public function telegramSend($signalID)
    {
        $basic = BasicSetting::first();
        if ($basic->telegram_status == 1) {
            $signal = Signal::findOrFail($signalID);
            $botToken = $basic->smsapi;
            $web = 'https://api.telegram.org/bot' . $botToken;
            $update = file_get_contents($web . "/getUpdates");
            $updateArray = json_decode($update, true);
            $chatId = $updateArray['result'][0]["message"]['chat']['id'];
            $text = strip_tags($signal->description);
            file_get_contents($web . "/sendMessage?chat_id=" . $chatId . "&text=" . $text);

        }

    }

    public function sendSignalSMS($userID)
    {
        $user = User::findOrFail($userID);
        $basic = BasicSetting::first();
        $appi = $basic->smsapi;
        $text = $basic->sms_tem;
        $to = $user->country_code . $user->phone;
        $text = urlencode($text);
        $appi = str_replace("{{number}}", $to, $appi);
        $appi = str_replace("{{message}}", $text, $appi);
        $result = file_get_contents($appi);
    }

    public function sendSignalCustomSMS($userID, $text)
    {
        $user = User::findOrFail($userID);
        $basic = BasicSetting::first();
        $appi = $basic->smsapi;
        $to = $user->country_code . $user->phone;
        $text = urlencode($text);
        $appi = str_replace("{{number}}", $to, $appi);
        // $appi = str_replace("{{number}}", "+17152928091", $appi);
        $appi = str_replace("{{message}}", $text, $appi);
        $result = file_get_contents($appi);

    }

    public function sendSms($to, $text)
    {
        $basic = BasicSetting::first();
        $appi = $basic->smsapi;
        $text = urlencode($text);
        $appi = str_replace("{{number}}", $to, $appi);
        $appi = str_replace("{{message}}", $text, $appi);
        $result = file_get_contents($appi);
    }

    public function sendContact($email, $name, $subject, $text, $phone)
    {
        $basic = BasicSetting::first();

        $mail_val = [
            'email' => 'alerts@signals.club',
            'name' => 'Contact Email',
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => 'Contact Message - ' . $subject,
        ];

        $site_title = $basic->title;
        $body = $basic->email_body;
        $body = str_replace("Hi", 'Hi. I\'m', $body);
        $body = str_replace("{{name}}", $name . " - " . $phone . " - " . $email, $body);
        $body = str_replace("{{message}}", $text, $body);
        $body = str_replace("{{site_title}}", $site_title, $body);

        Mail::send('emails.email', ['body' => $body], function ($m) use ($mail_val) {
            $m->from($mail_val['email'], $mail_val['name']);
            $m->to($mail_val['g_email'], $mail_val['g_title'])->subject($mail_val['subject']);
        });
    }

    public function userPasswordReset($email, $name, $route)
    {
        $basic = BasicSetting::first();
        $mail_val = [
            'email' => $email,
            'name' => $name,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => 'Password Reset Request',
        ];

        $reset = DB::table('password_resets')->whereEmail($email)->count();
        $token = Str::random(40);
        $bToken = bcrypt($token);
        $url = route($route, $token);
        if ($reset == 0) {
            DB::table('password_resets')->insert(
                ['email' => $email, 'token' => $bToken]
            );
            Mail::send('emails.reset-email', ['name' => $name, 'link' => $url, 'footer' => $basic->copy_text], function ($m) use ($mail_val) {
                $m->from($mail_val['g_email'], $mail_val['g_title']);
                $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
            });
        } else {
            DB::table('password_resets')
                ->where('email', $email)
                ->update(['email' => $email, 'token' => $bToken]);
            Mail::send('emails.reset-email', ['name' => $name, 'link' => $url, 'footer' => $basic->copy_text], function ($m) use ($mail_val) {
                $m->from($mail_val['g_email'], $mail_val['g_title']);
                $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
            });
        }
    }

    public function paymentConfirm($userId, $amount, $custom, $type)
    {
        $basic = BasicSetting::first();
        $user = User::findOrFail($userId);
        $mail_val = [
            'email' => $user->email,
            'name' => $user->name,
            'g_email' => $basic->email,
            'g_title' => $basic->title,
            'subject' => "Compra de suscripción del plan completada",
        ];

        $urText = 'Plan de suscripción confirmado exitosamente: ' . $basic->symbol . $amount . ' vía - ' . $type . ' <br> Número de Orden: ' . $custom . '.<br> 
                    Recuerda visitar la página de Welcome <a href="https://tradingescuela.com/user/welcome">en tu panel de usuario</a> y seguirlas instrucciones.';
        $body = $basic->email_body;
        $body = str_replace("{{name}}", $user->name, $body);
        $body = str_replace("{{message}}", $urText, $body);
        $body = str_replace("{{site_title}}", $basic->title, $body);

        Mail::send('emails.email', ['body' => $body], function ($m) use ($mail_val) {
            $m->from($mail_val['g_email'], $mail_val['g_title']);
            $m->to($mail_val['email'], $mail_val['name'])->subject($mail_val['subject']);
        });
    }

    public static function getRating($rating)
    {
        if ($rating == 0) {
            return '<i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>';
        } elseif ($rating == 1) {
            return '<i class="fa fa-star star-color"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>';
        } elseif ($rating == 2) {
            return '<i class="fa fa-star star-color"></i> <i class="fa fa-star star-color"></i> <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>';
        } elseif ($rating == 3) {
            return '<i class="fa fa-star star-color"></i> <i class="fa fa-star star-color"></i> <i class="fa fa-star star-color"></i>
                                            <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>';
        } elseif ($rating == 4) {
            return '<i class="fa fa-star star-color"></i> <i class="fa fa-star star-color"></i> <i class="fa fa-star star-color"></i>
                                            <i class="fa fa-star star-color"></i> <i class="fa fa-star-o"></i>';
        } else {
            return '<i class="fa fa-star star-color"></i> <i class="fa fa-star star-color"></i> <i class="fa fa-star star-color"></i>
                                            <i class="fa fa-star star-color"></i> <i class="fa fa-star star-color"></i>';
        }
    }
}