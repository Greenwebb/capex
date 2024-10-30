<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoanApplication extends Mailable
{
    use Queueable, SerializesModels;

    public $data, $files;

    /**
     * Create a new message instance.
     *
     * @param  array  $data
     * @param  array  $files
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.loan-email');
    }
}
