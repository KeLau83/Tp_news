<div class="container">
        <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                        <div class="previewNews">
                                <h2> <?= $news->getTitle() ?> </h2>
                                <p><i>
                                        le <?= $news->getDateAdd() ?> par <?= $news->getAuthor() ?>
                                        <?php include("./include/editInclude.php") ?>
                                </i></p>
                                <p> <?= $newsContent ?> </p>
                                <a href="index.php">Home</a>
                        </div>
                </div>
        </div>
        <div class="col-3"></div>
</div>
</div>