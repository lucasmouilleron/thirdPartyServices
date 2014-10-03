<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/includes/header.php" ?>
<?php require_once __DIR__."/tests/instagram-commons.php" ?>

<!-- /////////////////////////////////////////////////////////////// -->
<div class="jumbotron">
    <h1>Instagram tests</h1>
    <p><small>Last modification : <?php echo lastModification()?></small></p>
</div>

<ul>
    <li><a href="tests/instagram-server-pulling" target="_blank">Server side pulling as app (PHP)</a></li>
    <li><a href="tests/instagram-server-user-pulling" target="_blank">Server side pulling as user (PHP)</a></li>
</ul>

<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once "includes/footer.php" ?>