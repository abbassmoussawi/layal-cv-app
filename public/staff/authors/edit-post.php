<?php
session_start();

require_once('../../../private/initialize.php');
$id = $_GET['id'];
$post = Post::find_by_id($id);
?>

<div class="shared-frame">
    <div>
        <a class="add-link" href="<?= url_for('staff/main-author/main-author-posts.php'); ?> "> &laquo; Back</a>
    </div>
    <form action="edit-post.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">

        <label for="post-image">Post image</label>
        <div>
            <img src="../../../public/images-server/<?= $post->image_url; ?>" name="image_name" class="post-image">
        </div>

        <input type="file" id="post-image" name="image_name">

        <label for="post-title">Post's title</label>
        <input type="text" id="title" name="title" value="<?= $post->title; ?>">


        <label for="post-content">Post's Content</label>
        <textarea id="content" name="content" rows="5" cols="33"><?= $post->content; ?></textarea>


        <label for="author">Post's Author:<strong>
                <?= $post->author; ?>
            </strong></label>
        <select name="author" id="author">

        </select>

        <button type="submit" name="post" class="button">UPDATE</input>
    </form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $info['title'] = $_POST['title'];
    $info['content'] = $_POST['content'];
    $info['time'] = $post->time;

    echo '<script type="text/javascript">';
    if (document . getElementById('post-image') . files . length == 1) {
        ;
        echo '</script>';

        $filename = $info['image_url'] = $_FILES["imagename"]["name"];
        $tempname = $_FILES["imagename"]["tmp_name"];
        $folder = '../../images-server/' . $filename;

        echo '<script type="text/javascript">';

    }
    ;
    echo '</script>';

    $info['image_url'] = $post->image_url;
    $info['author'] = $post->author;

    $post = new Post($info);
    $result = $post->update($id);
    // dd($result);
    if ($result) {
        redirect_to(url_for('staff/main-author/main-author-posts.php'));
    }
}
?>
<?php include SHARED_PATH . '/footer.php'; ?>