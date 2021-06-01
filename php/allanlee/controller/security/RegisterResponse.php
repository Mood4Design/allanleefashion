<?php
namespace allanlee\controller\security;

class RegisterResponse extends\allanlee\controller\Controller{
    
    
    public function __construct() {
        
       // $this->name = $_POST[Register::FORM_NAME];
       $name= filter_input(INPUT_POST, Register::FORM_NAME);
       $password = filter_input(INPUT_POST, Register::FORM_PASSWORD);
       $email = filter_input(INPUT_POST, Register::FORM_EMAIL);
      // $newsletter = filter_input(INPUT_POST, Register::FORM_NEWSLETTER);
      // if $newletter is null then put false into newsletter
        //$newsletter = !($newsletter == null);
        
        $validData = ($name && $password && $email );
        
        if($validData)
        {
            $this->model = new \allanlee\model\security\Register($name, $password,$email);
        }
        else {
        $this->error = "Please complete all fields in the form.";
        }
    }
    public function getTitle() {

    }

 public function viewAction() {

         $response = ['success' => 'yes','message'=>'Thank you for registering'];
        
        if($this->isError())
        {
            $response['success'] = 'no';
            $response['message'] = $this->getError();
        }
        
        echo  json_encode($response);
    }
    
   
}

?>
