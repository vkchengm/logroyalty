<?php

namespace App\Notifications;

use App\Models\Permit;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PermitUpdated extends Notification implements ShouldQueue
{
    use Queueable;

    // public $permit;
    public $line;
    public $subject;
    public $url;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    // public function __construct(Permit $permit, $subject, $line, $url)
    public function __construct($subject, $line, $url)
    {
        // $this->permit = $permit;
        $this->line = $line;
        $this->subject = $subject;
        $this->url = $url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // $url = url('/permits/'.$this->permit->id);
        return (new MailMessage)
                    ->greeting('Hi!')
                    ->subject($this->subject)
                    ->line($this->line)
                    ->action('View Permit', $this->url)

                    ->line('Thank you!');
                    
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
