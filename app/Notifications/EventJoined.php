<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Event; 

class EventJoined extends Notification
{
    use Queueable;
    protected $event;
    protected $user;
    protected $type;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Event $event, String $type) 
    {
        $this->event = $event; 
        $this->user = auth()->user(); 
        $this->type = $type;

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
        if ($this->type == "join") {
            return (new MailMessage)
                ->from($this->user->email, $this->user->name)
                ->line('You have successfully joined the event: ' . $this->event->name)
                ->line('Event Date: ' . $this->event->date->format('Y-m-d'))
                ->action('View Event', route('events.show', $this->event))
                ->line('Thank you for using our application!');
        } else {
            return (new MailMessage)
                ->from($this->user->email, $this->user->name)
                ->line('You have canceled your attendance to the event: ' . $this->event->name)
                ->line('You can join again by visiting our site.')
                ->action('View Event', route('events.show', $this->event))
                ->line('Thank you for using our application!');
        }
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
