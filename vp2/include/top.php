
    <ul class="ultop">
    <?php if(IsLoggedIn()) {?>    
     <li><a style="color:#ff9933;font-size: 12px;"  href="../admincontent/index.php" ><?php echo  "Xin chào: ".CurrentFullUserName() ?> </a>&nbsp;</li>
     |  <li><a style="color:#ff9933;font-size: 12px" href="../admincontent/logout.php">Thoát </a>&nbsp;</li>
    <?php } else 
    {?>
    <li><a href="../admincontent/login.php" style="font-size: 12px;color:#ffffff;">Đăng nhập</a></li>
     |  <li><a style="font-size: 12px;color:#ffffff;" href="http://acc.hpu.edu.vn"> Đăng ký</a></li>
    <?php } ?>
      <li>| <a href="../cauhoi/Search.php" style="font-size: 12px;color:#ffffff;">Tìm kiếm</a></li>
    </ul>
