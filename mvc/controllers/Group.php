<?php
class Group extends Controller
{
    private $group;
    public function __construct()
    {
        $this->group = $this->model('GroupUserModel');
    }

    public function index()
    {
        $keyword = '';
        if (isset($_POST['search']) && ($_POST['search'] != '')) {
            $keyword = $_POST['keyword_group'];
            $_POST['search'] = '';
        }
        $groups = $this->group->getAll($keyword);
        return $this->view("admin", [
            'page' => 'groups/list',
            'groups' => $groups,
            'js' => ['deletedata', 'search'],
            'title' => 'Nhóm người dùng'
        ]);
    }

    // Xu li them nhom nguoi dung va return ra view
    function add_group()
    {
        $msg = '';
        $type = '';
        if (isset($_POST['add_group']) && ($_POST['add_group'])) {
            $name = $_POST['groupname'];
            $created_at = date('Y-m-d H:i:s');
            $groups = $this->group->getAll();
            $check = 0;
            foreach ($groups as $group) {
                if ($group['name'] == $name) {
                    $check = 1;
                    break;
                } else {
                    $check = 0;
                }
            }

            if ($check == 1) {
                $type = 'danger';
                $msg = 'Tên nhóm người dùng đã tồn tại!';
            } else {
                $status = $this->group->insertGroup($name, $created_at);
                if ($status) {
                    $type = 'success';
                    $msg = 'Thêm nhóm người dùng thành công!';
                    $_SESSION['msg'] = $msg;
                    header('Location: ' . _WEB_ROOT_PATH . '/group');
                } else {
                    $type = 'danger';
                    $msg = 'Lối hệ thống!';
                }
            }
        }
        return $this->view('admin', [
            'page' => 'groups/add',
            'title' => 'Thêm nhóm người dùng',
            'msg' => $msg,
            'type' => $type
        ]);
    }

    // Xu li xoa nhom nguoi dung
    function delete_group($id)
    {

        $status = $this->group->deleteGroup($id);
        if ($status) {
            echo -1;
        } else {
            echo -2;
        }
    }

    // Xu li cap nhat nhom nguoi dung
    function update_group($id)
    {
        $group = $this->group->SelectOneGroup($id);
        if (isset($_POST['update_group']) && ($_POST['update_group'])) {
            $name = $_POST['groupname'];
            $updated_at = date('Y-m-d H:i:s');
            $groups = $this->group->getAll();
            $check = 0;
            foreach ($groups as $group) {
                if ($group['name'] == $name) {
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
                $msg = 'Tên nhóm người dùng đã tồn tại';
            } else {
                $status = $this->group->updateGroup($id, $name, $updated_at);
                if ($status) {
                    $header = 1;
                    $type = 'success';
                    $msg = 'Cập nhật nhóm người dùng thành công!';
                } else {
                    $header = 0;
                    $type = 'danger';
                    $msg = 'Lối hệ thống!';
                }
            }

            if ($header === 0) {
                return $this->view('admin', [
                    'page' => 'groups/update',
                    'title' => 'Cập nhật nhóm người dùng',
                    'group' => $group,
                    'msg' => $msg,
                    'type' => $type
                ]);
            } else {
                $_SESSION['msg'] = $msg;
                header('Location: ' . _WEB_ROOT_PATH . '/group');
                return;
            }
        }
        if (!empty($group)) {
            return $this->view('admin', [
                'page' => 'groups/update',
                'title' => 'Cập nhật nhóm người dùng',
                'group' => $group,
            ]);
        }
    }
}
