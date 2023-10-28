<?php include_once VIEWS_DIR . "/layouts/header/index.php"; ?>

<main class="container mt-5">
    <h1>User Management</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="user-list">
            <!-- User list goes here -->
        </tbody>
    </table>
</main>

<?php include_once VIEWS_DIR . "/layouts/footer/index.php"; ?>