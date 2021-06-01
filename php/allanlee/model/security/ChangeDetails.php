<?php
namespace allanlee\model\security;

class ChangeDetails extends \allanlee\model\Model{

    public function __construct() {
        
        parent::__construct();
       
            $query = "select first_name,last_name,email from users where id = :id";

            $this->prepare($query,[":id"=> SignIn::getId()]);

            $this->next();

    }

    public function getFirstName() {
        return parent::get('first_name');
    }

    public function getLastName() {
        return parent::get('last_name');
    }

    public function getEmail() {
        return parent::get('email');
    }

    
}

?>
