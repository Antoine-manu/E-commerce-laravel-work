<?php

namespace App\Mail;

use SendinBlue\Client\Configuration;
use SendinBlue\Client\Api\TransactionalEmailsApi;
use SendinBlue\Client\Model\SendSmtpEmail;
use GuzzleHttp\Client;
use Exception;
use Illuminate\Support\Facades\Log;

class SendinblueMailer
{
    protected $apiInstance;

    public function __construct()
    {
        $config = Configuration::getDefaultConfiguration()->setApiKey('api-key', env('SENDINBLUE_API_KEY'));
        $this->apiInstance = new TransactionalEmailsApi(new Client(), $config);
    }

    public function sendEmail($to, $subject, $content)
    {
        $sendSmtpEmail = new SendSmtpEmail([
            'to' => [['email' => $to]],
            'subject' => $subject,
            'htmlContent' => $content,
            'sender' => ['email' => env('MAIL_FROM_ADDRESS'), 'name' => env('MAIL_FROM_NAME')]
        ]);

        try {
            $this->apiInstance->sendTransacEmail($sendSmtpEmail);
            Log::info('Email sent successfully to ' . $to);
        } catch (Exception $e) {
            Log::error('Exception when calling TransactionalEmailsApi->sendTransacEmail: ' . $e->getMessage());
        }
    }
}
