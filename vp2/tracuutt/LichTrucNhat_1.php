<?php

date_default_timezone_set('UTC');
function objectToArray($d) {
		if (is_object($d)) {
			// Gets the properties of the given object
			// with get_object_vars function
			$d = get_object_vars($d);
		}
 
		if (is_array($d)) {
			/*
			* Return array converted to object
			* Using __FUNCTION__ (Magic constant)
			* for recursive call
			*/
			return array_map(__FUNCTION__, $d);
		}
		else {
			// Return array
			return $d;
		}
	}
        
 function cmp($a, $b)
{
    global $array;
    return strcmp($a, $b);
}

use \Httpful\Request;
if($arwrk[0]['code_ser'] =='LichTrucNhat') 
        { 
$uri = "http://10.1.0.238:3005/sinhvien/".$msv."";
                    $response = Request::get($uri)->send();
//echo '<pre>'; print_r($response->body);echo '</pre>';
$array= $response->body;
//echo count($array);
$lichtruc=objectToArray($array) ;
$trucnhat = array();
for($i=0;$i<count($lichtruc);$i++)
{   
    $today= new DateTime($lichtruc[$i]['batdau']);
    if (ew_CurrentDateTime()>$today)  
    {  $today= "Thời gian: ".date_format($today, 'H:i:s d-m-Y'); }
    else
   { $today= "<span style=\"Color:red\">Thời gian: ".date_format($today, 'H:i:s d-m-Y')."</span>"; } 
    if($trucnhat[$lichtruc[$i]['lop']] == null)        
        $trucnhat[$lichtruc[$i]['lop']] = array();
    array_push($trucnhat[$lichtruc[$i]['lop']],$today);
   // echo $today.":".$lichtruc[$i]['lop']."<br/>" ;   
    uksort($trucnhat[$lichtruc[$i]['lop']], 'cmp');
}
//echo '<pre>'; print_r($trucnhat);echo '</pre>';
?>
   <center>           
                    <h2 style="font-weight: bold;color:black">LỊCH TRỰC NHẬT</h2>
                    <?php  $_SESSION['header_title']  ='LỊCH TRỰC NHẬT';
                           $_SESSION['title']  ='lichtrucnhat';
                    ?>
                      
                    </center>
  <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" style="font-size: 11px" >
                    <thead>
                            <tr> 
                                    <th class="center" style="text-align: center"> STT</th>
                                    <th class="center" style="text-align: center">Lớpc</th>
                                    <th class="center" style="text-align: center">Thời gian</th>      
                            </tr>
                    </thead>
                    <?php 
                    $aray_thutu=array_keys($trucnhat);
                  //  print_r($aray_thutu);
                    for($j=0;$j<count($aray_thutu);$j++)
                    {
                       
                    ?>
                       <tr class="gradeX">
                                    <td align="center"><?php echo $j+1; ?></td>
                                    <td align="center"><?php print_r($aray_thutu[$j]) ;echo count($trucnhat[$aray_thutu[$j]]); ?></td>
                                    <td>  
                                    <?php  
                                    For($k=0;$k<count($trucnhat[$aray_thutu[$j]]);$k++)
                                    {
                                        echo $trucnhat[$aray_thutu[$j]][$k]."<br/>";
                                    }
                                    
                                    ?></td>
                                   
                                </tr>
                     <?php } ?>
  </table> 

   <?php } ?>