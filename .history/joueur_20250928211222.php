
<?php 

class joueur{
    private string $prenom;
    private string $nom;
    private DateTime $birthdate;
    private string $image;
    
    public function __construct(string  $prenom, string $nom, DateTime $birthdate, string $image  ) {
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->birthdate = $birthdate;
        $this->image= $image;

        $this->saveToDatabase();
    }

    //https://www.php.net/manual/fr/pdostatement.execute.php
    public function save(): void {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO joueurs (nom, prenom, date_naissance, photo) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $this->nom,
            $this->prenom,
            $this->birthdate->format("Y-m-d"),
            $this->image
        ]);
    }

    // Getter et Setter pour prénom
    public function getPrenom(): string {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void {
        $this->prenom = $prenom;
    }

    // Getter et Setter pour nom
    public function getNom(): string {
        return $this->nom;
    }

    public function setNom(string $nom): void {
        $this->nom = $nom;
    }

    // Getter et Setter pour birthdate
    public function getBirthdate(): DateTime {
        return $this->birthdate;
    }

    public function setBirthdate(DateTime $birthdate): void {
        $this->birthdate = $birthdate;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function setImage(string $image): void {
        $this->image = $image;
    }
}

