<?php
namespace allanlee\controller;

abstract class Controller {

    protected $model = null;
    protected $error = '';

    abstract public function viewAction();

    abstract function getTitle();

    public function getModel() {
        return $this->model;
    }

    public function isError() {
        if ($this->error)
            {
            return true;
            }
        else if ($this->model != null) 
            {
            return $this->model->isError();
            } 
           
        return false;
    }

    public function getError() {
         if ($this->error)
            {
            return $this->error;
            }   
        else if ($this->model != null)
            {
            return $this->model->getError();
            }
  
          return "";
    }

}

?>
