<?php

class Todo extends Controller
{
    public function home()
    {
        $data = [
            'title' => 'Welcome',
        ];

        $this->ui('pages/home', $data);
    }
}