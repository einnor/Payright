<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Requests;
use App\Http\Requests\PasswordsRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

class UserPasswordsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(){
        return view('passwords.change_password');
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PasswordsRequest $request){
        $user = User::findOrFail(Auth::user()->id);

        //Check if the passwords match
        if(! Hash::check($request->old_password, $user->password)){
            //Show Flash message
            flash()->error('Failed','The old password is incorrect!');

            //Redirect
            return redirect()->back();
        }

        $user->password = bcrypt($request->new_password);
        $user->save();

        //Show Flash message
        flash()->success('Success','You have successfully changed your password!');

        //Redirect
        return redirect()->back();
    }
}
