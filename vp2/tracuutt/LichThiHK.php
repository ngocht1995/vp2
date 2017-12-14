<!-- hien thi service Lich thi trong ky cua sinh vien-->

<?php if($arwrk[0]['code_ser'] =='LichThiHK') 
        {    
   
   $str=substr(ew_CurrentDate(), 0, 4) ;
   $num =((int)$str).'-'.((int)$str+1);
   $num1 =((int)$str-1).'-'.((int)$str);
   
?>  
<style>
    h2.phead_tientrinh {font-size: 16px;}
    h2.h2error {display: none;}
    
</style>
<table style="width: 100%">
    <tr>
        <td colspan="4" style="text-align: center">
            <h2 class="phead_tientrinh">
                <b> Lịch Thi Học Kỳ </b>
          
            </h2>
        </td>
    </tr>
    
    <tr>
        <td colspan="4">

            <div style="padding:5px;background: #bababa;width:98%;margin: 10px 0px 10px 0px"> 
            <label><b>Năm học: </b></label>
            <select style="padding:2px" id="c_namhoc">
                <option value="<?php echo  $num ?>"><?php echo  $num ?></option>
                <option value="<?php echo  $num1 ?>"><?php echo  $num1 ?></option>
            </select>
            <label><b>Học kỳ: </b></label>
            <select style="padding:2px" id="c_hocky">
                <option value="">Lựa chọn học kỳ</option>
                <option value="1">Học kỳ I</option>
                <option value="2">Học kỳ II</option>
                <option value="3">Học kỳ III</option>
            </select>
              <label><b>Lần thi:</b> </label>
            <select style="padding:2px" id="c_lanthi">
                <option value=""> Lựa chọn lần thi</option>
                <option value="1"> Lần 1</option>
                <option value="2"> Lần 2</option>
                <option value="3"> Lần 3</option>
            </select>
              <input id="id_hienthi" type="button" value="Hiển thị lịch thi">
            </div>
        </td>
    </tr>
</table>
 <script type="text/javascript">
$(document).ready(function(){
     $("#id_hienthi").click(function () {
        if ($("select#c_hocky option:selected").val() == '') {
                      alert('Cần chọn chọn học kỳ');
                       return false;
                   } 
        if ($("select#c_lanthi option:selected").val() == '') {
                      alert('Cần chọn chọn lần thi');
                       return false;
                   } 
        if ($("#txtmsv").val() == '') {
                      alert('Cần nhập mã sinh viên');
                       return false;
                   } 
      $("#lichthihk").html('<center style="margin-top:100px"><img  src="../images/common/ajax-loading.gif">...process...</center>');
       $.ajax({
            type: "POST",
            data: "msv="+$("#txtmsv").val()+"&c_namhoc="+$("select#c_namhoc option:selected").val()+"&c_hocky="+$("select#c_hocky option:selected").val()+"&c_lanthi="+$("select#c_lanthi option:selected").val(),
            url: "../tracuutt/Get_LichThiHK.php",
            success: function(msg){
                if (msg != ''){
                   $("#lichthihk").html(msg).show();
                }
                else{
                    $("#lichthihk").html('<em>No item result</em>');
                }
            }
        });
    });
  });
</script> 
<div id="lichthihk">

</div>

  <?php }?>