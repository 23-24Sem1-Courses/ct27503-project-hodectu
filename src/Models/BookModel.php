<?php

namespace App\Models;

use PDO;

class BookModel
{
    public function getAll()
    {
        include SRC_DIR . '/config.php';
        $sql = "select * from sach";
        $ketqua = $conn->prepare($sql);
        $ketqua->execute();
        $ketqua = $ketqua->fetchAll(PDO::FETCH_ASSOC);

        return $ketqua;
    }

    public function getById($id)
    {
        include SRC_DIR . '/config.php';

        $sql = "SELECT * FROM sach WHERE id=?";
        $stmt = $conn->prepare($sql);

        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getAllByAuthor($tac_gia)
    {
        include SRC_DIR . '/config.php';
        $sql = "select * from sach where tac_gia=?";
        $ketqua = $conn->prepare($sql);
        $ketqua->execute([$tac_gia]);
        $ketqua = $ketqua->fetchAll(PDO::FETCH_ASSOC);

        return $ketqua;
    }

    public function create($book)
    {
        include SRC_DIR . '/config.php';
        $sql = "INSERT INTO sach(ten_sach, gia_goc, gia_sale, anh_bia, tac_gia, mo_ta) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$book['name'], $book['price'], $book['sale'], BASE_URL . '/uploads/' . $book['img'], $book['author'], $book['description']]);

        $id = (int)$conn->lastInsertId();
        if ($stmt->rowCount() === 1) {
            foreach ($book['imgs'] as $img) {
                $sql = "INSERT INTO hinh_anh_sach(id_sach, hinh_anh) VALUES(?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$id, BASE_URL . '/uploads/' . $img]);
            }
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        include SRC_DIR . '/config.php';
        $sql = "DELETE FROM sach WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        if ($stmt->rowCount() !== 1) {
            return false;
        }

        $sql = "DELETE FROM hinh_anh_sach WHERE id_sach = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);

        return  $stmt->rowCount() === 1;
    }
}
