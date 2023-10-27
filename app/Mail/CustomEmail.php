<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomEmail extends Mailable



{
    use Queueable, SerializesModels;
    protected $name;
    protected $message;

    public function __construct($name, $message)
    {
        $this->name = $name;
        $this->message = $message;
    }

    public function build()
    {
        return $this->subject('Your Subject Here')
                    ->view('eml') // Update the view name here
                    ->with(['name' => $this->name, 'message' => $this->message]);
    }
}
