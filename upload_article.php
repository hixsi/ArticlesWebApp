<?php
require_once('header.php'); ?>






<div class="container">
    <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-6">
            <div id="login-box" class="col-md-12">
                <h1>Upload your article</h1>

                <form action="upload_article.inc.php" method="post" class="form" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Title"><br><br>
                    </div>

                    <div class="form-group">
                        <textarea name="content" placeholder="Write article's content" class="form-control"></textarea><br><br>
                    </div>
                    <div class="form-group">
                        <input type="file" name="file"><br><br>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="createArticle" class="btn btn-info btn-md" value="Create article">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>