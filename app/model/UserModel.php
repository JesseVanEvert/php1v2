<?php
    class UserModel {
        private $userName;
        private $userId;
        private $userLastName;
        private $email;
        private $userType = 1;
        private $password;
        private $passwordConfirm;

        //Get and Set for userName
        public function setUserName($userName){
            $this->userName = $userName;
        }
        public function getUserName(){
            return $this->userName;
        }

        public function setUserId($userId){
            $this->userId = $userId;
        }
        public function getUserId(){
            return $this->userId;
        }

        //Get and Set for userLastName
        public function setUserLastName($userLastName){
            $this->userLastName = $userLastName;
        }
        public function getUserLastName(){
            return $this->userLastName;
        }

        //Get and Set for email
        public function setEmail($email){
            $this->email = $email;
        }
        public function getEmail(){
            return $this->email;
        }

        public function setUserType($type){
            $this->userType = $type;
        }
        public function getUserType(){
            return $this->userType;
        }

        //Get and Set for password
        public function setPassword($password){
            $this->password = $password;
        }
        public function getPassword(){
            return $this->password;
        }

        //Get and Set for passwordConfirm
        public function setPasswordConfirm($passwordConfirm){
            $this->passwordConfirm = $passwordConfirm;
        }
        public function getPasswordConfirm(){
            return $this->passwordConfirm;
        }
    }
