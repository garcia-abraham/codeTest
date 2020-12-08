<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\User\RegisterUserRequest;
use Illuminate\Support\Facades\Mail;


use App\Traits\CRUD;
use App\Models\User;

class UserController extends Controller
{

    use CRUD{
        store as genericStore;
        destroy as genericDestroy;

    }

    public $model = User::class;
    
    public function show(){
        $users = User::all();
        return response()->json(
            $users, 200);
    }

    public function destroy($id)
    {   
        $user = User::findOrFail($id);

        return $this->genericDestroy($id);
    }


    public function checkUser()
    {
        return response()->json(request()->user());
    }

    public function register(RegisterUserRequest $request)
    {   
        $request->request->add(['role_id' => 1]);
        return $registered = $this->genericStore($request);
            
    }
}