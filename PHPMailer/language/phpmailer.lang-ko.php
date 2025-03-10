<?php
require_once("../conf.php");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <style type="text/css">
            .ui-tabs-nav, .ui-accordion-header {
              font-size: 12px;
            }
            
            .ui-tabs-panel, .ui-accordion-content {
              font-size: 14px;
            }
            
            .jqplot-target {
              font-size: 18px;
            }
            
            body > table {
              width: 700px;
              margin-left: auto;
              margin-right: auto;
            }
            
            body > table, body > table > tr, body > table > td {
              width: 700px;
              border: none;
            }
            
            td>p {
              font-family:"Trebuchet MS",Arial,Helvetica,sans-serif;
              font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div><span> </span><span id="info1b"></span></div>

<?php
    

    $l1 = array(18, 36, 14, 11);
    $l2 = array(array(2, 14), array(7, 2), array(8,5));
    $l3 = array(4, 7, 9, 2, 11, 5, 9, 13, 8, 7);
    $l4 = array(array('peech',3), array('cabbage', 2), array('bean', 4), array('orange', 5));

    $catOHLC = array(array(1, 138.7, 139.68, 135.18, 135.4),
    array(2, 143.46, 144.66, 139.79, 140.02),
    array(3, 140.67, 143.56, 132.88, 142.44),
    array(4, 136.01, 139.5, 134.53, 139.48),
    array(5, 143.82, 144.56, 136.04, 136.97),
    array(6, 136.47, 146.4, 136, 144.67),
    array(7, 124.76, 135.9, 124.55, 135.81),
    array(8, 123.73, 129.31, 121.57, 122.5));
    
    $ticks = array('Tue', 'Wed', 'Thu', 'Fri', 'Mon', 'Tue', 'Wed', 'Thr');    
    $options = array(
        'title'=>'I was hidden',
        'lengend'=>array('show'=>true),
        'series'=>array(array()