<?php
namespace allanlee\controller\security;

class SignOut extends \allanlee\controller\Controller{
   

    public function __construct() {
  
        \allanlee\model\security\SignIn::signOut();
        

         header('Location:' . PROJECT_URL . 'home');   
       exit;
        
    }

    public function getTitle() {
        return "";
    }

    public function viewAction() {

    }
   
    
    
}

?>

