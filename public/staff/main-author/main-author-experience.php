<?php
session_start();
require_once('../../../private/initialize.php');
?>

<h3 class="institution-title">All Experiences</h3>

<?php
$experiences = Experience::find_all();
foreach ($experiences as $experience) {
    ?>

    <article class="frame">
        <?php if (isset($_SESSION['main_author'])) { ?>

            <a href="<?= url_for('staff/main-author/add-experience.php'); ?>">
                <i class="fa-solid fa-file-circle-plus"></i>
            </a>

        <?php } ?>

        <h1 class="institution-name">
            <?= $experience->company_name; ?>
        </h1>
        <h2 class="title">
            <?= $experience->job_title; ?>
        </h2>
        <div class="duration">
            <p>
                <strong>From &nbsp;</strong>
                <?= $experience->start_date; ?>
            </p>
            <p>
                <strong>&nbsp;To &nbsp;</strong>
                <?= $experience->end_date; ?>
            </p>
        </div>


        <div class="description">

            <h2>Duties: Responsibilities include the following:</h2>

            <p>
                <?= $experience->job_description; ?>
            </p>

            <h2>Skills Gained</h2>

            <p>
                <?= $experience->skills_gained; ?>
            </p>
        </div>
        <?php if (isset($_SESSION['main_author'])) {

            echo "<div class='post-editing-container'><a href='edit-experience.php?id={$experience->id}' class='button-edited'>Edit</a>";
            echo "<a href='delete-experience.php?id={$experience->id}' class='button-edited'>Delete</a></div>";
        } ?>

    </article>

<?php } ?>
<?php include SHARED_PATH . '/footer.php'; ?>