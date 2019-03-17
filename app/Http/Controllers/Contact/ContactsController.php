<?php

namespace App\Http\Controllers\Contact;

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

    public function index(Request $request) { //dd(Auth::guard('admin')->user());

      $where['status'] = 1;

      $all_cpntacts_data = Contact::with('agent');
      if($request->view_assigned_leads && $request->view_assigned_leads == 'yes') {
        $all_cpntacts_data = $all_cpntacts_data->where('assigned_to', '!=', NULL);
      }
      $all_contacts = $all_cpntacts_data->paginate(150);
      $all_agents   = Agent::orderBy('name')->pluck('name', 'id');
      $all_statues  = [];

      $agent_id = NULL;
      $admin_id = Auth::user()->id;

      return view('admin.master.contacts.index', compact('all_contacts', 'all_agents', 'all_statues', 'agent_id', 'admin_id'));
    }


    public function create() {
      $all_relations = Contact::$all_relations;
      return view('admin.master.contacts.create', compact('all_relations'));
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
          $contact_status['admin_id']   = Auth::user()->id;
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
                if($data['activities'][$i]) :
                  $arr2 = [];
                  $arr2['contact_additional_family_id']   = $contact_additional_family->id;
                  $arr2['activity']                       = $data['activities'][$i];

                  $validator = Validator::make($arr2, ContactAdditionalFamilyActivity::$rules);
                  if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

                  ContactAdditionalFamilyActivity::create($arr2);
                endif;

              }
            }
          }
        }

        DB::commit();

        return Redirect::route('admin.contacts.all')->with(['message' => 'Contact added successfully !', 'alert-class' => 'alert-success']);

      endif;
    }

    public function getContactInfo($id = NULL) {

      $agent_id = NULL;
      $admin_id = Auth::user()->id;
      $all_statues  = Contact::$all_statues;

      $id   = Crypt::decrypt($id);
      $info = Contact::whereId($id)->with('agent', 'additional_family', 'additional_family.additional_family_activity', 'statuses')->first(); //dump($info);
      $all_agents   = Agent::orderBy('name')->pluck('name', 'id');
      return view('admin.master.contacts.details', compact('info', 'agent_id', 'admin_id', 'all_statues', 'all_agents'));
    }
    public function deleteContact($id) {
      $id   = Crypt::decrypt($id);
      $contact = Contact::findOrFail($id);

      $contact->status = 0;
      $contact->save();

      return Redirect::back()->with(['alert-class' => 'alert-success', 'message' => 'Lead moved to trash']);
    }

    public function viewTrash(Request $request) { //dd(Auth::guard('admin')->user());
      $all_contacts = Contact::with('agent')->whereStatus(0)->paginate(150);
      return view('admin.master.contacts.trash', compact('all_contacts'));
    }

    public function editContact($id) {
      $id       = Crypt::decrypt($id);
      $contact  = Contact::findOrFail($id);
      $additional_families = ContactAdditionalFamily::where('contact_id', $id)->get();
      $all_relations = Contact::$all_relations;
      return view('admin.master.contacts.edit', compact('contact', 'additional_families','all_relations'));
    }

    public function updateContact(Request $request, $id) {
      $id       = Crypt::decrypt($id);
      $contact  = Contact::findOrFail($id);

      $data = $request->all();

      $data['deceased_dob']           = date('Y-m-d', strtotime($request->deceased_dob));
      $data['deceased_date_of_death'] = date('Y-m-d', strtotime($request->deceased_date_of_death));

      if($request->other_significant_celebration_date) {
        $data['other_significant_celebration_date'] = date('Y-m-d', strtotime($request->other_significant_celebration_date));
      }

      if($request->deceased_wedding_anniversary_date) {
        $data['deceased_wedding_anniversary_date'] = date('Y-m-d', strtotime($request->deceased_wedding_anniversary_date));
      }

      $data['added_by'] = Auth::user()->id;

      DB::beginTransaction();

      /**
      ** save the contact details
      */
      //validate
      $validator = Validator::make($data, Contact::$rules);
      if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

      $contact->fill($data);

      if($contact->save()) {
        $additional_family_ids  = $request->additional_family_ids;
        $additional_names       = $request->additional_names;
        $additional_addresses   = $request->additional_addresses;
        $additional_emails      = $request->additional_emails;
        $additional_phone_numbers = $request->additional_phone_numbers;
        $additional_relation_with_deceases = $request->additional_relation_with_deceases;

        for($i = 0; $i < count($additional_family_ids); $i++) {
          $additional_family_id = $additional_family_ids[$i];
          $additional_family    = ContactAdditionalFamily::findOrFail($additional_family_id);

          $data = [];

          if(isset($additional_names[$i]) ) {
            $data['name'] = $additional_names[$i];
          }

          if(isset($additional_addresses[$i]) ) {
            $data['address'] = $additional_addresses[$i];
          }

          if(isset($additional_emails[$i]) ) {
            $data['email'] = $additional_emails[$i];
          }

          if(isset($additional_phone_numbers[$i]) ) {
            $data['phone_number'] = $additional_phone_numbers[$i];
          }

          if(isset($additional_relation_with_deceases[$i]) ) {
            $data['relation_with_decease'] = $additional_relation_with_deceases[$i];
          }

          $additional_family->fill($data);
          $additional_family->save();

        }


        $activity_ids = $request->activity_ids;
        $activity     = $request->activities;

        for($i = 0; $i < count($activity_ids); $i++) {
          $contact_additional_family_activity_id = $activity_ids[$i];
          $contact_additional_family_activity    = ContactAdditionalFamilyActivity::findOrFail($contact_additional_family_activity_id);

          $data = [];

          if(isset($activity[$i])) {
            $data['activity'] = $activity[$i];
          }

          $contact_additional_family_activity->fill($data);
          $contact_additional_family_activity->save();

        }
      }

      DB::commit();

      return Redirect::route('admin.contacts.info', Crypt::encrypt($contact->id))->with(['message' => 'Update Successfull', 'alert-class' => 'alert-success']);
    }
}
