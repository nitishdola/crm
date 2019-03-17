<?php

namespace App\Http\Controllers\Agents;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Agent;
use Helper;
use DB, Validator, Redirect, Auth, Crypt, Input,Mail;

class AgentUserController extends Controller
{

    public function index() {
      $results = Agent::whereStatus(1)->orderBy('created_at', 'DESC')->get();
      return view('agents.users.index', compact('results'));
    }

    public function create() {
      return view('agents.users.create');
    }

    public function store(Request $request) {
      $rules 	= [
        	'name'     => 'required|min:5|max:128',
          'email'    => 'required|email',
          'password' => 'required',
    	];

      $random_password = Helper::generateRandomString(6);

      $data = $request->all();

      $data['password'] = bcrypt($random_password);

      $validator = Validator::make($data, $rules);
    	if ($validator->fails()) return  Redirect::back()->withErrors($validator)->withInput();

      if(Agent::create($data)) {
        //mail the password
        $email = $request->email;
        $name  = ucwords($request->name);
        Mail::send('mail.send_agent_password', ['email' => $email, 'password' => $random_password, 'name' => $name], function ($message) use($email)
        {

            $message->from('no-replt@mycrm.com', 'CRM Administrator');

            $message->to($email);

            $message->subject('Your CRM Application Credintials');

        });

        return Redirect::route('admin.agents.all')->with(['message' => 'Sales Agent Added Successfully !', 'alert-class' => 'alert-success']);
      }else{
        return Redirect::back()->with(['message' => 'Sales Agent Could Not be Added !', 'alert-class' => 'alert-danger']);
      }
    }
}
