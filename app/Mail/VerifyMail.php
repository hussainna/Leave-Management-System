<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data = [];

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Verify Mail',
        );
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from($this->data['email'], $this->data['name'])
            ->subject('تفعيل الموظف')
            ->view('emails.verify')  // Use the 'emails.verify' blade view
            ->with('data', $this->data);
    }
}
