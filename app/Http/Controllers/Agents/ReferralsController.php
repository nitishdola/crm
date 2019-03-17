<?php

namespace App\Http\Controllers\Agents;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Master\Contact;
use Helper;
use App\Agent;
use DB, Validator, Redirect, Auth, Crypt, Input,Mail;
use App\Models\Referral;

class ReferralsController extends Controller
{
    public function create() {
      $all_relations = Contact::$all_relations;
      /*$all_relations['Friend'] = 'Friend';
      $all_relations['Girlfriend'] = 'Girlfriend';
      $all_relations['Boyfriend'] = 'Boyfriend';
      $all_relations['Fiancé'] = 'Fiancé';
      $all_relations['Coworker'] = 'Coworker';
      $all_relations['Neighbor'] = 'Neighbor';*/
      return view('agent.referral.create', compact('all_relations'));
    }


    public function index() {
      $where = [];
      $where['agent_id'] = Auth::user()->id;
      $results = Referral::whereStatus(1)->orderBy('created_at', 'DESC')->where($where)->get();
      return view('agent.referral.index', compact('results'));
    }

    public function details($referral_id) {
      $referral_id = Crypt::decrypt($referral_id);
      $info = Referral::findOrFail($referral_id);
      return view('agent.referral.details', compact('info'));
    }


    public function store(Request $request) {
      $data = $request->all();
      $data['agent_id'] = Auth::user()->id;

      $validator = Validator::make($data, Referral::$rules);
      if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

      DB::beginTransaction();
      $referral = Referral::create($data);
      DB::commit();

      if($referral) {
        return Redirect::route('agent.referral.index')->with(['message' => 'Referral added successfully !', 'alert-class' => 'alert-success']);
      }else{
        return Redirect::back()->with(['message' => 'Referral can\'t be added !', 'alert-class' => 'alert-danger']);
      }
    }
}
