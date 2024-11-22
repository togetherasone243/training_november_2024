<?php
$title = "Login";
ob_start();
?>
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card p-4 shadow" style="width: 300px;">
        <h3 class="text-center mb-4">Login</h3>
        <?php if (isset($_GET['error']) && $_GET['error'] == 1): ?>
            <div class="alert alert-danger text-center">
                Nom d'utilisateur ou mot de passe incorrect.
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['logout']) && $_GET['logout'] == 1): ?>
            <div class="alert alert-warning text-center">
                Vous vous êtes déconnecté du système. Au plaisir de vous revoir.
            </div>
        <?php endif; ?>
        <form action="/login_process" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Nom utilisateur</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>
<?php
$home_page = ob_get_clean();
include 'layout.php';
?>
