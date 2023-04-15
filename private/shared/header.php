<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= url_for('stylesheets/blog.css');?>">
    <link rel="icon" href="<?= url_for('icon/customer-service-headset.png');?>" type="image/icon type">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&family=Cabin&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&family=Oxygen+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Alkatra&family=Inspiration&display=swap" rel="stylesheet">    <title>
        <?php 
        if(isset($title)){
             echo $title;
         }else{
             echo"Layal-WebApp";
         } ?>
    </title>

</head>

<body>
    <nav>
        <ul>
            <li>
                <h1>
                    <a href="<?= url_for('staff/index.php');?>">
                        <i class="fa-solid fa-headset"></i>
                        <span>Layal Aabed</span>
                    </a>
                </h1>
            </li>
            <li>
                <a href="<?= url_for('staff/main-author/about-me.php');?>">About</a>
            </li>
            <li>
                <a href="<?= url_for('staff/main-author/main-author-posts.php');?>">Posts</a>
            </li>
            <li>
                <a href="<?= url_for('staff/main-author/main-author-experience.php');?>">Experience</a>
            </li>
            <li>
                <a href="<?= url_for('staff/main-author/main-author-education.php');?>">Education</a>
            </li>
            <li>
            <a href="<?= url_for('staff/main-author/contact.php');?>">Contact</a>
            </li>
            <li>
                <?php if(isset( $_SESSION['main_author'])){?>
                <a href="<?= url_for('staff/authors/add-post.php');?>">Add Post</a>
            </li>
            <?php }?>
            <li>
                <?php if(isset( $_SESSION['main_author']))
                {?>
                <a href="<?= url_for('staff/logout.php');?>">Logout</a>

                <?php 
                     }else{
                ?>
                <a href="<?= url_for('staff/login.php');?>">Login</a>

                <?php  
                }?>
            </li>
        </ul>
    </nav>