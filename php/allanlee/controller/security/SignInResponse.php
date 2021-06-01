<?php
namespace allanlee\controller\security;

class SignInResponse extends\allanlee\controller\Controller{
    
  private $email;
    
    public function __construct() {
        
       // $this->username = $_POST[Register::FORM_NAME];
      
       $password = filter_input(INPUT_POST, Register::FORM_PASSWORD);
       $email = filter_input(INPUT_POST, Register::FORM_EMAIL);
    
      // if $newletter is null then put false into newsletter
     
        
        $validData = ( $email && $password  );
        
        if($validData)
        {
            $this->model = new \allanlee\model\security\SignIn( $email, $password);
        }
        else {
        $this->error = "Please complete all fields in the form.";
        }
    }
    public function getTitle() {

    }

 public function viewAction() {

         $signinResponse = ['success' => 'yes','message'=>'Thank you for signin'];
        
        if($this->isError())
        {
            $signinResponse['success'] = 'no';
            $signinResponse['message'] = $this->getError();
        }
        
        echo  json_encode($signinResponse);
    }
    
   
}

?>
