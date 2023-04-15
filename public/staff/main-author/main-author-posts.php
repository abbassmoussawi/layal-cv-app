<?php
session_start();
require_once('../../../private/initialize.php');

?>

<!--Background Image-->
<!-- <div class="background-image">

</div> -->
<!--End Background Image-->

<div class="posts-container">

    <?php
            $posts = Post::find_all();
            foreach ($posts as $post) { ?>

    <article class="post-frame">

        <div>
            <img src="<?php echo"../../../../layal-webapp/images-server/". $post->image_url; ?>" class="post-image">
        </div>

        <div class="post-information">
            <a href='../authors/show-post.php?id=<?=$post->id;?>'>
                <?php echo $post->title; ?>
            </a>

            <a href="about-me.php" class="post-author">
                <?php echo $post->author; ?>
            </a>

            <p class="post-date"><?php echo $post->time; ?></p>

            <!-- Edit and Delete feature are only for main author-->
            <?php  if(isset( $_SESSION['main_author'])){
                
                           echo "<div class='post-editing-container'><a href='../authors/edit-post.php?id={$post->id}'>Edit</a>";
                            echo "<a href='../authors/delete-post.php?id={$post->id}'>Delete</a></div>";
                            ?>
            <?php }?>
        </div>
    </article>

    <?php   } ?>

</div>
<?php include SHARED_PATH.'/footer.php';?>