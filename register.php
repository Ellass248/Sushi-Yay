<?php
require_once "config/database.php";
require_once "includes/functions.php";

$base =""; #tanpa spasi
$page_title = "Register"; #nama title web
$error ="";
$succes ="";

if($_SERVER['REQUEST_METHOD']==='POST'){
    $nama = trim($_POST['nama'])
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirm_password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email= :email");
    $stmt->execute(['email'=> $email]);

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
        <h2> Register </h2>

        <?php if ($success): ?>
            <p class="alert-error"><?=htmlspecialchars($success)?></p>
        
        <?php endif;?>
        <form method="POST" action="register.php">
            <label> Nama</label>
            <input type="text" name="nama" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Create Password</label>
            <input type="password" name="password" required>

            <label>Confirm Password</label>
            <input type="password" name="confirm_password" required>


            <button type="submit" class="btn-login"> Login </button>

        </form>

        <p>haven't account? <a href="login.php"> Login now</a></p>
    </div>
</section>

<?php require "includes/footer.php"; ?>