<?php

namespace allanlee\model\security;

class ChangeDetailsResponse extends \allanlee\model\Model {

    private $successful = false;
    
    public function __construct($firstName, $lastName, $email) {
        parent::__construct();

        $query = "update users set 
     first_name = :first_name,
     last_name = :last_name,
     email = :email
     where id = " . SignIn::getId() ;

        $parameters = array(
   
            ':first_name' => $firstName,
            ':last_name' => $lastName,
            ':email' => $email
          
        );

        $this->prepare($query, $parameters);
        
        $this->successful = $this->getRowCount() == 1;
        
        if(!$this->successful) $this->setError("Unable to update your details. Please try again later.");
    }

function isSuccessful()
{
    return $this->successful;
}
    
}



?>
