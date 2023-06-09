@php
use App\Models\User;
$users = User::where('email', '!=',Auth::user()->getEmail())->get();
$userSafe = User::getAllUsersSafe(Auth::user()->id);
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
    <title>Liste des collaborateurs</title>
</head>
<body>
    <header>
        @include('header')
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
                $categories = User::categories();
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
