 <center>
         <table >
              <tr>
                  <td width="78px">  <img src="img_logo.png" height="78px"></td>
                    <td width="290px"style="text-align:center;">     
         
                         BỘ GIÁO DỤC ĐÀO TẠO </br>
                         <SPAN style="font-weight: bold;border-bottom: 1px solid #000000; padding-bottom:2px;"> TRƯỜNG ĐẠI HỌC DÂN LẬP HẢI PHÒNG</SPAN>
                 
                   </td>
                  <td width="370px" style="text-align:center;v">
                      <center>
                      <center>
                          <B>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</B></br>
                          <SPAN style="border-bottom: 1px solid #000000; padding-bottom:2px;"> Độc lập - Tự do - Hạnh phúc </SPAN>
                     </center>	       
              
                   </td>
              </tr>   
             <tr>
                 <td colspan="3" style="text-align:center"> <font size="18"><?php echo $_SESSION['header_title']; ?></font></td>
             </tr>
          </table>  
                <div></div>
          <?php  $result = $_SESSION['arraythongtin']; ?> 
          <table style="width:740px;padding-left: 10px;">
              
              <tr>
                  <td>   
                        <ul>
                          <li>Họ và tên: &nbsp;<?php echo $result['HoTen']; ?></li>
                          <li>Lớp: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $result['MaLop']; ?></li>
                          <li>Khóa học: &nbsp;<?php echo $result['TenKhoaHoc']; ?></li>
                       </ul> 
                   </td>
                    
                 <td width="370px;" >
                       <ul >
                          <li>Tình trạng: &nbsp;&nbsp;<?php echo $result['TinhTrang']; ?></li>
                          <li>Ngành học: &nbsp;<?php echo $result['TenNganh']; ?></li>
                          <li>Hệ đào tạo: &nbsp;<?php echo $result['TenHeDaoTao']; ?></li>
                       </ul>   
                   </td>
               </tr>       
                            
                           
           </table>
                <div></div>   