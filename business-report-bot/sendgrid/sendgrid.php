<?php

class SendGridMailer {
    private $apiKey;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function send($to, $subject, $content) {
        $email = [
            'personalizations' => [
                [
                    'to' => [
                        ['email' => $to]
                    ],
                    'subject' => $subject
                ]
            ],
            'from' => [
                'email' => "isaacjackson286@gmail.com"
            ],
            'content' => [
                [
                    'type' => 'text/html',
                    'value' => $content
                ]
            ]
        ];

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.sendgrid.com/v3/mail/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                "Authorization: Bearer {$this->apiKey}",
                "Content-Type: application/json"
            ],
            CURLOPT_POSTFIELDS => json_encode($email)
        ]);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            return "Error: " . curl_error($curl);
        }

        curl_close($curl);

        return $response;
    }
}
