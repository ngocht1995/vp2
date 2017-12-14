<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "userinfo.php" ?>
<?php include "userfn6.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Define page object
$user_view = new cuser_view();
$Page =& $user_view;

// Page init processing
$user_view->Page_Init();

// Page main processing
$user_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($user->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var user_view = new ew_Page("user_view");

// page properties
user_view.PageID = "view"; // page ID
var EW_PAGE_ID = user_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
user_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
user_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
user_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
user_view.ValidateRequired = false; // no JavaScript validation
<?php } ?>

//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

// Write your client script here, no need to add script tags.
// To include another .js script, use:
// ew_ClientScriptInclude("my_javascript.js"); 
//-->

</script>
<?php } ?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg_line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thông tin tài khoản</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($user->Export == "") { ?>
<a href="userlist.php"></a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<?php if ($user_view->ShowOptionLink()) { ?>
<!--<a href="<?php // echo $user->AddUrl() ?>"><a href="timkiem_TTKDlist.php"><img border="0" src="images/cmd_them.gif"></a></a>&nbsp;-->
<?php } ?>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<?php if ($user_view->ShowOptionLink()) { ?>
<a href="<?php echo $user->EditUrl() ?>"><img border="0" src="images/cmd_sua.gif"></a></a>&nbsp;
<?php } ?>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<?php if ($user_view->ShowOptionLink()) { ?>
<!--<a onclick="return ew_Confirm('Bạn có muốn xóa bản ghi đã chọn không?');" href=" <?php// echo $user->DeleteUrl() ?>">Xóa</a>&nbsp; -->
<?php } ?>
<?php } ?>
<?php } ?>
</span></p>
<?php $user_view->ShowMessage() ?>
<p>
<?php if ($user->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($user_view->Pager)) $user_view->Pager = new cNumericPager($user_view->lStartRec, $user_view->lDisplayRecs, $user_view->lTotalRecs, $user_view->lRecRange) ?>
<?php if ($user_view->Pager->RecordCount > 0) { ?>
	<?php if ($user_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $user_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $user_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($user_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($user_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $user_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $user_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($user_view->sSrchWhere == "0=101") { ?>
		Hãy điền từ khóa tìm kiếm
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<br>
<?php } ?>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
							<br>
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thông tin doanh nghiệp</font></b><br><br>
								<td height="20" width="100%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
</table>
<table cellspacing="0" class="ewTable">

<?php if ($user->ten_congty->Visible) { // ten_congty ?>
	<tr<?php echo $user->ten_congty->RowAttributes ?>>
		<td class="ewTableHeader">Tên công ty</td>
		<td<?php echo $user->ten_congty->CellAttributes() ?>>
<div<?php echo $user->ten_congty->ViewAttributes() ?>><?php echo $user->ten_congty->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->ten_viettat->Visible) { // ten_viettat ?>
	<tr<?php echo $user->ten_viettat->RowAttributes ?>>
		<td class="ewTableHeader">Tên viết tắt</td>
		<td<?php echo $user->ten_viettat->CellAttributes() ?>>
<div<?php echo $user->ten_viettat->ViewAttributes() ?>><?php echo $user->ten_viettat->ViewValue ?></div></td>
	</tr>
<?php } ?>

<?php if ($user->website->Visible) { // website ?>
	<tr<?php echo $user->website->RowAttributes ?>>
		<td class="ewTableHeader">Website</td>
		<td<?php echo $user->website->CellAttributes() ?>>
<div<?php echo $user->website->ViewAttributes() ?>><?php echo $user->website->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->chuc_nang->Visible) { // chuc_nang ?>
	<tr<?php echo $user->chuc_nang->RowAttributes ?>>
		<td class="ewTableHeader">Chức năng</td>
		<td<?php echo $user->chuc_nang->CellAttributes() ?>>
<div<?php echo $user->chuc_nang->ViewAttributes() ?>><?php echo $user->chuc_nang->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->loaikinhdoanh_id->Visible) { // loaikinhdoanh_id ?>
	<tr<?php echo $user->loaikinhdoanh_id->RowAttributes ?>>
		<td class="ewTableHeader">Loại hình kinh doanh</td>
		<td<?php echo $user->loaikinhdoanh_id->CellAttributes() ?>>
<div<?php echo $user->loaikinhdoanh_id->ViewAttributes() ?>><?php echo $user->loaikinhdoanh_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->loaicongty_id->Visible) { // loaicongty_id ?>
	<tr<?php echo $user->loaicongty_id->RowAttributes ?>>
		<td class="ewTableHeader">Loại công ty</td>
		<td<?php echo $user->loaicongty_id->CellAttributes() ?>>
<div<?php echo $user->loaicongty_id->ViewAttributes() ?>><?php echo $user->loaicongty_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->nganhnghe_lienquan->Visible) { // nganhnghe_lienquan ?>
	<tr<?php echo $user->nganhnghe_lienquan->RowAttributes ?>>
		<td class="ewTableHeader">Ngành nghề liên quan</td>
		<td<?php echo $user->nganhnghe_lienquan->CellAttributes() ?>>
<div<?php echo $user->nganhnghe_lienquan->ViewAttributes() ?>><?php echo $user->nganhnghe_lienquan->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->thitruong_lienquan->Visible) { // thitruong_lienquan ?>
	<tr<?php echo $user->thitruong_lienquan->RowAttributes ?>>
		<td class="ewTableHeader">Thị trường liên quan</td>
		<td<?php echo $user->thitruong_lienquan->CellAttributes() ?>>
<div<?php echo $user->thitruong_lienquan->ViewAttributes() ?>><?php echo $user->thitruong_lienquan->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->so_congnhan->Visible) { // so_congnhan ?>
	<tr<?php echo $user->so_congnhan->RowAttributes ?>>
		<td class="ewTableHeader">Số công nhân</td>
		<td<?php echo $user->so_congnhan->CellAttributes() ?>>
<div<?php echo $user->so_congnhan->ViewAttributes() ?>><?php echo $user->so_congnhan->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->nam_thanhlap->Visible) { // nam_thanhlap ?>
	<tr<?php echo $user->nam_thanhlap->RowAttributes ?>>
		<td class="ewTableHeader">Năm thành lập</td>
		<td<?php echo $user->nam_thanhlap->CellAttributes() ?>>
<div<?php echo $user->nam_thanhlap->ViewAttributes() ?>><?php echo $user->nam_thanhlap->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->kim_ngach->Visible) { // kim_ngach ?>
	<tr<?php echo $user->kim_ngach->RowAttributes ?>>
		<td class="ewTableHeader">Kim Ngạch</td>
		<td<?php echo $user->kim_ngach->CellAttributes() ?>>
<div<?php echo $user->kim_ngach->ViewAttributes() ?>><?php echo $user->kim_ngach->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->cung_cap->Visible) { // cung_cap ?>
	<tr<?php echo $user->cung_cap->RowAttributes ?>>
		<td class="ewTableHeader">Cung cấp</td>
		<td<?php echo $user->cung_cap->CellAttributes() ?>>
<div<?php echo $user->cung_cap->ViewAttributes() ?>><?php echo $user->cung_cap->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->chung_chi->Visible) { // chung_chi ?>
	<tr<?php echo $user->chung_chi->RowAttributes ?>>
		<td class="ewTableHeader">Chứng chỉ</td>
		<td<?php echo $user->chung_chi->CellAttributes() ?>>
<div<?php echo $user->chung_chi->ViewAttributes() ?>><?php echo $user->chung_chi->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->so_dkkd->Visible) { // so_dkkd ?>
	<tr<?php echo $user->so_dkkd->RowAttributes ?>>
		<td class="ewTableHeader">Số đăng ký kinh doanh</td>
		<td<?php echo $user->so_dkkd->CellAttributes() ?>>
<div<?php echo $user->so_dkkd->ViewAttributes() ?>><?php echo $user->so_dkkd->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->ngay_thamgia->Visible) { // ngay_thamgia ?>
	<tr<?php echo $user->ngay_thamgia->RowAttributes ?>>
		<td class="ewTableHeader">Ngày tham gia</td>
		<td<?php echo $user->ngay_thamgia->CellAttributes() ?>>
<div<?php echo $user->ngay_thamgia->ViewAttributes() ?>><?php echo $user->ngay_thamgia->ViewValue ?></div></td>
	</tr>
<?php } ?>

</table>
</div>
</td></tr></table><br><br><br>

<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<div class="ewGridMiddlePanel">
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
							<br>
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Thông tin liên hệ</font></b><br><br>
								<td height="20" width="100%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
</table>
<table cellspacing="0" class="ewTable">
<?php if ($user->nguoidung_option->Visible) { // nguoidung_option ?>
	<tr<?php echo $user->nguoidung_option->RowAttributes ?>>
		<td class="ewTableHeader">Loại người dùng</td>
		<td<?php echo $user->nguoidung_option->CellAttributes() ?>>
<div<?php echo $user->nguoidung_option->ViewAttributes() ?>><?php echo $user->nguoidung_option->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->tendangnhap->Visible) { // tendangnhap ?>
	<tr<?php echo $user->tendangnhap->RowAttributes ?>>
		<td class="ewTableHeader">Tên đăng nhập</td>
		<td<?php echo $user->tendangnhap->CellAttributes() ?>>
<div<?php echo $user->tendangnhap->ViewAttributes() ?>><?php echo $user->tendangnhap->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->quocgia_id->Visible) { // quocgia_id ?>
	<tr<?php echo $user->quocgia_id->RowAttributes ?>>
		<td class="ewTableHeader">Quốc gia</td>
		<td<?php echo $user->quocgia_id->CellAttributes() ?>>
<div<?php echo $user->quocgia_id->ViewAttributes() ?>><?php echo $user->quocgia_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->gioi_tinh->Visible) { // gioi_tinh ?>
	<tr<?php echo $user->gioi_tinh->RowAttributes ?>>
		<td class="ewTableHeader">Giới tính</td>
		<td<?php echo $user->gioi_tinh->CellAttributes() ?>>
<div<?php echo $user->gioi_tinh->ViewAttributes() ?>><?php echo $user->gioi_tinh->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->hoten_nguoilienhe->Visible) { // hoten_nguoilienhe ?>
	<tr<?php echo $user->hoten_nguoilienhe->RowAttributes ?>>
		<td class="ewTableHeader">Họ và tên người liên hệ</td>
		<td<?php echo $user->hoten_nguoilienhe->CellAttributes() ?>>
<div<?php echo $user->hoten_nguoilienhe->ViewAttributes() ?>><?php echo $user->hoten_nguoilienhe->ViewValue ?>
</div></td>
	</tr>
<?php } ?>
<?php if ($user->ma_quocgia_dthoai->Visible) { // so_dienthoai ?>
	<tr<?php echo $user->so_dienthoai->RowAttributes ?>>
		<td class="ewTableHeader">Số điện thoại</td>
		<td<?php echo $user->so_dienthoai->CellAttributes() ?>>
<div<?php echo $user->so_dienthoai->ViewAttributes() ?> <?php echo $user->so_dienthoai->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->so_fax->Visible) { // so_fax ?>
	<tr<?php echo $user->so_fax->RowAttributes ?>>
		<td class="ewTableHeader">Số Fax</td>
		<td<?php echo $user->so_fax->CellAttributes() ?>>
<div<?php echo $user->so_fax->ViewAttributes() ?> <?php echo $user->so_fax->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->dia_chi->Visible) { // dia_chi ?>
	<tr<?php echo $user->dia_chi->RowAttributes ?>>
		<td class="ewTableHeader">Địa chỉ</td>
		<td<?php echo $user->dia_chi->CellAttributes() ?>>
<div<?php echo $user->dia_chi->ViewAttributes() ?>><?php echo $user->dia_chi->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->tinh_thanh->Visible) { // tinh_thanh ?>
	<tr<?php echo $user->tinh_thanh->RowAttributes ?>>
		<td class="ewTableHeader">Tỉnh thành</td>
		<td<?php echo $user->tinh_thanh->CellAttributes() ?>>
<div<?php echo $user->tinh_thanh->ViewAttributes() ?>><?php echo $user->tinh_thanh->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->quan_huyen->Visible) { // quan_huyen ?>
	<tr<?php echo $user->quan_huyen->RowAttributes ?>>
		<td class="ewTableHeader">Quận huyện</td>
		<td<?php echo $user->quan_huyen->CellAttributes() ?>>
<div<?php echo $user->quan_huyen->ViewAttributes() ?>><?php echo $user->quan_huyen->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->nick_yahoo->Visible) { // nick_yahoo ?>
	<tr<?php echo $user->nick_yahoo->RowAttributes ?>>
		<td class="ewTableHeader">Nick Yahoo</td>
		<td<?php echo $user->nick_yahoo->CellAttributes() ?>>
<div<?php echo $user->nick_yahoo->ViewAttributes() ?>><?php echo $user->nick_yahoo->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->nick_skype->Visible) { // nick_skype ?>
	<tr<?php echo $user->nick_skype->RowAttributes ?>>
		<td class="ewTableHeader">Nick Skype</td>
		<td<?php echo $user->nick_skype->CellAttributes() ?>>
<div<?php echo $user->nick_skype->ViewAttributes() ?>><?php echo $user->nick_skype->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->truycap_gannhat->Visible) { // truycap_gannhat ?>
	<tr<?php echo $user->truycap_gannhat->RowAttributes ?>>
		<td class="ewTableHeader">Truy cập gần nhất</td>
		<td<?php echo $user->truycap_gannhat->CellAttributes() ?>>
<div<?php echo $user->truycap_gannhat->ViewAttributes() ?>><?php echo $user->truycap_gannhat->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($user->kieu_giaodien->Visible) { // kieu_giaodien ?>
	<tr<?php echo $user->kieu_giaodien->RowAttributes ?>>
		<td class="ewTableHeader">Kiểu giao diện</td>
		<td<?php echo $user->kieu_giaodien->CellAttributes() ?>>
                    <a href="<?php echo $user->getlink_kieu_giaodien() ?>" target="_blank"><img src="<?php echo $user->getimage_kieu_giaodien() ?>" border=0 width=100 height =70></a>
                    <br><br>
<div<?php echo $user->kieu_giaodien->ViewAttributes() ?>><?php echo $user->kieu_giaodien->ViewValue ?>
<a href="<?php echo $user->getlink_kieu_giaodien() ?>" target = "_blank">(Xem)</a>
&nbsp;&nbsp;<b><font face="Verdana" size="1" color="#FF0000">(Chú ý: Kiểu giao diện áp dụng cho trang chủ của người dùng)</font></b>
</div></td>
	</tr>
<?php } ?>
<?php if ($user->UserLevelID->Visible) { // UserLevelID ?>
	<tr<?php echo $user->UserLevelID->RowAttributes ?>>
		<td class="ewTableHeader">Cấp bậc</td>
		<td<?php echo $user->UserLevelID->CellAttributes() ?>>
<div<?php echo $user->UserLevelID->ViewAttributes() ?>><?php echo $user->UserLevelID->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<br>
<?php if ($user->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($user_view->Pager)) $user_view->Pager = new cNumericPager($user_view->lStartRec, $user_view->lDisplayRecs, $user_view->lTotalRecs, $user_view->lRecRange) ?>
<?php if ($user_view->Pager->RecordCount > 0) { ?>
	<?php if ($user_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $user_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $user_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($user_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($user_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $user_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($user_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $user_view->PageUrl() ?>start=<?php echo $user_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($user_view->sSrchWhere == "0=101") { ?>
	Hãy điền từ khóa tìm kiếm
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($user->Export == "") { ?>
<script language="JavaScript" type="text/javascript">
<!--

// Write your table-specific startup script here
// document.write("page loaded");
//-->

</script>
<?php } ?>
<?php include "footer.php" ?>
<?php

//
// Page Class
//
class cuser_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'user';

	// Page Object Name
	var $PageObjName = 'user_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $user;
		if ($user->UseTokenInUrl) $PageUrl .= "t=" . $user->TableVar . "&"; // add page token
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
		global $objForm, $user;
		if ($user->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($user->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($user->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cuser_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["user"] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'user', TRUE);

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
		if (!$Security->CanView()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("userlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "Bạn không có quyền truy cập trang này";
			$this->Page_Terminate("userlist.php");
		}

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
	var $lDisplayRecs; // Number of display records
	var $lStartRec;
	var $lStopRec;
	var $lTotalRecs;
	var $lRecRange;
	var $lRecCnt;

	//
	// Page main processing
	//
	function Page_Main() {
		global $user;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["nguoidung_id"] <> "") {
				$user->nguoidung_id->setQueryStringValue($_GET["nguoidung_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$user->CurrentAction = "I"; // Display form
			switch ($user->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("userlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($user->nguoidung_id->CurrentValue) == strval($rs->fields('nguoidung_id'))) {
								$user->setStartRecordNumber($this->lStartRec); // Save record position
								$bMatchRecord = TRUE;
								break;
							} else {
								$this->lStartRec++;
								$rs->MoveNext();
							}
						}
					}
					if (!$bMatchRecord) {
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$sReturnUrl = "userlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "userlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$user->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $user;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$user->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$user->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $user->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$user->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$user->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$user->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $user;

		// Call Recordset Selecting event
		$user->Recordset_Selecting($user->CurrentFilter);

		// Load list page SQL
		$sSql = $user->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$user->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $user;
		$sFilter = $user->KeyFilter();

		// Call Row Selecting event
		$user->Row_Selecting($sFilter);

		// Load sql based on filter
		$user->CurrentFilter = $sFilter;
		$sSql = $user->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$user->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $user;
		$user->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$user->nguoidung_option->setDbValue($rs->fields('nguoidung_option'));
		$user->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$user->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$user->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$user->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));
		$user->mat_khau->setDbValue($rs->fields('mat_khau'));
		$user->ten_congty->setDbValue($rs->fields('ten_congty'));
		$user->ten_viettat->setDbValue($rs->fields('ten_viettat'));
		$user->logo_congty->Upload->DbValue = $rs->fields('logo_congty');
		$user->website->setDbValue($rs->fields('website'));
		$user->chuc_nang->setDbValue($rs->fields('chuc_nang'));
		$user->loaikinhdoanh_id->setDbValue($rs->fields('loaikinhdoanh_id'));
		$user->loaicongty_id->setDbValue($rs->fields('loaicongty_id'));
		$user->so_congnhan->setDbValue($rs->fields('so_congnhan'));
		$user->nam_thanhlap->setDbValue($rs->fields('nam_thanhlap'));
		$user->kim_ngach->setDbValue($rs->fields('kim_ngach'));
		$user->cung_cap->setDbValue($rs->fields('cung_cap'));
		$user->chung_chi->setDbValue($rs->fields('chung_chi'));
		$user->so_dkkd->setDbValue($rs->fields('so_dkkd'));
		$user->ngay_thamgia->setDbValue($rs->fields('ngay_thamgia'));
		$user->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$user->so_fax->setDbValue($rs->fields('so_fax'));
		$user->dia_chi->setDbValue($rs->fields('dia_chi'));
		$user->tinh_thanh->setDbValue($rs->fields('tinh_thanh'));
		$user->quan_huyen->setDbValue($rs->fields('quan_huyen'));
		$user->gioi_thieu->setDbValue($rs->fields('gioi_thieu'));
		$user->nick_yahoo->setDbValue($rs->fields('nick_yahoo'));
		$user->nick_skype->setDbValue($rs->fields('nick_skype'));
		$user->truycap_gannhat->setDbValue($rs->fields('truycap_gannhat'));
		$user->kieu_giaodien->setDbValue($rs->fields('kieu_giaodien'));
		$user->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		$user->nganhnghe_lienquan->setDbValue($rs->fields('nganhnghe_lienquan'));
		$user->thitruong_lienquan->setDbValue($rs->fields('thitruong_lienquan'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $user;

		// Call Row_Rendering event
		$user->Row_Rendering();

		// Common render codes for all row types
		// nguoidung_option

		$user->nguoidung_option->CellCssStyle = "";
		$user->nguoidung_option->CellCssClass = "";
		
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

		// ten_congty
		$user->ten_congty->CellCssStyle = "";
		$user->ten_congty->CellCssClass = "";

		// ten_viettat
		$user->ten_viettat->CellCssStyle = "";
		$user->ten_viettat->CellCssClass = "";

		// logo_congty
		$user->logo_congty->CellCssStyle = "";
		$user->logo_congty->CellCssClass = "";

		// website
		$user->website->CellCssStyle = "";
		$user->website->CellCssClass = "";

		// chuc_nang
		$user->chuc_nang->CellCssStyle = "";
		$user->chuc_nang->CellCssClass = "";

		// loaikinhdoanh_id
		$user->loaikinhdoanh_id->CellCssStyle = "";
		$user->loaikinhdoanh_id->CellCssClass = "";

		// loaicongty_id
		$user->loaicongty_id->CellCssStyle = "";
		$user->loaicongty_id->CellCssClass = "";

		// so_congnhan
		$user->so_congnhan->CellCssStyle = "";
		$user->so_congnhan->CellCssClass = "";

		// nam_thanhlap
		$user->nam_thanhlap->CellCssStyle = "";
		$user->nam_thanhlap->CellCssClass = "";

		// kim_ngach
		$user->kim_ngach->CellCssStyle = "";
		$user->kim_ngach->CellCssClass = "";

		// cung_cap
		$user->cung_cap->CellCssStyle = "";
		$user->cung_cap->CellCssClass = "";

		// chung_chi
		$user->chung_chi->CellCssStyle = "";
		$user->chung_chi->CellCssClass = "";

		// so_dkkd
		$user->so_dkkd->CellCssStyle = "";
		$user->so_dkkd->CellCssClass = "";

		// ngay_thamgia
		$user->ngay_thamgia->CellCssStyle = "";
		$user->ngay_thamgia->CellCssClass = "";

		// so_dienthoai
		$user->so_dienthoai->CellCssStyle = "";
		$user->so_dienthoai->CellCssClass = "";

		// so_fax
		$user->so_fax->CellCssStyle = "";
		$user->so_fax->CellCssClass = "";

		// dia_chi
		$user->dia_chi->CellCssStyle = "";
		$user->dia_chi->CellCssClass = "";

		// tinh_thanh
		$user->tinh_thanh->CellCssStyle = "";
		$user->tinh_thanh->CellCssClass = "";

		// quan_huyen
		$user->quan_huyen->CellCssStyle = "";
		$user->quan_huyen->CellCssClass = "";

		// gioi_thieu
		$user->gioi_thieu->CellCssStyle = "";
		$user->gioi_thieu->CellCssClass = "";

		// nick_yahoo
		$user->nick_yahoo->CellCssStyle = "";
		$user->nick_yahoo->CellCssClass = "";

		// nick_skype
		$user->nick_skype->CellCssStyle = "";
		$user->nick_skype->CellCssClass = "";

		// truycap_gannhat
		$user->truycap_gannhat->CellCssStyle = "";
		$user->truycap_gannhat->CellCssClass = "";

		/// kieu_giaodien
		$user->kieu_giaodien->CellCssStyle = "";
		$user->kieu_giaodien->CellCssClass = "";

		// UserLevelID
		$user->UserLevelID->CellCssStyle = "";
		$user->UserLevelID->CellCssClass = "";

		// nganhnghe_lienquan
		$user->nganhnghe_lienquan->CellCssStyle = "";
		$user->nganhnghe_lienquan->CellCssClass = "";

		// thitruong_lienquan
		$user->thitruong_lienquan->CellCssStyle = "";
		$user->thitruong_lienquan->CellCssClass = "";
		if ($user->RowType == EW_ROWTYPE_VIEW) { // View row
		// nguoidung_option
			if (strval($user->nguoidung_option->CurrentValue) <> "") {
				switch ($user->nguoidung_option->CurrentValue) {
					case "0":
						$user->nguoidung_option->ViewValue = "Quản lý hệ thống";
						break;
					case "1":
						$user->nguoidung_option->ViewValue = "Thành viên đăng ký";
						break;
					default:
						$user->nguoidung_option->ViewValue = $user->nguoidung_option->CurrentValue;
				}
			} else {
				$user->nguoidung_option->ViewValue = NULL;
			}
			$user->nguoidung_option->CssStyle = "";
			$user->nguoidung_option->CssClass = "";
			$user->nguoidung_option->ViewCustomAttributes = "";
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

			// ten_congty
			$user->ten_congty->ViewValue = $user->ten_congty->CurrentValue;
			$user->ten_congty->CssStyle = "";
			$user->ten_congty->CssClass = "";
			$user->ten_congty->ViewCustomAttributes = "";

			// ten_viettat
			$user->ten_viettat->ViewValue = $user->ten_viettat->CurrentValue;
			$user->ten_viettat->CssStyle = "";
			$user->ten_viettat->CssClass = "";
			$user->ten_viettat->ViewCustomAttributes = "";

			// logo_congty
			if (!is_null($user->logo_congty->Upload->DbValue)) {
				$user->logo_congty->ViewValue = "Logo Công ty";
			} else {
				$user->logo_congty->ViewValue = "";
			}
			$user->logo_congty->CssStyle = "";
			$user->logo_congty->CssClass = "";
			$user->logo_congty->ViewCustomAttributes = "";

			// website
			$user->website->ViewValue = $user->website->CurrentValue;
			$user->website->CssStyle = "";
			$user->website->CssClass = "";
			$user->website->ViewCustomAttributes = "";

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

			// loaikinhdoanh_id
			if (strval($user->loaikinhdoanh_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `loaikinhdoanh_ten` FROM `type_business` WHERE `loaikinhdoanh_id` = " . ew_AdjustSql($user->loaikinhdoanh_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$user->loaikinhdoanh_id->ViewValue = $rswrk->fields('loaikinhdoanh_ten');
					$rswrk->Close();
				} else {
					$user->loaikinhdoanh_id->ViewValue = $user->loaikinhdoanh_id->CurrentValue;
				}
			} else {
				$user->loaikinhdoanh_id->ViewValue = NULL;
			}
			$user->loaikinhdoanh_id->CssStyle = "";
			$user->loaikinhdoanh_id->CssClass = "";
			$user->loaikinhdoanh_id->ViewCustomAttributes = "";

			// loaicongty_id
			if (strval($user->loaicongty_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `loaicongty_ten` FROM `type_company` WHERE `loaicongty_id` = " . ew_AdjustSql($user->loaicongty_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$user->loaicongty_id->ViewValue = $rswrk->fields('loaicongty_ten');
					$rswrk->Close();
				} else {
					$user->loaicongty_id->ViewValue = $user->loaicongty_id->CurrentValue;
				}
			} else {
				$user->loaicongty_id->ViewValue = NULL;
			}
			$user->loaicongty_id->CssStyle = "";
			$user->loaicongty_id->CssClass = "";
			$user->loaicongty_id->ViewCustomAttributes = "";

			// so_congnhan
			if (strval($user->so_congnhan->CurrentValue) <> "") {
				switch ($user->so_congnhan->CurrentValue) {
					case "1":
						$user->so_congnhan->ViewValue = "Dưới 5 người";
						break;
					case "2":
						$user->so_congnhan->ViewValue = "Từ 5 đến 10 người";
						break;
					case "3":
						$user->so_congnhan->ViewValue = "Từ 11 đến 50 người";
						break;
					case "4":
						$user->so_congnhan->ViewValue = "Từ 51 đến 100 người";
						break;
					case "5":
						$user->so_congnhan->ViewValue = "từ 101 đến 500 người";
						break;
					case "6":
						$user->so_congnhan->ViewValue = "Từ 501 đến 1000 người";
						break;
					case "7":
						$user->so_congnhan->ViewValue = "Trên 1000 người";
						break;
					default:
						$user->so_congnhan->ViewValue = $user->so_congnhan->CurrentValue;
				}
			} else {
				$user->so_congnhan->ViewValue = NULL;
			}
			$user->so_congnhan->CssStyle = "";
			$user->so_congnhan->CssClass = "";
			$user->so_congnhan->ViewCustomAttributes = "";

			// nam_thanhlap
			$user->nam_thanhlap->ViewValue = $user->nam_thanhlap->CurrentValue;
			$user->nam_thanhlap->CssStyle = "";
			$user->nam_thanhlap->CssClass = "";
			$user->nam_thanhlap->ViewCustomAttributes = "";

			// kim_ngach
			if (strval($user->kim_ngach->CurrentValue) <> "") {
				switch ($user->kim_ngach->CurrentValue) {
					case "1":
						$user->kim_ngach->ViewValue = "Dưới 1 triệu USD";
						break;
					case "2":
						$user->kim_ngach->ViewValue = "Trên 100 triệu USD";
						break;
					case "3":
						$user->kim_ngach->ViewValue = "Từ 1 đến 2.5 triệu USD";
						break;
					case "4":
						$user->kim_ngach->ViewValue = "Từ 2.5 đến 5 triệu USD";
						break;
					case "5":
						$user->kim_ngach->ViewValue = "Từ 5 đến 10 triệu USD";
						break;
					case "6":
						$user->kim_ngach->ViewValue = "Từ 10 đến 50 triệu USD";
						break;
					case "7":
						$user->kim_ngach->ViewValue = "Từ 50 đến 100 triệu USD";
						break;
					default:
						$user->kim_ngach->ViewValue = $user->kim_ngach->CurrentValue;
				}
			} else {
				$user->kim_ngach->ViewValue = NULL;
			}
			$user->kim_ngach->CssStyle = "";
			$user->kim_ngach->CssClass = "";
			$user->kim_ngach->ViewCustomAttributes = "";

			// cung_cap
			$user->cung_cap->ViewValue = $user->cung_cap->CurrentValue;
			$user->cung_cap->CssStyle = "";
			$user->cung_cap->CssClass = "";
			$user->cung_cap->ViewCustomAttributes = "";

			// chung_chi
			$user->chung_chi->ViewValue = $user->chung_chi->CurrentValue;
			$user->chung_chi->CssStyle = "";
			$user->chung_chi->CssClass = "";
			$user->chung_chi->ViewCustomAttributes = "";

			// so_dkkd
			$user->so_dkkd->ViewValue = $user->so_dkkd->CurrentValue;
			$user->so_dkkd->CssStyle = "";
			$user->so_dkkd->CssClass = "";
			$user->so_dkkd->ViewCustomAttributes = "";

			// ngay_thamgia
			$user->ngay_thamgia->ViewValue = $user->ngay_thamgia->CurrentValue;
			$user->ngay_thamgia->ViewValue = ew_FormatDateTime($user->ngay_thamgia->ViewValue, 7);
			$user->ngay_thamgia->CssStyle = "";
			$user->ngay_thamgia->CssClass = "";
			$user->ngay_thamgia->ViewCustomAttributes = "";

			// so_dienthoai
			$user->so_dienthoai->ViewValue = $user->so_dienthoai->CurrentValue;
			$user->so_dienthoai->CssStyle = "";
			$user->so_dienthoai->CssClass = "";
			$user->so_dienthoai->ViewCustomAttributes = "";

			// so_fax
			$user->so_fax->ViewValue = $user->so_fax->CurrentValue;
			$user->so_fax->CssStyle = "";
			$user->so_fax->CssClass = "";
			$user->so_fax->ViewCustomAttributes = "";

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

			// gioi_thieu
			$user->gioi_thieu->ViewValue = $user->gioi_thieu->CurrentValue;
			$user->gioi_thieu->CssStyle = "";
			$user->gioi_thieu->CssClass = "";
			$user->gioi_thieu->ViewCustomAttributes = "";

			// nick_yahoo
			$user->nick_yahoo->ViewValue = $user->nick_yahoo->CurrentValue;
			$user->nick_yahoo->CssStyle = "";
			$user->nick_yahoo->CssClass = "";
			$user->nick_yahoo->ViewCustomAttributes = "";

			// nick_skype
			$user->nick_skype->ViewValue = $user->nick_skype->CurrentValue;
			$user->nick_skype->CssStyle = "";
			$user->nick_skype->CssClass = "";
			$user->nick_skype->ViewCustomAttributes = "";

			// truycap_gannhat
			$user->truycap_gannhat->ViewValue = $user->truycap_gannhat->CurrentValue;
			$user->truycap_gannhat->ViewValue = ew_FormatDateTime($user->truycap_gannhat->ViewValue, 11);
			$user->truycap_gannhat->CssStyle = "";
			$user->truycap_gannhat->CssClass = "";
			$user->truycap_gannhat->ViewCustomAttributes = "";

			// kieu_giaodien
			if (strval($user->kieu_giaodien->CurrentValue) <> "") {
				switch ($user->kieu_giaodien->CurrentValue) {
					case "1":
						$user->kieu_giaodien->ViewValue = "Giao diện 1";
						break;
					case "2":
						$user->kieu_giaodien->ViewValue = "Giao diện 2";
						break;
					case "3":
						$user->kieu_giaodien->ViewValue = "Giao diện 3";
						break;
                                       	case "4":
						$user->kieu_giaodien->ViewValue = "Giao diện 4";
						break;
					case "5":
						$user->kieu_giaodien->ViewValue = "Giao diện 5";
						break;
					case "6":
						$user->kieu_giaodien->ViewValue = "Giao diện 6";
						break;
					case "7":
						$user->kieu_giaodien->ViewValue = "Trang chủ doanh nghiệp";
						break;
					default:
						$user->kieu_giaodien->ViewValue = $user->kieu_giaodien->CurrentValue;
				}
			} else {
				$user->kieu_giaodien->ViewValue = NULL;
			}
			$user->kieu_giaodien->CssStyle = "";
			$user->kieu_giaodien->CssClass = "";
			$user->kieu_giaodien->ViewCustomAttributes = "";

			// UserLevelID
			//if ($Security->CanAdmin()) { // System admin
			if (strval($user->UserLevelID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($user->UserLevelID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$user->UserLevelID->ViewValue = $rswrk->fields('UserLevelName');
					$rswrk->Close();
				} else {
					$user->UserLevelID->ViewValue = $user->UserLevelID->CurrentValue;
				}
			} else {
				$user->UserLevelID->ViewValue = NULL;
			}
			//} else {
			//	$user->UserLevelID->ViewValue = "********";
			//}
			$user->UserLevelID->CssStyle = "";
			$user->UserLevelID->CssClass = "";
			$user->UserLevelID->ViewCustomAttributes = "";

			// nganhnghe_lienquan
			if (strval($user->nganhnghe_lienquan->CurrentValue) <> "") {
				$arwrk = explode(",", $user->nganhnghe_lienquan->CurrentValue);
				$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE ";
				$sWhereWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sWhereWrk <> "") $sWhereWrk .= " OR ";
					$sWhereWrk .= "`nganhnghe_id` = " . ew_AdjustSql(trim($wrk)) . "";
				}
				if ($sWhereWrk <> "") $sSqlWrk .= "(" . $sWhereWrk . ")";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$user->nganhnghe_lienquan->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$user->nganhnghe_lienquan->ViewValue .= $rswrk->fields('nganhnghe_ten');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $user->nganhnghe_lienquan->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$user->nganhnghe_lienquan->ViewValue = $user->nganhnghe_lienquan->CurrentValue;
				}
			} else {
				$user->nganhnghe_lienquan->ViewValue = NULL;
			}
			$user->nganhnghe_lienquan->CssStyle = "";
			$user->nganhnghe_lienquan->CssClass = "";
			$user->nganhnghe_lienquan->ViewCustomAttributes = "";

			// thitruong_lienquan
			if (strval($user->thitruong_lienquan->CurrentValue) <> "") {
				$arwrk = explode(",", $user->thitruong_lienquan->CurrentValue);
				$sSqlWrk = "SELECT `ten_thitruong` FROM `market` WHERE ";
				$sWhereWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sWhereWrk <> "") $sWhereWrk .= " OR ";
					$sWhereWrk .= "`thitruong_id` = " . ew_AdjustSql(trim($wrk)) . "";
				}
				if ($sWhereWrk <> "") $sSqlWrk .= "(" . $sWhereWrk . ")";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$user->thitruong_lienquan->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$user->thitruong_lienquan->ViewValue .= $rswrk->fields('ten_thitruong');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $user->thitruong_lienquan->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$user->thitruong_lienquan->ViewValue = $user->thitruong_lienquan->CurrentValue;
				}
			} else {
				$user->thitruong_lienquan->ViewValue = NULL;
			}
			$user->thitruong_lienquan->CssStyle = "";
			$user->thitruong_lienquan->CssClass = "";
			$user->thitruong_lienquan->ViewCustomAttributes = "";
			// nguoidung_option
			$user->nguoidung_option->HrefValue = "";

			// tendangnhap
			$user->tendangnhap->HrefValue = "";

			// quocgia_id
			$user->quocgia_id->HrefValue = "";

			// gioi_tinh
			$user->gioi_tinh->HrefValue = "";

			// hoten_nguoilienhe
			$user->hoten_nguoilienhe->HrefValue = "";

			// ten_congty
			$user->ten_congty->HrefValue = "";

			// ten_viettat
			$user->ten_viettat->HrefValue = "";

			// logo_congty
			if (!is_null($user->logo_congty->Upload->DbValue)) {
				$user->logo_congty->HrefValue = "user_logo_congty_bv.php?nguoidung_id=" . $user->nguoidung_id->CurrentValue;
				if ($user->Export <> "") $user->logo_congty->HrefValue = ew_ConvertFullUrl($user->logo_congty->HrefValue);
			} else {
				$user->logo_congty->HrefValue = "";
			}

			// website
			$user->website->HrefValue = "";

			// chuc_nang
			$user->chuc_nang->HrefValue = "";

			// loaikinhdoanh_id
			$user->loaikinhdoanh_id->HrefValue = "";

			// loaicongty_id
			$user->loaicongty_id->HrefValue = "";

			// so_congnhan
			$user->so_congnhan->HrefValue = "";

			// nam_thanhlap
			$user->nam_thanhlap->HrefValue = "";

			// kim_ngach
			$user->kim_ngach->HrefValue = "";

			// cung_cap
			$user->cung_cap->HrefValue = "";

			// chung_chi
			$user->chung_chi->HrefValue = "";

			// so_dkkd
			$user->so_dkkd->HrefValue = "";

			// ngay_thamgia
			$user->ngay_thamgia->HrefValue = "";

			// so_dienthoai
			$user->so_dienthoai->HrefValue = "";

			// so_fax
			$user->so_fax->HrefValue = "";

			// dia_chi
			$user->dia_chi->HrefValue = "";

			// tinh_thanh
			$user->tinh_thanh->HrefValue = "";

			// quan_huyen
			$user->quan_huyen->HrefValue = "";

			// gioi_thieu
			$user->gioi_thieu->HrefValue = "";

			// nick_yahoo
			$user->nick_yahoo->HrefValue = "";

			// nick_skype
			$user->nick_skype->HrefValue = "";

			// truycap_gannhat
			$user->truycap_gannhat->HrefValue = "";

			// kieu_giaodien
			$user->kieu_giaodien->HrefValue = "";

			// UserLevelID
			$user->UserLevelID->HrefValue = "";

			// nganhnghe_lienquan
			$user->nganhnghe_lienquan->HrefValue = "";

			// thitruong_lienquan
			$user->thitruong_lienquan->HrefValue = "";
		}

		// Call Row Rendered event
		$user->Row_Rendered();
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $user;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($user->nguoidung_id->CurrentValue);
			}
		}
		return TRUE;
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}
}
?>
