<?php 

    include_once('my-first-crawler/simple_html_dom.php');

    // Robarts Wireless Usage URL
    // http://maps.wireless.utoronto.ca/stg/popUp.php?name=0006
    // HTML DOM Manual http://simplehtmldom.sourceforge.net/manual.htm  

    $html = file_get_html('http://maps.wireless.utoronto.ca/stg/popUp.php?name=0006');
    $str = $html->plaintext;

    $name = $html->find("CENTER", 0);
    $name = $name->innertext;
    echo "$name
    ";
   
  //  preg_match_all('/(\d+)/x', $str,  $matches);
    preg_match('/(\d+)/x', $str,  $matches);
    echo $matches[0];
    $numConnections = $matches[0];

?>
