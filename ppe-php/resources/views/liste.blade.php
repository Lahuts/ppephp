@php
use App\Models\Utilisateur;
$users = Utilisateur::where('email', '!=',session()->get('user')->getEmail())->get();
$userSafe = Utilisateur::getAllUsersSafe();
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
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/listing.css">
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
        <h1>Liste des collaborateurs</h1>
            <fieldset>
            <form>
            <input  id="input_name"type="text" placeholder="Recherche ...">
            <label for="">Rechercher par :</label>
            <select name="searchby" id="select_searchby">
                <option value="Nom">Nom</option>
                <option value="Prenom">Prénom</option>
                <option value="Email">Email</option>
            </select>
            <label for="">Catégorie:</label>
            <select name="categorie" id="select_pole">
                <option value=".*">- Aucun -</option>
                @php
                $categories = Utilisateur::categories();
                foreach ($categories as $categorie) {
                    echo '<option value="'.$categorie->pole.'">'.$categorie->pole.'</option>';
                }
                @endphp
            </select>
        </form>
    </fieldset>
    <ul class="card__list" id="card_list">
       @php
       foreach ($users as $user) {
        $user->getCard();
       }
        @endphp
    </ul>
    </main>
    <script>
        let userArray = @json($userSafe); 
    </script>
    <script src="{{asset("js/app.js")}}"></script>
</body>
</html>
