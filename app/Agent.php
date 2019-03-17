<?php

namespace App;

use App\Notifications\AgentResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Agent extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AgentResetPassword($token));
    }

    public static $all_statues = [

        'Attempted Contact Left Message'  => 'Attempted Contact Left Message',
        'Disconnected Number'             => 'Disconnected Number',
        'Wrong Number'                    => 'Wrong Number',
        'Apponintment Set'                => 'Apponintment Set',
        'Apponintment Completed'          => 'Apponintment Completed',
        'Sale Made'                       => 'Sale Made',
        'No Sale After Apponintment'      => 'No Sale After Apponintment',
        'Follow Up Later'                 => 'Follow Up Later',
        'Not Interested'                  => 'Not Interested',
        'Condolence Letter Sent'          => 'Condolence Letter Sent',
        'Condolence Email Sent'           => 'Condolence Email Sent',
        '3 Month Follow letter Sent'      => '3 Month Follow letter Sent',
        '3 Month Follow Email Sent'       => '3 Month Follow Email Sent',
        '6 Month Follow letter Sent'      => '6 Month Follow letter Sent',
        '6 Month Follow Email Sent'       => '6 Month Follow Email Sent',
        'Anniversary Letter Sent'         => 'Anniversary Letter Sent',
        'Anniversary Email Sent'          => 'Anniversary Email Sent',
        'Birthday Letter Sent'            => 'Birthday Letter Sent',
        'Birthday Email Sent'             => 'Birthday Email Sent',

    ];
}
