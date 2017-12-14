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
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Define page object
$UsersRegistered_list = new cUsersRegistered_list();
$Page =& $UsersRegistered_list;

// Page init processing
$UsersRegistered_list->Page_Init();

// Page main processing
$UsersRegistered_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($UsersRegistered->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var UsersRegistered_list = new ew_Page("UsersRegistered_list");

// page properties
UsersRegistered_list.PageID = "list"; // page ID
var EW_PAGE_ID = UsersRegistered_list.PageID; // for backward compatibility

// extend page with validate function for search
UsersRegistered_list.ValidateSearch = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	var infix = "";
	elm = fobj.elements["x" + infix + "_ngay_thamgia"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Ngày tham gia không đúng (dữ liệu ngày tháng :dd/mm/yyyy)");
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
UsersRegistered_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
UsersRegistered_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
UsersRegistered_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
UsersRegistered_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($UsersRegistered->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($UsersRegistered->Export == "" && $UsersRegistered->SelectLimit);
	if (!$bSelectLimit)
		$rs = $UsersRegistered_list->LoadRecordset();
	$UsersRegistered_list->lTotalRecs = ($bSelectLimit) ? $UsersRegistered->SelectRecordCount() : $rs->RecordCount();
	$UsersRegistered_list->lStartRec = 1;
	if ($UsersRegistered_list->lDisplayRecs <= 0) // Display all records
		$UsersRegistered_list->lDisplayRecs = $UsersRegistered_list->lTotalRecs;
	if (!($UsersRegistered->ExportAll && $UsersRegistered->Export <> ""))
		$UsersRegistered_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $UsersRegistered_list->LoadRecordset($UsersRegistered_list->lStartRec-1, $UsersRegistered_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg_line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Quản lý thành viên</font></b></td>
								<td height="20" width="54%" background="images/bg_line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<p><span class="phpmaker" style="white-space: nowrap;">

</span></p>

<?php if ($Security->CanSearch()) { ?>
<?php if ($UsersRegistered->Export == "" && $UsersRegistered->CurrentAction == "") { ?>






<a href="javascript:ew_ToggleSearchPanel(UsersRegistered_list);" style="text-decoration: none;"><img id="UsersRegistered_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Tìm kiếm thông tin</span><br>
<div id="UsersRegistered_list_SearchPanel">
<form name="fUsersRegisteredlistsrch" id="fUsersRegisteredlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return UsersRegistered_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="UsersRegistered">
<?php
if ($gsSearchError == "")
	$UsersRegistered_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$UsersRegistered->RowType = EW_ROWTYPE_SEARCH;

// Render row
$UsersRegistered_list->RenderRow();
?>




<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
		<br>
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="60" value="<?php echo ew_HtmlEncode($UsersRegistered->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value=" Tìm kiếm ">&nbsp;
			<input type="Button" name="Reset" id="Reset" value="   Nhập lại   " onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp; 
			<a href="<?php echo $UsersRegistered_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($UsersRegistered->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($UsersRegistered->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($UsersRegistered->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>




<table class="ewBasicSearch">
	<tr>
		<td width = "100">
			<span>Tên đăng nhập</span>
			<input type="text" name="x_tendangnhap" id="x_tendangnhap" size="30" maxlength="150" value="<?php echo $UsersRegistered->tendangnhap->EditValue ?>"<?php echo $UsersRegistered->tendangnhap->EditAttributes() ?>>
			<input type="hidden" name="z_tendangnhap" id="z_tendangnhap" value="LIKE">
		</td>	
		<td width = "300">
			<span>Tên thành viên</span>
			<input type="text" name="x_ten_congty" id="x_ten_congty" size="30" maxlength="150" value="<?php echo $UsersRegistered->ten_congty->EditValue ?>"<?php echo $UsersRegistered->ten_congty->EditAttributes() ?>>
			<input type="hidden" name="z_ten_congty" id="z_ten_congty" value="LIKE">
		</td>
	</tr>
	
	<tr>
		<td width = "380">
			<span class="phpmaker">Ngày tham gia</span>
			<input type="hidden" name="z_ngay_thamgia" id="z_ngay_thamgia" value="BETWEEN">
			<input type="text" name="x_ngay_thamgia" id="x_ngay_thamgia" value="<?php echo $UsersRegistered->ngay_thamgia->EditValue ?>"<?php echo $UsersRegistered->ngay_thamgia->EditAttributes() ?>>
			&nbsp;<img src="images/calendar.png" id="cal_x_ngay_thamgia" name="cal_x_ngay_thamgia" alt="Pick a date" style="cursor:pointer;cursor:hand;">
			<script type="text/javascript">
				Calendar.setup({
					inputField : "x_ngay_thamgia", // ID of the input field
					ifFormat : "%d/%m/%Y", // the date format
					button : "cal_x_ngay_thamgia" // ID of the button
				});
			</script>
			<input type="text" name="y_ngay_thamgia" id="y_ngay_thamgia" value="<?php echo $UsersRegistered->ngay_thamgia->EditValue2 ?>"<?php echo $UsersRegistered->ngay_thamgia->EditAttributes() ?>>
			&nbsp;<img src="images/calendar.png" id="cal_y_ngay_thamgia" name="cal_y_ngay_thamgia" alt="Pick a date" style="cursor:pointer;cursor:hand;">
			<script type="text/javascript">
				Calendar.setup({
					inputField : "y_ngay_thamgia", // ID of the input field
					ifFormat : "%d/%m/%Y", // the date format
					button : "cal_y_ngay_thamgia" // ID of the button
				});
			</script>
			</td>
			<td width = "300">
			<span class="phpmaker">Kiểu giao diện</span>
			<input type="hidden" name="z_kieu_giaodien" id="z_kieu_giaodien" value="=">
			<select id="x_kieu_giaodien" name="x_kieu_giaodien"<?php echo $UsersRegistered->kieu_giaodien->EditAttributes() ?>>
				<?php
					if (is_array($UsersRegistered->kieu_giaodien->EditValue)) {
						$arwrk = $UsersRegistered->kieu_giaodien->EditValue;
						$rowswrk = count($arwrk);
						$emptywrk = TRUE;
						for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
							$selwrk = (strval($UsersRegistered->kieu_giaodien->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
		<td width = "380">
			<span class="phpmaker">Truy cập gần nhất</span>
			<input type="hidden" name="z_truycap_gannhat" id="z_truycap_gannhat" value="BETWEEN">
			<input type="text" name="x_truycap_gannhat" id="x_truycap_gannhat" value="<?php echo $UsersRegistered->truycap_gannhat->EditValue ?>"<?php echo $UsersRegistered->truycap_gannhat->EditAttributes() ?>>
			&nbsp;<img src="images/calendar.png" id="cal_x_truycap_gannhat" name="cal_x_truycap_gannhat" alt="Pick a date" style="cursor:pointer;cursor:hand;">
			<script type="text/javascript">
				Calendar.setup({
					inputField : "x_truycap_gannhat", // ID of the input field
					ifFormat : "%d/%m/%Y", // the date format
					button : "cal_x_truycap_gannhat" // ID of the button
				});
			</script>
			<input type="text" name="y_truycap_gannhat" id="y_truycap_gannhat" value="<?php echo $UsersRegistered->truycap_gannhat->EditValue2 ?>"<?php echo $UsersRegistered->truycap_gannhat->EditAttributes() ?>>
			&nbsp;<img src="images/calendar.png" id="cal_y_truycap_gannhat" name="cal_y_truycap_gannhat" alt="Pick a date" style="cursor:pointer;cursor:hand;">
			<script type="text/javascript">
				Calendar.setup({
					inputField : "y_truycap_gannhat", // ID of the input field
					ifFormat : "%d/%m/%Y", // the date format
					button : "cal_y_truycap_gannhat" // ID of the button
				});
			</script>
		</td>
		<td width = "300">
			<span class="phpmaker">Cấp bậc</span>
			<input type="hidden" name="z_UserLevelID" id="z_UserLevelID" value="=">
			<select id="x_UserLevelID" name="x_UserLevelID"<?php echo $UsersRegistered->UserLevelID->EditAttributes() ?>>
				<?php
				if (is_array($UsersRegistered->UserLevelID->EditValue)) {
					$arwrk = $UsersRegistered->UserLevelID->EditValue;
					$rowswrk = count($arwrk);
					$emptywrk = TRUE;
					for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
						$selwrk = (strval($UsersRegistered->UserLevelID->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
			$sSqlWrk = "SELECT `UserLevelID`, `UserLevelName`, '' AS Disp2Fld FROM `userlevels`";
			$sWhereWrk = "`UserLevelID` IN (3,4,5)";
			//$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$sSqlWrk = TEAencrypt($sSqlWrk, EW_RANDOM_KEY);
			?>
			<input type="hidden" name="s_x_UserLevelID" id="s_x_UserLevelID" value="<?php echo $sSqlWrk; ?>">
			<input type="hidden" name="lft_x_UserLevelID" id="lft_x_UserLevelID" value="">
			
		</td>
	</tr>
	
</table>
</form>
</div>

<?php } ?>
<?php } ?>
<?php $UsersRegistered_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($UsersRegistered->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($UsersRegistered->CurrentAction <> "gridadd" && $UsersRegistered->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($UsersRegistered_list->Pager)) $UsersRegistered_list->Pager = new cNumericPager($UsersRegistered_list->lStartRec, $UsersRegistered_list->lDisplayRecs, $UsersRegistered_list->lTotalRecs, $UsersRegistered_list->lRecRange) ?>
<?php if ($UsersRegistered_list->Pager->RecordCount > 0) { ?>
	<?php if ($UsersRegistered_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $UsersRegistered_list->PageUrl() ?>start=<?php echo $UsersRegistered_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersRegistered_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $UsersRegistered_list->PageUrl() ?>start=<?php echo $UsersRegistered_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($UsersRegistered_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $UsersRegistered_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($UsersRegistered_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $UsersRegistered_list->PageUrl() ?>start=<?php echo $UsersRegistered_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersRegistered_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $UsersRegistered_list->PageUrl() ?>start=<?php echo $UsersRegistered_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersRegistered_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $UsersRegistered_list->Pager->FromIndex ?> đến <?php echo $UsersRegistered_list->Pager->ToIndex ?> của <?php echo $UsersRegistered_list->Pager->RecordCount ?> Bản ghi
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($UsersRegistered_list->sSrchWhere == "0=101") { ?>
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
<?php if ($UsersRegistered_list->lTotalRecs > 0) { ?>
<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số bản ghi hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="UsersRegistered">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($UsersRegistered_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($UsersRegistered_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($UsersRegistered_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($UsersRegistered->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $UsersRegistered->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($UsersRegistered_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fUsersRegisteredlist)) alert('Không có bản ghi được chọn'); else if (ew_Confirm('<?php echo $UsersRegistered_list->sDeleteConfirmMsg ?>')) {document.fUsersRegisteredlist.action='UsersRegistereddelete.php';document.fUsersRegisteredlist.encoding='application/x-www-form-urlencoded';document.fUsersRegisteredlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fUsersRegisteredlist)) alert('Không có bản ghi được chọn'); else {document.fUsersRegisteredlist.action='UsersRegisteredupdate.php';document.fUsersRegisteredlist.encoding='application/x-www-form-urlencoded';document.fUsersRegisteredlist.submit();};return false;"><img border="0" src="images/cmd_kh.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="fUsersRegisteredlist" id="fUsersRegisteredlist" class="ewForm" action="" method="post">
<?php if ($UsersRegistered_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$UsersRegistered_list->lOptionCnt = 0;
if ($Security->CanView()) {
	$UsersRegistered_list->lOptionCnt++; // view
}
if ($Security->CanEdit()) {
	$UsersRegistered_list->lOptionCnt++; // edit
}
if ($Security->CanDelete()) {
	$UsersRegistered_list->lOptionCnt++; // Multi-select
}
	$UsersRegistered_list->lOptionCnt += count($UsersRegistered_list->ListOptions->Items); // Custom list options
?>
<?php echo $UsersRegistered->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($UsersRegistered->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="UsersRegistered_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($UsersRegistered_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($UsersRegistered->nguoidung_option->Visible) { // nguoidung_option ?>
	<?php if ($UsersRegistered->SortUrl($UsersRegistered->nguoidung_option) == "") { ?>
		<td>Loại người dùng</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $UsersRegistered->SortUrl($UsersRegistered->nguoidung_option) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Loại người dùng</td><td style="width: 10px;"><?php if ($UsersRegistered->nguoidung_option->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($UsersRegistered->nguoidung_option->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($UsersRegistered->tendangnhap->Visible) { // tendangnhap ?>
	<?php if ($UsersRegistered->SortUrl($UsersRegistered->tendangnhap) == "") { ?>
		<td>Tên đăng nhập</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $UsersRegistered->SortUrl($UsersRegistered->tendangnhap) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tên đăng nhập</td><td style="width: 10px;"><?php if ($UsersRegistered->tendangnhap->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($UsersRegistered->tendangnhap->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($UsersRegistered->ten_congty->Visible) { // ten_congty ?>
	<?php if ($UsersRegistered->SortUrl($UsersRegistered->ten_congty) == "") { ?>
		<td>Tên công ty</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $UsersRegistered->SortUrl($UsersRegistered->ten_congty) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Đơn vị</td><td style="width: 10px;"><?php if ($UsersRegistered->ten_congty->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($UsersRegistered->ten_congty->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		

<?php if ($UsersRegistered->kieu_giaodien->Visible) { // kieu_giaodien ?>
	<?php if ($UsersRegistered->SortUrl($UsersRegistered->kieu_giaodien) == "") { ?>
		<td>Kiểu giao diện</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $UsersRegistered->SortUrl($UsersRegistered->kieu_giaodien) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Giao diện</td><td style="width: 10px;"><?php if ($UsersRegistered->kieu_giaodien->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($UsersRegistered->kieu_giaodien->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($UsersRegistered->UserLevelID->Visible) { // UserLevelID ?>
	<?php if ($UsersRegistered->SortUrl($UsersRegistered->UserLevelID) == "") { ?>
		<td>Cấp bậc</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $UsersRegistered->SortUrl($UsersRegistered->UserLevelID) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Cấp bậc</td><td style="width: 10px;"><?php if ($UsersRegistered->UserLevelID->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($UsersRegistered->UserLevelID->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>	
<?php if ($UsersRegistered->xacthuc_boisan->Visible) { // xacthuc_boisan ?>
	<?php if ($UsersRegistered->SortUrl($UsersRegistered->xacthuc_boisan) == "") { ?>
		<td style="white-space: nowrap;">Xác thực</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $UsersRegistered->SortUrl($UsersRegistered->xacthuc_boisan) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Xác thực</td><td style="width: 10px;"><?php if ($UsersRegistered->xacthuc_boisan->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($UsersRegistered->xacthuc_boisan->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($UsersRegistered->thanhvien_tieubieu->Visible) { // thanhvien_tieubieu ?>
	<?php if ($UsersRegistered->SortUrl($UsersRegistered->thanhvien_tieubieu) == "") { ?>
		<td style="white-space: nowrap;">TV Tiêu biểu</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $UsersRegistered->SortUrl($UsersRegistered->thanhvien_tieubieu) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>TV Tiêu biểu</td><td style="width: 10px;"><?php if ($UsersRegistered->thanhvien_tieubieu->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($UsersRegistered->thanhvien_tieubieu->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>	


<?php if ($UsersRegistered->truycap_gannhat->Visible) { // truycap_gannhat ?>
	<?php if ($UsersRegistered->SortUrl($UsersRegistered->truycap_gannhat) == "") { ?>
		<td style="white-space: nowrap;">Truy cập gần nhất</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $UsersRegistered->SortUrl($UsersRegistered->truycap_gannhat) ?>',1);" style="white-space: nowrap;">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Truy cập gần nhất</td><td style="width: 10px;"><?php if ($UsersRegistered->truycap_gannhat->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($UsersRegistered->truycap_gannhat->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>	
	</tr>
</thead>
<?php
if ($UsersRegistered->ExportAll && $UsersRegistered->Export <> "") {
	$UsersRegistered_list->lStopRec = $UsersRegistered_list->lTotalRecs;
} else {
	$UsersRegistered_list->lStopRec = $UsersRegistered_list->lStartRec + $UsersRegistered_list->lDisplayRecs - 1; // Set the last record to display
}
$UsersRegistered_list->lRecCount = $UsersRegistered_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$UsersRegistered->SelectLimit && $UsersRegistered_list->lStartRec > 1)
		$rs->Move($UsersRegistered_list->lStartRec - 1);
}
$UsersRegistered_list->lRowCnt = 0;
while (($UsersRegistered->CurrentAction == "gridadd" || !$rs->EOF) &&
	$UsersRegistered_list->lRecCount < $UsersRegistered_list->lStopRec) {
	$UsersRegistered_list->lRecCount++;
	if (intval($UsersRegistered_list->lRecCount) >= intval($UsersRegistered_list->lStartRec)) {
		$UsersRegistered_list->lRowCnt++;

	// Init row class and style
	$UsersRegistered->CssClass = "";
	$UsersRegistered->CssStyle = "";
	$UsersRegistered->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($UsersRegistered->CurrentAction == "gridadd") {
		$UsersRegistered_list->LoadDefaultValues(); // Load default values
	} else {
		$UsersRegistered_list->LoadRowValues($rs); // Load row values
	}
	$UsersRegistered->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$UsersRegistered_list->RenderRow();
?>
	<tr<?php echo $UsersRegistered->RowAttributes() ?>>
<?php if ($UsersRegistered->Export == "") { ?>
<?php if ($Security->CanView()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $UsersRegistered->ViewUrl() ?>">Xem</a>
</span></td>
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($UsersRegistered->nguoidung_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($UsersRegistered_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($UsersRegistered->nguoidung_option->Visible) { // nguoidung_option ?>
		<td<?php echo $UsersRegistered->nguoidung_option->CellAttributes() ?>>
<div<?php echo $UsersRegistered->nguoidung_option->ViewAttributes() ?>><?php echo $UsersRegistered->nguoidung_option->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($UsersRegistered->tendangnhap->Visible) { // tendangnhap ?>
		<td<?php echo $UsersRegistered->tendangnhap->CellAttributes() ?>>
<div<?php echo $UsersRegistered->tendangnhap->ViewAttributes() ?>><?php echo $UsersRegistered->tendangnhap->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($UsersRegistered->ten_congty->Visible) { // ten_congty ?>
		<td<?php echo $UsersRegistered->ten_congty->CellAttributes() ?>>
<div<?php echo $UsersRegistered->ten_congty->ViewAttributes() ?>><?php echo $UsersRegistered->ten_congty->ListViewValue() ?></div>
</td>
	<?php } ?>
	
	<?php if ($UsersRegistered->kieu_giaodien->Visible) { // kieu_giaodien ?>
		<td<?php echo $UsersRegistered->kieu_giaodien->CellAttributes() ?>>
<div<?php echo $UsersRegistered->kieu_giaodien->ViewAttributes() ?>><?php echo $UsersRegistered->kieu_giaodien->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($UsersRegistered->UserLevelID->Visible) { // UserLevelID ?>
		<td<?php echo $UsersRegistered->UserLevelID->CellAttributes() ?>>
 <div<?php echo $UsersRegistered->UserLevelID->ViewAttributes() ?>><?php
    if ($UsersRegistered->UserLevelID->ListViewValue() =="Thành viên chưa kích hoạt"){
       echo "<font color=\"#FF0000\">". $UsersRegistered->UserLevelID->ListViewValue() ."</font>";
    }else{
       echo $UsersRegistered->UserLevelID->ListViewValue();
    }?>
</div>
                    
</td>
	<?php } ?>
	<?php if ($UsersRegistered->xacthuc_boisan->Visible) { // xacthuc_boisan ?>
		<td<?php echo $UsersRegistered->xacthuc_boisan->CellAttributes() ?>>
<div<?php echo $UsersRegistered->xacthuc_boisan->ViewAttributes() ?>><?php echo $UsersRegistered->xacthuc_boisan->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php if ($UsersRegistered->thanhvien_tieubieu->Visible) { // thanhvien_tieubieu ?>
		<td<?php echo $UsersRegistered->thanhvien_tieubieu->CellAttributes() ?>>
<div<?php echo $UsersRegistered->thanhvien_tieubieu->ViewAttributes() ?>><?php echo $UsersRegistered->thanhvien_tieubieu->ListViewValue() ?></div>
</td>
	<?php } ?>

	<?php if ($UsersRegistered->truycap_gannhat->Visible) { // truycap_gannhat ?>
		<td<?php echo $UsersRegistered->truycap_gannhat->CellAttributes() ?>>
<div<?php echo $UsersRegistered->truycap_gannhat->ViewAttributes() ?>><?php echo $UsersRegistered->truycap_gannhat->ListViewValue() ?></div>
</td>
	<?php } ?>	
	</tr>
<?php
	}
	if ($UsersRegistered->CurrentAction <> "gridadd")
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
<?php if ($UsersRegistered_list->lTotalRecs > 0) { ?>
<?php if ($UsersRegistered->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($UsersRegistered->CurrentAction <> "gridadd" && $UsersRegistered->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($UsersRegistered_list->Pager)) $UsersRegistered_list->Pager = new cNumericPager($UsersRegistered_list->lStartRec, $UsersRegistered_list->lDisplayRecs, $UsersRegistered_list->lTotalRecs, $UsersRegistered_list->lRecRange) ?>
<?php if ($UsersRegistered_list->Pager->RecordCount > 0) { ?>
	<?php if ($UsersRegistered_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $UsersRegistered_list->PageUrl() ?>start=<?php echo $UsersRegistered_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersRegistered_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $UsersRegistered_list->PageUrl() ?>start=<?php echo $UsersRegistered_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($UsersRegistered_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $UsersRegistered_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($UsersRegistered_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $UsersRegistered_list->PageUrl() ?>start=<?php echo $UsersRegistered_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersRegistered_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $UsersRegistered_list->PageUrl() ?>start=<?php echo $UsersRegistered_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($UsersRegistered_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Bản ghi <?php echo $UsersRegistered_list->Pager->FromIndex ?> đến <?php echo $UsersRegistered_list->Pager->ToIndex ?> của <?php echo $UsersRegistered_list->Pager->RecordCount ?> Bản ghi
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($UsersRegistered_list->sSrchWhere == "0=101") { ?>
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
<?php if ($UsersRegistered_list->lTotalRecs > 0) { ?>
<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số bản ghi hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="UsersRegistered">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($UsersRegistered_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($UsersRegistered_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($UsersRegistered_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($UsersRegistered->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($UsersRegistered_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $UsersRegistered->AddUrl() ?>"><img border="0" src="images/cmd_them.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($UsersRegistered_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fUsersRegisteredlist)) alert('Không có bản ghi được chọn'); else if (ew_Confirm('<?php echo $UsersRegistered_list->sDeleteConfirmMsg ?>')) {document.fUsersRegisteredlist.action='UsersRegistereddelete.php';document.fUsersRegisteredlist.encoding='application/x-www-form-urlencoded';document.fUsersRegisteredlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php if ($Security->CanActive()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.fUsersRegisteredlist)) alert('Không có bản ghi được chọn'); else {document.fUsersRegisteredlist.action='UsersRegisteredupdate.php';document.fUsersRegisteredlist.encoding='application/x-www-form-urlencoded';document.fUsersRegisteredlist.submit();};return false;"><img border="0" src="images/cmd_kh.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($UsersRegistered->Export == "" && $UsersRegistered->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(UsersRegistered_list); // uncomment to init search panel as collapsed
//-->

</script>
<script language="JavaScript" type="text/javascript">
<!--
ew_UpdateOpts([['x_UserLevelID','x_UserLevelID',false]]);

//-->
</script>
<?php } ?>
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
class cUsersRegistered_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'UsersRegistered';

	// Page Object Name
	var $PageObjName = 'UsersRegistered_list';

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
        // Export URLs
	var $ExportPrintUrl;
	var $ExportHtmlUrl;
	var $ExportExcelUrl;
	var $ExportWordUrl;
	var $ExportXmlUrl;
	var $ExportCsvUrl;

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
	function cUsersRegistered_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["UsersRegistered"] = new cUsersRegistered();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

                // Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'UsersRegistered', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
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
		if (!$Security->CanList()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("login.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
	$UsersRegistered->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $UsersRegistered->Export; // Get export parameter, used in header
	$gsExportFile = $UsersRegistered->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $UsersRegistered;
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
		if ($UsersRegistered->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $UsersRegistered->getRecordsPerPage(); // Restore from Session
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
		$UsersRegistered->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$UsersRegistered->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$UsersRegistered->setStartRecordNumber($this->lStartRec);
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
		$UsersRegistered->setSessionWhere($sFilter);
		$UsersRegistered->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $UsersRegistered;
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
			$UsersRegistered->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$UsersRegistered->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $UsersRegistered;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $UsersRegistered->nguoidung_id, FALSE); // Field nguoidung_id
		$this->BuildSearchSql($sWhere, $UsersRegistered->nguoidung_option, FALSE); // Field nguoidung_option
		$this->BuildSearchSql($sWhere, $UsersRegistered->tendangnhap, FALSE); // Field tendangnhap
		$this->BuildSearchSql($sWhere, $UsersRegistered->quocgia_id, FALSE); // Field quocgia_id
		$this->BuildSearchSql($sWhere, $UsersRegistered->gioi_tinh, FALSE); // Field gioi_tinh
		$this->BuildSearchSql($sWhere, $UsersRegistered->hoten_nguoilienhe, FALSE); // Field hoten_nguoilienhe
		$this->BuildSearchSql($sWhere, $UsersRegistered->mat_khau, FALSE); // Field mat_khau
		$this->BuildSearchSql($sWhere, $UsersRegistered->ten_congty, FALSE); // Field ten_congty
		$this->BuildSearchSql($sWhere, $UsersRegistered->ten_viettat, FALSE); // Field ten_viettat
		$this->BuildSearchSql($sWhere, $UsersRegistered->website, FALSE); // Field website
		$this->BuildSearchSql($sWhere, $UsersRegistered->chuc_nang, FALSE); // Field chuc_nang
		$this->BuildSearchSql($sWhere, $UsersRegistered->loaikinhdoanh_id, FALSE); // Field loaikinhdoanh_id
		$this->BuildSearchSql($sWhere, $UsersRegistered->loaicongty_id, FALSE); // Field loaicongty_id
		$this->BuildSearchSql($sWhere, $UsersRegistered->so_congnhan, FALSE); // Field so_congnhan
		$this->BuildSearchSql($sWhere, $UsersRegistered->nam_thanhlap, FALSE); // Field nam_thanhlap
		$this->BuildSearchSql($sWhere, $UsersRegistered->kim_ngach, FALSE); // Field kim_ngach
		$this->BuildSearchSql($sWhere, $UsersRegistered->cung_cap, FALSE); // Field cung_cap
		$this->BuildSearchSql($sWhere, $UsersRegistered->chung_chi, FALSE); // Field chung_chi
		$this->BuildSearchSql($sWhere, $UsersRegistered->so_dkkd, FALSE); // Field so_dkkd
		$this->BuildSearchSql($sWhere, $UsersRegistered->ngay_thamgia, FALSE); // Field ngay_thamgia
		$this->BuildSearchSql($sWhere, $UsersRegistered->so_dienthoai, FALSE); // Field so_dienthoai
		$this->BuildSearchSql($sWhere, $UsersRegistered->so_fax, FALSE); // Field so_fax
		$this->BuildSearchSql($sWhere, $UsersRegistered->dia_chi, FALSE); // Field dia_chi
		$this->BuildSearchSql($sWhere, $UsersRegistered->tinh_thanh, FALSE); // Field tinh_thanh
		$this->BuildSearchSql($sWhere, $UsersRegistered->quan_huyen, FALSE); // Field quan_huyen
		$this->BuildSearchSql($sWhere, $UsersRegistered->gioi_thieu, FALSE); // Field gioi_thieu
		$this->BuildSearchSql($sWhere, $UsersRegistered->nick_yahoo, FALSE); // Field nick_yahoo
		$this->BuildSearchSql($sWhere, $UsersRegistered->nick_skype, FALSE); // Field nick_skype
		$this->BuildSearchSql($sWhere, $UsersRegistered->truycap_gannhat, FALSE); // Field truycap_gannhat
		$this->BuildSearchSql($sWhere, $UsersRegistered->kieu_giaodien, FALSE); // Field kieu_giaodien
		$this->BuildSearchSql($sWhere, $UsersRegistered->UserLevelID, FALSE); // Field UserLevelID
		$this->BuildSearchSql($sWhere, $UsersRegistered->nganhnghe_lienquan, TRUE); // Field nganhnghe_lienquan
		$this->BuildSearchSql($sWhere, $UsersRegistered->thitruong_lienquan, TRUE); // Field thitruong_lienquan

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($UsersRegistered->nguoidung_id); // Field nguoidung_id
			$this->SetSearchParm($UsersRegistered->nguoidung_option); // Field nguoidung_option
			$this->SetSearchParm($UsersRegistered->tendangnhap); // Field tendangnhap
			$this->SetSearchParm($UsersRegistered->quocgia_id); // Field quocgia_id
			$this->SetSearchParm($UsersRegistered->gioi_tinh); // Field gioi_tinh
			$this->SetSearchParm($UsersRegistered->hoten_nguoilienhe); // Field hoten_nguoilienhe
			$this->SetSearchParm($UsersRegistered->mat_khau); // Field mat_khau
			$this->SetSearchParm($UsersRegistered->ten_congty); // Field ten_congty
			$this->SetSearchParm($UsersRegistered->ten_viettat); // Field ten_viettat
			$this->SetSearchParm($UsersRegistered->website); // Field website
			$this->SetSearchParm($UsersRegistered->chuc_nang); // Field chuc_nang
			$this->SetSearchParm($UsersRegistered->loaikinhdoanh_id); // Field loaikinhdoanh_id
			$this->SetSearchParm($UsersRegistered->loaicongty_id); // Field loaicongty_id
			$this->SetSearchParm($UsersRegistered->so_congnhan); // Field so_congnhan
			$this->SetSearchParm($UsersRegistered->nam_thanhlap); // Field nam_thanhlap
			$this->SetSearchParm($UsersRegistered->kim_ngach); // Field kim_ngach
			$this->SetSearchParm($UsersRegistered->cung_cap); // Field cung_cap
			$this->SetSearchParm($UsersRegistered->chung_chi); // Field chung_chi
			$this->SetSearchParm($UsersRegistered->so_dkkd); // Field so_dkkd
			$this->SetSearchParm($UsersRegistered->ngay_thamgia); // Field ngay_thamgia
			$this->SetSearchParm($UsersRegistered->so_dienthoai); // Field so_dienthoai
			$this->SetSearchParm($UsersRegistered->so_fax); // Field so_fax
			$this->SetSearchParm($UsersRegistered->dia_chi); // Field dia_chi
			$this->SetSearchParm($UsersRegistered->tinh_thanh); // Field tinh_thanh
			$this->SetSearchParm($UsersRegistered->quan_huyen); // Field quan_huyen
			$this->SetSearchParm($UsersRegistered->gioi_thieu); // Field gioi_thieu
			$this->SetSearchParm($UsersRegistered->nick_yahoo); // Field nick_yahoo
			$this->SetSearchParm($UsersRegistered->nick_skype); // Field nick_skype
			$this->SetSearchParm($UsersRegistered->truycap_gannhat); // Field truycap_gannhat
			$this->SetSearchParm($UsersRegistered->kieu_giaodien); // Field kieu_giaodien
			$this->SetSearchParm($UsersRegistered->UserLevelID); // Field UserLevelID
			$this->SetSearchParm($UsersRegistered->nganhnghe_lienquan); // Field nganhnghe_lienquan
			$this->SetSearchParm($UsersRegistered->thitruong_lienquan); // Field thitruong_lienquan
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
		global $UsersRegistered;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$UsersRegistered->setAdvancedSearch("x_$FldParm", $FldVal);
		$UsersRegistered->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$UsersRegistered->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$UsersRegistered->setAdvancedSearch("y_$FldParm", $FldVal2);
		$UsersRegistered->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $UsersRegistered;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $UsersRegistered->tendangnhap->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersRegistered->hoten_nguoilienhe->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersRegistered->mat_khau->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersRegistered->ten_congty->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersRegistered->ten_viettat->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersRegistered->website->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersRegistered->cung_cap->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersRegistered->chung_chi->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersRegistered->so_dkkd->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersRegistered->so_dienthoai->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersRegistered->so_fax->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersRegistered->dia_chi->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersRegistered->tinh_thanh->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersRegistered->quan_huyen->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersRegistered->gioi_thieu->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersRegistered->nick_yahoo->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersRegistered->nick_skype->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersRegistered->nganhnghe_lienquan->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $UsersRegistered->thitruong_lienquan->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $UsersRegistered;
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
			$UsersRegistered->setBasicSearchKeyword($sSearchKeyword);
			$UsersRegistered->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $UsersRegistered;
		$this->sSrchWhere = "";
		$UsersRegistered->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $UsersRegistered;
		$UsersRegistered->setBasicSearchKeyword("");
		$UsersRegistered->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $UsersRegistered;
		$UsersRegistered->setAdvancedSearch("x_nguoidung_id", "");
		$UsersRegistered->setAdvancedSearch("x_nguoidung_option", "");
		$UsersRegistered->setAdvancedSearch("x_tendangnhap", "");
		$UsersRegistered->setAdvancedSearch("x_quocgia_id", "");
		$UsersRegistered->setAdvancedSearch("x_gioi_tinh", "");
		$UsersRegistered->setAdvancedSearch("x_hoten_nguoilienhe", "");
		$UsersRegistered->setAdvancedSearch("x_mat_khau", "");
		$UsersRegistered->setAdvancedSearch("x_ten_congty", "");
		$UsersRegistered->setAdvancedSearch("x_ten_viettat", "");
		$UsersRegistered->setAdvancedSearch("x_website", "");
		$UsersRegistered->setAdvancedSearch("x_chuc_nang", "");
		$UsersRegistered->setAdvancedSearch("x_loaikinhdoanh_id", "");
		$UsersRegistered->setAdvancedSearch("x_loaicongty_id", "");
		$UsersRegistered->setAdvancedSearch("x_so_congnhan", "");
		$UsersRegistered->setAdvancedSearch("x_nam_thanhlap", "");
		$UsersRegistered->setAdvancedSearch("x_kim_ngach", "");
		$UsersRegistered->setAdvancedSearch("x_cung_cap", "");
		$UsersRegistered->setAdvancedSearch("x_chung_chi", "");
		$UsersRegistered->setAdvancedSearch("x_so_dkkd", "");
		$UsersRegistered->setAdvancedSearch("x_ngay_thamgia", "");
		$UsersRegistered->setAdvancedSearch("y_ngay_thamgia", "");
		$UsersRegistered->setAdvancedSearch("x_so_dienthoai", "");
		$UsersRegistered->setAdvancedSearch("x_so_fax", "");
		$UsersRegistered->setAdvancedSearch("x_dia_chi", "");
		$UsersRegistered->setAdvancedSearch("x_tinh_thanh", "");
		$UsersRegistered->setAdvancedSearch("x_quan_huyen", "");
		$UsersRegistered->setAdvancedSearch("x_gioi_thieu", "");
		$UsersRegistered->setAdvancedSearch("x_nick_yahoo", "");
		$UsersRegistered->setAdvancedSearch("x_nick_skype", "");
		$UsersRegistered->setAdvancedSearch("x_truycap_gannhat", "");
		$UsersRegistered->setAdvancedSearch("y_truycap_gannhat", "");
		$UsersRegistered->setAdvancedSearch("x_kieu_giaodien", "");
		$UsersRegistered->setAdvancedSearch("x_UserLevelID", "");
		$UsersRegistered->setAdvancedSearch("x_nganhnghe_lienquan", "");
		$UsersRegistered->setAdvancedSearch("x_thitruong_lienquan", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $UsersRegistered;
		$this->sSrchWhere = $UsersRegistered->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $UsersRegistered;
		 $UsersRegistered->nguoidung_id->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_nguoidung_id");
		 $UsersRegistered->nguoidung_option->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_nguoidung_option");
		 $UsersRegistered->tendangnhap->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_tendangnhap");
		 $UsersRegistered->quocgia_id->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_quocgia_id");
		 $UsersRegistered->gioi_tinh->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_gioi_tinh");
		 $UsersRegistered->hoten_nguoilienhe->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_hoten_nguoilienhe");
		 $UsersRegistered->mat_khau->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_mat_khau");
		 $UsersRegistered->ten_congty->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_ten_congty");
		 $UsersRegistered->ten_viettat->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_ten_viettat");
		 $UsersRegistered->website->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_website");
		 $UsersRegistered->chuc_nang->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_chuc_nang");
		 $UsersRegistered->loaikinhdoanh_id->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_loaikinhdoanh_id");
		 $UsersRegistered->loaicongty_id->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_loaicongty_id");
		 $UsersRegistered->so_congnhan->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_so_congnhan");
		 $UsersRegistered->nam_thanhlap->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_nam_thanhlap");
		 $UsersRegistered->kim_ngach->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_kim_ngach");
		 $UsersRegistered->cung_cap->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_cung_cap");
		 $UsersRegistered->chung_chi->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_chung_chi");
		 $UsersRegistered->so_dkkd->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_so_dkkd");
		 $UsersRegistered->ngay_thamgia->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_ngay_thamgia");
		 $UsersRegistered->ngay_thamgia->AdvancedSearch->SearchValue2 = $UsersRegistered->getAdvancedSearch("y_ngay_thamgia");
		 $UsersRegistered->so_dienthoai->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_so_dienthoai");
		 $UsersRegistered->so_fax->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_so_fax");
		 $UsersRegistered->dia_chi->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_dia_chi");
		 $UsersRegistered->tinh_thanh->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_tinh_thanh");
		 $UsersRegistered->quan_huyen->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_quan_huyen");
		 $UsersRegistered->gioi_thieu->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_gioi_thieu");
		 $UsersRegistered->nick_yahoo->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_nick_yahoo");
		 $UsersRegistered->nick_skype->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_nick_skype");
		 $UsersRegistered->truycap_gannhat->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_truycap_gannhat");
		 $UsersRegistered->truycap_gannhat->AdvancedSearch->SearchValue2 = $UsersRegistered->getAdvancedSearch("y_truycap_gannhat");
		 $UsersRegistered->kieu_giaodien->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_kieu_giaodien");
		 $UsersRegistered->UserLevelID->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_UserLevelID");
		 $UsersRegistered->nganhnghe_lienquan->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_nganhnghe_lienquan");
		 $UsersRegistered->thitruong_lienquan->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_thitruong_lienquan");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $UsersRegistered;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$UsersRegistered->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$UsersRegistered->CurrentOrderType = @$_GET["ordertype"];
			$UsersRegistered->UpdateSort($UsersRegistered->nguoidung_option); // Field 
			$UsersRegistered->UpdateSort($UsersRegistered->tendangnhap); // Field 
			$UsersRegistered->UpdateSort($UsersRegistered->quocgia_id); // Field 
			$UsersRegistered->UpdateSort($UsersRegistered->ten_congty); // Field 
			$UsersRegistered->UpdateSort($UsersRegistered->ngay_thamgia); // Field 
			$UsersRegistered->UpdateSort($UsersRegistered->truycap_gannhat); // Field 
			$UsersRegistered->UpdateSort($UsersRegistered->kieu_giaodien); // Field 
			$UsersRegistered->UpdateSort($UsersRegistered->UserLevelID); // Field 
			$UsersRegistered->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $UsersRegistered;
		$sOrderBy = $UsersRegistered->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($UsersRegistered->SqlOrderBy() <> "") {
				$sOrderBy = $UsersRegistered->SqlOrderBy();
				$UsersRegistered->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $UsersRegistered;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$UsersRegistered->setSessionOrderBy($sOrderBy);
				$UsersRegistered->nguoidung_option->setSort("");
				$UsersRegistered->tendangnhap->setSort("");
				$UsersRegistered->quocgia_id->setSort("");
				$UsersRegistered->ten_congty->setSort("");
				$UsersRegistered->ngay_thamgia->setSort("");
				$UsersRegistered->truycap_gannhat->setSort("");
				$UsersRegistered->kieu_giaodien->setSort("");
				$UsersRegistered->UserLevelID->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$UsersRegistered->setStartRecordNumber($this->lStartRec);
		}
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

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $UsersRegistered;

		// Load search values
		// nguoidung_id

		$UsersRegistered->nguoidung_id->AdvancedSearch->SearchValue = @$_GET["x_nguoidung_id"];
		$UsersRegistered->nguoidung_id->AdvancedSearch->SearchOperator = @$_GET["z_nguoidung_id"];

		// nguoidung_option
		$UsersRegistered->nguoidung_option->AdvancedSearch->SearchValue = @$_GET["x_nguoidung_option"];
		$UsersRegistered->nguoidung_option->AdvancedSearch->SearchOperator = @$_GET["z_nguoidung_option"];

		// tendangnhap
		$UsersRegistered->tendangnhap->AdvancedSearch->SearchValue = @$_GET["x_tendangnhap"];
		$UsersRegistered->tendangnhap->AdvancedSearch->SearchOperator = @$_GET["z_tendangnhap"];

		// quocgia_id
		$UsersRegistered->quocgia_id->AdvancedSearch->SearchValue = @$_GET["x_quocgia_id"];
		$UsersRegistered->quocgia_id->AdvancedSearch->SearchOperator = @$_GET["z_quocgia_id"];

		// gioi_tinh
		$UsersRegistered->gioi_tinh->AdvancedSearch->SearchValue = @$_GET["x_gioi_tinh"];
		$UsersRegistered->gioi_tinh->AdvancedSearch->SearchOperator = @$_GET["z_gioi_tinh"];

		// hoten_nguoilienhe
		$UsersRegistered->hoten_nguoilienhe->AdvancedSearch->SearchValue = @$_GET["x_hoten_nguoilienhe"];
		$UsersRegistered->hoten_nguoilienhe->AdvancedSearch->SearchOperator = @$_GET["z_hoten_nguoilienhe"];

		// mat_khau
		$UsersRegistered->mat_khau->AdvancedSearch->SearchValue = @$_GET["x_mat_khau"];
		$UsersRegistered->mat_khau->AdvancedSearch->SearchOperator = @$_GET["z_mat_khau"];

		// ten_congty
		$UsersRegistered->ten_congty->AdvancedSearch->SearchValue = @$_GET["x_ten_congty"];
		$UsersRegistered->ten_congty->AdvancedSearch->SearchOperator = @$_GET["z_ten_congty"];

		// ten_viettat
		$UsersRegistered->ten_viettat->AdvancedSearch->SearchValue = @$_GET["x_ten_viettat"];
		$UsersRegistered->ten_viettat->AdvancedSearch->SearchOperator = @$_GET["z_ten_viettat"];

		// website
		$UsersRegistered->website->AdvancedSearch->SearchValue = @$_GET["x_website"];
		$UsersRegistered->website->AdvancedSearch->SearchOperator = @$_GET["z_website"];

		// chuc_nang
		$UsersRegistered->chuc_nang->AdvancedSearch->SearchValue = @$_GET["x_chuc_nang"];
		$UsersRegistered->chuc_nang->AdvancedSearch->SearchOperator = @$_GET["z_chuc_nang"];

		// loaikinhdoanh_id
		$UsersRegistered->loaikinhdoanh_id->AdvancedSearch->SearchValue = @$_GET["x_loaikinhdoanh_id"];
		$UsersRegistered->loaikinhdoanh_id->AdvancedSearch->SearchOperator = @$_GET["z_loaikinhdoanh_id"];

		// loaicongty_id
		$UsersRegistered->loaicongty_id->AdvancedSearch->SearchValue = @$_GET["x_loaicongty_id"];
		$UsersRegistered->loaicongty_id->AdvancedSearch->SearchOperator = @$_GET["z_loaicongty_id"];

		// so_congnhan
		$UsersRegistered->so_congnhan->AdvancedSearch->SearchValue = @$_GET["x_so_congnhan"];
		$UsersRegistered->so_congnhan->AdvancedSearch->SearchOperator = @$_GET["z_so_congnhan"];

		// nam_thanhlap
		$UsersRegistered->nam_thanhlap->AdvancedSearch->SearchValue = @$_GET["x_nam_thanhlap"];
		$UsersRegistered->nam_thanhlap->AdvancedSearch->SearchOperator = @$_GET["z_nam_thanhlap"];

		// kim_ngach
		$UsersRegistered->kim_ngach->AdvancedSearch->SearchValue = @$_GET["x_kim_ngach"];
		$UsersRegistered->kim_ngach->AdvancedSearch->SearchOperator = @$_GET["z_kim_ngach"];

		// cung_cap
		$UsersRegistered->cung_cap->AdvancedSearch->SearchValue = @$_GET["x_cung_cap"];
		$UsersRegistered->cung_cap->AdvancedSearch->SearchOperator = @$_GET["z_cung_cap"];

		// chung_chi
		$UsersRegistered->chung_chi->AdvancedSearch->SearchValue = @$_GET["x_chung_chi"];
		$UsersRegistered->chung_chi->AdvancedSearch->SearchOperator = @$_GET["z_chung_chi"];

		// so_dkkd
		$UsersRegistered->so_dkkd->AdvancedSearch->SearchValue = @$_GET["x_so_dkkd"];
		$UsersRegistered->so_dkkd->AdvancedSearch->SearchOperator = @$_GET["z_so_dkkd"];

		// ngay_thamgia
		$UsersRegistered->ngay_thamgia->AdvancedSearch->SearchValue = @$_GET["x_ngay_thamgia"];
		$UsersRegistered->ngay_thamgia->AdvancedSearch->SearchOperator = @$_GET["z_ngay_thamgia"];
		$UsersRegistered->ngay_thamgia->AdvancedSearch->SearchCondition = @$_GET["v_ngay_thamgia"];
		$UsersRegistered->ngay_thamgia->AdvancedSearch->SearchValue2 = @$_GET["y_ngay_thamgia"];
		$UsersRegistered->ngay_thamgia->AdvancedSearch->SearchOperator2 = @$_GET["w_ngay_thamgia"];

		// so_dienthoai
		$UsersRegistered->so_dienthoai->AdvancedSearch->SearchValue = @$_GET["x_so_dienthoai"];
		$UsersRegistered->so_dienthoai->AdvancedSearch->SearchOperator = @$_GET["z_so_dienthoai"];

		// so_fax
		$UsersRegistered->so_fax->AdvancedSearch->SearchValue = @$_GET["x_so_fax"];
		$UsersRegistered->so_fax->AdvancedSearch->SearchOperator = @$_GET["z_so_fax"];

		// dia_chi
		$UsersRegistered->dia_chi->AdvancedSearch->SearchValue = @$_GET["x_dia_chi"];
		$UsersRegistered->dia_chi->AdvancedSearch->SearchOperator = @$_GET["z_dia_chi"];

		// tinh_thanh
		$UsersRegistered->tinh_thanh->AdvancedSearch->SearchValue = @$_GET["x_tinh_thanh"];
		$UsersRegistered->tinh_thanh->AdvancedSearch->SearchOperator = @$_GET["z_tinh_thanh"];

		// quan_huyen
		$UsersRegistered->quan_huyen->AdvancedSearch->SearchValue = @$_GET["x_quan_huyen"];
		$UsersRegistered->quan_huyen->AdvancedSearch->SearchOperator = @$_GET["z_quan_huyen"];

		// gioi_thieu
		$UsersRegistered->gioi_thieu->AdvancedSearch->SearchValue = @$_GET["x_gioi_thieu"];
		$UsersRegistered->gioi_thieu->AdvancedSearch->SearchOperator = @$_GET["z_gioi_thieu"];

		// nick_yahoo
		$UsersRegistered->nick_yahoo->AdvancedSearch->SearchValue = @$_GET["x_nick_yahoo"];
		$UsersRegistered->nick_yahoo->AdvancedSearch->SearchOperator = @$_GET["z_nick_yahoo"];

		// nick_skype
		$UsersRegistered->nick_skype->AdvancedSearch->SearchValue = @$_GET["x_nick_skype"];
		$UsersRegistered->nick_skype->AdvancedSearch->SearchOperator = @$_GET["z_nick_skype"];

		// truycap_gannhat
		$UsersRegistered->truycap_gannhat->AdvancedSearch->SearchValue = @$_GET["x_truycap_gannhat"];
		$UsersRegistered->truycap_gannhat->AdvancedSearch->SearchOperator = @$_GET["z_truycap_gannhat"];
		$UsersRegistered->truycap_gannhat->AdvancedSearch->SearchCondition = @$_GET["v_truycap_gannhat"];
		$UsersRegistered->truycap_gannhat->AdvancedSearch->SearchValue2 = @$_GET["y_truycap_gannhat"];
		$UsersRegistered->truycap_gannhat->AdvancedSearch->SearchOperator2 = @$_GET["w_truycap_gannhat"];

		// kieu_giaodien
		$UsersRegistered->kieu_giaodien->AdvancedSearch->SearchValue = @$_GET["x_kieu_giaodien"];
		$UsersRegistered->kieu_giaodien->AdvancedSearch->SearchOperator = @$_GET["z_kieu_giaodien"];

		// UserLevelID
		$UsersRegistered->UserLevelID->AdvancedSearch->SearchValue = @$_GET["x_UserLevelID"];
		$UsersRegistered->UserLevelID->AdvancedSearch->SearchOperator = @$_GET["z_UserLevelID"];

		// nganhnghe_lienquan
		$UsersRegistered->nganhnghe_lienquan->AdvancedSearch->SearchValue = @$_GET["x_nganhnghe_lienquan"];
		$UsersRegistered->nganhnghe_lienquan->AdvancedSearch->SearchOperator = @$_GET["z_nganhnghe_lienquan"];

		// thitruong_lienquan
		$UsersRegistered->thitruong_lienquan->AdvancedSearch->SearchValue = @$_GET["x_thitruong_lienquan"];
		$UsersRegistered->thitruong_lienquan->AdvancedSearch->SearchOperator = @$_GET["z_thitruong_lienquan"];
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
		$UsersRegistered->xacthuc_boisan->setDbValue($rs->fields('xacthuc_boisan'));
		$UsersRegistered->thanhvien_tieubieu->setDbValue($rs->fields('thanhvien_tieubieu'));
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

		// ten_congty
		$UsersRegistered->ten_congty->CellCssStyle = "";
		$UsersRegistered->ten_congty->CellCssClass = "";

		// ngay_thamgia
		$UsersRegistered->ngay_thamgia->CellCssStyle = "";
		$UsersRegistered->ngay_thamgia->CellCssClass = "";

		// truycap_gannhat
		$UsersRegistered->truycap_gannhat->CellCssStyle = "";
		$UsersRegistered->truycap_gannhat->CellCssClass = "";

		// kieu_giaodien
		$UsersRegistered->kieu_giaodien->CellCssStyle = "";
		$UsersRegistered->kieu_giaodien->CellCssClass = "";

		// UserLevelID
		$UsersRegistered->UserLevelID->CellCssStyle = "";
		$UsersRegistered->UserLevelID->CellCssClass = "";
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
			$UsersRegistered->quocgia_id->ViewValue = $UsersRegistered->quocgia_id->CurrentValue;
			$UsersRegistered->quocgia_id->CssStyle = "";
			$UsersRegistered->quocgia_id->CssClass = "";
			$UsersRegistered->quocgia_id->ViewCustomAttributes = "";

			// ten_congty
			$UsersRegistered->ten_congty->ViewValue = $UsersRegistered->ten_congty->CurrentValue;
			$UsersRegistered->ten_congty->CssStyle = "";
			$UsersRegistered->ten_congty->CssClass = "";
			$UsersRegistered->ten_congty->ViewCustomAttributes = "";

			// ngay_thamgia
			$UsersRegistered->ngay_thamgia->ViewValue = $UsersRegistered->ngay_thamgia->CurrentValue;
			$UsersRegistered->ngay_thamgia->ViewValue = ew_FormatDateTime($UsersRegistered->ngay_thamgia->ViewValue, 7);
			$UsersRegistered->ngay_thamgia->CssStyle = "";
			$UsersRegistered->ngay_thamgia->CssClass = "";
			$UsersRegistered->ngay_thamgia->ViewCustomAttributes = "";

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
						$UsersRegistered->kieu_giaodien->ViewValue = "Trang chủ ";
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
			// xacthuc_boisan
			if (strval($UsersRegistered->xacthuc_boisan->CurrentValue) <> "") {
				switch ($UsersRegistered->xacthuc_boisan->CurrentValue) {
					case "0":
						$UsersRegistered->xacthuc_boisan->ViewValue = "<font color=\"#FF0000\">Không xác thực </font>";
						break;
					case "1":
						$UsersRegistered->xacthuc_boisan->ViewValue = "Xác thực ";
						break;
					default:
						$UsersRegistered->xacthuc_boisan->ViewValue = $UsersRegistered->xacthuc_boisan->CurrentValue;
				}
			} else {
				$UsersRegistered->xacthuc_boisan->ViewValue = NULL;
			}
			$UsersRegistered->xacthuc_boisan->CssStyle = "";
			$UsersRegistered->xacthuc_boisan->CssClass = "";
			$UsersRegistered->xacthuc_boisan->ViewCustomAttributes = "";

			// thanhvien_tieubieu
			if (strval($UsersRegistered->thanhvien_tieubieu->CurrentValue) <> "") {
				switch ($UsersRegistered->thanhvien_tieubieu->CurrentValue) {
					case "0":
						$UsersRegistered->thanhvien_tieubieu->ViewValue = "<font color=\"#FF0000\">Thành viên không tiêu biểu</font>";
						break;
					case "1":
						$UsersRegistered->thanhvien_tieubieu->ViewValue = "Là thành viên tiêu biểu";
						break;
					default:
						$UsersRegistered->thanhvien_tieubieu->ViewValue = $UsersRegistered->thanhvien_tieubieu->CurrentValue;
				}
			} else {
				$UsersRegistered->thanhvien_tieubieu->ViewValue = NULL;
			}
			$UsersRegistered->thanhvien_tieubieu->CssStyle = "";
			$UsersRegistered->thanhvien_tieubieu->CssClass = "";
			$UsersRegistered->thanhvien_tieubieu->ViewCustomAttributes = "";

			// nguoidung_option
			$UsersRegistered->nguoidung_option->HrefValue = "";

			// tendangnhap
			$UsersRegistered->tendangnhap->HrefValue = "";

			// quocgia_id
			$UsersRegistered->quocgia_id->HrefValue = "";

			// ten_congty
			$UsersRegistered->ten_congty->HrefValue = "";

			// ngay_thamgia
			$UsersRegistered->ngay_thamgia->HrefValue = "";

			// truycap_gannhat
			$UsersRegistered->truycap_gannhat->HrefValue = "";

			// kieu_giaodien
			$UsersRegistered->kieu_giaodien->HrefValue = "";

			// UserLevelID
			$UsersRegistered->UserLevelID->HrefValue = "";
		} elseif ($UsersRegistered->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// nguoidung_option
			$UsersRegistered->nguoidung_option->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Quản lý hệ thống");
			$arwrk[] = array("1", "Thành viên đăng ký");
			//array_unshift($arwrk, array("", "Chọn"));
			$UsersRegistered->nguoidung_option->EditValue = $arwrk;

			// tendangnhap
			$UsersRegistered->tendangnhap->EditCustomAttributes = "";
			$UsersRegistered->tendangnhap->EditValue = ew_HtmlEncode($UsersRegistered->tendangnhap->AdvancedSearch->SearchValue);

			// quocgia_id
			$UsersRegistered->quocgia_id->EditCustomAttributes = "";
			$UsersRegistered->quocgia_id->EditValue = ew_HtmlEncode($UsersRegistered->quocgia_id->AdvancedSearch->SearchValue);

			// ten_congty
			$UsersRegistered->ten_congty->EditCustomAttributes = "";
			$UsersRegistered->ten_congty->EditValue = ew_HtmlEncode($UsersRegistered->ten_congty->AdvancedSearch->SearchValue);

			// ngay_thamgia
			$UsersRegistered->ngay_thamgia->EditCustomAttributes = "";
			$UsersRegistered->ngay_thamgia->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($UsersRegistered->ngay_thamgia->AdvancedSearch->SearchValue, 7), 7));
			$UsersRegistered->ngay_thamgia->EditCustomAttributes = "";
			$UsersRegistered->ngay_thamgia->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($UsersRegistered->ngay_thamgia->AdvancedSearch->SearchValue2, 7), 7));

			// truycap_gannhat
			$UsersRegistered->truycap_gannhat->EditCustomAttributes = "";
			$UsersRegistered->truycap_gannhat->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($UsersRegistered->truycap_gannhat->AdvancedSearch->SearchValue, 7), 7));
			$UsersRegistered->truycap_gannhat->EditCustomAttributes = "";
			$UsersRegistered->truycap_gannhat->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($UsersRegistered->truycap_gannhat->AdvancedSearch->SearchValue2, 7), 7));

			// kieu_giaodien
			$UsersRegistered->kieu_giaodien->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("1", "Giao diện 1");
			$arwrk[] = array("2", "Giao diện 2");
			$arwrk[] = array("3", "Giao diện 3");
			$arwrk[] = array("4", "Trang chủ");
			array_unshift($arwrk, array("", "Chọn"));
			$UsersRegistered->kieu_giaodien->EditValue = $arwrk;

			// UserLevelID
			$UsersRegistered->UserLevelID->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `UserLevelID`, `UserLevelName`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `userlevels`";
			if (trim(strval($UsersRegistered->UserLevelID->AdvancedSearch->SearchValue)) == "") {
				$sWhereWrk = "1=1";
			} else {
				$sWhereWrk = "`UserLevelID` = " . ew_AdjustSql($UsersRegistered->UserLevelID->AdvancedSearch->SearchValue) . "";
			}
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Chọn"));
			$UsersRegistered->UserLevelID->EditValue = $arwrk;
			// xacthuc_boisan
			$UsersRegistered->xacthuc_boisan->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không xác thực ");
			$arwrk[] = array("1", "Xác thực bởi");
			array_unshift($arwrk, array("", "Chọn"));
			$UsersRegistered->xacthuc_boisan->EditValue = $arwrk;

			// thanhvien_tieubieu
			$UsersRegistered->thanhvien_tieubieu->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không là thành viên tiêu biểu");
			$arwrk[] = array("1", "Là thành viên tiêu biểu");
			array_unshift($arwrk, array("", "Chọn"));
			$UsersRegistered->thanhvien_tieubieu->EditValue = $arwrk;
		}

		// Call Row Rendered event
		$UsersRegistered->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $UsersRegistered;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		/*if (!ew_CheckEuroDate($UsersRegistered->ngay_thamgia->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Ngay Thamgia";
		}
		if (!ew_CheckEuroDate($UsersRegistered->ngay_thamgia->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Ngay Thamgia";
		}
		if (!ew_CheckEuroDate($UsersRegistered->truycap_gannhat->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Truycap Gannhat";
		}
		if (!ew_CheckEuroDate($UsersRegistered->truycap_gannhat->AdvancedSearch->SearchValue2)) {
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
		global $UsersRegistered;
		$UsersRegistered->nguoidung_id->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_nguoidung_id");
		$UsersRegistered->nguoidung_option->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_nguoidung_option");
		$UsersRegistered->tendangnhap->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_tendangnhap");
		$UsersRegistered->quocgia_id->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_quocgia_id");
		$UsersRegistered->gioi_tinh->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_gioi_tinh");
		$UsersRegistered->hoten_nguoilienhe->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_hoten_nguoilienhe");
		$UsersRegistered->mat_khau->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_mat_khau");
		$UsersRegistered->ten_congty->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_ten_congty");
		$UsersRegistered->ten_viettat->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_ten_viettat");
		$UsersRegistered->website->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_website");
		$UsersRegistered->chuc_nang->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_chuc_nang");
		$UsersRegistered->loaikinhdoanh_id->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_loaikinhdoanh_id");
		$UsersRegistered->loaicongty_id->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_loaicongty_id");
		$UsersRegistered->so_congnhan->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_so_congnhan");
		$UsersRegistered->nam_thanhlap->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_nam_thanhlap");
		$UsersRegistered->kim_ngach->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_kim_ngach");
		$UsersRegistered->cung_cap->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_cung_cap");
		$UsersRegistered->chung_chi->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_chung_chi");
		$UsersRegistered->so_dkkd->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_so_dkkd");
		$UsersRegistered->ngay_thamgia->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_ngay_thamgia");
		$UsersRegistered->ngay_thamgia->AdvancedSearch->SearchValue2 = $UsersRegistered->getAdvancedSearch("y_ngay_thamgia");
		$UsersRegistered->so_dienthoai->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_so_dienthoai");
		$UsersRegistered->so_fax->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_so_fax");
		$UsersRegistered->dia_chi->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_dia_chi");
		$UsersRegistered->tinh_thanh->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_tinh_thanh");
		$UsersRegistered->quan_huyen->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_quan_huyen");
		$UsersRegistered->gioi_thieu->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_gioi_thieu");
		$UsersRegistered->nick_yahoo->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_nick_yahoo");
		$UsersRegistered->nick_skype->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_nick_skype");
		$UsersRegistered->truycap_gannhat->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_truycap_gannhat");
		$UsersRegistered->truycap_gannhat->AdvancedSearch->SearchValue2 = $UsersRegistered->getAdvancedSearch("y_truycap_gannhat");
		$UsersRegistered->kieu_giaodien->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_kieu_giaodien");
		$UsersRegistered->UserLevelID->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_UserLevelID");
		$UsersRegistered->nganhnghe_lienquan->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_nganhnghe_lienquan");
		$UsersRegistered->thitruong_lienquan->AdvancedSearch->SearchValue = $UsersRegistered->getAdvancedSearch("x_thitruong_lienquan");
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
