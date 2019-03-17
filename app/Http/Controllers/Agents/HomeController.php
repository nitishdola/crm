<?php

namespace App\Http\Controllers\Agents;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Master\Contact;
use App\Models\Master\ContactStatus;
use App\Models\Master\ContactAdditionalFamily;
use App\Models\Master\ContactAdditionalFamilyActivity;
use Helper;
use App\Agent;
use DB, Validator, Redirect, Auth, Crypt, Input,Mail;

class HomeController extends Controller
{
  public function home(Request $request) {
    $where['assigned_to'] = Auth::user()->id;

    $all_contacts_data = Contact::where($where);

    if($request->name) {
      $all_contacts_data = $all_contacts_data->where('name', 'like', '%' . $request->name . '%');
    }

    $all_contacts = $all_contacts_data->paginate(150);
    return view('agent.home', compact('all_contacts'));
  }

  public function showCalendar(Request $request) {
    $auth_id = Auth::user()->id;
    return view('agent.calendar', compact('auth_id'));
  }
}
