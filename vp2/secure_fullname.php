<style type="text/css">
 input{border-radius: 15px;position: relative;bottom: 3px}
    select{border-radius: 15px;}
</style>
<?php
//session_start(); // Initialize session data
//ob_start(); // Turn on output buffering
?>
<?php //include "/admincontent/ewcfg6.php" ?>
<?php// include "/admincontent/ewmysql6.php" ?>
<?php //include "/admincontent/phpfn6.php" ?>
<?php //include "/admincontent/userinfo.php" ?>
<?php// include "/admincontent/userfn6.php" ?>
<?php include "/admincontent/lib/nusoap.php" ?>
<?php
// header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
// header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
// header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache"); // HTTP/1.0
?>
<?php error_reporting (E_ALL ^ E_NOTICE); 
      ini_set( 'display_errors', 'off' );
?>
 <style type="text/css" title="currentStyle">
                            @import "/media/css/demo_page.css";
                            @import "/media/css/demo_table.css";
                    </style>
                    <script type="text/javascript"  src="/media/js/jquery.js" ></script>
                    <script type="text/javascript"  src="/media/js/jquery.dataTables.js"/></script>
                    <script type="text/javascript" charset="utf-8">
                            $(document).ready(function() {
                                    $('.dataTable').dataTable();
                            } );
                    </script>
<?php

