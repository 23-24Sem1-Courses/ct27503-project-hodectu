<?php

define('SRC_DIR', __DIR__ . '/../src');
define('VIEWS_DIR', __DIR__ . '/../src/views');

require_once SRC_DIR . '/bootstrap.php';

$router = new \Bramus\Router\Router();

$router->get('/', function () {
    require_once VIEWS_DIR . '/home/index.php';
});

$router->get('/login', function () {
    require_once VIEWS_DIR . '/login/index.php';
});

$router->post('/login', function () {
    require_once SRC_DIR . '/config.php';
    $email = $_POST['email'];
    $matkhau = md5($_POST['password']);
    $sql = "SELECT * FROM khach_hang WHERE email=? AND mat_khau=? LIMIT 1";
    $ketqua = $conn->prepare($sql);
    $ketqua->execute([$email, $matkhau]);

    $ketqua = $ketqua->fetch(PDO::FETCH_ASSOC);

    if ($ketqua) {
        $_SESSION['email'] = $ketqua['email'];
        $_SESSION['makh'] = $ketqua['makh'];
        redirect('/');
    } else {
        echo '<script language="javascript">';
        echo 'alert("Tài khoản hoặc mật khẩu không đúng")';
        echo '</script>';
        redirect('/login');
    }
});

$router->get('/signup', function () {
    require_once VIEWS_DIR . '/signup/index.php';
});

$router->post('/signup', function () {
    require_once SRC_DIR . '/config.php';
    $email = $_POST['email'];
    $matkhau = md5($_POST['password']);
    $sql = "INSERT INTO khach_hang(email, mat_khau) VALUE(?,?)";
    $ketqua = $conn->prepare($sql);
    $ketqua->execute([$email, $matkhau]);
    if ($ketqua->rowCount()) {
        redirect('/login');
    }
});

$router->post('/logout', function () {
    require_once SRC_DIR . '/config.php';
    session_destroy();
    redirect('/login');
});

$router->get('/forgot-pass', function () {
    require_once VIEWS_DIR . '/forgotPass/index.php';
});

$router->get('/cart', function () {
    require_once VIEWS_DIR . '/cart/index.php';
});

$router->get('/cart/quantity', function () {
    require_once SRC_DIR . '/config.php';
    if (isset($_SESSION['email'])) {
        $sql = "SELECT count(*) as soluongsach FROM gio_hang where id_kh=? GROUP BY id_kh";
        $ketuqa = $conn->prepare($sql);
        $makh = $_SESSION["makh"];
        $ketuqa->execute([$makh]);
        if ($ketuqa->rowCount()) {
            $ketuqa = $ketuqa->fetch(PDO::FETCH_ASSOC);
            return $ketuqa['soluongsach'];
        }
    }
    return 0;
});

$router->get('/products/detail', function () {
    require_once VIEWS_DIR . '/product/index.php';
});

$router->run();
