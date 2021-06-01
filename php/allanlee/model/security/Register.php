<?php

namespace allanlee\model\security;

class Register extends \allanlee\model\Model {

    private $successful = false;
    
    public function __construct($name, $password, $email) {
        parent::__construct();
        
        // generate a unique salt 
        $salt = uniqid(mt_rand(), true);

        //hash it with sha256 to make 64 character
        $salt = hash('sha256', $salt);

        // concatenate the $passsword with the salt
        $saltedPassword = $password . $salt;
        
        // has the salted password
        $encryptedPassword = hash('sha256', $saltedPassword);

        // encrypt username
        //$encryptedName = hash('sha256', $name);
        

        // test if the username is available
        $query = "select name from users where name = '$name'";
        
        $this->query($query);
        
        $this->next();

        if($this->getRowCount() != 0)
        {
            $this->setError("your name is not available");
            return;
        }
        
        $query = "INSERT INTO users set 
     name = :name,
     password = :password,
     salt = :salt,
     email = :email";

        $parameters = array(
            ':name' => $name,
            ':password' => $encryptedPassword,
            ':salt' => $salt,
            ':email' => $email
            
        );

        $this->prepare($query, $parameters);
        
        $this->successful = $this->getRowCount() == 1;
        
        if(!$this->successful) $this->setError("Unable to register you at the moment. Please try again later.");
    }

function isSuccessful()
{
    return $this->successful;
}
    
}



?>
