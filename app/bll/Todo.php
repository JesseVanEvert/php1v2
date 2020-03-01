<?php

class Todo extends Controller
{
    protected $searchBLL;

    public function __construct() {
        $this->searchBLL = $this->bll('Search');
    }

    public function home()
    {
        $data = [
            'title' => 'Welcome',
        ];

        $this->ui('pages/home', $data);
    }
}