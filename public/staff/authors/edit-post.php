<?php
session_start();

require_once('../../../private/initialize.php');
$id = $_GET['id'];

$post = Post::find_by_id($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $info['title'] = $_POST['title'];
    $info['content'] = $_POST['content'];
    $info['author'] = $_POST['author'];
    $info['time'] = $_POST['time'];

    $filename = $info['image_url'] = $_FILES["imagename"]["name"];
    $tempname = $_FILES["imagename"]["tmp_name"];
    $folder = '../../../images-server/' . $filename;

    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image Updated Successfully!</h3>";
    } else {
        echo "<h3>  Failed To Update Image!</h3>";
    }

    $post = new Post($info);
    $result = $post->update($id);
    if ($result) {
        redirect_to(url_for('staff/main-author/main-author-posts.php'));
    }
}

?>

<div class="shared-frame">
    <div>
        <a class="add-link" href="<?= url_for('staff/main-author/main-author-posts.php'); ?> "> &laquo; Back</a>
    </div>
    <form action="edit-post.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">

        <label for="post-image">Post image</label>

        <div>
            <img src="<?php echo "../../../../layal-webapp/images-server/" . $post->image_url; ?>" class="post-image">
        </div>

        <input type="file" id="post-image" name="imagename"
            value="<?php echo "../../../../layal-webapp/images-server/" . $post->image_url; ?>">


        <label for="post-title">Post's title</label>
        <input type="text" id="title" name="title" value="<?= $post->title; ?>">


        <label for="post-content">Post's Content</label>
        <textarea id="content" name="content" rows="5" cols="33"><?= $post->content; ?></textarea>


        <label for="author">Post's Author:<strong> <?= $post->author; ?></strong></label>
        <select name="author" id="author">
            <option value="<?= $post->author; ?>"><?= $post->author; ?></option>
            <option value="Layal Aabed">Layal Aabed</option>
            <option value="Abbass El Moussawi">Abbass El Moussawi</option>
        </select>

        <label for="posting-date">Posting Time</label>
        <?= $post->time; ?>

        <input type="datetime-local" id="posting-date" name="time" value="<?= $post->time; ?>" />

        <button type="submit" name="post" class="button">UPDATE</input>
    </form>
</div>

<?php include SHARED_PATH . '/footer.php'; ?>