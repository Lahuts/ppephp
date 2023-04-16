<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Utilisateur;

class ConfigController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function config()
    {
        $_curr_user = session()->get('user');
        if($_POST['mdp'] == $_POST['mdp2'] && $_curr_user->getPassword() == $_POST['mdp']) {
            $_curr_user->setNom($_POST['nom']);
            $_curr_user->setPrenom($_POST['prenom']);
            $_curr_user->setEmail($_POST['email']);
            $_curr_user->setTelephone($_POST['tel']);
            $_curr_user->setPays($_POST['pays']);
            $_curr_user->setVille($_POST['ville']);
            $_curr_user->setUrlPhoto($_POST['urlPhoto']);
            $_curr_user->setPole($_POST['pole']);
            $_curr_user->setDateNaissance($_POST['dateNaissance']);
            $_curr_user->setPassword($_POST['mdp']);
            $_curr_user->setSexe($_POST['sexe']);
            session()->put('user', $_curr_user);
            return view('config');
        }else{
            return view('config',['error' => 'Mot de passe incorrecte']);
        }
    }
}
