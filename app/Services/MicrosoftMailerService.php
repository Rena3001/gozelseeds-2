<?php

namespace App\Services;

use App\Models\ContactInfoSmtp;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use TheNetworg\OAuth2\Client\Provider\Azure;

class MicrosoftMailerService
{
    protected ContactInfoSmtp $smtp;

    public function __construct()
    {
        $this->smtp = ContactInfoSmtp::where('is_active', true)->firstOrFail();
    }

    protected function getAccessToken(): string
    {
        return Cache::remember('ms_smtp_access_token', 3300, function () {

            $provider = new Azure([
                'clientId'     => $this->smtp->client_id,
                'clientSecret' => $this->smtp->client_secret,
                'tenant'       => $this->smtp->tenant_id,
            ]);

            $token = $provider->getAccessToken('client_credentials', [
                'scope' => ['https://outlook.office365.com/.default'],
            ]);

            return $token->getToken();
        });
    }

    public function mailer(): Mailer
    {
        $transport = new EsmtpTransport(
            $this->smtp->host,
            $this->smtp->port,
            true
        );

        $transport->setUsername($this->smtp->from_email);
        $transport->setPassword($this->getAccessToken());

        return new Mailer($transport);
    }
}
