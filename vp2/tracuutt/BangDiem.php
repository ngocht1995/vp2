
<?php 
   if($arwrk[0]['code_ser'] =='BangDiem') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
     if (isset($result['BangDiemResult']['diffgram']['DocumentElement']['BangDiem'])) 
        {
        $result = $result['BangDiemResult']['diffgram']['DocumentElement']['BangDiem'];
        //echo '<pre>'; print_r($result);echo '</pre>';
        $_SESSION['result'] = $result;
        $_SESSION['result_core'] = $result;
        
      
        ?>

<div class="bangdiem">
    <center>

<select class="bangdiem_sl" name="search_scores"  id="search_scores_id">
                     <option value="0">Bảng điểm rút gọn</option>
					<option value="1">Bảng điểm chi tiết </option>
					<option value="2">Thang điểm 4</option>
					<option value="3">Thang điểm chữ</option>
					
</select>
   </center>
</div>
<div style="clear: both"></div>
 <script type="text/javascript">
$(document).ready(function(){
  //  $("#a1").hide();
    $("#search_scores_id").change( function() {
        $("#result").html('Retrieving ...');
        $.ajax({
            type: "POST",
            data: "data=" + $(this).val(),
            url: "tracuutt/score_detail.php",
            success: function(msg){
                if (msg != ''){
                   $("#abc").html(msg).show();

                    $("#result").html('');
                }
                else{
                    $("#result").html('<em>No item result</em>');
                }
            }
        });
    });
});
</script>
<div id="abc">
   
</div>
<div id="result" class="tbl_bangdiem">

            <form target="_blank" action="export_bangdiem.php?data=1" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html());'>
            
      <table  cellspacing="0" border="1" class="display dataTable" id="allan">
                    <thead style="background-color:rgba(4, 99, 241, 0.73); color:white">
                            <tr> 
                                    <th class="sotien">Môn học</th>
                                    <th class="namhoc">ĐQT</th>
                                    <th class="hocky">Điểm Thi1</th>
                                    <th class="phieuhuy"> Tổng I </th>
                                    <th class="hocky">Điểm Thi2</th>
                                    <th class="phieuhuy"> Tổng II </th>
                                    <th class="phieuhuy"> KQ </th>
                            
                            </tr>
                    </thead>
                    <tbody>
                    <?php 
                  if ($result['TenMocHoc'] <> null)
                         { 
                   ?>   
                        <tr class="gradeX">
                              <?php 
                                if ( ($result['DiemTH1'] < 5) && ($result['DiemTH2'] <5))
                                {
                                    $style="red";
                                    $kq= "x_x";
                                }
                                else 
                                {
                                     $style="";
                                    $kq= "";
                                }    
                            ?>
                 
<td style="" title="<?php echo $result[$i]['MaMonHoc']; ?>"> <?php echo $result[$i]['TenMocHoc']; ?> </td>
<td class="center"><?php echo $result[$i]['DQT']; ?></td>
<td class="center"><?php echo $result[$i]['DiemThi1']; ?></td>
<td class="center"><?php echo $result[$i]['DiemTH1']; ?></td>
<td class="center"><?php echo $result[$i]['DiemThi2']; ?></td>
<td class="center"><?php echo $result[$i]['DiemTH2']; ?></td>  
<td class="center" style="background: <?php echo $style  ?>"> <?php echo $kq ?></td> 
                          
                            </tr>
                    <?PHP } ELSE { ?>
                         <tr class="gradeX">
                              <?php for($i =0; $i<Count($result); $i++)
                            {
                                if ( ($result[$i]['DiemTH1'] < 5) && ($result[$i]['DiemTH2'] <5))
                                {
                                    $style="red";
                                    $kq= "x_x";
                                }
                                else 
                                {
                                     $style="";
                                    $kq= "";
                                }    
                            ?>
                             
        <td  style="" title="<?php echo $result[$i]['MaMonHoc']; ?>"> <?php echo $result[$i]['TenMocHoc']; ?> </td>
        <td class="center"><?php echo $result[$i]['DQT']; ?></td>
        <td class="center"><?php echo $result[$i]['DiemThi1']; ?></td>
        <td class="center"><?php echo $result[$i]['DiemTH1']; ?></td>
        <td class="center"><?php echo $result[$i]['DiemThi2']; ?></td>
        <td class="center"><?php echo $result[$i]['DiemTH2']; ?></td>  
        <td class="center" style="background: <?php echo $style  ?>"> <?php echo $kq ?></td> 
                    
                            </tr>
                    <?PHP } ?>
                       
                            <?php } ?>
                    </tbody>
                    </table>
  <div class="export"> 
     <input type="hidden" id="datatodisplay" name="datatodisplay">
        <input id="export_excel" type="submit" style="border-radius: 25px;color:#868686;font-weight: bold;" value="Xuất file text">
            </form>
</div></div>
 <div style="clear:both"></div>

            <?php } else { ?>

<div class="error">
    <center>
    <img src="../images/error.jpg" alt="stop" class="error_picture">
  <h2 style="color:red;">Không tồn tại bảng điểm của sinh viên !</h2>
                </center>
                </div>

     <?php } ?>
<?php } ?>