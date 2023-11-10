<?php

namespace App\Controllers;

class CheckoutController
{
    public function index()
    {
        if (!isAuthentication()) {
            redirect('/login');
        }

        $UserModel = new \App\Models\UserModel();
        $CartModel = new \App\Models\CartModel();

        $user = $UserModel->getByEmail($_SESSION['email']);
        $cartList = $CartModel->getList($user['id']);

        require_once VIEWS_DIR . '/checkout/index.php';
    }

    public function create()
    {
        $UserModel = new \App\Models\UserModel();
        $CartModel =  new \App\Models\CartModel();
        $CheckoutModel = new \App\Models\CheckoutModel();

        $user = $UserModel->getByEmail($_SESSION['email']);
        $userId = $user['id'];

        $cartList = $CartModel->getList($userId);
        if (empty($cartList)) {
            JsonResponse(error: 1, message: "Giỏ hàng trống");
        }

        if (!isset($_POST['userInfo'])) {
            JsonResponse(error: 1, message: "Vui lòng nhập thông tin khách hàng");
        }
        $userCheckoutInfo = json_decode($_POST['userInfo'], true);

        if (!isset($userCheckoutInfo['name'])) {
            JsonResponse(error: 1, message: "Vui lòng nhập họ tên");
        }
        $name = htmlspecialchars($userCheckoutInfo['name']);

        if (!isset($userCheckoutInfo['address'])) {
            JsonResponse(error: 1, message: "Vui lòng nhập địa chỉ");
        }
        $address = htmlspecialchars($userCheckoutInfo['address']);

        if (!isset($userCheckoutInfo['phone'])) {
            JsonResponse(error: 1, message: "Vui lòng nhập số điện thoại");
        }
        $phone = htmlspecialchars($userCheckoutInfo['phone']);

        $UserModel->updateProfile($userId, $name, $phone, $address);

        $isSuccess = $CheckoutModel->createOrder();

        if (empty($isSuccess)) {
            JsonResponse(error: 1, message: "Có lỗi xảy ra! Vui lòng thử lại sau");
        }
        JsonResponse(error: 0, message: "Đặt hàng thành công");

        require_once VIEWS_DIR . '/checkout/index.php';
    }

    public function postOrderCancel()
    {
        if (!isset($_POST['id']) || !isset($_POST['status'])) {
            JsonResponse(error: 1, message: "Thiếu thông tin");
        }
        $id = htmlspecialchars($_POST['id']);
        $status = htmlspecialchars($_POST['status']);

        if ((int)$status !== 2) {
            JsonResponse(error: 1, message: "Không thể thực hiện");
        }

        $CheckoutModel = new \App\Models\CheckoutModel();

        $order = $CheckoutModel->getById($id);
        if (empty($order)) {
            JsonResponse(error: 1, message: "Đơn hàng không tồn tại, Vui lòng kiểm tra lại");
        }

        $isSuccess = $CheckoutModel->updateStatus($id, $status);

        if (!$isSuccess) {
            JsonResponse(error: 1, message: "Có lỗi xảy ra! vui lòng thử lại sau.");
        }

        JsonResponse(error: 0, message: "Hủy thành công");
    }
}
