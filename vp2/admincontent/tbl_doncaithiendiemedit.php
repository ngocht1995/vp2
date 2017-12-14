<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "tbl_doncaithiendieminfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "userfn6.php" ?>
<?php include "securimage.php" ?>
<?php include "../admincontent/lib/nusoap.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Define page object
$tbl_doncaithiendiem_edit = new ctbl_doncaithiendiem_edit();
$Page =& $tbl_doncaithiendiem_edit;

// Page init processing
$tbl_doncaithiendiem_edit->Page_Init();

// Page main processing
$tbl_doncaithiendiem_edit->Page_Main();
?>
<?php include "header.php" ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_doncaithiendiem_edit = new ew_Page("tbl_doncaithiendiem_edit");

// page properties
tbl_doncaithiendiem_edit.PageID = "edit"; // page ID
var EW_PAGE_ID = tbl_doncaithiendiem_edit.PageID; // for backward compatibility

// extend page with ValidateForm function
tbl_doncaithiendiem_edit.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_msv"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Msv");
		elm = fobj.elements["x" + infix + "_msv"];
		if (elm && !ew_CheckInteger(elm.value))
			return ew_OnError(this, elm, "Incorrect integer - Msv");
		elm = fobj.elements["x" + infix + "_hoten_sinhvien"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Hoten Sinhvien");
		elm = fobj.elements["x" + infix + "_ngay_sinh"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Ngay Sinh");
		elm = fobj.elements["x" + infix + "_ngay_sinh"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Ngay Sinh");
		elm = fobj.elements["x" + infix + "_lop_sinhhoat"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Lop Sinhhoat");
		elm = fobj.elements["x" + infix + "_so_dienthoai"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - So Dienthoai");
		elm = fobj.elements["x" + infix + "_momthi_chinh"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Momthi Chinh");
		elm = fobj.elements["x" + infix + "_lop_tinchi"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Lop Tinchi");
		elm = fobj.elements["x" + infix + "_hoc_ky"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Hoc Ky");
		elm = fobj.elements["x" + infix + "_nam_hoc1"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Nam Hoc 1");
		elm = fobj.elements["x" + infix + "_diem"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Diem");
		elm = fobj.elements["x" + infix + "_monthi_lan2"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Monthi Lan 2");
		elm = fobj.elements["x" + infix + "_thoigian_h"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Thoigian H");
		elm = fobj.elements["x" + infix + "_ngay_thi"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Please enter required field - Ngay Thi");
		elm = fobj.elements["x" + infix + "_ngay_thi"];
		if (elm && !ew_CheckEuroDate(elm.value))
			return ew_OnError(this, elm, "Incorrect date, format = dd/mm/yyyy - Ngay Thi");

		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
tbl_doncaithiendiem_edit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_doncaithiendiem_edit.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_doncaithiendiem_edit.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_doncaithiendiem_edit.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<link rel="stylesheet" type="text/css" media="all" href="calendar/calendar-win2k-1.css" title="win2k-1">
<script type="text/javascript" src="calendar/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<script type="text/javascript" src="calendar/calendar-setup.js"></script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->
 function thongbao(name) { // DO NOT CHANGE THIS LINE!
      alert('Nếu thay đổi thông tin '+ name + ' bạn phải vào chức năng thông tin cá nhân dể thay đổi giá trị !');
 	// Your custom validation code here, return false if invalid. 
 }
function thongbao_tt(name) { // DO NOT CHANGE THIS LINE!
      alert('Thông tin trên không được thay đổi !');
 	// Your custom validation code here, return false if invalid. 
 }
</script>
<?php
 $result= Get_arrayservice1('1112404061','MonDuocPhepCaiThienDiem');
 if (isset($result['MonDuocPhepCaiThienDiemResult']['diffgram']['DocumentElement']['uspMonDuocPhepCaiThienDiem']))
            {  
            $mon_caithien = $result['MonDuocPhepCaiThienDiemResult']['diffgram']['DocumentElement']['uspMonDuocPhepCaiThienDiem'];
            // echo '<pre>'; print_r($mon_caithien);echo '</pre>';     
            $_SESSION['mongcaithien'] =$mon_caithien;
            }
  $tenmon="";  
  $tenmon ="'".$mon_caithien[0]['TenMonHoc']."'";
    
  for ($i=1;$i<count($mon_caithien);$i++)
  {
       $tenmon = $tenmon.", '".$mon_caithien[$i]['TenMonHoc']."'";
  }
$sSqlWrk = "Select * From tbl_phieucanhan where  (active=1) and  (msv= ". $_SESSION['arraythongtin']['MaSinhVien'].") LIMIT 0,1";
$rswrk = $conn->Execute($sSqlWrk);
$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
if ($rswrk) $rswrk->Close();
$date = date_create($arwrk[0]['ngaysinh']);
$ngaysinh= date_format($date, 'd/m/Y');

   ?>
<p>
   <table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Sửa - Đơn xin cải thiện điểm</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table> 
<a href="<?php echo $tbl_doncaithiendiem->getReturnUrl() ?>"><?php echo Lang_pic("<img border=\"0\" src=\"images/cmd_trove.gif\">"); ?></a></span></p>
<?php $tbl_doncaithiendiem_edit->ShowMessage() ?>
<form name="ftbl_doncaithiendiemedit" id="ftbl_doncaithiendiemedit" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return tbl_doncaithiendiem_edit.ValidateForm(this);">
<p>
<input type="hidden" name="a_table" id="a_table" value="tbl_doncaithiendiem">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table cellspacing="0" class="ewTable">
<?php if ($tbl_doncaithiendiem->msv->Visible) { // msv ?>
	<tr<?php echo $tbl_doncaithiendiem->msv->RowAttributes ?>>
		<td class="ewTableHeader">Mã sinh viên<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_doncaithiendiem->msv->CellAttributes() ?>><span id="el_msv">
<input readonly="true" onclick="thongbao_tt('mã sinh viên')" style="background: #bababa" type="text" name="x_msv" id="x_msv" size="10" value="<?php echo $arwrk[0]['msv'] ?>"<?php echo $tbl_doncaithiendiem->msv->EditAttributes() ?>>
<b>Mail xác thực</b>
<input onclick="thongbao('mail xác thực')" readonly="true" style="background: #bababa" type="text" name="x_email" id="x_email" size="50" value="<?php echo $arwrk[0]['e_mail'] ?>"<?php echo $tbl_doncaithiendiem->msv->EditAttributes() ?>>
</span><?php echo $tbl_doncaithiendiem->msv->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->hoten_sinhvien->Visible) { // hoten_sinhvien ?>
	<tr<?php echo $tbl_doncaithiendiem->hoten_sinhvien->RowAttributes ?>>
		<td class="ewTableHeader">Họ tên sinh viên<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_doncaithiendiem->hoten_sinhvien->CellAttributes() ?>><span id="el_hoten_sinhvien">
                <input onclick="thongbao('Họ tên sinh viên')" readonly="true" style="background: #bababa" type="text" name="x_hoten_sinhvien" id="x_hoten_sinhvien" size="82" maxlength="200" value="<?php echo ew_HtmlEncode($arwrk[0]['hoten']) ?>"<?php echo $tbl_doncaithiendiem->hoten_sinhvien->EditAttributes() ?>>
</span><?php echo $tbl_doncaithiendiem->hoten_sinhvien->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->ngay_sinh->Visible) { // ngay_sinh ?>
	<tr<?php echo $tbl_doncaithiendiem->ngay_sinh->RowAttributes ?>>
		<td class="ewTableHeader">Ngày sinh<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_doncaithiendiem->ngay_sinh->CellAttributes() ?>><span id="el_ngay_sinh">
                        <input type="text" name="x_ngay_sinh" onclick="thongbao_tt('ngày sinh')" readonly="true" style="background: #bababa" id="x_ngay_sinh" value="<?php echo $ngaysinh  ?>"<?php echo $tbl_doncaithiendiem->ngay_sinh->EditAttributes() ?>>
&nbsp;<img src="images/calendar.png" id="cal_x_ngay_sinh" name="cal_x_ngay_sinh" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_ngay_sinh", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_ngay_sinh" // ID of the button
});
</script>
</span><?php echo $tbl_doncaithiendiem->ngay_sinh->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->lop_sinhhoat->Visible) { // lop_sinhhoat ?>
	<tr<?php echo $tbl_doncaithiendiem->lop_sinhhoat->RowAttributes ?>>
		<td class="ewTableHeader">Lớp sinh hoạt<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_doncaithiendiem->lop_sinhhoat->CellAttributes() ?>><span id="el_lop_sinhhoat">
<input onclick="thongbao_tt('lớp sinh hoạt')" readonly="true" style="background: #bababa" type="text" name="x_lop_sinhhoat" id="x_lop_sinhhoat" size="30" maxlength="100" value="<?php echo $arwrk[0]['lop'] ?>"<?php echo $tbl_doncaithiendiem->lop_sinhhoat->EditAttributes() ?>>
</span><?php echo $tbl_doncaithiendiem->lop_sinhhoat->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->so_dienthoai->Visible) { // so_dienthoai ?>
	<tr<?php echo $tbl_doncaithiendiem->so_dienthoai->RowAttributes ?>>
		<td class="ewTableHeader">Số điện thoại<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_doncaithiendiem->so_dienthoai->CellAttributes() ?>><span id="el_so_dienthoai">
<input onclick="thongbao('điện thoại liên lạc')" readonly="true" style="background: #bababa" type="text" name="x_so_dienthoai" id="x_so_dienthoai" size="30" maxlength="30" value="<?php echo $arwrk[0]['dtdc_khicanlh'] ?>"<?php echo $tbl_doncaithiendiem->so_dienthoai->EditAttributes() ?>>
</span><?php echo $tbl_doncaithiendiem->so_dienthoai->CustomMsg ?></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->momthi_chinh->Visible) { // momthi_chinh ?>
	<tr<?php echo $tbl_doncaithiendiem->momthi_chinh->RowAttributes ?>>
		<td class="ewTableHeader">Môn thi chính<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_doncaithiendiem->momthi_chinh->CellAttributes() ?>><span id="el_momthi_chinh">
   <script>
                $(function() {
                var itemList=[
                 <?php echo $tenmon; ?>
                ];
                $("input#x_momthi_chinh").autocomplete({
                source: itemList
                });
                });
                </script>
       <input onChange="Deductions();"  name="x_momthi_chinh" id="x_momthi_chinh" size="35"  value="<?php echo $tbl_doncaithiendiem->momthi_chinh->EditValue ?>">
       </span><?php echo $tbl_doncaithiendiem->momthi_chinh->CustomMsg ?>
                     <b>Lớp tín chỉ <span class="ewRequired">&nbsp;*</span></b>
       <input type="text" name="x_lop_tinchi" id="x_lop_tinchi" size="30" maxlength="200" value="<?php echo strtoupper($tbl_doncaithiendiem->lop_tinchi->EditValue) ?>"<?php echo $tbl_doncaithiendiem->lop_tinchi->EditAttributes() ?>>
                
                </td>
       
	</tr>
<?php } ?>

 <script type="text/javascript">
$(document).ready(function(){
  //  $("#a1").hide();
    $("#x_momthi_chinh").keypress( function() {
        $("#result").html('Retrieving ...');
        //alert($(this).val());
        $.ajax({
            type: "POST",
            data: "data=" + $(this).val(),
            url: "getttdiem.php",
            success: function(msg){
                   $("#abc").html(msg).show();
                
            }
        });
    });
});
</script>  

 <?php if ($tbl_doncaithiendiem->lop_tinchi->Visible) { // lop_tinchi ?>
	<tr<?php echo $tbl_doncaithiendiem->lop_tinchi->RowAttributes ?>>
		<td class="ewTableHeader">Mã môn <span class="ewRequired">&nbsp;*</span> <br/><br/>
                    Môn thi cải thiện <span class="ewRequired">&nbsp;*</span>
                </td>
		<td<?php echo $tbl_doncaithiendiem->lop_tinchi->CellAttributes() ?>><span id="el_lop_tinchi">
</span><?php echo $tbl_doncaithiendiem->lop_tinchi->CustomMsg ?>
           <div id="abc">
                 <input style="background: #bababa" onclick="thongbao('mã môn')" readonly="true"  type="text" name="x_ma_mon" id="x_ma_mon" size="20" maxlength="100" value="<?php echo $tbl_doncaithiendiem->ma_mon->EditValue ?>" <?php echo $tbl_doncaithiendiem->ma_mon->EditAttributes() ?> >
               <b>Học kỳ</b>
                <input style="background: #bababa" onclick="thongbao('học kỳ')" readonly="true" type="text" name="x_hoc_ky" id="x_hoc_ky" size="5" maxlength="100" value="<?php echo $tbl_doncaithiendiem->hoc_ky->EditValue ?>"<?php echo $tbl_doncaithiendiem->hoc_ky->EditAttributes() ?>>
                <b>Năm học</b>
                 <input style="background: #bababa" onclick="thongbao('năm học')" type="text" name="x_nam_hoc1" id="x_nam_hoc1" size="30" maxlength="50" value="<?php echo $tbl_doncaithiendiem->nam_hoc1->EditValue ?>"<?php echo $tbl_doncaithiendiem->nam_hoc1->EditAttributes() ?>>
              <b>Điểm</b>
                <input style="background: #bababa" onclick="thongbao('điểm')" readonly="true" type="text" name="x_diem" id="x_diem" size="5" maxlength="3" value="<?php echo $tbl_doncaithiendiem->diem->EditValue ?>"<?php echo $tbl_doncaithiendiem->diem->EditAttributes() ?>>
                <i>(* điểm được tính theo thang điểm 10)</i>
                   <?php echo $tbl_doncaithiendiem->diem->CustomMsg ?> <br/>
                 <input style="background: #bababa" onclick="thongbao('môn thi cải thiện')" readonly="true" type="text" name="x_monthi_lan2" id="x_monthi_lan2" size="70" maxlength="200" value="<?php echo $tbl_doncaithiendiem->monthi_lan2->EditValue ?>"<?php echo $tbl_doncaithiendiem->monthi_lan2->EditAttributes() ?>>
                </td>
            </div>
	</tr>
<?php } ?>    


<?php if ($tbl_doncaithiendiem->thoigian_h->Visible) { // thoigian_h ?>
	<tr<?php echo $tbl_doncaithiendiem->thoigian_h->RowAttributes ?>>
		<td class="ewTableHeader">Thời gian thi<span class="ewRequired">&nbsp;*</span></td>
		<td<?php echo $tbl_doncaithiendiem->thoigian_h->CellAttributes() ?>><span id="el_thoigian_h">
<input type="text" name="x_thoigian_h" id="x_thoigian_h" size="5" maxlength="2" value="<?php echo $tbl_doncaithiendiem->thoigian_h->EditValue ?>"<?php echo $tbl_doncaithiendiem->thoigian_h->EditAttributes() ?>>
</span><?php echo $tbl_doncaithiendiem->thoigian_h->CustomMsg ?>
                (h)
                <input type="text" name="x_thoigian_phut" id="x_thoigian_phut" size="3" maxlength="2" value="<?php echo $tbl_doncaithiendiem->thoigian_phut->EditValue ?>"<?php echo $tbl_doncaithiendiem->thoigian_phut->EditAttributes() ?>>
                (phút)    <b>&nbsp; &nbsp;Ngày thi <span class="ewRequired">&nbsp;*</span></b>
                <span id="el_ngay_thi">
                    <input type="text" name="x_ngay_thi" id="x_ngay_thi" value="<?php echo $tbl_doncaithiendiem->ngay_thi->EditValue ?>"<?php echo $tbl_doncaithiendiem->ngay_thi->EditAttributes() ?>>
                    &nbsp;<img src="images/calendar.png" id="cal_x_ngay_thi" name="cal_x_ngay_thi" alt="Pick a date" style="cursor:pointer;cursor:hand;">
                    <script type="text/javascript">
                    Calendar.setup({
                        inputField : "x_ngay_thi", // ID of the input field
                        ifFormat : "%d/%m/%Y", // the date format
                        button : "cal_x_ngay_thi" // ID of the button
                    });
                    </script>
                 </span>
                   <i>(* Định dạng ngày tháng (dd/mm/yyyy)</i>
                </td>
	</tr>
<?php } ?>
       <tr>
<td class="ewTableHeader">Mã xác nhận</td>
	<td>
		<img src="securimage_show.php?sid=<?php echo md5(uniqid(time())); ?>" id="image" align="absmiddle">
		<a href="securimage_play.php" style="font-size: 13px"><img src="images/audio_icon.gif" id="audio" align="absmiddle" border="0"></a><br>
		<a href="#" onclick="document.getElementById('image').src = 'securimage_show.php?sid=' + Math.random(); return false">Tải lại ảnh</a><br>
		<input type="text" name="x_maxacnhan" id="x_maxacnhan" size="30" maxlength="4">
                <input hidden="TRUE" type="text" name="x_file_name" id="x_file_name" size="30" maxlength="200" value="<?php echo $tbl_doncaithiendiem->file_name->EditValue ?>"<?php echo $tbl_doncaithiendiem->file_name->EditAttributes() ?>>
        </td>
        </tr>
 
</table>
</div>
</td></tr></table>
<input type="hidden" name="x_phieucaithiendiem_id" id="x_phieucaithiendiem_id" value="<?php echo ew_HtmlEncode($tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue) ?>">
<p>
<input type="submit" name="btnAction" id="btnAction" value="   Xác nhận sửa đơn   ">
</form>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php include "footer.php" ?>
<?php

//
// Page Class
//
class ctbl_doncaithiendiem_edit {

	// Page ID
	var $PageID = 'edit';

	// Table Name
	var $TableName = 'tbl_doncaithiendiem';

	// Page Object Name
	var $PageObjName = 'tbl_doncaithiendiem_edit';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $tbl_doncaithiendiem;
		if ($tbl_doncaithiendiem->UseTokenInUrl) $PageUrl .= "t=" . $tbl_doncaithiendiem->TableVar . "&"; // add page token
		return $PageUrl;
	}

	// Message
	function getMessage() {
		return @$_SESSION[EW_SESSION_MESSAGE];
	}

	function setMessage($v) {
		if (@$_SESSION[EW_SESSION_MESSAGE] <> "") { // Append
			$_SESSION[EW_SESSION_MESSAGE] .= "<br>" . $v;
		} else {
			$_SESSION[EW_SESSION_MESSAGE] = $v;
		}
	}

	// Show Message
	function ShowMessage() {
		if ($this->getMessage() <> "") { // Message in Session, display
			echo "<p><span class=\"ewMessage\">" . $this->getMessage() . "</span></p>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}
	}

	// Validate Page request
	function IsPageRequest() {
		global $objForm, $tbl_doncaithiendiem;
		if ($tbl_doncaithiendiem->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($tbl_doncaithiendiem->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($tbl_doncaithiendiem->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ctbl_doncaithiendiem_edit() {
		global $conn;

		// Initialize table object
		$GLOBALS["tbl_doncaithiendiem"] = new ctbl_doncaithiendiem();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'tbl_doncaithiendiem', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $tbl_doncaithiendiem;
		global $Security;
		$Security = new cAdvancedSecurity();
		if (!$Security->IsLoggedIn()) $Security->AutoLogin();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->TablePermission_Loading();
		$Security->LoadCurrentUserLevel($this->TableName);
		$Security->TablePermission_Loaded();
		if (!$Security->IsLoggedIn()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		if (!$Security->CanEdit()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("tbl_doncaithiendiemlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();

		// Global page loading event (in userfn6.php)
		Page_Loading();

		// Page load event, used in current page
		$this->Page_Load();
	}

	//
	//  Page_Terminate
	//  - called when exit page
	//  - if URL specified, redirect to the URL
	//
	function Page_Terminate($url = "") {
		global $conn;

		// Page unload event, used in current page
		$this->Page_Unload();

		// Global page unloaded event (in userfn*.php)
		Page_Unloaded();

		 // Close Connection
		$conn->Close();

		// Go to URL if specified
		if ($url <> "") {
			ob_end_clean();
			header("Location: $url");
		}
		exit();
	}

	// 
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsFormError, $tbl_doncaithiendiem;

		// Load key from QueryString
		if (@$_GET["phieucaithiendiem_id"] <> "")
			$tbl_doncaithiendiem->phieucaithiendiem_id->setQueryStringValue($_GET["phieucaithiendiem_id"]);

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_edit"] <> "") {
			$tbl_doncaithiendiem->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$tbl_doncaithiendiem->CurrentAction = ""; // Form error, reset action
				$this->setMessage($gsFormError);
				$this->RestoreFormValues();
			}
		} else {
			$tbl_doncaithiendiem->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue == "")
			$this->Page_Terminate("tbl_doncaithiendiemlist.php"); // Invalid key, return to list
		switch ($tbl_doncaithiendiem->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					$this->setMessage("No records found"); // No record found
					$this->Page_Terminate("tbl_doncaithiendiemlist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$tbl_doncaithiendiem->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					$this->setMessage("Update succeeded"); // Update success
					$sReturnUrl = $tbl_doncaithiendiem->getReturnUrl();
					if (ew_GetPageName($sReturnUrl) == "tbl_doncaithiendiemview.php")
						$sReturnUrl = $tbl_doncaithiendiem->ViewUrl(); // View paging, return to view page with keyurl directly
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Render the record
		$tbl_doncaithiendiem->RowType = EW_ROWTYPE_EDIT; // Render as edit
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $tbl_doncaithiendiem;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $tbl_doncaithiendiem;
		$tbl_doncaithiendiem->msv->setFormValue($objForm->GetValue("x_msv"));
		$tbl_doncaithiendiem->hoten_sinhvien->setFormValue($objForm->GetValue("x_hoten_sinhvien"));
		$tbl_doncaithiendiem->ngay_sinh->setFormValue($objForm->GetValue("x_ngay_sinh"));
		$tbl_doncaithiendiem->ngay_sinh->CurrentValue = ew_UnFormatDateTime($tbl_doncaithiendiem->ngay_sinh->CurrentValue, 7);
		$tbl_doncaithiendiem->lop_sinhhoat->setFormValue($objForm->GetValue("x_lop_sinhhoat"));
		$tbl_doncaithiendiem->so_dienthoai->setFormValue($objForm->GetValue("x_so_dienthoai"));
		$tbl_doncaithiendiem->momthi_chinh->setFormValue($objForm->GetValue("x_momthi_chinh"));
		$tbl_doncaithiendiem->ma_mon->setFormValue($objForm->GetValue("x_ma_mon"));
		$tbl_doncaithiendiem->lop_tinchi->setFormValue($objForm->GetValue("x_lop_tinchi"));
		$tbl_doncaithiendiem->hoc_ky->setFormValue($objForm->GetValue("x_hoc_ky"));
		$tbl_doncaithiendiem->nam_hoc1->setFormValue($objForm->GetValue("x_nam_hoc1"));
		$tbl_doncaithiendiem->nam_hoc2->setFormValue($objForm->GetValue("x_nam_hoc2"));
		$tbl_doncaithiendiem->diem->setFormValue($objForm->GetValue("x_diem"));
		$tbl_doncaithiendiem->monthi_lan2->setFormValue($objForm->GetValue("x_monthi_lan2"));
		$tbl_doncaithiendiem->thoigian_h->setFormValue($objForm->GetValue("x_thoigian_h"));
		$tbl_doncaithiendiem->thoigian_phut->setFormValue($objForm->GetValue("x_thoigian_phut"));
		$tbl_doncaithiendiem->ngay_thi->setFormValue($objForm->GetValue("x_ngay_thi"));
		$tbl_doncaithiendiem->ngay_thi->CurrentValue = ew_UnFormatDateTime($tbl_doncaithiendiem->ngay_thi->CurrentValue, 7);
		$tbl_doncaithiendiem->ngay_tao_don->setFormValue($objForm->GetValue("x_ngay_tao_don"));
		$tbl_doncaithiendiem->ngay_tao_don->CurrentValue = ew_UnFormatDateTime($tbl_doncaithiendiem->ngay_tao_don->CurrentValue, 7);
		$tbl_doncaithiendiem->email->setFormValue($objForm->GetValue("x_email"));
		$tbl_doncaithiendiem->note->setFormValue($objForm->GetValue("x_note"));
		$tbl_doncaithiendiem->status_email->setFormValue($objForm->GetValue("x_status_email"));
		$tbl_doncaithiendiem->nguoidung_id->setFormValue($objForm->GetValue("x_nguoidung_id"));
		$tbl_doncaithiendiem->date_time_edit->setFormValue($objForm->GetValue("x_date_time_edit"));
		$tbl_doncaithiendiem->date_time_edit->CurrentValue = ew_UnFormatDateTime($tbl_doncaithiendiem->date_time_edit->CurrentValue, 7);
		$tbl_doncaithiendiem->file_name->setFormValue($objForm->GetValue("x_file_name"));
		$tbl_doncaithiendiem->phieucaithiendiem_id->setFormValue($objForm->GetValue("x_phieucaithiendiem_id"));
              
	}

	// Restore form values
	function RestoreFormValues() {
		global $tbl_doncaithiendiem;
		$tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue = $tbl_doncaithiendiem->phieucaithiendiem_id->FormValue;
		$this->LoadRow();
		$tbl_doncaithiendiem->msv->CurrentValue = $tbl_doncaithiendiem->msv->FormValue;
		$tbl_doncaithiendiem->hoten_sinhvien->CurrentValue = $tbl_doncaithiendiem->hoten_sinhvien->FormValue;
		$tbl_doncaithiendiem->ngay_sinh->CurrentValue = $tbl_doncaithiendiem->ngay_sinh->FormValue;
		$tbl_doncaithiendiem->ngay_sinh->CurrentValue = ew_UnFormatDateTime($tbl_doncaithiendiem->ngay_sinh->CurrentValue, 7);
		$tbl_doncaithiendiem->lop_sinhhoat->CurrentValue = $tbl_doncaithiendiem->lop_sinhhoat->FormValue;
		$tbl_doncaithiendiem->so_dienthoai->CurrentValue = $tbl_doncaithiendiem->so_dienthoai->FormValue;
		$tbl_doncaithiendiem->momthi_chinh->CurrentValue = $tbl_doncaithiendiem->momthi_chinh->FormValue;
		$tbl_doncaithiendiem->ma_mon->CurrentValue = $tbl_doncaithiendiem->ma_mon->FormValue;
		$tbl_doncaithiendiem->lop_tinchi->CurrentValue = $tbl_doncaithiendiem->lop_tinchi->FormValue;
		$tbl_doncaithiendiem->hoc_ky->CurrentValue = $tbl_doncaithiendiem->hoc_ky->FormValue;
		$tbl_doncaithiendiem->nam_hoc1->CurrentValue = $tbl_doncaithiendiem->nam_hoc1->FormValue;
		$tbl_doncaithiendiem->nam_hoc2->CurrentValue = $tbl_doncaithiendiem->nam_hoc2->FormValue;
		$tbl_doncaithiendiem->diem->CurrentValue = $tbl_doncaithiendiem->diem->FormValue;
		$tbl_doncaithiendiem->monthi_lan2->CurrentValue = $tbl_doncaithiendiem->monthi_lan2->FormValue;
		$tbl_doncaithiendiem->thoigian_h->CurrentValue = $tbl_doncaithiendiem->thoigian_h->FormValue;
		$tbl_doncaithiendiem->thoigian_phut->CurrentValue = $tbl_doncaithiendiem->thoigian_phut->FormValue;
		$tbl_doncaithiendiem->ngay_thi->CurrentValue = $tbl_doncaithiendiem->ngay_thi->FormValue;
		$tbl_doncaithiendiem->ngay_thi->CurrentValue = ew_UnFormatDateTime($tbl_doncaithiendiem->ngay_thi->CurrentValue, 7);
		$tbl_doncaithiendiem->ngay_tao_don->CurrentValue = $tbl_doncaithiendiem->ngay_tao_don->FormValue;
		$tbl_doncaithiendiem->ngay_tao_don->CurrentValue = ew_UnFormatDateTime($tbl_doncaithiendiem->ngay_tao_don->CurrentValue, 7);
		$tbl_doncaithiendiem->email->CurrentValue = $tbl_doncaithiendiem->email->FormValue;
		$tbl_doncaithiendiem->note->CurrentValue = $tbl_doncaithiendiem->note->FormValue;
		$tbl_doncaithiendiem->status_email->CurrentValue = $tbl_doncaithiendiem->status_email->FormValue;
		$tbl_doncaithiendiem->nguoidung_id->CurrentValue = $tbl_doncaithiendiem->nguoidung_id->FormValue;
		$tbl_doncaithiendiem->date_time_edit->CurrentValue = $tbl_doncaithiendiem->date_time_edit->FormValue;
		$tbl_doncaithiendiem->date_time_edit->CurrentValue = ew_UnFormatDateTime($tbl_doncaithiendiem->date_time_edit->CurrentValue, 7);
		$tbl_doncaithiendiem->file_name->CurrentValue = $tbl_doncaithiendiem->file_name->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $tbl_doncaithiendiem;
		$sFilter = $tbl_doncaithiendiem->KeyFilter();

		// Call Row Selecting event
		$tbl_doncaithiendiem->Row_Selecting($sFilter);

		// Load sql based on filter
		$tbl_doncaithiendiem->CurrentFilter = $sFilter;
		$sSql = $tbl_doncaithiendiem->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$tbl_doncaithiendiem->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $tbl_doncaithiendiem;
		$tbl_doncaithiendiem->phieucaithiendiem_id->setDbValue($rs->fields('phieucaithiendiem_id'));
		$tbl_doncaithiendiem->loaidon_id->setDbValue($rs->fields('loaidon_id'));
		$tbl_doncaithiendiem->nhomdon_id->setDbValue($rs->fields('nhomdon_id'));
		$tbl_doncaithiendiem->msv->setDbValue($rs->fields('msv'));
		$tbl_doncaithiendiem->hoten_sinhvien->setDbValue($rs->fields('hoten_sinhvien'));
		$tbl_doncaithiendiem->ngay_sinh->setDbValue($rs->fields('ngay_sinh'));
		$tbl_doncaithiendiem->lop_sinhhoat->setDbValue($rs->fields('lop_sinhhoat'));
		$tbl_doncaithiendiem->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$tbl_doncaithiendiem->momthi_chinh->setDbValue($rs->fields('momthi_chinh'));
		$tbl_doncaithiendiem->ma_mon->setDbValue($rs->fields('ma_mon'));
		$tbl_doncaithiendiem->lop_tinchi->setDbValue($rs->fields('lop_tinchi'));
		$tbl_doncaithiendiem->hoc_ky->setDbValue($rs->fields('hoc_ky'));
		$tbl_doncaithiendiem->nam_hoc1->setDbValue($rs->fields('nam_hoc1'));
		$tbl_doncaithiendiem->nam_hoc2->setDbValue($rs->fields('nam_hoc2'));
		$tbl_doncaithiendiem->diem->setDbValue($rs->fields('diem'));
		$tbl_doncaithiendiem->monthi_lan2->setDbValue($rs->fields('monthi_lan2'));
		$tbl_doncaithiendiem->thoigian_h->setDbValue($rs->fields('thoigian_h'));
		$tbl_doncaithiendiem->thoigian_phut->setDbValue($rs->fields('thoigian_phut'));
		$tbl_doncaithiendiem->ngay_thi->setDbValue($rs->fields('ngay_thi'));
		$tbl_doncaithiendiem->ngay_tao_don->setDbValue($rs->fields('ngay_tao_don'));
		$tbl_doncaithiendiem->email->setDbValue($rs->fields('email'));
		$tbl_doncaithiendiem->note->setDbValue($rs->fields('note'));
		$tbl_doncaithiendiem->status_email->setDbValue($rs->fields('status_email'));
		$tbl_doncaithiendiem->status->setDbValue($rs->fields('status'));
		$tbl_doncaithiendiem->active->setDbValue($rs->fields('active'));
		$tbl_doncaithiendiem->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$tbl_doncaithiendiem->date_time_add->setDbValue($rs->fields('date_time_add'));
		$tbl_doncaithiendiem->date_time_edit->setDbValue($rs->fields('date_time_edit'));
		$tbl_doncaithiendiem->file_name->setDbValue($rs->fields('file_name'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $tbl_doncaithiendiem;

		// Call Row_Rendering event
		$tbl_doncaithiendiem->Row_Rendering();

		// Common render codes for all row types
		// msv

		$tbl_doncaithiendiem->msv->CellCssStyle = "";
		$tbl_doncaithiendiem->msv->CellCssClass = "";

		// hoten_sinhvien
		$tbl_doncaithiendiem->hoten_sinhvien->CellCssStyle = "";
		$tbl_doncaithiendiem->hoten_sinhvien->CellCssClass = "";

		// ngay_sinh
		$tbl_doncaithiendiem->ngay_sinh->CellCssStyle = "";
		$tbl_doncaithiendiem->ngay_sinh->CellCssClass = "";

		// lop_sinhhoat
		$tbl_doncaithiendiem->lop_sinhhoat->CellCssStyle = "";
		$tbl_doncaithiendiem->lop_sinhhoat->CellCssClass = "";

		// so_dienthoai
		$tbl_doncaithiendiem->so_dienthoai->CellCssStyle = "";
		$tbl_doncaithiendiem->so_dienthoai->CellCssClass = "";

		// momthi_chinh
		$tbl_doncaithiendiem->momthi_chinh->CellCssStyle = "";
		$tbl_doncaithiendiem->momthi_chinh->CellCssClass = "";

		// ma_mon
		$tbl_doncaithiendiem->ma_mon->CellCssStyle = "";
		$tbl_doncaithiendiem->ma_mon->CellCssClass = "";

		// lop_tinchi
		$tbl_doncaithiendiem->lop_tinchi->CellCssStyle = "";
		$tbl_doncaithiendiem->lop_tinchi->CellCssClass = "";

		// hoc_ky
		$tbl_doncaithiendiem->hoc_ky->CellCssStyle = "";
		$tbl_doncaithiendiem->hoc_ky->CellCssClass = "";

		// nam_hoc1
		$tbl_doncaithiendiem->nam_hoc1->CellCssStyle = "";
		$tbl_doncaithiendiem->nam_hoc1->CellCssClass = "";

		// nam_hoc2
		$tbl_doncaithiendiem->nam_hoc2->CellCssStyle = "";
		$tbl_doncaithiendiem->nam_hoc2->CellCssClass = "";

		// diem
		$tbl_doncaithiendiem->diem->CellCssStyle = "";
		$tbl_doncaithiendiem->diem->CellCssClass = "";

		// monthi_lan2
		$tbl_doncaithiendiem->monthi_lan2->CellCssStyle = "";
		$tbl_doncaithiendiem->monthi_lan2->CellCssClass = "";

		// thoigian_h
		$tbl_doncaithiendiem->thoigian_h->CellCssStyle = "";
		$tbl_doncaithiendiem->thoigian_h->CellCssClass = "";

		// thoigian_phut
		$tbl_doncaithiendiem->thoigian_phut->CellCssStyle = "";
		$tbl_doncaithiendiem->thoigian_phut->CellCssClass = "";

		// ngay_thi
		$tbl_doncaithiendiem->ngay_thi->CellCssStyle = "";
		$tbl_doncaithiendiem->ngay_thi->CellCssClass = "";

		// ngay_tao_don
		$tbl_doncaithiendiem->ngay_tao_don->CellCssStyle = "";
		$tbl_doncaithiendiem->ngay_tao_don->CellCssClass = "";

		// email
		$tbl_doncaithiendiem->email->CellCssStyle = "";
		$tbl_doncaithiendiem->email->CellCssClass = "";

		// note
		$tbl_doncaithiendiem->note->CellCssStyle = "";
		$tbl_doncaithiendiem->note->CellCssClass = "";

		// status_email
		$tbl_doncaithiendiem->status_email->CellCssStyle = "";
		$tbl_doncaithiendiem->status_email->CellCssClass = "";

		// nguoidung_id
		$tbl_doncaithiendiem->nguoidung_id->CellCssStyle = "";
		$tbl_doncaithiendiem->nguoidung_id->CellCssClass = "";

		// date_time_edit
		$tbl_doncaithiendiem->date_time_edit->CellCssStyle = "";
		$tbl_doncaithiendiem->date_time_edit->CellCssClass = "";
                
		// file_name
		$tbl_doncaithiendiem->file_name->CellCssStyle = "";
		$tbl_doncaithiendiem->file_name->CellCssClass = "";
		if ($tbl_doncaithiendiem->RowType == EW_ROWTYPE_VIEW) { // View row

			// phieucaithiendiem_id
			$tbl_doncaithiendiem->phieucaithiendiem_id->ViewValue = $tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue;
			$tbl_doncaithiendiem->phieucaithiendiem_id->CssStyle = "";
			$tbl_doncaithiendiem->phieucaithiendiem_id->CssClass = "";
			$tbl_doncaithiendiem->phieucaithiendiem_id->ViewCustomAttributes = "";

			// loaidon_id
			$tbl_doncaithiendiem->loaidon_id->ViewValue = $tbl_doncaithiendiem->loaidon_id->CurrentValue;
			$tbl_doncaithiendiem->loaidon_id->CssStyle = "";
			$tbl_doncaithiendiem->loaidon_id->CssClass = "";
			$tbl_doncaithiendiem->loaidon_id->ViewCustomAttributes = "";

			// nhomdon_id
			$tbl_doncaithiendiem->nhomdon_id->ViewValue = $tbl_doncaithiendiem->nhomdon_id->CurrentValue;
			$tbl_doncaithiendiem->nhomdon_id->CssStyle = "";
			$tbl_doncaithiendiem->nhomdon_id->CssClass = "";
			$tbl_doncaithiendiem->nhomdon_id->ViewCustomAttributes = "";

			// msv
			$tbl_doncaithiendiem->msv->ViewValue = $tbl_doncaithiendiem->msv->CurrentValue;
			$tbl_doncaithiendiem->msv->CssStyle = "";
			$tbl_doncaithiendiem->msv->CssClass = "";
			$tbl_doncaithiendiem->msv->ViewCustomAttributes = "";

			// hoten_sinhvien
			$tbl_doncaithiendiem->hoten_sinhvien->ViewValue = $tbl_doncaithiendiem->hoten_sinhvien->CurrentValue;
			$tbl_doncaithiendiem->hoten_sinhvien->ViewValue = strtoupper($tbl_doncaithiendiem->hoten_sinhvien->ViewValue);
			$tbl_doncaithiendiem->hoten_sinhvien->CssStyle = "";
			$tbl_doncaithiendiem->hoten_sinhvien->CssClass = "";
			$tbl_doncaithiendiem->hoten_sinhvien->ViewCustomAttributes = "";

			// ngay_sinh
			$tbl_doncaithiendiem->ngay_sinh->ViewValue = $tbl_doncaithiendiem->ngay_sinh->CurrentValue;
			$tbl_doncaithiendiem->ngay_sinh->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->ngay_sinh->ViewValue, 7);
			$tbl_doncaithiendiem->ngay_sinh->CssStyle = "";
			$tbl_doncaithiendiem->ngay_sinh->CssClass = "";
			$tbl_doncaithiendiem->ngay_sinh->ViewCustomAttributes = "";

			// lop_sinhhoat
			$tbl_doncaithiendiem->lop_sinhhoat->ViewValue = $tbl_doncaithiendiem->lop_sinhhoat->CurrentValue;
			$tbl_doncaithiendiem->lop_sinhhoat->CssStyle = "";
			$tbl_doncaithiendiem->lop_sinhhoat->CssClass = "";
			$tbl_doncaithiendiem->lop_sinhhoat->ViewCustomAttributes = "";

			// so_dienthoai
			$tbl_doncaithiendiem->so_dienthoai->ViewValue = $tbl_doncaithiendiem->so_dienthoai->CurrentValue;
			$tbl_doncaithiendiem->so_dienthoai->CssStyle = "";
			$tbl_doncaithiendiem->so_dienthoai->CssClass = "";
			$tbl_doncaithiendiem->so_dienthoai->ViewCustomAttributes = "";

			// momthi_chinh
			$tbl_doncaithiendiem->momthi_chinh->ViewValue = $tbl_doncaithiendiem->momthi_chinh->CurrentValue;
			$tbl_doncaithiendiem->momthi_chinh->CssStyle = "";
			$tbl_doncaithiendiem->momthi_chinh->CssClass = "";
			$tbl_doncaithiendiem->momthi_chinh->ViewCustomAttributes = "";

			// ma_mon
			$tbl_doncaithiendiem->ma_mon->ViewValue = $tbl_doncaithiendiem->ma_mon->CurrentValue;
			$tbl_doncaithiendiem->ma_mon->CssStyle = "";
			$tbl_doncaithiendiem->ma_mon->CssClass = "";
			$tbl_doncaithiendiem->ma_mon->ViewCustomAttributes = "";

			// lop_tinchi
			$tbl_doncaithiendiem->lop_tinchi->ViewValue = $tbl_doncaithiendiem->lop_tinchi->CurrentValue;
			$tbl_doncaithiendiem->lop_tinchi->CssStyle = "";
			$tbl_doncaithiendiem->lop_tinchi->CssClass = "";
			$tbl_doncaithiendiem->lop_tinchi->ViewCustomAttributes = "";

			// hoc_ky
			$tbl_doncaithiendiem->hoc_ky->ViewValue = $tbl_doncaithiendiem->hoc_ky->CurrentValue;
			$tbl_doncaithiendiem->hoc_ky->CssStyle = "";
			$tbl_doncaithiendiem->hoc_ky->CssClass = "";
			$tbl_doncaithiendiem->hoc_ky->ViewCustomAttributes = "";

			// nam_hoc1
			$tbl_doncaithiendiem->nam_hoc1->ViewValue = $tbl_doncaithiendiem->nam_hoc1->CurrentValue;
			$tbl_doncaithiendiem->nam_hoc1->CssStyle = "";
			$tbl_doncaithiendiem->nam_hoc1->CssClass = "";
			$tbl_doncaithiendiem->nam_hoc1->ViewCustomAttributes = "";

			// nam_hoc2
			$tbl_doncaithiendiem->nam_hoc2->ViewValue = $tbl_doncaithiendiem->nam_hoc2->CurrentValue;
			$tbl_doncaithiendiem->nam_hoc2->CssStyle = "";
			$tbl_doncaithiendiem->nam_hoc2->CssClass = "";
			$tbl_doncaithiendiem->nam_hoc2->ViewCustomAttributes = "";

			// diem
			$tbl_doncaithiendiem->diem->ViewValue = $tbl_doncaithiendiem->diem->CurrentValue;
			$tbl_doncaithiendiem->diem->CssStyle = "";
			$tbl_doncaithiendiem->diem->CssClass = "";
			$tbl_doncaithiendiem->diem->ViewCustomAttributes = "";

			// monthi_lan2
			$tbl_doncaithiendiem->monthi_lan2->ViewValue = $tbl_doncaithiendiem->monthi_lan2->CurrentValue;
			$tbl_doncaithiendiem->monthi_lan2->CssStyle = "";
			$tbl_doncaithiendiem->monthi_lan2->CssClass = "";
			$tbl_doncaithiendiem->monthi_lan2->ViewCustomAttributes = "";

			// thoigian_h
			$tbl_doncaithiendiem->thoigian_h->ViewValue = $tbl_doncaithiendiem->thoigian_h->CurrentValue;
			$tbl_doncaithiendiem->thoigian_h->CssStyle = "";
			$tbl_doncaithiendiem->thoigian_h->CssClass = "";
			$tbl_doncaithiendiem->thoigian_h->ViewCustomAttributes = "";

			// thoigian_phut
			$tbl_doncaithiendiem->thoigian_phut->ViewValue = $tbl_doncaithiendiem->thoigian_phut->CurrentValue;
			$tbl_doncaithiendiem->thoigian_phut->CssStyle = "";
			$tbl_doncaithiendiem->thoigian_phut->CssClass = "";
			$tbl_doncaithiendiem->thoigian_phut->ViewCustomAttributes = "";

			// ngay_thi
			$tbl_doncaithiendiem->ngay_thi->ViewValue = $tbl_doncaithiendiem->ngay_thi->CurrentValue;
			$tbl_doncaithiendiem->ngay_thi->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->ngay_thi->ViewValue, 7);
			$tbl_doncaithiendiem->ngay_thi->CssStyle = "";
			$tbl_doncaithiendiem->ngay_thi->CssClass = "";
			$tbl_doncaithiendiem->ngay_thi->ViewCustomAttributes = "";

			// ngay_tao_don
			$tbl_doncaithiendiem->ngay_tao_don->ViewValue = $tbl_doncaithiendiem->ngay_tao_don->CurrentValue;
			$tbl_doncaithiendiem->ngay_tao_don->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->ngay_tao_don->ViewValue, 7);
			$tbl_doncaithiendiem->ngay_tao_don->CssStyle = "";
			$tbl_doncaithiendiem->ngay_tao_don->CssClass = "";
			$tbl_doncaithiendiem->ngay_tao_don->ViewCustomAttributes = "";

			// email
			$tbl_doncaithiendiem->email->ViewValue = $tbl_doncaithiendiem->email->CurrentValue;
			$tbl_doncaithiendiem->email->CssStyle = "";
			$tbl_doncaithiendiem->email->CssClass = "";
			$tbl_doncaithiendiem->email->ViewCustomAttributes = "";

			// note
			$tbl_doncaithiendiem->note->ViewValue = $tbl_doncaithiendiem->note->CurrentValue;
			$tbl_doncaithiendiem->note->CssStyle = "";
			$tbl_doncaithiendiem->note->CssClass = "";
			$tbl_doncaithiendiem->note->ViewCustomAttributes = "";

			// status_email
			$tbl_doncaithiendiem->status_email->ViewValue = $tbl_doncaithiendiem->status_email->CurrentValue;
			$tbl_doncaithiendiem->status_email->CssStyle = "";
			$tbl_doncaithiendiem->status_email->CssClass = "";
			$tbl_doncaithiendiem->status_email->ViewCustomAttributes = "";
                        
                      

			// status
			if (strval($tbl_doncaithiendiem->status->CurrentValue) <> "") {
				switch ($tbl_doncaithiendiem->status->CurrentValue) {
					case "0":
						$tbl_doncaithiendiem->status->ViewValue = "khong xet duyet";
						break;
					case "1":
						$tbl_doncaithiendiem->status->ViewValue = "cho xet duyet";
						break;
					case "2":
						$tbl_doncaithiendiem->status->ViewValue = "dang xu ly";
						break;
					case "3":
						$tbl_doncaithiendiem->status->ViewValue = "ket thuc";
						break;
					default:
						$tbl_doncaithiendiem->status->ViewValue = $tbl_doncaithiendiem->status->CurrentValue;
				}
			} else {
				$tbl_doncaithiendiem->status->ViewValue = NULL;
			}
			$tbl_doncaithiendiem->status->CssStyle = "";
			$tbl_doncaithiendiem->status->CssClass = "";
			$tbl_doncaithiendiem->status->ViewCustomAttributes = "";

			// active
			if (strval($tbl_doncaithiendiem->active->CurrentValue) <> "") {
				switch ($tbl_doncaithiendiem->active->CurrentValue) {
					case "0":
						$tbl_doncaithiendiem->active->ViewValue = "khong kich hoat";
						break;
					case "1":
						$tbl_doncaithiendiem->active->ViewValue = "kich hoat";
						break;
					default:
						$tbl_doncaithiendiem->active->ViewValue = $tbl_doncaithiendiem->active->CurrentValue;
				}
			} else {
				$tbl_doncaithiendiem->active->ViewValue = NULL;
			}
			$tbl_doncaithiendiem->active->CssStyle = "";
			$tbl_doncaithiendiem->active->CssClass = "";
			$tbl_doncaithiendiem->active->ViewCustomAttributes = "";

			// nguoidung_id
			$tbl_doncaithiendiem->nguoidung_id->ViewValue = $tbl_doncaithiendiem->nguoidung_id->CurrentValue;
			$tbl_doncaithiendiem->nguoidung_id->CssStyle = "";
			$tbl_doncaithiendiem->nguoidung_id->CssClass = "";
			$tbl_doncaithiendiem->nguoidung_id->ViewCustomAttributes = "";

			// date_time_add
			$tbl_doncaithiendiem->date_time_add->ViewValue = $tbl_doncaithiendiem->date_time_add->CurrentValue;
			$tbl_doncaithiendiem->date_time_add->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->date_time_add->ViewValue, 7);
			$tbl_doncaithiendiem->date_time_add->CssStyle = "";
			$tbl_doncaithiendiem->date_time_add->CssClass = "";
			$tbl_doncaithiendiem->date_time_add->ViewCustomAttributes = "";

			// date_time_edit
			$tbl_doncaithiendiem->date_time_edit->ViewValue = $tbl_doncaithiendiem->date_time_edit->CurrentValue;
			$tbl_doncaithiendiem->date_time_edit->ViewValue = ew_FormatDateTime($tbl_doncaithiendiem->date_time_edit->ViewValue, 7);
			$tbl_doncaithiendiem->date_time_edit->CssStyle = "";
			$tbl_doncaithiendiem->date_time_edit->CssClass = "";
			$tbl_doncaithiendiem->date_time_edit->ViewCustomAttributes = "";

			// file_name
			$tbl_doncaithiendiem->file_name->ViewValue = $tbl_doncaithiendiem->file_name->CurrentValue;
			$tbl_doncaithiendiem->file_name->CssStyle = "";
			$tbl_doncaithiendiem->file_name->CssClass = "";
			$tbl_doncaithiendiem->file_name->ViewCustomAttributes = "";

			// msv
			$tbl_doncaithiendiem->msv->HrefValue = "";

			// hoten_sinhvien
			$tbl_doncaithiendiem->hoten_sinhvien->HrefValue = "";

			// ngay_sinh
			$tbl_doncaithiendiem->ngay_sinh->HrefValue = "";

			// lop_sinhhoat
			$tbl_doncaithiendiem->lop_sinhhoat->HrefValue = "";

			// so_dienthoai
			$tbl_doncaithiendiem->so_dienthoai->HrefValue = "";

			// momthi_chinh
			$tbl_doncaithiendiem->momthi_chinh->HrefValue = "";

			// ma_mon
			$tbl_doncaithiendiem->ma_mon->HrefValue = "";

			// lop_tinchi
			$tbl_doncaithiendiem->lop_tinchi->HrefValue = "";

			// hoc_ky
			$tbl_doncaithiendiem->hoc_ky->HrefValue = "";

			// nam_hoc1
			$tbl_doncaithiendiem->nam_hoc1->HrefValue = "";

			// nam_hoc2
			$tbl_doncaithiendiem->nam_hoc2->HrefValue = "";

			// diem
			$tbl_doncaithiendiem->diem->HrefValue = "";

			// monthi_lan2
			$tbl_doncaithiendiem->monthi_lan2->HrefValue = "";

			// thoigian_h
			$tbl_doncaithiendiem->thoigian_h->HrefValue = "";

			// thoigian_phut
			$tbl_doncaithiendiem->thoigian_phut->HrefValue = "";

			// ngay_thi
			$tbl_doncaithiendiem->ngay_thi->HrefValue = "";

			// ngay_tao_don
			$tbl_doncaithiendiem->ngay_tao_don->HrefValue = "";

			// email
			$tbl_doncaithiendiem->email->HrefValue = "";

			// note
			$tbl_doncaithiendiem->note->HrefValue = "";

			// status_email
			$tbl_doncaithiendiem->status_email->HrefValue = "";

			// nguoidung_id
			$tbl_doncaithiendiem->nguoidung_id->HrefValue = "";

			// date_time_edit
			$tbl_doncaithiendiem->date_time_edit->HrefValue = "";
                        
			// file_name
			$tbl_doncaithiendiem->file_name->HrefValue = "";
		} elseif ($tbl_doncaithiendiem->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// msv
			$tbl_doncaithiendiem->msv->EditCustomAttributes = "";
			$tbl_doncaithiendiem->msv->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->msv->CurrentValue);

			// hoten_sinhvien
			$tbl_doncaithiendiem->hoten_sinhvien->EditCustomAttributes = "";
			$tbl_doncaithiendiem->hoten_sinhvien->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->hoten_sinhvien->CurrentValue);

			// ngay_sinh
			$tbl_doncaithiendiem->ngay_sinh->EditCustomAttributes = "";
			$tbl_doncaithiendiem->ngay_sinh->EditValue = ew_HtmlEncode(ew_FormatDateTime($tbl_doncaithiendiem->ngay_sinh->CurrentValue, 7));

			// lop_sinhhoat
			$tbl_doncaithiendiem->lop_sinhhoat->EditCustomAttributes = "";
			$tbl_doncaithiendiem->lop_sinhhoat->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->lop_sinhhoat->CurrentValue);

			// so_dienthoai
			$tbl_doncaithiendiem->so_dienthoai->EditCustomAttributes = "";
			$tbl_doncaithiendiem->so_dienthoai->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->so_dienthoai->CurrentValue);

			// momthi_chinh
			$tbl_doncaithiendiem->momthi_chinh->EditCustomAttributes = "";
			$tbl_doncaithiendiem->momthi_chinh->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->momthi_chinh->CurrentValue);

			// ma_mon
			$tbl_doncaithiendiem->ma_mon->EditCustomAttributes = "";
			$tbl_doncaithiendiem->ma_mon->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->ma_mon->CurrentValue);

			// lop_tinchi
			$tbl_doncaithiendiem->lop_tinchi->EditCustomAttributes = "";
			$tbl_doncaithiendiem->lop_tinchi->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->lop_tinchi->CurrentValue);

			// hoc_ky
			$tbl_doncaithiendiem->hoc_ky->EditCustomAttributes = "";
			$tbl_doncaithiendiem->hoc_ky->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->hoc_ky->CurrentValue);

			// nam_hoc1
			$tbl_doncaithiendiem->nam_hoc1->EditCustomAttributes = "";
			$tbl_doncaithiendiem->nam_hoc1->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->nam_hoc1->CurrentValue);

			// nam_hoc2
			$tbl_doncaithiendiem->nam_hoc2->EditCustomAttributes = "";
			$tbl_doncaithiendiem->nam_hoc2->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->nam_hoc2->CurrentValue);

			// diem
			$tbl_doncaithiendiem->diem->EditCustomAttributes = "";
			$tbl_doncaithiendiem->diem->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->diem->CurrentValue);

			// monthi_lan2
			$tbl_doncaithiendiem->monthi_lan2->EditCustomAttributes = "";
			$tbl_doncaithiendiem->monthi_lan2->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->monthi_lan2->CurrentValue);

			// thoigian_h
			$tbl_doncaithiendiem->thoigian_h->EditCustomAttributes = "";
			$tbl_doncaithiendiem->thoigian_h->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->thoigian_h->CurrentValue);

			// thoigian_phut
			$tbl_doncaithiendiem->thoigian_phut->EditCustomAttributes = "";
			$tbl_doncaithiendiem->thoigian_phut->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->thoigian_phut->CurrentValue);

			// ngay_thi
			$tbl_doncaithiendiem->ngay_thi->EditCustomAttributes = "";
			$tbl_doncaithiendiem->ngay_thi->EditValue = ew_HtmlEncode(ew_FormatDateTime($tbl_doncaithiendiem->ngay_thi->CurrentValue, 7));

			// ngay_tao_don
			$tbl_doncaithiendiem->ngay_tao_don->EditCustomAttributes = "";
			$tbl_doncaithiendiem->ngay_tao_don->EditValue = ew_HtmlEncode(ew_FormatDateTime($tbl_doncaithiendiem->ngay_tao_don->CurrentValue, 7));

			// email
			$tbl_doncaithiendiem->email->EditCustomAttributes = "";
			$tbl_doncaithiendiem->email->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->email->CurrentValue);

			// note
			$tbl_doncaithiendiem->note->EditCustomAttributes = "";
			$tbl_doncaithiendiem->note->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->note->CurrentValue);

			// status_email
			$tbl_doncaithiendiem->status_email->EditCustomAttributes = "";
			$tbl_doncaithiendiem->status_email->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->status_email->CurrentValue);

			// nguoidung_id
			// date_time_edit
			// file_name

			$tbl_doncaithiendiem->file_name->EditCustomAttributes = "";
			$tbl_doncaithiendiem->file_name->EditValue = ew_HtmlEncode($tbl_doncaithiendiem->file_name->CurrentValue);

			// Edit refer script
			// msv
                        
                     
			$tbl_doncaithiendiem->msv->HrefValue = "";

			// hoten_sinhvien
			$tbl_doncaithiendiem->hoten_sinhvien->HrefValue = "";

			// ngay_sinh
			$tbl_doncaithiendiem->ngay_sinh->HrefValue = "";

			// lop_sinhhoat
			$tbl_doncaithiendiem->lop_sinhhoat->HrefValue = "";

			// so_dienthoai
			$tbl_doncaithiendiem->so_dienthoai->HrefValue = "";

			// momthi_chinh
			$tbl_doncaithiendiem->momthi_chinh->HrefValue = "";

			// ma_mon
			$tbl_doncaithiendiem->ma_mon->HrefValue = "";

			// lop_tinchi
			$tbl_doncaithiendiem->lop_tinchi->HrefValue = "";

			// hoc_ky
			$tbl_doncaithiendiem->hoc_ky->HrefValue = "";

			// nam_hoc1
			$tbl_doncaithiendiem->nam_hoc1->HrefValue = "";

			// nam_hoc2
			$tbl_doncaithiendiem->nam_hoc2->HrefValue = "";

			// diem
			$tbl_doncaithiendiem->diem->HrefValue = "";

			// monthi_lan2
			$tbl_doncaithiendiem->monthi_lan2->HrefValue = "";

			// thoigian_h
			$tbl_doncaithiendiem->thoigian_h->HrefValue = "";

			// thoigian_phut
			$tbl_doncaithiendiem->thoigian_phut->HrefValue = "";

			// ngay_thi
			$tbl_doncaithiendiem->ngay_thi->HrefValue = "";

			// ngay_tao_don
			$tbl_doncaithiendiem->ngay_tao_don->HrefValue = "";

			// email
			$tbl_doncaithiendiem->email->HrefValue = "";

			// note
			$tbl_doncaithiendiem->note->HrefValue = "";

			// status_email
			$tbl_doncaithiendiem->status_email->HrefValue = "";

			// nguoidung_id
			$tbl_doncaithiendiem->nguoidung_id->HrefValue = "";

			// date_time_edit
			$tbl_doncaithiendiem->date_time_edit->HrefValue = "";
                        
			// file_name
			$tbl_doncaithiendiem->file_name->HrefValue = "";
		}

		// Call Row Rendered event
		$tbl_doncaithiendiem->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $tbl_doncaithiendiem;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if ($tbl_doncaithiendiem->msv->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Msv";
		}
		if (!ew_CheckInteger($tbl_doncaithiendiem->msv->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect integer - Msv";
		}
		if ($tbl_doncaithiendiem->hoten_sinhvien->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Hoten Sinhvien";
		}
		if ($tbl_doncaithiendiem->ngay_sinh->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Ngay Sinh";
		}
		if (!ew_CheckEuroDate($tbl_doncaithiendiem->ngay_sinh->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect date, format = dd/mm/yyyy - Ngay Sinh";
		}
		if ($tbl_doncaithiendiem->lop_sinhhoat->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Lop Sinhhoat";
		}
		if ($tbl_doncaithiendiem->so_dienthoai->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - So Dienthoai";
		}
		if ($tbl_doncaithiendiem->momthi_chinh->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Momthi Chinh";
		}
		if ($tbl_doncaithiendiem->lop_tinchi->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Lop Tinchi";
		}
		if ($tbl_doncaithiendiem->hoc_ky->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Hoc Ky";
		}
		if ($tbl_doncaithiendiem->nam_hoc1->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Nam Hoc 1";
		}
		if ($tbl_doncaithiendiem->diem->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Diem";
		}
		if ($tbl_doncaithiendiem->monthi_lan2->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Monthi Lan 2";
		}
		if ($tbl_doncaithiendiem->thoigian_h->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Thoigian H";
		}
		
		if ($tbl_doncaithiendiem->ngay_thi->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter required field - Ngay Thi";
		}
		if (!ew_CheckEuroDate($tbl_doncaithiendiem->ngay_thi->FormValue)) {
			if ($gsFormError <> "") $gsFormError .= "<br>";
			$gsFormError .= "Incorrect date, format = dd/mm/yyyy - Ngay Thi";
		}
		
                  $img = new Securimage();
  			$valid = $img->check($_POST['x_maxacnhan']);
  			if($valid == true) {

 			} else {
    			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
				$gsFormError .= "Mã xác nhận không đúng";
 			}

		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= $sFormCustomError;
		}
		return $ValidateForm;
	}

	// Update record based on key values
	function EditRow() {
		global $conn, $Security, $tbl_doncaithiendiem;
		$sFilter = $tbl_doncaithiendiem->KeyFilter();
		$tbl_doncaithiendiem->CurrentFilter = $sFilter;
		$sSql = $tbl_doncaithiendiem->SQL();
		$conn->raiseErrorFn = 'ew_ErrorFn';
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$EditRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold =& $rs->fields;
			$rsnew = array();

			$rsnew = array();
                
                // Field loaidon_id
		$tbl_doncaithiendiem->loaidon_id->SetDbValueDef(2, NULL);
		$rsnew['loaidon_id'] =& $tbl_doncaithiendiem->loaidon_id->DbValue;

		// Field nhomdon_id
		$tbl_doncaithiendiem->nhomdon_id->SetDbValueDef(2, NULL);
		$rsnew['nhomdon_id'] =& $tbl_doncaithiendiem->nhomdon_id->DbValue;


		// Field msv
		$tbl_doncaithiendiem->msv->SetDbValueDef($tbl_doncaithiendiem->msv->CurrentValue, NULL);
		$rsnew['msv'] =& $tbl_doncaithiendiem->msv->DbValue;

		// Field hoten_sinhvien
		$tbl_doncaithiendiem->hoten_sinhvien->SetDbValueDef($tbl_doncaithiendiem->hoten_sinhvien->CurrentValue, NULL);
		$rsnew['hoten_sinhvien'] =& $tbl_doncaithiendiem->hoten_sinhvien->DbValue;

		// Field ngay_sinh
		$tbl_doncaithiendiem->ngay_sinh->SetDbValueDef(ew_UnFormatDateTime($tbl_doncaithiendiem->ngay_sinh->CurrentValue, 7), NULL);
		$rsnew['ngay_sinh'] =& $tbl_doncaithiendiem->ngay_sinh->DbValue;

		// Field lop_sinhhoat
		$tbl_doncaithiendiem->lop_sinhhoat->SetDbValueDef($tbl_doncaithiendiem->lop_sinhhoat->CurrentValue, NULL);
		$rsnew['lop_sinhhoat'] =& $tbl_doncaithiendiem->lop_sinhhoat->DbValue;

		// Field so_dienthoai
		$tbl_doncaithiendiem->so_dienthoai->SetDbValueDef($tbl_doncaithiendiem->so_dienthoai->CurrentValue, NULL);
		$rsnew['so_dienthoai'] =& $tbl_doncaithiendiem->so_dienthoai->DbValue;

		// Field momthi_chinh
		$tbl_doncaithiendiem->momthi_chinh->SetDbValueDef($tbl_doncaithiendiem->momthi_chinh->CurrentValue, NULL);
		$rsnew['momthi_chinh'] =& $tbl_doncaithiendiem->momthi_chinh->DbValue;

		// Field ma_mon
		$tbl_doncaithiendiem->ma_mon->SetDbValueDef($tbl_doncaithiendiem->ma_mon->CurrentValue, NULL);
		$rsnew['ma_mon'] =& $tbl_doncaithiendiem->ma_mon->DbValue;

		// Field lop_tinchi
		$tbl_doncaithiendiem->lop_tinchi->SetDbValueDef($tbl_doncaithiendiem->lop_tinchi->CurrentValue, NULL);
		$rsnew['lop_tinchi'] =& $tbl_doncaithiendiem->lop_tinchi->DbValue;

		// Field hoc_ky
		$tbl_doncaithiendiem->hoc_ky->SetDbValueDef($tbl_doncaithiendiem->hoc_ky->CurrentValue, NULL);
		$rsnew['hoc_ky'] =& $tbl_doncaithiendiem->hoc_ky->DbValue;

		// Field nam_hoc1
		$tbl_doncaithiendiem->nam_hoc1->SetDbValueDef($tbl_doncaithiendiem->nam_hoc1->CurrentValue, NULL);
		$rsnew['nam_hoc1'] =& $tbl_doncaithiendiem->nam_hoc1->DbValue;

		// Field nam_hoc2
		$tbl_doncaithiendiem->nam_hoc2->SetDbValueDef($tbl_doncaithiendiem->nam_hoc2->CurrentValue, NULL);
		$rsnew['nam_hoc2'] =& $tbl_doncaithiendiem->nam_hoc2->DbValue;

		// Field diem
		$tbl_doncaithiendiem->diem->SetDbValueDef($tbl_doncaithiendiem->diem->CurrentValue, NULL);
		$rsnew['diem'] =& $tbl_doncaithiendiem->diem->DbValue;

		// Field monthi_lan2
		$tbl_doncaithiendiem->monthi_lan2->SetDbValueDef($tbl_doncaithiendiem->monthi_lan2->CurrentValue, NULL);
		$rsnew['monthi_lan2'] =& $tbl_doncaithiendiem->monthi_lan2->DbValue;

		// Field thoigian_h
		$tbl_doncaithiendiem->thoigian_h->SetDbValueDef($tbl_doncaithiendiem->thoigian_h->CurrentValue, NULL);
		$rsnew['thoigian_h'] =& $tbl_doncaithiendiem->thoigian_h->DbValue;

		// Field thoigian_phut
		$tbl_doncaithiendiem->thoigian_phut->SetDbValueDef($tbl_doncaithiendiem->thoigian_phut->CurrentValue, NULL);
		$rsnew['thoigian_phut'] =& $tbl_doncaithiendiem->thoigian_phut->DbValue;

		// Field ngay_thi
		$tbl_doncaithiendiem->ngay_thi->SetDbValueDef(ew_UnFormatDateTime($tbl_doncaithiendiem->ngay_thi->CurrentValue, 7), NULL);
		$rsnew['ngay_thi'] =& $tbl_doncaithiendiem->ngay_thi->DbValue;

		// Field email
		$tbl_doncaithiendiem->email->SetDbValueDef($tbl_doncaithiendiem->email->CurrentValue, NULL);
		$rsnew['email'] =& $tbl_doncaithiendiem->email->DbValue;

		// Field active
		$tbl_doncaithiendiem->active->SetDbValueDef(0, NULL);
		$rsnew['active'] =& $tbl_doncaithiendiem->active->DbValue;

		// Field nguoidung_id
		$tbl_doncaithiendiem->nguoidung_id->SetDbValueDef(CurrentUserID(), NULL);
		$rsnew['nguoidung_id'] =& $tbl_doncaithiendiem->nguoidung_id->DbValue;

		// Field date_time_edit
		$tbl_doncaithiendiem->date_time_edit->SetDbValueDef(ew_CurrentDateTime(), NULL);
		$rsnew['date_time_edit'] =& $tbl_doncaithiendiem->date_time_edit->DbValue;
              
		
                
                $date_ngaythi = date_create($tbl_doncaithiendiem->ngay_thi->CurrentValue);
                $date_ngaysinh = date_create($tbl_doncaithiendiem->ngay_sinh->CurrentValue);
                
                //add code bu quanghung  save  and export world 
                $my_t=getdate(date("U"));
                require_once './export_php2world/PHPWord.php';
                $PHPWord = new PHPWord();
                $document = $PHPWord->loadTemplate('./export_php2world/template_don/Donthidiemcao.docx');
                $document->setValue('Value1', $tbl_doncaithiendiem->hoten_sinhvien->CurrentValue); // ho ten sinh vien
                $document->setValue('Value2', $tbl_doncaithiendiem->msv->CurrentValue);
                $document->setValue('Value3', date_format($date_ngaysinh, 'd/m/Y'));
                $document->setValue('Value4', $tbl_doncaithiendiem->lop_sinhhoat->CurrentValue);
                $document->setValue('Value5', $tbl_doncaithiendiem->so_dienthoai->CurrentValue);
                $document->setValue('Value6', $tbl_doncaithiendiem->momthi_chinh->CurrentValue);
                $document->setValue('Value7', $tbl_doncaithiendiem->lop_tinchi->CurrentValue);
                $document->setValue('Value8', $tbl_doncaithiendiem->hoc_ky->CurrentValue);
                $document->setValue('Value9', $tbl_doncaithiendiem->nam_hoc1->CurrentValue);
                $document->setValue('Value10', $tbl_doncaithiendiem->diem->CurrentValue);
                $document->setValue('Value11', $tbl_doncaithiendiem->monthi_lan2->CurrentValue);
                $document->setValue('Value12', $tbl_doncaithiendiem->thoigian_h->CurrentValue);
                $document->setValue('Value13', $tbl_doncaithiendiem->thoigian_phut->CurrentValue);
                $document->setValue('Value14', date_format($date_ngaythi, 'd/m/Y'));
                $document->setValue('Value15', $my_t[mday]);
                $document->setValue('Value16', $my_t[mon]);
                $document->setValue('Value17', $my_t[year]);
                
                // Add code by quanghung phan quyen thu muc user 
                if (!is_dir("../upload/users/".CurrentUserID()."")){ mkdir("../upload/users/".CurrentUserID()."");}
                if (!is_dir("../upload/users/".CurrentUserID()."/dontu")){ mkdir("../upload/users/".CurrentUserID()."/dontu");}
                $filename= "../upload/users/".CurrentUserID()."/dontu/". strtotime(ew_CurrentDateTime())."_Doncaithiendiem_MSV".$_SESSION['arraythongtin']['MaSinhVien'].".docx";
                $document->save($filename);
                // Field file_name
			$tbl_doncaithiendiem->file_name->SetDbValueDef($filename, NULL);
			$rsnew['file_name'] =& $tbl_doncaithiendiem->file_name->DbValue;

			// Call Row Updating event
			$bUpdateRow = $tbl_doncaithiendiem->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = 'ew_ErrorFn';
				$EditRow = $conn->Execute($tbl_doncaithiendiem->UpdateSQL($rsnew));
				$conn->raiseErrorFn = '';
			} else {
				if ($tbl_doncaithiendiem->CancelMessage <> "") {
					$this->setMessage($tbl_doncaithiendiem->CancelMessage);
					$tbl_doncaithiendiem->CancelMessage = "";
				} else {
					$this->setMessage("Update cancelled");
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$tbl_doncaithiendiem->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
