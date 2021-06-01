<?php

namespace allanlee\model\security;

class Subscription extends \allanlee\model\Model {

    private $successful = false;
    
    public function __construct( $email) {
        parent::__construct();
        
        
        $query = "select email from subscription where email = '$email'";
        
        $this->query($query);
        
        $this->next();

        if($this->getRowCount() != 0)
        {
            $this->setError("your email is not available");
            return;
        }
        
        $query = "INSERT INTO subscription set 
    
     email = :email";


        $parameters = array(
           
            ':email' => $email
        );

        $this->prepare($query, $parameters);
        
        $this->successful = $this->getRowCount() == 1;
        
        if(!$this->successful) $this->setError("Unable to subscribe you at the moment. Please try again later.");
    }

function isSuccessful()
{
    return $this->successful;
}
    
}



?>
