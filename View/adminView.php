<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="POST">
                <div class="form-group">
                    <label for="exampleFormControlInput1"><b>Author</b></label>
                    <input type="text" class="form-control" name="author" value="<?= $newsEdit ? $newsEdit-> getAuthor() : "" ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1"><b>Title</b></label>
                    <input type="text" class="form-control" name="title" value="<?= $newsEdit ? $newsEdit-> getTitle() : "" ?>">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1"><b>Write your news</b></label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="25" name="content"><?= $newsEdit ? $newsEdit-> getContent() : "" ?></textarea>
                </div>
                <button type="submit" name ="submit" class="btn btn-dark">Submit</button>
            </form>
            <?php if ($errorMessage) {
                echo $errorMessage;
            } ?>
        </div>
        <div class="col-3"></div>
    </div>
    <div class="row row-table">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Author</th>
                    <th scope="col">Title</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($newsList as $news){?>
                      <tr>
                      <td><?= $news -> getDateAdd() ?></td>
                      <td><?= $news -> getAuthor() ?></td>
                      <td><?= $news -> getTitle() ?></td>
                      <td><a class="table-edit" href="index.php?action=admin&amp;id=<?= $news -> getId() ?>">Edit</a></td>
                      <td><a class="table-edit" href="index.php?action=delete&amp;id=<?= $news -> getId() ?>">Delete</a></td>
                    </tr>
               <?php } ?>
    </div>
</div>