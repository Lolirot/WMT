<?php
function getGraph($symbol)
{
  $BASE_URL = "http://chart.finance.yahoo.com/z?";
  $chart_url = $BASE_URL."?s=".$symbol."&t=6m&q=l&l=on&z=l";
  return $chart_url;
}
?>
