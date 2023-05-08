<?php
session_start();
require_once('../../private/initialize.php');


$emailErr = $passwordErr = "";
$email = $password = "";
$incorrectInfo = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //sanitize and check email format
    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
    } else {
        $email = check_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    //check password
    if (empty($_POST['password'])) {
        $passwordErr = "Password is required";
    } else {
        $password = $_POST["password"];
    }

    if ($user = User::verify_user($email, $password)) {
        $_SESSION['main_author'] = "Layal is logged in";
        redirect_to('index.php');

        // if($user->verify_password($password)){
        // $_SESSION['main_author'] ="Layal is logged in";
        //  redirect_to('index.php');
        //  }
    } else {
        $incorrectInfo = "Incorrect Email or password";
    }
}
?>
<section class="login-frame">

    <h3 class="login-title">LogIn</h3>
    <img src="../../public/images/login-profile.PNG" class="login-profile">

    <form action="login.php" method="post">
        <input type="text" name="email" placeholder="Email" required="">
        <span class="error">
            <?php echo $emailErr; ?>
        </span>

        <input type="password" name="password" placeholder="Password" required="">
        <span class="error">
            <?php echo $passwordErr; ?>
        </span>

        <input type="submit" name="submit" value="login" class="button">

        <div class="error">
            <?= $incorrectInfo; ?>
        </div>

    </form>
</section>
<?php include SHARED_PATH . '/footer.php'; ?>