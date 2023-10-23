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
            transform: translateX(-55%);
        }

        to {
            transform: translateX(0);
        }
    }

    body {
        background: url('/images/background/forgot-pass.jpg');
    }
</style>

<main class="container d-flex flex-column justify-content-center overflow-hidden" style="min-height: 100vh;">
    <div class="d-flex justify-content-end mx-2 mx-md-0" style="animation: transformX 0.5s ease-out;">
        <div id="draggable" class="bg-dark text-white p-4 rounded-3 shadow-lg col col-lg-5" style="width: 35%;">
            <div class="fs-2 fw-semibold text-center mb-5">Quên mật khẩu</div>

            <form id="forgot_pass_form" class="d-flex flex-column">
                <div class="form-floating mb-3">
                    <input type="email" class="form-control shadow-none" id="email" name="email" placeholder="name@example.com" autocomplete="off">
                    <label for="email" class="text-dark-emphasis">Email</label>
                </div>

                <button type="submit" class="btn-hover-dark mb-4 btn text-white fw-semibold" style="background: #3aafa9;">
                    Tìm mật khẩu
                </button>
            </form>

            <p class="d-flex py-2 gap-2 mb-0 fw-bold">
                <a href="../login/" class="text-decoration-none" style="color: #3aafa9;">Trở lại đăng
                    nhập</a>
            </p>
        </div>
    </div>
    <button class="fs-1 position-fixed bottom-0 end-0 border-0 bg-transparent">
        <a href="#body" style="color: #3aafa9;"><i class="fa-solid fa-circle-up"></i></a>
    </button>
</main>

<?php include_once VIEWS_DIR . "/layouts/footer/index.php"; ?>