
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
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
    <title>Bienvenue sur l'intranet</title>
</head>
<body>
    <header>
        @include('header')
    </header>
    <main>
        <h1>Bienvenue sur l'intranet</h1>
        <p>La plate-forme de l'entreprise qui vous permet de retrouver tous vos collaborateurs.</p>
        <section class="say__hello">
            <h2>Avez-vous dit bonjour à : </h2>
            @php 
            use App\Models\User;
            // Random Card sans le utilisateur connect
            User::getRandomCard(Auth::user());
            @endphp
        </section>
        <a href="/hello" class="btn__hello">DIRE BONJOUR À QUELQU'UN D'AUTRE</a>
    </main>
</body>
</html>
