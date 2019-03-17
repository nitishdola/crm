<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
  protected $fillable = array(
    'first_name','last_name',
    'deceased_first_name','deceased_last_name','referral_first_name',
    'referral_last_name','relation_with_decease', 'address', 'email', 'cell_number', 'home_number', 'agent_id'

  );
  protected $table    	= 'referrals';
  protected $guarded   	= ['_token'];
  public static $rules 	= [
    'first_name'    => 'required|max:127',
    'last_name'     => 'required|max:127',
    'deceased_first_name'     => 'required|max:127',
    'deceased_last_name'      => 'required|max:127',
    'referral_first_name'     => 'required|max:127',
    'referral_last_name'      => 'required|max:127',
    'relation_with_decease'   => 'required|max:127',
    'address' => 'required|max:500',
    'email'   => 'required|email',
    'cell_number'           => 'required',
    'home_number'           => 'required',
    'agent_id'              => 'required|exists:agents,id'
  ];
}
