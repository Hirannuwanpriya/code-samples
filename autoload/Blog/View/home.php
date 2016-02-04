<?php require_once ROOT_URL . '\Blog\View\header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> <?php print $post['id']; ?> -  <?php print $post['title']; ?></h3>
                        </div>
                        <div class="panel-body">
                            <?php print $post['body']; ?>
                        </div>
                    </div>




                <?php endforeach ?>
            <?php endif ?>

        </div>
        <div class="col-md-4">
            s
        </div>
    </div>
</div>
<?php require_once ROOT_URL . '\Blog\View\footer.php'; ?>