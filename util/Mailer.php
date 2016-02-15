<?php
class Mailer {

    public static function sendSignupWelcomeEmail($email, $name) {
        global $base_url;

$html = <<<WELCOMEBODY
<div style="background-color:#ffffff;border:#e5e5e5 solid 1px">
    <div class="adM"></div>
    <div style="padding:10px;line-height:18px">
        <div style="font-size:12px">Hello and welcome <strong style="color:#195c9b">'.$name.'</strong></div>
        <div style="font-size:12px;padding:10px 0 0 0">Thank you for registering with AirLOL Services.</div>
        <div style="font-size:12px;padding:10px 0 0 0">To confirm your registration, click on the link below. The link is valid for <b>30 days</b>. In the event you are unable to confirm your registration within the specified period, do not hesitate to write to us.</div>
        <div style="padding:10px 0px 0px 0px;word-wrap:break-word">
            <a href="http://'.$base_url.'" style="color:#00f" target="_blank">
                <span style="font-size:12px;text-decoration:underline;margin:0px;word-wrap:break-word;color:#00f">'.$base_url.'</span>
            </a>
        </div>
        <div style="font-size:12px;padding:10px 0px 0px 0px">Look forward to serving your business needs.</div>
        <div style="font-size:12px;padding:10px 0 0 0;line-height:16px">
            Thank you<div class="yj6qo ajU"><div id=":o2" class="ajR" role="button" tabindex="0" aria-label="Show trimmed content" data-tooltip="Show trimmed content"><img class="ajT" src="//ssl.gstatic.com/ui/v1/icons/mail/images/cleardot.gif"></div></div><span class="HOEnZb adL"><font color="#888888"><br>AirLOL Team<br> <a href="http://www.airlol.com/" style="color:#00f" target="_blank">http://www.airlol.com/</a>
        </font></span></div><span class="HOEnZb adL"><font color="#888888">
    </font></span></div><span class="HOEnZb adL"><font color="#888888">
</font></span></div>
WELCOMEBODY

        $subject = 'Welcome To AirLOL!';
        $from = 'notifications@airlol.com';
        $fname = 'AirLOL Team';

        self::send($html, $subject, $from, $fname, $email, $name);

    }

    private static function send($html, $subject, $from, $fname, $to, $tname) {
        global $mandrill_key;
        $mandrill = new Mandrill($mandrill_key);

        try {
            $message = array(
                'html' => $html,
                'text' => '',
                'subject' => $subject,
                'from_email' => 'notifications@airlol.com',
                'from_name' => $fname,
                'to' => array(
                    array(
                        'email' => $to,
                        'name' => $tname,
                        'type' => 'to'
                    )
                )
            );
            $result = $mandrill->messages->send($message);
        } catch(Mandrill_Error $e) {
            // Mandrill errors are thrown as exceptions
            echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
            // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
            throw $e;
        }
    }

}
?>