document.addEventListener('DOMContentLoaded', () => {

    // Création du container
    let passwordHelperContainer = document.createElement('div');
    passwordHelperContainer.id = 'passwordHelperContainer';
    // Création du titre
    const h3 = document.createElement('h3');
    h3.id = 'passwordHelperTitle';
    h3.innerText = 'Le mot de passe doit contenir :';

    // Ajout du titre au container
    passwordHelperContainer.appendChild(h3);

    // Création de la liste
    let ul = document.createElement('ul');
    // Création des conditions
    const condition = ['12 caractères minimum', '1 majuscule', '1 minuscule', '1 chiffre', '1 caractère spécial'];
    for (let i = 0; i <= 4; i++) {
        let li = document.createElement('li');
        li.id = 'passwordHelperItem';
        li.innerText = ` - ${condition[i]} `;
        ul.appendChild(li);
    }
    passwordHelperContainer.appendChild(ul);
    let mdp = document.querySelector('#mdp');
    let formContainer = document.querySelector('form');
    // Evènement sur le champ de mot de passe pour afficher le container quand il est focus
   mdp.addEventListener('focus', () => {
      formContainer.appendChild(passwordHelperContainer);
    });
    // Evènement sur le champ de mot de passe pour supprimer le container quand il n'est plus focus
   mdp.addEventListener('blur', () => {
       formContainer.removeChild(passwordHelperContainer);
    });

    // Fonction qui vérifie les conditions et change le style de l'élément
    let rulesCheck = (condition,element) => {
        if(condition){
            element.style.listStyleType = "'\u2713'";
            element.style.color = 'green';
        }else{
            element.style.listStyleType = "'\u2716'";
            element.style.color = 'red';
        }
    };
    
    // Evènement sur le champ de mot de passe pour vérifier les conditions
    mdp.addEventListener('keyup', () => {
        let passwordHelperItemCollection = document.querySelectorAll('#passwordHelperItem');
        // 12 caractères minimum
        rulesCheck(mdp.value.length >= 12,passwordHelperItemCollection[0]);
        // contient une majuscule
        rulesCheck(mdp.value.match(/[A-Z]/),passwordHelperItemCollection[1]);
        // contient une minuscule
        rulesCheck(mdp.value.match(/[a-z]/),passwordHelperItemCollection[2]);
        // contient un chiffre
        rulesCheck(mdp.value.match(/[0-9]/),passwordHelperItemCollection[3]);
        // contient un caractère spécial et different de < > & " ' , ; `
        rulesCheck(mdp.value.match(/[^<>\"',;`&a-zA-Z0-9]/),passwordHelperItemCollection[4]);
        

});

});