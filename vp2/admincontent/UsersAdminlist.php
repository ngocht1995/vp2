<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "UsersAdmininfo.php" ?>
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
$UsersAdmin_list = new cUsersAdmin_list();
$Page =& $UsersAdmin_list;

// Page init processing
$UsersAdmin_list->Page_Init();

// Page main processing
$UsersAdmin_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($UsersAdmin->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var UsersAdmin_list = new ew_Page("UsersAdmin_list");

// page properties
UsersAdmin_list.PageID = "list"; // page ID
var EW_PAGE_ID = UsersAdmin_list.PageID; // for backward compatibility

// extend page with validate function for search
UsersAdmin_list.ValidateSearch = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	var infix = "";
	elm = fobj.elements["x" + infix + "_truycap_gannhat"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Truy cập gần nhất không đúng (dữ liệu ngày tháng :dd/mm/yyyy)");

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj)) return false;
	for (var i=0;i<fobj.elements.length;i++) {
		var elem = fobj.elements[i];
		if (elem.name.substring(0,2) == "s_" || elem.name.substring(0,3) == "sv_")
			elem.value = "";
	}
	return true;
}

// extend page with Form_CustomValidate function
UsersAdmin_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
UsersAdmin_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
UsersAdmin_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
UsersAdmin_list.ValidateRequired = false; // no JavaScript validation
<?php } ?>

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

