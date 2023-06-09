@php
use App\Models\User;
$user = Auth::user();
@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/var_theme_light.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/config.css">
    <title>Modifier mon profil</title>
</head>
<body>
    <header>
        <nav>
            @include('header')
     </header>
    <main>
        <h1>Modifier mon profil</h1>
       
            @php if(count($errors) > 0){
                echo '<ul class="alert" >';
                    {
                        foreach ($errors->all() as $error)
                         {
                            echo '<li>'.$error.'</li>';
                        }
                    }
                    echo '</ul>';}elseif (isset($success)) {echo $success;}
            @endphp
        
        <fieldset class="field__config">
            <form action="/config" method="POST">
                @csrf
                <label for="sexe"><sup>*</sup>Civilité :</label>
                <select name="sexe" id="sexe">
                    @php
                    $sexes = User::sexes();
                    $ownSexe = $user->getSexe();
                    echo '<option value="'.$ownSexe.'">'.$ownSexe.'</option>';
                    foreach ($sexes as $sexe) {
                        if($sexe->sexe != $ownSexe)
                        echo '<option value="'.$sexe->sexe.'">'.$sexe->sexe.'</option>';
                    }
                    @endphp
                </select>
                <label for="pole"><sup>*</sup>Categorie</label>
                <select name="pole" id="pole">
                    @php
                    $categories = User::categories();
                    foreach ($categories as $categorie) {
                        echo '<option value="'.$categorie->pole.'">'.$categorie->pole.'</option>';
                    }
                    @endphp
                </select>
                <label for="nom"><sup>*</sup>Nom :</label>
                <input type="text" name="nom" id="nom" value="{{$user->getNom()}}">
                <label for="prenom"><sup>*</sup>Prénom :</label>
                <input type="text" name="prenom" id="prenom"value="{{$user->getPrenom()}}">
                <label for="email"><sup>*</sup>Email :</label>
                <input type="email" name="email" id="email" value="{{$user->getEmail()}}">
                <!----  (CF : https://www.cnil.fr/fr/mots-de-passe-une-nouvelle-recommandation-pour-maitriser-sa-securite )  --->
                <label for="mdp">Mot de passe :</label>
                <input type="password" name="mdp" id="mdp" placeholder="(min. 12 charactères)">
                <label for="mdp_confirmation">Confirmation :</label>
                <input type="password" name="mdp_confirmation" id="mdp_confirmation" placeholder="(min. 12 charactères)">
                <label for="tel"><sup>*</sup> Téléphone :</label>
                <input type="tel" name="tel" id="tel" value="{{$user->getTelephone()}}">
                <label for="dateNaissance">Date de naisance :</label>
                <input type="date" name="dateNaissance" id="dateNaissance" value="{{$user->getDateNaissance()}}">
                <label for="ville"><sup>*</sup> Ville :</label>
                <input type="text" name="ville" id="ville" value="{{$user->getVille()}}">
                <label for="pays"><sup>*</sup> Code Pays :</label>
                <input type="text" name="pays" id="pays" value="{{$user->getPays()}}">
                <label for="urlPhoto">URL de la photo :</label>
                <input type="text" name="urlPhoto" id="urlPhoto" value="{{$user->getUrlPhoto()}}">
                <input type="submit" value="MODIFIER">
            </form>
        </fieldset>
    </main>
    <script src="{{asset('js/passwordHelper.js')}}"></script>
</body>
</html>
