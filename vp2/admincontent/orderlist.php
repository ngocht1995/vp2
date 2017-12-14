<?php
session_start(); // Initialize session data
ob_start(); // Turn on output buffering
?>
<?php include "ewcfg6.php" ?>
<?php include "ewmysql6.php" ?>
<?php include "phpfn6.php" ?>
<?php include "orderinfo.php" ?>
<?php include "productsinfo.php" ?>
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
$order_list = new corder_list();
$Page =& $order_list;

// Page init processing
$order_list->Page_Init();

// Page main processing
$order_list->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($order->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var order_list = new ew_Page("order_list");

// page properties
order_list.PageID = "list"; // page ID
var EW_PAGE_ID = order_list.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
order_list.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
order_list.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
order_list.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
order_list.ValidateRequired = false; // no JavaScript validation
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
<?php if ($order->Export == "") { ?>
<?php } ?>
<?php
	$bSelectLimit = ($order->Export == "" && $order->SelectLimit);
	if (!$bSelectLimit)
		$rs = $order_list->LoadRecordset();
	$order_list->lTotalRecs = ($bSelectLimit) ? $order->SelectRecordCount() : $rs->RecordCount();
	$order_list->lStartRec = 1;
	if ($order_list->lDisplayRecs <= 0) // Display all records
		$order_list->lDisplayRecs = $order_list->lTotalRecs;
	if (!($order->ExportAll && $order->Export <> ""))
		$order_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$rs = $order_list->LoadRecordset($order_list->lStartRec-1, $order_list->lDisplayRecs);
?>
<table border="0" width="100%" id="table806" cellspacing="0" cellpadding="0">
							<tr>
								<td height="10" width="46%" background="images/bg-line.gif" valign="top">
								<b><font face="Verdana" size="2" color="#336699">
								&nbsp;&nbsp;&nbsp;Giao dịch thanh toán trực tuyến</font></b></td>
								<td height="20" width="54%" background="images/bg-line.gif" align="right" valign="top">
				&nbsp;</td>
							</tr>
							<tr>
								<td colspan="2" height="5"></td>
							</tr>
</table>
<table cellspacing="0" class="ewGrid"><tr><td class="ewGridContent">
<?php if ($order->Export == "") { ?>
<div class="ewGridUpperPanel">
<?php if ($order->CurrentAction <> "gridadd" && $order->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($order_list->Pager)) $order_list->Pager = new cNumericPager($order_list->lStartRec, $order_list->lDisplayRecs, $order_list->lTotalRecs, $order_list->lRecRange) ?>
<?php if ($order_list->Pager->RecordCount > 0) { ?>
	<?php if ($order_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $order_list->PageUrl() ?>start=<?php echo $order_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($order_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $order_list->PageUrl() ?>start=<?php echo $order_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($order_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $order_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($order_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $order_list->PageUrl() ?>start=<?php echo $order_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($order_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $order_list->PageUrl() ?>start=<?php echo $order_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($order_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Đơn hàng <?php echo $order_list->Pager->FromIndex ?> đến <?php echo $order_list->Pager->ToIndex ?> của <?php echo $order_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($order_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($order_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="order">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($order_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($order_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($order_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($order->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<span class="phpmaker">
<?php if ($order_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.forderlist)) alert('Chưa chọn bản ghi'); else {document.forderlist.action='orderdelete.php';document.forderlist.encoding='application/x-www-form-urlencoded';document.forderlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
</div>
<?php } ?>
<div class="ewGridMiddlePanel">
<form name="forderlist" id="forderlist" class="ewForm" action="" method="post">
<?php if ($order_list->lTotalRecs > 0) { ?>
<table cellspacing="0" rowhighlightclass="ewTableHighlightRow" rowselectclass="ewTableSelectRow" roweditclass="ewTableEditRow" class="ewTable ewTableSeparate">
<?php
	$order_list->lOptionCnt = 0;
if ($Security->CanDelete()) {
	$order_list->lOptionCnt++; // Multi-select
}
	$order_list->lOptionCnt += count($order_list->ListOptions->Items); // Custom list options
?>
<?php echo $order->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php if ($order->Export == "") { ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><input type="checkbox" name="key" id="key" class="phpmaker" onclick="order_list.SelectAllKey(this);"></td>
<?php } ?>
<?php

// Custom list options
foreach ($order_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->HeaderCellHtml;
}
?>
<?php } ?>
<?php if ($order->c_sanpham_id->Visible) { // c_sanpham_id ?>
	<?php if ($order->SortUrl($order->c_sanpham_id) == "") { ?>
		<td>Tên sản phẩm</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $order->SortUrl($order->c_sanpham_id) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tên sản phẩm</td><td style="width: 10px;"><?php if ($order->c_sanpham_id->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($order->c_sanpham_id->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($order->c_soluong->Visible) { // c_soluong ?>
	<?php if ($order->SortUrl($order->c_soluong) == "") { ?>
		<td>Số lượng</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $order->SortUrl($order->c_soluong) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Số lượng</td><td style="width: 10px;"><?php if ($order->c_soluong->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($order->c_soluong->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($order->c_dongia->Visible) { // c_dongia ?>
	<?php if ($order->SortUrl($order->c_dongia) == "") { ?>
		<td>Đơn giá</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $order->SortUrl($order->c_dongia) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Đơn giá</td><td style="width: 10px;"><?php if ($order->c_dongia->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($order->c_dongia->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($order->c_time_order->Visible) { // c_time_order ?>
	<?php if ($order->SortUrl($order->c_time_order) == "") { ?>
		<td>Thời gian đặt hàng</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $order->SortUrl($order->c_time_order) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thời gian đặt hàng</td><td style="width: 10px;"><?php if ($order->c_time_order->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($order->c_time_order->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($order->c_checkout_type->Visible) { // c_checkout_type ?>
	<?php if ($order->SortUrl($order->c_checkout_type) == "") { ?>
		<td>Kiểu thanh toán</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $order->SortUrl($order->c_checkout_type) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Kiểu thanh toán</td><td style="width: 10px;"><?php if ($order->c_checkout_type->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($order->c_checkout_type->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($order->c_time_checkout->Visible) { // c_time_checkout ?>
	<?php if ($order->SortUrl($order->c_time_checkout) == "") { ?>
		<td>Thời gian thanh toán</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $order->SortUrl($order->c_time_checkout) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Thời gian thanh toán</td><td style="width: 10px;"><?php if ($order->c_time_checkout->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($order->c_time_checkout->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($order->c_so_hd->Visible) { // c_so_hd ?>
	<?php if ($order->SortUrl($order->c_so_hd) == "") { ?>
		<td>Mã đơn hàng</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $order->SortUrl($order->c_so_hd) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Mã đơn hàng</td><td style="width: 10px;"><?php if ($order->c_so_hd->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($order->c_so_hd->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($order->c_tonggiatri->Visible) { // c_tonggiatri ?>
	<?php if ($order->SortUrl($order->c_tonggiatri) == "") { ?>
		<td>Tổng tiền</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $order->SortUrl($order->c_tonggiatri) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tổng tiền</td><td style="width: 10px;"><?php if ($order->c_tonggiatri->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($order->c_tonggiatri->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($order->c_status_thanhtoan->Visible) { // c_status_thanhtoan ?>
	<?php if ($order->SortUrl($order->c_status_thanhtoan) == "") { ?>
		<td>Tổng tiền</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $order->SortUrl($order->c_status_thanhtoan) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Tổng tiền</td><td style="width: 10px;"><?php if ($order->c_status_thanhtoan->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($order->c_status_thanhtoan->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
<?php if ($order->c_doitac->Visible) { // c_doitac ?>
	<?php if ($order->SortUrl($order->c_doitac) == "") { ?>
		<td>Đối tác</td>
	<?php } else { ?>
		<td class="ewPointer" onmousedown="ew_Sort(event,'<?php echo $order->SortUrl($order->c_doitac) ?>',1);">
			<table cellspacing="0" class="ewTableHeaderBtn"><tr><td>Đối tác</td><td style="width: 10px;"><?php if ($order->c_doitac->getSort() == "ASC") { ?><img src="images/sortup.gif" width="10" height="9" border="0"><?php } elseif ($order->c_doitac->getSort() == "DESC") { ?><img src="images/sortdown.gif" width="10" height="9" border="0"><?php } ?></td></tr></table>
		</td>
	<?php } ?>
<?php } ?>		
	</tr>
</thead>
<?php
if ($order->ExportAll && $order->Export <> "") {
	$order_list->lStopRec = $order_list->lTotalRecs;
} else {
	$order_list->lStopRec = $order_list->lStartRec + $order_list->lDisplayRecs - 1; // Set the last record to display
}
$order_list->lRecCount = $order_list->lStartRec - 1;
if ($rs && !$rs->EOF) {
	$rs->MoveFirst();
	if (!$order->SelectLimit && $order_list->lStartRec > 1)
		$rs->Move($order_list->lStartRec - 1);
}
$order_list->lRowCnt = 0;
while (($order->CurrentAction == "gridadd" || !$rs->EOF) &&
	$order_list->lRecCount < $order_list->lStopRec) {
	$order_list->lRecCount++;
	if (intval($order_list->lRecCount) >= intval($order_list->lStartRec)) {
		$order_list->lRowCnt++;

	// Init row class and style
	$order->CssClass = "";
	$order->CssStyle = "";
	$order->RowClientEvents = "onmouseover='ew_MouseOver(event, this);' onmouseout='ew_MouseOut(event, this);' onclick='ew_Click(event, this);'";
	if ($order->CurrentAction == "gridadd") {
		$order_list->LoadDefaultValues(); // Load default values
	} else {
		$order_list->LoadRowValues($rs); // Load row values
	}
	$order->RowType = EW_ROWTYPE_VIEW; // Render view

	// Render row
	$order_list->RenderRow();
?>
	<tr<?php echo $order->RowAttributes() ?>>
<?php if ($order->Export == "") { ?>
<?php if ($Security->CanDelete()) { ?>
<td style="white-space: nowrap;"><span class="phpmaker">
<input type="checkbox" name="key_m[]" id="key_m[]"  value="<?php echo ew_HtmlEncode($order->order_id->CurrentValue) ?>" class="phpmaker" onclick='ew_ClickMultiCheckbox(this);'>
</span></td>
<?php } ?>
<?php

// Custom list options
foreach ($order_list->ListOptions->Items as $ListOption) {
	if ($ListOption->Visible)
		echo $ListOption->BodyCellHtml;
}
?>
<?php } ?>
	<?php if ($order->c_sanpham_id->Visible) { // c_sanpham_id ?>
		<td<?php echo $order->c_sanpham_id->CellAttributes() ?>>
<div<?php echo $order->c_sanpham_id->ViewAttributes() ?>><?php echo $order->c_sanpham_id->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($order->c_soluong->Visible) { // c_soluong ?>
		<td<?php echo $order->c_soluong->CellAttributes() ?>>
<div<?php echo $order->c_soluong->ViewAttributes() ?>><?php echo $order->c_soluong->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($order->c_dongia->Visible) { // c_dongia ?>
		<td<?php echo $order->c_dongia->CellAttributes() ?>>
<div<?php echo $order->c_dongia->ViewAttributes() ?>><?php echo $order->c_dongia->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($order->c_time_order->Visible) { // c_time_order ?>
		<td<?php echo $order->c_time_order->CellAttributes() ?>>
<div<?php echo $order->c_time_order->ViewAttributes() ?>><?php echo $order->c_time_order->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($order->c_checkout_type->Visible) { // c_checkout_type ?>
		<td<?php echo $order->c_checkout_type->CellAttributes() ?>>
<div<?php echo $order->c_checkout_type->ViewAttributes() ?>><?php echo $order->c_checkout_type->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($order->c_time_checkout->Visible) { // c_time_checkout ?>
		<td<?php echo $order->c_time_checkout->CellAttributes() ?>>
<div<?php echo $order->c_time_checkout->ViewAttributes() ?>><?php echo $order->c_time_checkout->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($order->c_so_hd->Visible) { // c_so_hd ?>
		<td<?php echo $order->c_so_hd->CellAttributes() ?>>
<div<?php echo $order->c_so_hd->ViewAttributes() ?>><?php echo $order->c_so_hd->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($order->c_tonggiatri->Visible) { // c_tonggiatri ?>
		<td<?php echo $order->c_tonggiatri->CellAttributes() ?>>
<div<?php echo $order->c_tonggiatri->ViewAttributes() ?>><?php echo $order->c_tonggiatri->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($order->c_status_thanhtoan->Visible) { // c_status_thanhtoan ?>
		<td<?php echo $order->c_status_thanhtoan->CellAttributes() ?>>
<div<?php echo $order->c_status_thanhtoan->ViewAttributes() ?>><?php echo $order->c_status_thanhtoan->ListViewValue() ?></div>
</td>
	<?php } ?>
	<?php if ($order->c_doitac->Visible) { // c_doitac ?>
		<td<?php echo $order->c_doitac->CellAttributes() ?>>
<div<?php echo $order->c_doitac->ViewAttributes() ?>><?php echo $order->c_doitac->ListViewValue() ?></div>
</td>
	<?php } ?>
	</tr>
<?php
	}
	if ($order->CurrentAction <> "gridadd")
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
<?php if ($order_list->lTotalRecs > 0) { ?>
<?php if ($order->Export == "") { ?>
<div class="ewGridLowerPanel">
<?php if ($order->CurrentAction <> "gridadd" && $order->CurrentAction <> "gridedit") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($order_list->Pager)) $order_list->Pager = new cNumericPager($order_list->lStartRec, $order_list->lDisplayRecs, $order_list->lTotalRecs, $order_list->lRecRange) ?>
<?php if ($order_list->Pager->RecordCount > 0) { ?>
	<?php if ($order_list->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $order_list->PageUrl() ?>start=<?php echo $order_list->Pager->FirstButton->Start ?>"><b>Đầu</b></a>&nbsp;
	<?php } ?>
	<?php if ($order_list->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $order_list->PageUrl() ?>start=<?php echo $order_list->Pager->PrevButton->Start ?>"><b>Trước</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($order_list->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $order_list->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($order_list->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $order_list->PageUrl() ?>start=<?php echo $order_list->Pager->NextButton->Start ?>"><b>Sau</b></a>&nbsp;
	<?php } ?>
	<?php if ($order_list->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $order_list->PageUrl() ?>start=<?php echo $order_list->Pager->LastButton->Start ?>"><b>Cuối</b></a>&nbsp;
	<?php } ?>
	<?php if ($order_list->Pager->ButtonCount > 0) { ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php } ?>
	Đơn hàng <?php echo $order_list->Pager->FromIndex ?> đến <?php echo $order_list->Pager->ToIndex ?> của <?php echo $order_list->Pager->RecordCount ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($order_list->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	Không có dữ liệu
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
<?php if ($order_list->lTotalRecs > 0) { ?>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td><table border="0" cellspacing="0" cellpadding="0"><tr><td>Số hiển thị&nbsp;</td><td>
<input type="hidden" id="t" name="t" value="order">
<select name="<?php echo EW_TABLE_REC_PER_PAGE ?>" id="<?php echo EW_TABLE_REC_PER_PAGE ?>" onchange="this.form.submit();" class="phpmaker">
<option value="10"<?php if ($order_list->lDisplayRecs == 10) { ?> selected="selected"<?php } ?>>10</option>
<option value="20"<?php if ($order_list->lDisplayRecs == 20) { ?> selected="selected"<?php } ?>>20</option>
<option value="50"<?php if ($order_list->lDisplayRecs == 50) { ?> selected="selected"<?php } ?>>50</option>
<option value="ALL"<?php if ($order->getRecordsPerPage() == -1) { ?> selected="selected"<?php } ?>>Tất cả</option>
</select></td></tr></table>
		</td>
<?php } ?>
	</tr>
</table>
</form>
<?php } ?>
<?php //if ($order_list->lTotalRecs > 0) { ?>
<span class="phpmaker">
<?php if ($order_list->lTotalRecs > 0) { ?>
<?php if ($Security->CanDelete()) { ?>
<a href="" onclick="if (!ew_KeySelected(document.forderlist)) alert('Chưa chọn bản ghi'); else {document.forderlist.action='orderdelete.php';document.forderlist.encoding='application/x-www-form-urlencoded';document.forderlist.submit();};return false;"><img border="0" src="images/cmd_xoa.gif"></a>&nbsp;&nbsp;
<?php } ?>
<?php } ?>
</span>
<?php //} ?>
</div>
<?php } ?>
<?php } ?>
</td></tr></table>
<?php if ($order->Export == "" && $order->CurrentAction == "") { ?>
<script type="text/javascript">
<!--

//ew_ToggleSearchPanel(order_list); // uncomment to init search panel as collapsed
//-->

</script>
<?php } ?>
<?php if ($order->Export == "") { ?>
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
class corder_list {

	// Page ID
	var $PageID = 'list';

	// Table Name
	var $TableName = 'order';

	// Page Object Name
	var $PageObjName = 'order_list';

	// Page Name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page Url
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		global $order;
		if ($order->UseTokenInUrl) $PageUrl .= "t=" . $order->TableVar . "&"; // add page token
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
		global $objForm, $order;
		if ($order->UseTokenInUrl) {

			//IsPageRequest = False
			if ($objForm)
				return ($order->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($order->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}

	//
	//  Class initialize
	//  - init objects
	//  - open connection
	//
	function corder_list() {
		global $conn;

		// Initialize table object
		$GLOBALS["order"] = new corder();

		// Initialize other table object
		$GLOBALS['products'] = new cproducts();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Initialize table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'order', TRUE);

		// Open connection to the database
		$conn = ew_Connect();

		// Initialize list options
		$this->ListOptions = new cListOptions();
	}

	// 
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsExportFile, $order;
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
		if ($Security->IsLoggedIn() && $Security->CurrentUserID() == "") {
			$_SESSION[EW_SESSION_MESSAGE] = "You do not have the right permission to view the page";
			$this->Page_Terminate();
		}
	$order->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $order->Export; // Get export parameter, used in header
	$gsExportFile = $order->TableVar; // Get export file, used in header

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
		global $objForm, $gsSearchError, $Security, $order;
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

			// Get search criteria for advanced search
			$this->LoadSearchValues(); // Get search values
			if ($this->ValidateSearch()) {
				$sSrchAdvanced = $this->AdvancedSearchWhere();
			} else {
				$this->setMessage($gsSearchError);
			}

			// Set Up Sorting Order
			$this->SetUpSortOrder();
		} // End Validate Request

		// Restore display records
		if ($order->getRecordsPerPage() <> "") {
			$this->lDisplayRecs = $order->getRecordsPerPage(); // Restore from Session
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
		$order->Recordset_Searching($this->sSrchWhere);

		// Save search criteria
		if ($this->sSrchWhere <> "") {
			if ($sSrchAdvanced == "")
				$this->ResetAdvancedSearchParms();
			$order->setSearchWhere($this->sSrchWhere); // Save to Session
			$this->lStartRec = 1; // Reset start record counter
			$order->setStartRecordNumber($this->lStartRec);
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
		$order->setSessionWhere($sFilter);
		$order->CurrentFilter = "";
	}

	// Set up number of records displayed per page
	function SetUpDisplayRecs() {
		global $order;
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
			$order->setRecordsPerPage($this->lDisplayRecs); // Save to Session

			// Reset start position
			$this->lStartRec = 1;
			$order->setStartRecordNumber($this->lStartRec);
		}
	}

	// Return Advanced Search Where based on QueryString parameters
	function AdvancedSearchWhere() {
		global $Security, $order;
		$sWhere = "";
		if (!$Security->CanSearch()) return "";
		$this->BuildSearchSql($sWhere, $order->c_sanpham_id, FALSE); // Field c_sanpham_id
		$this->BuildSearchSql($sWhere, $order->c_soluong, FALSE); // Field c_soluong
		$this->BuildSearchSql($sWhere, $order->c_dongia, FALSE); // Field c_dongia
		$this->BuildSearchSql($sWhere, $order->c_time_order, FALSE); // Field c_time_order
		$this->BuildSearchSql($sWhere, $order->c_checkout_type, FALSE); // Field c_checkout_type
		$this->BuildSearchSql($sWhere, $order->c_time_checkout, FALSE); // Field c_time_checkout
		$this->BuildSearchSql($sWhere, $order->c_so_hd, FALSE); // Field c_so_hd
		$this->BuildSearchSql($sWhere, $order->c_tonggiatri, FALSE); // Field c_tonggiatri
		$this->BuildSearchSql($sWhere, $order->c_status_thanhtoan, FALSE); // Field c_status_thanhtoan
		$this->BuildSearchSql($sWhere, $order->c_doitac, FALSE); // Field c_doitac

		// Set up search parm
		if ($sWhere <> "") {
			$this->SetSearchParm($order->c_sanpham_id); // Field c_sanpham_id
			$this->SetSearchParm($order->c_soluong); // Field c_soluong
			$this->SetSearchParm($order->c_dongia); // Field c_dongia
			$this->SetSearchParm($order->c_time_order); // Field c_time_order
			$this->SetSearchParm($order->c_checkout_type); // Field c_checkout_type
			$this->SetSearchParm($order->c_time_checkout); // Field c_time_checkout
			$this->SetSearchParm($order->c_so_hd); // Field c_so_hd
			$this->SetSearchParm($order->c_tonggiatri); // Field c_tonggiatri
			$this->SetSearchParm($order->c_status_thanhtoan); // Field c_status_thanhtoan
			$this->SetSearchParm($order->c_doitac); // Field c_doitac
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
		global $order;
		$FldParm = substr($Fld->FldVar, 2);
		$FldVal = $Fld->AdvancedSearch->SearchValue; // @$_GET["x_$FldParm"]
		$FldVal = ew_StripSlashes($FldVal);
		if (is_array($FldVal)) $FldVal = implode(",", $FldVal);
		$FldVal2 = $Fld->AdvancedSearch->SearchValue2; // @$_GET["y_$FldParm"]
		$FldVal2 = ew_StripSlashes($FldVal2);
		if (is_array($FldVal2)) $FldVal2 = implode(",", $FldVal2);
		$order->setAdvancedSearch("x_$FldParm", $FldVal);
		$order->setAdvancedSearch("z_$FldParm", $Fld->AdvancedSearch->SearchOperator); // @$_GET["z_$FldParm"]
		$order->setAdvancedSearch("v_$FldParm", $Fld->AdvancedSearch->SearchCondition); // @$_GET["v_$FldParm"]
		$order->setAdvancedSearch("y_$FldParm", $FldVal2);
		$order->setAdvancedSearch("w_$FldParm", $Fld->AdvancedSearch->SearchOperator2); // @$_GET["w_$FldParm"]
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

	// Clear all search parameters
	function ResetSearchParms() {

		// Clear search where
		global $order;
		$this->sSrchWhere = "";
		$order->setSearchWhere($this->sSrchWhere);

		// Clear advanced search parameters
		$this->ResetAdvancedSearchParms();
	}

	// Clear all advanced search parameters
	function ResetAdvancedSearchParms() {

		// Clear advanced search parameters
		global $order;
		$order->setAdvancedSearch("x_c_sanpham_id", "");
		$order->setAdvancedSearch("x_c_soluong", "");
		$order->setAdvancedSearch("x_c_dongia", "");
		$order->setAdvancedSearch("x_c_time_order", "");
		$order->setAdvancedSearch("y_c_time_order", "");
		$order->setAdvancedSearch("x_c_checkout_type", "");
		$order->setAdvancedSearch("x_c_time_checkout", "");
		$order->setAdvancedSearch("y_c_time_checkout", "");
		$order->setAdvancedSearch("x_c_so_hd", "");
		$order->setAdvancedSearch("x_c_tonggiatri", "");
		$order->setAdvancedSearch("x_c_status_thanhtoan", "");
		$order->setAdvancedSearch("x_c_doitac", "");
	}

	// Restore all search parameters
	function RestoreSearchParms() {
		global $gsSearchError, $order;
		$this->sSrchWhere = $order->getSearchWhere();

		// Restore advanced search settings
		if ($gsSearchError == "")
			$this->RestoreAdvancedSearchParms();
	}

	// Restore all advanced search parameters
	function RestoreAdvancedSearchParms() {

		// Restore advanced search parms
		global $order;
		 $order->c_sanpham_id->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_sanpham_id");
		 $order->c_soluong->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_soluong");
		 $order->c_dongia->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_dongia");
		 $order->c_time_order->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_time_order");
		 $order->c_time_order->AdvancedSearch->SearchValue2 = $order->getAdvancedSearch("y_c_time_order");
		 $order->c_checkout_type->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_checkout_type");
		 $order->c_time_checkout->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_time_checkout");
		 $order->c_time_checkout->AdvancedSearch->SearchValue2 = $order->getAdvancedSearch("y_c_time_checkout");
		 $order->c_so_hd->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_so_hd");
		 $order->c_tonggiatri->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_tonggiatri");
		 $order->c_status_thanhtoan->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_status_thanhtoan");
		 $order->c_doitac->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_doitac");
	}

	// Set up Sort parameters based on Sort Links clicked
	function SetUpSortOrder() {
		global $order;

		// Check for an Order parameter
		if (@$_GET["order"] <> "") {
			$order->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$order->CurrentOrderType = @$_GET["ordertype"];
			$order->UpdateSort($order->c_sanpham_id); // Field 
			$order->UpdateSort($order->c_soluong); // Field 
			$order->UpdateSort($order->c_dongia); // Field 
			$order->UpdateSort($order->c_time_order); // Field 
			$order->UpdateSort($order->c_checkout_type); // Field 
			$order->UpdateSort($order->c_time_checkout); // Field 
			$order->UpdateSort($order->c_so_hd); // Field 
			$order->UpdateSort($order->c_tonggiatri); // Field 
			$order->UpdateSort($order->c_status_thanhtoan); // Field 
			$order->UpdateSort($order->c_doitac); // Field 
			$order->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load Sort Order parameters
	function LoadSortOrder() {
		global $order;
		$sOrderBy = $order->getSessionOrderBy(); // Get order by from Session
		if ($sOrderBy == "") {
			if ($order->SqlOrderBy() <> "") {
				$sOrderBy = $order->SqlOrderBy();
				$order->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command based on querystring parameter cmd=
	// - RESET: reset search parameters
	// - RESETALL: reset search & master/detail parameters
	// - RESETSORT: reset sort parameters
	function ResetCmd() {
		global $order;

		// Get reset cmd
		if (@$_GET["cmd"] <> "") {
			$sCmd = $_GET["cmd"];

			// Reset search criteria
			if (strtolower($sCmd) == "reset" || strtolower($sCmd) == "resetall")
				$this->ResetSearchParms();

			// Reset sort criteria
			if (strtolower($sCmd) == "resetsort") {
				$sOrderBy = "";
				$order->setSessionOrderBy($sOrderBy);
				$order->c_sanpham_id->setSort("");
				$order->c_soluong->setSort("");
				$order->c_dongia->setSort("");
				$order->c_time_order->setSort("");
				$order->c_checkout_type->setSort("");
				$order->c_time_checkout->setSort("");
				$order->c_so_hd->setSort("");
				$order->c_tonggiatri->setSort("");
				$order->c_status_thanhtoan->setSort("");
				$order->c_doitac->setSort("");
			}

			// Reset start position
			$this->lStartRec = 1;
			$order->setStartRecordNumber($this->lStartRec);
		}
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $order;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$order->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$order->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $order->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$order->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$order->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$order->setStartRecordNumber($this->lStartRec);
		}
	}

	//  Load search values for validation
	function LoadSearchValues() {
		global $objForm, $order;

		// Load search values
		// c_sanpham_id

		$order->c_sanpham_id->AdvancedSearch->SearchValue = @$_GET["x_c_sanpham_id"];
		$order->c_sanpham_id->AdvancedSearch->SearchOperator = @$_GET["z_c_sanpham_id"];

		// c_soluong
		$order->c_soluong->AdvancedSearch->SearchValue = @$_GET["x_c_soluong"];
		$order->c_soluong->AdvancedSearch->SearchOperator = @$_GET["z_c_soluong"];

		// c_dongia
		$order->c_dongia->AdvancedSearch->SearchValue = @$_GET["x_c_dongia"];
		$order->c_dongia->AdvancedSearch->SearchOperator = @$_GET["z_c_dongia"];

		// c_time_order
		$order->c_time_order->AdvancedSearch->SearchValue = @$_GET["x_c_time_order"];
		$order->c_time_order->AdvancedSearch->SearchOperator = @$_GET["z_c_time_order"];
		$order->c_time_order->AdvancedSearch->SearchCondition = @$_GET["v_c_time_order"];
		$order->c_time_order->AdvancedSearch->SearchValue2 = @$_GET["y_c_time_order"];
		$order->c_time_order->AdvancedSearch->SearchOperator2 = @$_GET["w_c_time_order"];

		// c_checkout_type
		$order->c_checkout_type->AdvancedSearch->SearchValue = @$_GET["x_c_checkout_type"];
		$order->c_checkout_type->AdvancedSearch->SearchOperator = @$_GET["z_c_checkout_type"];

		// c_time_checkout
		$order->c_time_checkout->AdvancedSearch->SearchValue = @$_GET["x_c_time_checkout"];
		$order->c_time_checkout->AdvancedSearch->SearchOperator = @$_GET["z_c_time_checkout"];
		$order->c_time_checkout->AdvancedSearch->SearchCondition = @$_GET["v_c_time_checkout"];
		$order->c_time_checkout->AdvancedSearch->SearchValue2 = @$_GET["y_c_time_checkout"];
		$order->c_time_checkout->AdvancedSearch->SearchOperator2 = @$_GET["w_c_time_checkout"];

		// c_so_hd
		$order->c_so_hd->AdvancedSearch->SearchValue = @$_GET["x_c_so_hd"];
		$order->c_so_hd->AdvancedSearch->SearchOperator = @$_GET["z_c_so_hd"];

		// c_tonggiatri
		$order->c_tonggiatri->AdvancedSearch->SearchValue = @$_GET["x_c_tonggiatri"];
		$order->c_tonggiatri->AdvancedSearch->SearchOperator = @$_GET["z_c_tonggiatri"];

		// c_status_thanhtoan
		$order->c_status_thanhtoan->AdvancedSearch->SearchValue = @$_GET["x_c_status_thanhtoan"];
		$order->c_status_thanhtoan->AdvancedSearch->SearchOperator = @$_GET["z_c_status_thanhtoan"];

		// c_doitac
		$order->c_doitac->AdvancedSearch->SearchValue = @$_GET["x_c_doitac"];
		$order->c_doitac->AdvancedSearch->SearchOperator = @$_GET["z_c_doitac"];
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $order;

		// Call Recordset Selecting event
		$order->Recordset_Selecting($order->CurrentFilter);

		// Load list page SQL
		$sSql = $order->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$order->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	function LoadRow() {
		global $conn, $Security, $order;
		$sFilter = $order->KeyFilter();

		// Call Row Selecting event
		$order->Row_Selecting($sFilter);

		// Load sql based on filter
		$order->CurrentFilter = $sFilter;
		$sSql = $order->SQL();
		if ($rs = $conn->Execute($sSql)) {
			if ($rs->EOF) {
				$LoadRow = FALSE;
			} else {
				$LoadRow = TRUE;
				$rs->MoveFirst();
				$this->LoadRowValues($rs); // Load row values

				// Call Row Selected event
				$order->Row_Selected($rs);
			}
			$rs->Close();
		} else {
			$LoadRow = FALSE;
		}
		return $LoadRow;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		global $order;
		$order->order_id->setDbValue($rs->fields('order_id'));
		$order->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$order->c_madh->setDbValue($rs->fields('c_madh'));
		$order->c_sanpham_id->setDbValue($rs->fields('c_sanpham_id'));
		$order->c_soluong->setDbValue($rs->fields('c_soluong'));
		$order->c_dongia->setDbValue($rs->fields('c_dongia'));
		$order->c_time_order->setDbValue($rs->fields('c_time_order'));
		$order->c_checkout_type->setDbValue($rs->fields('c_checkout_type'));
		$order->c_time_checkout->setDbValue($rs->fields('c_time_checkout'));
		$order->c_so_hd->setDbValue($rs->fields('c_so_hd'));
		$order->c_tonggiatri->setDbValue($rs->fields('c_tonggiatri'));
		$order->c_status_thanhtoan->setDbValue($rs->fields('c_status_thanhtoan'));
		$order->c_doitac->setDbValue($rs->fields('c_doitac'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $order;

		// Call Row_Rendering event
		$order->Row_Rendering();

		// Common render codes for all row types
		// c_sanpham_id

		$order->c_sanpham_id->CellCssStyle = "";
		$order->c_sanpham_id->CellCssClass = "";

		// c_soluong
		$order->c_soluong->CellCssStyle = "";
		$order->c_soluong->CellCssClass = "";

		// c_dongia
		$order->c_dongia->CellCssStyle = "";
		$order->c_dongia->CellCssClass = "";

		// c_time_order
		$order->c_time_order->CellCssStyle = "";
		$order->c_time_order->CellCssClass = "";

		// c_checkout_type
		$order->c_checkout_type->CellCssStyle = "";
		$order->c_checkout_type->CellCssClass = "";

		// c_time_checkout
		$order->c_time_checkout->CellCssStyle = "";
		$order->c_time_checkout->CellCssClass = "";

		// c_so_hd
		$order->c_so_hd->CellCssStyle = "";
		$order->c_so_hd->CellCssClass = "";

		// c_tonggiatri
		$order->c_tonggiatri->CellCssStyle = "";
		$order->c_tonggiatri->CellCssClass = "";

		// c_status_thanhtoan
		$order->c_status_thanhtoan->CellCssStyle = "";
		$order->c_status_thanhtoan->CellCssClass = "";

		// c_doitac
		$order->c_doitac->CellCssStyle = "";
		$order->c_doitac->CellCssClass = "";
		if ($order->RowType == EW_ROWTYPE_VIEW) { // View row

			// c_sanpham_id
			if (strval($order->c_sanpham_id->CurrentValue) <> "") {
				$sSqlWrk = "SELECT `ten_sanpham` FROM `products` WHERE `sanpham_id` = " . ew_AdjustSql($order->c_sanpham_id->CurrentValue) . "";
				$rswrk = $conn->Execute($sSqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
					$order->c_sanpham_id->ViewValue = $rswrk->fields('ten_sanpham');
					$rswrk->Close();
				} else {
					$order->c_sanpham_id->ViewValue = $order->c_sanpham_id->CurrentValue;
				}
			} else {
				$order->c_sanpham_id->ViewValue = NULL;
			}
			$order->c_sanpham_id->CssStyle = "";
			$order->c_sanpham_id->CssClass = "";
			$order->c_sanpham_id->ViewCustomAttributes = "";

			// c_soluong
			$order->c_soluong->ViewValue = $order->c_soluong->CurrentValue;
			$order->c_soluong->CssStyle = "";
			$order->c_soluong->CssClass = "";
			$order->c_soluong->ViewCustomAttributes = "";

			// c_dongia
			$order->c_dongia->ViewValue = $order->c_dongia->CurrentValue;
			$order->c_dongia->CssStyle = "";
			$order->c_dongia->CssClass = "";
			$order->c_dongia->ViewCustomAttributes = "";

			// c_time_order
			$order->c_time_order->ViewValue = $order->c_time_order->CurrentValue;
			$order->c_time_order->ViewValue = ew_FormatDateTime($order->c_time_order->ViewValue, 7);
			$order->c_time_order->CssStyle = "";
			$order->c_time_order->CssClass = "";
			$order->c_time_order->ViewCustomAttributes = "";

			// c_checkout_type
			if (strval($order->c_checkout_type->CurrentValue) <> "") {
				switch ($order->c_checkout_type->CurrentValue) {
					case "0":
						$order->c_checkout_type->ViewValue = "Tạm giữ";
						break;
					case "1":
						$order->c_checkout_type->ViewValue = "Thanh toán ngay";
						break;
					default:
						$order->c_checkout_type->ViewValue = $order->c_checkout_type->CurrentValue;
				}
			} else {
				$order->c_checkout_type->ViewValue = NULL;
			}
			$order->c_checkout_type->CssStyle = "";
			$order->c_checkout_type->CssClass = "";
			$order->c_checkout_type->ViewCustomAttributes = "";

			// c_time_checkout
			$order->c_time_checkout->ViewValue = $order->c_time_checkout->CurrentValue;
			$order->c_time_checkout->ViewValue = ew_FormatDateTime($order->c_time_checkout->ViewValue, 7);
			$order->c_time_checkout->CssStyle = "";
			$order->c_time_checkout->CssClass = "";
			$order->c_time_checkout->ViewCustomAttributes = "";

			// c_so_hd
			$order->c_so_hd->ViewValue = $order->c_so_hd->CurrentValue;
			$order->c_so_hd->CssStyle = "";
			$order->c_so_hd->CssClass = "";
			$order->c_so_hd->ViewCustomAttributes = "";

			// c_tonggiatri
			$order->c_tonggiatri->ViewValue = $order->c_tonggiatri->CurrentValue;
			$order->c_tonggiatri->CssStyle = "";
			$order->c_tonggiatri->CssClass = "";
			$order->c_tonggiatri->ViewCustomAttributes = "";

			// c_status_thanhtoan
			if (strval($order->c_status_thanhtoan->CurrentValue) <> "") {
				switch ($order->c_status_thanhtoan->CurrentValue) {
					case "0":
						$order->c_status_thanhtoan->ViewValue = "Chưa hoàn thành";
						break;
					case "1":
						$order->c_status_thanhtoan->ViewValue = "Hoàn thành";
						break;
					default:
						$order->c_status_thanhtoan->ViewValue = $order->c_status_thanhtoan->CurrentValue;
				}
			} else {
				$order->c_status_thanhtoan->ViewValue = NULL;
			}
			$order->c_status_thanhtoan->CssStyle = "";
			$order->c_status_thanhtoan->CssClass = "";
			$order->c_status_thanhtoan->ViewCustomAttributes = "";

			// c_doitac
			$order->c_doitac->ViewValue = $order->c_doitac->CurrentValue;
			$order->c_doitac->CssStyle = "";
			$order->c_doitac->CssClass = "";
			$order->c_doitac->ViewCustomAttributes = "";

			// c_sanpham_id
			$order->c_sanpham_id->HrefValue = "";

			// c_soluong
			$order->c_soluong->HrefValue = "";

			// c_dongia
			$order->c_dongia->HrefValue = "";

			// c_time_order
			$order->c_time_order->HrefValue = "";

			// c_checkout_type
			$order->c_checkout_type->HrefValue = "";

			// c_time_checkout
			$order->c_time_checkout->HrefValue = "";

			// c_so_hd
			$order->c_so_hd->HrefValue = "";

			// c_tonggiatri
			$order->c_tonggiatri->HrefValue = "";

			// c_status_thanhtoan
			$order->c_status_thanhtoan->HrefValue = "";

			// c_doitac
			$order->c_doitac->HrefValue = "";
		}

		// Call Row Rendered event
		$order->Row_Rendered();
	}

	// Validate search
	function ValidateSearch() {
		global $gsSearchError, $order;

		// Initialize
		$gsSearchError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return TRUE;
		if (!ew_CheckEuroDate($order->c_time_order->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Thời gian đặt hàng";
		}
		if (!ew_CheckEuroDate($order->c_time_order->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Thời gian đặt hàng";
		}
		if (!ew_CheckEuroDate($order->c_time_checkout->AdvancedSearch->SearchValue)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Thời gian thanh toán";
		}
		if (!ew_CheckEuroDate($order->c_time_checkout->AdvancedSearch->SearchValue2)) {
			if ($gsSearchError <> "") $gsSearchError .= "<br>";
			$gsSearchError .= "Incorrect date, format = dd/mm/yyyy - Thời gian thanh toán";
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
		global $order;
		$order->c_sanpham_id->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_sanpham_id");
		$order->c_soluong->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_soluong");
		$order->c_dongia->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_dongia");
		$order->c_time_order->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_time_order");
		$order->c_time_order->AdvancedSearch->SearchValue2 = $order->getAdvancedSearch("y_c_time_order");
		$order->c_checkout_type->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_checkout_type");
		$order->c_time_checkout->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_time_checkout");
		$order->c_time_checkout->AdvancedSearch->SearchValue2 = $order->getAdvancedSearch("y_c_time_checkout");
		$order->c_so_hd->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_so_hd");
		$order->c_tonggiatri->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_tonggiatri");
		$order->c_status_thanhtoan->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_status_thanhtoan");
		$order->c_doitac->AdvancedSearch->SearchValue = $order->getAdvancedSearch("x_c_doitac");
	}

	// Show link optionally based on User ID
	function ShowOptionLink() {
		global $Security, $order;
		if ($Security->IsLoggedIn()) {
			if (!$Security->IsAdmin()) {
				return $Security->IsValidUserID($order->nguoidung_id->CurrentValue);
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

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
