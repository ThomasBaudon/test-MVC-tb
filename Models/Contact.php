<?php 

 class Contact{

    private $id_contact, $lastname, $firstname, $email, $message, $date;

    public function __construct($data)
    {
        if(!empty($data))
        {
            $this->assignement($data);
        }
    }

    public function assignement($data)
    {
        foreach($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }

    /* --------------------------------------------- */
    /* SETTERS - SETTERS - SETTERS - SETTERS - SETTERS */
    /* --------------------------------------------- */


    public function setContactId($id_contact){
        $this->id_contact = $id_contact;
    }

    public function setContactLastname($lastname){
        $this->lastname = $lastname;
    }

    public function setContactFirstname($firstname){
        $this->firstname = $firstname;
    }

    public function setContactMail($email){
        $this->email = $email;
    }

    public function setContactMessage($message){
        $this->message = $message;
    }

    public function setContactDate($date){
        $this->date = $date;
    }


    /* --------------------------------------------- */
    /* GETTERS - GETTERS - GETTERS - GETTERS - GETTERS */
    /* --------------------------------------------- */

    public function getContactId(){
        $this->id_contact;
    }

    public function getContactLastname(){
        $this->lastname;
    }

    public function getContactFirstname(){
        $this->firstname;
    }

    public function getContactMail(){
        $this->email;
    }

    public function getContactMessage(){
        $this->message;
    }

    public function getContactDate(){
        $this->date;
    }


 }

?>