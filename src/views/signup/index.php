<?php include_once VIEWS_DIR . "/layouts/header/index.php"; ?>

<style>
    .form-floating>label {
        transition: transform 0.2s ease-in-out;
    }

    .btn-hover-dark:hover {
        background: #000 !important;
    }

    #draggable:hover {
        cursor: move;
    }

    @keyframes transformX {
        from {
            transform: translateX(55%);
        }

        to {
            transform: translateX(0);
        }
    }

    body {
        background: url('/images/background/signup.jpg') no-repeat top center;
    }
</style>

<main class="container d-flex flex-column justify-content-center overflow-hidden" style="min-height: 100vh;">
    <div class="row mx-2 mx-md-0" style="animation: transformX 0.5s ease-out;">
        <div id="draggable" class="bg-dark text-white p-4 rounded-3 shadow-lg col col-lg-5">
            <div class="fs-2 fw-semibold text-center mb-5">Đăng ký tài khoản</div>
            <form id="signup_form" method="post" action="/signup" class="d-flex flex-column">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control shadow-none" name="email" id="email"
                        placeholder="name@example.com" autocomplete="off">
                    <label for="email" class="text-dark-emphasis">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control shadow-none" name="password" id="password"
                        placeholder="Mật khẩu">
                    <label for="password" class="text-dark-emphasis">Mật khẩu</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control shadow-none" name="confirm_password"
                        id="confirm_password" placeholder="Nhập lại mật khẩu">
                    <label for="confirm_password" class="text-dark-emphasis">Nhập lại mật khẩu</label>
                </div>

                <button type="submit" class="btn-hover-dark my-4 btn text-white fw-semibold"
                    style="background: #3aafa9;">
                    Đăng ký
                </button>
            </form>
            <p class="d-flex gap-2 py-2 mb-0 fw-bold">
                Đã có tài khoản?
                <a href="../login/" style="color: #3aafa9;">Đăng nhập</a>
            </p>
        </div>
    </div>
    <button class="fs-1 position-fixed bottom-0 end-0 border-0 bg-transparent">
        <a href="#body" style="color: #3aafa9;"><i class="fa-solid fa-circle-up"></i></a>
    </button>
</main>

<?php include_once VIEWS_DIR . "/layouts/footer/index.php"; ?>