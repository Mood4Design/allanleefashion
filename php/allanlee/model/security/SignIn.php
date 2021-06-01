<?php

namespace allanlee\model\security;
class SignIn extends \allanlee\model\Model {

 const locked = "you have been locked out"; 
    public function __construct($email, $password) {
        parent::__construct();
        
     
             
        $query = "select id,salt, password,first_name,admin from users where email = '$email'";

        $this->query($query);
        
        $this->next();
        
        if($this->getRowCount() != 1)
        {
            $this->setError("your sign in is incorrect");
            return;
        }  
        
        if($this->get('locked') == 1)
        {
            $this->setError(SignIn::locked);
            return;
        }
        
        $salt = $this->get('salt');       
        // concatenate the $passsword with the salt
        $saltedPassword = $password . $salt;        
        // has the salted password
        $encryptedPassword = hash('sha256', $saltedPassword);
        // encrypt username
        if($encryptedPassword == $this->get('password'))
        {
            $firstName  = $this->get('first_name');
            $id  = $this->get('id');
            $admin  = $this->get('admin');
            $this->signIn($firstName,$id,$admin); 
        }
        else
        {
           // initialize locked out in the session if it does not exist 
            if(isset($_SESSION['locked']))
            {
                $_SESSION['locked'] = $_SESSION['locked'] +1;
                // give the user 3 attempts at locking in with a valid username
                if($_SESSION['locked'] == 3)
                {
                   $query = "update users set locked=1 where username ='$encryptedUsername'";
                   $this->execute($query);
                   // if database has been updated then lest theuser know they are locker out
                     if($this->getRowCount() == 1)
                        {
                        $this->setError(SignIn::locked);
                        return;
                        }
                }
            }
            else
            {
              $_SESSION['locked'] = 1;  
            }
            
            $this->setError("your sign in is incorrect");
        }
  } 
  
 private function signIn($fn,$id,$admin)
  {
      $_SESSION['first name'] = $fn;
      $_SESSION['id'] = $id;
      if($admin)$_SESSION['admin'] = "1";
      unset($_SESSION['locked']);
  }
  
  public static function isAdmin()
  {
      return isset($_SESSION['admin']);
  }
  
  public static function getId()
  {
      return isset($_SESSION['id'])?$_SESSION['id']:false;
  }
  
  
  public static function isSignedIn()
  {
      return isset($_SESSION['first name']);
  }
  
  public static function signOut()
  {
      unset($_SESSION['first name']);
       unset($_SESSION['id']);
       unset($_SESSION['admin']);
  }
  
}

?>
  
