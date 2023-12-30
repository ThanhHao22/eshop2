<?php
class Auth extends Controller
{
    // Render ra giao dien dang nhap
    public function login()
    {
        $this->view("client", [
            'title' => 'Đăng nhập',
            'page' => 'login',
            'css' => ['base', 'main', 'responsive', 'account'],
            'js' => ['main', 'jquery.validate', 'form_validate']
        ]);
    }

    // Render ra giao dien dang ky
    public function register()
    {
        $this->view("client", [
            'title' => 'Đăng ký',
            'page' => 'register',
            'css' => ['base', 'main', 'responsive', 'account'],
            'js' => ['main', 'jquery.validate', 'form_validate']
        ]);
    }

    private $users;
    public function __construct()
    {
        $this->users = $this->model('UserModel');
    }

    //Xu li dang ky
    function handleRegister()
    {

        if (isset($_POST['register']) && $_POST['register'] != '') {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $name = $firstname . ' ' . $lastname;
            $email = $_POST['email'];
            $password = $_POST['password'];
            $create_at = date('Y-m-d H:i:s');
            $users = $this->users->getAll();
            $checkEmail = false;
            $message = '';
            if (!empty($users)) {
                foreach ($users as $user) {
                    if ($user['email'] == $email) {
                        $checkEmail = true;
                        break;
                    }
                }
            } else {
                $checkEmail = false;
            }
            $checkLogin = false;
            if ($checkEmail) {
                $message = 'Email đã tồn tại!';
                $checkLogin = false;
                $_SESSION['msg'] = $message;
            } else {
                $password = password_hash($password, PASSWORD_DEFAULT);
                $status = $this->users->InsertUser($name, $email, $password, $create_at);
                if ($status) {
                    $checkLogin = true;

                    $message = 'Đăng ký tài khoản thành công!';
                } else {
                    $message = 'Đã xảy ra sự cố với hệ thống, vui lòng thử lại sau!';
                    $checkLogin = false;
                }
            }


            if ($checkLogin) {
                $_SESSION['msg'] = $message;
                header('Location: ' . _WEB_ROOT_PATH . '/Auth/login');
            } else {

                header('Location: ' . _WEB_ROOT_PATH . '/Auth/register');
            }
        }
    }

    //Xu li dang nhap
    function handleLogin()
    {
        if (isset($_POST['login']) && $_POST['login']) {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->users->SelectOneUser($email);
            // $message = '';

            if (!empty($user)) {
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user'] = $user;
                    if ((int)$user['gr_id'] == 1) {
                        header('Location: ' . _WEB_ROOT_PATH . '/admin');
                    } else {
                        header('Location: ' . _WEB_ROOT_PATH . '/home');
                    }
                } else {
                    $_SESSION['msglg'] = 'Mật khẩu không chính xác';
                    $_SESSION['typelg'] = 'danger';

                    header('Location: ' . _WEB_ROOT_PATH . '/Auth/login');
                }
            } else {
                $_SESSION['msglg'] = 'Email không chính xác';
                $_SESSION['typelg'] = 'danger';

                header('Location: ' . _WEB_ROOT_PATH . '/Auth/login');
            }
        }
    }

    //Xu li dang xuat
    function logout()
    {
        unset($_SESSION['user']);
        header('Location: ' . _WEB_ROOT_PATH);
    }
}
