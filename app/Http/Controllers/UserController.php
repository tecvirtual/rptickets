<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request){
        if ($request->isJson()){
            $users = User::all();
            return response()->json($users, 200);
        }else{
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }

    public function login(Request $request) {

        if ($request->isJson()){
            try {
                $email = $request->get('email');
                $user = User::where('email', $email)->first();
                if ($user && Hash::check($request->get('password'), $user->password)){
                    return response()->json($user, 200);
                }else{
                    return response()->json(['error' => 'No content'], 406);
                }
            }catch (ModelNotFoundException $exception) {
                return response()->json(['error' => 'No content'], 406);
            }
        }else{
            return response()->json(['error' => 'Unauthorized'], 401, []);
        }
    }
}
