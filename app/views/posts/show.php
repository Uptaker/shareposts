<?php require(APPROOT . '/views/inc/header.php') ?>
<?php flash('post_message') ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light mb-3"><i class="fa fa-backward mr-1"></i>Back</a>
<br>
<h1><?php echo $data['post']->title ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Written by <strong><?php echo $data['user']->name; ?></strong> on <?php echo $data['post']->created_at; ?>
</div>
<p><?php echo $data['post']->body; ?></p>

<?php if ($data['post']->user_id == $_SESSION['user_id']) : ?>
    <hr>
    <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['post']->id; ?>" class="btn btn-dark"><i class="fas fa-pencil-alt mr-1"></i>Edit</a>

    <form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post" class="float-right">
        <!-- <input type="submit" value="Delete" class="btn btn-danger"> -->
        <button type="submit" class="btn btn-danger">
            <i class="fas fa-trash-alt mr-1"></i> Delete
        </button>
    </form>
<?php endif; ?>

<?php require(APPROOT . '/views/inc/footer.php') ?>