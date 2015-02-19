<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/header.php" ?>

<!-- /////////////////////////////////////////////////////////////// -->
<h1>Google Analytics JS</h1>

<h3>Config<h3>
<pre class="well">
Tracker : <span id="ga-tracker">UA-55300212-1</span>
</pre>

<h3>Click to generates event</h3>
<p><button class="btn btn-primary" id="ga-test1">Page view JS triggered !</button></p>
<p class="well"><code>tracker._trackPageview();</code></p>
<p><button class="btn btn-primary" id="ga-test2">Event JS triggered ('my var' variable 'yes') !</button></p>
<p class="well"><code>tracker._setCustomVar(1, "my var", "yes", 2); tracker._trackEvent("my cat", "my action", "my label");</code></p>
<p><button class="btn btn-primary" id="ga-test3">Other Event JS triggered ('my var' variable 'no') !</button></p>
<p class="well"><code>tracker._setCustomVar(1, "my var", "no", 2); tracker._trackEvent("my cat", "my action", "my label");</code></p>

<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/footer.php" ?>