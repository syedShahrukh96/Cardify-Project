<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ScreenshotEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $screenshot;

    public function __construct($screenshot)
    {
        $this->screenshot = $screenshot;
    }

    public function build()
    {
        return $this->view('emails.screenshot') // Create an email blade template (resources/views/emails/screenshot.blade.php)
            ->attachData(base64_decode(preg_replace('/^data:image\/(jpeg|jpg|png);base64,/', '', $this->screenshot)), 'card.jpg', [
                'mime' => 'image/jpeg',
            ])
            ->subject('Your Card');
    }
}
