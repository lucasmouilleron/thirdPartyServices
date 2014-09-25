<!-- /////////////////////////////////////////////////////////////// -->
<?php include "includes/header.php" ?>

<!-- /////////////////////////////////////////////////////////////// -->
<div class="jumbotron">
    <h1>Guidelines and tips</h1>
    <p>(Non :)) exhaustive guidelines and tips for (more or less) popular third party services.</p>
    <p><small>Last modification : <?php echo lastModification()?></small></p>
</div>

<!-- /////////////////////////////////////////////////////////////// -->
<div class="row">
    <div class="col-md-4">
        <h1>Table of contents</h1>
        <div id="toc"></div>
    </div>
    <div class="col-md-8">
        <div id="guidelines">
            <?php echo mdFileToHTML(GUIDELINES_FILE, false)?>
        </div>
    </div>
</div>

<!-- /////////////////////////////////////////////////////////////// -->
<?php include "includes/footer.php" ?>