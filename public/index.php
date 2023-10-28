<?php

define('SRC_DIR', __DIR__ . '/../src');
define('VIEWS_DIR', __DIR__ . '/../src/views');

require_once SRC_DIR . '/bootstrap.php';

$router = new \Bramus\Router\Router();
$random = new \PragmaRX\Random\Random();

$router->get('/', function () {
    require_once VIEWS_DIR . '/home/index.php';
});

$router->get('/login', function () {
    require_once VIEWS_DIR . '/login/index.php';
});

$router->post('/login', function () {
    require_once SRC_DIR . '/config.php';

    if (isset($_SESSION['email'])) {
        echo json_encode([
            "error" => 0,
            "message" => "Đăng nhập thành công"
        ]);
        return;
    }

    if (!isset($_POST['email'])) {
        echo json_encode([
            "error" => 1,
            "message" => "Vui lòng nhập email"
        ]);
        return;
    }
    $email = htmlspecialchars($_POST['email']) ?? htmlspecialchars($_POST['email']);

    if (!isset($_POST['password'])) {
        echo json_encode([
            "error" => 1,
            "message" => "Vui lòng nhập mật khẩu"
        ]);
        return;
    }
    $password = htmlspecialchars($_POST['password']) ?? htmlspecialchars($_POST['password']);
    $password = md5($password);

    $sql = "SELECT * FROM khach_hang WHERE email=? AND mat_khau=? LIMIT 1";
    $ketqua = $conn->prepare($sql);
    $ketqua->execute([$email, $password]);
    $ketqua = $ketqua->fetch(PDO::FETCH_ASSOC);

    if ($ketqua) {
        $_SESSION['email'] = $ketqua['email'];
        // $_SESSION['makh'] = $ketqua['makh'];
        echo json_encode([
            "error" => 0,
            "message" => "Đăng nhập thành công"
        ]);
        return;
    }
    echo json_encode([
        "error" => 1,
        "message" => "Email hoặc mật khẩu không chính xác"
    ]);
    return;
});

$router->get('/signup', function () {
    require_once VIEWS_DIR . '/signup/index.php';
});

$router->post('/signup', function () {
    require_once SRC_DIR . '/config.php';

    if (!isset($_POST['email'])) {
        echo json_encode([
            "error" => 1,
            "message" => "Vui lòng nhập email"
        ]);
        return;
    }
    $email = htmlspecialchars($_POST['email']) ?? htmlspecialchars($_POST['email']);

    $sql = "SELECT * FROM khach_hang WHERE email = ?";
    $ton_tai = $conn->prepare($sql);
    $ton_tai->execute([$email]);
    $ton_tai = $ton_tai->fetch(PDO::FETCH_ASSOC);

    if ($ton_tai) {
        echo json_encode([
            "error" => 1,
            "message" => "Email đã được sử dụng!"
        ]);
        return;
    }

    if (!isset($_POST['password'])) return "Vui lòng nhập mật khẩu";
    $password = htmlspecialchars($_POST['password']) ?? htmlspecialchars($_POST['password']);
    $password = md5($password);

    $sql = "INSERT INTO khach_hang(email, mat_khau) VALUE(?,?)";
    $ketqua = $conn->prepare($sql);
    $ketqua->execute([$email, $password]);

    if ($ketqua->rowCount()) {
        echo json_encode([
            "error" => 0,
            "message" => "Đăng ký thành công!"
        ]);
        return;
    }

    echo json_encode([
        "error" => 1,
        "message" => "Lỗi server"
    ]);
    return;
});

$router->post('/logout', function () {
    require_once SRC_DIR . '/config.php';
    session_destroy();
    redirect('/login');
});

$router->get('/forgot-pass', function () {
    require_once VIEWS_DIR . '/forgotPass/index.php';
});

$router->post('/forgot-pass', function () {
    require_once SRC_DIR . '/config.php';

    global $random;

    if (!isset($_POST['email'])) {
        echo json_encode([
            "error" => 1,
            "message" => "Vui lòng nhập email"
        ]);
        return;
    }
    $email = htmlspecialchars($_POST['email']) ?? htmlspecialchars($_POST['email']);

    $sql = "SELECT id FROM khach_hang WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);
    $khach_hang = $stmt->fetch(PDO::FETCH_ASSOC);

    if (empty($khach_hang['id'])) {
        echo json_encode([
            "error" => 1,
            "message" => "Email Không tồn tại!"
        ]);
        return;
    }

    $newPass = $random->alpha()->size(8)->get();
    $hash = md5($newPass);

    $sql = "UPDATE khach_hang SET mat_khau = ? WHERE email = ?";
    $update = $conn->prepare($sql);
    $update->execute([$hash, $email]);

    echo json_encode([
        "error" => 0,
        "message" => "Mật khẩu mới: $newPass",
    ]);
    return;
});

$router->get('/cart', function () {
    require_once VIEWS_DIR . '/cart/index.php';
});

$router->get('/products/detail', function () {
    require_once VIEWS_DIR . '/product/index.php';
});

$router->get('/admin', function () {
    require_once VIEWS_DIR . '/admin/index.php';
});

$router->run();
