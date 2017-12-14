<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "UsersRegisteredinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "userfn6.php" ?>
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Define page object
$UsersRegistered_view = new cUsersRegistered_view();
$Page =& $UsersRegistered_view;

// Page init processing
$UsersRegistered_view->Page_Init();

// Page main processing
$UsersRegistered_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($UsersRegistered->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var UsersRegistered_view = new ew_Page("UsersRegistered_view");

// page properties
UsersRegistered_view.PageID = "view"; // page ID
var EW_PAGE_ID = UsersRegistered_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
UsersRegistered_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
UsersRegistered_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
UsersRegistered_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
UsersRegistered_view.ValidateRequired = false; // no JavaScript validation
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
								<a href="UsersRegisteredlist.php"><img border="0" src="images/cmd_trove.gif"></a><b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Quản lý thành viên</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($UsersRegistered->Export == "") { ?>

<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $UsersRegistered->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $UsersRegistered->EditUrl() ?>"><img border="0" src="images/cmd_sua.gif"></a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a onclick="return ew_Confirm('Bạn có muốn xóa người dùng này không?');" href="<?php echo $UsersRegistered->DeleteUrl() ?>"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php $UsersRegistered_view->ShowMessage() ?>
<p>
<?php if ($UsersRegistered->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($UsersRegistered_view->Pager)) $UsersRegistered_view->Pager = new cNumericPager($UsersRegistered_view->lStartRec, $UsersRegistered_view->lDisplayRecs, $UsersRegistered_view->lTotalRecs, $UsersRegistered_view->lRecRange) ?>
<?php if ($UsersRegistered_view->Pager->RecordCount > 0) { ?>
	<?php if ($UsersRegistered_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $UsersRegistered_view->PageUrl() ?>start=<?php echo $UsersRegistered_view->Pager->FirstButton->Start ?>"><b>Đầu tiên</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersRegistered_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $UsersRegistered_view->PageUrl() ?>start=<?php echo $UsersRegistered_view->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($UsersRegistered_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $UsersRegistered_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($UsersRegistered_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $UsersRegistered_view->PageUrl() ?>start=<?php echo $UsersRegistered_view->Pager->NextButton->Start ?>"><b>Tiếp theo</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersRegistered_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $UsersRegistered_view->PageUrl() ?>start=<?php echo $UsersRegistered_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($UsersRegistered_view->sSrchWhere == "0=101") { ?>
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
								&nbsp;&nbsp;&nbsp;Thông tin công ty</font></b><br><br>
								<td height="20" width="100%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
</table>
<table cellspacing="0" class="ewTable">
<?php if ($UsersRegistered->ten_congty->Visible) { // ten_congty ?>
	<tr<?php echo $UsersRegistered->ten_congty->RowAttributes ?>>
		<td class="ewTableHeader">Tên thành viên</td>
		<td<?php echo $UsersRegistered->ten_congty->CellAttributes() ?>>
<div<?php echo $UsersRegistered->ten_congty->ViewAttributes() ?>><?php echo $UsersRegistered->ten_congty->ViewValue ?></div></td>
	</tr>
<?php } ?>

<?php if ($UsersRegistered->ten_viettat->Visible) { // ten_viettat ?>
	<tr<?php echo $UsersRegistered->ten_viettat->RowAttributes ?>>
		<td class="ewTableHeader">Tên viết tắt</td>
		<td<?php echo $UsersRegistered->ten_viettat->CellAttributes() ?>>
<div<?php echo $UsersRegistered->ten_viettat->ViewAttributes() ?>><?php echo $UsersRegistered->ten_viettat->ViewValue ?></div></td>
	</tr>
<?php } ?>

<?php if ($UsersRegistered->logo_congty->Visible) { // logo_congty ?>
	<tr<?php echo $UsersRegistered->logo_congty->RowAttributes ?>>
		<td class="ewTableHeader">Avatar</td>
		<td<?php echo $UsersRegistered->logo_congty->CellAttributes() ?>>
<?php if ($UsersRegistered->logo_congty->HrefValue <> "") { ?>
<?php if (!is_null($UsersRegistered->logo_congty->Upload->DbValue)) { ?>
<a href="<?php echo $UsersRegistered->logo_congty->HrefValue ?>" target="_blank"><img src="UsersRegistered_logo_congty_bv.php?nguoidung_id=<?php echo $UsersRegistered->nguoidung_id->CurrentValue ?>" border=0<?php echo $UsersRegistered->logo_congty->ViewAttributes() ?>></a>
<?php } elseif (!in_array($UsersRegistered->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($UsersRegistered->logo_congty->Upload->DbValue)) { ?>
<img src="UsersRegistered_logo_congty_bv.php?nguoidung_id=<?php echo $UsersRegistered->nguoidung_id->CurrentValue ?>" border=0<?php echo $UsersRegistered->logo_congty->ViewAttributes() ?>>
<?php } elseif (!in_array($UsersRegistered->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	</tr>
<?php } ?>

<?php if ($UsersRegistered->website->Visible) { // website ?>
	<tr<?php echo $UsersRegistered->website->RowAttributes ?>>
		<td class="ewTableHeader">Website</td>
		<td<?php echo $UsersRegistered->website->CellAttributes() ?>>
<div<?php echo $UsersRegistered->website->ViewAttributes() ?>><?php echo $UsersRegistered->website->ViewValue ?></div></td>
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

<?php if ($UsersRegistered->nguoidung_option->Visible) { // nguoidung_option ?>
	<tr<?php echo $UsersRegistered->nguoidung_option->RowAttributes ?>>
		<td class="ewTableHeader">Loại người dùng</td>
		<td<?php echo $UsersRegistered->nguoidung_option->CellAttributes() ?>>
<div<?php echo $UsersRegistered->nguoidung_option->ViewAttributes() ?>><?php echo $UsersRegistered->nguoidung_option->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UsersRegistered->tendangnhap->Visible) { // tendangnhap ?>
	<tr<?php echo $UsersRegistered->tendangnhap->RowAttributes ?>>
		<td class="ewTableHeader">Tên đăng nhập</td>
		<td<?php echo $UsersRegistered->tendangnhap->CellAttributes() ?>>
<div<?php echo $UsersRegistered->tendangnhap->ViewAttributes() ?>><?php echo $UsersRegistered->tendangnhap->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UsersRegistered->quocgia_id->Visible) { // quocgia_id ?>
	<tr<?php echo $UsersRegistered->quocgia_id->RowAttributes ?>>
		<td class="ewTableHeader">Quốc gia</td>
		<td<?php echo $UsersRegistered->quocgia_id->CellAttributes() ?>>
<div<?php echo $UsersRegistered->quocgia_id->ViewAttributes() ?>><?php echo $UsersRegistered->quocgia_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UsersRegistered->hoten_nguoilienhe->Visible) { // hoten_nguoilienhe ?>
	<tr<?php echo $UsersRegistered->hoten_nguoilienhe->RowAttributes ?>>
		<td class="ewTableHeader">Họ và tên người liên hệ</td>
		<td<?php echo $UsersRegistered->hoten_nguoilienhe->CellAttributes() ?>>
			<div<?php echo $UsersRegistered->hoten_nguoilienhe->ViewAttributes() ?>><?php echo $UsersRegistered->hoten_nguoilienhe->ViewValue ?>
			</div>
		</td>
	</tr>
<?php } ?>

<?php if ($UsersRegistered->gioi_tinh->Visible) { // gioi_tinh ?>
	<tr<?php echo $UsersRegistered->gioi_tinh->RowAttributes ?>>
		<td class="ewTableHeader">Giới tính</td>
		<td<?php echo $UsersRegistered->gioi_tinh->CellAttributes() ?>>
<div<?php echo $UsersRegistered->gioi_tinh->ViewAttributes() ?>><?php echo $UsersRegistered->gioi_tinh->ViewValue ?></div></td>
	</tr>
<?php } ?>


<?php if ($UsersRegistered->so_dienthoai->Visible) { // so_dienthoai ?>
	<tr<?php echo $UsersRegistered->so_dienthoai->RowAttributes ?>>
		<td class="ewTableHeader">Số điện thoại</td>
		<td<?php echo $UsersRegistered->so_dienthoai->CellAttributes() ?>>
		<div<?php echo $UsersRegistered->so_dienthoai->ViewAttributes() ?>>
		<?php echo $UsersRegistered->so_dienthoai->ViewValue ?></div>
		</td>
	</tr>
<?php } ?>
<?php if ($UsersRegistered->so_fax->Visible) { // so_fax ?>
	<tr<?php echo $UsersRegistered->so_fax->RowAttributes ?>>
	<td class="ewTableHeader">Số Fax</td>
	<td<?php echo $UsersRegistered->so_fax->CellAttributes() ?>>
	<div<?php echo $UsersRegistered->so_fax->ViewAttributes() ?>>
	<?php echo $UsersRegistered->so_fax->ViewValue ?></div></td>
	</tr>
<?php } ?>

<?php if ($UsersRegistered->dia_chi->Visible) { // dia_chi ?>
	<tr<?php echo $UsersRegistered->dia_chi->RowAttributes ?>>
		<td class="ewTableHeader">Địa chỉ</td>
		<td<?php echo $UsersRegistered->dia_chi->CellAttributes() ?>>
<div<?php echo $UsersRegistered->dia_chi->ViewAttributes() ?>><?php echo $UsersRegistered->dia_chi->ViewValue ?></div></td>
	</tr>
<?php } ?>

<?php if ($UsersRegistered->gioi_thieu->Visible) { // gioi_thieu ?>
	<tr<?php echo $UsersRegistered->gioi_thieu->RowAttributes ?>>
		<td class="ewTableHeader">Giới thiệu</td>
		<td<?php echo $UsersRegistered->gioi_thieu->CellAttributes() ?>>
<div<?php echo $UsersRegistered->gioi_thieu->ViewAttributes() ?>><?php echo $UsersRegistered->gioi_thieu->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UsersRegistered->nick_yahoo->Visible) { // nick_yahoo ?>
	<tr<?php echo $UsersRegistered->nick_yahoo->RowAttributes ?>>
		<td class="ewTableHeader">Nick Yahoo</td>
		<td<?php echo $UsersRegistered->nick_yahoo->CellAttributes() ?>>
<div<?php echo $UsersRegistered->nick_yahoo->ViewAttributes() ?>><?php echo $UsersRegistered->nick_yahoo->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UsersRegistered->nick_skype->Visible) { // nick_skype ?>
	<tr<?php echo $UsersRegistered->nick_skype->RowAttributes ?>>
		<td class="ewTableHeader">Nick Skype</td>
		<td<?php echo $UsersRegistered->nick_skype->CellAttributes() ?>>
<div<?php echo $UsersRegistered->nick_skype->ViewAttributes() ?>><?php echo $UsersRegistered->nick_skype->ViewValue ?></div></td>
	</tr>
<?php } ?>

<?php if ($UsersRegistered->kieu_giaodien->Visible) { // kieu_giaodien ?>
	<tr<?php echo $UsersRegistered->kieu_giaodien->RowAttributes ?>>
		<td class="ewTableHeader">Kiểu giao diện</td>
		<td<?php echo $UsersRegistered->kieu_giaodien->CellAttributes() ?>>
                    <a href="<?php echo $UsersRegistered->getlink_kieu_giaodien() ?>" target="_blank"><img src="<?php echo $UsersRegistered->getimage_kieu_giaodien() ?>" border=0 width=100 height =70></a>
                    <br><br>
<div<?php echo $UsersRegistered->kieu_giaodien->ViewAttributes() ?>><?php echo $UsersRegistered->kieu_giaodien->ViewValue ?>
	<a href="<?php echo $UsersRegistered->getlink_kieu_giaodien() ?>" target = "_blank">(Xem)</a>
	&nbsp;&nbsp;<b><font face="Verdana" size="1" color="#FF0000">(Chú ý: Kiểu giao diện áp dụng cho trang chủ của người dùng)</font></b>
	</div></td>
	</tr>
<?php } ?>
<?php if ($UsersRegistered->truycap_gannhat->Visible) { // truycap_gannhat ?>
	<tr<?php echo $UsersRegistered->truycap_gannhat->RowAttributes ?>>
		<td class="ewTableHeader">Truy cập gần nhất</td>
		<td<?php echo $UsersRegistered->truycap_gannhat->CellAttributes() ?>>
<div<?php echo $UsersRegistered->truycap_gannhat->ViewAttributes() ?>><?php echo $UsersRegistered->truycap_gannhat->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($UsersRegistered->UserLevelID->Visible) { // UserLevelID ?>
	<tr<?php echo $UsersRegistered->UserLevelID->RowAttributes ?>>
		<td class="ewTableHeader">Cấp bậc</td>
		<td<?php echo $UsersRegistered->UserLevelID->CellAttributes() ?>>
<div<?php echo $UsersRegistered->UserLevelID->ViewAttributes() ?>><?php
    if ($UsersRegistered->UserLevelID->ListViewValue() =="Thành viên chưa kích hoạt"){
       echo "<font color=\"#FF0000\">". $UsersRegistered->UserLevelID->ListViewValue() ."</font>";
    }else{
       echo $UsersRegistered->UserLevelID->ListViewValue();
    }?></div></td>
	</tr>
<?php } ?>

</table>
</div>
</td></tr></table>
<?php if ($UsersRegistered->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($UsersRegistered_view->Pager)) $UsersRegistered_view->Pager = new cNumericPager($UsersRegistered_view->lStartRec, $UsersRegistered_view->lDisplayRecs, $UsersRegistered_view->lTotalRecs, $UsersRegistered_view->lRecRange) ?>
<?php if ($UsersRegistered_view->Pager->RecordCount > 0) { ?>
	<?php if ($UsersRegistered_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $UsersRegistered_view->PageUrl() ?>start=<?php echo $UsersRegistered_view->Pager->FirstButton->Start ?>"><b>Đầu tiên</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersRegistered_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $UsersRegistered_view->PageUrl() ?>start=<?php echo $UsersRegistered_view->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($UsersRegistered_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $UsersRegistered_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($UsersRegistered_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $UsersRegistered_view->PageUrl() ?>start=<?php echo $UsersRegistered_view->Pager->NextButton->Start ?>"><b>Tiếp theo</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersRegistered_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $UsersRegistered_view->PageUrl() ?>start=<?php echo $UsersRegistered_view->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($UsersRegistered_view->sSrchWhere == "0=101") { ?>
	Hãy điền từ khóa tìm kiếm
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền xem trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($UsersRegistered->Export == "") { ?>
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
class cUsersRegistered_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'UsersRegistered';

	// Page Object Name
	var $PageObjName = 'UsersRegistered_view';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $UsersRegistered;
		if ($UsersRegistered->UseTokenInUrl) $PageUrl .= "t=" . $UsersRegistered->TableVar . "&"; // add page token
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
		global $objForm, $UsersRegistered;
		if ($UsersRegistered->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($UsersRegistered->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($UsersRegistered->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cUsersRegistered_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["UsersRegistered"] = new cUsersRegistered();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'UsersRegistered', TRUE);

		// Open connection to the database
		$conn = ew_Connect();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UsersRegistered;
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
			$this->Page_Terminate("UsersRegisteredlist.php");
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
		global $UsersRegistered;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["nguoidung_id"] <> "") {
				$UsersRegistered->nguoidung_id->setQueryStringValue($_GET["nguoidung_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$UsersRegistered->CurrentAction = "I"; // Display form
			switch ($UsersRegistered->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("Không có dữ liệu"); // Set no record message
						$this->Page_Terminate("UsersRegisteredlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($UsersRegistered->nguoidung_id->CurrentValue) == strval($rs->fields('nguoidung_id'))) {
								$UsersRegistered->setStartRecordNumber($this->lStartRec); // Save record position
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
						$sReturnUrl = "UsersRegisteredlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}
		} else {
			$sReturnUrl = "UsersRegisteredlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$UsersRegistered->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $UsersRegistered;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$UsersRegistered->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$UsersRegistered->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $UsersRegistered->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$UsersRegistered->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$UsersRegistered->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$UsersRegistered->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $UsersRegistered;

		// Call Recordset Selecting event
		$UsersRegistered->Recordset_Selecting($UsersRegistered->CurrentFilter);

		// Load list page SQL
		$sSql = $UsersRegistered->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$UsersRegistered->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $UsersRegistered;
		$sFilter = $UsersRegistered->KeyFilter();

		// Call Row Selecting event
		$UsersRegistered->Row_Selecting($sFilter);

		// Load sql based on filter
		$UsersRegistered->CurrentFilter = $sFilter;
		$sSql = $UsersRegistered->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$UsersRegistered->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $UsersRegistered;
		$UsersRegistered->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$UsersRegistered->nguoidung_option->setDbValue($rs->fields('nguoidung_option'));
		$UsersRegistered->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$UsersRegistered->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$UsersRegistered->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$UsersRegistered->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));
		$UsersRegistered->mat_khau->setDbValue($rs->fields('mat_khau'));
		$UsersRegistered->ten_congty->setDbValue($rs->fields('ten_congty'));
		$UsersRegistered->ten_viettat->setDbValue($rs->fields('ten_viettat'));
		$UsersRegistered->logo_congty->Upload->DbValue = $rs->fields('logo_congty');
		$UsersRegistered->website->setDbValue($rs->fields('website'));
		$UsersRegistered->chuc_nang->setDbValue($rs->fields('chuc_nang'));
		$UsersRegistered->loaikinhdoanh_id->setDbValue($rs->fields('loaikinhdoanh_id'));
		$UsersRegistered->loaicongty_id->setDbValue($rs->fields('loaicongty_id'));
		$UsersRegistered->so_congnhan->setDbValue($rs->fields('so_congnhan'));
		$UsersRegistered->nam_thanhlap->setDbValue($rs->fields('nam_thanhlap'));
		$UsersRegistered->kim_ngach->setDbValue($rs->fields('kim_ngach'));
		$UsersRegistered->cung_cap->setDbValue($rs->fields('cung_cap'));
		$UsersRegistered->chung_chi->setDbValue($rs->fields('chung_chi'));
		$UsersRegistered->so_dkkd->setDbValue($rs->fields('so_dkkd'));
		$UsersRegistered->ngay_thamgia->setDbValue($rs->fields('ngay_thamgia'));
		$UsersRegistered->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$UsersRegistered->so_fax->setDbValue($rs->fields('so_fax'));
		$UsersRegistered->dia_chi->setDbValue($rs->fields('dia_chi'));
		$UsersRegistered->tinh_thanh->setDbValue($rs->fields('tinh_thanh'));
		$UsersRegistered->quan_huyen->setDbValue($rs->fields('quan_huyen'));
		$UsersRegistered->gioi_thieu->setDbValue($rs->fields('gioi_thieu'));
		$UsersRegistered->nick_yahoo->setDbValue($rs->fields('nick_yahoo'));
		$UsersRegistered->nick_skype->setDbValue($rs->fields('nick_skype'));
		$UsersRegistered->truycap_gannhat->setDbValue($rs->fields('truycap_gannhat'));
		$UsersRegistered->kieu_giaodien->setDbValue($rs->fields('kieu_giaodien'));
		$UsersRegistered->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		$UsersRegistered->nganhnghe_lienquan->setDbValue($rs->fields('nganhnghe_lienquan'));
		$UsersRegistered->thitruong_lienquan->setDbValue($rs->fields('thitruong_lienquan'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $UsersRegistered;

		// Call Row_Rendering event
		$UsersRegistered->Row_Rendering();

		// Common render codes for all row types
		// nguoidung_option

		$UsersRegistered->nguoidung_option->CellCssStyle = "";
		$UsersRegistered->nguoidung_option->CellCssClass = "";

		// tendangnhap
		$UsersRegistered->tendangnhap->CellCssStyle = "";
		$UsersRegistered->tendangnhap->CellCssClass = "";

		// quocgia_id
		$UsersRegistered->quocgia_id->CellCssStyle = "";
		$UsersRegistered->quocgia_id->CellCssClass = "";

		// gioi_tinh
		$UsersRegistered->gioi_tinh->CellCssStyle = "";
		$UsersRegistered->gioi_tinh->CellCssClass = "";

		// hoten_nguoilienhe
		$UsersRegistered->hoten_nguoilienhe->CellCssStyle = "";
		$UsersRegistered->hoten_nguoilienhe->CellCssClass = "";

                // ten_congty
		$UsersRegistered->ten_congty->CellCssStyle = "";
		$UsersRegistered->ten_congty->CellCssClass = "";

		// ten_viettat
		$UsersRegistered->ten_viettat->CellCssStyle = "";
		$UsersRegistered->ten_viettat->CellCssClass = "";

		// logo_congty
		$UsersRegistered->logo_congty->CellCssStyle = "";
		$UsersRegistered->logo_congty->CellCssClass = "";

		// website
		$UsersRegistered->website->CellCssStyle = "";
		$UsersRegistered->website->CellCssClass = "";

		// chuc_nang
		$UsersRegistered->chuc_nang->CellCssStyle = "";
		$UsersRegistered->chuc_nang->CellCssClass = "";

		// loaikinhdoanh_id
		$UsersRegistered->loaikinhdoanh_id->CellCssStyle = "";
		$UsersRegistered->loaikinhdoanh_id->CellCssClass = "";

		// loaicongty_id
		$UsersRegistered->loaicongty_id->CellCssStyle = "";
		$UsersRegistered->loaicongty_id->CellCssClass = "";

		// so_congnhan
		$UsersRegistered->so_congnhan->CellCssStyle = "";
		$UsersRegistered->so_congnhan->CellCssClass = "";

		// nam_thanhlap
		$UsersRegistered->nam_thanhlap->CellCssStyle = "";
		$UsersRegistered->nam_thanhlap->CellCssClass = "";

		// kim_ngach
		$UsersRegistered->kim_ngach->CellCssStyle = "";
		$UsersRegistered->kim_ngach->CellCssClass = "";

		// cung_cap
		$UsersRegistered->cung_cap->CellCssStyle = "";
		$UsersRegistered->cung_cap->CellCssClass = "";

		// chung_chi
		$UsersRegistered->chung_chi->CellCssStyle = "";
		$UsersRegistered->chung_chi->CellCssClass = "";

		// so_dkkd
		$UsersRegistered->so_dkkd->CellCssStyle = "";
		$UsersRegistered->so_dkkd->CellCssClass = "";

		// ngay_thamgia
		$UsersRegistered->ngay_thamgia->CellCssStyle = "";
		$UsersRegistered->ngay_thamgia->CellCssClass = "";

		// so_dienthoai
		$UsersRegistered->so_dienthoai->CellCssStyle = "";
		$UsersRegistered->so_dienthoai->CellCssClass = "";

		// so_fax
		$UsersRegistered->so_fax->CellCssStyle = "";
		$UsersRegistered->so_fax->CellCssClass = "";

		// dia_chi
		$UsersRegistered->dia_chi->CellCssStyle = "";
		$UsersRegistered->dia_chi->CellCssClass = "";

		// tinh_thanh
		$UsersRegistered->tinh_thanh->CellCssStyle = "";
		$UsersRegistered->tinh_thanh->CellCssClass = "";

		// quan_huyen
		$UsersRegistered->quan_huyen->CellCssStyle = "";
		$UsersRegistered->quan_huyen->CellCssClass = "";

		// gioi_thieu
		$UsersRegistered->gioi_thieu->CellCssStyle = "";
		$UsersRegistered->gioi_thieu->CellCssClass = "";

		// nick_yahoo
		$UsersRegistered->nick_yahoo->CellCssStyle = "";
		$UsersRegistered->nick_yahoo->CellCssClass = "";

		// nick_skype
		$UsersRegistered->nick_skype->CellCssStyle = "";
		$UsersRegistered->nick_skype->CellCssClass = "";

		// truycap_gannhat
		$UsersRegistered->truycap_gannhat->CellCssStyle = "";
		$UsersRegistered->truycap_gannhat->CellCssClass = "";

		// kieu_giaodien
		$UsersRegistered->kieu_giaodien->CellCssStyle = "";
		$UsersRegistered->kieu_giaodien->CellCssClass = "";

		// UserLevelID
		$UsersRegistered->UserLevelID->CellCssStyle = "";
		$UsersRegistered->UserLevelID->CellCssClass = "";

		// nganhnghe_lienquan
		$UsersRegistered->nganhnghe_lienquan->CellCssStyle = "";
		$UsersRegistered->nganhnghe_lienquan->CellCssClass = "";

		// thitruong_lienquan
		$UsersRegistered->thitruong_lienquan->CellCssStyle = "";
		$UsersRegistered->thitruong_lienquan->CellCssClass = "";
		if ($UsersRegistered->RowType == EW_ROWTYPE_VIEW) { // View row

			// nguoidung_option
			if (strval($UsersRegistered->nguoidung_option->CurrentValue) <> "") {
				switch ($UsersRegistered->nguoidung_option->CurrentValue) {
					case "0":
						$UsersRegistered->nguoidung_option->ViewValue = "Quản lý hệ thống";
						break;
					case "1":
						$UsersRegistered->nguoidung_option->ViewValue = "Thành viên đăng ký";
						break;
					default:
						$UsersRegistered->nguoidung_option->ViewValue = $UsersRegistered->nguoidung_option->CurrentValue;
				}
			} else {
				$UsersRegistered->nguoidung_option->ViewValue = NULL;
			}
			$UsersRegistered->nguoidung_option->CssStyle = "";
			$UsersRegistered->nguoidung_option->CssClass = "";
			$UsersRegistered->nguoidung_option->ViewCustomAttributes = "";

			// tendangnhap
			$UsersRegistered->tendangnhap->ViewValue = $UsersRegistered->tendangnhap->CurrentValue;
			$UsersRegistered->tendangnhap->CssStyle = "";
			$UsersRegistered->tendangnhap->CssClass = "";
			$UsersRegistered->tendangnhap->ViewCustomAttributes = "";

			// quocgia_id
			if (strval($UsersRegistered->quocgia_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_quocgia` FROM `country` WHERE `quocgia_id` = '" . ew_AdjustSql($UsersRegistered->quocgia_id->CurrentValue) . "'";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersRegistered->quocgia_id->ViewValue = $rswrk->fields('ten_quocgia');
					$rswrk->Close();
				} else {
					$UsersRegistered->quocgia_id->ViewValue = $UsersRegistered->quocgia_id->CurrentValue;
				}
			} else {
				$UsersRegistered->quocgia_id->ViewValue = NULL;
			}
			$UsersRegistered->quocgia_id->CssStyle = "";
			$UsersRegistered->quocgia_id->CssClass = "";
			$UsersRegistered->quocgia_id->ViewCustomAttributes = "";

			// gioi_tinh
			if (strval($UsersRegistered->gioi_tinh->CurrentValue) <> "") {
				switch ($UsersRegistered->gioi_tinh->CurrentValue) {
					case "0":
						$UsersRegistered->gioi_tinh->ViewValue = "Nam";
						break;
					case "1":
						$UsersRegistered->gioi_tinh->ViewValue = "Nữ";
						break;
					default:
						$UsersRegistered->gioi_tinh->ViewValue = $UsersRegistered->gioi_tinh->CurrentValue;
				}
			} else {
				$UsersRegistered->gioi_tinh->ViewValue = NULL;
			}
			$UsersRegistered->gioi_tinh->CssStyle = "";
			$UsersRegistered->gioi_tinh->CssClass = "";
			$UsersRegistered->gioi_tinh->ViewCustomAttributes = "";

			// hoten_nguoilienhe
			$UsersRegistered->hoten_nguoilienhe->ViewValue = $UsersRegistered->hoten_nguoilienhe->CurrentValue;
			$UsersRegistered->hoten_nguoilienhe->CssStyle = "";
			$UsersRegistered->hoten_nguoilienhe->CssClass = "";
			$UsersRegistered->hoten_nguoilienhe->ViewCustomAttributes = "";

			// ten_congty
			$UsersRegistered->ten_congty->ViewValue = $UsersRegistered->ten_congty->CurrentValue;
			$UsersRegistered->ten_congty->CssStyle = "";
			$UsersRegistered->ten_congty->CssClass = "";
			$UsersRegistered->ten_congty->ViewCustomAttributes = "";

			// ten_viettat
			$UsersRegistered->ten_viettat->ViewValue = $UsersRegistered->ten_viettat->CurrentValue;
			$UsersRegistered->ten_viettat->CssStyle = "";
			$UsersRegistered->ten_viettat->CssClass = "";
			$UsersRegistered->ten_viettat->ViewCustomAttributes = "";

			// logo_congty
			if (!is_null($UsersRegistered->logo_congty->Upload->DbValue)) {
				$UsersRegistered->logo_congty->ViewValue = "Logo công ty";
				$UsersRegistered->logo_congty->ImageWidth = 150;
				$UsersRegistered->logo_congty->ImageHeight = 0;
				$UsersRegistered->logo_congty->ImageAlt = "";
			} else {
				$UsersRegistered->logo_congty->ViewValue = "";
			}
			$UsersRegistered->logo_congty->CssStyle = "";
			$UsersRegistered->logo_congty->CssClass = "";
			$UsersRegistered->logo_congty->ViewCustomAttributes = "";
			

			// website
			$UsersRegistered->website->ViewValue = $UsersRegistered->website->CurrentValue;
			$UsersRegistered->website->CssStyle = "";
			$UsersRegistered->website->CssClass = "";
			$UsersRegistered->website->ViewCustomAttributes = "";

			// chuc_nang
			if (strval($UsersRegistered->chuc_nang->CurrentValue) <> "") {
				switch ($UsersRegistered->chuc_nang->CurrentValue) {
					case "1":
						$UsersRegistered->chuc_nang->ViewValue = "Người bán";
						break;
					case "2":
						$UsersRegistered->chuc_nang->ViewValue = "Người mua";
						break;
					case "3":
						$UsersRegistered->chuc_nang->ViewValue = "Người bán và Người mua";
						break;
					default:
						$UsersRegistered->chuc_nang->ViewValue = $UsersRegistered->chuc_nang->CurrentValue;
				}
			} else {
				$UsersRegistered->chuc_nang->ViewValue = NULL;
			}
			$UsersRegistered->chuc_nang->CssStyle = "";
			$UsersRegistered->chuc_nang->CssClass = "";
			$UsersRegistered->chuc_nang->ViewCustomAttributes = "";

			// loaikinhdoanh_id
			if (strval($UsersRegistered->loaikinhdoanh_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `loaikinhdoanh_ten` FROM `type_business` WHERE `loaikinhdoanh_id` = " . ew_AdjustSql($UsersRegistered->loaikinhdoanh_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersRegistered->loaikinhdoanh_id->ViewValue = $rswrk->fields('loaikinhdoanh_ten');
					$rswrk->Close();
				} else {
					$UsersRegistered->loaikinhdoanh_id->ViewValue = $UsersRegistered->loaikinhdoanh_id->CurrentValue;
				}
			} else {
				$UsersRegistered->loaikinhdoanh_id->ViewValue = NULL;
			}
			$UsersRegistered->loaikinhdoanh_id->CssStyle = "";
			$UsersRegistered->loaikinhdoanh_id->CssClass = "";
			$UsersRegistered->loaikinhdoanh_id->ViewCustomAttributes = "";

			// loaicongty_id
			if (strval($UsersRegistered->loaicongty_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `loaicongty_ten` FROM `type_company` WHERE `loaicongty_id` = " . ew_AdjustSql($UsersRegistered->loaicongty_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersRegistered->loaicongty_id->ViewValue = $rswrk->fields('loaicongty_ten');
					$rswrk->Close();
				} else {
					$UsersRegistered->loaicongty_id->ViewValue = $UsersRegistered->loaicongty_id->CurrentValue;
				}
			} else {
				$UsersRegistered->loaicongty_id->ViewValue = NULL;
			}
			$UsersRegistered->loaicongty_id->CssStyle = "";
			$UsersRegistered->loaicongty_id->CssClass = "";
			$UsersRegistered->loaicongty_id->ViewCustomAttributes = "";

			// so_congnhan
			if (strval($UsersRegistered->so_congnhan->CurrentValue) <> "") {
				switch ($UsersRegistered->so_congnhan->CurrentValue) {
					case "1":
						$UsersRegistered->so_congnhan->ViewValue = "Dưới 5 người";
						break;
					case "2":
						$UsersRegistered->so_congnhan->ViewValue = "Từ 5 đến 10 người";
						break;
					case "3":
						$UsersRegistered->so_congnhan->ViewValue = "Từ 11 đến 50 người";
						break;
					case "4":
						$UsersRegistered->so_congnhan->ViewValue = "Từ 51 đến 100 người";
						break;
					case "5":
						$UsersRegistered->so_congnhan->ViewValue = "từ 101 đến 500 người";
						break;
					case "6":
						$UsersRegistered->so_congnhan->ViewValue = "Từ 501 đến 1000 người";
						break;
					case "7":
						$UsersRegistered->so_congnhan->ViewValue = "Trên 1000 người";
						break;
					default:
						$UsersRegistered->so_congnhan->ViewValue = $UsersRegistered->so_congnhan->CurrentValue;
				}
			} else {
				$UsersRegistered->so_congnhan->ViewValue = NULL;
			}
			$UsersRegistered->so_congnhan->CssStyle = "";
			$UsersRegistered->so_congnhan->CssClass = "";
			$UsersRegistered->so_congnhan->ViewCustomAttributes = "";

			// nam_thanhlap
			$UsersRegistered->nam_thanhlap->ViewValue = $UsersRegistered->nam_thanhlap->CurrentValue;
			$UsersRegistered->nam_thanhlap->CssStyle = "";
			$UsersRegistered->nam_thanhlap->CssClass = "";
			$UsersRegistered->nam_thanhlap->ViewCustomAttributes = "";

			// kim_ngach
			if (strval($UsersRegistered->kim_ngach->CurrentValue) <> "") {
				switch ($UsersRegistered->kim_ngach->CurrentValue) {
					case "1":
						$UsersRegistered->kim_ngach->ViewValue = "Dưới 1 triệu USD";
						break;
					case "2":
						$UsersRegistered->kim_ngach->ViewValue = "Trên 100 triệu USD";
						break;
					case "3":
						$UsersRegistered->kim_ngach->ViewValue = "Từ 1 đến 2.5 triệu USD";
						break;
					case "4":
						$UsersRegistered->kim_ngach->ViewValue = "Từ 2.5 đến 5 triệu USD";
						break;
					case "5":
						$UsersRegistered->kim_ngach->ViewValue = "Từ 5 đến 10 triệu USD";
						break;
					case "6":
						$UsersRegistered->kim_ngach->ViewValue = "Từ 10 đến 50 triệu USD";
						break;
					case "7":
						$UsersRegistered->kim_ngach->ViewValue = "Từ 50 đến 100 triệu USD";
						break;
					default:
						$UsersRegistered->kim_ngach->ViewValue = $UsersRegistered->kim_ngach->CurrentValue;
				}
			} else {
				$UsersRegistered->kim_ngach->ViewValue = NULL;
			}
			$UsersRegistered->kim_ngach->CssStyle = "";
			$UsersRegistered->kim_ngach->CssClass = "";
			$UsersRegistered->kim_ngach->ViewCustomAttributes = "";

			// cung_cap
			$UsersRegistered->cung_cap->ViewValue = $UsersRegistered->cung_cap->CurrentValue;
			$UsersRegistered->cung_cap->CssStyle = "";
			$UsersRegistered->cung_cap->CssClass = "";
			$UsersRegistered->cung_cap->ViewCustomAttributes = "";

			// chung_chi
			$UsersRegistered->chung_chi->ViewValue = $UsersRegistered->chung_chi->CurrentValue;
			$UsersRegistered->chung_chi->CssStyle = "";
			$UsersRegistered->chung_chi->CssClass = "";
			$UsersRegistered->chung_chi->ViewCustomAttributes = "";

			// so_dkkd
			$UsersRegistered->so_dkkd->ViewValue = $UsersRegistered->so_dkkd->CurrentValue;
			$UsersRegistered->so_dkkd->CssStyle = "";
			$UsersRegistered->so_dkkd->CssClass = "";
			$UsersRegistered->so_dkkd->ViewCustomAttributes = "";

			// ngay_thamgia
			$UsersRegistered->ngay_thamgia->ViewValue = $UsersRegistered->ngay_thamgia->CurrentValue;
			$UsersRegistered->ngay_thamgia->ViewValue = ew_FormatDateTime($UsersRegistered->ngay_thamgia->ViewValue, 7);
			$UsersRegistered->ngay_thamgia->CssStyle = "";
			$UsersRegistered->ngay_thamgia->CssClass = "";
			$UsersRegistered->ngay_thamgia->ViewCustomAttributes = "";

			// so_dienthoai
			$UsersRegistered->so_dienthoai->ViewValue = $UsersRegistered->so_dienthoai->CurrentValue;
			$UsersRegistered->so_dienthoai->CssStyle = "";
			$UsersRegistered->so_dienthoai->CssClass = "";
			$UsersRegistered->so_dienthoai->ViewCustomAttributes = "";

			// so_fax
			$UsersRegistered->so_fax->ViewValue = $UsersRegistered->so_fax->CurrentValue;
			$UsersRegistered->so_fax->CssStyle = "";
			$UsersRegistered->so_fax->CssClass = "";
			$UsersRegistered->so_fax->ViewCustomAttributes = "";

			// dia_chi
			$UsersRegistered->dia_chi->ViewValue = $UsersRegistered->dia_chi->CurrentValue;
			$UsersRegistered->dia_chi->CssStyle = "";
			$UsersRegistered->dia_chi->CssClass = "";
			$UsersRegistered->dia_chi->ViewCustomAttributes = "";

			// tinh_thanh
			$UsersRegistered->tinh_thanh->ViewValue = $UsersRegistered->tinh_thanh->CurrentValue;
			$UsersRegistered->tinh_thanh->CssStyle = "";
			$UsersRegistered->tinh_thanh->CssClass = "";
			$UsersRegistered->tinh_thanh->ViewCustomAttributes = "";

			// quan_huyen
			$UsersRegistered->quan_huyen->ViewValue = $UsersRegistered->quan_huyen->CurrentValue;
			$UsersRegistered->quan_huyen->CssStyle = "";
			$UsersRegistered->quan_huyen->CssClass = "";
			$UsersRegistered->quan_huyen->ViewCustomAttributes = "";

			// gioi_thieu
			$UsersRegistered->gioi_thieu->ViewValue = $UsersRegistered->gioi_thieu->CurrentValue;
			$UsersRegistered->gioi_thieu->CssStyle = "";
			$UsersRegistered->gioi_thieu->CssClass = "";
			$UsersRegistered->gioi_thieu->ViewCustomAttributes = "";

			// nick_yahoo
			$UsersRegistered->nick_yahoo->ViewValue = $UsersRegistered->nick_yahoo->CurrentValue;
			$UsersRegistered->nick_yahoo->CssStyle = "";
			$UsersRegistered->nick_yahoo->CssClass = "";
			$UsersRegistered->nick_yahoo->ViewCustomAttributes = "";

			// nick_skype
			$UsersRegistered->nick_skype->ViewValue = $UsersRegistered->nick_skype->CurrentValue;
			$UsersRegistered->nick_skype->CssStyle = "";
			$UsersRegistered->nick_skype->CssClass = "";
			$UsersRegistered->nick_skype->ViewCustomAttributes = "";

			// truycap_gannhat
			$UsersRegistered->truycap_gannhat->ViewValue = $UsersRegistered->truycap_gannhat->CurrentValue;
			$UsersRegistered->truycap_gannhat->ViewValue = ew_FormatDateTime($UsersRegistered->truycap_gannhat->ViewValue, 11);
			$UsersRegistered->truycap_gannhat->CssStyle = "";
			$UsersRegistered->truycap_gannhat->CssClass = "";
			$UsersRegistered->truycap_gannhat->ViewCustomAttributes = "";

			// kieu_giaodien
			if (strval($UsersRegistered->kieu_giaodien->CurrentValue) <> "") {
				switch ($UsersRegistered->kieu_giaodien->CurrentValue) {
					case "1":
						$UsersRegistered->kieu_giaodien->ViewValue = "Giao diện 1";
						break;
					case "2":
						$UsersRegistered->kieu_giaodien->ViewValue = "Giao diện 2";
						break;
					case "3":
						$UsersRegistered->kieu_giaodien->ViewValue = "Giao diện 3";
						break;
                                       	case "4":
						$UsersRegistered->kieu_giaodien->ViewValue = "Giao diện 4";
						break;
					case "5":
						$UsersRegistered->kieu_giaodien->ViewValue = "Giao diện 5";
						break;
					case "6":
						$UsersRegistered->kieu_giaodien->ViewValue = "Giao diện 6";
						break;
					case "7":
						$UsersRegistered->kieu_giaodien->ViewValue = "Trang chủ doanh nghiệp";
						break;
					default:
						$UsersRegistered->kieu_giaodien->ViewValue = $UsersRegistered->kieu_giaodien->CurrentValue;
				}
			} else {
				$UsersRegistered->kieu_giaodien->ViewValue = NULL;
			}
			$UsersRegistered->kieu_giaodien->CssStyle = "";
			$UsersRegistered->kieu_giaodien->CssClass = "";
			$UsersRegistered->kieu_giaodien->ViewCustomAttributes = "";

			// UserLevelID
			if (strval($UsersRegistered->UserLevelID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($UsersRegistered->UserLevelID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersRegistered->UserLevelID->ViewValue = $rswrk->fields('UserLevelName');
					$rswrk->Close();
				} else {
					$UsersRegistered->UserLevelID->ViewValue = $UsersRegistered->UserLevelID->CurrentValue;
				}
			} else {
				$UsersRegistered->UserLevelID->ViewValue = NULL;
			}
			$UsersRegistered->UserLevelID->CssStyle = "";
			$UsersRegistered->UserLevelID->CssClass = "";
			$UsersRegistered->UserLevelID->ViewCustomAttributes = "";

			// nganhnghe_lienquan
			if (strval($UsersRegistered->nganhnghe_lienquan->CurrentValue) <> "") {
				$arwrk = explode(",", $UsersRegistered->nganhnghe_lienquan->CurrentValue);
				$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE ";
				$sWhereWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sWhereWrk <> "") $sWhereWrk .= " OR ";
					$sWhereWrk .= "`nganhnghe_id` = " . ew_AdjustSql(trim($wrk)) . "";
				}
				if ($sWhereWrk <> "") $sSqlWrk .= "(" . $sWhereWrk . ")";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersRegistered->nganhnghe_lienquan->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$UsersRegistered->nganhnghe_lienquan->ViewValue .= $rswrk->fields('nganhnghe_ten');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $UsersRegistered->nganhnghe_lienquan->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$UsersRegistered->nganhnghe_lienquan->ViewValue = $UsersRegistered->nganhnghe_lienquan->CurrentValue;
				}
			} else {
				$UsersRegistered->nganhnghe_lienquan->ViewValue = NULL;
			}
			$UsersRegistered->nganhnghe_lienquan->CssStyle = "";
			$UsersRegistered->nganhnghe_lienquan->CssClass = "";
			$UsersRegistered->nganhnghe_lienquan->ViewCustomAttributes = "";

			// thitruong_lienquan
			if (strval($UsersRegistered->thitruong_lienquan->CurrentValue) <> "") {
				$arwrk = explode(",", $UsersRegistered->thitruong_lienquan->CurrentValue);
				$sSqlWrk = "SELECT `ten_thitruong` FROM `market` WHERE ";
				$sWhereWrk = "";
				foreach ($arwrk as $wrk) {
					if ($sWhereWrk <> "") $sWhereWrk .= " OR ";
					$sWhereWrk .= "`thitruong_id` = " . ew_AdjustSql(trim($wrk)) . "";
				}
				if ($sWhereWrk <> "") $sSqlWrk .= "(" . $sWhereWrk . ")";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersRegistered->thitruong_lienquan->ViewValue = "";
					$ari = 0;
					while (!$rswrk->EOF) {
						$UsersRegistered->thitruong_lienquan->ViewValue .= $rswrk->fields('ten_thitruong');
						$rswrk->MoveNext();
						if (!$rswrk->EOF) $UsersRegistered->thitruong_lienquan->ViewValue .= ew_ViewOptionSeparator($ari); // Separate Options
						$ari++;
					}
					$rswrk->Close();
				} else {
					$UsersRegistered->thitruong_lienquan->ViewValue = $UsersRegistered->thitruong_lienquan->CurrentValue;
				}
			} else {
				$UsersRegistered->thitruong_lienquan->ViewValue = NULL;
			}
			$UsersRegistered->thitruong_lienquan->CssStyle = "";
			$UsersRegistered->thitruong_lienquan->CssClass = "";
			$UsersRegistered->thitruong_lienquan->ViewCustomAttributes = "";

			// nguoidung_option
			$UsersRegistered->nguoidung_option->HrefValue = "";

			// tendangnhap
			$UsersRegistered->tendangnhap->HrefValue = "";

			// quocgia_id
			$UsersRegistered->quocgia_id->HrefValue = "";

			// gioi_tinh
			$UsersRegistered->gioi_tinh->HrefValue = "";

			// hoten_nguoilienhe
			$UsersRegistered->hoten_nguoilienhe->HrefValue = "";

			// ten_congty
			$UsersRegistered->ten_congty->HrefValue = "";

			// ten_viettat
			$UsersRegistered->ten_viettat->HrefValue = "";

			// logo_congty
			if (!is_null($UsersRegistered->logo_congty->Upload->DbValue)) {
				$UsersRegistered->logo_congty->HrefValue = "UsersRegistered_logo_congty_bv.php?nguoidung_id=" . $UsersRegistered->nguoidung_id->CurrentValue;
				if ($UsersRegistered->Export <> "") $UsersRegistered->logo_congty->HrefValue = ew_ConvertFullUrl($UsersRegistered->logo_congty->HrefValue);
			} else {
				$UsersRegistered->logo_congty->HrefValue = "";
			}

			// website
			$UsersRegistered->website->HrefValue = "";

			// chuc_nang
			$UsersRegistered->chuc_nang->HrefValue = "";

			// loaikinhdoanh_id
			$UsersRegistered->loaikinhdoanh_id->HrefValue = "";

			// loaicongty_id
			$UsersRegistered->loaicongty_id->HrefValue = "";

			// so_congnhan
			$UsersRegistered->so_congnhan->HrefValue = "";

			// nam_thanhlap
			$UsersRegistered->nam_thanhlap->HrefValue = "";

			// kim_ngach
			$UsersRegistered->kim_ngach->HrefValue = "";

			// cung_cap
			$UsersRegistered->cung_cap->HrefValue = "";

			// chung_chi
			$UsersRegistered->chung_chi->HrefValue = "";

			// so_dkkd
			$UsersRegistered->so_dkkd->HrefValue = "";

			// ngay_thamgia
			$UsersRegistered->ngay_thamgia->HrefValue = "";

			// so_dienthoai
			$UsersRegistered->so_dienthoai->HrefValue = "";

			// so_fax
			$UsersRegistered->so_fax->HrefValue = "";

			// dia_chi
			$UsersRegistered->dia_chi->HrefValue = "";

			// tinh_thanh
			$UsersRegistered->tinh_thanh->HrefValue = "";

			// quan_huyen
			$UsersRegistered->quan_huyen->HrefValue = "";

			// gioi_thieu
			$UsersRegistered->gioi_thieu->HrefValue = "";

			// nick_yahoo
			$UsersRegistered->nick_yahoo->HrefValue = "";

			// nick_skype
			$UsersRegistered->nick_skype->HrefValue = "";

			// truycap_gannhat
			$UsersRegistered->truycap_gannhat->HrefValue = "";

			// kieu_giaodien
			$UsersRegistered->kieu_giaodien->HrefValue = "";

			// UserLevelID
			$UsersRegistered->UserLevelID->HrefValue = "";

			// nganhnghe_lienquan
			$UsersRegistered->nganhnghe_lienquan->HrefValue = "";

			// thitruong_lienquan
			$UsersRegistered->thitruong_lienquan->HrefValue = "";
		}

		// Call Row Rendered event
		$UsersRegistered->Row_Rendered();
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
