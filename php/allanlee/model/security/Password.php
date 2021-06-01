<?php

namespace allanlee\model\security;

class Password extends \allanlee\model\Model {

    private $successful = false;
    
    public function __construct($password) {
        parent::__construct();
        
        $userId = SignIn::getId();
        
        $query = "select salt from users where id=" . $userId;
        $this->query($query);
        $this->next();
        $salt = $this->get('salt');

        // concatenate the $passsword with the salt
        $saltedPassword = $password . $salt;
        
        // has the salted password
        $encryptedPassword = hash('sha256', $saltedPassword);


        $query = "update users set 
     password = :password 
     where id = " . $userId;

        $parameters = array(
            ':password' => $encryptedPassword,
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
