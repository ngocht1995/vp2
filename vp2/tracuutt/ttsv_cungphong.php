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
    if ($_POST['data'] <> null)
        
    {
        $maphong=(htmlspecialchars($_POST['data'],ENT_QUOTES));
        $result= Get_arrayservice_id('Maphong',$maphong,'PhongSV');   
        if (isset($result['PhongSVResult']['diffgram']['DocumentElement']['PhongSV'])) 
        {
            $result = $result['PhongSVResult']['diffgram']['DocumentElement']['PhongSV'];
        ?>

<table>
    <tr>
       <?php  
          for($i=0;$i < count ($result);$i++) 
               {
                    $data = $result[$i]['AnhSinhVien'];
                    $file = Getimgservice1($data,$result[$i]['MaSinhVien']);
             ?>
        <td> 
            <div><img height="160" width="120" id="sinhvien" class="sinhvien" style="margin-bottom:50px;" src="<?php echo $file ?>" /></div>
            <div style="position: absolute;top:220px;">
            <p style="width: 120px;font-size: 11px;color:navy"> <?php echo $result[$i]['HoDem']." ".$result[$i]['Ten']?> </p>
            <p style="width: 120px;font-size: 11px;color:navy">Lớp: <?php echo $result[$i]['MaLop']?> <p>
            <p style="width: 120px;font-size: 11px;color:navy">MSV: <?php echo $result[$i]['MaSinhVien']?> <p>     
            </div>  
        </td>   
          <?php    
               }
          ?>
    </tr>
</table>
	
        <?php     
        }
    }     

  ?>
