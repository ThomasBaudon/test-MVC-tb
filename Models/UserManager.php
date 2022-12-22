<?php

require_once('pdo.php');
require_once('User.php');


class UserManager
{
    private $dataBase;

    public function __construct(PDO $dataBase)
    {
        $this->dataBase = $dataBase;
    }

    public function insertUser(User $user)
    {

        $req = $this->dataBase->prepare("INSERT INTO client(lastname, firstname, mail, password, address, city, zipcode, phone, birthdate, country) VALUES(:lastname, :firstname, :mail, :password, :address, :city, :zipcode, :phone, :birthdate, :country)");
        $req->bindValue(':lastname', $user->getLastname(), PDO::PARAM_STR);
        $req->bindValue(':firstname', $user->getFirstname());
        $req->bindValue(':mail', $user->getMail());
        $req->bindValue(':password', $user->getPassword());
        $req->bindValue(':address', $user->getAddress());
        $req->bindValue(':city', $user->getCity());
        $req->bindValue(':zipcode', $user->getZipcode());
        $req->bindValue(':phone', $user->getPhone());
        $req->bindValue(':birthdate', $_POST['birthdate']);
        $req->bindValue(':country', $user->getCountry());
        $req->execute();
    }

    public function getAllUsers()
    {
        $getUsers = $this->dataBase->query("SELECT * FROM client ORDER BY lastname ASC");
        return $getUsers;
    }

    public function getUserById()
    {
        $idUser = $this->dataBase->query("SELECT * FROM client WHERE id_cli = '$_GET[id_cli]'");
        return $idUser;
    }

    public function getProfilById()
    {
        $idCli = $_SESSION['client']['id_cli'];
        $idUser = $this->dataBase->query("SELECT * FROM client WHERE id_cli = $idCli");
        return $idUser;
    }

    public function getUserByMail()
    {
        $mailUser = $this->dataBase->query("SELECT * FROM client WHERE mail = '$_POST[mail]'");
        return $mailUser;
    }

    public function updateUser()
    {

        $updateUser = $this->dataBase->prepare("UPDATE client SET lastname = :lastname, firstname = :firstname, mail = :mail, address = :address, city = :city, zipcode = :zipcode, phone = :phone, birthdate = :birthdate, country = :country WHERE id_cli = $_GET[id_cli]");
        $updateUser->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
        $updateUser->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
        $updateUser->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);
        $updateUser->bindValue(':address', $_POST['address'], PDO::PARAM_STR);
        $updateUser->bindValue(':city', $_POST['city'], PDO::PARAM_STR);
        $updateUser->bindValue(':zipcode', $_POST['zipcode'], PDO::PARAM_STR);
        $updateUser->bindValue(':phone', $_POST['phone'], PDO::PARAM_STR);
        $updateUser->bindValue(':birthdate', $_POST['birthdate'], PDO::PARAM_STR);
        $updateUser->bindValue(':country', $_POST['country'], PDO::PARAM_STR);
        $updateUser->execute();

        header('location:admin_users.php');
    }

    public function deleteUser()
    {
        if ($_GET['action'] = "delete") {
            $deleteUser = $this->dataBase;
            $del = $deleteUser->query("DELETE FROM client WHERE id_cli = '$_GET[id_cli]'");
            return $del;
        }
    }

    public function isUserValid() {
        return!(empty($this->lastname) || empty($this->firstname) || empty($this->mail) || empty($this->password));
    }

    public function clientConnected(){
        if(isset($_SESSION['client']))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
