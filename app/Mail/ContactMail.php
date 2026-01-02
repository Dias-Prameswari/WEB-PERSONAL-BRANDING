<?php


namespace App\Mail;
use Illuminate\Bus\Queueable; use Illuminate\Mail\Mailable; use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable {
  use Queueable, SerializesModels;
  public $msg;
  public function __construct($msg){ $this->msg=$msg; }
  public function build(){
    return $this->subject('Kontak: '.$this->msg->subject)->markdown('mail.contact.new');
  }
}

?>