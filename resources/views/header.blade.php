<nav>
    <ul class="nav__left">
        <li> 
            <a href="/hello"><img src="/asset/intranet.png" alt="Accueil"> Intranet</a>
        </li>
    </ul>
    <ul class="nav__right">
        <li>
            <a href="/liste"><img src="/asset/list.png" alt="Liste"> Liste</a>
        </li>
        <li>
            <a class="profil__img" href="/config"><img src="{{Auth::user()->getUrlPhoto()}}" alt=""></a>
        </li>
        <li>
            <a class="btn_deconnect" href="/deco"><img src="/asset/out.png" alt="Déconnexion"> Déconnexion</a>
        </li>
    </ul>
   </nav>