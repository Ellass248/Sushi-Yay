<?php
require_once "config/database.php";
require_once "includes/functions.php";

$base =""; #tanpa spasi
$page_title = "Login"; #nama title web
$error ="";

if($_SERVER['REQUEST_METHOD']==='POST'){
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email= :email");
    $stmt->execute(['email'=> $email]);
    $user = $stmt->fecth(PDO::FETCH_ASSOC);

    if($user && password_verify($password,$user['passwprd'])){


        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['role'] = $user['role'];

        header("location : index.php");
        exit;
    }else{
        $error = "wrong email & password.";

    }
}
?>

<section class="auth-page">
    <div class="auth-box">
        <h2> Login </h2>

        <?php if ($error): ?>
            <p class="alert-error"><?=htmlspecialchars($error)?></p>
        
        <?php endif;?>
        <form method="POST" action="login.php">
            <label> Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <button type="submit" class="btn-login"> Login </button>

        </form>

        <p>haven't account? <a href="register.php"> Register here</a></p>
    </div>
</section>

<?php require "includes/footer.php"; ?>