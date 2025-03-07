<?php

namespace YukataRm\Laravel\Mail;

use Illuminate\Mail\Mailable as BaseMailable;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Headers;

/**
 * Mailable
 *
 * @package YukataRm\Laravel\Mail
 */
class Mailable extends BaseMailable
{
    use Queueable, SerializesModels;

    /**
     * Envelope instance
     *
     * @var \Illuminate\Mail\Mailables\Envelope
     */
    protected Envelope $_envelope;

    /**
     * Content instance
     *
     * @var \Illuminate\Mail\Mailables\Content
     */
    protected Content $_content;

    /**
     * Attachment instance array
     *
     * @var array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    protected array $_attachment;

    /**
     * Headers instance
     *
     * @var \Illuminate\Mail\Mailables\Headers
     */
    protected Headers $_headers;

    /**
     * constructor
     *
     * @param \Illuminate\Mail\Mailables\Envelope $envelope
     * @param \Illuminate\Mail\Mailables\Content $content
     * @param array<int, \Illuminate\Mail\Mailables\Attachment> $attachments
     * @param \Illuminate\Mail\Mailables\Headers $headers
     */
    public function __construct(
        Envelope $envelope,
        Content $content,
        array $attachments,
        Headers $headers
    ) {
        $this->_envelope   = $envelope;
        $this->_content    = $content;
        $this->_attachment = $attachments;
        $this->_headers    = $headers;
    }

    /**
     * get Envelope instance
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope(): Envelope
    {
        return $this->_envelope;
    }

    /**
     * get Content instance
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content(): Content
    {
        return $this->_content;
    }

    /**
     * get Attachment instance array
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return $this->_attachment;
    }

    /**
     * get Headers instance
     *
     * @return \Illuminate\Mail\Mailables\Headers
     */
    public function headers(): Headers
    {
        return $this->_headers;
    }
}
