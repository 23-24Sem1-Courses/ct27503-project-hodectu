<?php

namespace App\Controllers;

class ProfileController
{
    public function index()
    {
        try {
            if (!isAuthentication()) {
                redirect('/login');
            }
            $UserModel = new \App\Models\UserModel();
            $user = $UserModel->getByEmail($_SESSION['email']);

            $title = 'Thông Tin Tài Khoản';
            require_once VIEWS_DIR . '/user/index.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function postEditProfile()
    {
        $UserModel = new \App\Models\UserModel();

        $profile = json_decode($_POST['profile'], true);

        $id = isset($profile['id']) ? htmlspecialchars($profile['id']) : '';
        if (empty($id)) {
            JsonResponse(error: 1, message: "Có lỗi xảy ra! vui lòng thử lại sauas");
        }

        $name = isset($profile['name']) ? htmlspecialchars($profile['name']) : '';
        $phone = isset($profile['phone']) ? htmlspecialchars($profile['phone']) : '';
        $address = isset($profile['address']) ? htmlspecialchars($profile['address']) : '';

        $UserModel->updateProfile($id, $name, $phone, $address);

        JsonResponse(error: 0, message: "Cập nhật thông tin thành công");
    }

    public function postUpdateAvatar()
    {
        try {
            $UserModel = new \App\Models\UserModel();
            $user = $UserModel->getByEmail($_SESSION['email']);

            $avatar = handle_img_upload('avatar');
            if (empty($avatar)) {
                JsonResponse(error: 1, message: "Có lỗi xảy ra! vui lòng thử lại sau");
            }

            $fileName = extractFileNameFromUrl($user['avatar']);
            if (!str_contains($fileName, 'default.jpg')) {
                remove_img_file($fileName);
            }

            $isSuccess = $UserModel->updateAvatar($user['id'], $avatar);
            if (empty($isSuccess)) {
                JsonResponse(error: 1, message: "Có lỗi xảy ra! vui lòng thử lại sau");
            }

            JsonResponse(error: 0, message: "Cập nhật ảnh dại diện thành công");
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getChangePassword()
    {
        try {
            if (!isAuthentication()) {
                redirect('/login');
            }
            $UserModel = new \App\Models\UserModel();
            $user = $UserModel->getByEmail($_SESSION['email']);

            $title = 'Đổi Mật Khẩu';
            require_once VIEWS_DIR . '/user/password/index.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function postChangePassword()
    {
        try {
            require_once SRC_DIR . '/config.php';
            $UserModel = new \App\Models\UserModel();

            if (!isset($_POST['old_password'])) {
                JsonResponse(error: 1, message: "Vui lòng nhập mật khẩu cũ");
            }
            $old_password = htmlspecialchars($_POST['old_password']);

            if (!isset($_POST['new_password'])) {
                JsonResponse(error: 1, message: "Vui lòng nhập mật khẩu mới");
            }
            $new_password = htmlspecialchars($_POST['new_password']);

            $email = $_SESSION['email'];
            $user = $UserModel->getInfo($email, $old_password);
            if (empty($user)) {
                JsonResponse(error: 1, message: "Mật khẩu cũ không chính xác");
            }

            $user = $UserModel->updatePass($email, $new_password);

            JsonResponse(error: 0, message: "Đổi mật khẩu thành công");
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getPurchase()
    {
        try {
            if (!isAuthentication()) {
                redirect('/login');
            }
            $UserModel = new \App\Models\UserModel();
            $user = $UserModel->getByEmail($_SESSION['email']);

            $title = 'Đơn mua';
            require_once VIEWS_DIR . '/user/purchase/index.php';
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function postPurchase()
    {
        try {
            if (!isAuthentication()) {
                JsonResponse(error: 1, message: "Vui lòng đăng nhập để tiếp tục");
            }

            $CheckoutModel = new \App\Models\CheckoutModel();
            $UserModel = new \App\Models\UserModel();

            $user = $UserModel->getByEmail($_SESSION["email"]);
            $userId = $user['id'];

            if (!isset($_POST['status'])) {
                JsonResponse(error: 1, message: "Có lỗi xảy ra! Vui lòng thử lại");
            }

            $status = htmlspecialchars($_POST['status']);
            if ((int)$status === 3) {
                $orders = $CheckoutModel->getAllOrder($userId);
                echo json_encode($orders);
                exit;
            }

            $orders = $CheckoutModel->getOrderByStatus($userId, $status);
            echo json_encode($orders);
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}
