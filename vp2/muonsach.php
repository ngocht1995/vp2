<script type="text/javascript">       
                $(document).ready(function(){
                     $("#btn_book").click(function () {
                        document.getElementById("header").style.display="none";
                        document.getElementById("table_menu").style.display="none";
                        document.getElementById("table_menu2").style.display="block"; 
                         document.getElementById("table_thongbao").style.display="none"; 

                    });
                  });
                $(document).ready(function(){
                     $("#sbtn_book").click(function () {
                        document.getElementById("header").style.display="none";
                        document.getElementById("table_menu").style.display="none";
                        document.getElementById("table_menu2").style.display="block";  
                        document.getElementById("table_thongbao").style.display="none";                
                    });
                  });      
               
                </script>  





  <?php $style_code="tracuu" ?>
 <?php// include "/include/header.php" ?>
 <div id="mainWap">
  <?php// include ("/include/top_header.php");?>
      <div id="center">
  
<?php //include ("/include/menu_navi.php");?>
                        <div id="noidung" >
<?php include ("tracuutt/ttsv_navi.php") ?>                  
       <div id="right">
         <div id="content" style="min-height:350px;">
      <script type="text/javascript">
    $(document).ready(function(){
      $("#contact").validate({
        errorElement: "span", //Thành phần HTML hiện thông báo lỗi
        //Sử dụng tùy chọn rules cho những validate không hỗ trợ bởi class name
        rules: {
          cpassword: {
            equalTo: "#password" //So sánh với trường cpassword với thành trường có id là password
          },
          min_field: { min: 5 }, //Giá trị tối thiểu
          max_field: { max : 10 }, //Giá trị tối đa
          range_field: { range: [4,10] }, //Giá trị trong khoảng từ 4 - 10
          rangelength_field: { rangelength: [4,10] } //Chiều dài chuỗi trong khoảng từ 4 - 10 ký tự
        }
      });
    });
  </script>  
      <script>
    function searchKeyPress(e)
    {
        // look for window.event in case event isn't passed in
        if (typeof e == 'undefined' && window.event) { e = window.event; }
        if (e.keyCode == 13)
        {
            document.getElementById('bnttracuu').click();
        }
    }
   
    function searchKeyPressFullName(e)
    {
        // look for window.event in case event isn't passed in
  
        if (typeof e == 'undefined' && window.event) { e = window.event; }
        if (e.keyCode == 13)
        {
            
            document.getElementById('bnttracuu_tensinhvien').click();
           
        }
    }

    </script>   
    
   <?php
   
        $conn = ew_Connect();
    // xac dinh tham do hay 
    $today = date("Y-m-d H:i:s");    
    $sSqlWrk = "Select * From `t_setting` Where (set_id=2) And (set_active=1) And (t_setting.set_date_start<='$today') And (t_setting.set_date_end>='$today')";   
    $rswrk = $conn->Execute($sSqlWrk);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    if ($rswrk) $rswrk->Close();
    $rowswrk = count($arwrk);
    if ($rowswrk){
        $thamdo=true;
        $trangthai_thamdo = $arwrk[0]['set_status'];
       $GLOBALS['content_ax'] = $arwrk[0]['set_description'];
    } else 
    {
        $thamdo=false;
        $trangthai_thamdo = '';
        $content_ax ='';
      }  
   ?>
    <style>
        div#divhoten {display: none}
        #idxacdinhhoten:hover{color:navy;text-decoration: underline;cursor: pointer}
    </style>
        <table  cellpadding="0" cellspacing="0" border="0" width="700px" class="trangchu">
            <tr>
                <td class="TrangchuHeader" align="left" > 
                    <h2 class="h2tieudecol1">
                    Nhập mã sinh viên:
                    <input onkeypress="searchKeyPress(event);" class="required" id="txtmsv" name="txtmsv" type="text"  value="" maxlength="20" />
                    <input id="bnttracuu"  type="button" value="Tra cứu thông tin" style="margin-left:10px; height:23px"  /> 
                    <span id="msgbox" style="display:none"></span>
                    <span id="idxacdinhhoten" style="font-weight:normal;color: #ffffff"> [* Tìm kiếm mã theo tên] </span>
                     </h2>
                </td>
            </tr>
            <tr>
              <td align="center"> 
                  <div id="divhoten" style="background: url('../images/img_bggd.jpg');margin-left: 3px">
                    <span style="color:#333366;font-weight: bold">Nhập tên sinh viên:</span>
                    <input onkeypress="searchKeyPressFullName(event);" class="required" id="txthoten" name="txthoten" type="text"  value="" style="width:200px;" />
                    <input id="bnttracuu_tensinhvien"  type="button" value="Tra cứu" style="margin-left:10px; height:25px"  /> 
                    <span id="msgbox" style=""><i style="color: red">(* Tên quy định là tiếng việt có dấu)</i></span>
                  </div>   
                </td>   
            </tr> 
 <script>
$("#idxacdinhhoten").click(function () {
$("#divhoten").toggle();
});
</script>
            
<script type="text/javascript">
$(document).ready(function(){
     $("#bnttracuu").click(function () {
        $("#divhoten").hide();
        $.ajax({
            type: "POST",
            data: "msv=" + $("#txtmsv").val(),
            url: "secure.php",
            success: function(msg){
                if (msg != ''){
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
<script type="text/javascript">
$(document).ready(function(){
       
     $("#bnttracuu_tensinhvien").click(function () {
        strVal=  $("#txthoten").val();;
        var outString = strVal.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]insert/gi, '');
        $.ajax({
            type: "POST",
            data: "msv_fullname=" + outString,
            url: "/tracuutt/secure_fullname.php",
            success: function(msg){
                if (msg != ''){
                   $("#htht2").html(msg).show();
                }
                else{
                    $("#htht2").html('<em>No item result</em>');
                }
            }
        });
    });
  });
</script> 
            
  </table>
        <div style="clear: both"></div>
        <div id="htht" style="color: black"></div>
                           </div>                 
        
<div class="clr"></div> 
  
 <?php include ("../include/footer.php");?>

        
