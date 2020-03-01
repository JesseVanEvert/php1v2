<?php
class SearchDAO {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function searchUser($emailOrName){
        $emailOrName.='%';
        $this->db->query('SELECT * FROM user WHERE email LIKE :email OR name LIKE :name');
        $this->db->bind(':email', $emailOrName);
        $this->db->bind(':name', $emailOrName);

        $userRows = $this->db->resultSet();
        $users = array();

        foreach ($userRows as $userRow){
            $user = new UserModel();
            $user->setUserId($userRow->userId);
            $user->setUserName($userRow->name);
            $user->setUserLastName($userRow->lastname);
            $user->setUserType($userRow->userType);
            $user->setEmail($userRow->email);

            array_push($users, $user);
        }

        return $users;
    }
}
