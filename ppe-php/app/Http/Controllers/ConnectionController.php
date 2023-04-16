<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Utilisateur;

class ConnectionController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    function connect(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = Utilisateur::where('email', $email)->first();
        if($user != null && $user->getPassword() == $password){
            session_start();
            session()->put('user',$user);
            return view('hello', ['user' => $user]);
        }else{
            return view('index', ['error' => '<p class="error">Email ou mot de passe incorrect</p>']);
        }
    }
}
