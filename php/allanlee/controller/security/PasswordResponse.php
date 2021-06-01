<?php

namespace allanlee\controller\security;

class PasswordResponse extends \allanlee\controller\Controller {

    
    public function __construct() {
                
       $password = filter_input(INPUT_POST, Register::FORM_PASSWORD);
        $passwordConfirm= filter_input(INPUT_POST, Register::FORM_PASSWORD_CONFIRMATION);
  
        $validData = ($password && $passwordConfirm);
        
        if($validData)
        {
            $this->model = new \allanlee\model\security\Password($password);
        } 
    else {
            $this->error = "Please complete all fields in the form.";
         }
    }

    public function getTitle() {

    }

    public function viewAction() {

         $response = ['success' => 'yes','message'=>'thank you for updating your password'];
        
        if($this->isError())
        {
            $response['success'] = 'no';
            $response['message'] = $this->getError();
        }
        
        echo  json_encode($response);
    }
   
    
    
}

?>
