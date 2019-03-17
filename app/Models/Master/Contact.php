<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = array(
      'name','address',
      'email','phone_number','home_number',
      'relation_with_decease','name_of_deceased',
      'deceased_dob','deceased_date_of_death',
      'deceased_wedding_anniversary_date','other_significant_celebration',
      'other_significant_celebration_date', 'added_by', 'agent_id','notes', 'current_status','assigned_to'

    );
    protected $table    	= 'contacts';
    protected $guarded   	= ['_token'];
    public static $rules 	= [
      'name'    => 'required',
      'address' => 'required|max:500',
      'email'   => 'required|email',
      'phone_number'          => 'required',
      'relation_with_decease' => 'required',
      'name_of_deceased'      => 'required',
      'deceased_dob'          => 'required|date_format:Y-m-d',
      'deceased_date_of_death'=> 'required|date_format:Y-m-d',
      'other_significant_celebration_date' => 'date_format:Y-m-d',
      'deceased_wedding_anniversary_date'  => 'date_format:Y-m-d',
  ];

  public static $all_relations = [

    'Son'       => 'Son',
    'Daughter'  => 'Daughter',
    'Brother'   => 'Brother',
    'Sister'    => 'Sister',
    'Mother'    => 'Mother',
    'Father'    => 'Father',
    'Grandfather'    => 'Grandfather',
    'Grandmother'    => 'Grandmother',
    'Uncle'     => 'Uncle',
    'Aunt'      => 'Aunt',
    'Cousin'    => 'Cousin',
    'Brother in Law'  => 'Brother in Law',
    'Sister in Law'   => 'Sister in Law',
    'Friend' => 'Friend',
    'Girlfriend' => 'Girlfriend',
    'Boyfriend' => 'Boyfriend',
    'Fiancé' => 'Fiancé',
    'Coworker' => 'Coworker',
    'Neighbor' => 'Neighbor',
  ];

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

  public function agent()
  {
      return $this->belongsTo('App\Agent', 'assigned_to');
  }

  public function assignedAgent()
  {
      return $this->belongsTo('App\Agent', 'agent_id');
  }


  public function addingAgent()
  {
      return $this->belongsTo('App\Agent', 'added_by');
  }

  public function statuses()
  {
      return $this->hasMany('App\Models\Master\ContactStatus', 'contact_id', 'id');
  }

  public function additional_family()
  {
      return $this->hasMany('App\Models\Master\ContactAdditionalFamily', 'contact_id', 'id');
  }
}
