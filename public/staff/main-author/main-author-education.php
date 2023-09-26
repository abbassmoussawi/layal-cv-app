<?php
session_start();
require_once('../../../private/initialize.php');
?>

<h3 class="institution-title">All Educations</h3>

<?php
$educations = education::find_all();
foreach ($educations as $education) { ?>

    <article class="frame">

        <?php if (isset($_SESSION['main_author'])) { ?>

            <!-- icon to add a new certificate-->
            <a href="<?= url_for('staff/main-author/add-education.php'); ?>">
                <i class="fa-solid fa-file-circle-plus"></i>
            </a>

        <?php } ?>

        <div>
            <div class="border-bottom">

                <h1 class="institution-name">
                    <?= $education->college_name; ?>
                </h1>
            </div>

            <h2 class="title">
                <?= $education->certificate_name; ?>
            </h2>

            <div class="duration">
                <h5>
                    <strong>From &nbsp;</strong>
                    <?= $education->start_date; ?>
                </h5>
                <h5>
                    <strong>&nbsp;To &nbsp;</strong>
                    <?= $education->end_date; ?>
                </h5>
            </div>

            <p class="description">
                <?= htmlentities($education->description); ?>
            </p>

            <?php
            if (isset($_SESSION['main_author'])) {

                echo "<div class='post-editing-container'><a href='edit-education.php?id={$education->id}' class='button-edited'>Edit</a>";
                echo "<a href='delete-education.php?id={$education->id}' class='button-edited'>Delete</a></div>";
                ?>
            <?php } ?>

        </div>
    </article>

<?php
}
include SHARED_PATH . '/footer.php';
?>