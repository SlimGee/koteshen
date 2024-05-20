<?php

namespace App\Mail\Estimate;

use App\Models\Estimate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use OsiemSiedem\Autolink\Facades\Autolink;

class EstimateDelivery extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param  array<string, string>  $payload
     */
    public function __construct(public Estimate $estimate, public array $payload)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->payload['subject'],
            to: $this->payload['to'],
            cc: $this->payload['copy'],
            replyTo: [new Address($this->estimate->business->user->email, $this->estimate->business->name)],
            from: new Address($this->estimate->business->user->email, $this->estimate->business->name)
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.estimates.delivery',
            with: [
                'estimate' => $this->estimate,
                'message' => Autolink::convert($this->payload['message']),
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return $this->payload['attach'] ?? false == true ? [
            Attachment::fromStorageDisk('local', $this->estimate->number . '.pdf'),
        ] : [];
    }
}
