<?php
require 'vendor/autoload.php';
use \Mailjet\Resources;

class sendemail{
    public static function sendmail($to,$name,$subject,$otp){
        $mj = new \Mailjet\Client('1662f0c8b4c265e18ef7186bdb724ad6','46b648f8215a0fee6a8e6e4aa0dde148',true,['version' => 'v3.1']);
        $body = [
            
            'Messages' => [
                [
                    'From' => [
                        'Email' => "efshitaria123@gmail.com",
                        'Name' => "no reply"
                    ],
                    'To' => [
                        [
                            'Email' => "$to",
                            'Name' => "$name"
                        ]
                    ],
                    'Subject' => "$subject",
                    'TextPart' => "Verification",
                    'HTMLPart' => "<h3>Verify Your Account.<br> Your OTP: $otp</h3>"
                   
                ]
            ]
        ];
        
        // All resources are located in the Resources class
        
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        
        // Read the response
        
      //$response->success() && var_dump($response->getData());
      //  echo '<h1> success</h1>';

    }
}

?>