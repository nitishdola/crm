<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Master\Contact;
use App\Models\Master\ContactStatus;
use App\Models\Master\ContactAdditionalFamily;
use App\Models\Master\ContactAdditionalFamilyActivity;
use Helper;
use App\Agent;
use DB, Validator, Redirect, Auth, Crypt, Input,Mail;

class BaseController extends Controller
{
    public function updateStatus(Request $request) {
      $contact = Contact::findOrfail($request->contact_id);
      $contact->current_status = $request->status;

      if($request->status == 'Apponintment Set') {
        if($request->appointment_date != '') {
          $contact->appointment_date = date('Y-m-d H:i:s', strtotime(str_replace('/', '-',$request->appointment_date)));
          $contact->appointment_location = $request->appointment_location;
          $contact->appointment_notes    = $request->appointment_notes;
        }else{
          return Redirect::back()->with(['alert-class' => 'alert-danger', 'message' => 'Appointment Date is missing !']);
        }
      }

      if($request->status == 'Sale Made') {
        if($request->sale_amount != '') {
          $contact->sale_amount = $request->sale_amount;
        }else{
          return Redirect::back()->with(['alert-class' => 'alert-danger', 'message' => 'Sale amount is missing !']);
        }
      }

      $contact->save();

      $arr = $request->all();
      $arr['current_status'] = $request->status;

      ContactStatus::create($arr);

      return Redirect::back()->with(['alert-class' => 'alert-success', 'message' => 'Status updated']);
    }

    public function setAppointment(Request $request) {
        $contact = Contact::findOrfail($request->contact_id);
        $contact->appointment_date = date('Y-m-d H:i:s', strtotime(str_replace('/', '-',$request->appointment_date)));
        $contact->appointment_location = $request->appointment_location;
        $contact->appointment_notes    = $request->appointment_notes;
        $contact->save();
        return Redirect::back()->with(['alert-class' => 'alert-success', 'message' => 'Appointment Date Set !']);

    }
}
