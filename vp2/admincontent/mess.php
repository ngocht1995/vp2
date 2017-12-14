<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <div>
       <center>
           <table>
               <tr>
                   <td>
                       <img src="../images/stop.jpg " style="width:60px;">
                   </td>
                   <td>
                       <center>
                           <strong style="color:red;">
                               <?php $act=$_GET['mess'];
                               if ($act==4){ $mess="Tài khoản của bạn đã bị khóa!"; }
                               if ($act==5){ $mess="Tài khoản của bạn chưa kích hoạt!"; }
                               if ($act=="noact"){ $mess="Tài khoản của bạn không được sử dụng chức năng này!"; }
                               echo $mess;
                               ?>
                           </strong>
                           <br>
                           <?php if ($act!="noact") { ?>
                           <a href="../home/index.php"> Trở lại trang chủ </a>
                           <?php } ?>
                       </center>
                   </td>
               </tr>
           </table>
       </center>
   </div>