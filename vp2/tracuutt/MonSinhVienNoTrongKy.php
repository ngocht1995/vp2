
<!-- hien thi service cac khoan sinh vien con thieu-->
        <?php if($arwrk[0]['code_ser'] =='MonSinhVienNoMon') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
            if (isset($result['MonSinhVienNoMonResult']['diffgram']['DocumentElement']['MonSinhVienNoMon']))
            {  
            $result = $result['MonSinhVienNoMonResult']['diffgram']['DocumentElement']['MonSinhVienNoMon'];
            // echo '<pre>'; print_r($result);echo '</pre>';
             $_SESSION['result'] = $result;
          ?>
          <div id="result" class="tbl_bangdiem">          
                   <br/> <h2 style="font-weight: bold;color:white">MÔN THI CHƯA QUA  </h2><br/>
                    <?php  
                           $_SESSION['header_title']  ='MÔN THI CHƯA QUA';
                           $_SESSION['title']  ='CacMonSinhVienNoTrongKy';
                    ?>

                    <center>           
     
 
            </center>
             <br/>
                      
<form target="_blank" action="export_msvntk.php" method="post" onsubmit='
$("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
              
  <table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan">
    <thead style="background-color:rgba(4, 99, 241, 0.73);color:black">
        <tr> 
        <th style="text-align: center" class="center">STT</th>
        <th class="noidung center">Tên môn</th>
        <th style="text-align: center" class="center"> Điểm </th>         
             </tr>
                    </thead>
                     <tbody style="color:black">
           <?php 
               if ($result['MaSinhVien'] <> null)
                 { ?>
                      <tr class="gradeX">
                            <td align="center"><?php echo 1; ?></td>
                            <td><?php echo $result['TenMonHoc']; ?></td>
                            <td align="center"><?php echo $result['DiemMax']; ?></td>
                           
                        </tr>
         <?php } else
                 {  
                   for($i =0; $i<Count($result); $i++)
                    {
                    ?>
                       <tr class="gradeX">
                            <td align="center"><?php echo $i+1; ?></td>
                            <td><?php echo $result[$i]['TenMonHoc']; ?></td>
                            <td align="center"><?php echo $result[$i]['DiemMax']; ?></td>
                       
                        </tr>
                    <?php } 
         } ?>
                     </tbody>
                    </table>
     <div class="export"> 
     <input type="hidden" id="datatodisplay" name="datatodisplay">
        <input id="export_excel"  type="submit" style="border-radius: 25px;color:#868686;font-weight: bold;" value="Xuất file text">
            </form>
                <div style="clear:both">

            <?php } else { ?>
           <div class="gif">
                  <img src="../images/congrat.jpg" alt="stop" height="400px" width="400px">
            <h2 style="color:red;">Sinh viên đã thi qua hết tất cả các môn!</h2>
            </div>
</div>
            <?php } ?>
      <?php }?>