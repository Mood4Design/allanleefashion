<?php
namespace allanlee\controller\security;

class SubscriptionResponse extends\allanlee\controller\Controller{
    
  private $email;
    
    public function __construct() {
        
       // $this->username = $_POST[Register::FORM_NAME];
  
       $email = filter_input(INPUT_POST, Register::FORM_EMAIL);
      
      // if $newletter is null then put false into newsletteremail
        $validData = !($email == null || $email == '');
              
        if($validData)
        {
            $this->model = new \allanlee\model\security\Subscription($email);
        }  
    }
    public function getTitle() {

    }

 public function viewAction() {

         $subscribe = ['success' => 'yes','message'=>'Thank you for subscribe'];
        
        if($this->isError())
        {
            $subscribe['success'] = 'no';
            $subscribe['message'] = $this->getError();
        }
        
        echo  json_encode($subscribe);
    }
    
   
}

?>