$msv_fullname=KillChars((htmlspecialchars($_POST['msv_fullname'],ENT_QUOTES)));
$name = $msv_fullname;
function split_name($name, $prefix='')
{
  $pos = strrpos($name, ' ');

  if ($pos === false) {
    return array(
     $prefix . 'firstname' => $name,
     $prefix . 'surname' => null
    );
  }

  $firstname = substr($name, 0, $pos + 1);
  $surname = substr($name, $pos);

  return array(
    $prefix . 'firstname' => $firstname,
    $prefix . 'surname' => $surname
  );
}
// Usage
$array_hoten=split_name($name) ;
Function Get_arrayservice_hoten($ho,$ten,$modul)
{
        // Include gói thư viện nusoap
        //require_once('./lib/nusoap.php');
        // Tạo một thể hiện client
        $server = new soap_server();
        // Cài đặt hỗ trợ WSDL
        $wsdl = "http://10.1.0.236:8088/HPUWebService.asmx?wsdl";
        $client = new nusoap_client($wsdl,'wsdl');
        // Hiển thị utf-8 
        $client->soap_defencoding = 'UTF-8';
        $client->decode_utf8 = false;
        //here is the only change you need to do.
            // Kiểm tra xem có lỗi không
            $err = $client->getError();
            if ($err) {
            // Hiển thị lỗi
            echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
            // Đặt những đoạn code xử lý khi có lỗi phát sinh của bạn ở đây
            } 
        $para = array('hodem' => $ho,'ten' => $ten);
        $result = $client->call($modul,$para);
        // Kiểm tra xem có lỗi phát sinh không, bạn có thể tự định nghĩa một lỗi Fault để xử lý những lỗi về nhập liệu
        if ($client->fault) {
            echo '<h2>Fault</h2><pre>';
            print_r($result);
            echo '</pre>';
                } else {
            // Kiểm tra xem có lỗi client không
            $err = $client->getError();
            if ($err) {
                // Hiển thị lỗi
                echo '<h2>Error</h2><pre>' . $err . '</pre>';
            } else {
            $data = $result;
        }
      }  
      return $data;
} 
$result= Get_arrayservice_hoten(trim($array_hoten['firstname']),trim($array_hoten['surname']),'TimKiemTheoTen');
// print_r($result);
 if (isset($result['TimKiemTheoTenResult']['diffgram']['DocumentElement']['TimKiemTheoTen'])) 
   { 
        $result = $result['TimKiemTheoTenResult']['diffgram']['DocumentElement']['TimKiemTheoTen'];
   }
   if ($result['MaSinhVien'] <> null || $result[0]['MaSinhVien'] <> null)
   {
?>
    <div id="result" class="tbl_bangdiem"> <br>                                     
  <table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" >
                    <thead style="background-color:rgba(4, 99, 241, 0.73);color:white">
                            <tr> 
                                <th style="text-align: center">TT</th>
                                <th style="text-align: center">Mã sinh viên</th>
                                <th style="text-align: center">Họ tên</th>
                                <th style="text-align: center">Ngày sinh</th>
                                <th style="text-align: center">Lớp</th>
                            </tr>
                    </thead>
                    <tbody>
                       <?php 
                         if ($result['MaSinhVien'] <> null)
                           { ?>
                           
                          
                            <tr class="gradeX">
                                    <td align='center' class="center"><?php echo $i+1; ?></td> 
                                    <td align='center' class="center"><a href="#" id="idmasinhvien"><?php echo $result['MaSinhVien']; ?></a>
                                    <input hidden="true" class="required" id="txt_msv" name="txtmsv" type="text"  value="<?php echo trim($result['MaSinhVien']);?>"  />
                                    </td>
                                    <td align='center' class="center"><?php echo $result['HoDem']." ".$result['Ten'] ; ?></td>
                                    <td align='center' class="center"><?php echo $result['NgaySinh']; ?></td>  
                                    <td align='center' class="center"><?php echo $result['MaLop']; ?></td>   
                            </tr>
 <script type="text/javascript">
$(document).ready(function(){
     $("#idmasinhvien").click(function () {
         $("#divhoten").hide();
        $.ajax({
            type: "POST",
            data: "msv="+$("#txt_msv").val(),
            url: "secure.php",
            success: function(msg){
                if (msg != ''){
                   $("#txtmsv").val($("#txt_msv").val());
                   $("#htht").html(msg).show();  
                }
                else{
                    $("#htht").html('<em>No item result</em>');
                }
            }
        });
    });
  });
</script> 
           
                   
                          <?php } else {?>
                           <?php for($i =0; $i<Count($result); $i++)
                                  {   ?>
                            <tr class="gradeX">
                                    <td align='center' class="center"><?php echo $i+1; ?></td> 
                                    <td align='center' class="center"><a href="#" id="idmasinhvien_<?php echo $i?>"><?php echo $result[$i]['MaSinhVien']; ?></a>
                                    <input hidden="true"   class="required" id="txt_msv_<?php echo $i?>" name="txtmsv" type="text"  value="<?php echo trim($result[$i]['MaSinhVien']);?>"  />
                                    </td>
                                    <td align='center' class="center"><?php echo $result[$i]['HoDem']." ".$result[$i]['Ten'] ; ?></td>
                                    <td align='center' class="center"><?php echo $result[$i]['NgaySinh']; ?></td>   
                                    <td align='center' class="center"><?php echo $result[$i]['MaLop']; ?></td>   
                            </tr>
 <script type="text/javascript">
$(document).ready(function(){
     $("#idmasinhvien_<?php echo $i?>").click(function () {
         $("#divhoten").hide();
        $.ajax({
            type: "POST",
            data: "msv="+$("#txt_msv_<?php echo $i?>").val(),
            url: "secure.php",
            success: function(msg){
                if (msg != ''){
                   $("#txtmsv").val($("#txt_msv_<?php echo $i?>").val());
                   $("#htht").html(msg).show();  
                }
                else{
                    $("#htht").html('<em>No item result</em>');
                }
            }
        });
    });
  });
</script> 
                            
                   <?php } ?>
                          <?php } ?>
                    </tbody>
        </table>
         <div style="padding:30px 0px 10px 0px; position: relative;top: 35px;height: 20px"> 
   
</div>
</div>
    <div id="htht" style="color: black"></div>   
 <?php } else { ?>
    <div>
     <center>    
    <img src="../images/stop.png" alt="stop" style="height: 130px">
    <h2 style="line-height:130px;color:red;">Không tồn tại tên sinh viên trong trường!</h2>
    </center>
   </div>
    
 <?php } ?>
