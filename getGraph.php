<?php
public function getGraph($symbol)
{
  $BASE_URL = "http://chart.finance.yahoo.com/z?&?s=";
  $chart_url = $BASE_URL.$symbol."&t=6m&q=l&l=on&z=l";
  return $chart_url;
}
?>
