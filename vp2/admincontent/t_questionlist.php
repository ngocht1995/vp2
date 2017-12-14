<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "t_questioninfo.php" ?>
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
$t_question_list = new ct_question_list();
$Page =& $t_question_list;

// Page init processing
$t_question_list->Page_Init();

// Page main processing
$t_question_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($t_question->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var t_question_list = new ew_Page("t_question_list");

// page properties
t_question_list.PageID = "list"; // page ID
var EW_PAGE_ID = t_question_list.PageID; // for backward compatibility

// extend page with validate function for search
t_question_list.ValidateSearch = function(fobj) {
	if (!this.ValidateRequired)
		return true; // ignore validation
	var infix = "";
	elm = fobj.elements["x" + infix + "_cat_question_id"];
	if (elm && !ew_CheckInteger(elm.value))
		return ew_OnError(this, elm, "Incorrect integer - Chuyên mục");
	elm = fobj.elements["x" + infix + "_datetime_h"];
	if (elm && !ew_CheckEuroDate(elm.value))
		return ew_OnError(this, elm, "Không đúng định dạng = dd/mm/yyyy - Datetime H");

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
t_question_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
t_question_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
t_question_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
t_question_list.ValidateRequired = false; // no JavaScript validation
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

</script>
<?php } ?>
<?php if ($t_question->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($t_question->Export == "" && $t_question->SelectLimit);
	if (!$bSelectLimit)
		$rs = $t_question_list->LoadRecordset();
	$t_question_list->lTotalRecs = ($bSelectLimit) ? $t_question->SelectRecordCount() : $rs->RecordCount();
	$t_question_list->lStartRec = 1;
	if ($t_question_list->lDisplayRecs <= 0) // Display all records
		$t_question_list->lDisplayRecs = $t_question_list->lTotalRecs;
	if (!($t_question->ExportAll && $t_question->Export <> ""))
		$t_question_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $t_question_list->LoadRecordset($t_question_list->lStartRec-1, $t_question_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Danh mục câu hỏi</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<?php if ($t_question->Export == "" && $t_question->CurrentAction == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $t_question_list->PageUrl() ?>export=print">In ấn</a>
&nbsp;&nbsp;<a href="<?php echo $t_question_list->PageUrl() ?>export=excel">Xuất ra Excel</a>
&nbsp;&nbsp;<a href="<?php echo $t_question_list->PageUrl() ?>export=word">Xuất ra Word</a>
<?php } ?>
</span></p>
<?php if ($t_question->Export == "" && $t_question->CurrentAction == "") { ?>
<a href="javascript:ew_ToggleSearchPanel(t_question_list);" style="text-decoration: none;"><img id="t_question_list_SearchImage" src="images/collapse.gif" alt="" width="9" height="9" border="0"></a><span class="phpmaker">&nbsp;Tìm kiếm</span><br>
<div id="t_question_list_SearchPanel">
<form name="ft_questionlistsrch" id="ft_questionlistsrch" class="ewForm" action="<?php echo ew_CurrentPage() ?>" onsubmit="return t_question_list.ValidateSearch(this);">
<input type="hidden" id="t" name="t" value="t_question">
<?php
if ($gsSearchError == "")
	$t_question_list->LoadAdvancedSearch(); // Load advanced search

// Render for search
$t_question->RowType = EW_ROWTYPE_SEARCH;

// Render row
$t_question_list->RenderRow();
?>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">Chuyên mục</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_cat_question_id" id="z_cat_question_id" value="="></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_cat_question_id" id="x_cat_question_id" size="30" value="<?php echo $t_question->cat_question_id->EditValue ?>"<?php echo $t_question->cat_question_id->EditAttributes() ?>>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Mã câu hỏi</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_IDcard" id="z_IDcard" value="LIKE"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_IDcard" id="x_IDcard" size="30" maxlength="10" value="<?php echo $t_question->IDcard->EditValue ?>"<?php echo $t_question->IDcard->EditAttributes() ?>>

</span></td>
			</tr></table>
		</td>
	</tr>
        	<tr>
		<td><span class="phpmaker">Chuyên mục câu hỏi</span></td>
		<td><span class="ewSearchOpr"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
                                        <select class="select2" id="x_ID_Group" name="x_ID_Group"<?php echo $t_question->ID_Group->EditAttributes() ?>>
<?php
if (is_array($t_question->ID_Group->EditValue)) {
	$arwrk = $t_question->ID_Group->EditValue;
	$rowswrk = count($arwrk);
	$emptywrk = TRUE;
	for ($rowcntwrk = 0; $rowcntwrk < $rowswrk; $rowcntwrk++) {
		$selwrk = (strval($t_question->ID_Group->AdvancedSearch->SearchValue) == strval($arwrk[$rowcntwrk][0])) ? " selected=\"selected\"" : "";
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
</span></td>
			</tr></table>
		</td>
	</tr>		
		
	<tr>
		<td><span class="phpmaker">Ngày hỏi</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_datetime_h" id="z_datetime_h" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_datetime_h" id="x_datetime_h" value="<?php echo $t_question->datetime_h->EditValue ?>"<?php echo $t_question->datetime_h->EditAttributes() ?>>&nbsp;<img src="images/calendar.png" id="cal_x_c_read_time" name="cal_x_c_read_time" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_datetime_h", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_c_read_time" // ID of the button
});
</script>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_datetime_h" name="btw1_datetime_h">&nbsp;đến&nbsp;</span></td>
				<td><span class="phpmaker" id="btw1_datetime_h" name="btw1_datetime_h">
<input type="text" name="y_datetime_h" id="y_datetime_h" value="<?php echo $t_question->datetime_h->EditValue2 ?>"<?php echo $t_question->datetime_h->EditAttributes() ?>>&nbsp;<img src="images/calendar.png" id="cal_y_c_read_time" name="cal_y_c_read_time" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_datetime_h", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_c_read_time" // ID of the button
});
</script>
</span></td
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Ngày hẹn</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_datetime_hen" id="z_datetime_hen" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_datetime_hen" name="btw1_datetime_hen"></span></td>
				<td><span class="phpmaker" id="btw1_datetime_hen" name="btw1_datetime_hen">
<input type="text" name="y_datetime_hen" id="y_datetime_hen" value="<?php echo $t_question->datetime_hen->EditValue2 ?>"<?php echo $t_question->datetime_hen->EditAttributes() ?>>&nbsp;<img src="images/calendar.png" id="cal_y_datetime_hen" name="cal_y_datetime_hen" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_datetime_hen", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_datetime_hen" // ID of the button
});
</script>
</span></td>
			</tr></table>
		</td>
	</tr>
	<tr>
		<td><span class="phpmaker">Ngày xong</span></td>
		<td><span class="ewSearchOpr"><input type="hidden" name="z_datetime_kq" id="z_datetime_kq" value="BETWEEN"></span></td>
		<td>			
			<table cellspacing="0" class="ewItemTable"><tr>
				<td><span class="phpmaker">
<input type="text" name="x_datetime_kq" id="x_datetime_kq" value="<?php echo $t_question->datetime_kq->EditValue ?>"<?php echo $t_question->datetime_kq->EditAttributes() ?>>&nbsp;<img src="images/calendar.png" id="cal_x_datetime_kq" name="cal_x_datetime_kq" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "x_datetime_kq", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_x_datetime_kq" // ID of the button
});
</script>
</span></td>
				<td><span class="ewSearchOpr" id="btw1_datetime_kq" name="btw1_datetime_kq">&nbsp;đến&nbsp;</span></td>
				<td><span class="phpmaker" id="btw1_datetime_kq" name="btw1_datetime_kq">
<input type="text" name="y_datetime_kq" id="y_datetime_kq" value="<?php echo $t_question->datetime_kq->EditValue2 ?>"<?php echo $t_question->datetime_kq->EditAttributes() ?>>&nbsp;<img src="images/calendar.png" id="cal_y_datetime_kq" name="cal_y_datetime_kq" alt="Pick a date" style="cursor:pointer;cursor:hand;">
<script type="text/javascript">
Calendar.setup({
	inputField : "y_datetime_kq", // ID of the input field
	ifFormat : "%d/%m/%Y", // the date format
	button : "cal_y_datetime_kq" // ID of the button
});
</script>
</span></td>
			</tr></table>
		</td>
	</tr>
