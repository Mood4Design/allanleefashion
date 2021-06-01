<?php

namespace allanlee\model\admin;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Newsletter
 *
 * @author Paul
 */
class Newsletter extends \allanlee\model\Model {

    public function __construct() {
        parent::__construct();
      
        $query = "select email, first_name,last_name from users where newsletter = 1";
        
        $this->query($query);
        
  //      echo $this->getName() . "<br/>";        
  //      echo "got here";
  //      exit;
    }
    
    public function getEmail()
    {
        return $this->get('email');
    }

    public function getName()
    {
        return $this->get('first_name') . " " . $this->get('last_name');
    }

//put your code here
}
