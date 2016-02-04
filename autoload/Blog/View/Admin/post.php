<?php require_once ROOT_URL.'\Blog\View\header.php';  ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <form class="form-horizontal" method="post" action="?action=post&method=add">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Post Title</label>
                        <div class="col-sm-10">
                            <input type="text" required="required" class="form-control" name="title"  placeholder="Title" value="<?php  print $posts->title; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Content</label>
                        <div class="col-sm-10">
                            <textarea name="body" required="required" class="form-control" rows="5" ><?php  print $posts->body; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Date Created</label>
                        <div class="col-sm-10">
                            <lable><?php  print $posts->date_created; ?></lable>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="hidden" name="id" value="<?php print $posts->id ?>" />
                            <input type="submit" class="btn btn-success" value="Add Post" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require_once ROOT_URL.'\Blog\View\footer.php';  ?>