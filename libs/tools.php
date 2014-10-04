<?php

///////////////////////////////////////////////////////////////////////////////
require_once "Michelf/Markdown.inc.php"; use \Michelf\Markdown;

///////////////////////////////////////////////////////////////////////////////
define("BASE_URL",getBaseURL());
define("GUIDELINES_FILE",__DIR__."/../guidelines-and-tips.md");
define("README_FILE","README.md");

///////////////////////////////////////////////////////////////////////////////
date_default_timezone_set("Europe/Paris");

///////////////////////////////////////////////////////////////////////////////
function mdFileToHTML($file, $removeH1) {
    $html = Markdown::defaultTransform(file_get_contents($file));
    if($removeH1) {
        $html = preg_replace("/<h1[^>]*>([\s\S]*?)<\/h1[^>]*>/", "", $html);
    }
    return $html;
}

///////////////////////////////////////////////////////////////////////////////
function getCurrentURLWithoutParams() {
    return strtok($_SERVER["REQUEST_URI"],"?");
}

///////////////////////////////////////////////////////////////////////////////
function isPage($pageName) {
    return basename($_SERVER["REQUEST_URI"], ".php") == $pageName;
}

///////////////////////////////////////////////////////////////////////////////
function lastModification() {
    return date("d/m/Y",getlastmod());
}

///////////////////////////////////////////////////////////////////////////////
function getBaseURL()
{
    $base_dir  = preg_replace("/libs$/", "", __DIR__);
    $doc_root  = preg_replace("!{$_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']);
    return rtrim(preg_replace("!^{$doc_root}!", '', $base_dir), "/");
}

?>