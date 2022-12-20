<?php 

require_once('pdo.php');
require_once('Equipments.php');

class ContactManager{

    private $dataBase;

    /* CONSTRUCTOR */
    public function __construct(PDO $dataBase)
    {
        $this->dataBase = $dataBase;    
    }

    /* GET ALL */
    public function getAllContacts()
    {
        $getAllContacts = $this->dataBase->query("SELECT * FROM contact ORDER BY id_contact DESC");
        return $getAllContacts;
    }

    /* GET BY ID */
    public function getContactById()
    {
        $getContactById = $this->dataBase->query("SELECT * FROM contact WHERE id_contact = '$_GET[id_contact]");
        return $getContactById;
    }


    /* DELETE */
    public function deleteContact()
    {
        $deleteContact = $this->dataBase;
        $del = $deleteContact->query("DELETE FROM contact WHERE id_contact = '$_GET[id_contact]'");
        header('location:contactPage.php ');
    }


    /* INSERT CONTACT */
    public function insertContact(Contact $contact)
    {
        $ad = $this->dataBase->prepare("INSERT INTO contact(id_contact, lastname, firstname, email, message, date) VALUES (:id_contact, :lastname, :firstname, :email, :message, :date)");

        $ad->bindValue(':id_contact', $_POST['id_contact'], PDO::PARAM_INT);
        $ad->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
        $ad->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
        $ad->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $ad->bindValue(':message', $_POST['message'], PDO::PARAM_STR);
        $ad->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
        
        $ad->execute();
    }

    /* UPDATE REVIEWS */
    public function updateContact()
    {
        $reqUpdate = $this->dataBase->prepare("UPDATE contact SET id_contact = :id_contact, lastname = :lastname, firstname = :firstname, email = :email, message = :message, date = :date");

        $reqUpdate->bindValue(':id_contact', $_POST['id_contact'], PDO::PARAM_INT);
        $reqUpdate->bindValue(':lastname', $_POST['lastname'], PDO::PARAM_STR);
        $reqUpdate->bindValue(':firstname', $_POST['firstname'], PDO::PARAM_STR);
        $reqUpdate->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $reqUpdate->bindValue(':message', $_POST['message'], PDO::PARAM_STR);
        $reqUpdate->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
        
        $reqUpdate->execute();

        header('location:contactPage.php ');
    }


}


?>