@php 
use App\Models\Utilisateur;

@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/var_theme_light.css')}}">
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/connection.css')}}">
    <title>Connexion</title>
</head>
<body>
<!-- 

    

-->
    <header>
       <nav>
        <ul class="nav__left">
            <li> 
                <a href="/"><img src="/asset/intranet.png" alt=""> Intranet</a>
            </li>
            <li>
                <a class="btn_connect" href="/"><img src="/asset/in.png" alt=""> Connexion</a>
            </li>
        </ul>
       </nav>
    </header>
    <main>
        <h1>Connexion</h1>
    <fieldset class="fs_connection">
        <p>Pour vous connecter à l'intranet, entrez votre identifiant et mot de passe.</p>
        <form action="{{route('index')}}" method="POST">
            @csrf
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" :value="__('Email')" required>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" :value="__('Password')" required>
            <input type="submit" value="CONNEXION">
        </form>
    </fieldset>

    <div role="alert">
        @php 
        if(count($errors) > 0) 
        { echo "<p class ='error'>".$errors->first()."</p>";}
        elseif (isset($error)) {echo $error;} 
        @endphp
      
    </div>

    </main>
</body>
</html>
