<?php
/**
 * Created by PhpStorm.
 * User: Hira
 * Date: 04/02/2016
 * Time: 08:40 PM
 */
 require_once ROOT_URL.'\Blog\View\header.php';  ?>


<?php print $data; ?>


<div class="container">
    <div class="row">
        <div class="col-md-8">
                    <div class="panel panel-default">
                        <form>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail3">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputPassword3">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember me
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-default">Sign in</button>
                            </div>
                        </form>
                    </div>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>


<?php require_once ROOT_URL.'\Blog\View\footer.php';  ?>

