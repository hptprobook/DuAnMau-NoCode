<?php

namespace App\Mail;

use App\Models\Address;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ThanksMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $orderId;
    public $orderDetail;
    public $user;
    public $address;

    public function __construct($orderId)
    {
        $this->orderId = $orderId;
        $this->orderDetail = OrderDetail::find($orderId);
        $this->user = User::find($this->orderDetail->user_id);
        $this->address = Address::find($this->orderDetail->address_id);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nocode cảm ơn bạn đã đặt hàng!',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'admin.mails.thanks',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
