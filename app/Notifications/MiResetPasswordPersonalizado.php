<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MiResetPasswordPersonalizado extends Notification
{
    use Queueable;

    public $token;
   
    public function __construct($token)
    {
       $this->token = $token;
    }
    
    public function via($notifiable)
    {
       return ['mail'];
    }
 
    public function toMail($notifiable)
    {
       return (new MailMessage)
       ->subject('Solicitud para recuperar contraseña de CursoWeb')
       ->greeting('Hola Compañero de la familia PLAN!,')
       ->line('Estas recibiendo este mail porque recibimos una solicitud de cambio de contraseña.')
       ->action('Cambiar Contraseña', url('password/reset', $this->token))
       ->line('Si no realizaste esta petición, por favor ignora este mensaje.')
       ->line('Si tienes alguna pregunta o inquietud escríbenos a: micorreo@gmail.com')
       ->salutation('¡Saludos!, '. 'El equipo de programadores')
       ->line('ESTA ES UNA COMUNICACIÓN AUTOMÁTICA, POR FAVOR NO RESPONDER.');
    }

    
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
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