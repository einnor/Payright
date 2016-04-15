<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UsersRequest;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');

        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {


        //Persist the data
        $user = User::create([
            'name'          =>      $request->name,
            'email'         =>      $request->email,
            'password'      =>      bcrypt('password'),
        ]);


        Role::create([
            'user_id'       =>      $user->id,
            'role'          =>      $request->role
        ]);

        //Show Flash message
        flash()->success('Success','User was successfully created!');

        //Redirect
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function getAllUsers(){

        return User::all();

    }
}
