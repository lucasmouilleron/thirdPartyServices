<!-- /////////////////////////////////////////////////////////////// -->
<?php require_once __DIR__."/../includes/header.php" ?>

<!-- /////////////////////////////////////////////////////////////// -->
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-5D9MC3"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5D9MC3');</script>
<!-- End Google Tag Manager -->

<!-- /////////////////////////////////////////////////////////////// -->
<h1>Google Tag Manager</h1>

<h2>Config</h2>
<pre class="well">
    GTM : GTM-5D9MC3
</pre>

<pre class="well">
    Tag 1 : page analytics -> page
    Tag 2 : gtm-event event analytics -> event, label = {data-gtm-event}}
    Tag 3 : click listener
    Tag 4 : search event analytics -> event, label = {{search keywords}}
    Tag 5 : search page analytics -> page, basic configuration > document path = custom/search?q={{search keywords}}
</pre>

<pre class="well">
    Rule 1 : all pages -> {{url}} matches RegEx .*
    Rule 2 : gtm-event click -> {{event}} equals gtm.click AND {{data-gtm-event}} does not match "null"
    Rule 3 : search click -> {{event}} equals gtm.click AND {{element id}} equals "test-search"
</pre>

<pre class="well">
    Macro 1 : {{data-gtm-event}} -> function (){var el = {{element}}, gtmDataEvent = el.getAttribute('data-gtm-event');return gtmDataEvent;}
    Macro 2 : {{search keywords}} -> function() {var inputField = document.getElementById("keywords");return inputField.value || "";}
</pre>

<pre class="well">
    Association : Tag 1, Rule 1
    Association : Tag 2, Rule 2
    Association : Tag 3, Rule 1
    Association : Tag 4, Rule 3
    Association : Tag 5, Rule 3 (for Google Analytics Site Search feature)
</pre>

<button class="btn" data-toggle="collapse" data-target="#collapseGTMExport" >Show GTM export</button>
<p>
    <pre class="well collapse" id="collapseGTMExport"><?php echo file_get_contents("../assets/miscs/gtm-export.json")?></pre>
</p>

<h2>Tests</h2>
<h3>Click generates event</h3>
<p><button class="btn btn-primary trigger-event" data-gtm-event="my-event-test-yeah">Event !</button></p>
<p class="well"><code>class="btn btn-primary trigger-event" data-gtm-event="my-event-test-yeah"></code></p>

<h3>Click generates event + pageview with custom path</h3>
<form class="form-inline">
    <div class="form-group">
        <input class="form-control" type="text" placeHolder="keyword" id="keywords">
    </div>
    <button id="test-search" class="btn btn-primary" onClick="return false;">Search !</button></p>
</form>
<p class="well"><code>
    input class="form-control" type="text" placeHolder="keyword" id="keywords"<br/>
    button id="test-search" class="btn btn-primary"</code></p>

    <!-- /////////////////////////////////////////////////////////////// -->
    <?php require_once __DIR__."/../includes/footer.php" ?>