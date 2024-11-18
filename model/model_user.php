<?php

class ModelUser{
    //Attributs
    private ?int $idUser;
    private ?string $lastname;
    private ?string $firstname;
    private ?string $avatar;
    private ?string $email;
    private ?string $password;
    private ?int $role;

    // $role sera défini dans le view_inscription : si aucun code rentré alors inscrition stagiaire, idrole correspondant
    // si code enregistré et valide alors inscription formateur et code correspondant

    //Constructeur
    public function __construct(?string $avatar){
        $this->avatar = $avatar;
    }

    //Getters et Setters
    public function getIdUser(): ?int
    {
        return $this->idUser;
    }

    public function setIdUser(?int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }
    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }
    public function getRole(): ?int
    {
        return $this->role;
    }
    public function setRole(?int $role): self
    {
        $this->role = $role;

        return $this;
    }

    //Méthodes

    function addUser():string{
        //1Er Etape : Instancier l'objet de connexion PDO
        $bdd = new PDO('mysql:host=localhost;dbname=superquizz','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Récupération des données de l'objet
        $lastname = $this->getLastname();
        $firstname = $this->getFirstname();
        $email = $this->getEmail();
        $avatar = $this->getAvatar();
        $password = $this->getPassword();
        $role= $this->getRole();


        //Try...Catch
        try{
            //2nd Etape : préparer ma requête INSERT INTO
            $req = $bdd->prepare('INSERT INTO users (lastname, firstname, email, pwd, avatar, id_role_user) VALUES (?,?,?,?,?,?)');

            //3eme Etape : Binding de Paramètre pour relier chaque ? à sa donnée
            $req->bindParam(1,$lastname,PDO::PARAM_STR);
            $req->bindParam(2,$firstname,PDO::PARAM_STR);
            $req->bindParam(3,$email,PDO::PARAM_STR);
            $req->bindParam(4,$avatar,PDO::PARAM_STR);
            $req->bindParam(5,$password,PDO::PARAM_STR);
            $req->bindParam(6,$role,PDO::PARAM_INT);

            //4eme Etape : exécution de la requête
            $req->execute();

            //5eme Etape : Retourne un message de confirmation
            return "$avatar, vous a avez bien étés enregistré";
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }

    //Fonction pour récupérer un utilisateurs en BDD selon un login précis
    //Param : string
    //Return : array | string
    function readUserByAvatar():array | string{
        //1Er Etape : Instancier l'objet de connexion PDO
        $bdd = new PDO('mysql:host=localhost;dbname=superquizz','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        //Récupération du pseudo depuis l'objet
        $avatar = $this->avatar;

        //Try...Catch
        try{
            //2nd Etape : préparer ma requête SELECT
            $req = $bdd->prepare('SELECT id_users, lastname, firstname, email, pwd, avatar, id_role_user FROM users WHERE avatar = ?');

            //3Eme Etape : introduire le login de l'utilisateur dans ma requête avec du Binding de Paramètre
            $req->bindParam(1,$avatar,PDO::PARAM_STR);

            //4eme Etape : executer la requête
            $req->execute();

            //5eme Etape : Récupère les réponses de la BDD
            $data = $req->fetchAll(PDO::FETCH_ASSOC);

            //6eme Etape : je retourne mes $data
            return $data;
        }catch(EXCEPTION $error){
            return $error->getMessage();
        }
    }
}
?>