<?php 
session_start();
require_once('../../../private/initialize.php');

if (isset($_POST['add'])) {
    $info = [];

    $info['college_name'] = $_POST['college_name'];
    $info['certificate_name'] = $_POST['certificate_name'];
    $info['start_date'] = $_POST['start_date'];
    $info['end_date'] = $_POST['end_date'];
    $info['description'] = $_POST['description'];
    $education= new Education($info);
    // var_dump($education);
    $result = $education -> create();
    redirect_to('main-author-education.php');
}
?>


<div class="shared-frame">
    <div>
        <a class="add-link" href="<?= url_for('staff/main-author/main-author-education.php');?> "> &laquo; Back</a>
    </div>
    <h3 class="exp-title">Add Certificate</h3>

    <form action="add-education.php" method="post">

        <label for="institution-name">Please insert the college name</label>
        <input type="text" id="college-name" name="college_name">


        <label for="certificate-name">Certificate Degree</label>
        <input type="text" id="certificate-name" name="certificate_name">

        <label for="start-date">Start Date</label>
        <input type="date" id="date" name="start_date">

        <label for="end-date">End Date</label>
        <input type="date" id="date" name="end_date">

        <label for="description">Description</label>
        <textarea id="content" name="description" rows="5" cols="33"></textarea>

        <button type="submit" name="add" class="button">Add </button>

    </form>
</div>
<?php  include SHARED_PATH.'/footer.php'; ?>