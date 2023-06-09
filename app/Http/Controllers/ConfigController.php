<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Validation\Validator;

class ConfigController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function updateProfil(Request $request){
        $validationRequest = $request->validate([
            'nom' => 'required|alpha:ascii',
            'prenom' => 'required|alpha:ascii',
            'tel' => 'required|numeric',
            'dateNaissance' => 'before:today',
            'ville' => 'required|alpha:ascii',
            'pays' => 'required|alpha:ascii',
            'pole' => 'required',
            // Le mot de passe doit contenir au moins une minuscle , une majuscule , au moins digit , au moins un caractère spécial et doit contenir au moins 12 caractères
            //'mdp' => 'confirmed|min:12|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?]{12,}$/',
          ]);
          if($validationRequest){
            $user = Auth::user();
            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->telephone = $request->tel;
            $user->date_naissance = $request->dateNaissance;
            $user->sexe = $request->sexe;
            $user->ville = $request->ville;
            $user->pays = $request->pays;
            $user->pole = $request->pole;
            $user->url_photo = $request->urlPhoto;
            $this->emailChange($request);
            $this->passwordChange($request);
            $user->save();
            return redirect()->route('config.success');
          }else if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
          }
    }
    function emailChange(Request $request){
        if ($request->email != Auth::user()->email) {
            $request->validate([
                'email' => 'required|email|unique:users|email:rfc,dns|max:255',
            ]);
            $user = Auth::user();
            $user->email = $request->email;
            $user->save();
        }
    }
    function passwordChange(Request $request){
        if ($request->mdp != null) {
            $mdpRequest =$request->validate([
                'mdp' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?]{12,}$/|confirmed',
            ]);
            if($request->mdp != $request->mdp_confirmation){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            if ($mdpRequest) {
                $user = Auth::user();
            $user->password = Hash::make($request->mdp);
            $user->save();
            }else if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            
        }
    }
}
