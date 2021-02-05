<?php
require_once 'simple_html_dom.php';
//get html content from the site.
$dom = file_get_html('https://www.masterd.es/cursos-de-formacion-mantenimiento-industrial-g11', false); 


//collect all user’s reviews into an array
$answer = array();
if(!empty($dom)) {
    $divClass = $title = '';
    $i = 0;
    foreach($dom->find('#listado-grupo') as $divClass) {
        //title
        foreach($divClass->find('ul li h2') as $title ) {
            $answer[$i]['title'] = $title->plaintext;
        }
    //ipl-ratings-bar
    // foreach($divClass->find(“.ipl-ratings-bar”) as $ipl_ratings_bar ) {
    //     $answer[$i][‘rate’] = trim($ipl_ratings_bar->plaintext);
    // }
    //content
    // foreach($divClass->find(‘div[class=text show-more__control]’) as $desc) {
    //     $text = html_entity_decode($desc->plaintext);
    //     $text = preg_replace(‘/\&#39;/’, “‘”, $text);
    //     $answer[$i][‘content’] = html_entity_decode($text);
    // }
    $i++;
    }
}
print_r($answer);

// exit;