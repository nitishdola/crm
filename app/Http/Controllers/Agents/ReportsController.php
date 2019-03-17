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

class ReportsController extends Controller
{
    public function allLeads(Request $request) {
    	$where['assigned_to'] = Auth::user()->id;

	    $all_contacts_data = Contact::where($where);

	    if($request->name) {
	      $all_contacts_data = $all_contacts_data->where('name', 'like', '%' . trim($request->name) . '%');
	    }

	    if($request->phone_number) {
	    	$where['phone_number'] = trim($request->phone_number);
	    }


	    if($request->current_status) {
	    	$where['current_status'] = trim($request->current_status);
	    }

	    $all_contacts = $all_contacts_data->where($where)->paginate(150);

	    $all_statuses = Contact::$all_statues;

	    return view('agent.reports.all_leads', compact('all_contacts', 'all_statuses'));
    }
}
