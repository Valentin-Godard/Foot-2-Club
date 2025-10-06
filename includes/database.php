<?php
namespace App;

use PDO;
use PDOException;


class Database
{
    private static $aa = null;
    private $connection;

    private function __construct()
    {
        $host = "localhost";
        $dbname = "footclub";
        $username = "root";
        $password = "";

        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }

    public static function getInstance()
    { // Singleton : Empêche la création de plusieurs instances de la base de données, si instance déjà créée, on la réutilise
        if (self::$aa === null) {
            self::$aa = new Database();
        }
        return self::$aa;
    }
    
    public function getConnection()
    {
        return $this->connection;
    }
}

$db = Database::getInstance();
$connection = $db->getConnection();

var_dump($connection);
?>

<br>
<br>

<?php
var_dump($db);
