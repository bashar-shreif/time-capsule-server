<?php

namespace App\Mail;

use App\Models\Capsule;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CapsuleMail extends Mailable
{
    use Queueable, SerializesModels;

    public $capsule;

    public function __construct(Capsule $capsule)
    {
        $this->capsule = $capsule;
    }

    public function build()
    {
        return $this->subject('Happy Capsule Reveal!')
                    ->view('email')
                    ->with([
                        'capsule' => $this->capsule,
                    ]);
    }
}