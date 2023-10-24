<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\User;



class JobApplicationNotification extends Notification
{
    use Queueable;
    protected $user;
    protected $jobApplication;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(JobApplication $jobApplication)
    {
        
        $this->user =auth()->user();
                
        $this->jobApplication = $jobApplication;
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
          ->from($this->user->email, $this->user->name) 
            ->subject('Job Application Submitted')
            ->line('You have successfully submitted a job application to.'. $this->jobApplication->job->title)
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
