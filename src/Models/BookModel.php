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

        $sql = "SELECT * FROM hinh_anh_sach WHERE id_sach=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        $imgs = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $result['imgs'] = $imgs;

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

}
