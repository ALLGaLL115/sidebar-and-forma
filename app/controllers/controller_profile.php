<?php

class Controller_Profile extends Controller {
    function __construct() 
    {
        $this->model = new Model_Profile();
        $this->view = new View();
    }

    function action_index() {
        $css_path =  '../css/cblocks/profile.css';
        $js_path = '../js/cblocks/profile.js';
        // print_r($css_path);
        // $this->model->sendMessageToEmail('all.gall1@mail.ru', 'dkdkkdkd');
        $this->view->generate('profile_view.php', 'template_view.php', null, $css_path, $js_path);
    }
}