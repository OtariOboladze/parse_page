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
        foreach($divClass->find('ul li 1 .href') as $link ) {
            $answer[$i]['link'] = trim($link->plaintext);
        }
    $i++;
    }
}
print_r($answer);

