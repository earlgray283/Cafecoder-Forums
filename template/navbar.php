<?php
include_once "../php/db_connect.php";
$con = new DBC();

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Cafecoder Forums</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" id="navbarDropdownMenuLink" aria-haspopup="true" aria-expanded="false">Forums</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php
                    $res = $con->simple_exec_obj("SELECT * FROM forums ORDER BY id");
                    foreach ($res as $value) {
                        echo '<a class="dropdown-item" href="/forums.php?forum_id='.$value["id"].'">'.$value["name"].'</a><br>'."\n";
                    }
                    ?>
                </div><!-- ./dropdown-menu -->
            </li>
        </ul>
    </div>
</nav>
<br>