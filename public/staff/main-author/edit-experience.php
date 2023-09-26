<?php
session_start();
require_once('../../../private/initialize.php');

$id = $_GET['id'];
$experience = Experience::find_by_id($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $info['company_name'] = $_POST['company_name'];
    $info['job_title'] = $_POST['job_title'];
    $info['start_date'] = $_POST['start_date'];
    $info['end_date'] = $_POST['end_date'];
    $info['job_description'] = $_POST['job_description'];
    $info['skills_gained'] = $_POST['skills_gained'];

    $experience = new Experience($info);
    $result = $experience->update($id);
    redirect_to('main-author-experience.php');
}
?>
<div class="shared-frame">

    <div>
        <a class="add-link" href="<?= url_for('staff/main-author/main-author-experience.php'); ?> "> &laquo; Back</a>
    </div>

    <h3 class="institution-title">Edit Experience</h3>

    <form action="edit-experience.php?id=<?= $id; ?>" method="post">

        <label for="institution-name">Company name</label>
        <input type="text" id="company-name" name="company_name" value="<?= $experience->company_name; ?>">


        <label for="job-title">Job title</label>
        <input type="text" id="job-title" name="job_title" value="<?= $experience->job_title; ?>">

        <label for="start-date">Start Date</label>
        <input type="date" id="date" name="start_date" value="<?= $experience->start_date; ?>">

        <label for="end-date">End Date</label>
        <input type="date" id="date" name="end_date" value="<?= $experience->end_date; ?>">

        <label for="job-description">Job Description</label>
        <textarea id="content" name="job_description" rows="5" cols="33"><?= $experience->job_description; ?></textarea>

        <label for="skills-gained">Skills Gained</label>
        <input type="text" id="skills-gained" name="skills_gained" value="<?= $experience->skills_gained; ?>">

        <button type="submit" name="update" class="button">Update Experience</button>
    </form>
</div>

<?php include SHARED_PATH . '/footer.php'; ?>