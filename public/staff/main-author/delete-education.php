<?php
session_start();
require_once '../../../private/initialize.php';

// if (!isset($_SESSION['author']) || !isset($_SESSION['main_author'])) {
//     redirect_to(url_for('staff/index.php'));
// }
$id = $_GET['id'];
$education = Education::find_by_id($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $education->delete($id);
    redirect_to('main-author-education.php');
}
?>
<div class="delete-confirmation">
    <div>
        <a class="add-link" href="<?= url_for('staff/main-author/main-author-education.php');?> ">
            &laquo; Back</a>
    </div>
    <p>
        <?php echo "Are you sure that you want to remove <strong> 
    $education->certificate_name </strong> from <b>$education->college_name</b> 
    from the list?"; ?>
    </p>
</div>

<form action="delete-education.php?id=<?=$id;?>" method="post">

    <input type="submit" value="Delete" class="button-edited">


    <?php  include SHARED_PATH.'/footer.php'; ?>