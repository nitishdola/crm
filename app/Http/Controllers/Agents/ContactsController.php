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

class ContactsController extends Controller
{
    public function details($id, Request $request) {
      $active_tab = NULL;

      if($request->active_tab) {
        $active_tab = $request->active_tab;
      }
      $all_statues  = Agent::$all_statues;
      $id   = Crypt::decrypt($id);
      $info = Contact::whereId($id)->with('agent', 'additional_family', 'additional_family.additional_family_activity', 'statuses')->first(); //dump($info);

      $agent_id = Auth::user()->id;
      $admin_id = NULL;

      return view('agent.contacts.details', compact('info', 'active_tab', 'all_statues', 'agent_id', 'admin_id'));
    }


    public function viewAllAssigned(Request $request) {
      $all_assigned  = Contact::where('assigned_to', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(150);
      return view('agent.contacts.all_assigned', compact('all_assigned'));
    }

    public function create() {
      $all_relations = Contact::$all_relations;
      return view('agent.contacts.create', compact('all_relations'));
    }

    public function store(Request $request) {
      $data = $request->all();
      //dd($data);
      if($data):


        $data['deceased_dob']           = date('Y-m-d', strtotime($request->deceased_dob));
        $data['deceased_date_of_death'] = date('Y-m-d', strtotime($request->deceased_date_of_death));

        if($request->other_significant_celebration_date) {
          $data['other_significant_celebration_date'] = date('Y-m-d', strtotime($request->other_significant_celebration_date));
        }

        if($request->deceased_wedding_anniversary_date) {
          $data['deceased_wedding_anniversary_date'] = date('Y-m-d', strtotime($request->deceased_wedding_anniversary_date));
        }

        $data['added_by'] = Auth::user()->id;
        //$data['current_status'] = 'assigned_to_agent';

        DB::beginTransaction();

        /**
        ** save the contact details
        */
        //validate
        $validator = Validator::make($data, Contact::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
        //insert to database
        if($contact = Contact::create($data)) {

          //update the statuses
          $contact_status = [];
          $contact_status['contact_id'] = $contact->id;
          $contact_status['status']     = 'contact_added';
          $contact_status['agent_id']   = Auth::user()->id;
          ContactStatus::create($contact_status);


          //save the additional contacts

          if(count($data['additional_names']) && $data['additional_names'][0] != NULL) {
            for($i = 0; $i < count($data['additional_names']); $i++) {
              $arr = [];
              $arr['contact_id']  = $contact->id;
              $arr['name']        = $data['additional_names'][$i];
              $arr['address']     = $data['additional_addresses'][$i];
              $arr['email']       = $data['additional_emails'][$i];
              $arr['phone_number']              = $data['additional_phone_numbers'][$i];
              $arr['relation_with_decease']     = $data['additional_relation_with_deceases'][$i];

              $validator = Validator::make($arr, ContactAdditionalFamily::$rules);
              if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

              if($contact_additional_family = ContactAdditionalFamily::create($arr)) {
                $arr2 = [];
                $arr2['contact_additional_family_id']   = $contact_additional_family->id;
                $arr2['activity']                       = $data['activities'][$i];

                $validator = Validator::make($arr2, ContactAdditionalFamilyActivity::$rules);
                if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

                ContactAdditionalFamilyActivity::create($arr2);
              }
            }
          }
        }

        DB::commit();

        return Redirect::route('agent.contacts.info', Crypt::encrypt($contact->id))->with(['message' => 'Contact added successfully !', 'alert-class' => 'alert-success']);

      endif;
    }

    public function viewAllLeadsCreated(Request $request) {
      $all_contacts = Contact::where('added_by', Auth::user()->id)->with('addingAgent')->orderBy('created_at', 'DESC')->paginate(300);
      //dd(Contact::where('added_by', Auth::user()->id)->count());
      $all_agents   = Agent::orderBy('name')->pluck('name', 'id');
      return view('agent.contacts.index', compact('all_contacts','all_agents'));
    }
}
