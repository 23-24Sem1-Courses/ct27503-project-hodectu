<?php

namespace App\Controllers;

class ProfileController
{
    public function index()
    {
        require_once VIEWS_DIR . '/user/profile/index.php';
    }
    public function getChangePassword()
    {
        require_once VIEWS_DIR . '/user/password/index.php';
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
}
