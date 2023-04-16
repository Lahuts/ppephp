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
            <select name="" id="">
                <option value="">Nom</option>
                <option value="">Prénom</option>
                <option value="">Email</option>
            </select>
            <label for="">Catégorie:</label>
            <select name="" id="">
                <option value="">-Aucun-</option>
                <option value="">Tous</option>
                <option value="">Administrateur</option>
                <option value="">Collaborateur</option>
            </select>
        </form>
    </fieldset>
    <ul class="card__list" id="card_list">
        @php
        use App\Models\Utilisateur;
       $users = Utilisateur::where('email', '!=',session()->get('user')->getEmail())->get();
       $userSafe = Utilisateur::getAllUsersSafe();
       foreach ($users as $user) {
        $user->getRandomCard();
       }
        @endphp
    </ul>
    </main>
    <script>
        let userArray = @json($userSafe); 

        document.addEventListener('DOMContentLoaded', ()=> {
    let input_name = document.getElementById('input_name');
    let ul = document.getElementById('card_list');
    
   
    input_name.addEventListener('keyup', (field)=> {
        ul.innerHTML = '';
        userArray.forEach(e => 
    {
        if(e.nom.toLowerCase().match(('^'+field.target.value+'.*').toLowerCase())){
            let li = document.createElement('li');
            li.innerHTML = `
            <article class="card">
            <p class="pole">`+e.pole+`</p>
            <figure>
                <img src="`+e.imgURL+`" alt="Photo de `+e.prenom+`">
                <figcaption>
                    <h3><strong>`+e.prenom+" "+e.nom+`</strong>('.$this->getAge().' ans)</h3>
                    <p>`+e.ville+", "+e.pays+`</p>
                    <ul>
                        <li><img src="asset/mail.png" alt="Email de `+e.prenom+`"><a href="mailto:`+e.email+`">`+e.email+`</a></li>
                        <li><img src="asset/tel.png" alt="Télephone de `+e.prenom+`"><a href="">`+e.telephone+`</a></li>
                        <li><img src="asset/cake.png" alt="">Anniversaire :`+e.date_anniversaire+`</li>
                    </ul>
                </figcaption>
            </article>
            `;
            ul.appendChild(li);
        }
    });
    });
});
    </script>
</body>
</html>
