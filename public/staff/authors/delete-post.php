<?php
session_start();
require_once '../../../private/initialize.php';

$id = $_GET['id'];
$post = Post::find_by_id($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post->delete($id);
    
    if($post){
        redirect_to(url_for('staff/main-author/main-author-posts.php'));
    }
}
?>
<div class="delete-confirmation">
    <div>
        <a class="add-link" href="<?= url_for('staff/main-author/main-author-posts.php');?> ">
            &laquo; Back
        </a>
    </div>
    <p>
        <?php echo "Are you sure that you want to remove<strong> $post->title </strong> by $post->author from the list?"; ?>
    </p>
</div>
<form action="delete-post.php?id=<?php echo $id; ?>" method="POST" />
<input type="submit" value="Delete" class="button-edited">

<?php  include SHARED_PATH.'/footer.php'; ?>