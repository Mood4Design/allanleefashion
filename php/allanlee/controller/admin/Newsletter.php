<?php

namespace allanlee\controller\admin;

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
class Newsletter extends AdminController {

    private $emailSent = false;
    private $email = 'paulpayne@pacific.net.au';
    
    public function __construct() {
        parent::__construct();
              
        $this->model = new \allanlee\model\admin\Newsletter();

        $this->email();
    }

    public function action() {
      $this->view = new \allanlee\view\admin\Newsletter($this);
      $this->view->page();

    }

    public function email() {

        $mail = new \PHPMailer;
        
    
// Set PHPMailer to use the sendmail transport
        $mail->isSMTP();
//Set who the message is to be sent from
        $mail->setFrom($this->email, 'Paul Payne');
        

//Set an alternative reply-to address
        $mail->addReplyTo($this->email, 'Paul Payne');
        
        $mail->addAddress("paulpayne@pacific.net.au", "Paul Payne");
//Set who the message is to be sent to
 //       $mail->addAddress($this->email, 'Paul');
 //       while($this->model->next())
 //       {
//        $mail->addAddress($this->model->getEmail(), $this->model->getName());
 //       }
//Set the subject line
        $mail->Subject = 'PHPMailer sendmail test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
        $mail->msgHTML("<p>Hi</p><p>Attached is this months Go Camping newsletter</p>");
//Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';
//Attach an image file

        $mail->addAttachment(NEWSLETTER . "may2015.pdf");
     
//send the message, check for errors
        $this->emailSent = $mail->send();

    }

    public function getTitle() {
            return "Newsletter";
    }

    public function isEmailSent()
    {
        return $this->emailSent;
    }
    
//put your code here
}
