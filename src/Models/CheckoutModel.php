<?php

namespace App\Models;

use PDO;

class CheckoutModel
{
    public function createOrder()
    {
        include SRC_DIR . '/config.php';
        $UserModel = new \App\Models\UserModel();
        $CartModel = new \App\Models\CartModel();

        $user = $UserModel->getByEmail($_SESSION['email']);
        $userId = $user['id'];

        $sql = "INSERT INTO don_hang(id_kh, dia_chi) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$userId, $user['dia_chi']]);

        $orderId = (int) $conn->lastInsertId();
        if ($stmt->rowCount() === 1) {
            $cartList = $CartModel->getList($userId);

            foreach ($cartList as $cartItem) {
                $bookId = $cartItem['id_sach'];

                $result = $this->createOrderDetail($orderId, $bookId, quantity: $cartItem['so_luong'], price: $cartItem['gia_sale']);
                if (!empty($result)) {
                    $CartModel->delete($userId, $bookId);
                }
            }

            $this->updateTotalPrice($orderId);

            return true;
        }

        return false;
    }

    private function createOrderDetail($orderId, $bookId, $quantity, $price)
    {
        include SRC_DIR . '/config.php';
        $sql = "INSERT INTO chi_tiet_don_hang(id_don_hang, id_sach, so_luong, gia) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$orderId, $bookId, $quantity, $price]);
        return $stmt->rowCount() === 1;
    }

    private function updateTotalPrice($orderId)
    {
        include SRC_DIR . '/config.php';
        $sql = "UPDATE don_hang 
        SET tong_tien = (
            SELECT sum(gia * so_luong)
            FROM chi_tiet_don_hang
            GROUP BY id_don_hang
            HAVING id_don_hang = ?
        ) 
        WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$orderId, $orderId]);
        return $stmt->rowCount() === 1;
    }
}
