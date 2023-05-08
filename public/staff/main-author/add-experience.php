<?php
session_start();
require_once('../../../private/initialize.php');

if (isset($_POST['add'])) {

    $info = [];

    $info['company_name'] = $_POST['company_name'];
    $info['job_title'] = $_POST['job_title'];
    $info['start_date'] = $_POST['start_date'];
    $info['end_date'] = $_POST['end_date'];
    $info['job_description'] = $_POST['job_description'];
    $info['skills_gained'] = $_POST['skills_gained'];
    $experience = new Experience($info);
    // var_dump($experience);
    $result = $experience->create();
    redirect_to('main-author-experience.php');
}
?>

<div class="shared-frame">
    <div>
        <a class="add-link" href="<?= url_for('staff/main-author/main-author-education.php'); ?> "> &laquo; Back</a>
    </div>
    <h3 class="institution-title">Add Experience</h3>

    <form action="add-experience.php" method="post">

        <label for="company-name">Company name</label>
        <input type="text" id="company-name" name="company_name">


        <label for="job-title">Job title</label>
        <input type="text" id="job-title" name="job_title">

        <label for="start-date">Start Date</label>
        <input type="date" id="date" name="start_date">

        <label for="end-date">End Date</label>
        <input type="date" id="date" name="end_date">

        <label for="job-description">Job Description</label>
        <textarea id="content" name="job_description" rows="5" cols="33"></textarea>

        <label for="skills-gained">Skills Gained</label>
        <input type="text" id="skills-gained" name="skills_gained">

        <button type="submit" name="add" class="button">Add Experience</button>

    </form>
</div>
<?php include SHARED_PATH . '/footer.php'; ?>