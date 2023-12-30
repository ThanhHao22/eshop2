<?php
class Bill extends Controller
{
    private $bills;
    function __construct()
    {
        $this->bills = $this->model('BillModel');
    }
    public function index()
    {
        $status = -1;
        if (isset($_GET['type'])) {
            $status = $_GET['type'];
        }
        $user_id = 0;
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['id'];
        }
        $getAllBill = $this->bills->getAllBill($status, $user_id, '');
        $billNew = [];
        foreach ($getAllBill as $bill) {
            $bill['detail'] = $this->bills->getDetailBill($bill['id']);
            array_push($billNew, $bill);
        }

        if (!isset($_SESSION['user'])) {
            redirectTo();
        } else {
            return $this->view("client", [
                'page' => 'bill',
                'title' => 'Đặt hàng',
                'css' => ['base', 'main', 'responsive'],
                'js' => ['main', 'ajax'],
                'getAllBill' => $billNew,

            ]);
        }
    }

    public function bill_detail($id)
    {
        $bill = $this->bills->SelectOneBill($id);
        $bill['bill_detail'] = $this->bills->getDetailBill($id);
        // show_array($bill);
        return $this->view("client", [
            'page' => 'bill_detail',
            'title' => 'Chi tiết đơn hàng',
            'css' => ['base', 'main', 'responsive'],
            'js' => ['main', 'ajax'],
            'bill' => $bill


        ]);
    }

    public function delete_bill($id)
    {
        $bill = $this->bills->deleteBill($id);
        $status = -1;
        if (isset($_GET['type'])) {
            $status = $_GET['type'];
        }
        $user_id = 0;
        if (isset($_SESSION['user'])) {
            $user_id = $_SESSION['user']['id'];
        }
        $getAllBill = $this->bills->getAllBill($status, $user_id, '');
        $billNew = [];
        foreach ($getAllBill as $bill) {
            $bill['detail'] = $this->bills->getDetailBill($bill['id']);
            array_push($billNew, $bill);
        }

        if (!isset($_SESSION['user'])) {
            redirectTo();
        } else {
            return $this->view("client", [
                'page' => 'bill',
                'title' => 'Đặt hàng',
                'css' => ['base', 'main', 'responsive'],
                'js' => ['main', 'ajax'],
                'getAllBill' => $billNew,

            ]);
        }
    }

    // Render giao dien don hang
    public function show_bill()
    {
        $user_id = 0;

        $keyword = '';
        $status = -1;
        $formattedDate ='';
        $formattedDate1 ='';
        if (isset($_POST['status'])) {
            $status = $_POST['status'];
        }
        if (isset($_POST['keyword_bill'])) {
            $keyword = $_POST['keyword_bill'];
        }
        if(isset($_POST['from']) && isset($_POST['to'])){
            $from = $_POST['from'];
            $formattedDate = date("Y-m-d H:i:s", strtotime($from));
            $to = $_POST['to'];
            $formattedDate1 = date("Y-m-d H:i:s", strtotime($to));
            $getAllTotal=$this->bills->getAllTotal($from,$to);
        }else{
            $getAllTotal['total']='';
        }
        $getAllBill = $this->bills->getAllBill($status, $user_id, $keyword,$formattedDate,$formattedDate1);
        $billsNew = [];
        foreach ($getAllBill as $bill) {
            $bill['detail'] = $this->bills->getDetailBill($bill['id']);
            array_push($billsNew, $bill);
        }

        return $this->view("admin", [
            'page' => 'bill/list',
            'title' => 'Đơn hàng',
            'js' => ['deletedata', 'search', ],
            'billsNew' => $billsNew,
            'getAllTotal' => $getAllTotal['total']
        ]);
    }

    public function bill_detail_admin($idBill) {
        $bill = $this->bills->SelectOneBill($idBill);
        $bill['bill_detail'] = $this->bills->getDetailBill($idBill);
        return $this->view("admin", [
            'page' => 'bill/detail',
            'title' => 'Chi tiết đơn hàng',
            'js' => ['deletedata', 'search'],
            'bill' => $bill


        ]);
    }


    //Xu li them don hang
    public function add_bill()
    {
        if (isset($_POST['add_bill']) && ($_POST['add_bill']) != "") {
            $fullname = $_POST['fullname'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $note = $_POST['note'];
            $total = $_POST['total'];
            $method = $_POST['method'];


            if (isset($_SESSION['user'])) {
                $user_id = $_SESSION['user']['id'];
            } else $user_id = 0;
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $created_at = date("Y-m-d H:i:s");

            $idBill = $this->bills->insertBill($fullname, $phone, $email, $address, $note, $total, $method, $user_id, $created_at);

            if ($idBill) {
                foreach ($_SESSION['cart'] as $item) {
                    if (isset($item['id']) && $item['id']) {

                        $this->bills->insertDetailBill($item['id'], $item['image'], $item['name'], $item['promotion'] > 0 ? $item['price'] - $item['promotion'] * $item['price'] / 100 : $item['price'], $item['number'],  $item['total'], $idBill, $created_at);
                    }
                }
                unset($_SESSION['cart']);
                redirectTo('bill/bill_detail/' . $idBill);
            }
        }
    }

    //Xu li cap nhat don hang
    function update_bill($id)
    {
        $bill = $this->bills->SelectOneBill($id);
        if (!empty($bill)) {
            $updated_at = ('Y-m-d H:i:s');
            $this->bills->editStatus($id, (int)$bill['status'] + 1, $updated_at);
            header('Location:' . _WEB_ROOT_PATH . '/bill/show_bill');
        }
    }

    function rate_bill($id){
            $check=false;
        if(isset($_POST['rate_btn1'])){
            $rate_bill=$this->bills->rate_bill($_SESSION['user']['id'],$id,$_POST['floatingTextarea2'],$_POST['exampleCheck1']);
            $check=true;
        }
        if($check){
            header('Location:' . _WEB_ROOT_PATH . '/bill');
        }
        if (!isset($_SESSION['user'])) {
            redirectTo();
        } else {
            return $this->view("client", [
                'page' => 'rate_bill',
                'title' => 'Đánh giá',
                'css' => ['base', 'main', 'responsive'],
                'js' => ['main', 'ajax'],

            ]);
        }
    }
    // function delete_bill($id)
    // {
    //     $status = $this->bills->deleteBill($id);
    //     if ($status) {
    //         echo -1;
    //     } else {
    //         echo -2;
    //     }
    // }
}
