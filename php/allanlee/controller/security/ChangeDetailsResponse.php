<?php
namespace allanlee\controller\security;

class ChangeDetailsResponse extends \allanlee\controller\Controller{
   
    
    public function __construct() {
                
        $email = filter_input(INPUT_POST, Register::FORM_EMAIL,FILTER_VALIDATE_EMAIL);
        $firstName = filter_input(INPUT_POST, Register::FORM_FIRST_NAME);
        $lastName = filter_input(INPUT_POST, Register::FORM_LAST_NAME);

        
        // if $newletter is null then put false into newsletter
       // $newsletter = !($newsletter == null);
        
        $validData = ($email && $firstName && $lastName);
        
        if($validData)
        {
            $this->model = new \allanlee\model\security\ChangeDetailsResponse($firstName, $lastName, $email);
        } 
    else {
            $this->error = "Please complete all fields in the form.";
         }
    }

    public function getTitle() {

    }

    public function viewAction() {

         $response = ['success' => 'yes','message'=>'thank you for updating details'];
        
        if($this->isError())
        {
            $response['success'] = 'no';
            $response['message'] = $this->getError();
        }
        
        echo  json_encode($response);
    }
   
    
    
}

?>