</table>
<table class="ewBasicSearch">
	<tr>
		<td><span class="phpmaker">
			<input type="text" name="<?php echo EW_TABLE_BASIC_SEARCH ?>" id="<?php echo EW_TABLE_BASIC_SEARCH ?>" size="20" value="<?php echo ew_HtmlEncode($t_question->getBasicSearchKeyword()) ?>">
			<input type="Submit" name="Submit" id="Submit" value="Tìm kiếm">&nbsp;
			<input type="Button" name="Reset" id="Reset" value="Nhập lại" onclick="ew_ClearForm(this.form);if (this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>) this.form.<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>[0].checked = true;">&nbsp;
			<a href="<?php echo $t_question_list->PageUrl() ?>cmd=reset">Hiển thị tất cả</a>&nbsp;
		</span></td>
	</tr>
	<tr>
	<td><span class="phpmaker"><label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value=""<?php if ($t_question->getBasicSearchType() == "") { ?> checked="checked"<?php } ?>>Chính xác</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="AND"<?php if ($t_question->getBasicSearchType() == "AND") { ?> checked="checked"<?php } ?>>Tất cả các từ</label>&nbsp;&nbsp;<label><input type="radio" name="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" id="<?php echo EW_TABLE_BASIC_SEARCH_TYPE ?>" value="OR"<?php if ($t_question->getBasicSearchType() == "OR") { ?> checked="checked"<?php } ?>>Bất kỳ từ nào</label></span></td>
	</tr>
