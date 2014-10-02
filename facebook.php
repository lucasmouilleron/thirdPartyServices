<!-- /////////////////////////////////////////////////////////////// -->
<?php include "includes/header.php" ?>

<!-- /////////////////////////////////////////////////////////////// -->
<div class="jumbotron">
    <h1>Facebook tests</h1>
    <p><small>Last modification : <?php echo lastModification()?></small></p>
</div>

<ul>
    <li><a href="tests/facebook-client-connect" target="_blank">Client side connect (PHP, JS: requireJS)</a></li>
    <li><a href="tests/facebook-client-invite" target="_blank">Client side invite (JS: requireJS)</a></li>
    <li><a href="tests/facebook-server-notifications" target="_blank">Server side notification send (PHP)</a></li>
    <li><a href="tests/facebook-server-pulling-app" target="_blank">Server side pulling as an app (PHP)</a></li>
    <li><a href="tests/facebook-server-pulling-user" target="_blank">Server side pulling as a user (PHP)</a></li>
</ul>

<!-- /////////////////////////////////////////////////////////////// -->
<?php include "includes/footer.php" ?>