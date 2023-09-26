<?php
session_start();
require_once('../../../private/initialize.php');

if (isset($_POST['post'])) {

    $info = [];
    $info['title'] = $_POST['title'];
    $info['content'] = $_POST['content'];
    $info['author'] = $_POST['author'];
    $info['time'] = $_POST['time'];

    $filename = $info['image_url'] = $_FILES["imagename"]["name"];
    $tempname = $_FILES["imagename"]["tmp_name"];
    $folder = '../../../images-server/' . $filename;

    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
    $post = new Post($info);
    $result = $post->create();
}
?>
<div class="shared-frame">
    <form action="add-post.php" method="post" enctype="multipart/form-data">

        <label for="post-image">Please choose a background image</label>
        <input type="file" id="post-image" name="imagename">

        <label for="post-title">Post's title</label>
        <input type="text" id="title" name="title">

        <label for="post-content">Post's Content</label>
        <textarea id="content" name="content" rows="5" cols="33"></textarea>

        <label for="author">Post's Author</label>
        <select name="author" id="author">


            <option>Please choose an author</option>
            <option value="Layal Aabed">Layal Aabed</option>


            <!-- <?php
            // $authors = Post::find_all();
            // foreach ($authors as $author) { ?>
           
             <option value=""><? php /*$author->author*/; ?></option> -->
            <?php //};?>

        </select>

        <label for="posting-date">Posting Time</label>
        <input type="datetime-local" id="time" name="time">

        <button type="submit" name="post" class="button">POST</button>

    </form>
</div>

<?php include SHARED_PATH . '/footer.php'; ?>