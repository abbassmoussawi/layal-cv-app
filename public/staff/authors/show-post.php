<?php
session_start();
require_once '../../../private/initialize.php';

$id = $_GET['id'];

$post = post::find_by_id($id); ?>
<div class="border-gradient">

</div>
<div class="body">

    <div class="show-title">
        <h4>
            <?php echo $post->title; ?>
        </h4>
    </div>
    <div class="show-image">
        <img src="<?php echo "../../../../layal-webapp/images-server/" . $post->image_url; ?>" class="post-image">
    </div>
    <div class="show-text">
        <p>
            <?php echo $post->content; ?>
        </p>
        <p class="show-author">
            <?php echo $post->author; ?>
        </p>

    </div>

</div>
<?php include SHARED_PATH . '/footer.php'; ?>