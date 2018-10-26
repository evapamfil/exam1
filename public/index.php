<?php
/**
 * Created by PhpStorm.
 * User: evapamfil
 * Date: 26/10/2018
 * Time: 13:12
 */

require __DIR__ . '/../vendor/autoload.php';

/*use \App\Model\User;
use \App\Model\Model;*/

class Model
{

}

class User extends Model
{
    protected $email;
    protected $firstName;
    protected $lastName;
    protected $createdAt;
    protected $lastLogin;


    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function setFirstName($firstName)
    {
        $this->$firstName = $firstName;
        return $this;
    }
    public function setLastName($lastName)
    {
        $this->$lastName = $lastName;
        return $this;
    }

    public function setCreatedAt($createdAt)
    {
        $this->$createdAt = $createdAt;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getFullName()
    {
        return $this->firstName . $this->lastName;
    }
}


$user = new User();
$model = new Model();

$user->setEmail('bababbababa');

print_r($user->getEmail());


$dotenv = new Dotenv\Dotenv(__DIR__ . '/../');
$dotenv->load();


$server = getenv('DATABASE_SERVER');
$userEnv = getenv('DATABASE_USER');
$dbName = getenv('DATABASE_NAME');
$port = getenv('DATABASE_PORT');
$pass = getenv('DATABASE_PASSWORD');


try {
    $dbh = new PDO('mysql:host=localhost;dbname=exam1', $userEnv, $pass);
 /*   foreach($dbh->query('SELECT * from users') as $row) {
        print_r($row);
    }*/
    $query = $dbh->prepare('SELECT * from users');
    $query->execute();

    $result = $query->fetchAll(PDO::FETCH_OBJ);
    var_dump($result);

    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}



