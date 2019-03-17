<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class ContactAdditionalFamilyActivity extends Model
{
    //contact_additional_family_activities
    protected $fillable = array(
      'contact_additional_family_id','activity',

    );
    protected $table    	= 'contact_additional_family_activities';
    protected $guarded   	= ['_token'];
    public static $rules 	= [
      'contact_additional_family_id'    => 'required|exists:contact_additional_families,id',
      'activity'                        => 'required',
    ];

    public function contact_additional_family()
    {
        return $this->hasMany('App\Models\Master\ContactAdditionalFamily', 'contact_additional_family_id');
    }
}
