<?php require(APPROOT . '/views/inc/header.php') ?>

<div class="jumbotron jumbotron-fluid text-center">
    <div class="container"></div>
    <h1 class="display-3"><?php echo $data['title'] ?></h1>
    <p class="lead"><?php echo $data['description'] ?></p>
    <a href="https://github.com/Uptaker/shareposts">SharePosts GitHub</a><br>
    <a href="https://github.com/Uptaker/CustomMVC">Built with this custom framework</a>
</div>

<?php require(APPROOT . '/views/inc/footer.php') ?>