<?php
namespace allanlee\controller\security;

class Register extends \allanlee\controller\Controller{
    
    const FORM_FIRST_NAME = 'fn';
    const FORM_LAST_NAME = 'ln';
    const FORM_NAME = 'na';
    const FORM_PASSWORD = 'pw';
    const FORM_EMAIL = 'em';
    const FORM_PASSWORD_CONFIRMATION = 'pc';

   
   public function __construct() {
        
           
    }

    public function getTitle() {
      return "Registration form"; 
    }

    public function viewAction() {
       $view = new \allanlee\view\security\Register($this);
        // execute page() within view
        $view->page(); 
    }
}

?>
