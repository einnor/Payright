<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Auth;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected $user;

    protected $role;

    protected $role_key;


    public function __construct()
    {

        $this->user = Auth::user();



        if(Auth::check()){

            $this->role = array();
            $role = Role::where('user_id', $this->user->id)->first()->role;

            if($role == 1){
                $this->role[1] = 'Officer';
            }
            elseif($role == 2) {
                $this->role[2] = 'Analyst';
            }
            elseif($role == 3) {
                $this->role[3] = 'Manager';
            }
            elseif($role == 4) {
                $this->role[4] = 'Administrator';
            }

            $this->role_key = array_keys($this->role)[0];
        }


        view()->share('signedIn', Auth::check());

        view()->share('user', $this->user);

        view()->share('role', $this->role);

        view()->share('role_key', $this->role_key);
    }
}
