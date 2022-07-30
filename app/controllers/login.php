<?php
class Login extends Controller
{

    public function index()
    {
        if (isset($_POST['action']) && $_POST['action'] == 'Login') {
            $username = $_POST['username'];
            $pwdChecksum = password_hash($_POST['password'], PASSWORD_DEFAULT);

            LoginCore::login($username, $pwdChecksum);
            header('location:/Users/');
        } else {
            $this->view('Login/index');
        }
    }


    public function signup()
    {
        $user = $this->model('users');
        if (
            isset($_POST['action']) && $_POST['action'] == 'Register'
            && $_POST['password'] == $_POST['confirm-password']
        ) {
            $user->username = $_POST['username'];
            $user->firstName = $_POST['firstName'];
            $user->lastName = $_POST['lastName'];
            $user->citizenship = $_POST['citizenship'];
            $user->email = $_POST['email'];
            $user->phone = $_POST['phone'];
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->insert();


            header('location:/Login');
        } else {
            $this->view('Login/signup');
        }
    }


    public function logout()
    {
        LoginCore::logout();
        header('location:/Login');
    }
}
