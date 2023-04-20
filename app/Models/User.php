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

            $this->nom = $nom;
            DB::update('update users set nom = ? where id = ?',[$nom,$this->id]);

        
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
    public static function getAllUsersSafe(){
        return User::select('id','nom','prenom','email','sexe','pays','ville','date_naissance','telephone','url_photo','pole')->get();
    }
    public static function categories(){
        return User::select('pole')->distinct()->get();
    }
    public static function sexes(){
        return User::select('sexe')->distinct()->get();
    }
}
