<form method="POST">

    <button type="submit" name ="submit" value="delete" class="btn btn-dark">Submit1</button>
    <button type="submit" name ="submit" value="cancel" class="btn btn-dark">Submit2</button>
</form>

<?php

if($_SERVER['REQUEST_METHOD'] === "POST"){
    var_dump($_POST);
}