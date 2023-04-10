<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/var_theme_light.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/hello.css">
    <link rel="stylesheet" href="css/card.css">
    <title>Connexion</title>
</head>
<body>
    <header>
       <nav>
        <ul class="nav__left">
            <li> 
                <a href="/hello"><img src="/asset/intranet.png" alt="Accueil"> Intranet</a>
            </li>
        </ul>
        <ul class="nav__right">
            <li>
                <a href="/liste.html"><img src="/asset/list.png" alt="Liste"> Liste</a>
            </li>
            <li>
                <a class="profil__img" href="/config.html"><img src="https://this-person-does-not-exist.com/img/avatar-gen11379f2d0d0f059e44c5eccec34fc9e3.jpg" alt=""></a>
            </li>
            <li>
                <a class="btn_deconnect" href="/"><img src="/asset/out.png" alt="Déconnexion"> Déconnexion</a>
            </li>
        </ul>
       </nav>
    </header>
    <main>
        <h1>Bienvenue sur l'intranet</h1>
        <p>La plate-forme de l'entreprise qui vous permet de retrouver tous vos collaborateurs.</p>
        <section class="say__hello">
            <h2>Avez-vous dit bonjour à : </h2>
            @php 
            use App\Models\Utilisateur;
            // Random Card
            Utilisateur::getRandomCard();
            @endphp
        </section>
        <a href="/hello" class="btn__hello">DIRE BONJOUR À QUELQU'UN D'AUTRE</a>
    </main>
</body>
</html>
