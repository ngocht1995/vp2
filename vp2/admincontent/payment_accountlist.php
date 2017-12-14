<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "payment_accountinfo.php" ?>
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
$payment_account_list = new cpayment_account_list();
$Page =& $payment_account_list;

// Page init processing
$payment_account_list->Page_Init();

// Page main processing
$payment_account_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($payment_account->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var payment_account_list = new ew_Page("payment_account_list");

// page properties
payment_account_list.PageID = "list"; // page ID
var EW_PAGE_ID = payment_account_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
payment_account_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
payment_account_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
payment_account_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
payment_account_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($payment_account->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($payment_account->Export == "" && $payment_account->SelectLimit);
	if (!$bSelectLimit)
		$rs = $payment_account_list->LoadRecordset();
	$payment_account_list->lTotalRecs = ($bSelectLimit) ? $payment_account->SelectRecordCount() : $rs->RecordCount();
	$payment_account_list->lStartRec = 1;
	if ($payment_account_list->lDisplayRecs <= 0) // Display all records
		$payment_account_list->lDisplayRecs = $payment_account_list->lTotalRecs;
	if (!($payment_account->ExportAll && $payment_account->Export <> ""))
		$payment_account_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $payment_account_list->LoadRecordset($payment_account_list->lStartRec-1, $payment_account_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Quản lý tài khoản giao dịch</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($Security->CanSearch()) { ?>
<?php if ($payment_account->Export == "" && $payment_account->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(payment_account_list);" style="text-decoration: none;"><img id="payment_account_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Tìm kiếm</span><br>
<div id="payment_account_list_SearchPanel">
<form name="fpayment_accountlistsrch" id="fpayment_accountlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<input type="hidden" id="t" name="t" value="payment_account">
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($payment_account->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Tìm kiếm">&nbsp;
			<a href="<?php echo $payment_account_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($payment_account->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($payment_account->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($payment_account->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php } ?>
<?php $payment_account_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($payment_account->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($payment_account->CurrentAction <> "gridadd" && $payment_account->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($payment_account_list->Pager)) $payment_account_list->Pager = new cNumericPager($payment_account_list->lStartRec, $payment_account_list->lDisplayRecs, $payment_account_list->lTotalRecs, $payment_account_list->lRecRange) ?>
<?php if ($payment_account_list->Pager->RecordCount > 0) { ?>
	<?php if ($payment_account_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $payment_account_list->PageUrl() ?>start=<?php echo $payment_account_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($payment_account_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $payment_account_list->PageUrl() ?>start=<?php echo $payment_account_list->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($payment_account_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $payment_account_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($payment_account_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $payment_account_list->PageUrl() ?>start=<?php echo $payment_account_list->Pager->NextButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php if ($payment_account_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $payment_account_list->PageUrl() ?>start=<?php echo $payment_account_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($payment_account_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $payment_account_list->Pager->FromIndex ?> đến <?php echo $payment_account_list->Pager->ToIndex ?> của <?php echo $payment_account_list->Pager->RecordCount ?> bản ghi
        <?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($payment_account_list->sSrchWhere == "0=101") { ?>
	Hãy chọn từ khóa tìm kiếm
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($payment_account_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số bản ghi hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="payment_account">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($payment_account_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($payment_account_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($payment_account_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($payment_account->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $payment_account->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($payment_account_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fpayment_accountlist)) alert('Không có bản ghi nào được chọn'); else if (ew_Confirm('<?php echo $payment_account_list->sDeleteConfirmMsg ?>')) {document.fpayment_accountlist.action='payment_accountdelete.php';document.fpayment_accountlist.encoding='application/x-www-form-urlencoded';document.fpayment_accountlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fpayment_accountlist" id="fpayment_accountlist" class="ewForm" action="" method="post">
<?php if ($payment_account_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$payment_account_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$payment_account_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$payment_account_list->lOptionCnt++; // edit
}
if ($Security->CanDelete()) {
	$payment_account_list->lOptionCnt++; // Multi-select
}
	$payment_account_list->lOptionCnt += count($payment_account_list->ListOptions->Items); // Custom list options
?>
<?php echo $payment_account->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($payment_account->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="payment_account_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($payment_account_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($payment_account->user_id->Visible) { // user_id ?>
	<?php if ($payment_account->SortUrl($payment_account->user_id) == "") { ?>
		<td>User Id</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $payment_account->SortUrl($payment_account->user_id) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tên đăng nhập</td><td style="width: 10px;"><?php if ($payment_account->user_id->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($payment_account->user_id->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($payment_account->user_account->Visible) { // user_account ?>
	<?php if ($payment_account->SortUrl($payment_account->user_account) == "") { ?>
		<td>User Acount</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $payment_account->SortUrl($payment_account->user_account) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tên tài khoản&nbsp;(*)</td><td style="width: 10px;"><?php if ($payment_account->user_account->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($payment_account->user_account->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($payment_account->payment_account_type->Visible) { // payment_account_type ?>
	<?php if ($payment_account->SortUrl($payment_account->payment_account_type) == "") { ?>
		<td>Payment Account Type</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $payment_account->SortUrl($payment_account->payment_account_type) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Loại tài khoản</td><td style="width: 10px;"><?php if ($payment_account->payment_account_type->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($payment_account->payment_account_type->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($payment_account->ExportAll && $payment_account->Export <> "") {
	$payment_account_list->lStopRec = $payment_account_list->lTotalRecs;
} else {
	$payment_account_list->lStopRec = $payment_account_list->lStartRec + $payment_account_list->lDisplayRecs - 1; // Set the last record to display
}
$payment_account_list->lRecCount = $payment_account_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$payment_account->SelectLimit && $payment_account_list->lStartRec > 1)
		$rs->Move($payment_account_list->lStartRec - 1);
}
$payment_account_list->lRowCnt = 0;
while (($payment_account->CurrentAction == "gridadd" || !$rs->EOF) &&
	$payment_account_list->lRecCount < $payment_account_list->lStopRec) {
	$payment_account_list->lRecCount++;
	if (intval($payment_account_list->lRecCount) >= intval($payment_account_list->lStartRec)) {
		$payment_account_list->lRowCnt++;

	// Init row class and style
	$payment_account->CssClass = "";
	$payment_account->CssStyle = "";
	$payment_account->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($payment_account->CurrentAction == "gridadd") {
		$payment_account_list->LoadDefaultValues(); // Load default values
	} else {
		$payment_account_list->LoadRowValues($rs); // Load row values
	}
	$payment_account->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$payment_account_list->RenderRow();
?>
	<tr<?php echo $payment_account->RowAttributes() ?>>
<?php if ($payment_account->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $payment_account->ViewUrl() ?>">Xem</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $payment_account->EditUrl() ?>">Sửa</a>
</span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($payment_account->payment_account_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($payment_account_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($payment_account->user_id->Visible) { // user_id ?>
		<td<?php echo $payment_account->user_id->CellAttributes() ?>>
<div<?php echo $payment_account->user_id->ViewAttributes() ?>><?php echo $payment_account->user_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($payment_account->user_account->Visible) { // user_account ?>
		<td<?php echo $payment_account->user_account->CellAttributes() ?>>
<div<?php echo $payment_account->user_account->ViewAttributes() ?>><?php echo $payment_account->user_account->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($payment_account->payment_account_type->Visible) { // payment_account_type ?>
		<td<?php echo $payment_account->payment_account_type->CellAttributes() ?>>
<div<?php echo $payment_account->payment_account_type->ViewAttributes() ?>><?php echo $payment_account->payment_account_type->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($payment_account->CurrentAction <> "gridadd")
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
<?php if ($payment_account_list->lTotalRecs > 0) { ?>
<?php if ($payment_account->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($payment_account->CurrentAction <> "gridadd" && $payment_account->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($payment_account_list->Pager)) $payment_account_list->Pager = new cNumericPager($payment_account_list->lStartRec, $payment_account_list->lDisplayRecs, $payment_account_list->lTotalRecs, $payment_account_list->lRecRange) ?>
<?php if ($payment_account_list->Pager->RecordCount > 0) { ?>
	<?php if ($payment_account_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $payment_account_list->PageUrl() ?>start=<?php echo $payment_account_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($payment_account_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $payment_account_list->PageUrl() ?>start=<?php echo $payment_account_list->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($payment_account_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $payment_account_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($payment_account_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $payment_account_list->PageUrl() ?>start=<?php echo $payment_account_list->Pager->NextButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php if ($payment_account_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $payment_account_list->PageUrl() ?>start=<?php echo $payment_account_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($payment_account_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $payment_account_list->Pager->FromIndex ?> đến <?php echo $payment_account_list->Pager->ToIndex ?> của <?php echo $payment_account_list->Pager->RecordCount ?> bản ghi
<?php } else { ?>
	<?php if ($Security->CanList()) { ?>
	<?php if ($payment_account_list->sSrchWhere == "0=101") { ?>
	Hãy chọn từ khóa tìm kiếm
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	Bạn không có quyền truy cập trang này
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($payment_account_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số bản ghi hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="payment_account">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($payment_account_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($payment_account_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($payment_account_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($payment_account->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($payment_account_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $payment_account->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($payment_account_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fpayment_accountlist)) alert('Không có bản ghi nào được chọn'); else if (ew_Confirm('<?php echo $payment_account_list->sDeleteConfirmMsg ?>')) {document.fpayment_accountlist.action='payment_accountdelete.php';document.fpayment_accountlist.encoding='application/x-www-form-urlencoded';document.fpayment_accountlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($payment_account->Export == "" && $payment_account->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(payment_account_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($payment_account->Export == "") { ?>
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
class cpayment_account_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'payment_account';

	// Page Object Name
	var $PageObjName = 'payment_account_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $payment_account;
		if ($payment_account->UseTokenInUrl) $PageUrl .= "t=" . $payment_account->TableVar . "&"; // add page token
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
		global $objForm, $payment_account;
		if ($payment_account->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($payment_account->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($payment_account->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cpayment_account_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["payment_account"] = new cpayment_account();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'payment_account', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $payment_account;
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
	$payment_account->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $payment_account->Export; // Get export parameter, used in header
	$gsExportFile = $payment_account->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $payment_account;
		$this->lDisplayRecs = 20;
		$this->lRecRange = 10;
		$this->lRecCnt = 0; // Record count

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		$this->sSrchWhere = ""; // Search WHERE clause
                $this->sDeleteConfirmMsg = "Bạn có muốn xóa bản ghi đã chọn không?"; // Delete confirm message

		// Master/Detail
		$this->sDbMasterFilter = ""; // Master filter
		$this->sDbDetailFilter = ""; // Detail filter
		if ($this->IsPageRequest()) { // Validate request

			// Set up records per page dynamically
			$this->SetUpDisplayRecs();

			// Handle reset command
			$this->ResetCmd();

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($payment_account->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $payment_account->getRecordsPerPage(); // Restore from Session
		} else {
			$this->lDisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build search criteria
		if ($sSrchAdvanced <> "")
			$this->sSrchWhere = ($this->sSrchWhere <> "") ? "($this->sSrchWhere) AND ($sSrchAdvanced)" : $sSrchAdvanced;
		if ($sSrchBasic <> "")
			$this->sSrchWhere = ($this->sSrchWhere <> "") ? "($this->sSrchWhere) AND ($sSrchBasic)" : $sSrchBasic;

		// Call Recordset_Searching event
		$payment_account->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			$payment_account->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$payment_account->setStartRecordNumber($this->lStartRec);
		} else {
			$this->RestoreSearchParms();
		}

		// Build filter
		$sFilter = "";
		if (!$Security->CanList()) {
			$sFilter = "(0=1)"; // Filter all records
		}
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Set up filter in Session
		$payment_account->setSessionWhere($sFilter);
		$payment_account->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $payment_account;
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
			$payment_account->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$payment_account->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Basic Search sql
	function BasicSearchSQL($Keyword) {
		global $payment_account;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $payment_account->user_account->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $payment_account;
		$sSearchStr = "";
		if (!$Security->CanSearch()) return "";
		$sSearchKeyword = ew_StripSlashes(@$_GET[EW_TABLE_BASIC_SEARCH]);
		$sSearchType = @$_GET[EW_TABLE_BASIC_SEARCH_TYPE];
		if ($sSearchKeyword <> "") {
			$sSearch = trim($sSearchKeyword);
			if ($sSearchType <> "") {
				while (strpos($sSearch, "  ") !== FALSE)
					$sSearch = str_replace("  ", " ", $sSearch);
				$arKeyword = explode(" ", trim($sSearch));
				foreach ($arKeyword as $sKeyword) {
					if ($sSearchStr <> "") $sSearchStr .= " " . $sSearchType . " ";
					$sSearchStr .= "(" . $this->BasicSearchSQL($sKeyword) . ")";
				}
			} else {
				$sSearchStr = $this->BasicSearchSQL($sSearch);
			}
		}
		if ($sSearchKeyword <> "") {
			$payment_account->setBasicSearchKeyword($sSearchKeyword);
			$payment_account->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $payment_account;
		$this->sSrchWhere = "";
		$payment_account->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $payment_account;
		$payment_account->setBasicSearchKeyword("");
		$payment_account->setBasicSearchType("");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $payment_account;
		$this->sSrchWhere = $payment_account->getSearchWhere();
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $payment_account;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$payment_account->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$payment_account->CurrentOrderType = @$_GET["ordertype"];
			$payment_account->UpdateSort($payment_account->user_id); // Field 
			$payment_account->UpdateSort($payment_account->user_account); // Field 
			$payment_account->UpdateSort($payment_account->payment_account_type); // Field 
			$payment_account->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $payment_account;
		$sOrderBy = $payment_account->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($payment_account->SqlOrderBy() <> "") {
				$sOrderBy = $payment_account->SqlOrderBy();
				$payment_account->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $payment_account;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$payment_account->setSessionOrderBy($sOrderBy);
				$payment_account->user_id->setSort("");
				$payment_account->user_account->setSort("");
				$payment_account->payment_account_type->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$payment_account->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $payment_account;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$payment_account->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$payment_account->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $payment_account->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$payment_account->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$payment_account->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$payment_account->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $payment_account;

                // Call Recordset Selecting event
		$payment_account->Recordset_Selecting($payment_account->CurrentFilter);

		// Load list page SQL
		$sSql = $payment_account->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';
               	$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$payment_account->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $payment_account;
		$sFilter = $payment_account->KeyFilter();

		// Call Row Selecting event
		$payment_account->Row_Selecting($sFilter);

		// Load sql based on filter
		$payment_account->CurrentFilter = $sFilter;
		$sSql = $payment_account->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$payment_account->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $payment_account;
		$payment_account->payment_account_id->setDbValue($rs->fields('payment_account_id'));
		$payment_account->user_id->setDbValue($rs->fields('user_id'));
		$payment_account->user_account->setDbValue($rs->fields('user_account'));
		$payment_account->payment_account_type->setDbValue($rs->fields('payment_account_type'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $payment_account;

		// Call Row_Rendering event
		$payment_account->Row_Rendering();

		// Common render codes for all row types
		// user_id

		$payment_account->user_id->CellCssStyle = "";
		$payment_account->user_id->CellCssClass = "";

		// user_account
		$payment_account->user_account->CellCssStyle = "";
		$payment_account->user_account->CellCssClass = "";

		// payment_account_type
		$payment_account->payment_account_type->CellCssStyle = "";
		$payment_account->payment_account_type->CellCssClass = "";
		if ($payment_account->RowType == EW_ROWTYPE_VIEW) { // View row

			// user_id
			$payment_account->user_id->ViewValue = $payment_account->user_id->CurrentValue;
			if (strval($payment_account->user_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `tendangnhap`, `ten_congty` FROM `user` WHERE `nguoidung_id` = " . ew_AdjustSql($payment_account->user_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$payment_account->user_id->ViewValue = $rswrk->fields('tendangnhap');
					//$payment_account->user_id->ViewValue .= ew_ValueSeparator(0) . $rswrk->fields('ten_congty');
					$rswrk->Close();
				} else {
					$payment_account->user_id->ViewValue = $payment_account->user_id->CurrentValue;
				}
			} else {
				$payment_account->user_id->ViewValue = NULL;
			}
			$payment_account->user_id->CssStyle = "";
			$payment_account->user_id->CssClass = "";
			$payment_account->user_id->ViewCustomAttributes = "";

			// user_account
			$payment_account->user_account->ViewValue = $payment_account->user_account->CurrentValue;
			$payment_account->user_account->CssStyle = "";
			$payment_account->user_account->CssClass = "";
			$payment_account->user_account->ViewCustomAttributes = "";

			// payment_account_type
			if (strval($payment_account->payment_account_type->CurrentValue) <> "") {
				switch ($payment_account->payment_account_type->CurrentValue) {
					case "1":
						$payment_account->payment_account_type->ViewValue = "Tài khoản Ngân lượng";
						break;
					default:
						$payment_account->payment_account_type->ViewValue = $payment_account->payment_account_type->CurrentValue;
				}
			} else {
				$payment_account->payment_account_type->ViewValue = NULL;
			}
			$payment_account->payment_account_type->CssStyle = "";
			$payment_account->payment_account_type->CssClass = "";
			$payment_account->payment_account_type->ViewCustomAttributes = "";

			// user_id
			$payment_account->user_id->HrefValue = "";

			// user_account
			$payment_account->user_account->HrefValue = "";

			// payment_account_type
			$payment_account->payment_account_type->HrefValue = "";
		}

		// Call Row Rendered event
		$payment_account->Row_Rendered();
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
