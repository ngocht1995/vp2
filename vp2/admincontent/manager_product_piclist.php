<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "manager_product_picinfo.php" ?>
<?php include "userinfo.php" ?>
<?php include "manager_productinfo.php" ?>
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
$manager_product_pic_list = new cmanager_product_pic_list();
$Page =& $manager_product_pic_list;

// Page init processing
$manager_product_pic_list->Page_Init();

// Page main processing
$manager_product_pic_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($manager_product_pic->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var manager_product_pic_list = new ew_Page("manager_product_pic_list");

// page properties
manager_product_pic_list.PageID = "list"; // page ID
var EW_PAGE_ID = manager_product_pic_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
manager_product_pic_list.Form_CustomValidate =
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
manager_product_pic_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
manager_product_pic_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
manager_product_pic_list.ValidateRequired = false; // no JavaScript validation
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
<?php } ?>
<?php if ($manager_product_pic->Export == "") { ?>
<?php
$gsMasterReturnUrl = "manager_productlist.php";
if ($manager_product_pic_list->sDbMasterFilter <> "" && $manager_product_pic->getCurrentMasterTable() == "manager_product") {
	if ($manager_product_pic_list->bMasterRecordExists) {
		if ($manager_product_pic->getCurrentMasterTable() == $manager_product_pic->TableVar) $gsMasterReturnUrl .= "?" . EW_TABLE_SHOW_MASTER . "=";
?>
<?php include "manager_productmaster.php" ?>
<?php
	}
}
?>
<?php } ?>
<?php
	$bSelectLimit = ($manager_product_pic->Export == "" && $manager_product_pic->SelectLimit);
	if (!$bSelectLimit)
		$rs = $manager_product_pic_list->LoadRecordset();
	$manager_product_pic_list->lTotalRecs = ($bSelectLimit) ? $manager_product_pic->SelectRecordCount() : $rs->RecordCount();
	$manager_product_pic_list->lStartRec = 1;
	if ($manager_product_pic_list->lDisplayRecs <= 0) // Display all records
		$manager_product_pic_list->lDisplayRecs = $manager_product_pic_list->lTotalRecs;
	if (!($manager_product_pic->ExportAll && $manager_product_pic->Export <> ""))
		$manager_product_pic_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $manager_product_pic_list->LoadRecordset($manager_product_pic_list->lStartRec-1, $manager_product_pic_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" >
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh sách ảnh sản phẩm</font></b></td>
								<td height="20" width="54%" >
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<br>
<?php $manager_product_pic_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($manager_product_pic->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($manager_product_pic->CurrentAction <> "gridadd" && $manager_product_pic->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($manager_product_pic_list->Pager)) $manager_product_pic_list->Pager = new cNumericPager($manager_product_pic_list->lStartRec, $manager_product_pic_list->lDisplayRecs, $manager_product_pic_list->lTotalRecs, $manager_product_pic_list->lRecRange) ?>
<?php if ($manager_product_pic_list->Pager->RecordCount > 0) { ?>
	<?php if ($manager_product_pic_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $manager_product_pic_list->PageUrl() ?>start=<?php echo $manager_product_pic_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_pic_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $manager_product_pic_list->PageUrl() ?>start=<?php echo $manager_product_pic_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($manager_product_pic_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $manager_product_pic_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($manager_product_pic_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $manager_product_pic_list->PageUrl() ?>start=<?php echo $manager_product_pic_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_pic_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $manager_product_pic_list->PageUrl() ?>start=<?php echo $manager_product_pic_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_pic_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($manager_product_pic_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có ảnh
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($manager_product_pic_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số ảnh hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="manager_product_pic">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($manager_product_pic_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($manager_product_pic_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($manager_product_pic_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($manager_product_pic->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $manager_product_pic->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($manager_product_pic_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fmanager_product_piclist)) alert('Chưa chọn ảnh'); else {document.fmanager_product_piclist.action='manager_product_picdelete.php';document.fmanager_product_piclist.encoding='application/x-www-form-urlencoded';document.fmanager_product_piclist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fmanager_product_piclist" id="fmanager_product_piclist" class="ewForm" action="" method="post">
<?php if ($manager_product_pic_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$manager_product_pic_list->lOptionCnt = 0;
if ($Security->CanEdit()) {
	$manager_product_pic_list->lOptionCnt++; // edit
}
if ($Security->CanDelete()) {
	$manager_product_pic_list->lOptionCnt++; // Multi-select
}
	$manager_product_pic_list->lOptionCnt += count($manager_product_pic_list->ListOptions->Items); // Custom list options
?>
<?php echo $manager_product_pic->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($manager_product_pic->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap; width: 30px;" >&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap; width: 30px;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="manager_product_pic_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($manager_product_pic_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($manager_product_pic->sanpham_pic->Visible) { // sanpham_pic ?>
	<?php if ($manager_product_pic->SortUrl($manager_product_pic->sanpham_pic) == "") { ?>
		<td style="width: 675px; white-space: nowrap;">Ảnh</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $manager_product_pic->SortUrl($manager_product_pic->sanpham_pic) ?>',1);" style="width: 675px; white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Ảnh</td><td style="width: 10px;"><?php if ($manager_product_pic->sanpham_pic->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($manager_product_pic->sanpham_pic->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>
	</tr>
</thead>
<?php
if ($manager_product_pic->ExportAll && $manager_product_pic->Export <> "") {
	$manager_product_pic_list->lStopRec = $manager_product_pic_list->lTotalRecs;
} else {
	$manager_product_pic_list->lStopRec = $manager_product_pic_list->lStartRec + $manager_product_pic_list->lDisplayRecs - 1; // Set the last record to display
}
$manager_product_pic_list->lRecCount = $manager_product_pic_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$manager_product_pic->SelectLimit && $manager_product_pic_list->lStartRec > 1)
		$rs->Move($manager_product_pic_list->lStartRec - 1);
}
$manager_product_pic_list->lRowCnt = 0;
while (($manager_product_pic->CurrentAction == "gridadd" || !$rs->EOF) &&
	$manager_product_pic_list->lRecCount < $manager_product_pic_list->lStopRec) {
	$manager_product_pic_list->lRecCount++;
	if (intval($manager_product_pic_list->lRecCount) >= intval($manager_product_pic_list->lStartRec)) {
		$manager_product_pic_list->lRowCnt++;

	// Init row class and style
	$manager_product_pic->CssClass = "";
	$manager_product_pic->CssStyle = "";
	//$manager_product_pic->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($manager_product_pic->CurrentAction == "gridadd") {
		$manager_product_pic_list->LoadDefaultValues(); // Load default values
	} else {
		$manager_product_pic_list->LoadRowValues($rs); // Load row values
	}
	$manager_product_pic->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$manager_product_pic_list->RenderRow();
?>
	<tr<?php echo $manager_product_pic->RowAttributes() ?>>
<?php if ($manager_product_pic->Export == "") { ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $manager_product_pic->EditUrl() ?>">Sửa</a>
</span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($manager_product_pic->anh_sanpham_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($manager_product_pic_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($manager_product_pic->sanpham_pic->Visible) { // sanpham_pic ?>
		<td<?php echo $manager_product_pic->sanpham_pic->CellAttributes() ?>>
<?php if ($manager_product_pic->sanpham_pic->HrefValue <> "") { ?>
<?php if (!is_null($manager_product_pic->sanpham_pic->Upload->DbValue)) { ?>
<a href="<?php echo $manager_product_pic->sanpham_pic->HrefValue ?>"><img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $manager_product_pic->sanpham_pic->Upload->DbValue ?>" border=0<?php echo $manager_product_pic->sanpham_pic->ViewAttributes() ?>></a>
<?php } elseif (!in_array($manager_product_pic->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } else { ?>
<?php if (!is_null($manager_product_pic->sanpham_pic->Upload->DbValue)) { ?>
<img src="<?php echo ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . $manager_product_pic->sanpham_pic->Upload->DbValue ?>" border=0<?php echo $manager_product_pic->sanpham_pic->ViewAttributes() ?>>
<?php } elseif (!in_array($manager_product_pic->CurrentAction, array("I", "edit", "gridedit"))) { ?>	
&nbsp;
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($manager_product_pic->CurrentAction <> "gridadd")
		$rs->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
</form>
<?php

// Close recordset
if ($rs)
	$rs->Close();
?>
</div>
<?php if ($manager_product_pic_list->lTotalRecs > 0) { ?>
<?php if ($manager_product_pic->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($manager_product_pic->CurrentAction <> "gridadd" && $manager_product_pic->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($manager_product_pic_list->Pager)) $manager_product_pic_list->Pager = new cNumericPager($manager_product_pic_list->lStartRec, $manager_product_pic_list->lDisplayRecs, $manager_product_pic_list->lTotalRecs, $manager_product_pic_list->lRecRange) ?>
<?php if ($manager_product_pic_list->Pager->RecordCount > 0) { ?>
	<?php if ($manager_product_pic_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $manager_product_pic_list->PageUrl() ?>start=<?php echo $manager_product_pic_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_pic_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $manager_product_pic_list->PageUrl() ?>start=<?php echo $manager_product_pic_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($manager_product_pic_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $manager_product_pic_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($manager_product_pic_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $manager_product_pic_list->PageUrl() ?>start=<?php echo $manager_product_pic_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_pic_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $manager_product_pic_list->PageUrl() ?>start=<?php echo $manager_product_pic_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($manager_product_pic_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($manager_product_pic_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có ảnh
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($manager_product_pic_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số ảnh hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="manager_product_pic">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($manager_product_pic_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($manager_product_pic_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($manager_product_pic_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($manager_product_pic->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($manager_product_pic_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<br>
<a href="<?php echo $manager_product_pic->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($manager_product_pic_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fmanager_product_piclist)) alert('Chưa chọn ảnh'); else {document.fmanager_product_piclist.action='manager_product_picdelete.php';document.fmanager_product_piclist.encoding='application/x-www-form-urlencoded';document.fmanager_product_piclist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($manager_product_pic->Export == "" && $manager_product_pic->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(manager_product_pic_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($manager_product_pic->Export == "") { ?>
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
class cmanager_product_pic_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'manager_product_pic';

	// Page Object Name
	var $PageObjName = 'manager_product_pic_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $manager_product_pic;
		if ($manager_product_pic->UseTokenInUrl) $PageUrl .= "t=" . $manager_product_pic->TableVar . "&"; // add page token
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
		global $objForm, $manager_product_pic;
		if ($manager_product_pic->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($manager_product_pic->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($manager_product_pic->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cmanager_product_pic_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["manager_product_pic"] = new cmanager_product_pic();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Initialize other table object
		$GLOBALS['manager_product'] = new cmanager_product();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'manager_product_pic', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $manager_product_pic;
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
		if (!$Security->CanList()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
	$manager_product_pic->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $manager_product_pic->Export; // Get export parameter, used in header
	$gsExportFile = $manager_product_pic->TableVar; // Get export file, used in header

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
	var $sSrchWhere;
	var $lRecCnt;
	var $lEditRowCnt;
	var $lRowCnt;
	var $lRowIndex;
	var $lOptionCnt;
	var $lRecPerRow;
	var $lColCnt;
	var $sDeleteConfirmMsg; // Delete confirm message
	var $sDbMasterFilter;
	var $sDbDetailFilter;
	var $bMasterRecordExists;	
	var $ListOptions;
	var $sMultiSelectKey;

	//
	// Page main processing
	//
	function Page_Main() {
		global $objForm, $gsSearchError, $Security, $manager_product_pic;
		$this->lDisplayRecs = 20;
		$this->lRecRange = 10;
		$this->lRecCnt = 0; // Record count

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		$this->sSrchWhere = ""; // Search WHERE clause

		// Master/Detail
		$this->sDbMasterFilter = ""; // Master filter
		$this->sDbDetailFilter = ""; // Detail filter
		if ($this->IsPageRequest()) { // Validate request

			// Set up records per page dynamically
			$this->SetUpDisplayRecs();

			// Handle reset command
			$this->ResetCmd();

			// Set up master detail parameters
			$this->SetUpMasterDetail();

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($manager_product_pic->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $manager_product_pic->getRecordsPerPage(); // Restore from Session
		} else {
			$this->lDisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build filter
		$sFilter = "";
		if (!$Security->CanList()) {
			$sFilter = "(0=1)"; // Filter all records
		}

		// Restore master/detail filter
		$this->sDbMasterFilter = $manager_product_pic->getMasterFilter(); // Restore master filter
		$this->sDbDetailFilter = $manager_product_pic->getDetailFilter(); // Restore detail filter
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Load master record
		if ($manager_product_pic->getMasterFilter() <> "" && $manager_product_pic->getCurrentMasterTable() == "manager_product") {
			global $manager_product;
			$rsmaster = $manager_product->LoadRs($this->sDbMasterFilter);
			$this->bMasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->bMasterRecordExists) {
				$manager_product_pic->setMasterFilter(""); // Clear master filter
				$manager_product_pic->setDetailFilter(""); // Clear detail filter
				$this->setMessage("Không có dữ liệu"); // Set no record found
				$this->Page_Terminate($manager_product_pic->getReturnUrl()); // Return to caller
			} else {
				$manager_product->LoadListRowValues($rsmaster);
				$manager_product->RowType = EW_ROWTYPE_MASTER; // Master row
				$manager_product->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in Session
		$manager_product_pic->setSessionWhere($sFilter);
		$manager_product_pic->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $manager_product_pic;
		$sWrk = @$_GET[EW_TABLE_REC_PER_PAGE];
		if ($sWrk <> "") {
			if (is_numeric($sWrk)) {
				$this->lDisplayRecs = intval($sWrk);
			} else {
				if (strtolower($sWrk) == "all") { // Display all records
					$this->lDisplayRecs = -1;
				} else {
					$this->lDisplayRecs = 20; // Non-numeric, load default
				}
			}
			$manager_product_pic->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$manager_product_pic->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $manager_product_pic;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$manager_product_pic->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$manager_product_pic->CurrentOrderType = @$_GET["ordertype"];
			$manager_product_pic->UpdateSort($manager_product_pic->sanpham_pic); // Field 
			$manager_product_pic->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $manager_product_pic;
		$sOrderBy = $manager_product_pic->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($manager_product_pic->SqlOrderBy() <> "") {
				$sOrderBy = $manager_product_pic->SqlOrderBy();
				$manager_product_pic->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $manager_product_pic;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset master/detail keys
			if (strtolower($sCmd) == "resetall") {
				$manager_product_pic->getCurrentMasterTable = ""; // Clear master table
				$manager_product_pic->setMasterFilter(""); // Clear master filter
				$this->sDbMasterFilter = "";
				$manager_product_pic->setDetailFilter(""); // Clear detail filter
				$this->sDbDetailFilter = "";
				$manager_product_pic->sanpham_id->setSessionValue("");
			}

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$manager_product_pic->setSessionOrderBy($sOrderBy);
				$manager_product_pic->sanpham_pic->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$manager_product_pic->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $manager_product_pic;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$manager_product_pic->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$manager_product_pic->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $manager_product_pic->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$manager_product_pic->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$manager_product_pic->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$manager_product_pic->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $manager_product_pic;

		// Call Recordset Selecting event
		$manager_product_pic->Recordset_Selecting($manager_product_pic->CurrentFilter);

		// Load list page SQL
		$sSql = $manager_product_pic->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$manager_product_pic->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $manager_product_pic;
		$sFilter = $manager_product_pic->KeyFilter();

		// Call Row Selecting event
		$manager_product_pic->Row_Selecting($sFilter);

		// Load sql based on filter
		$manager_product_pic->CurrentFilter = $sFilter;
		$sSql = $manager_product_pic->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$manager_product_pic->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $manager_product_pic;
		$manager_product_pic->anh_sanpham_id->setDbValue($rs->fields('anh_sanpham_id'));
		$manager_product_pic->sanpham_pic->Upload->DbValue = $rs->fields('sanpham_pic');
		$manager_product_pic->sanpham_id->setDbValue($rs->fields('sanpham_id'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $manager_product_pic;

		// Call Row_Rendering event
		$manager_product_pic->Row_Rendering();

		// Common render codes for all row types
		// sanpham_pic

		$manager_product_pic->sanpham_pic->CellCssStyle = "white-space: nowrap;";
		$manager_product_pic->sanpham_pic->CellCssClass = "";
		if ($manager_product_pic->RowType == EW_ROWTYPE_VIEW) { // View row

			// sanpham_pic
			if (!is_null($manager_product_pic->sanpham_pic->Upload->DbValue)) {
				$manager_product_pic->sanpham_pic->ViewValue = $manager_product_pic->sanpham_pic->Upload->DbValue;
				$manager_product_pic->sanpham_pic->ImageWidth = 150;
				$manager_product_pic->sanpham_pic->ImageHeight = 0;
				$manager_product_pic->sanpham_pic->ImageAlt = "";
			} else {
				$manager_product_pic->sanpham_pic->ViewValue = "";
			}
			$manager_product_pic->sanpham_pic->CssStyle = "";
			$manager_product_pic->sanpham_pic->CssClass = "";
			$manager_product_pic->sanpham_pic->ViewCustomAttributes = "";

			// sanpham_pic
			if (!is_null($manager_product_pic->sanpham_pic->Upload->DbValue)) {
				$manager_product_pic->sanpham_pic->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($manager_product_pic->sanpham_pic->ViewValue)) ? $manager_product_pic->sanpham_pic->ViewValue : $manager_product_pic->sanpham_pic->CurrentValue);
				if ($manager_product_pic->Export <> "") $manager_product_pic->sanpham_pic->HrefValue = ew_ConvertFullUrl($manager_product_pic->sanpham_pic->HrefValue);
			} else {
				$manager_product_pic->sanpham_pic->HrefValue = "";
			}
		}

		// Call Row Rendered event
		$manager_product_pic->Row_Rendered();
	}

	// Set up Master Detail based on querystring parameter
	function SetUpMasterDetail() {
		global $manager_product_pic;
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (@$_GET[EW_TABLE_SHOW_MASTER] <> "") {
			$sMasterTblVar = $_GET[EW_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->sDbMasterFilter = "";
				$this->sDbDetailFilter = "";
			}
			if ($sMasterTblVar == "manager_product") {
				$bValidMaster = TRUE;
				$this->sDbMasterFilter = $manager_product_pic->SqlMasterFilter_manager_product();
				$this->sDbDetailFilter = $manager_product_pic->SqlDetailFilter_manager_product();
				if (@$_GET["sanpham_id"] <> "") {
					$GLOBALS["manager_product"]->sanpham_id->setQueryStringValue($_GET["sanpham_id"]);
					$manager_product_pic->sanpham_id->setQueryStringValue($GLOBALS["manager_product"]->sanpham_id->QueryStringValue);
					$manager_product_pic->sanpham_id->setSessionValue($manager_product_pic->sanpham_id->QueryStringValue);
					if (!is_numeric($GLOBALS["manager_product"]->sanpham_id->QueryStringValue)) $bValidMaster = FALSE;
					$this->sDbMasterFilter = str_replace("@sanpham_id@", ew_AdjustSql($GLOBALS["manager_product"]->sanpham_id->QueryStringValue), $this->sDbMasterFilter);
					$this->sDbDetailFilter = str_replace("@sanpham_id@", ew_AdjustSql($GLOBALS["manager_product"]->sanpham_id->QueryStringValue), $this->sDbDetailFilter);
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$manager_product_pic->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->lStartRec = 1;
			$manager_product_pic->setStartRecordNumber($this->lStartRec);
			$manager_product_pic->setMasterFilter($this->sDbMasterFilter); // Set up master filter
			$manager_product_pic->setDetailFilter($this->sDbDetailFilter); // Set up detail filter

			// Clear previous master session values
			if ($sMasterTblVar <> "manager_product") {
				if ($manager_product_pic->sanpham_id->QueryStringValue == "") $manager_product_pic->sanpham_id->setSessionValue("");
			}
		} else {
			$this->sDbMasterFilter = $manager_product_pic->getMasterFilter(); //  Restore master filter
			$this->sDbDetailFilter = $manager_product_pic->getDetailFilter(); // Restore detail filter
		}
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
