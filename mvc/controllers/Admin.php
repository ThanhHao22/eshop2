<?php
class Admin extends Controller
{

    private $users;
    private $products;
    private $categories;
    private $bills;
    public function __construct()
    {
        $this->users = $this->model('UserModel');
        $this->products = $this->model('ProductModel');
        $this->categories = $this->model('CategoryModel');
        $this->bills = $this->model('BillModel');
    }

    public function index()
    {
        $countAdmin = count($this->users->getAll('', 0, 1));
        $countUser = count($this->users->getAll('', 0, 2));
        $countCate = count($this->categories->getAllCl());
        $countPro = count($this->products->getAll());
        $countBill = count($this->bills->getAllBill());
        $sum_bill = $this->bills->sum_bill();
        $bestSeller = $this->bills->bestSeller();
        // show_array($bestSeller);
        $users = $this->users->getAll('', 0, 0);
        return $this->view("admin", [
            'page' => 'dashboard/list',
            'title' => 'Thống kê',
            'users' => $users,
            'countAdmin' => $countAdmin,
            'countUser' => $countUser,
            'countCate' => $countCate,
            'countPro' => $countPro,
            'countBill' => $countBill,
            'sum_bill' => $sum_bill,
            'bestSeller' => $bestSeller
        ]);
    }
}
