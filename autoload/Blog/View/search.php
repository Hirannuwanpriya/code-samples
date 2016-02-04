<?php require_once ROOT_URL . '\Blog\View\header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <form class="form-horizontal" method="POST" action="index.php?action=search"  >
                <div class="form-group">
                    <input type="text" class="form-control" name="searchtext" placeholder="Search By Post title" value="" >
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Search</button>
                </div>
            </form>

            <?php if (!empty($posts)): ?>
                <h1><?php echo count($posts); ?>Posts Found.</h1>
                <?php foreach ($posts as $post): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> <?php print $post->id; ?> -  <?php print $post->title; ?></h3>
                        </div>
                        <div class="panel-body">
                            <?php print $post->body; ?>
                            <?php if (count($posts) == 1) :?>
                                <a href="?action=home" class="btn btn-primary" role="button">Back to List</a>
                            <?php else: ?>
                                <a href="?action=home&post=<?php print $post->id; ?>" class="btn btn-primary" role="button">Read more</a>
                            <?php endif ?>

                            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == 'admin' ): ?>
                             <a href="?action=post&method=view&post=<?php print $post->id; ?>" class="btn btn-primary" role="button">Edit</a>
                             <a href="?action=post&method=delete&post=<?php print $post->id; ?>" onclick="confirm('Delete This');"  class="btn btn btn-danger" role="button">Delete</a>
                            <?php endif ?>

                        </div>
                    </div>
               <?php endforeach ?>
            <?php endif ?>

        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
<?php require_once ROOT_URL . '\Blog\View\footer.php'; ?>