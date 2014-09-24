<?php

///////////////////////////////////////////////////////////////////////////////
require_once "Michelf/Markdown.inc.php";use \Michelf\Markdown;

///////////////////////////////////////////////////////////////////////////////
define("GUIDELINES_FILE","guidelines-and-tips.md");
define("README_FILE","README.md");

///////////////////////////////////////////////////////////////////////////////
function mdFileToHTML($file, $removeH1) {
    $html = Markdown::defaultTransform(file_get_contents($file));
    if($removeH1) {
        $html = preg_replace("/<h1[^>]*>([\s\S]*?)<\/h1[^>]*>/", "", $html);
    }
    return $html;
}

///////////////////////////////////////////////////////////////////////////////
function isPage($pageName) {
    return basename($_SERVER["REQUEST_URI"], ".php") == $pageName;
}


?>