</table>
</form>
</div>
<?php } ?>
<?php $t_question_list->ShowMessage() ?>
<br>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($t_question->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($t_question->CurrentAction <> "gridadd" && $t_question->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($t_question_list->Pager)) $t_question_list->Pager = new cPrevNextPager($t_question_list->lStartRec, $t_question_list->lDisplayRecs, $t_question_list->lTotalRecs) ?>
<?php if ($t_question_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker">Trang&nbsp;</span></td>
<!--first page button-->
	<?php if ($t_question_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="First" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="First" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($t_question_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="Previous" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="Previous" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $t_question_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($t_question_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="Next" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="Next" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($t_question_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="Last" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="Last" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;thuộc <?php echo $t_question_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="phpmaker">Bản ghi <?php echo $t_question_list->Pager->FromIndex ?> đến <?php echo $t_question_list->Pager->ToIndex ?> trong <?php echo $t_question_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($t_question_list->sSrchWhere == "0=101") { ?>
	<span class="phpmaker">Xin vui lòng nhập các tiêu chí tìm kiếm</span>
	<?php } else { ?>
	<span class="phpmaker">Không có bản ghi</span>
	<?php } ?>
        
<?php } ?>
		</td>
<?php if ($t_question_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_question">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_question_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_question_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="30"<?php if ($t_question_list->lDisplayRecs == 30) { ?> selected="selected"<?php } ?>>30</option>
<option value="40"<?php if ($t_question_list->lDisplayRecs == 40) { ?> selected="selected"<?php } ?>>40</option>
<option value="50"<?php if ($t_question_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_question->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">

<?php if ($t_question_list->lTotalRecs > 0) { ?>
   <a href="<?php echo $t_question->AddUrl() ?>">Thêm</a>&nbsp;&nbsp;
<a href="" onclick="if (!ew_KeySelected(document.ft_questionlist)) alert('Không bản ghi nào được chọn'); else if (ew_Confirm('<?php echo $t_question_list->sDeleteConfirmMsg ?>')) {document.ft_questionlist.action='t_questiondelete.php';document.ft_questionlist.encoding='application/x-www-form-urlencoded';document.ft_questionlist.submit();};return false;">Xóa bản ghi đã chọn</a>&nbsp;&nbsp;
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="ft_questionlist" id="ft_questionlist" class="ewForm" action="" method="post">
<?php if ($t_question_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$t_question_list->lOptionCnt = 0;
	$t_question_list->lOptionCnt++; // view
	$t_question_list->lOptionCnt++; // edit
	$t_question_list->lOptionCnt++; // copy
	$t_question_list->lOptionCnt++; // Multi-select
	$t_question_list->lOptionCnt += count($t_question_list->ListOptions->Items); // Custom list options
?>
<?php echo $t_question->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($t_question->Export == "") { ?>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;">&nbsp;</td>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="t_question_list.SelectAllKey(this);"></td>
<?php

// Custom list options
foreach ($t_question_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>

<?php if ($t_question->IDcard->Visible) { // IDcard ?>
	<?php if ($t_question->SortUrl($t_question->IDcard) == "") { ?>
		<td>Mã câu hỏi</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->IDcard) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Mã câu hỏi</td><td style="width: 10px;"><?php if ($t_question->IDcard->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->IDcard->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->datetime_h->Visible) { // datetime_h ?>
	<?php if ($t_question->SortUrl($t_question->datetime_h) == "") { ?>
		<td>Ngày hỏi</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->datetime_h) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Ngày hỏi</td><td style="width: 10px;"><?php if ($t_question->datetime_h->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->datetime_h->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>	
                <?php if ($t_question->datetime_hen->Visible) { // datetime_hen ?>
	<?php if ($t_question->SortUrl($t_question->datetime_hen) == "") { ?>
		<td>Ngày hẹn</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->datetime_hen) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Ngày hẹn</td><td style="width: 10px;"><?php if ($t_question->datetime_hen->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->datetime_hen->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>
		
<?php if ($t_question->status->Visible) { // status ?>
	<?php if ($t_question->SortUrl($t_question->status) == "") { ?>
		<td>Trạng thái</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->status) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Trạng thái</td><td style="width: 10px;"><?php if ($t_question->status->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->status->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->active->Visible) { // active ?>
	<?php if ($t_question->SortUrl($t_question->active) == "") { ?>
		<td>Trả lời</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->active) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Trả lời</td><td style="width: 10px;"><?php if ($t_question->active->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->active->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>	
               

		<td class="ewPointer" >
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Mô tả câu trả lời</td></tr></table>
		</td>
		
		

    <?php if ($t_question->s_public->Visible) { // s_public ?>
    <?php if ($t_question->SortUrl($t_question->s_public) == "") { ?>
    <td>Xuất bản</td>
    <?php } else { ?>
    <td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->s_public) ?>',1);">
    <table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Xuất bản</td><td style="width: 10px;"><?php if ($t_question->s_public->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->s_public->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
    </td>
    <?php } ?>
    <?php } ?>
<?php if ($t_question->s_finish->Visible) { // s_finish ?>
	<?php if ($t_question->SortUrl($t_question->s_finish) == "") { ?>
		<td>Kết thúc</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->s_finish) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Kết thúc</td><td style="width: 10px;"><?php if ($t_question->s_finish->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->s_finish->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>
                <?php if ($t_question->s_ok->Visible) { // s_ok ?>
	<?php if ($t_question->SortUrl($t_question->s_ok) == "") { ?>
		<td>Thái độ</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->s_ok) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thái độ</td><td style="width: 10px;"><?php if ($t_question->s_ok->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->s_ok->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($t_question->s_number->Visible) { // s_number ?>
	<?php if ($t_question->SortUrl($t_question->s_number) == "") { ?>
		<td>Lần hỏi</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->s_number) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Lần hỏi</td><td style="width: 10px;"><?php if ($t_question->s_number->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->s_number->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
    <?php } ?>
		
		
		
<?php if ($t_question->datetime_kq->Visible) { // datetime_kq ?>
	<?php if ($t_question->SortUrl($t_question->datetime_kq) == "") { ?>
		<td>Ngày xong</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->datetime_kq) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Ngày xong</td><td style="width: 10px;"><?php if ($t_question->datetime_kq->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->datetime_kq->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>
                <?php if ($t_question->status_faq->Visible) { // status_faq ?>
	<?php if ($t_question->SortUrl($t_question->status_faq) == "") { ?>
		<td>Loại FAQ</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $t_question->SortUrl($t_question->status_faq) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Loại FAQ</td><td style="width: 10px;"><?php if ($t_question->status_faq->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($t_question->status_faq->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>
                <td class="ewPointer" >Người trả lời</td>
	</tr>
</thead>
<?php
if ($t_question->ExportAll && $t_question->Export <> "") {
	$t_question_list->lStopRec = $t_question_list->lTotalRecs;
} else {
	$t_question_list->lStopRec = $t_question_list->lStartRec + $t_question_list->lDisplayRecs - 1; // Set the last record to display
}
$t_question_list->lRecCount = $t_question_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$t_question->SelectLimit && $t_question_list->lStartRec > 1)
		$rs->Move($t_question_list->lStartRec - 1);
}
$t_question_list->lRowCnt = 0;
while (($t_question->CurrentAction == "gridadd" || !$rs->EOF) &&
	$t_question_list->lRecCount < $t_question_list->lStopRec) {
	$t_question_list->lRecCount++;
	if (intval($t_question_list->lRecCount) >= intval($t_question_list->lStartRec)) {
		$t_question_list->lRowCnt++;

	// Init row class and style
	$t_question->CssClass = "";
	$t_question->CssStyle = "";
	$t_question->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($t_question->CurrentAction == "gridadd") {
		$t_question_list->LoadDefaultValues(); // Load default values
	} else {
		$t_question_list->LoadRowValues($rs); // Load row values
	}
	$t_question->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$t_question_list->RenderRow();
?>
	<tr<?php echo $t_question->RowAttributes() ?>>
<?php if ($t_question->Export == "") { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_question->ViewUrl() ?>">Xem</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_question->EditUrl() ?>">Sửa</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<a href="<?php echo $t_question->AnswerUrl() ?>">Trả lời</a>
</span></td>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($t_question->question_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php

// Custom list options
foreach ($t_question_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<script type="text/javascript" >
function MouseOverPointer(obj) //obj is the triggering element
{
    
    	obj.style.cursor = "pointer";
}
function MouseOverPointerAlert(obj,content) //obj is the triggering element
{
    
    	
        alert(content);
}
</script>
	<?php if ($t_question->IDcard->Visible) { // IDcard ?>
		<td<?php echo $t_question->IDcard->CellAttributes() ?>>
                    <div onmouseover="MouseOverPointer(this);" onclick="MouseOverPointerAlert(this,'<?php echo  $t_question->description->ListViewValue();?>');"   title="<?php echo $t_question->description->ListViewValue();?>" <?php echo $t_question->IDcard->ViewAttributes() ?>> <?php echo $t_question->IDcard->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->datetime_h->Visible) { // datetime_h ?>
		<td<?php echo $t_question->datetime_h->CellAttributes() ?>>
<div<?php echo $t_question->datetime_h->ViewAttributes() ?>><?php echo $t_question->datetime_h->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php if ($t_question->datetime_hen->Visible) { // datetime_hen ?>
		<td<?php echo $t_question->datetime_hen->CellAttributes() ?>>
<div<?php echo $t_question->datetime_hen->ViewAttributes() ?>><?php echo $t_question->datetime_hen->ListViewValue() ?></div>
</td>
	<?php } ?>
	
	<?php if ($t_question->status->Visible) { // status ?>
		<td<?php echo $t_question->status->CellAttributes() ?>>
<div<?php echo $t_question->status->ViewAttributes() ?>><?php echo $t_question->status->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php 
// Lấy dữ liệu câu trả lời
    $conn = ew_Connect();

    $sSqlWrk1 = "Select * From `t_answer` where question_id = ".$t_question->question_id->ListViewValue()."";

    //echo       $t_question->question_id->ListViewValue();      
    // echo $sSqlWrk1;
    $answer = "";
    $rswrk1 = $conn->Execute($sSqlWrk1);
    $arwrk1 = ($rswrk1) ? $rswrk1->GetRows() : array();
    if ($rswrk1) $rswrk1->Close();
    $rowswrk1 = count($arwrk1);
    $User_Update="";
      if($rowswrk1 <>0){
       for($j =0; $j <$rowswrk1;$j++){
          $answer = $answer .'\n * Trả lời lần '.($j+1). ": ". $arwrk1[$j]["answer"];
       }
          $User_Update=$arwrk1[$rowswrk1-1]["User_Update"];
          
      }
      $answer= strip_word_html($answer, $allowed_tags);
    // echo  ($rowswrk1);
      
?>
	<?php if ($t_question->active->Visible) { // active ?>
		<td<?php echo $t_question->active->CellAttributes() ?>>
                    <div onmouseover="MouseOverPointer(this);" onclick="MouseOverPointerAlert(this,'<?php echo $answer ?>');" title="<?php echo $answer ?>"    <?php echo $t_question->active->ViewAttributes() ?>><?php echo $t_question->active->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php 
               
               if($rowswrk1 <>0){
                   
               ?>
                
<td>
<div><?php echo $arwrk1[$rowswrk1-1]["desciption"]; ?></div>
</td>
    <?php
           }else{
     ?>
<td>
<div>  </div>
</td>
	<?php }?>
	
<?php if ($t_question->s_public->Visible) { // s_public ?>
		<td<?php echo $t_question->s_public->CellAttributes() ?>>
<div<?php echo $t_question->s_public->ViewAttributes() ?>><?php echo $t_question->s_public->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->s_finish->Visible) { // s_finish ?>
		<td<?php echo $t_question->s_finish->CellAttributes() ?>>
<div<?php echo $t_question->s_finish->ViewAttributes() ?>><?php echo $t_question->s_finish->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php if ($t_question->s_ok->Visible) { // s_ok ?>
		<td<?php echo $t_question->s_ok->CellAttributes() ?>>
<div<?php echo $t_question->s_ok->ViewAttributes() ?>><?php echo $t_question->s_ok->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($t_question->s_number->Visible) { // s_number ?>
		<td<?php echo $t_question->s_number->CellAttributes() ?>>
<div<?php echo $t_question->s_number->ViewAttributes() ?>><?php echo $t_question->s_number->ListViewValue() ?></div>
</td>
	<?php } ?>
	
	
	
	<?php if ($t_question->datetime_kq->Visible) { // datetime_kq ?>
		<td<?php echo $t_question->datetime_kq->CellAttributes() ?>>
<div<?php echo $t_question->datetime_kq->ViewAttributes() ?>><?php echo $t_question->datetime_kq->ListViewValue() ?></div>
</td>
	<?php } ?>
<?php if ($t_question->status_faq->Visible) { // status_faq ?>
		<td<?php echo $t_question->status_faq->CellAttributes() ?>>
<div<?php echo $t_question->status_faq->ViewAttributes() ?>><?php echo $t_question->status_faq->ListViewValue() ?></div>
</td>
	<?php } ?>

<td><?php echo $User_Update ;?></td>
	</tr>
<?php
	}
	if ($t_question->CurrentAction <> "gridadd")
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
<?php if ($t_question_list->lTotalRecs > 0) { ?>
<?php if ($t_question->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($t_question->CurrentAction <> "gridadd" && $t_question->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<?php if (!isset($t_question_list->Pager)) $t_question_list->Pager = new cPrevNextPager($t_question_list->lStartRec, $t_question_list->lDisplayRecs, $t_question_list->lTotalRecs) ?>
<?php if ($t_question_list->Pager->RecordCount > 0) { ?>
	<table border="0" cellspacing="0" cellpadding="0"><tr><td><span class="phpmaker">Trang&nbsp;</span></td>
<!--first page button-->
	<?php if ($t_question_list->Pager->FirstButton->Enabled) { ?>
	<td><a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->FirstButton->Start ?>"><img src="images/first.gif" alt="First" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/firstdisab.gif" alt="First" width="16" height="16" border="0"></td>
	<?php } ?>
<!--previous page button-->
	<?php if ($t_question_list->Pager->PrevButton->Enabled) { ?>
	<td><a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->PrevButton->Start ?>"><img src="images/prev.gif" alt="Previous" width="16" height="16" border="0"></a></td>
	<?php } else { ?>
	<td><img src="images/prevdisab.gif" alt="Previous" width="16" height="16" border="0"></td>
	<?php } ?>
<!--current page number-->
	<td><input type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" id="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $t_question_list->Pager->CurrentPage ?>" size="4"></td>
<!--next page button-->
	<?php if ($t_question_list->Pager->NextButton->Enabled) { ?>
	<td><a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->NextButton->Start ?>"><img src="images/next.gif" alt="Next" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/nextdisab.gif" alt="Next" width="16" height="16" border="0"></td>
	<?php } ?>
<!--last page button-->
	<?php if ($t_question_list->Pager->LastButton->Enabled) { ?>
	<td><a href="<?php echo $t_question_list->PageUrl() ?>start=<?php echo $t_question_list->Pager->LastButton->Start ?>"><img src="images/last.gif" alt="Last" width="16" height="16" border="0"></a></td>	
	<?php } else { ?>
	<td><img src="images/lastdisab.gif" alt="Last" width="16" height="16" border="0"></td>
	<?php } ?>
	<td><span class="phpmaker">&nbsp;of <?php echo $t_question_list->Pager->PageCount ?></span></td>
	</tr></table>
	</td>	
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>
	<span class="phpmaker">Bản ghi <?php echo $t_question_list->Pager->FromIndex ?> đến <?php echo $t_question_list->Pager->ToIndex ?> trong <?php echo $t_question_list->Pager->RecordCount ?></span>
<?php } else { ?>
	<?php if ($t_question_list->sSrchWhere == "0=101") { ?>
	<span class="phpmaker">Xin đánh ký tự cần tìm</span>
	<?php } else { ?>
	<span class="phpmaker">Không có bản ghi</span>
	<?php } ?>
<?php } ?>
		</td>
<?php if ($t_question_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="t_question">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($t_question_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($t_question_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="30"<?php if ($t_question_list->lDisplayRecs == 30) { ?> selected="selected"<?php } ?>>30</option>
<option value="40"<?php if ($t_question_list->lDisplayRecs == 40) { ?> selected="selected"<?php } ?>>40</option>
<option value="50"<?php if ($t_question_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($t_question->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>All</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($t_question_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($t_question_list->lTotalRecs > 0) { ?>
    <a href="<?php echo $t_question->AddUrl() ?>">Thêm</a>&nbsp;&nbsp;
<a href="" onclick="if (!ew_KeySelected(document.ft_questionlist)) alert('No records selected'); else if (ew_Confirm('<?php echo $t_question_list->sDeleteConfirmMsg ?>')) {document.ft_questionlist.action='t_questiondelete.php';document.ft_questionlist.encoding='application/x-www-form-urlencoded';document.ft_questionlist.submit();};return false;">Xóa bản ghi đã chọn</a>&nbsp;&nbsp;
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($t_question->Export == "" && $t_question->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(t_question_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($t_question->Export == "") { ?>
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
class ct_question_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 't_question';

	// Page Object Name
	var $PageObjName = 't_question_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $t_question;
		if ($t_question->UseTokenInUrl) $PageUrl .= "t=" . $t_question->TableVar . "&"; // add page token
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
		global $objForm, $t_question;
		if ($t_question->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($t_question->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($t_question->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function ct_question_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["t_question"] = new ct_question();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't_question', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $t_question;
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
	
                
	$t_question->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $t_question->Export; // Get export parameter, used in header
	$gsExportFile = $t_question->TableVar; // Get export file, used in header
	if ($t_question->Export == "print" || $t_question->Export == "html") {

		// Printer friendly or Export to HTML, no action required
	}
if ($t_question->Export == "excel") {
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
	}
	if ($t_question->Export == "word") {
		header('Content-Type: application/vnd.ms-word');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
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
		global $objForm, $gsSearchError, $Security, $t_question;
		$this->lDisplayRecs = 20;
		$this->lRecRange = 10;
		$this->lRecCnt = 0; // Record count

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";
		$this->sSrchWhere = ""; // Search WHERE clause
		$this->sDeleteConfirmMsg = "Bạn có muốn xóa bản ghi đã chọn?"; // Delete confirm message

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
		if ($t_question->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $t_question->getRecordsPerPage(); // Restore from Session
		} else {
			$this->lDisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();
                $sFilter = "";
		
		// Build search criteria
		if ($sSrchAdvanced <> "")
			$this->sSrchWhere = ($this->sSrchWhere <> "") ? "($this->sSrchWhere) AND ($sSrchAdvanced)" : $sSrchAdvanced;
		if ($sSrchBasic <> "")
			$this->sSrchWhere = ($this->sSrchWhere <> "") ? "($this->sSrchWhere) AND ($sSrchBasic)" : $sSrchBasic;

		// Call Recordset_Searching event
		$t_question->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchBasic == "")
				$this->ResetBasicSearchParms();
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$t_question->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$t_question->setStartRecordNumber($this->lStartRec);
		} else {
			$this->RestoreSearchParms();
		}

		// Build filter
		$sFilter = "";
		if ($this->sDbDetailFilter <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (" . $this->sDbDetailFilter . ")" : $this->sDbDetailFilter;
		if ($this->sSrchWhere <> "")
			$sFilter = ($sFilter <> "") ? "($sFilter) AND (". $this->sSrchWhere . ")" : $this->sSrchWhere;

		// Set up filter in Session
		$t_question->setSessionWhere($sFilter);
		$t_question->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $t_question;
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
			$t_question->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$t_question->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $t_question;
		$sWhere = "";
		$this->BuildSearchSql($sWhere, $t_question->question_id, FALSE); // Field question_id
		$this->BuildSearchSql($sWhere, $t_question->cat_question_id, FALSE); // Field cat_question_id
		$this->BuildSearchSql($sWhere, $t_question->IDcard, FALSE); // Field IDcard
		$this->BuildSearchSql($sWhere, $t_question->datetime_h, FALSE); // Field datetime_h
		$this->BuildSearchSql($sWhere, $t_question->msv_id, FALSE); // Field msv_id
		$this->BuildSearchSql($sWhere, $t_question->zemail, FALSE); // Field email
		$this->BuildSearchSql($sWhere, $t_question->user_name, FALSE); // Field user_name
		$this->BuildSearchSql($sWhere, $t_question->tel, FALSE); // Field tel
		$this->BuildSearchSql($sWhere, $t_question->content, FALSE); // Field content
		$this->BuildSearchSql($sWhere, $t_question->content1, FALSE); // Field content1
		$this->BuildSearchSql($sWhere, $t_question->content2, FALSE); // Field content2
		$this->BuildSearchSql($sWhere, $t_question->description, FALSE); // Field description
		$this->BuildSearchSql($sWhere, $t_question->status, FALSE); // Field status
		$this->BuildSearchSql($sWhere, $t_question->active, FALSE); // Field active
		$this->BuildSearchSql($sWhere, $t_question->s_level, FALSE); // Field s_level
		$this->BuildSearchSql($sWhere, $t_question->s_Multi, FALSE); // Field s_Multi
		$this->BuildSearchSql($sWhere, $t_question->s_ok, FALSE); // Field s_ok
		$this->BuildSearchSql($sWhere, $t_question->s_number, FALSE); // Field s_number
		$this->BuildSearchSql($sWhere, $t_question->s_finish, FALSE); // Field s_finish
		$this->BuildSearchSql($sWhere, $t_question->status_faq, FALSE); // Field status_faq
		$this->BuildSearchSql($sWhere, $t_question->s_public, FALSE); // Field s_public
		$this->BuildSearchSql($sWhere, $t_question->datetime_hen, FALSE); // Field datetime_hen
		$this->BuildSearchSql($sWhere, $t_question->datetime_kq, FALSE); // Field datetime_kq
		$this->BuildSearchSql($sWhere, $t_question->reason, FALSE); // Field reason   
                $this->BuildSearchSql($sWhere, $t_question->ID_Group, FALSE); // Field ID_Group

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($t_question->question_id); // Field question_id
			$this->SetSearchParm($t_question->cat_question_id); // Field cat_question_id
			$this->SetSearchParm($t_question->IDcard); // Field IDcard
			$this->SetSearchParm($t_question->datetime_h); // Field datetime_h
			$this->SetSearchParm($t_question->msv_id); // Field msv_id
			$this->SetSearchParm($t_question->zemail); // Field email
			$this->SetSearchParm($t_question->user_name); // Field user_name
			$this->SetSearchParm($t_question->tel); // Field tel
			$this->SetSearchParm($t_question->content); // Field content
			$this->SetSearchParm($t_question->content1); // Field content1
			$this->SetSearchParm($t_question->content2); // Field content2
			$this->SetSearchParm($t_question->description); // Field description
			$this->SetSearchParm($t_question->status); // Field status
			$this->SetSearchParm($t_question->active); // Field active
			$this->SetSearchParm($t_question->s_level); // Field s_level
			$this->SetSearchParm($t_question->s_Multi); // Field s_Multi
			$this->SetSearchParm($t_question->s_ok); // Field s_ok
			$this->SetSearchParm($t_question->s_number); // Field s_number
			$this->SetSearchParm($t_question->s_finish); // Field s_finish
			$this->SetSearchParm($t_question->status_faq); // Field status_faq
			$this->SetSearchParm($t_question->s_public); // Field s_public
			$this->SetSearchParm($t_question->datetime_hen); // Field datetime_hen
			$this->SetSearchParm($t_question->datetime_kq); // Field datetime_kq
			$this->SetSearchParm($t_question->reason); // Field reason
                        $this->SetSearchParm($t_question->ID_Group); // Field ID_Group
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
		global $t_question;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$t_question->setAdvancedSearch("x_$FldParm", $FldVal);
		$t_question->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$t_question->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$t_question->setAdvancedSearch("y_$FldParm", $FldVal2);
		$t_question->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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
		global $t_question;
		$sKeyword = ew_AdjustSql($Keyword);
		$sql = "";
		$sql .= $t_question->IDcard->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->msv_id->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->zemail->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->user_name->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->tel->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->content->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->content1->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->content2->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->description->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		$sql .= $t_question->reason->FldExpression . " LIKE '%" . $sKeyword . "%' OR ";
		if (substr($sql, -4) == " OR ") $sql = substr($sql, 0, strlen($sql)-4);
		return $sql;
	}

	// Return Basic Search Where based on search keyword and type
	function BasicSearchWhere() {
		global $Security, $t_question;
		$sSearchStr = "";
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
			$t_question->setBasicSearchKeyword($sSearchKeyword);
			$t_question->setBasicSearchType($sSearchType);
		}
		return $sSearchStr;
	}

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $t_question;
		$this->sSrchWhere = "";
		$t_question->setSearchWhere($this->sSrchWhere);

		// Clear basic search parameters
		$this->ResetBasicSearchParms();

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all basic search parameters
	function ResetBasicSearchParms() {

		// Clear basic search parameters
		global $t_question;
		$t_question->setBasicSearchKeyword("");
		$t_question->setBasicSearchType("");
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $t_question;
		$t_question->setAdvancedSearch("x_question_id", "");
		$t_question->setAdvancedSearch("x_cat_question_id", "");
		$t_question->setAdvancedSearch("x_IDcard", "");
		$t_question->setAdvancedSearch("x_datetime_h", "");
		$t_question->setAdvancedSearch("y_datetime_h", "");
		$t_question->setAdvancedSearch("x_msv_id", "");
		$t_question->setAdvancedSearch("x_zemail", "");
		$t_question->setAdvancedSearch("x_user_name", "");
		$t_question->setAdvancedSearch("x_tel", "");
		$t_question->setAdvancedSearch("x_content", "");
		$t_question->setAdvancedSearch("x_content1", "");
		$t_question->setAdvancedSearch("x_content2", "");
		$t_question->setAdvancedSearch("x_description", "");
		$t_question->setAdvancedSearch("x_status", "");
		$t_question->setAdvancedSearch("x_active", "");
		$t_question->setAdvancedSearch("x_s_level", "");
		$t_question->setAdvancedSearch("x_s_Multi", "");
		$t_question->setAdvancedSearch("x_s_ok", "");
		$t_question->setAdvancedSearch("x_s_number", "");
		$t_question->setAdvancedSearch("x_s_finish", "");
		$t_question->setAdvancedSearch("x_status_faq", "");
		$t_question->setAdvancedSearch("x_s_public", "");
		$t_question->setAdvancedSearch("x_datetime_hen", "");
		$t_question->setAdvancedSearch("y_datetime_hen", "");
		$t_question->setAdvancedSearch("x_datetime_kq", "");
		$t_question->setAdvancedSearch("y_datetime_kq", "");
		$t_question->setAdvancedSearch("x_reason", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $t_question;
		$this->sSrchWhere = $t_question->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $t_question;
		 $t_question->question_id->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_question_id");
		 $t_question->cat_question_id->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_cat_question_id");
		 $t_question->IDcard->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_IDcard");
		 $t_question->datetime_h->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_datetime_h");
		 $t_question->datetime_h->AdvancedSearch->SearchValue2 = $t_question->getAdvancedSearch("y_datetime_h");
		 $t_question->msv_id->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_msv_id");
		 $t_question->zemail->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_zemail");
		 $t_question->user_name->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_user_name");
		 $t_question->tel->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_tel");
		 $t_question->content->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_content");
		 $t_question->content1->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_content1");
		 $t_question->content2->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_content2");
		 $t_question->description->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_description");
		 $t_question->status->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_status");
		 $t_question->active->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_active");
		 $t_question->s_level->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_level");
		 $t_question->s_Multi->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_Multi");
		 $t_question->s_ok->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_ok");
		 $t_question->s_number->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_number");
		 $t_question->s_finish->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_finish");
		 $t_question->status_faq->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_status_faq");
		 $t_question->s_public->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_public");
		 $t_question->datetime_hen->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_datetime_hen");
		 $t_question->datetime_hen->AdvancedSearch->SearchValue2 = $t_question->getAdvancedSearch("y_datetime_hen");
		 $t_question->datetime_kq->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_datetime_kq");
		 $t_question->datetime_kq->AdvancedSearch->SearchValue2 = $t_question->getAdvancedSearch("y_datetime_kq");
		 $t_question->reason->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_reason");
                 $t_question->ID_Group->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_ID_Group");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $t_question;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$t_question->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$t_question->CurrentOrderType = @$_GET["ordertype"];
			$t_question->UpdateSort($t_question->cat_question_id); // Field 
			$t_question->UpdateSort($t_question->IDcard); // Field 
			$t_question->UpdateSort($t_question->datetime_h); // Field 
			$t_question->UpdateSort($t_question->msv_id); // Field 
			$t_question->UpdateSort($t_question->status); // Field 
			$t_question->UpdateSort($t_question->active); // Field 
			$t_question->UpdateSort($t_question->s_level); // Field 
			$t_question->UpdateSort($t_question->s_Multi); // Field 
			$t_question->UpdateSort($t_question->s_ok); // Field 
			$t_question->UpdateSort($t_question->s_number); // Field 
			$t_question->UpdateSort($t_question->s_finish); // Field 
			$t_question->UpdateSort($t_question->status_faq); // Field 
			$t_question->UpdateSort($t_question->s_public); // Field 
			$t_question->UpdateSort($t_question->datetime_hen); // Field 
			$t_question->UpdateSort($t_question->datetime_kq); // Field 
                        $t_question->UpdateSort($t_question->ID_Group); // Field 
			$t_question->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $t_question;
		$sOrderBy = $t_question->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($t_question->SqlOrderBy() <> "") {
				$sOrderBy = $t_question->SqlOrderBy();
				$t_question->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $t_question;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "datetiem_h";
				$t_question->setSessionOrderBy($sOrderBy);
				$t_question->cat_question_id->setSort("");
				$t_question->IDcard->setSort("");
				$t_question->datetime_h->setSort("");
				$t_question->msv_id->setSort("");
				$t_question->status->setSort("");
				$t_question->active->setSort("");
				$t_question->s_level->setSort("");
				$t_question->s_Multi->setSort("");
				$t_question->s_ok->setSort("");
				$t_question->s_number->setSort("");
				$t_question->s_finish->setSort("");
				$t_question->status_faq->setSort("");
				$t_question->s_public->setSort("");
				$t_question->datetime_hen->setSort("");
				$t_question->datetime_kq->setSort("");
                                $t_question->ID_Group->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$t_question->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $t_question;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$t_question->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$t_question->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $t_question->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$t_question->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$t_question->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$t_question->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $t_question;

		// Load search values
		// question_id

		$t_question->question_id->AdvancedSearch->SearchValue = @$_GET["x_question_id"];
		$t_question->question_id->AdvancedSearch->SearchOperator = @$_GET["z_question_id"];

		// cat_question_id
		$t_question->cat_question_id->AdvancedSearch->SearchValue = @$_GET["x_cat_question_id"];
		$t_question->cat_question_id->AdvancedSearch->SearchOperator = @$_GET["z_cat_question_id"];

		// IDcard
		$t_question->IDcard->AdvancedSearch->SearchValue = @$_GET["x_IDcard"];
		$t_question->IDcard->AdvancedSearch->SearchOperator = @$_GET["z_IDcard"];

		// datetime_h
		$t_question->datetime_h->AdvancedSearch->SearchValue = @$_GET["x_datetime_h"];
		$t_question->datetime_h->AdvancedSearch->SearchOperator = @$_GET["z_datetime_h"];
		$t_question->datetime_h->AdvancedSearch->SearchCondition = @$_GET["v_datetime_h"];
		$t_question->datetime_h->AdvancedSearch->SearchValue2 = @$_GET["y_datetime_h"];
		$t_question->datetime_h->AdvancedSearch->SearchOperator2 = @$_GET["w_datetime_h"];

		// msv_id
		$t_question->msv_id->AdvancedSearch->SearchValue = @$_GET["x_msv_id"];
		$t_question->msv_id->AdvancedSearch->SearchOperator = @$_GET["z_msv_id"];

		// email
		$t_question->zemail->AdvancedSearch->SearchValue = @$_GET["x_zemail"];
		$t_question->zemail->AdvancedSearch->SearchOperator = @$_GET["z_zemail"];

		// user_name
		$t_question->user_name->AdvancedSearch->SearchValue = @$_GET["x_user_name"];
		$t_question->user_name->AdvancedSearch->SearchOperator = @$_GET["z_user_name"];

		// tel
		$t_question->tel->AdvancedSearch->SearchValue = @$_GET["x_tel"];
		$t_question->tel->AdvancedSearch->SearchOperator = @$_GET["z_tel"];

		// content
		$t_question->content->AdvancedSearch->SearchValue = @$_GET["x_content"];
		$t_question->content->AdvancedSearch->SearchOperator = @$_GET["z_content"];

		// content1
		$t_question->content1->AdvancedSearch->SearchValue = @$_GET["x_content1"];
		$t_question->content1->AdvancedSearch->SearchOperator = @$_GET["z_content1"];

		// content2
		$t_question->content2->AdvancedSearch->SearchValue = @$_GET["x_content2"];
		$t_question->content2->AdvancedSearch->SearchOperator = @$_GET["z_content2"];

		// description
		$t_question->description->AdvancedSearch->SearchValue = @$_GET["x_description"];
		$t_question->description->AdvancedSearch->SearchOperator = @$_GET["z_description"];

		// status
		$t_question->status->AdvancedSearch->SearchValue = @$_GET["x_status"];
		$t_question->status->AdvancedSearch->SearchOperator = @$_GET["z_status"];

		// active
		$t_question->active->AdvancedSearch->SearchValue = @$_GET["x_active"];
		$t_question->active->AdvancedSearch->SearchOperator = @$_GET["z_active"];

		// s_level
		$t_question->s_level->AdvancedSearch->SearchValue = @$_GET["x_s_level"];
		$t_question->s_level->AdvancedSearch->SearchOperator = @$_GET["z_s_level"];

		// s_Multi
		$t_question->s_Multi->AdvancedSearch->SearchValue = @$_GET["x_s_Multi"];
		$t_question->s_Multi->AdvancedSearch->SearchOperator = @$_GET["z_s_Multi"];

		// s_ok
		$t_question->s_ok->AdvancedSearch->SearchValue = @$_GET["x_s_ok"];
		$t_question->s_ok->AdvancedSearch->SearchOperator = @$_GET["z_s_ok"];

		// s_number
		$t_question->s_number->AdvancedSearch->SearchValue = @$_GET["x_s_number"];
		$t_question->s_number->AdvancedSearch->SearchOperator = @$_GET["z_s_number"];

		// s_finish
		$t_question->s_finish->AdvancedSearch->SearchValue = @$_GET["x_s_finish"];
		$t_question->s_finish->AdvancedSearch->SearchOperator = @$_GET["z_s_finish"];

		// status_faq
		$t_question->status_faq->AdvancedSearch->SearchValue = @$_GET["x_status_faq"];
		$t_question->status_faq->AdvancedSearch->SearchOperator = @$_GET["z_status_faq"];

		// s_public
		$t_question->s_public->AdvancedSearch->SearchValue = @$_GET["x_s_public"];
		$t_question->s_public->AdvancedSearch->SearchOperator = @$_GET["z_s_public"];

		// datetime_hen
		$t_question->datetime_hen->AdvancedSearch->SearchValue = @$_GET["x_datetime_hen"];
		$t_question->datetime_hen->AdvancedSearch->SearchOperator = @$_GET["z_datetime_hen"];
		$t_question->datetime_hen->AdvancedSearch->SearchCondition = @$_GET["v_datetime_hen"];
		$t_question->datetime_hen->AdvancedSearch->SearchValue2 = @$_GET["y_datetime_hen"];
		$t_question->datetime_hen->AdvancedSearch->SearchOperator2 = @$_GET["w_datetime_hen"];

		// datetime_kq
		$t_question->datetime_kq->AdvancedSearch->SearchValue = @$_GET["x_datetime_kq"];
		$t_question->datetime_kq->AdvancedSearch->SearchOperator = @$_GET["z_datetime_kq"];
		$t_question->datetime_kq->AdvancedSearch->SearchCondition = @$_GET["v_datetime_kq"];
		$t_question->datetime_kq->AdvancedSearch->SearchValue2 = @$_GET["y_datetime_kq"];
		$t_question->datetime_kq->AdvancedSearch->SearchOperator2 = @$_GET["w_datetime_kq"];

		// reason
		$t_question->reason->AdvancedSearch->SearchValue = @$_GET["x_reason"];
		$t_question->reason->AdvancedSearch->SearchOperator = @$_GET["z_reason"];
                
                // ID_Group
		$t_question->ID_Group->AdvancedSearch->SearchValue = @$_GET["x_ID_Group"];
		$t_question->ID_Group->AdvancedSearch->SearchOperator = @$_GET["z_ID_Group"];
                
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $t_question;

		// Call Recordset Selecting event
		$t_question->Recordset_Selecting($t_question->CurrentFilter);

		// Load list page SQL
		$sSql = $t_question->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$t_question->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $t_question;
		$sFilter = $t_question->KeyFilter();

		// Call Row Selecting event
		$t_question->Row_Selecting($sFilter);

		// Load sql based on filter
		$t_question->CurrentFilter = $sFilter;
		$sSql = $t_question->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$t_question->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $t_question;
		$t_question->question_id->setDbValue($rs->fields('question_id'));
		$t_question->cat_question_id->setDbValue($rs->fields('cat_question_id'));
		$t_question->IDcard->setDbValue($rs->fields('IDcard'));
		$t_question->datetime_h->setDbValue($rs->fields('datetime_h'));
		$t_question->msv_id->setDbValue($rs->fields('msv_id'));
		$t_question->zemail->setDbValue($rs->fields('email'));
		$t_question->user_name->setDbValue($rs->fields('user_name'));
		$t_question->tel->setDbValue($rs->fields('tel'));
		$t_question->content->setDbValue($rs->fields('content'));
		$t_question->content1->setDbValue($rs->fields('content1'));
		$t_question->content2->setDbValue($rs->fields('content2'));
		$t_question->description->setDbValue($rs->fields('description'));
		$t_question->status->setDbValue($rs->fields('status'));
		$t_question->active->setDbValue($rs->fields('active'));
		$t_question->s_level->setDbValue($rs->fields('s_level'));
		$t_question->s_Multi->setDbValue($rs->fields('s_Multi'));
		$t_question->s_ok->setDbValue($rs->fields('s_ok'));
		$t_question->s_number->setDbValue($rs->fields('s_number'));
		$t_question->s_finish->setDbValue($rs->fields('s_finish'));
		$t_question->status_faq->setDbValue($rs->fields('status_faq'));
		$t_question->s_public->setDbValue($rs->fields('s_public'));
		$t_question->datetime_hen->setDbValue($rs->fields('datetime_hen'));
		$t_question->datetime_kq->setDbValue($rs->fields('datetime_kq'));
		$t_question->reason->setDbValue($rs->fields('reason'));
                $t_question->ID_Group->setDbValue($rs->fields('ID_Group'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $t_question;

		// Call Row_Rendering event
		$t_question->Row_Rendering();

		// Common render codes for all row types
                
                // question_id

		$t_question->question_id->CellCssStyle = "";
		$t_question->question_id->CellCssClass = "";
		// cat_question_id

		$t_question->cat_question_id->CellCssStyle = "";
		$t_question->cat_question_id->CellCssClass = "";

		// IDcard
		$t_question->IDcard->CellCssStyle = "";
		$t_question->IDcard->CellCssClass = "";

		// datetime_h
		$t_question->datetime_h->CellCssStyle = "";
		$t_question->datetime_h->CellCssClass = "";

		// msv_id
		$t_question->msv_id->CellCssStyle = "";
		$t_question->msv_id->CellCssClass = "";

		// status
		$t_question->status->CellCssStyle = "";
		$t_question->status->CellCssClass = "";

		// active
		$t_question->active->CellCssStyle = "";
		$t_question->active->CellCssClass = "";

		// s_level
		$t_question->s_level->CellCssStyle = "";
		$t_question->s_level->CellCssClass = "";

		// s_Multi
		$t_question->s_Multi->CellCssStyle = "";
		$t_question->s_Multi->CellCssClass = "";

		// s_ok
		$t_question->s_ok->CellCssStyle = "";
		$t_question->s_ok->CellCssClass = "";

		// s_number
		$t_question->s_number->CellCssStyle = "";
		$t_question->s_number->CellCssClass = "";

		// s_finish
		$t_question->s_finish->CellCssStyle = "";
		$t_question->s_finish->CellCssClass = "";

		// status_faq
		$t_question->status_faq->CellCssStyle = "";
		$t_question->status_faq->CellCssClass = "";
                
                // description
                $t_question->description->CellCssStyle = "";
                $t_question->description->CellCssClass = "";
                
		// s_public
		$t_question->s_public->CellCssStyle = "";
		$t_question->s_public->CellCssClass = "";

		// datetime_hen
		$t_question->datetime_hen->CellCssStyle = "";
		$t_question->datetime_hen->CellCssClass = "";

		// datetime_kq
		$t_question->datetime_kq->CellCssStyle = "";
		$t_question->datetime_kq->CellCssClass = "";
		if ($t_question->RowType == EW_ROWTYPE_VIEW) { // View row

			// question_id
			$t_question->question_id->ViewValue = $t_question->question_id->CurrentValue;
			$t_question->question_id->CssStyle = "";
			$t_question->question_id->CssClass = "";
			$t_question->question_id->ViewCustomAttributes = "";
                        // cat_question_id
			$t_question->cat_question_id->ViewValue = $t_question->cat_question_id->CurrentValue;
			$t_question->cat_question_id->CssStyle = "";
			$t_question->cat_question_id->CssClass = "";
			$t_question->cat_question_id->ViewCustomAttributes = "";

			// IDcard
			$t_question->IDcard->ViewValue = $t_question->IDcard->CurrentValue;
			$t_question->IDcard->CssStyle = "";
			$t_question->IDcard->CssClass = "";
			$t_question->IDcard->ViewCustomAttributes = "";

			// datetime_h
			$t_question->datetime_h->ViewValue = $t_question->datetime_h->CurrentValue;
			$t_question->datetime_h->ViewValue = ew_FormatDateTime($t_question->datetime_h->ViewValue, 7);
			$t_question->datetime_h->CssStyle = "";
			$t_question->datetime_h->CssClass = "";
			$t_question->datetime_h->ViewCustomAttributes = "";

			// msv_id
			$t_question->msv_id->ViewValue = $t_question->msv_id->CurrentValue;
			$t_question->msv_id->CssStyle = "";
			$t_question->msv_id->CssClass = "";
			$t_question->msv_id->ViewCustomAttributes = "";

			// email
			$t_question->zemail->ViewValue = $t_question->zemail->CurrentValue;
			$t_question->zemail->CssStyle = "";
			$t_question->zemail->CssClass = "";
			$t_question->zemail->ViewCustomAttributes = "";

			// user_name
			$t_question->user_name->ViewValue = $t_question->user_name->CurrentValue;
			$t_question->user_name->CssStyle = "";
			$t_question->user_name->CssClass = "";
			$t_question->user_name->ViewCustomAttributes = "";

			// tel
			$t_question->tel->ViewValue = $t_question->tel->CurrentValue;
			$t_question->tel->CssStyle = "";
			$t_question->tel->CssClass = "";
			$t_question->tel->ViewCustomAttributes = "";
                        
                        // description
			$t_question->description->ViewValue = $t_question->description->CurrentValue;
			$t_question->description->CssStyle = "";
			$t_question->description->CssClass = "";
			$t_question->description->ViewCustomAttributes = "";
                        
                        
			// status
			if (strval($t_question->status->CurrentValue) <> "") {
				switch ($t_question->status->CurrentValue) {
					case "0":
						$t_question->status->ViewValue = "<div style=\"position:relative;\">Kiểm tra<img style=\"position:absolute;right:0;top:0;width:30px\" src=\"images/new.gif\"></div>";
						break;
					case "1":
						$t_question->status->ViewValue = "Xử lý";
						break;
                                            case "2":
						$t_question->status->ViewValue = "Tiếp nhận";
						break;
                                            case "3":
						$t_question->status->ViewValue = "Đã chuyển";
						break;
					default:
						$t_question->status->ViewValue = $t_question->status->CurrentValue;
				}
			} else {
				$t_question->status->ViewValue = NULL;
			}
			$t_question->status->CssStyle = "";
			$t_question->status->CssClass = "";
			$t_question->status->ViewCustomAttributes = "";

			// active
			if (strval($t_question->active->CurrentValue) <> "") {
				switch ($t_question->active->CurrentValue) {
					case "0":
						$t_question->active->ViewValue = "<div style=\"position:relative;\">Chưa<img style=\"position:absolute;right:0;top:0;width:30px\" src=\"images/new.gif\"></div>";
						break;
					case "1":
						$t_question->active->ViewValue = "Xong";
						break;
					default:
						$t_question->active->ViewValue = $t_question->active->CurrentValue;
				}
			} else {
				$t_question->active->ViewValue = NULL;
			}
			$t_question->active->CssStyle = "";
			$t_question->active->CssClass = "";
			$t_question->active->ViewCustomAttributes = "";

			// s_level
			if (strval($t_question->s_level->CurrentValue) <> "") {
				switch ($t_question->s_level->CurrentValue) {
					case "0":
						$t_question->s_level->ViewValue = "Bình thường";
						break;
					case "1":
						$t_question->s_level->ViewValue = "Trung bình";
						break;
					case "2":
						$t_question->s_level->ViewValue = "Khẩn";
						break;
					case "3":
						$t_question->s_level->ViewValue = "Cực khẩn";
						break;
					default:
						$t_question->s_level->ViewValue = $t_question->s_level->CurrentValue;
				}
			} else {
				$t_question->s_level->ViewValue = NULL;
			}
			$t_question->s_level->CssStyle = "";
			$t_question->s_level->CssClass = "";
			$t_question->s_level->ViewCustomAttributes = "";

			// s_Multi
			if (strval($t_question->s_Multi->CurrentValue) <> "") {
				switch ($t_question->s_Multi->CurrentValue) {
					case "0":
						$t_question->s_Multi->ViewValue = "Đơn Xử lý";
						break;
					case "1":
						$t_question->s_Multi->ViewValue = "Đa Xử lý";
						break;
					default:
						$t_question->s_Multi->ViewValue = $t_question->s_Multi->CurrentValue;
				}
			} else {
				$t_question->s_Multi->ViewValue = NULL;
			}
			$t_question->s_Multi->CssStyle = "";
			$t_question->s_Multi->CssClass = "";
			$t_question->s_Multi->ViewCustomAttributes = "";

			// s_ok
			if (strval($t_question->s_ok->CurrentValue) <> "") {
				switch ($t_question->s_ok->CurrentValue) {
					case "0":
						$t_question->s_ok->ViewValue = "Không";
						break;
					case "1":
						$t_question->s_ok->ViewValue = "Hài lòng";
						break;
					default:
						$t_question->s_ok->ViewValue = $t_question->s_ok->CurrentValue;
				}
			} else {
				$t_question->s_ok->ViewValue = NULL;
			}
			$t_question->s_ok->CssStyle = "";
			$t_question->s_ok->CssClass = "";
			$t_question->s_ok->ViewCustomAttributes = "";

			// s_number
			$t_question->s_number->ViewValue = $t_question->s_number->CurrentValue;
			$t_question->s_number->CssStyle = "";
			$t_question->s_number->CssClass = "";
			$t_question->s_number->ViewCustomAttributes = "";

			// s_finish
			if (strval($t_question->s_finish->CurrentValue) <> "") {
				switch ($t_question->s_finish->CurrentValue) {
					case "0":
						$t_question->s_finish->ViewValue = "Chưa";
						break;
					case "1":
						$t_question->s_finish->ViewValue = "Kết thúc";
						break;
					default:
						$t_question->s_finish->ViewValue = $t_question->s_finish->CurrentValue;
				}
			} else {
				$t_question->s_finish->ViewValue = NULL;
			}
			$t_question->s_finish->CssStyle = "";
			$t_question->s_finish->CssClass = "";
			$t_question->s_finish->ViewCustomAttributes = "";

			// status_faq
			if (strval($t_question->status_faq->CurrentValue) <> "") {
				switch ($t_question->status_faq->CurrentValue) {
					case "0":
						$t_question->status_faq->ViewValue = "Không";
						break;
					case "1":
						$t_question->status_faq->ViewValue = "FAQ";
						break;
					default:
						$t_question->status_faq->ViewValue = $t_question->status_faq->CurrentValue;
				}
			} else {
				$t_question->status_faq->ViewValue = NULL;
			}
			$t_question->status_faq->CssStyle = "";
			$t_question->status_faq->CssClass = "";
			$t_question->status_faq->ViewCustomAttributes = "";

			// s_public
			if (strval($t_question->s_public->CurrentValue) <> "") {
				switch ($t_question->s_public->CurrentValue) {
					case "0":
						$t_question->s_public->ViewValue = "Chưa";
						break;
					case "1":
						$t_question->s_public->ViewValue = "Xuất bản";
						break;
					default:
						$t_question->s_public->ViewValue = $t_question->s_public->CurrentValue;
				}
			} else {
				$t_question->s_public->ViewValue = NULL;
			}
			$t_question->s_public->CssStyle = "";
			$t_question->s_public->CssClass = "";
			$t_question->s_public->ViewCustomAttributes = "";

			// datetime_hen
			$t_question->datetime_hen->ViewValue = $t_question->datetime_hen->CurrentValue;
			$t_question->datetime_hen->ViewValue = ew_FormatDateTime($t_question->datetime_hen->ViewValue, 7);
			$t_question->datetime_hen->CssStyle = "";
			$t_question->datetime_hen->CssClass = "";
			$t_question->datetime_hen->ViewCustomAttributes = "";

			// datetime_kq
			$t_question->datetime_kq->ViewValue = $t_question->datetime_kq->CurrentValue;
			$t_question->datetime_kq->ViewValue = ew_FormatDateTime($t_question->datetime_kq->ViewValue, 7);
			$t_question->datetime_kq->CssStyle = "";
			$t_question->datetime_kq->CssClass = "";
			$t_question->datetime_kq->ViewCustomAttributes = "";

			// cat_question_id
			$t_question->cat_question_id->HrefValue = "";

			// IDcard
			$t_question->IDcard->HrefValue = "";

			// datetime_h
			$t_question->datetime_h->HrefValue = "";

			// msv_id
			$t_question->msv_id->HrefValue = "";

			// status
			$t_question->status->HrefValue = "";

			// active
			$t_question->active->HrefValue = "";

			// s_level
			$t_question->s_level->HrefValue = "";

			// s_Multi
			$t_question->s_Multi->HrefValue = "";

			// s_ok
			$t_question->s_ok->HrefValue = "";

			// s_number
			$t_question->s_number->HrefValue = "";

			// s_finish
			$t_question->s_finish->HrefValue = "";

			// status_faq
			$t_question->status_faq->HrefValue = "";

			// s_public
			$t_question->s_public->HrefValue = "";

                        // description
			$t_question->description->HrefValue = "";
                        
			// datetime_hen
			$t_question->datetime_hen->HrefValue = "";

			// datetime_kq
			$t_question->datetime_kq->HrefValue = "";
		} elseif ($t_question->RowType == EW_ROWTYPE_SEARCH) { // Search row

			// cat_question_id
			$t_question->cat_question_id->EditCustomAttributes = "";
			$t_question->cat_question_id->EditValue = ew_HtmlEncode($t_question->cat_question_id->AdvancedSearch->SearchValue);

			// IDcard
			$t_question->IDcard->EditCustomAttributes = "";
			$t_question->IDcard->EditValue = ew_HtmlEncode($t_question->IDcard->AdvancedSearch->SearchValue);

			// datetime_h
			$t_question->datetime_h->EditCustomAttributes = "";
			$t_question->datetime_h->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_question->datetime_h->AdvancedSearch->SearchValue, 7), 7));
			$t_question->datetime_h->EditCustomAttributes = "";
			$t_question->datetime_h->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_question->datetime_h->AdvancedSearch->SearchValue2, 7), 7));

			// msv_id
			$t_question->msv_id->EditCustomAttributes = "";
			$t_question->msv_id->EditValue = ew_HtmlEncode($t_question->msv_id->AdvancedSearch->SearchValue);

			// status
			$t_question->status->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Kiểm tra");
			$arwrk[] = array("1", "Xử lý");
                        $arwrk[] = array("2", "Tiếp nhận");
                        $arwrk[] = array("3", "Đã chuyển");
			array_unshift($arwrk, array("", "Chọn"));
			$t_question->status->EditValue = $arwrk;

			// active
			$t_question->active->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Chưa Xong");
			$arwrk[] = array("1", "Trả lời");
			array_unshift($arwrk, array("", "Chọn"));
			$t_question->active->EditValue = $arwrk;

			// s_level
			$t_question->s_level->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Bình thường");
			$arwrk[] = array("1", "Trung bình");
			$arwrk[] = array("2", "Khẩn");
			$arwrk[] = array("3", "Cực khẩn");
			array_unshift($arwrk, array("", "Chọn"));
			$t_question->s_level->EditValue = $arwrk;

			// s_Multi
			$t_question->s_Multi->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Đơn Xử lý");
			$arwrk[] = array("1", "Đa Xử lý");
			array_unshift($arwrk, array("", "Chọn"));
			$t_question->s_Multi->EditValue = $arwrk;

			// s_ok
			$t_question->s_ok->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Chưa");
			$arwrk[] = array("1", "Hài lòng");
			array_unshift($arwrk, array("", "Chọn"));
			$t_question->s_ok->EditValue = $arwrk;

			// s_number
			$t_question->s_number->EditCustomAttributes = "";
			$t_question->s_number->EditValue = ew_HtmlEncode($t_question->s_number->AdvancedSearch->SearchValue);

			// s_finish
			$t_question->s_finish->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Chưa");
			$arwrk[] = array("1", "Kết thúc");
			array_unshift($arwrk, array("", "Chọn"));
			$t_question->s_finish->EditValue = $arwrk;

			// status_faq
			$t_question->status_faq->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không");
			$arwrk[] = array("1", "FAQ");
			array_unshift($arwrk, array("", "Chọn"));
			$t_question->status_faq->EditValue = $arwrk;

			// s_public
			$t_question->s_public->EditCustomAttributes = "";
			$arwrk = array();
			$arwrk[] = array("0", "Không");
			$arwrk[] = array("1", "Xuất bản");
			array_unshift($arwrk, array("", "Chọn"));
			$t_question->s_public->EditValue = $arwrk;
                        
                        // ID_Group
			$t_question->ID_Group->EditCustomAttributes = "";
			$sSqlWrk = "SELECT `ID`, `NAME`, '' AS Disp2Fld, '' AS SelectFilterFld FROM `t_question_group`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			array_unshift($arwrk, array("", "Please Select"));
			$t_question->ID_Group->EditValue = $arwrk;

			// datetime_hen
			$t_question->datetime_hen->EditCustomAttributes = "";
			$t_question->datetime_hen->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_question->datetime_hen->AdvancedSearch->SearchValue, 7), 7));
			$t_question->datetime_hen->EditCustomAttributes = "";
			$t_question->datetime_hen->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_question->datetime_hen->AdvancedSearch->SearchValue2, 7), 7));

			// datetime_kq
			$t_question->datetime_kq->EditCustomAttributes = "";
			$t_question->datetime_kq->EditValue = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_question->datetime_kq->AdvancedSearch->SearchValue, 7), 7));
			$t_question->datetime_kq->EditCustomAttributes = "";
			$t_question->datetime_kq->EditValue2 = ew_HtmlEncode(ew_FormatDateTime(ew_UnFormatDateTime($t_question->datetime_kq->AdvancedSearch->SearchValue2, 7), 7));
		}

		// Call Row Rendered event
		$t_question->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $t_question;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		if (!ew_CheckInteger($t_question->cat_question_id->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect integer - Nhóm câu hỏi";
		}
		if (!ew_CheckEuroDate($t_question->datetime_h->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Datetime H";
		}
		if (!ew_CheckEuroDate($t_question->datetime_h->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Datetime H";
		}

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
		global $t_question;
		$t_question->question_id->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_question_id");
		$t_question->cat_question_id->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_cat_question_id");
		$t_question->IDcard->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_IDcard");
		$t_question->datetime_h->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_datetime_h");
		$t_question->datetime_h->AdvancedSearch->SearchValue2 = $t_question->getAdvancedSearch("y_datetime_h");
		$t_question->msv_id->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_msv_id");
		$t_question->zemail->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_zemail");
		$t_question->user_name->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_user_name");
		$t_question->tel->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_tel");
		$t_question->content->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_content");
		$t_question->content1->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_content1");
		$t_question->content2->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_content2");
		$t_question->description->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_description");
		$t_question->status->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_status");
		$t_question->active->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_active");
		$t_question->s_level->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_level");
		$t_question->s_Multi->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_Multi");
		$t_question->s_ok->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_ok");
		$t_question->s_number->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_number");
		$t_question->s_finish->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_finish");
		$t_question->status_faq->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_status_faq");
		$t_question->s_public->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_s_public");
		$t_question->datetime_hen->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_datetime_hen");
		$t_question->datetime_hen->AdvancedSearch->SearchValue2 = $t_question->getAdvancedSearch("y_datetime_hen");
		$t_question->datetime_kq->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_datetime_kq");
		$t_question->datetime_kq->AdvancedSearch->SearchValue2 = $t_question->getAdvancedSearch("y_datetime_kq");
		$t_question->reason->AdvancedSearch->SearchValue = $t_question->getAdvancedSearch("x_reason");
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
