<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form method= "POST" class="delete-news">
                <div> Are you sure to delete this news? </div>
                <h2> <?= $news->getTitle() ?> </h2>
                <div>
                    <button type="submit" class="btn btn-dark">Yes</button>
                    <a href="index.php?action=admin&id=<?= $id ?>" class="btn btn-dark">No</a>
                </div>
            </form>
        </div>
    </div>
    <div class="col-3"></div>
</div>
</div>