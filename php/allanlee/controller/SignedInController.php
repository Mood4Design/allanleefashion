<?php

namespace allanlee\controller;

abstract class SignedInController extends Controller {

    public function __construct() {
        
        if(!\allanlee\model\security\SignIn::isSignedIn())
        {
            header("Location:" . PROJECT_URL . "sign-in");
            exit;
        }
        
    }

}

?>
