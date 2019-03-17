<?php

namespace App\Http\Controllers\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Master\Contact;
use App\Models\Master\ContactStatus;
use Helper;
use App\Agent;
use DB, Validator, Redirect, Auth, Crypt, Input,Mail,Config;

class APIController extends Controller
{
    public function assignContact(Request $request) {
      $agent_id = $request->agent_id;
      $contact_id = $request->contact_id;



      $contact = Contact::find($contact_id); //dd($contact);

      DB::beginTransaction();

      $contact->assigned_to = $agent_id;
      $contact->current_status = 'assigned_to_agent';
      $contact->save();

      //update contact statuses table

      $contact_status = [];
      $contact_status['contact_id'] = $contact_id;
      $contact_status['status']     = 'assigned_to_agent';
      $contact_status['admin_id']   = Auth::guard('admin')->user()->id;
      ContactStatus::create($contact_status);

      DB::commit();

      $agent = Agent::find($agent_id);
      $arr['contact_id']  = $contact_id;
      $arr['agent']       = ucfirst($agent->name);
      return json_encode($arr);
    }

    public function recentItems(Request $request) {
      $items = Config::get('globals.recent_items');

      if($request->items) {
        $items = $request->items;
      }

      $all_contacts = Contact::with('agent')->select('id', 'name')->take($items)->orderBy('created_at', 'DESC')->get();
      $contacts = [];
      foreach($all_contacts as $k => $v) {
        $contacts[$k]['name'] = $v->name;
        $contacts[$k]['id']   = Crypt::encrypt($v->id);
      }

      return json_encode($contacts);
    }

    public function recentItemsAgent(Request $request) {
      $items = Config::get('globals.recent_items');

      if($request->items) {
        $items = $request->items;
      }

      $all_contacts = Contact::with('agent')
                                ->select('id', 'name')
                                ->take($items)
                                ->where('assigned_to', Auth::user('agent')->id)
                                ->orderBy('created_at', 'DESC')->get();
      $contacts = [];
      foreach($all_contacts as $k => $v) {
        $contacts[$k]['name'] = $v->name;
        $contacts[$k]['id']   = Crypt::encrypt($v->id);
      }

      return json_encode($contacts);
    }

    public function allEvents(Request $request) {
      $where = [];
      $where['status'] = 1;

      if($request->assigned_to) {
        $where['assigned_to'] = $request->assigned_to;
      }
      $res = Contact::where($where)->where('appointment_date', '!=', NULL)
                          ->get();
      $arr = [];
      foreach($res as $k => $v) {
        $arr[$k]['title'] = $v->name.', Appointment Location : '.$v->appointment_location.' ,Phone Number :-'.$v->phone_number.' ,Notes :'.$v->appointment_notes;
        $arr[$k]['start'] = $v->appointment_date;
        $arr[$k]['contact_id'] = Crypt::encrypt($v->id);
      }
      return json_encode($arr);
    }
}
