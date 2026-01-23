<?php

namespace App\Console\Commands;

use App\Services\MicrosoftMailerService;
use Illuminate\Console\Command;
use Symfony\Component\Mime\Email;

class TestMicrosoftMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-microsoft-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(MicrosoftMailerService $mailer)
{
    $email = (new Email())
        ->from(config('mail.from.address'))
        ->to('your@email.com')
        ->subject('SMTP OAuth Test')
        ->text('Everything works perfectly ✅');

    $mailer->mailer()->send($email);

    $this->info('Mail sent successfully');
}
}