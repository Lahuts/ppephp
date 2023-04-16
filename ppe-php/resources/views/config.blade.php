@php
use App\Models\Utilisateur;
$user = session()->get('user');
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
    <title>Connexion</title>
</head>
<body>
    <header>
        <nav>
         <ul class="nav__left">
             <li> 
                 <a href="/"><img src="/asset/intranet.png" alt=""> Intranet</a>
             </li>
         </ul>
         <ul class="nav__right">
             <li>
                 <a href="/liste"><img src="/asset/list.png" alt=""> Liste</a>
             </li>
             <li>
                 <a class="profil__img" href="/config"><img src="https://this-person-does-not-exist.com/img/avatar-gen11379f2d0d0f059e44c5eccec34fc9e3.jpg" alt=""></a>
             </li>
             <li>
                 <a class="btn_deconnect" href="/"><img src="/asset/out.png" alt=""> Déconnexion</a>
             </li>
         </ul>
        </nav>
     </header>
    <main>
        <h1>Modifier mon profil</h1>
        <fieldset class="field__config">
            <form action="/config" method="POST">
                @csrf
                <label for=""><sup>*</sup>Civilité :</label>
                <select name="sexe" id="sexe">
                    @php
                    $sexes = Utilisateur::sexes();
                    foreach ($sexes as $sexe) {
                        echo '<option value="'.$sexe->sexe.'">'.$sexe->sexe.'</option>';
                    }
                    @endphp
                </select>
                <label for=""><sup>*</sup>Categorie</label>
                <select name="pole" id="pole">
                    @php
                    $categories = Utilisateur::categories();
                    foreach ($categories as $categorie) {
                        echo '<option value="'.$categorie->pole.'">'.$categorie->pole.'</option>';
                    }
                    @endphp
                </select>
                <label for=""><sup>*</sup>Nom :</label>
                <input type="text" name="nom" id="nom" value="{{$user->getNom()}}">
                <label for=""><sup>*</sup>Prénom :</label>
                <input type="text" name="prenom" id="prenom"value="{{$user->getPrenom()}}">
                <label for=""><sup>*</sup>Email :</label>
                <input type="email" name="email" id="email" value="{{$user->getEmail()}}">
                <label for="">Mot de passe :</label>
                <input type="password" name="mdp" id="mdp" placeholder="(min. 8 charactères)">
                <label for="">Confirmation :</label>
                <input type="password" name="mdp2" id="mdp2" placeholder="(min. 8 charactères)">
                <label for=""><sup>*</sup> Téléphone :</label>
                <input type="tel" name="tel" id="tel" value="{{$user->getTelephone()}}">
                <label for="">Date de naisance :</label>
                <input type="date" name="dateNaissance" id="dateNaissance" value="{{$user->getDateNaissance()}}">
                <label for=""><sup>*</sup> Ville :</label>
                <input type="text" name="ville" id="ville" value="{{$user->getVille()}}">
                <label for=""><sup>*</sup> Code Pays :</label>
                <input type="text" name="pays" id="pays" value="{{$user->getPays()}}">
                <label for="">URL de la photo :</label>
                <input type="text" name="urlPhoto" id="urlPhoto" value="{{$user->getUrlPhoto()}}">
                <input type="submit" value="MODIFIER">
            </form>
        </fieldset>
        <div role="alert">
            @php if(isset($error)) { echo $error;} @endphp
        </div>
    </main>
</body>
</html>
