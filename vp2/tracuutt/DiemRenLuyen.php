
<?php 
   if($arwrk[0]['code_ser'] =='SinhvienDiemRenLuyen') 
        {    
        //$result_header = $result['ThongTinSinhVienResult']['diffgram']['DocumentElement']['ThongTinSinhVien'];
     if (isset($result['SinhvienDiemRenLuyenResult']['diffgram']['DocumentElement']['SinhvienDiemRenLuyen'])) 
        {
        $result = $result['SinhvienDiemRenLuyenResult']['diffgram']['DocumentElement']['SinhvienDiemRenLuyen'];
        //echo '<pre>'; print_r($result);echo '</pre>';
        $_SESSION['result'] = $result;
        ?>

 <div class="clr"></div>

<div id="result" class="tbl_bangdiem">
<table class="display table" >
    <tr>
        <td colspan="4" style="text-align: center">
            <br/><h2 class="phead_tientrinh" >
                <b>   ĐIỂM RÈN LUYỆN </b>
            </h2>
        </td>
    </tr>
</table>
<?php
  
      $categories ="";
      $data_lan1="";
      $string_lan1="";
       if (($result['MaSinhVien'] <> null))
       {
                $string_cate= $string_cate."'HK:".$result['HocKy']."<br/>".$result['NamHoc']."', ";
                $string_lan1 =$string_lan1."".$result['Diem'].", ";
       }
       else 
       {
            for($i=0;$i<count($result);$i++)
             {
                $string_cate= $string_cate."'HK:".$result[$i]['HocKy']."<br/>".$result[$i]['NamHoc']."', ";
                $string_lan1 =$string_lan1."".$result[$i]['Diem'].", ";
             }
                  
       }    
   $categories= "categories: [".$string_cate."]";
   $data_lan1="data: [".$string_lan1."]";

  ?>           

<script src="../js2/highcharts.js"></script>
<script src="../js2/exporting.js"></script>    
<script type="text/javascript">
$(function () {
    var chart;
         $(document).ready(function() {

        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container1',
                type: 'line'
            },
            title: {
                text: 'Biểu đồ điểm rèn luyện ',
                x: -20 //center
            },
            subtitle: {
                text: '',
                x: -20
            },
            xAxis: {
                title: {
                    text: 'Trục giá trị theo học Kỳ của năm học'
                },
                 <?php echo $categories; ?>
            },
            yAxis: {
                title: {
                    text: 'Trục điểm theo thang diểm 100'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        'Học kỳ:'+this.x +': '+ this.y +'(Điểm)';
                }
            },
            legend: {
                layout: 'vertical',
                verticalAlign: 'top',
                x: 80,
                y: 30,
                borderWidth: 0
            },
            series: [{
                name: 'Điểm rèn luyện',
                <?php echo $data_lan1; ?>
            }]
        });

   }); 
});
		</script>
<div class="clr"></div>	


 

            <center>           
            
            <?php  $_SESSION['header_title']  ='ĐIỂM RÈN LUYỆN';
                   $_SESSION['title']  ='DiemRenLuyen';
            ?>
            </center>
            <form target="_blank" action="export_diemrenluyen.php" method="post" onsubmit='
                $("#datatodisplay").val($("<div>").append( $("#ReportTable").eq(0).clone() ).html()); '>
                <div id="ReportTable" >
 <table  cellpadding="1" cellspacing="0" border="1" class="display dataTable" id="allan" >
                    <thead style="background-color:rgba(4, 99, 241, 0.73);color:white">
                            <tr> 
                                    <th class="sophieu" >Năm học</th>
                                    <th class="ngaythu">Học kỳ</th>
                                    <th class="hocky">Điểm rèn luyện</th>
                               
                            </tr>
                    </thead><br>
                    <tbody>
            <?php for($i =0; $i<Count($result); $i++)
            {
            ?>
            <tr class="gradeX">
                    <td class="center"><?php echo $result[$i]['NamHoc']; ?></td> 
                    <td class="center"><?php echo $result[$i]['HocKy']; ?></td>
                    <td class="center"><?php echo $result[$i]['Diem']; ?></td>
            </tr>
            <?php } ?>
                    </tbody>
                    </table>
                </div>
        
 <!-- end print diem ren luen -->     
    <div id="container1" class="chart"></div>             
 <div class="export"> 
    <input type="hidden" id="datatodisplay" name="datatodisplay">
    <input id="export_excel" type="submit" value="&nbsp;&nbsp;&nbsp; Xem &nbsp;&nbsp;&nbsp;">
    <input id="export_excel" onclick="printform('printdiv')" type="button" value="&nbsp;&nbsp;&nbsp; In ấn &nbsp;&nbsp;&nbsp; "> 
    </div>
            </form>
     <div style="clear:both">    </div>  
     </div>     
            <?php } else { ?>

 <div class="error">
    <center>
        <img src="../images/error.jpg" alt="stop" class="error_picture">
    <h2 style=";color:red;">Không tìm thấy điểm rèn luyện của sinh viên !</h2>
                    </center>
                </div>

     <?php } ?>
<?php } ?>