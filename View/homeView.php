<div class="container">
        <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                        <?php
                        $newList = $viewData['newsList'];
                        foreach ($newList as $news) {?>
                                <div class="previewNews">
                                        <h2> <?= $news -> getTitle() ?> </h2>
                                        <p><i>
                                                le <?= $news -> getDateAdd() ?> par <?= $news -> getAuthor() ?>
                                                <?php include("./include/editInclude.php") ?>
                                        </i></p>
                                        </p>
                                        <p> <?= $news -> getExtractContent() ?> </p>
                                        <a href="index.php?action=news&amp;id=<?= $news -> getId() ?>">Lire la suite de l'article</a>
                                </div><?php
                                } ?>
                                </div>
                </div>
                <div class="col-3"></div>
        </div>
</div>