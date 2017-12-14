<center>
         <table style="width:840px" cellpadding="0" cellspacing="0" border="0">
              <tr>

                  <td colspan="3" style="vertical-align: top;vertical-align: central;">  
                       <img src="img_logo.png" height="78px" style="float:left">
                       <center>  
                         BỘ GIÁO DỤC ĐÀO TẠO </br>
                         <SPAN style="font-weight: bold;border-bottom: 1px solid #000000; padding-bottom:2px;"> TRƯỜNG ĐẠI HỌC DÂN LẬP HẢI PHÒNG</SPAN>
                        </center>
                   </td>
                  <td colspan="4" style="vertical-align: top;vertical-align: central;">
                      <center>
                          <B>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</B></br>
                          <SPAN style="border-bottom: 1px solid #000000; padding-bottom:2px;"> Độc lập - Tự do - Hạnh phúc </SPAN>
                     </center>
                  </td> 
                  
              </tr>   
  </table>  
           <span style="font-size:24px;padding-bottom: 10px;" ><b><?php echo $_SESSION['header_title']; ?></b></span>     
<?php  $result = $_SESSION['arraythongtin']; ?>     
           <table>
               <tr>
                   <td colspan="3" width="370px;">
                       <ul>
                          <li>Họ và tên: &nbsp;<?php echo $result['HoTen']; ?></li>
                          <li>Lớp: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $result['MaLop']; ?></li>
                          <li>Khóa học: &nbsp;<?php echo $result['TenKhoaHoc']; ?></li>
                       </ul>
                      
                   </td>
                    
                   <td colspan="3" width="370px;" >
                        <ul >
                          <li>Tình trạng: &nbsp;&nbsp;<?php echo $result['TinhTrang']; ?></li>
                          <li>Ngành học: &nbsp;<?php echo $result['TenNganh']; ?></li>
                          <li>Hệ đào tạo: &nbsp;<?php echo $result['TenHeDaoTao']; ?></li>
  
                       </ul>  
                   </td>
               </tr>                                              
   </table>