</script>
<?php } ?>
<?php if ($UsersAdmin->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($UsersAdmin->Export == "" && $UsersAdmin->SelectLimit);
	if (!$bSelectLimit)
		$rs = $UsersAdmin_list->LoadRecordset();
	$UsersAdmin_list->lTotalRecs = ($bSelectLimit) ? $UsersAdmin->SelectRecordCount() : $rs->RecordCount();
	$UsersAdmin_list->lStartRec = 1;
	if ($UsersAdmin_list->lDisplayRecs <= 0) // Display all records
		$UsersAdmin_list->lDisplayRecs = $UsersAdmin_list->lTotalRecs;
	if (!($UsersAdmin->ExportAll && $UsersAdmin->Export <> ""))
		$UsersAdmin_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $UsersAdmin_list->LoadRecordset($UsersAdmin_list->lStartRec-1, $UsersAdmin_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg_line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Quản lý người dùng hệ thống</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
</span></p>
<?php if ($Security->CanSearch()) { ?>
<?php if ($UsersAdmin->Export == "" && $UsersAdmin->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(UsersAdmin_list);" style="text-decoration: none;"><img id="UsersAdmin_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Tìm kiếm thông tin</span><br>
<div id="UsersAdmin_list_SearchPanel">
<form name="fUsersAdminlistsrch" id="fUsersAdminlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return UsersAdmin_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="UsersAdmin">
<?php
if ($gsSearchError == "")
	$UsersAdmin_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$UsersAdmin->RowType = EW_ROWTYPE_SEARCH;

// Render row
$UsersAdmin_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($UsersAdmin->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Tìm kiếm">&nbsp;
			<input type="Button" name="Reset" id="Reset" value="   Nhập lại   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp; 
			<a href="<?php echo $UsersAdmin_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($UsersAdmin->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($UsersAdmin->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($UsersAdmin->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
<table class="ewBasicSearch">
	<tr>
		<td width = "300">
			<span class="phpmaker">Tên đăng nhập</span>
			<input type="hidden" name="z_tendangnhap" id="z_tendangnhap" value="LIKE">
			<input type="text" name="x_tendangnhap" id="x_tendangnhap" size="30" maxlength="150" value="<?php echo $UsersAdmin->tendangnhap->EditValue ?>"<?php echo $UsersAdmin->tendangnhap->EditAttributes() ?>>
		</td>
		<td width = "300">
		<span class="phpmaker">Cấp bậc</span>
		<input type="hidden" name="z_UserLevelID" id="z_UserLevelID" value="=">
		<select id="x_UserLevelID" name="x_UserLevelID"<?php echo $UsersAdmin->UserLevelID->EditAttributes() ?>>
			<?php
			if (is_array($UsersAdmin->UserLevelID->EditValue)) {
				$arwrk = $UsersAdmin->UserLevelID->EditValue;
				$rowswrk = count($arwrk);
				$emptywrk = TRUE;
			for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
				$selwrk = (strval($UsersAdmin->UserLevelID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td width = "600">
		<span class="phpmaker">Truy cập gần nhất</span>
		<input type="hidden" name="z_truycap_gannhat" id="z_truycap_gannhat" value="BETWEEN">
		<input type="text" name="x_truycap_gannhat" id="x_truycap_gannhat" value="<?php echo $UsersAdmin->truycap_gannhat->EditValue ?>"<?php echo $UsersAdmin->truycap_gannhat->EditAttributes() ?>>
		&nbsp;<img src="images/calendar.png" id="cal_x_truycap_gannhat" name="cal_x_truycap_gannhat" alt="Pick a date" style="cursor:pointer;cursor:hand;">
		<script type="text/javascript">
			Calendar.setup({
			inputField : "x_truycap_gannhat", // ID of the input field
			ifFormat : "%d/%m/%Y", // the date format
			button : "cal_x_truycap_gannhat" // ID of the button
		});
		</script>
		<input type="text" name="y_truycap_gannhat" id="y_truycap_gannhat" value="<?php echo $UsersAdmin->truycap_gannhat->EditValue2 ?>"<?php echo $UsersAdmin->truycap_gannhat->EditAttributes() ?>>
		&nbsp;<img src="images/calendar.png" id="cal_y_truycap_gannhat" name="cal_y_truycap_gannhat" alt="Pick a date" style="cursor:pointer;cursor:hand;">
		<script type="text/javascript">
			Calendar.setup({
				inputField : "y_truycap_gannhat", // ID of the input field
				ifFormat : "%d/%m/%Y", // the date format
				button : "cal_y_truycap_gannhat" // ID of the button
			});
		</script>
		</td>
	</tr>
</table>

</form>
</div>
<?php } ?>
<?php } ?>
<?php $UsersAdmin_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($UsersAdmin->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($UsersAdmin->CurrentAction <> "gridadd" && $UsersAdmin->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($UsersAdmin_list->Pager)) $UsersAdmin_list->Pager = new cNumericPager($UsersAdmin_list->lStartRec, $UsersAdmin_list->lDisplayRecs, $UsersAdmin_list->lTotalRecs, $UsersAdmin_list->lRecRange) ?>
<?php if ($UsersAdmin_list->Pager->RecordCount > 0) { ?>
	<?php if ($UsersAdmin_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $UsersAdmin_list->PageUrl() ?>start=<?php echo $UsersAdmin_list->Pager->FirstButton->Start ?>"><b>Đầu tiên</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersAdmin_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $UsersAdmin_list->PageUrl() ?>start=<?php echo $UsersAdmin_list->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($UsersAdmin_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $UsersAdmin_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($UsersAdmin_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $UsersAdmin_list->PageUrl() ?>start=<?php echo $UsersAdmin_list->Pager->NextButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersAdmin_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $UsersAdmin_list->PageUrl() ?>start=<?php echo $UsersAdmin_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersAdmin_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $UsersAdmin_list->Pager->FromIndex ?> đến <?php echo $UsersAdmin_list->Pager->ToIndex ?> của <?php echo $UsersAdmin_list->Pager->RecordCount ?> Bản ghi
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($UsersAdmin_list->sSrchWhere == "0=101") { ?>
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
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $UsersAdmin->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($UsersAdmin_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fUsersAdminlist)) alert('Không có bản ghi nào được chọn'); else if (ew_Confirm('<?php echo $UsersAdmin_list->sDeleteConfirmMsg ?>')) {document.fUsersAdminlist.action='UsersAdmindelete.php';document.fUsersAdminlist.encoding='application/x-www-form-urlencoded';document.fUsersAdminlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fUsersAdminlist" id="fUsersAdminlist" class="ewForm" action="" method="post">
<?php if ($UsersAdmin_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$UsersAdmin_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$UsersAdmin_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$UsersAdmin_list->lOptionCnt++; // edit
}
if ($Security->CanDelete()) {
	$UsersAdmin_list->lOptionCnt++; // Multi-select
}
	$UsersAdmin_list->lOptionCnt += count($UsersAdmin_list->ListOptions->Items); // Custom list options
?>
<?php echo $UsersAdmin->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($UsersAdmin->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="UsersAdmin_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($UsersAdmin_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($UsersAdmin->nguoidung_option->Visible) { // nguoidung_option ?>
	<?php if ($UsersAdmin->SortUrl($UsersAdmin->nguoidung_option) == "") { ?>
		<td>Loại người đùng</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $UsersAdmin->SortUrl($UsersAdmin->nguoidung_option) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Loại người dùng</td><td style="width: 10px;"><?php if ($UsersAdmin->nguoidung_option->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($UsersAdmin->nguoidung_option->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($UsersAdmin->tendangnhap->Visible) { // tendangnhap ?>
	<?php if ($UsersAdmin->SortUrl($UsersAdmin->tendangnhap) == "") { ?>
		<td>Tên đăng nhập</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $UsersAdmin->SortUrl($UsersAdmin->tendangnhap) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tên đăng nhập</td><td style="width: 10px;"><?php if ($UsersAdmin->tendangnhap->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($UsersAdmin->tendangnhap->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>	
<?php if ($UsersAdmin->hoten_nguoilienhe->Visible) { // hoten_nguoilienhe ?>
	<?php if ($UsersAdmin->SortUrl($UsersAdmin->hoten_nguoilienhe) == ""){ ?>
		<td>Họ và Tên</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $UsersAdmin->SortUrl($UsersAdmin->hoten_nguoilienhe) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Họ và Tên</td><td style="width: 10px;"><?php if ($UsersAdmin->hoten_nguoilienhe->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($UsersAdmin->hoten_nguoilienhe->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($UsersAdmin->truycap_gannhat->Visible) { // truycap_gannhat ?>
	<?php if ($UsersAdmin->SortUrl($UsersAdmin->truycap_gannhat) == "") { ?>
		<td>Truy cập gần nhất</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $UsersAdmin->SortUrl($UsersAdmin->truycap_gannhat) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Truy cập gần nhất</td><td style="width: 10px;"><?php if ($UsersAdmin->truycap_gannhat->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($UsersAdmin->truycap_gannhat->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($UsersAdmin->UserLevelID->Visible) { // UserLevelID ?>
	<?php if ($UsersAdmin->SortUrl($UsersAdmin->UserLevelID) == "") { ?>
		<td>Cấp bậc</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $UsersAdmin->SortUrl($UsersAdmin->UserLevelID) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Cấp bậc</td><td style="width: 10px;"><?php if ($UsersAdmin->UserLevelID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($UsersAdmin->UserLevelID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($UsersAdmin->ExportAll && $UsersAdmin->Export <> "") {
	$UsersAdmin_list->lStopRec = $UsersAdmin_list->lTotalRecs;
} else {
	$UsersAdmin_list->lStopRec = $UsersAdmin_list->lStartRec + $UsersAdmin_list->lDisplayRecs - 1; // Set the last record to display
}
$UsersAdmin_list->lRecCount = $UsersAdmin_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$UsersAdmin->SelectLimit && $UsersAdmin_list->lStartRec > 1)
		$rs->Move($UsersAdmin_list->lStartRec - 1);
}
$UsersAdmin_list->lRowCnt = 0;
while (($UsersAdmin->CurrentAction == "gridadd" || !$rs->EOF) &&
	$UsersAdmin_list->lRecCount < $UsersAdmin_list->lStopRec) {
	$UsersAdmin_list->lRecCount++;
	if (intval($UsersAdmin_list->lRecCount) >= intval($UsersAdmin_list->lStartRec)) {
		$UsersAdmin_list->lRowCnt++;

	// Init row class and style
	$UsersAdmin->CssClass = "";
	$UsersAdmin->CssStyle = "";
	$UsersAdmin->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($UsersAdmin->CurrentAction == "gridadd") {
		$UsersAdmin_list->LoadDefaultValues(); // Load default values
	} else {
		$UsersAdmin_list->LoadRowValues($rs); // Load row values
	}
	$UsersAdmin->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$UsersAdmin_list->RenderRow();
?>
	<tr<?php echo $UsersAdmin->RowAttributes() ?>>
<?php if ($UsersAdmin->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $UsersAdmin->ViewUrl() ?>">Xem</a>
</span></td>
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $UsersAdmin->EditUrl() ?>">Sửa</a>
</span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($UsersAdmin->nguoidung_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($UsersAdmin_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($UsersAdmin->nguoidung_option->Visible) { // nguoidung_option ?>
		<td<?php echo $UsersAdmin->nguoidung_option->CellAttributes() ?>>
<div<?php echo $UsersAdmin->nguoidung_option->ViewAttributes() ?>><?php echo $UsersAdmin->nguoidung_option->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($UsersAdmin->tendangnhap->Visible) { // tendangnhap ?>
		<td<?php echo $UsersAdmin->tendangnhap->CellAttributes() ?>>
<div<?php echo $UsersAdmin->tendangnhap->ViewAttributes() ?>><?php echo $UsersAdmin->tendangnhap->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($UsersAdmin->hoten_nguoilienhe->Visible) { // hoten_nguoilienhe ?>
		<td<?php echo $UsersAdmin->hoten_nguoilienhe->CellAttributes() ?>>
<div<?php echo $UsersAdmin->hoten_nguoilienhe->ViewAttributes() ?>><?php echo $UsersAdmin->hoten_nguoilienhe->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($UsersAdmin->truycap_gannhat->Visible) { // truycap_gannhat ?>
		<td<?php echo $UsersAdmin->truycap_gannhat->CellAttributes() ?>>
<div<?php echo $UsersAdmin->truycap_gannhat->ViewAttributes() ?>><?php echo $UsersAdmin->truycap_gannhat->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($UsersAdmin->UserLevelID->Visible) { // UserLevelID ?>
		<td<?php echo $UsersAdmin->UserLevelID->CellAttributes() ?>>
<div<?php echo $UsersAdmin->UserLevelID->ViewAttributes() ?>><?php echo $UsersAdmin->UserLevelID->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($UsersAdmin->CurrentAction <> "gridadd")
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
<?php if ($UsersAdmin_list->lTotalRecs > 0) { ?>
<?php if ($UsersAdmin->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($UsersAdmin->CurrentAction <> "gridadd" && $UsersAdmin->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($UsersAdmin_list->Pager)) $UsersAdmin_list->Pager = new cNumericPager($UsersAdmin_list->lStartRec, $UsersAdmin_list->lDisplayRecs, $UsersAdmin_list->lTotalRecs, $UsersAdmin_list->lRecRange) ?>
<?php if ($UsersAdmin_list->Pager->RecordCount > 0) { ?>
	<?php if ($UsersAdmin_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $UsersAdmin_list->PageUrl() ?>start=<?php echo $UsersAdmin_list->Pager->FirstButton->Start ?>"><b>Đầu tiên</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersAdmin_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $UsersAdmin_list->PageUrl() ?>start=<?php echo $UsersAdmin_list->Pager->PrevButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($UsersAdmin_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $UsersAdmin_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($UsersAdmin_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $UsersAdmin_list->PageUrl() ?>start=<?php echo $UsersAdmin_list->Pager->NextButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersAdmin_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $UsersAdmin_list->PageUrl() ?>start=<?php echo $UsersAdmin_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersAdmin_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $UsersAdmin_list->Pager->FromIndex ?> đến <?php echo $UsersAdmin_list->Pager->ToIndex ?> của <?php echo $UsersAdmin_list->Pager->RecordCount ?> Bản ghi
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($UsersAdmin_list->sSrchWhere == "0=101") { ?>
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
<?php //if ($UsersAdmin_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $UsersAdmin->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($UsersAdmin_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fUsersAdminlist)) alert('Không có bản ghi được chọn'); else if (ew_Confirm('<?php echo $UsersAdmin_list->sDeleteConfirmMsg ?>')) {document.fUsersAdminlist.action='UsersAdmindelete.php';document.fUsersAdminlist.encoding='application/x-www-form-urlencoded';document.fUsersAdminlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($UsersAdmin->Export == "" && $UsersAdmin->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(UsersAdmin_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($UsersAdmin->Export == "") { ?>
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
class cUsersAdmin_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'UsersAdmin';

	// Page Object Name
	var $PageObjName = 'UsersAdmin_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $UsersAdmin;
		if ($UsersAdmin->UseTokenInUrl) $PageUrl .= "t=" . $UsersAdmin->TableVar . "&"; // add page token
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
		global $objForm, $UsersAdmin;
		if ($UsersAdmin->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($UsersAdmin->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($UsersAdmin->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function cUsersAdmin_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["UsersAdmin"] = new cUsersAdmin();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'UsersAdmin', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $UsersAdmin;
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
	$UsersAdmin->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $UsersAdmin->Export; // Get export parameter, used in header
	$gsExportFile = $UsersAdmin->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $UsersAdmin;
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

			// Handle reset command
			$this->ResetCmd();

			// Get search criteria for advanced search
			$this->LoadSearchValues(); // Get search values
			if ($this->ValidateSearch()) {
				$sSrchAdvanced = $this->AdvancedSearchWhere();
			} else {
				$this->setMessage($gsSearchError);
			}

			// Get basic search criteria
			if ($gsSearchError == "")
				$sSrchBasic = $this->BasicSearchWhere();

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($UsersAdmin->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $UsersAdmin->getRecordsPerPage(); // Restore from Session
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
		$UsersAdmin->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$UsersAdmin->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$UsersAdmin->setStartRecordNumber($this->lStartRec);
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
		$UsersAdmin->setSessionWhere($sFilter);
		$UsersAdmin->CurrentFilter = "";
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $UsersAdmin;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $UsersAdmin->nguoidung_id, FALSE); // Field nguoidung_id
		$this->BuildSearchSql($sWhere, $UsersAdmin->nguoidung_option, FALSE); // Field nguoidung_option
		$this->BuildSearchSql($sWhere, $UsersAdmin->tendangnhap, FALSE); // Field tendangnhap
		$this->BuildSearchSql($sWhere, $UsersAdmin->mat_khau, FALSE); // Field mat_khau
		$this->BuildSearchSql($sWhere, $UsersAdmin->truycap_gannhat, FALSE); // Field truycap_gannhat
		$this->BuildSearchSql($sWhere, $UsersAdmin->UserLevelID, FALSE); // Field UserLevelID

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($UsersAdmin->nguoidung_id); // Field nguoidung_id
			$this->SetSearchParm($UsersAdmin->nguoidung_option); // Field nguoidung_option
			$this->SetSearchParm($UsersAdmin->tendangnhap); // Field tendangnhap
			$this->SetSearchParm($UsersAdmin->mat_khau); // Field mat_khau
			$this->SetSearchParm($UsersAdmin->truycap_gannhat); // Field truycap_gannhat
			$this->SetSearchParm($UsersAdmin->UserLevelID); // Field UserLevelID
		}
		return $sWhere;
	}

	// Build search SQL
	function BuildSearchSql(&$Where, &$Fld, $MultiValue) {
		$FldParm = substr($Fld->FldVar, 2);		
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldOpr = $Fld->AdvancedSearch->SearchOperator; // @$_GET["z_$FldParm"]
		$FldCond = $Fld->AdvancedSearch->SearchCondition; // @$_GET["v_$FldParm"]
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldOpr2 = $Fld->AdvancedSearch->SearchOperator2; // @$_GET["w_$FldParm"]
		$sWrk = "";
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$FldOpr = strtoupper(trim($FldOpr));
		if ($FldOpr == "") $FldOpr = "=";
		$FldOpr2 = strtoupper(trim($FldOpr2));
		if ($FldOpr2 == "") $FldOpr2 = "=";
		if (EW_SEARCH_MULTI_VALUE_OPTION == 1 || $FldOpr <> "LIKE" ||
			($FldOpr2 <> "LIKE" && $FldVal2 <> ""))
			$MultiValue = FALSE;
		if ($MultiValue) {
			$sWrk1 = ($FldVal <> "") ? ew_GetMultiSearchSql($Fld, $FldVal) : ""; // Field value 1
			$sWrk2 = ($FldVal2 <> "") ? ew_GetMultiSearchSql($Fld, $FldVal2) : ""; // Field value 2
			$sWrk = $sWrk1; // Build final SQL
			if ($sWrk2 <> "")
				$sWrk = ($sWrk <> "") ? "($sWrk) $FldCond ($sWrk2)" : $sWrk2;
		} else {
			$FldVal = $this->ConvertSearchValue($Fld, $FldVal);
			$FldVal2 = $this->ConvertSearchValue($Fld, $FldVal2);
			$sWrk = ew_GetSearchSql($Fld, $FldVal, $FldOpr, $FldCond, $FldVal2, $FldOpr2);
		}
		if ($sWrk <> "") {
			if ($Where <> "") $Where .= " AND ";
			$Where .= "(" . $sWrk . ")";
		}
	}

	// Set search parameters
	function SetSearchParm(&$Fld) {
		global $UsersAdmin;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$UsersAdmin->setAdvancedSearch("x_$FldParm", $FldVal);
		$UsersAdmin->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$UsersAdmin->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$UsersAdmin->setAdvancedSearch("y_$FldParm", $FldVal2);
		$UsersAdmin->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
	}

	// Convert search value
	function ConvertSearchValue(&$Fld, $FldVal) {
		$Value = $FldVal;
		if ($Fld->FldDataType == EW_DATATYPE_BOOLEAN) {
			if ($FldVal <> "") $Value = ($FldVal == "1") ? $Fld->TrueValue : $Fld->FalseValue;
		} elseif ($Fld->FldDataType == EW_DATATYPE_DATE) {
			if ($FldVal <> "") $Value = ew_UnFormatDateTime($FldVal, $Fld->FldDateTimeFormat);
		}
		return $Value;
	}

	// Return Basic Search sql
	function BasicSearchSQL($Keyword) {
		global $UsersAdmin;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $UsersAdmin->tendangnhap->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersAdmin->mat_khau->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $UsersAdmin;
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
			$UsersAdmin->setBasicSearchKeyword($sSearchKeyword);
			$UsersAdmin->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $UsersAdmin;
		$this->sSrchWhere = "";
		$UsersAdmin->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $UsersAdmin;
		$UsersAdmin->setBasicSearchKeyword("");
		$UsersAdmin->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $UsersAdmin;
		$UsersAdmin->setAdvancedSearch("x_nguoidung_id", "");
		$UsersAdmin->setAdvancedSearch("x_nguoidung_option", "");
		$UsersAdmin->setAdvancedSearch("x_tendangnhap", "");
		$UsersAdmin->setAdvancedSearch("x_mat_khau", "");
		$UsersAdmin->setAdvancedSearch("x_truycap_gannhat", "");
		$UsersAdmin->setAdvancedSearch("y_truycap_gannhat", "");
		$UsersAdmin->setAdvancedSearch("x_UserLevelID", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $UsersAdmin;
		$this->sSrchWhere = $UsersAdmin->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $UsersAdmin;
		 $UsersAdmin->nguoidung_id->AdvancedSearch->SearchValue = $UsersAdmin->getAdvancedSearch("x_nguoidung_id");
		 $UsersAdmin->nguoidung_option->AdvancedSearch->SearchValue = $UsersAdmin->getAdvancedSearch("x_nguoidung_option");
		 $UsersAdmin->tendangnhap->AdvancedSearch->SearchValue = $UsersAdmin->getAdvancedSearch("x_tendangnhap");
		 $UsersAdmin->mat_khau->AdvancedSearch->SearchValue = $UsersAdmin->getAdvancedSearch("x_mat_khau");
		 $UsersAdmin->truycap_gannhat->AdvancedSearch->SearchValue = $UsersAdmin->getAdvancedSearch("x_truycap_gannhat");
		 $UsersAdmin->truycap_gannhat->AdvancedSearch->SearchValue2 = $UsersAdmin->getAdvancedSearch("y_truycap_gannhat");
		 $UsersAdmin->UserLevelID->AdvancedSearch->SearchValue = $UsersAdmin->getAdvancedSearch("x_UserLevelID");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $UsersAdmin;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$UsersAdmin->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$UsersAdmin->CurrentOrderType = @$_GET["ordertype"];
			$UsersAdmin->UpdateSort($UsersAdmin->nguoidung_option); // Field 
			$UsersAdmin->UpdateSort($UsersAdmin->tendangnhap); // Field 
			$UsersAdmin->UpdateSort($UsersAdmin->truycap_gannhat); // Field 
			$UsersAdmin->UpdateSort($UsersAdmin->UserLevelID); // Field 
			$UsersAdmin->UpdateSort($UsersAdmin->hoten_nguoilienhe); // Field 
			$UsersAdmin->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $UsersAdmin;
		$sOrderBy = $UsersAdmin->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($UsersAdmin->SqlOrderBy() <> "") {
				$sOrderBy = $UsersAdmin->SqlOrderBy();
				$UsersAdmin->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $UsersAdmin;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$UsersAdmin->setSessionOrderBy($sOrderBy);
				$UsersAdmin->nguoidung_option->setSort("");
				$UsersAdmin->tendangnhap->setSort("");
				$UsersAdmin->truycap_gannhat->setSort("");
				$UsersAdmin->UserLevelID->setSort("");
				$UsersAdmin->hoten_nguoilienhe->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$UsersAdmin->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $UsersAdmin;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$UsersAdmin->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$UsersAdmin->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $UsersAdmin->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$UsersAdmin->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$UsersAdmin->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$UsersAdmin->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $UsersAdmin;

		// Load search values
		// nguoidung_id

		$UsersAdmin->nguoidung_id->AdvancedSearch->SearchValue = @$_GET["x_nguoidung_id"];
		$UsersAdmin->nguoidung_id->AdvancedSearch->SearchOperator = @$_GET["z_nguoidung_id"];

		// nguoidung_option
		$UsersAdmin->nguoidung_option->AdvancedSearch->SearchValue = @$_GET["x_nguoidung_option"];
		$UsersAdmin->nguoidung_option->AdvancedSearch->SearchOperator = @$_GET["z_nguoidung_option"];

		// tendangnhap
		$UsersAdmin->tendangnhap->AdvancedSearch->SearchValue = @$_GET["x_tendangnhap"];
		$UsersAdmin->tendangnhap->AdvancedSearch->SearchOperator = @$_GET["z_tendangnhap"];

		// mat_khau
		$UsersAdmin->mat_khau->AdvancedSearch->SearchValue = @$_GET["x_mat_khau"];
		$UsersAdmin->mat_khau->AdvancedSearch->SearchOperator = @$_GET["z_mat_khau"];

		// truycap_gannhat
		$UsersAdmin->truycap_gannhat->AdvancedSearch->SearchValue = @$_GET["x_truycap_gannhat"];
		$UsersAdmin->truycap_gannhat->AdvancedSearch->SearchOperator = @$_GET["z_truycap_gannhat"];
		$UsersAdmin->truycap_gannhat->AdvancedSearch->SearchCondition = @$_GET["v_truycap_gannhat"];
		$UsersAdmin->truycap_gannhat->AdvancedSearch->SearchValue2 = @$_GET["y_truycap_gannhat"];
		$UsersAdmin->truycap_gannhat->AdvancedSearch->SearchOperator2 = @$_GET["w_truycap_gannhat"];

		// UserLevelID
		$UsersAdmin->UserLevelID->AdvancedSearch->SearchValue = @$_GET["x_UserLevelID"];
		$UsersAdmin->UserLevelID->AdvancedSearch->SearchOperator = @$_GET["z_UserLevelID"];

		// quocgia_id
		$UsersAdmin->quocgia_id->AdvancedSearch->SearchValue = @$_GET["x_quocgia_id"];
		$UsersAdmin->quocgia_id->AdvancedSearch->SearchOperator = @$_GET["z_quocgia_id"];

		// gioi_tinh
		$UsersAdmin->gioi_tinh->AdvancedSearch->SearchValue = @$_GET["x_gioi_tinh"];
		$UsersAdmin->gioi_tinh->AdvancedSearch->SearchOperator = @$_GET["z_gioi_tinh"];

		// hoten_nguoilienhe
		$UsersAdmin->hoten_nguoilienhe->AdvancedSearch->SearchValue = @$_GET["x_hoten_nguoilienhe"];
		$UsersAdmin->hoten_nguoilienhe->AdvancedSearch->SearchOperator = @$_GET["z_hoten_nguoilienhe"];

		// nick_yahoo
		$UsersAdmin->nick_yahoo->AdvancedSearch->SearchValue = @$_GET["x_nick_yahoo"];
		$UsersAdmin->nick_yahoo->AdvancedSearch->SearchOperator = @$_GET["z_nick_yahoo"];

		// nick_skype
		$UsersAdmin->nick_skype->AdvancedSearch->SearchValue = @$_GET["x_nick_skype"];
		$UsersAdmin->nick_skype->AdvancedSearch->SearchOperator = @$_GET["z_nick_skype"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $UsersAdmin;

		// Call Recordset Selecting event
		$UsersAdmin->Recordset_Selecting($UsersAdmin->CurrentFilter);

		// Load list page SQL
		$sSql = $UsersAdmin->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$UsersAdmin->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $UsersAdmin;
		$sFilter = $UsersAdmin->KeyFilter();

		// Call Row Selecting event
		$UsersAdmin->Row_Selecting($sFilter);

		// Load sql based on filter
		$UsersAdmin->CurrentFilter = $sFilter;
		$sSql = $UsersAdmin->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$UsersAdmin->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $UsersAdmin;
		$UsersAdmin->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$UsersAdmin->nguoidung_option->setDbValue($rs->fields('nguoidung_option'));
		$UsersAdmin->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$UsersAdmin->mat_khau->setDbValue($rs->fields('mat_khau'));
		$UsersAdmin->truycap_gannhat->setDbValue($rs->fields('truycap_gannhat'));
		$UsersAdmin->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		$UsersAdmin->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$UsersAdmin->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$UsersAdmin->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));
		$UsersAdmin->nick_yahoo->setDbValue($rs->fields('nick_yahoo'));
		$UsersAdmin->nick_skype->setDbValue($rs->fields('nick_skype'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $UsersAdmin;

		// Call Row_Rendering event
		$UsersAdmin->Row_Rendering();

		// Common render codes for all row types
		// nguoidung_option

		$UsersAdmin->nguoidung_option->CellCssStyle = "";
		$UsersAdmin->nguoidung_option->CellCssClass = "";

		// tendangnhap
		$UsersAdmin->tendangnhap->CellCssStyle = "";
		$UsersAdmin->tendangnhap->CellCssClass = "";
		
		// hoten_nguoilienhe
		$UsersAdmin->hoten_nguoilienhe->CellCssStyle = "";
		$UsersAdmin->hoten_nguoilienhe->CellCssClass = "";

		// truycap_gannhat
		$UsersAdmin->truycap_gannhat->CellCssStyle = "";
		$UsersAdmin->truycap_gannhat->CellCssClass = "";

		// UserLevelID
		$UsersAdmin->UserLevelID->CellCssStyle = "";
		$UsersAdmin->UserLevelID->CellCssClass = "";

		
		if ($UsersAdmin->RowType == EW_ROWTYPE_VIEW) { // View row

			// nguoidung_option
			if (strval($UsersAdmin->nguoidung_option->CurrentValue) <> "") {
				switch ($UsersAdmin->nguoidung_option->CurrentValue) {
					case "0":
						$UsersAdmin->nguoidung_option->ViewValue = "Quản lý hệ thống";
						break;
					case "1":
						$UsersAdmin->nguoidung_option->ViewValue = "Thành viên đăng ký";
						break;
					default:
						$UsersAdmin->nguoidung_option->ViewValue = $UsersAdmin->nguoidung_option->CurrentValue;
				}
			} else {
				$UsersAdmin->nguoidung_option->ViewValue = NULL;
			}
			$UsersAdmin->nguoidung_option->CssStyle = "";
			$UsersAdmin->nguoidung_option->CssClass = "";
			$UsersAdmin->nguoidung_option->ViewCustomAttributes = "";

			// tendangnhap
			$UsersAdmin->tendangnhap->ViewValue = $UsersAdmin->tendangnhap->CurrentValue;
			$UsersAdmin->tendangnhap->CssStyle = "";
			$UsersAdmin->tendangnhap->CssClass = "";
			$UsersAdmin->tendangnhap->ViewCustomAttributes = "";

                        // hoten_nguoilienhe
			$UsersAdmin->hoten_nguoilienhe->ViewValue = $UsersAdmin->hoten_nguoilienhe->CurrentValue;
			$UsersAdmin->hoten_nguoilienhe->CssStyle = "";
			$UsersAdmin->hoten_nguoilienhe->CssClass = "";
			$UsersAdmin->hoten_nguoilienhe->ViewCustomAttributes = "";

			// truycap_gannhat
			$UsersAdmin->truycap_gannhat->ViewValue = $UsersAdmin->truycap_gannhat->CurrentValue;
			$UsersAdmin->truycap_gannhat->ViewValue = ew_FormatDateTime($UsersAdmin->truycap_gannhat->ViewValue, 11);
			$UsersAdmin->truycap_gannhat->CssStyle = "";
			$UsersAdmin->truycap_gannhat->CssClass = "";
			$UsersAdmin->truycap_gannhat->ViewCustomAttributes = "";

			// UserLevelID
			if (strval($UsersAdmin->UserLevelID->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `UserLevelName` FROM `userlevels` WHERE `UserLevelID` = " . ew_AdjustSql($UsersAdmin->UserLevelID->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersAdmin->UserLevelID->ViewValue = $rswrk->fields('UserLevelName');
					$rswrk->Close();
				} else {
					$UsersAdmin->UserLevelID->ViewValue = $UsersAdmin->UserLevelID->CurrentValue;
				}
			} else {
				$UsersAdmin->UserLevelID->ViewValue = NULL;
			}
			$UsersAdmin->UserLevelID->CssStyle = "";
			$UsersAdmin->UserLevelID->CssClass = "";
			$UsersAdmin->UserLevelID->ViewCustomAttributes = "";

			// quocgia_id
			if (strval($UsersAdmin->quocgia_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_quocgia` FROM `country` WHERE `quocgia_id` = '" . ew_AdjustSql($UsersAdmin->quocgia_id->CurrentValue) . "'";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$UsersAdmin->quocgia_id->ViewValue = $rswrk->fields('ten_quocgia');
					$rswrk->Close();
				} else {
					$UsersAdmin->quocgia_id->ViewValue = $UsersAdmin->quocgia_id->CurrentValue;
				}
			} else {
				$UsersAdmin->quocgia_id->ViewValue = NULL;
			}
			$UsersAdmin->quocgia_id->CssStyle = "";
			$UsersAdmin->quocgia_id->CssClass = "";
			$UsersAdmin->quocgia_id->ViewCustomAttributes = "";

			// gioi_tinh
			if (strval($UsersAdmin->gioi_tinh->CurrentValue) <> "") {
				switch ($UsersAdmin->gioi_tinh->CurrentValue) {
					case "0":
						$UsersAdmin->gioi_tinh->ViewValue = "Nam";
						break;
					case "1":
						$UsersAdmin->gioi_tinh->ViewValue = "Nữ";
						break;
					default:
						$UsersAdmin->gioi_tinh->ViewValue = $UsersAdmin->gioi_tinh->CurrentValue;
				}
			} else {
				$UsersAdmin->gioi_tinh->ViewValue = NULL;
			}
			$UsersAdmin->gioi_tinh->CssStyle = "";
			$UsersAdmin->gioi_tinh->CssClass = "";
			$UsersAdmin->gioi_tinh->ViewCustomAttributes = "";

			// nick_yahoo
			$UsersAdmin->nick_yahoo->ViewValue = $UsersAdmin->nick_yahoo->CurrentValue;
			$UsersAdmin->nick_yahoo->CssStyle = "";
			$UsersAdmin->nick_yahoo->CssClass = "";
			$UsersAdmin->nick_yahoo->ViewCustomAttributes = "";

			// nick_skype
			$UsersAdmin->nick_skype->ViewValue = $UsersAdmin->nick_skype->CurrentValue;
			$UsersAdmin->nick_skype->CssStyle = "";
			$UsersAdmin->nick_skype->CssClass = "";
			$UsersAdmin->nick_skype->ViewCustomAttributes = "";

			// nguoidung_option
			$UsersAdmin->nguoidung_option->HrefValue = "";

			// tendangnhap
			$UsersAdmin->tendangnhap->HrefValue = "";

			// truycap_gannhat
			$UsersAdmin->truycap_gannhat->HrefValue = "";

			// UserLevelID
			$UsersAdmin->UserLevelID->HrefValue = "";

			// hoten_nguoilienhe
			$UsersAdmin->hoten_nguoilienhe->HrefValue = "";

		} elseif ($UsersAdmin->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// nguoidung_option
			$UsersAdmin->nguoidung_option->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Quản lý hệ thống");
			$arwrk[] = array("1", "Thành viên đăng ký");
			//array_unshift($arwrk, array("", "Chọn"));
			$UsersAdmin->nguoidung_option->EditValue = $arwrk;

			// tendangnhap
			$UsersAdmin->tendangnhap->EditCustomAttributes = "";
			$UsersAdmin->tendangnhap->EditValue = ew_HtmlEncode($UsersAdmin->tendangnhap->AdvancedSearch->SearchValue);

			// truycap_gannhat
			$UsersAdmin->truycap_gannhat->EditCustomAttributes = "";
			$UsersAdmin->truycap_gannhat->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($UsersAdmin->truycap_gannhat->AdvancedSearch->SearchValue, 7), 7));
			$UsersAdmin->truycap_gannhat->EditCustomAttributes = "";
			$UsersAdmin->truycap_gannhat->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($UsersAdmin->truycap_gannhat->AdvancedSearch->SearchValue2, 7), 7));

			// UserLevelID
			$UsersAdmin->UserLevelID->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `UserLevelID`, `UserLevelName`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `userlevels`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Chọn"));
			$UsersAdmin->UserLevelID->EditValue = $arwrk;

			// hoten_nguoilienhe
			$UsersAdmin->hoten_nguoilienhe->EditCustomAttributes = "";
			$UsersAdmin->hoten_nguoilienhe->EditValue = ew_HtmlEncode($UsersAdmin->hoten_nguoilienhe->AdvancedSearch->SearchValue);

		}

		// Call Row Rendered event
		$UsersAdmin->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $UsersAdmin;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		/*if (!ew_CheckEuroDate($UsersAdmin->truycap_gannhat->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Truycap Gannhat";
		}
		if (!ew_CheckEuroDate($UsersAdmin->truycap_gannhat->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Truycap Gannhat";
		}*/

		// Return validate result
		$ValidateSearch = ($gsSearchError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateSearch = $ValidateSearch && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= $sFormCustomError;
		}
		return $ValidateSearch;
	}

	// Load advanced search
	function LoadAdvancedSearch() {
		global $UsersAdmin;
		$UsersAdmin->nguoidung_id->AdvancedSearch->SearchValue = $UsersAdmin->getAdvancedSearch("x_nguoidung_id");
		$UsersAdmin->nguoidung_option->AdvancedSearch->SearchValue = $UsersAdmin->getAdvancedSearch("x_nguoidung_option");
		$UsersAdmin->tendangnhap->AdvancedSearch->SearchValue = $UsersAdmin->getAdvancedSearch("x_tendangnhap");
		$UsersAdmin->mat_khau->AdvancedSearch->SearchValue = $UsersAdmin->getAdvancedSearch("x_mat_khau");
		$UsersAdmin->truycap_gannhat->AdvancedSearch->SearchValue = $UsersAdmin->getAdvancedSearch("x_truycap_gannhat");
		$UsersAdmin->truycap_gannhat->AdvancedSearch->SearchValue2 = $UsersAdmin->getAdvancedSearch("y_truycap_gannhat");
		$UsersAdmin->UserLevelID->AdvancedSearch->SearchValue = $UsersAdmin->getAdvancedSearch("x_UserLevelID");
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
	