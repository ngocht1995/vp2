<!-- hien thi service thoi khoa bieu sinh viên-->



<?php
$a= Array ("blue","ENG31042");
$b = Array (1=>"blue") ;
echo $key = array_search('blue', $b); // $key = 2;
 //echo array_search($s, $b);
$array = array("blue", "red", "green", "blue", "blue");
//print_r($array);

                     
     function search_array_by_value($array, $value) {
        $results = array();
        if (is_array($array)) {
            $found = array_search($value,$array);
            if ($found) {
                $results[] = $found;
            }
            foreach ($array as $subarray)
                $results = array_merge($results, $this->_search_array_by_value($subarray, $value));
        }
        return $results;
    }  
?>
 <?php if($arwrk[0]['code_ser'] =='TKB') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['TKBResult']['diffgram']['DocumentElement']['TKB']))
            {  
            $result = $result['TKBResult']['diffgram']['DocumentElement']['TKB'];
            // echo '<pre>'; print_r($result);echo '</pre>';
             $_SESSION['result'] = $result;
          ?>
                    <center>           
                    <h2 style="font-weight: bold;color:black">THỜI KHÓA BIỂU  </h2>
                    <?php  $_SESSION['header_title']  ='THỜI KHÓA BIỂU';
                           $_SESSION['title']  ='thoikhoabieu';
                    ?>
                      
                    </center>
       <form target="_blank" action="export_tkb.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
                <link rel="stylesheet" href="../css/reveal.css">	 
  		<script type="text/javascript" src="../js/jquery.reveal.js"></script>
		<style type="text/css">
			body { font-family: "HelveticaNeue","Helvetica-Neue", "Helvetica", "Arial", sans-serif; }
			.big-link { display:block; text-align: center;color: #06f; }
                        ul.ulthoikhoabieu 
                           {  display: block;
                               clear: both; 
                             
                           }
                         ul.ulthoikhoabieu li 
                           {  
                               display:list-item;
                               list-style: disc;
                                 background: #bababa;
                              
                           }
		</style>                 
                    <table cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" style="font-size: 11px" >
                    <thead>
                            <tr> 
                                    <th class="center" style="text-align: center"> STT</th>
                                    <th class="center" style="text-align: center">Môn học</th>
                                    <th class="center" style="text-align: center">Số TC</th>
                                    <th class="center" style="text-align: center">Thời gian</th>      
                            </tr>
                    </thead>
                     <tbody>
           <?php 
               if ($result['MaPhong'] <> null)
                         { ?>
                              <tr class="gradeX">
                                    <td align="center"><?php echo '1'; ?></td>
                                    <td align="center"><?php echo $result['MaPhong']; ?></td>
                                    <td><?php echo $result['TenMonHoc']; ?></td>
                                    <td align="center"><?php echo $result['TuNgay']."/".$result['SoGiuong']; ?></td>
                                    <td align="center"><a> 
                                         <?php
                                            if (trim($result['SoSVDangO'])>0)
                                            echo  'D/s người trong phòng';
                                         ?>   
                                           </a></td>
                                    <td align="center"><a>Đặt phòng</a></td>
                                </tr>
                 <?php } else
                         {    
                       $array_mamon = array();
                       $tam=array();
                       for($i=0; $i<Count($result); $i++)
                           {
                         
                           $array_mamon[$i] = trim($result[$i]['MaMonHoc']);
                           } 
            
              // thiet lap bang tap chua chi so mon trung             
              for($i=0; $i<COUNT($array_mamon);$i++)  
                   {
                   if (in_array($i,$tam) == false)
                   {           
                   $mamon = array_keys($array_mamon,trim($result[$i]['MaMonHoc']));
                  //  print_r($mamon);
                  for($k=1;$k<count($mamon);$k++)
                    {
                       array_unshift($tam,$mamon[$k]);
                    }  
                   }        
                   }
        //     print_r($tam);
        //   exit();              
                           
                           
                        //   $mamon = array_keys($array_mamon,'ENG31035');
                       // print_r($array_mamon);
                        //   if (count($mamon) > 1) echo "MAC33022";
                       $tkb = array();   
                       $id=0;
               for($i=0; $i<Count($result);$i++)  
                   {
                   
                   $mamon = array_keys($array_mamon,trim($result[$i]['MaMonHoc']));
                   // print_r($mamon);
                   // echo "<br/>";
                if (count($mamon) > 1 )
                   {
                    $st="";
                    for ($j=0;$j<count($mamon);$j++)
                    { 
                   
                      $st="Từ ".$result[$mamon[$j]]['TuNgay']." đến ".$result[$mamon[$j]]['NgayKetThuc']; 
                      $thu="";
                      if (isset($result[$mamon[$j]]['Thu2']) && ($result[$mamon[$j]]['Thu2'] <> "")) 
                      {   
                          $x=$result[$mamon[$j]]['Thu2'] + $result[$mamon[$j]]['SoTiet'];
                          $thu=$thu."Thứ 2: tiết".$result[$mamon[$j]]['Thu2']." - ".$x;
                      } 
                      if (isset($result[$mamon[$j]]['Thu3']) && ($result[$mamon[$j]]['Thu3'] <> "")) 
                      {
                          $x=$result[$mamon[$j]]['Thu3'] + $result[$mamon[$j]]['SoTiet'];
                          $thu= $thu."Thứ 3: tiết ".$result[$mamon[$j]]['Thu3']." - ".$x;   
                      }        
                      if (isset($result[$mamon[$j]]['Thu4']) && ($result[$mamon[$j]]['Thu4'] <> ""))  
                      {
                          $x=$result[$mamon[$j]]['Thu4'] + $result[$mamon[$j]]['SoTiet'];
                          $thu= $thu."Thứ 4: tiết ".$result[$mamon[$j]]['Thu4']." - ".$x;
                      }
                         
                      if (isset($result[$mamon[$j]]['Thu5']) && ($result[$mamon[$j]]['Thu5'] <> ""))  
                      {   
                          $x=$result[$mamon[$j]]['Thu5'] + $result[$mamon[$j]]['SoTiet'];
                          $thu= $thu."Thứ 5: tiết ".$result[$mamon[$j]]['Thu5']." - ".$x;
                      }
                      if (isset($result[$mamon[$j]]['Thu6']) && ($result[$mamon[$j]]['Thu6'] <> ""))  
                      {
                          $x=$result[$mamon[$j]]['Thu6'] + $result[$mamon[$j]]['SoTiet'];
                          $thu= $thu."Thứ 6: tiết ".$result[$mamon[$j]]['Thu6']." - ".$x;;
                      }  
                         
                      if (isset($result[$mamon[$j]]['Thu7']) && ($result[$mamon[$j]]['Thu7'] <> "")) 
                      {
                          $x=$result[$mamon[$j]]['Thu7'] + $result[$mamon[$j]]['SoTiet'];
                          $thu= $thu."Thừ 7: tiết ".$result[$mamon[$j]]['Thu7']." - ".$x;;
                      }
                      if (isset($result[$mamon[$j]]['CN']) && ($result[$mamon[$j]]['Cn'] <> ""))      
                      {
                          $x=$result[$mamon[$j]]['CN'] + $result[$mamon[$j]]['SoTiet'];
                          $thu= $thu."Chủ Nhật: ".$result[$mamon[$j]]['CN']." - ".$x;;
                      } 
                      
                      if (in_array($i,$tam) == false) {  
                      $a=$result[$i]['MaMonHoc'].": ".$st."<br/>".$thu."<br/>";
                     //   echo $a;
                       array_unshift($tkb,$a);
                       $id = $id+1;
                      }   
                    }  
                   }
                  
                 // echo  count($tkb);
                
                  
                 // print_r($tkb);
   //   echo "<br/>";   
                
                 //   echo $st;
//                      if (count($mamon)>1)
//                      {  
//                         for($i=0; $i<Count($result);$i++)
//                           { 
//                              for ($j=0;$j< count($mamon);$j++)
//                              {
//                                if($i == $mamon[$j])
//                                {
//                                   $thu =$result[$i]['SoTuanHoc'];
//                                    $tungay = $tungay .' '.$result[$i]['TuNgay']."-".$result[$i]['NgayKetThuc']."-".$thu."<br/>";
//                                }
//                              }
//                            
//                           }
//                      }
//                      else 
//                      {
//                            $tungay = $tungay .' '.$result[$i]['TuNgay']."-".$result[$i]['NgayKetThuc']."-".$thu."<br/>"; 
//                      }    
//                            echo "<br/>".$tungay;
                    }
                    print_r($tkb);
                            ?>           
                            <?php 
                 } ?>
                     </tbody>
                    </table>
              <div id="myModal" class="reveal-modal">
	              
			<a class="close-reveal-modal">&#215;</a>
		</div>
                </div>
                <div style="padding:30px 0px 10px 0px">
                    <center>
                <input type="hidden" id="datatodisplay" name="datatodisplay">

                    </center>
                </div>
      </form>
                <div style="clear:both">

            <?php } else { ?>
            <div style="padding-left:20px;">
            <img src="../images/stop.png" alt="stop" style="height: 130px">
            <h2 style="line-height:130px;color:red;">Không tồn tại phòng trống trong khách sạn sinh viên !</h2>
            </div>

            <?php } ?>
      <?php }?>