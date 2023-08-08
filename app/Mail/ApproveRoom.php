<?php

namespace App\Mail;

use App\Models\BookingList;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApproveRoom extends Mailable
{
    use Queueable, SerializesModels;

    public $MailApprove;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($MailApprove)
    {
        $this->MailApprove=$MailApprove;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Konfirmasi Pemesanan Ruang Rapat',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mails.approve',
        );
    }
    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
