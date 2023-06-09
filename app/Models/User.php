<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use DateTime;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Redirect;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'prenom',
        'nom',
        'telephone',
        'date_naissance',
        'sexe',
        'ville',
        'pays',
        'url_photo',
        'pole',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
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
        Carbon::setLocale('fr');
        $date = $this->date_naissance;
        $date = Carbon::parse($date)->translatedFormat('d F');
        $date = preg_match('/^0/', strval($date)) ? preg_replace('/^0+/', '', strval($date)) : $date;
        return $date;
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
        if(preg_match('/^.*[a-z-A-Z]$/',$nom)){
            $this->nom = $nom;
        }else{
            return withErrors(['nom' => 'Le nom ne doit contenir que des lettres']);
        }
        
    }
    public function setPrenom($prenom){
        if(preg_match('/^.*[a-z-A-Z]$/',$prenom)){
            $this->prenom = $prenom;
        }else{
           return Redirect::back()->withErrors(['prenom' => 'Le prenom ne doit contenir que des lettres']);
        }
        
    }

    public function setEmail($email){
        $this->email = $email;
        DB::update('update users set email =? where id =?',[$email,$this->id]);
    }
    public function setSexe($sexe){
        $this->sexe = $sexe;
        DB::update('update users set sexe =? where id =?',[$sexe,$this->id]);
    }
    public function setPassword($password){
        $this->password = $password;
        DB::update('update users set password =? where id =?',[$password,$this->id]);
    }
    public function setPays($pays){
        $this->pays = $pays;
        DB::update('update users set pays =? where id =?',[$pays,$this->id]);
    }
    public function setVille($ville){
        $this->ville = $ville;
        DB::update('update users set ville =? where id =?',[$ville,$this->id]);
    }
    public function setDateNaissance($date_naissance){
        $this->date_naissance = $date_naissance;
        DB::update('update users set date_naissance =? where id =?',[$date_naissance,$this->id]);
    }
    public function setTelephone($telephone){
        $this->telephone = $telephone;
        DB::update('update users set telephone =? where id =?',[$telephone,$this->id]);
    }
    public function setUrlPhoto($url_photo){
        $this->url_photo = $url_photo;
        DB::update('update users set url_photo =? where id =?',[$url_photo,$this->id]);
    }
    public function setPole($pole){
        $this->pole = $pole;
        DB::update('update users set pole =? where id =?',[$pole,$this->id]);
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
                        <li><img src="asset/cake.png" alt="">Anniversaire : '.$this->getDateAnniversaire().'</li>
                    </ul>
                </figcaption>
            </article>
            '
        );
    }
    public static function getRandomCard($current_user){
        $utilisateurs = User::where('email', '!=',$current_user->getEmail())->get();
        $utilisateur = $utilisateurs->random();
        return $utilisateur->getCard();
    }
    public static function getAllUsersSafe($user){
        return User::select('id','nom','prenom','email','sexe','pays','ville','date_naissance','telephone','url_photo','pole')->where('id','!=',$user)->get();
    }
    public static function categories(){
        return User::select('pole')->distinct()->get();
    }
    public static function sexes(){
        return User::select('sexe')->distinct()->get();
    }
}
