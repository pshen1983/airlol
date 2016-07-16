<?php
class Mailer {

    public static function sendSignupWelcomeEmail($email, $name) {
        global $base_url, $sendgrid_signup;

$html = 
'<div style="background-color:#ffffff;border:#e5e5e5 solid 1px">
    <div class="adM"></div>
    <div style="padding:10px;line-height:18px">
        <div style="font-size:12px">Hello and welcome <strong style="color:#195c9b">'.$name.'</strong></div>
        <div style="font-size:12px;padding:10px 0 0 0">Thank you for registering with AirLoL Services.</div>
        <div style="font-size:12px;padding:10px 0 0 0">To confirm your registration, click on the link below. The link is valid for <b>30 days</b>. In the event you are unable to confirm your registration within the specified period, do not hesitate to write to us.</div>
        <div style="padding:10px 0px 0px 0px;word-wrap:break-word">
            <a href="http://'.$base_url.'" style="color:#00f" target="_blank">
                <span style="font-size:12px;text-decoration:underline;margin:0px;word-wrap:break-word;color:#00f">'.$base_url.'</span>
            </a>
        </div>
        <div style="font-size:12px;padding:10px 0px 0px 0px">Look forward to serving your business needs.</div>
        <div style="font-size:12px;padding:10px 0 0 0;line-height:16px">
            Thank you<div class="yj6qo ajU"><div id=":o2" class="ajR" role="button" tabindex="0" aria-label="Show trimmed content" data-tooltip="Show trimmed content"><img class="ajT" src="//ssl.gstatic.com/ui/v1/icons/mail/images/cleardot.gif"></div></div><span class="HOEnZb adL"><font color="#888888"><br>AirLoL Team<br> <a href="http://www.airlol.com/" style="color:#00f" target="_blank">http://www.airlol.com/</a>
        </font></span></div><span class="HOEnZb adL"><font color="#888888">
    </font></span></div><span class="HOEnZb adL"><font color="#888888">
</font></span></div>';

        $subject = 'Welcome To AirLoL!';
        $from = 'notifications@airlol.com';
        $fname = 'AirLoL Team';
        $templateId = $sendgrid_signup;

        self::send($subject, $from, $fname, $email, $name, $templateId, $html);
    }


    public static function sendResetPasswordEmail($email, $name, $token) {
        global $base_url, $sendgrid_forget;

$html = 
'<div style="background-color:#ffffff;border:#e5e5e5 solid 1px">
    <div class="adM"></div>
    <div style="padding:10px;line-height:18px">
        <div style="font-size:12px">Hello <strong style="color:#195c9b">'.$name.'</strong></div>
        <div style="font-size:12px;padding:10px 0 0 0">You have resently request for a password reset on . if you did not submit this request, please ignore this email.</div>
        <div style="font-size:12px;padding:10px 0 0 0">To reset your password, click on the link below. The link is valid for <b>15 mins</b>. In the event you are unable to confirm your registration within the specified period, please submit another password reset request.</div>
        <div style="padding:10px 0px 0px 0px;word-wrap:break-word">
            <a href="http://'.$base_url.'/reset-password?p='.md5($email).'&token='.$token.'" style="color:#00f" target="_blank">
                <span style="font-size:12px;text-decoration:underline;margin:0px;word-wrap:break-word;color:#00f">Reset Your Password</span>
            </a>
        </div>
        <div style="font-size:12px;padding:10px 0px 0px 0px">Look forward to serving your business needs.</div>
        <div style="font-size:12px;padding:10px 0 0 0;line-height:16px">
            Thank you<div class="yj6qo ajU"><div id=":o2" class="ajR" role="button" tabindex="0" aria-label="Show trimmed content" data-tooltip="Show trimmed content"><img class="ajT" src="//ssl.gstatic.com/ui/v1/icons/mail/images/cleardot.gif"></div></div><span class="HOEnZb adL"><font color="#888888"><br>AirLoL Team<br> <a href="http://www.airlol.com/" style="color:#00f" target="_blank">http://www.airlol.com/</a>
        </font></span></div><span class="HOEnZb adL"><font color="#888888">
    </font></span></div><span class="HOEnZb adL"><font color="#888888">
</font></span></div>';

        $subject = 'Reset Your AirLoL Password';
        $from = 'notifications@airlol.com';
        $fname = 'AirLoL Team';
        $templateId = $sendgrid_forget;

        self::send($subject, $from, $fname, $email, $name, $templateId, $html);

    }

    private static function send($subject, $from, $fname, $to, $tname, $templateId, $html, $text="") {
        global $sendgrid_apikey;

        $js = array(
            'filters' => array('templates' => array('settings' => array('enable' => 1, 'template_id' => $templateId)))
        );

        error_log(json_encode($js));

        $params = array(
            'to'        => $to, 
            'toname'    => $tname,
            'from'      => $from,
            'fromname'  => $fname,
            'subject'   => $subject, 
            'text'      => $text,
            'html'      => $html,
            'x-smtpapi' => json_encode($js),
        );

        $url = 'https://api.sendgrid.com/api/mail.send.json'; 
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $sendgrid_apikey));
        curl_setopt ($ch, CURLOPT_POST, true);
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        Logger::info("Email to " . $to . " - " . $response);
    }

}
?>