<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminUserLoginNotification extends Notification
{
    use Queueable;
    private $name;
    private $email;
    private $pass;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user,$pass)
    {
        $this -> name = $user -> name;
        $this -> email= $user -> email;
        $this -> pass = $pass;
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
        return (new MailMessage)
                    ->greeting('Hi', $this -> name)
                    ->line('You"re welcome to eshop')
                    ->line('Access info for login')
                    ->line('Email'. $this->email)
                    ->line('Password'.$this->pass)
                    ->action('Login Now', url('/admin'))
                    ->line('Thank you for using our application!');
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
