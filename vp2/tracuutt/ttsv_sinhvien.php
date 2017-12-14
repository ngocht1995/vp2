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
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php error_reporting (E_ALL ^ E_NOTICE); 
      ini_set( 'display_errors', 'off' );
?>
<?php



 Function Getimgservice1 ($data,$mssv) 
  {
        // begin display images
        //Save a Base64 Encoded Canvas image to a png file using PHP 
        $img = str_replace('data:image/jpg;base64,', '', $data);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file =  $mssv.'.jpg';
        $success = file_put_contents($file, $data);
        //print $success ? $file : 'Unable to save the file.';
        return $file;
  }
// print_r($_SESSION['mongcaithien']);
  ?> 
<center><h2 style="font-weight:bold;">Danh Sách Những Bạn Trực Nhật Cùng</h2></center>
<table>
    <tr>
 <?php 
   if ($_POST['data'] <> null)    
    {
        
        $array_masinhvien =split(";",$_POST['data']);
        for($k=1;$k<count($array_masinhvien);$k++)
        {
        $mainhvien=(htmlspecialchars($array_masinhvien[$k],ENT_QUOTES));
        $result= Get_arrayservice($mainhvien,'ThongTinSinhVien');   
       if (isset($result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'])) 
          { 
            $result = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
        ?>


       <?php 
        //echo '<pre>'; print_r($result);echo '</pre>';
        $data = $result['AnhSinhVien'];
        $file = Getimgservice1($data,$result['MaSinhVien']);
       ?>
        <td> 
        <center>
            <div><img height="160" width="120" id="sinhvien" class="sinhvien" style="margin-bottom:50px;" src="<?php echo $file ?>" /></div>
            <div style="position: absolute;top:220px;">
            <p style="width: 120px;font-size: 11px;color:navy"> <?php echo $result['HoDem']." ".$result['Ten']?> </p>
            <p style="width: 120px;font-size: 11px;color:navy">Lớp: <?php echo $result['MaLop']?> <p>
            <p style="width: 120px;font-size: 11px;color:navy">MSV: <?php echo $result['MaSinhVien']?> <p>     
            </div>
       </center>    
        </td>   
          <?php    
               }
          ?>
        <?php     
     }     
  }
  ?>
    </tr>
</table>
         