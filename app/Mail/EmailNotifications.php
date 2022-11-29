<?php
  
namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
  
class EmailNotifications extends Mailable
{
    use Queueable, SerializesModels;
  
    public $details;
    public $subject;
    public $toName;
     public $greeting;
     
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $subject, string $to_name=null,string $details=null,string $greenting=null)
    {
        $this->details = $details;
        $this->subject = $subject;
        $this->toName = $to_name;
        $this->greeting = $greenting;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
                    ->view('emails.myEmailNotification');
    }
}