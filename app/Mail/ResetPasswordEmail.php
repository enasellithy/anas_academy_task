<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ResetPasswordEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    public function __construct($data = []) {
        //
        $this->data = $data;
    }

    public function build() {
        return $this->markdown('emails.resetPassword')
            ->subject('Reset Password')
            ->with('data', $this->data);
    }
}
