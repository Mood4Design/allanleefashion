<?php

namespace allanlee\controller\admin;

abstract class AdminController extends \allanlee\controller\Controller {

    public function __construct() {
        
        if(!\allanlee\model\security\SignIn::isAdmin())
        {
            header("Location:" . PROJECT_URL . "page-not-found");
            exit;
        }
        
    }

}

?>
