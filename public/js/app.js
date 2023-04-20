
document.addEventListener('DOMContentLoaded', ()=> {
    // Récupération des éléments de la page
    let input_name = document.getElementById('input_name');
    let select_pole = document.getElementById('select_pole');
    let select_searchby = document.getElementById('select_searchby');
    let ul = document.getElementById('card_list');

    // Retourne le type de data à filtrer (TODO: Faire un tableau clé valeur) 
    let kindOfSearch = (user,select_value) => {
        console.log(select_value);
        if(select_value === 'Nom') {return user.nom;}
        else if(select_value === 'Prenom') {return user.prenom;}
        else if(select_value === 'Email') {return user.email;}
    }
    // Corrige le probleme du point en regex notamment dans les mails | exemple : "upchh@example.com" -> "upchh@example\\.com"
    let dotFix = (input_name) =>{
        return input_name.value.replace(/\./g,'\\.');
    }
    // Retourne l'age de l'utilisateur à partir de la date de naissance
    let getAge = (user) => {
        let today = new Date();
        let birthDate = new Date(user.date_naissance);
        let age = today.getFullYear() - birthDate.getFullYear();
        let m = today.getMonth() - birthDate.getMonth();
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }
        return age;
    };

    let getDateNaissance = (user) => {
        let birthDate = new Date(user.date_naissance);
        let options = {  month: 'long', day: 'numeric' };
        birthDate = birthDate.toLocaleDateString('fr-FR',options);
        return (birthDate);
    };


    // retourne la liste des cards filtrer
    let getCardList = (ul,selectField,inputField,userArray)=> {
        ul.innerHTML = '';
        userArray.forEach(user => {
            if(kindOfSearch(user,select_searchby.value).toLowerCase().match(('^'+dotFix(inputField)+'.*').toLowerCase()) && user.pole.toLowerCase().match(('^'+selectField.value+'.*').toLowerCase())){
             let li = document.createElement('li');
              li.innerHTML = `
              <article class="card">
              <p class="pole">`+user.pole+`</p>
               <figure>
                    <img src="`+user.url_photo+`" alt="Photo de `+user.prenom+`">
                       <figcaption>
                        <h3><strong>`+user.prenom+" "+user.nom+`</strong>(`+getAge(user)+` ans)</h3>
                       <p>`+user.ville+", "+user.pays+`</p>
                       <ul>
                           <li><img src="asset/mail.png" alt="Email de `+user.prenom+`"><a href="mailto:`+user.email+`">`+user.email+`</a></li>
                           <li><img src="asset/tel.png" alt="Télephone de `+user.prenom+`"><a href="">`+user.telephone+`</a></li>
                            <li><img src="asset/cake.png" alt="">Anniversaire :`+" "+getDateNaissance(user)+`</li>
                       </ul>
                 </figcaption>
                </article>
            `;
            ul.appendChild(li);
        }
    });
    };

    // Evènement sur les champs de recherche
    input_name.addEventListener('keyup', () => {
        getCardList(ul,select_pole,input_name,userArray);
    });

    select_pole.addEventListener('change', ()=> {
        getCardList(ul,select_pole,input_name,userArray);
    });

    select_searchby.addEventListener('change', ()=> {
        getCardList(ul,select_pole,input_name,userArray);
    });


});