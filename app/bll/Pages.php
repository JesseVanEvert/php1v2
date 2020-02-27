<?php
class Pages extends Controller
{
    public function index(){
        $data = [
            'title' => 'Welcome',
        ];

        $this->ui('pages/index', $data);
    }

    public function register(){
        $data = [
            'title' => 'Register'
        ];
        $this->ui('pages/register', $data);
    }
}