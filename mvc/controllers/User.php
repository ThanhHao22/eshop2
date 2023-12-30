<?php
class User extends Controller
{
    private $group;
    private $user;
    public function __construct()
    {
        $this->group = $this->model('GroupUserModel');
        $this->user = $this->model('UserModel');
    }
    public function index()
    {
        $keyword = '';
        $gr_id = 0;
        if (isset($_POST['search']) && ($_POST['search'] != '')) {
            $keyword = $_POST['keyword_user'];
            $_POST['search'] = '';
            if (!empty($_POST['group'])) {
                $gr_id = $_POST['group'];
            }
        }
        $users = $this->user->getAll($keyword, 0, (int)$gr_id);
        $groups = $this->group->getAll();
        
        return $this->view("admin", [
            'page' => 'users/list',
            'users' => $users,
            'groups' => $groups,
            'js' => ['deletedata', 'search'],
            'title' => 'Người dùng'
        ]);
    }

    // Xu li chuc nang them nguoi dung va return du lieu ra view de render giao dien
    function add_user()
    {
        $msg = '';
        $type = '';
        $groups = $this->group->getAll();
        if (isset($_POST['add_user']) && ($_POST['add_user'])) {
            $name = $_POST['username'];
            $avatar = $this->processImg();
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password = password_hash($password, PASSWORD_DEFAULT);
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $group = $_POST['group'];
            $desc = $_POST['description'];

            $created_at = date('Y-m-d H:i:s');
            $users = $this->user->getAll();
            $check = 0;
            foreach ($users as $user) {
                if ($user['name'] == $name) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }
            if ($check == 1) {
                $type = 'danger';
                $msg = 'Người dùng đã tồn tại!';
            } else {
                $status = $this->user->insert($name, $avatar, $group, $email, $password, $phone, $address, $desc, $created_at);
                if ($status) {
                    $type = 'success';
                    $msg = 'Thêm người dùng thành công!';
                    $_SESSION['msg'] = $msg;
                    header('Location: ' . _WEB_ROOT_PATH . '/user/list');
                } else {
                    $type = 'danger';
                    $msg = 'Lối hệ thống!';
                }
            }
        }
        return $this->view('admin', [
            'page' => 'users/add',
            'groups' => $groups,
            'msg' => $msg,
            'type' => $type,
            'title' => 'Thêm người dùng',
            'js' => ['uploadimg']
        ]);
    }

    // Xu li cap nhat thong tin nguoi dung
    function update_user($id)
    {
        $user = $this->user->SelectUser($id);
        $groups = $this->group->getAll();
        if (isset($_POST['update_user']) && ($_POST['update_user'])) {

            $name = $_POST['username'];
            $avatar = $this->processImg();
            $email = $_POST['email'];
            $password = $_POST['password'];
            if (!empty($password)) {
                $password = password_hash($password, PASSWORD_DEFAULT);
            }
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $group = $_POST['group'];
            $desc = $_POST['description'];
            $updated_at = date('Y-m-d H:i:s');
            $users = $this->user->getAll('', $id);
            $check = 0;

            foreach ($users as $user) {
                if ($user['name'] == $name) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }
            $header = 0;
            if ($check == 1) {
                $header = 0;
                $type = 'danger';
                $msg = 'Người dùng đã tồn tại!';
            } else {
                $status = $this->user->updateUser($id, $name, $avatar, $group, $email, $password, $phone, $address, $desc, $updated_at);
                if ($status) {
                    $header = 1;
                    $type = 'success';
                    $msg = 'Cập nhật người dùng thành công!';
                } else {
                    $header = 0;
                    $type = 'danger';
                    $msg = 'Lối hệ thống!';
                }
            }

            if ($header === 0) {
                return $this->view('admin', [
                    'page' => 'users/update',
                    'user' => $user,
                    'msg' => $msg,
                    'type' => $type,
                    'js' => ['uploadimg']
                ]);
            } else {
                $_SESSION['msg'] = $msg;
                header('Location: ' . _WEB_ROOT_PATH . '/user/list_user');
                return;
            }
        }
        if (!empty($user)) {
            return $this->view('admin', [
                'page' => 'users/update',
                'title' => 'Cập nhật người dùng',
                'user' => $user,
                'groups' => $groups,
                'js' => ['uploadimg']
            ]);
        }
    }

    //Xu li xoa nguoi dung
    function delete_user($id)
    {
        $status = $this->user->deleteUser($id);
        if ($status) {
            echo -1;
        } else {
            echo -2;
        }
    }

    // Return du lieu ra view de render giao dien trang thong tin ca nhan
    function profile()
    {
        if (isset($_SESSION['user']['email'])) {
            $email = $_SESSION['user']['email'];
            $user = $this->user->SelectOneUser($email);
        }
        return $this->view('client', [
            'page' => 'profile',
            'title' => 'Thông tin cá nhân',
            'css' => ['base', 'main', 'responsive'],
            'js' => ['main', 'jquery.validate', 'form_validate'],
            'user' => $user
        ]);
    }


    // Xu li upload hinh anh
    function processImg()
    {
        if (isset($_FILES['avatar'])) {
            $date = new DateTimeImmutable();
            $fileNameArr = explode(".", $_FILES['avatar']['name']);
            $target_file = _UPLOAD_PATH . '/avt/' .  basename($date->getTimestamp() . "." . $fileNameArr[1]);

            if (move_uploaded_file($_FILES['avatar']['tmp_name'], $target_file)) {
                return $date->getTimestamp() . "." . $fileNameArr[1];
            }
        }
    }

    // Xu li cap nhat profile
    function update_profile()
    {
        if (isset($_POST['update_profile']) && ($_POST['update_profile'])) {
            $id = $_SESSION['user']['id'];
            $name = $_POST['name'];
            $avatar = $this->processImg();
            // show_array($avatar);
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $desc = $_POST['description'];
            $updated_at = date('Y-m-d H:i:s');

            $status = $this->user->updateProfile($id, $name, $avatar, $email, password_hash($password, PASSWORD_DEFAULT), $phone, $address, $desc, $updated_at);
            if (isset($_SESSION['user'])) {
                $email = $_SESSION['user']['email'];
                $_SESSION['user'] = $this->user->SelectOneUser($email);
            }
            if ($status) {
                $_SESSION['msg'] = " Cập nhật thành công!";
            } else {
                $_SESSION['msg'] = "Lỗi cập nhật!";
            }
        }
        redirectTo('user/profile');
    }
}
