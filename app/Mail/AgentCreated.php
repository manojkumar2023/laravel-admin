<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AgentCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $agent;
    public $password;

    public function __construct($agent, $password)
    {
        $this->agent = $agent;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject('Your Agent Account')->view('emails.agent_created');
    }
}
