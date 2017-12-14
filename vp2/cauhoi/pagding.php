<?php

function divPage($total = 0,$currentPage = 0,$div = 5,$rows = 10){
if(!$total || !$rows || !$div || $total<=$rows) return false;
$nPage = floor($total/$rows) + (($total%$rows)?1:0);
$nDiv = floor($nPage/$div) + (($nPage%$div)?1:0);
$currentDiv = floor($currentPage/$div) ;
$sPage = '';
if($currentDiv) {
$sPage .= '<a href="?p=0"><<</a> ';
$sPage .= '<a href="?p='.($currentDiv*$div - 1).'"><</a> ';
}
$count =($nPage<=($currentDiv+1)*$div)?($nPage-$currentDiv*$div):$div;
for($i=0;$i<$count;$i++){
$page = ($currentDiv*$div + $i);
$sPage .= '<a href="?p='.($currentDiv*$div + $i ).'" '.(($page==$currentPage)?'class="current"':'').'>'.($page+1).'&nbsp;</a>';
}
if($currentDiv < $nDiv - 1){

$sPage .= '<a href="?p='.(($currentDiv+1)*$div  ).'">></a> ';
$sPage .= '<a href="?p='.(($nDiv-1)*$div  ).'">>></a>';
}

return $sPage;
}                                     
?>
