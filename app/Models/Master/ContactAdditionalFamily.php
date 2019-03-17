<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class ContactAdditionalFamily extends Model
{
  protected $fillable = array(
    'contact_id',
    'name','address',
    'email','phone_number',
    'relation_with_decease'

  );
  protected $table    	= 'contact_additional_families';
  protected $guarded   	= ['_token'];
  public static $rules 	= [
    'contact_id' => 'required|exists:contacts,id',
    'name'      => 'required',
    'address'   => 'required',
    'email'     => 'required|email',
    'phone_number'          => 'required',
    'relation_with_decease' => 'required',
  ];

  public function contact()
  {
      return $this->belongsTo('App\Models\Master\Contact', 'contact_id');
  }

  public function additional_family_activity()
  {
      return $this->hasMany('App\Models\Master\ContactAdditionalFamilyActivity');
  }
}
