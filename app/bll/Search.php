<?php 
    class Search EXTENDS Controller{
        private $searchDAO;

        public function __construct() {
            $this->searchDAO = $this->dal('SearchDAO');
        }

        public function index(){
            $data = [
                'title' => 'Search Away!',
                'error' => '',
                'result' => 'f'
            ];

            $this->ui('search/search', $data);
        }

        public function searchUser($emailOrName){
            return $this->searchDAO->searchUser($emailOrName);
        }
    }