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

function buildTOC($content) {

    $pattern = "/<h[2-".$depth."]*[^>]*>.*?<\/h[2-".$depth."]>/";
    $whocares = preg_match_all($pattern, $content, $winners);

    $heads = implode("\n",$winners[0]);
    $heads = str_replace('<a name="','<a href="#',$heads);
    $heads = str_replace('</a>','',$heads);
    $heads = preg_replace('/<h([1-'.$depth.'])>/','<li class="toc$1">',$heads);
    $heads = preg_replace('/<\/h[1-'.$depth.']>/','</a></li>',$heads);
    return $heads;
}


?>