<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Master\Contact;
use App\Models\Master\ContactStatus;
use App\Models\Master\ContactAdditionalFamily;
use App\Models\Master\ContactAdditionalFamilyActivity;
use Helper;
use App\Agent;
use DB, Validator, Redirect, Auth, Crypt, Input,Mail;

class AdminController extends Controller
{
    public function home() {
      $not_interested_leads = Contact::with('agent')->where('current_status', 'Not Interested')->orderBy('created_at', 'DESC')->get();
      $all_contacts = Contact::with('agent')->take(20)->orderBy('created_at', 'DESC')->get();
      $agents_count = Agent::count();
      $contacts_count = Contact::whereStatus(1)->count();
      $assigned_contact_count = Contact::whereStatus(1)->where('current_status', 'assigned_to_agent')->count();
      $fresh_contact_count = Contact::whereStatus(1)->where('current_status', 'contact_added')->count();
      $all_agents   = Agent::orderBy('name')->pluck('name', 'id');
      return view('admin.home', compact('all_contacts', 'not_interested_leads', 'agents_count', 'contacts_count', 'assigned_contact_count', 'fresh_contact_count'));
    }
}
