<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "../admincontent/ewcfg6.php" ?>
<?php include "../admincontent/ewmysql6.php" ?>
<?php include "../admincontent/phpfn6.php" ?>
<?php include "../admincontent/userinfo.php" ?>
<?php include "../admincontent/userfn6.php" ?>
<?php include "../admincontent/lib/nusoap.php" ?>
<?php include "../admincontent/httpful/httpful-0.2.0.phar" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
 <style type="text/css" title="currentStyle">
                            @import "media/css/demo_page.css";
                            @import "media/css/demo_table.css";
                    </style>
                    <script type="text/javascript"  src="media/js/jquery.js" ></script>
                    <script type="text/javascript"  src="media/js/jquery.dataTables.js"/></script>
                    
 <?php error_reporting (E_ALL ^ E_NOTICE); 
      ini_set( 'display_errors', 'off' );
?> 
<?php
  
 $msv="1412101135"; //KillChars(htmlspecialchars($_POST['msv'],ENT_QUOTES));
 $c_namhoc="2017-2018"; //KillChars(htmlspecialchars($_POST['c_namhoc'],ENT_QUOTES));
 $c_hocky="1";//KillChars(htmlspecialchars($_POST['c_hocky'],ENT_QUOTES));
 $c_lanthi="1";//KillChars(htmlspecialchars($_POST['c_lanthi'],ENT_QUOTES));
 $para = array('masinhvien' => $msv,'namhoc' => $c_namhoc,'hocky' => $c_hocky,'lanthi' => $c_lanthi);
 $name_modul = 'LichThiHK';
Function Get_arrayservice_array ($para,$name_modul)
{
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
                    $result = $client->call($name_modul,$para);
                    if ($client->fault) {
                     echo '<h2 style="text-align: center">Server mất kết nối</h2><pre>';
                    } else {
                    // Kiểm tra xem có lỗi client không
                    $err = $client->getError();
                    if ($err) {
                        // Hiển thị lỗi
                        echo '<h2>Error</h2><pre>' . $err . '</pre>';
                    } else {
                    // Trường hợp không có lỗi, hiển thị kết quả trả về từ web service
                   // echo '<h2>Fault</h2><pre>'; print_r($result);echo '</pre>';
                      $data = $result;

                }
            } 
        return $data;
}

?>
 <?php
$result =  Get_arrayservice_array ($para,$name_modul);
  if (isset($result['LichThiHKResult']['diffgram']['DocumentElement']['LichThiHK'])) 
            {  
            // echo '<pre>'; print_r($result);echo '</pre>';
             $result = $result['LichThiHKResult']['diffgram']['DocumentElement']['LichThiHK'];
             $_SESSION['result'] = $result;
          ?>
<script>
$(document).ready( function () {
  $('.dataTablethihk').dataTable( {
    "bSort": false
  } );
} );
</script>
<div id="ReportTable" >

               <form target="_blank"  method="post">


                    <table cellpadding="1" cellspacing="0" border="1" class="display dataTablethihk" id="allan" style="font-size: 12px;width: 100%">
                    <thead>
                            <tr> 
                                    <th style="text-align: center;width: 10%" class="center"> Thời gian </th>
                                    <th style="text-align: center;width: 15%">Mã lớp</th>
                                    <th style="text-align: center;width: 33%">Tên môn học</th>
                                    <th style="text-align: center;width: 15%" class="center"> Địa điểm </th> 
                                    <th style="text-align: center;width: 12%" class="center"> Hình thức thi </th> 
                                    <th style="text-align: center;width: 15%" class="center"> Ghi chú</th> 
                            </tr>
                    </thead>
                     <tbody>
           <?php 
               if ($result['Malop'] <> null)
                         { ?>
                              <tr class="gradeX">
                                    <td align="center">
                                        <?php 
                                    $date = date_create($result['ngay']);
                                    echo date_format($date, 'd/m/Y')."<br/>". $result['gio']; ?> 
                                    </td>
                                    <td><?php echo $result['Malop']; ?></td>
                                    <td><?php echo $result['TenMonHoc']; ?></td>
                                    <td align="center"><?php echo $result['DD_thi']; ?></td>
                                    <td align="center"><?php echo $result['HT_Thi']; ?></td>
                                    <td align="center"><?php echo $result['GhiChu']; ?></td>
                                </tr>
                 <?php } else
                         {  
                           for($i =0; $i<Count($result); $i++)
                            {
                            ?>
                               <tr class="gradeX">
                                    <td align="center"><?php 
                                    $date = date_create($result[$i]['ngay']);
                                    echo date_format($date, 'd/m/Y')."<br/>". $result[$i]['gio']; ?></td>
                                    <td><?php echo $result[$i]['Malop']; ?></td>
                                    <td><?php echo $result[$i]['TenMonHoc']; ?></td>
                                    <td align="center"><?php echo $result[$i]['DD_thi']; ?></td>
                                    <td align="center"><?php echo $result[$i]['HT_Thi']; ?></td>
                                    <td align="center"><?php echo $result[$i]['GhiChu']; ?></td>
                               
                                </tr>
                            <?php } 
                 } ?>
                     </tbody>
                    </table>       
   </div>
                <div style="padding:30px 0px 10px 0px">
                    <center>
                <input type="hidden" id="datatodisplay" name="datatodisplay">
                 <h2 style="line-height:30px;color:red;">Lịch thi của sinh viên sẽ được cập nhật thường xuyên!</h2>
                    </center>
                </div>
            </form>
                <div style="clear:both">

            <?php } else { ?>
             <div>
            <h2 style="line-height:130px;color:red;">Chưa có lịch thi của sinh viên trong học kỳ!</h2>
            
            </div>
 <?php } ?>