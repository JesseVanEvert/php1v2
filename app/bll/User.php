<?php
    class User extends Controller{
        private $userDAO;
        private $userModel;

        public function __construct(){
            $this->userModel = $this->model('UserModel');
            $this->userDAO = $this->dal('UserDAO');
        }

        public function register(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form

                // Sanitize POST data and determine validation regex
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $passwordValidation = "/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/";
                $nameValidation = "/^[a-zA-Z ]*$/";

                // Init data
                $user = new UserModel();
                $user->setUserName(trim($_POST['name']));
                $user->setUserLastName(trim($_POST['lastName']));
                $user->setEmail(trim(($_POST['email'])));
                $user->setPassword(trim($_POST['password']));
                $user->setPasswordConfirm(trim($_POST['confirmedPassword']));

                $data = [
                    'nameError' => '',
                    'lastNameError' => '',
                    'emailError' => '',
                    'passwordError' => '',
                    'passwordConfirmError' => ''
                ];

                // Validate email not empty
                if(empty($user->getEmail())){
                    $data['emailError'] = 'Please enter email';
                }else {
                    // Check if email already exists
                    if($this->userDAO->findUserByEmail($user->getEmail())){
                        $data['emailError'] = 'Email is already taken';
                    }
                }

                // Validate Name not empty
                if(empty($user->getUserName())){
                    $data['nameError'] = 'Please enter name';
                } elseif(!preg_match($nameValidation, $user->getUserName())){
                    $data['nameError'] = 'Name can only contain letters and whitespace';
                }

                // Validate lastName not empty
                if(empty($user->getUserLastName())){
                    $data['lastNameError'] = 'Please enter last name';
                } elseif(!preg_match($nameValidation, $user->getUserLastName())){
                    $data['lastNameError'] = 'Name can only contain letters and whitespace';
                }


                // Validate Password not empty
                if(empty($user->getPassword())){
                    $data['passwordError'] = 'Please enter password';
                } elseif(strlen($user->getPassword()) < 6) {
                    $data['passwordError'] = 'Password must be at least 6 characters long';
                } elseif(!preg_match($passwordValidation, $user->getPassword())){
                    $data['passwordError'] = 'Password must have at least one numeric value, one uppercase character and one lowercase character';
                }

                 // Validate password confirmation
                 if(empty($user->getPasswordConfirm())){
                    $data['passwordConfirmError'] = 'Please confirm password';
                } else {
                    if($user->getPassword() != $user->getPasswordConfirm()){
                        $data['passwordConfirmError'] = 'Passwords do not match!';
                    }
                }

                // Make sure errors are empty
                if(empty($data['emailError']) && empty($data['nameError']) && empty($data['passwordError']) && empty($data['passwordConfirmError'])){
                    // Validated

                    // Hash password
                    $user->setPassword(password_hash($user->getPassword(), PASSWORD_DEFAULT));

                    // Register user
                    if($this->userDAO->register($user)){
                        // Send verification email

                        $message = "You have registered at Haarlem Festival. \n
                        Click the link below to verificate your account! \n
                        " . URLROOT . "/users/userverification?token=";

                        // Use wordwrap() if lines are longer than 70 characters
                        $message = wordwrap($message,70);

                        // Subject
                        $subject = "Todo account creation";

                        // Send email
                        mail($user->getEmail(), $subject, $message);
                        redirect('index/login');
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    //Load view with data
                    $this->ui('pages/register', $data);
                }

            } else {
                //Init data
                $data = [
                    'name' => '',
                    'lastName' => '',
                    'email' => '',
                    'passwordConfirm' => '',
                    'nameError' => '',
                    'lastNameError' => '',
                    'emailError' => '',
                    'passwordError' => '',
                    'passwordConfirmError' => ''
                ];

                //Load ui
                $this->ui('pages/register', $data);
            }
        }

        public function login(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $user = new UserModel();
                $user->setEmail(trim($_POST['email']));
                $user->setPassword(trim($_POST['password']));

                // Validate email not empty
                if(empty($user->getEmail())){
                    $data['emailError'] = 'Please enter email';
                }

                // Validate Password not empty
                if(empty($user->getPassword())){
                    $data['passwordError'] = 'Please enter password';
                }

                // Check user by email
                if(!empty($user->getEmail())){
                    if($this->userDAO->findUserByEmail($user->getEmail())){
                        //User found
                    } else{
                        //User not found
                        $data['emailError'] = 'No user found!';
                        $data['passwordError'] = '';
                    }
                }

                // Make sure errors are empty
                if(empty($data['emailError']) && empty($data['passwordError'])){
                    // Validated
                    // Check and login

                    //hier gaat het fout
                    $loggedInUser = $this->userDAO->login($user);
                    if($loggedInUser){
                        // Create Session

                        $this->createUserSession($loggedInUser);

                        if($_SESSION['userType'] == 1){
                            //if user is admin, not implemented yet
                            redirect('todo/home');
                        } else {
                        redirect('todo/home');
                        }
                    } else {
                        $data['passwordError'] = 'Password incorrect';
                        $data['emailError'] = 'email does not exist';
                        $data['loggedInUser'] = $loggedInUser;
                        $this->ui('pages/index', $data);
                    }

                } else {
                    // Load view with data
                    $this->ui('pages/index', $data);
                }

            } else {
                // Init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'emailError' => '',
                    'passwordError' => ''
                ];

                // Load ui
                $this->ui('pages/index', $data);
            }
        }
        public function createUserSession($loggedInUser){
            try {
                $_SESSION['user'] = new UserModel();
                $_SESSION['user'] = $loggedInUser;

            }
            catch(Exception $e) {
                die('f');
                $_SESSION['user'] = new UserModel();
                $_SESSION['user'] = $loggedInUser;

                if($_SESSION['userType'] == 1){
                    redirect('pages/register');
                } else {
                    redirect('pages/register');
                }
            }
        }

        public function logout(){
            unset($_SESSION['user']);
            session_destroy();
            redirect('pages/index');
        }

        public function isLoggedIn(){
            if(isset($_SESSION['userId'])){
                return true;
            } else {
                return false;
            }
        }

        public function forgot(){
            // Init data
            $data = [
                'title' => 'Forgot password?',
                'emailError' => ''
            ];

            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $email = trim($_POST['email']);

                // Validate email not empty
                if(empty($email)){
                    $data['emailError'] = 'Please enter email';
                }else{
                    // Check user by email
                    if($this->userDAO->findUserByEmail($email)){
                        // User found

                        // Create token
                        $token = $this->createToken($email, "forgot");

                        // Message
                        $message = "You have requested a password recovery for your account at Haarlem Festival. \n
                        Click the link below to set up a new password \n
                        " . URLROOT . "/users/newpassword?token=" . $token;                        

                        // Use wordwrap() if lines are longer than 70 characters
                        $message = wordwrap($message,70);

                        // Subject
                        $subject = "Haarlem Festival password recovery";

                        // Send email
                        mail($email, $subject, $message);

                        redirect("users/pwemailsend");

                    } else{
                        // User not found
                        $data['emailError'] = 'No user found!';
                    }
                }
            }

            // Load ui
            $this->ui('users/forgot', $data);
        }

        public function pwEmailSend(){
            // Init data
            $data = [
                'title' => 'Password recovery email has been send'
            ];

            // Load ui
            $this->ui('users/pwemailsend', $data);
        }

        public function newPassword(){
            // Sanitize the token if provided
            if(isset($_GET['token'])){
                $token = trim(filter_var($_GET['token'], FILTER_SANITIZE_STRING));
            } else {
                $token = "";
            }


            // Sanitize user input and declare password validation regex
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $passwordValidation = "/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/";

            // Init data
            $data = [
                'title' => 'Enter new password',
                'token' => $token,
                'error' => ""
            ];

            // Check for post
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                // Init POST data
                $password = trim($_POST['password']);
                $passwordConfirm = trim($_POST['passwordConfirmation']);

                // Validate Password not empty
                if(!empty($password) && !empty($passwordConfirm)){

                    // Validate if password is 6 characters or longer
                    if(strlen($password < 6)) {

                        // Validate if password matches contains the required characters
                        if(preg_match($passwordValidation, $password)) {

                            // Validate if password matches confirmation password
                            if($password == $passwordConfirm) {
                                // Hash password
                                $password = password_hash($password, PASSWORD_DEFAULT);

                                // Update password in datebase
                                $this->userDAO->newPassword($token, $password);
                                $this->tokenDAO->deleteToken($token);

                                // Redirect to login page
                                redirect("users/login");
                            } else {
                                $data['error'] = "Passwords don't match!";

                                //Load ui
                                $this->ui('users/newpassword', $data);
                            }
                        } else {
                            $data['error'] = "Invalid password";

                            //Load ui
                            $this->ui('users/newpassword', $data);
                        }
                    } else {
                        $data['error'] = "Password needs to be at leat 6 characters long";

                        //Load ui
                        $this->ui('users/newpassword', $data);
                    }
                } else {
                    $data['error'] = "Please enter a new password";

                    //Load ui
                    $this->ui('users/newpassword', $data);
                }
            } else {
                if($this->tokenHandler($token) == "forgot"){
                } else {
                    $data['title'] = "Invalid request!";

                    //Load ui
                    $this->ui('users/newpassword', $data);
                }

            }

            //Load ui
            $this->ui('users/newpassword', $data);
        }

        public function pwDone(){
            //sanitize user input and declare password validation regex
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $passwordValidation = "/^\S*(?=\S{6,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/";
            //Init data
            $data = [
                'title' => "You can now use  your new password",
            ];

            //Load ui
            $this->ui('users/pwdone', $data);
        }
    }
