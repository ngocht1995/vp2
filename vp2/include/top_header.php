 <!-- begin header -->
 <script>
     function CodeKeyPress(e)
    {
         if (typeof e == 'undefined' && window.event) { e = window.event; }
            if (e.keyCode == 13)
            {
                document.getElementById('btnGui').click();
            }
    }
 
 
 </script>
  <div id="header"> 
    <center>
       <table style="width:906px;">
          <tr>
             <td style="float:left;">
              <h2 style="font-size: 24px;line-height: 68px;background: url('../images/img_logo.png') no-repeat;background-size:62px;padding-left:75px" >Support Online</h2>
             </td>
             <td style="float:right;"> 
                 <?php include ("../include/top.php");?>    
              <ul class="search">
                <li>
                    <form method="Post" name="myFormTop" action="../cauhoi/Traloi.php"  >
                        <input onkeypress="CodeKeyPress(event);" name="txtMaCauHoi"  placeholder="Nhập mã câu hỏi"  class="search" type="text" style="text-align: center;font-weight: bold;color:red" maxlength="11" autocomplete="off" />
                        <input hidden="true" style="display: none;" name="submit" type="submit" id="btnGui" value="Tìn kiếm" />
                    </form>
              </li>
             </ul>
              </td>
          </tr>
       </table>       
     </center> 
 </div> 
    <!-- End header -->
        <hr  />
        <div class="linetop"/> </div>
        <div class="clr"></div>