<?php
class Login extends Controller {

    public function __construct(){
        $this->userDAO = $this->dal('UserDAO');
    }

    public function index(){
        $data = [
            'title' => 'login',
        ];

        $this->ui('pages/index', $data);
    }
}
