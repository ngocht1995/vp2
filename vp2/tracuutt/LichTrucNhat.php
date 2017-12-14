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
if ($msv <> "" || $msv <>null )
{   
            if($arwrk[0]['code_ser'] =='LichTrucNhat') 
                { 
            $uri = "http://qlgd.hpu.edu.vn/api/v1/sinh_viens/".$msv."";
                                $response = Request::get($uri)->send();
            //  echo '<pre>'; print_r($response->body);echo '</pre>';
            $array= $response->body;
            //echo "FSF".count($array);
            $lichtruc=objectToArray($array) ;
            $trucnhat = array();
           //echo '<pre>'; print_r($lichtruc);echo '</pre>';
            ?>
            <center>           
                                <h2 style="font-weight: bold;color:black">LỊCH TRỰC NHẬT</h2>
                                <?php  $_SESSION['header_title']  ='LỊCH TRỰC NHẬT';
                                    $_SESSION['title']  ='lichtrucnhat';
                                ?> 
            </center>
            <link rel="stylesheet" href="../css/reveal.css">	 
            <script type="text/javascript" src="../js/jquery.reveal.js"></script>
            <style type="text/css">
                                    body { font-family: "HelveticaNeue","Helvetica-Neue", "Helvetica", "Arial", sans-serif; }
                                    .big-link { display:block; text-align: center;color: #06f; }
            </style>           
            <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" style="font-size: 11px" >
                                <thead>
                                        <tr> 
                                                <th class="center" style="text-align: center"> Lần</th>
                                                <th class="center" style="text-align: center">Thời gian</th>
                                                <th class="center" style="text-align: center">Lớp</th> 
                                                <th class="center" style="text-align: center">Phòng</th> 
                                                <th class="center" style="text-align: center">Nhóm trực</th> 
                                                <th class="center" style="text-align: center">Trạng thái</th>   
                                        </tr>
                                </thead>
                                <?php 
                            for($i=0;$i<count($lichtruc);$i++)
                                {   
                                   $string="";
                                    $today= new DateTime($lichtruc[$i]['thoigian']);
                                    $today= date_format($today, 'H:i:s d-m-Y');   
                                ?>
                                <tr class="gradeX">
                                                <td align="center"><?php echo $i+1 ?></td>
                                                <td align="center"><?php echo $today; ?></td>
                                                <td> <?php echo $lichtruc[$i]['ma_lop']; ?>
                                                    <DIV>  <?php echo $lichtruc[$i]['ten_mon_hoc']; ?> </DIV>
                                                </td>
                                                <td align="center"> <?php echo $lichtruc[$i]['phong']; ?> </td>
                                                <td ><?php 
                                                $_SESSION['lichtruc']=$lichtruc[$i]['nhom_truc'] ;
                                                
                                                for($k=0;$k< count($lichtruc[$i]['nhom_truc']);$k++)
                                                {
                                                    $string =$string.";".$lichtruc[$i]['nhom_truc'][$k];
                                                 }
                                                //  echo $string;
                                                ?>
                                                    
                                                  <a href="#" class="big-link"  onClick="addHit(<?php echo "'".$string."'" ?>)" data-reveal-id="myModal" > <?php echo "Nhóm bạn trực cùng"; ?> </a>   
                                                <script>
                                                                    function addHit(data1)
                                                                    {   
                                                                       // alert(data1);
                                                                        $.ajax({
                                                                        type: "POST",
                                                                        url: "ttsv_sinhvien.php",
                                                                        data: "data="+ data1,
                                                                        success: function(msg){
                                                                            $(".reveal-modal").html(msg).show();
                                                                        }
                                                                        });
                                                                    }

                                                    </script>   
                                                </td>
                                                <td align="center"> <input type="checkbox"> </td>
                                            </tr>
                                <?php } ?>
            </table> 
            <div id="myModal" class="reveal-modal">

                                    <a class="close-reveal-modal">&#215;</a>
            </div>	
            <?php }
 } else { 
   ?>
         <div>
                <center>   
            <img src="../images/stop.png" alt="stop" style="height:90px">
            <h2 style="line-height:130px;color:red;">Bạn chưa nhập mã sinh viên</h2>
                </center>
            </div>   
            
            
 <?php } ?>
