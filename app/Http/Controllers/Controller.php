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


    public function __construct()
    {

        $this->user = Auth::user();

        $role = Role::where('user_id', $this->user->id)->first()->role;

        if($role == 1){
            $this->role = 'Officer';
        }
        elseif($role == 2) {
            $this->role = 'Analyst';
        }
        elseif($role == 3) {
            $this->role = 'Manager';
        }
        elseif($role == 4) {
            $this->role = 'Administrator';
        }


        view()->share('signedIn', Auth::check());

        view()->share('user', $this->user);

        view()->share('role', $this->role);
    }
}
