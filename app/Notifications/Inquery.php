<?php

namespace App\Notifications;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Inquery extends Notification
{
    use Queueable;
    protected $product_id;
    protected $username;
    protected $email;
    protected $contact_number;
    protected $question;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($product_id, $username, $email, $contact_number, $question)
    {
        $this->product_id = $product_id;
        $this->username = $username;
        $this->email = $email;
        $this->contact_number = $contact_number;
        $this->question = $question;
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
        $product = Product::findorFail($this->product_id);
        $productname = $product->name ?? '--';
        $username = $this->product_id;
        $email = $this->email;
        $contact_number = $this->contact_number;
        $question = $this->question;

        return (new MailMessage)
        ->subject("Inquery")
        ->markdown('emails.inquery', compact('productname', 'username', 'email', 'contact_number', 'question'));

                    // ->line('The introduction to the notification.')
                    // ->action('Notification Action', url('/'))
                    // ->line('Thank you for using our application!');
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
