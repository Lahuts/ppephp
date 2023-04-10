<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Utilisateur extends Model
{
    use HasFactory;    

    protected $table = 'Utilisateur';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $connection = 'mysql';

    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getAge(){
        $this->date_naissance = new DateTime($this->date_naissance);
        $now = new DateTime();
        $interval = $now->diff($this->date_naissance);
        return strval($interval->y);
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSexe(){
        return $this->sexe;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getPays(){
        return $this->pays;
    }
    public function getVille(){
        return $this->ville;
    }
    public function getDateNaissance(){
        return $this->date_naissance;
    }
    public function getDateAnniversaire(){
        setlocale(LC_TIME, "fr_FR"); 
        $date = new $this->date_naissance;
        $date->setDate(date("Y"), $date->format("m"), $date->format("d"));
        return strval($date->format("d F"));
    }
    public function getTelephone(){
        return $this->telephone;
    }
    public function getUrlPhoto(){
        return $this->url_photo;
    }
    public function getPole(){
        return $this->pole;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function setSexe($sexe){
        $this->sexe = $sexe;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setPays($pays){
        $this->pays = $pays;
    }
    public function setVille($ville){
        $this->ville = $ville;
    }
    public function setDateNaissance($date_naissance){
        $this->date_naissance = $date_naissance;
    }
    public function setTelephone($telephone){
        $this->telephone = $telephone;
    }
    public function setUrlPhoto($url_photo){
        $this->url_photo = $url_photo;
    }
    public function setPole($pole){
        $this->pole = $pole;
    }
    public function getCard(){
        print(
            '
            <article class="card">
            <p class="pole">'.$this->getPole().'</p>
            <figure>
                <img src="'.$this->getUrlPhoto().'" alt="Photo de '.$this->getPrenom().'">
                <figcaption>
                    <h3><strong>'.$this->getPrenom().' '.$this->getNom().'</strong>('.$this->getAge().' ans)</h3>
                    <p>'.$this->getVille().', '.$this->getPays().'</p>
                    <ul>
                        <li><img src="asset/mail.png" alt="Email de '.$this->getPrenom().'"><a href="'.$this->getEmail().'">'.$this->getEmail().'</a></li>
                        <li><img src="asset/tel.png" alt="Télephone de '.$this->getPrenom().'"><a href="">'.$this->getTelephone().'</a></li>
                        <li><img src="asset/cake.png" alt="">Anniversaire :'.$this->getDateAnniversaire().'</li>
                    </ul>
                </figcaption>
            </article>
            '
        );
    }
    public static function getRandomCard(){
        $utilisateurs = Utilisateur::all();
        $utilisateur = $utilisateurs[rand(0, count($utilisateurs)-1)];
        return $utilisateur->getCard();
    }
}
