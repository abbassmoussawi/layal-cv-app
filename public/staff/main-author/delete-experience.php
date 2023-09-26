<?php
session_start();
require_once '../../../private/initialize.php';

$id = $_GET['id'];
$experience = Experience::find_by_id($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $experience->delete($id);
    redirect_to('main-author-experience.php');
}
?>

<div class="delete-confirmation">

    <a class="add-link" href="<?= url_for('staff/main-author/main-author-experience.php'); ?> ">
        &laquo; Back
    </a>

    <p>
        <?php echo "Are you sure that you want to remove
         <strong> $experience->company_name </strong> from 
        from the list?"; ?>
    </p>

</div>

<form action="delete-experience.php?id=<?= $id; ?>" method="post">

    <input type="submit" value="Delete" class="button-edited">

</form>

<?php include SHARED_PATH . '/footer.php'; ?>