<?php

namespace allanlee\view;

abstract class View {

    protected $title;
    protected $model;
    protected $error;
    protected $isError;
    protected $controller;

    public function __construct($controller) {
        // set the title from the controller
        $this->title = $controller->getTitle();
        // set the model from the controller
        $this->model = $controller->getModel();

        $this->isError = $controller->isError();
        $this->error = $controller->getError();
       $this->controller = $controller; 
    }

    private function header() {
        include INCLUDES . 'header.php';
    }

    abstract protected function section($model);

    private function footer() {
        include INCLUDES . 'footer.php';
    }

    private function error() {
        include INCLUDES . 'error.php';
    }

    public function page() {
        $this->header();

        if ($this->isError) {
            $this->error();
        } else {
            $this->section($this->model);
        }

        $this->footer();
    }

}

?>
