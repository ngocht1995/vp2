<script type="text/javascript">       
               eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('$(0).9(5(){$("#f").7(5(){0.2("6").1.3="4";0.2("8").1.3="4";0.2("c").1.3="4";0.2("a").1.3="4";0.2("e").1.3="d";0.2("b").1.3="4"})});$(0).9(5(){$("#g").7(5(){0.2("6").1.3="4";0.2("8").1.3="4";0.2("c").1.3="4";0.2("a").1.3="4";0.2("e").1.3="d";0.2("b").1.3="4"})});',17,17,'document|style|getElementById|display|none|function|header|click|table_menu|ready|table_menu3|table_thongbao|table_menu2|block|table_menu4|btn_faq|sbtn_faq'.split('|'),0,{}))

                </script>  

<head>
      <a href="cauhoi/cauhoi.php" style="">
    <button type="button" class="btn btn-success">  Đặt câu hỏi</button>  </a>
     <a href="cauhoi/traloi.php">
    <button type="button" class="btn btn-warning" >Trả lời</button></a>
    <a href="cauhoi/Questionsdaylist.php">
     <button type="button" class="btn btn-danger" >Câu hỏi  </button></a>

</head>
             
                             <br><br><h2 class="h2tieude" style="text-align: center;" ><b>CÂU HỎI FAQ</b></h2><br>
             
                                
                <table  cellpadding="0" cellspacing="0" border="0"  class="trangchu">
                <tr><td height="10px"></td></tr>        
                                    <tr>
                            <td align="left"   >
                                                    
                                                            <?php
                                        //phan trang
                                      //  include 'pagding.php';
                                        
                                        $conn = ew_Connect();
                                        
                                       //$p = KillChars(htmlspecialchars($_GET['p']),ENT_QUOTES);// currentPage
                                        $rows = 15; // số record trên mỗi trang
                                        $div = 12; // số trang trên 1 phân đoạn
                                         $sql = "SELECT COUNT(*) AS total FROM `t_question` WHERE status_faq = 1 AND s_public = 1 ORDER By Datetime_h  DESC ";
                                       
                                // $sql = "Select * From `t_cat_question`";
                                                        // echo $sSqlWrk;
                                                    $rswrk = $conn->Execute($sql);
                                                    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                                    if ($rswrk) $rswrk->Close();
                                                    $rowswrk = count($arwrk);
                                                    $total = $arwrk[0][0];        
                                                    $start =  0*$rows;
                                    $sql = "SELECT * FROM `t_question` WHERE status_faq = 1 AND s_public = 1 ORDER By Datetime_h  DESC LIMIT  $start,$rows";
                                    //echo $sql;
                                    $rswrk = $conn->Execute($sql);
                                    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
                                    if ($rswrk) $rswrk->Close();
                                    $rowswrk = count($arwrk);
                                     for($i=0;$i<$rowswrk;$i++)
                                {


                                $num = $arwrk[$i]['s_number'];
                                $ID =$arwrk[$i]['question_id'];
                                $IDCard =$arwrk[$i]['IDcard'];
                                $datetime  = new Datetime($arwrk[$i]['datetime_h']);
                                //  $moth =  date ( " m ", $datetime );
                                $moth =  $datetime->format ( "m");
                                //$date = date ( " d ", $datetime ); 
                                $date = $datetime->format ( "d");
                                //$year =  date( " Y ", $datetime ); 
                                $year =  $datetime->format ( "Y");
                                $hour =  $datetime->format ( "H"); 
                                $min =$datetime->format ( "i");
                                $content = " ";
                                //  echo  date_format( $datetime, 'Y-m-d H:i:s');
                                // echo $datetime ;
                            switch ($num) {
                            case 0:
                            $content = $arwrk[$i]['content'];
                            break;
                            case 1:
                            $content = $arwrk[$i]['content'];
                            break;
                            case 2:
                            $content = $arwrk[$i]['content1'];
                            break;
                                case 3:
                            $content = $arwrk[$i]['content2'];
                            break;
                            }
                                $content1 = $content ; 
                            if(strlen($content)>300)
                            $content = ew_TruncateMemo($content,300,true)."...";
                    
                 
?>    

                                                           <b><li><a  title="<?php echo $content1;?>" href="cauhoi/faqdt.php?id=<?php echo $ID; ?>"><?php echo $content ?> &nbsp; <span style="font-style: italic;color:#fc9603;  "><?php// echo $hour. "h" . $min . " ".  $date . "/" .$moth . "/".$year ; ?></span></a></li></a></li><br></b>
                                                            
                                                
<?php }?>
    
                                                       
                            
                                                           <ul class="trang">
                                                            <a href="http://vp1.hpu.edu.vn/cauhoi/subfaq.php?p=0">>>>Xem thêm..</a>
                            </ul>

                                                      
                            
                            </td>
                            
                        </tr>
                        
                    </table>
               
 <?php //include ("../include/footer.php");?>

