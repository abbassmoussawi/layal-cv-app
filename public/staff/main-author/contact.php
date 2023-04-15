<?php
session_start();
require_once('../../../private/initialize.php');

$sent = true;
$fullNameErr = $subjectErr = $emailErr = $phoneNumErr = $messageErr= $mailMsg = "";
$fullName = $subject = $email = $phoneNumber = $message="";

if (isset($_POST['mail']) && $sent =true) {

    $to_email= "a.moussawi.993@gmail.com";

    $fullName = $info['fullName']= $_POST['fullName'];
    $subject = $info['subject']= $_POST['subject'];
    $email = $info['fromEmail']= $_POST['fromEmail'];
    $headers ='From: '. $email;
    $phoneNumber = $info['phoneNumber']= $_POST['phoneNumber'];
    $message = $info['message']= $_POST['message'];

            //sanitize and check full name info
            if (empty($_POST['fullName'])) {
            $fullNameErr = "Full name is required";
            $sent = false;
            
            } else {
            $fullName = htmlentities($_POST["fullName"]);
            }

            //sanitize and check subject info
            if (empty($_POST['subject'])) {
            $subjectErr = "Subject is required";
            $sent = false;

            } else {
            $subject = htmlentities($_POST["subject"]);
            }
            
            //sanitize and check email
            if (empty($_POST['fromEmail'])) {
            $emailErr = "Email is required";
            $sent = false;

            } else {
            $email = check_input($_POST["fromEmail"]);

            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $emailErr = "Invalid email format";
             $sent = false;
            }
            }

            //check if phone number is well-formed
            if (empty($_POST['phoneNumber'])) {
            $phoneNumErr = "Phone number is required";
            $sent = false;

            } else {
                    $phoneNumber = check_input($_POST['phoneNumber']);
            if(!filter_var($phoneNumber, FILTER_SANITIZE_NUMBER_INT)){
                $emailErr = "Invalid Phone number format";
                $sent = false;
            };
            }

            //sanitize and check message body
            if (empty($_POST['message'])) {
            $messageErr = "Message is required";
            $sent = false;

            } else {
            $message = htmlentities($_POST["message"]);
            }

            //$messageDetails contains the most important data of sender(user)
            $messageDetails = $fullName ."\r\n".$email."\r\n".$phoneNumber ."\r\n". $message;

            if($sent == true){
            //if all the data is true, send the email
            if (mail($to_email, $subject, $messageDetails, $headers)) {
                $mailMsg = "Email successfully sent.";

                } else {
                    $mailMsg = "Email sending failed.";
             }

            //after sending the email,create an object of Email Class 
            //and insert the data into the DB
            
            $email= new Email($info);
            $result= $email -> create();
            redirect_to('main-author-posts.php');
                }
}
?>
<div class="contact-frame">
    <h3 class="contact-title">Tell me!</h3>
    <form action="contact.php" method="post">

        <input type="text" id="fullName" name="fullName" placeholder="Full Name" required="">
        <span class="error"><?php echo $fullNameErr;?></span>

        <input type="text" id="subject" name="subject" placeholder="Subject" required="">
        <span class="error"><?php echo $subjectErr;?></span>

        <input type="email" id="fromEmail" name="fromEmail" placeholder="Email" required="">
        <span class="error"><?php echo $emailErr;?></span>

        <input type="tel" id="tel" name="phoneNumber" placeholder="Phone Number" required="">
        <span class="error"><?php echo $phoneNumErr;?></span>

        <textarea id="message" name="message" rows="5" cols="33" class="description-content" placeholder="Your Message"
            required=""></textarea>
        <span class="error"><?php echo $messageErr;?></span>

        <button type="submit" class="button" name="mail">Send</button>
        <p class="mail-msg"><?= $mailMsg ;?></p>

    </form>
</div>
<?php include SHARED_PATH.'/footer.php'; ?>