<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class ContactStatus extends Model
{

  protected $fillable = array(
    'contact_id','status','admin_id','agent_id'

  );
  protected $table    	= 'contact_statuses';
  protected $guarded   	= ['_token'];
  public static $rules 	= [
    'contact_id'    => 'required|exists:contacts,id',
    'status'        => 'required',
  ];

  public function admin()
  {
      return $this->hasMany('App\Admin', 'admin_id');
  }

  public function agent()
  {
      return $this->hasMany('App\Agent', 'agent_id');
  }
}
