<?php
switch ($style_code)
{
    case 'trangchu':
        $style_active1="class=\"menua_active\"";
        break;
    case 'datcauhoi':
        $style_active2="class=\"menua_active\"";
         break;
     case 'traloi':
        $style_active3="class=\"menua_active\""; 
          break;
    case 'faq':
        $style_active4="class=\"menua_active\"";
         break;
     case 'raovat':
        $style_active5="class=\"menua_active\"";
          break;
     case 'thongbao':
        $style_active6="class=\"menua_active\"";
         break;
      case 'tracuu':
        $style_active7="class=\"menua_active\"";
          break;
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="menu">
        <ul >
        <li><a <?php echo $style_active1 ?>  href="..">Trang chủ</a></li>
        <li><a <?php echo $style_active2 ?> href="../Cauhoi/cauhoi.php">Đặt câu hỏi</a></li>
        <li><a <?php echo $style_active3 ?> href="../Cauhoi/Traloi.php">Trả lời</a></li>
        <li><a <?php echo $style_active4 ?> href="../Cauhoi/faq.php">Faq</a></li>
        <li><a <?php echo $style_active5 ?> href="http://hpu.edu.vn/thoikhoabieu"> Thời khóa biểu</a></li>
        <li><a <?php echo $style_active6 ?> href="../notice_message/ds_notice.php">Thông báo</a></li>
        <li><a <?php echo $style_active7 ?> href="../tracuutt/">Tra cứu</a></li>
        </ul>

</div>