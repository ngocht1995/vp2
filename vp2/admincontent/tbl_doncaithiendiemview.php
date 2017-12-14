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
<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); // Always modified
header("Cache-Control: private, no-store, no-cache, must-revalidate"); // HTTP/1.1 
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
?>
<?php

// Define page object
$tbl_doncaithiendiem_view = new ctbl_doncaithiendiem_view();
$Page =& $tbl_doncaithiendiem_view;

// Page init processing
$tbl_doncaithiendiem_view->Page_Init();

// Page main processing
$tbl_doncaithiendiem_view->Page_Main();
?>
<?php include "header.php" ?>
<?php if ($tbl_doncaithiendiem->Export == "") { ?>
<script type="text/javascript">
<!--

// Create page object
var tbl_doncaithiendiem_view = new ew_Page("tbl_doncaithiendiem_view");

// page properties
tbl_doncaithiendiem_view.PageID = "view"; // page ID
var EW_PAGE_ID = tbl_doncaithiendiem_view.PageID; // for backward compatibility

// extend page with Form_CustomValidate function
tbl_doncaithiendiem_view.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }
tbl_doncaithiendiem_view.SelectAllKey = function(elem) {
	ew_SelectAll(elem);
}
<?php if (EW_CLIENT_VALIDATE) { ?>
tbl_doncaithiendiem_view.ValidateRequired = true; // uses JavaScript validation
<?php } else { ?>
tbl_doncaithiendiem_view.ValidateRequired = false; // no JavaScript validation
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
<p><span class="phpmaker">View TABLE: Tbl Doncaithiendiem
<?php if ($tbl_doncaithiendiem->Export == "") { ?>
&nbsp;&nbsp;<a href="<?php echo $tbl_doncaithiendiem_view->PageUrl() ?>export=excel&phieucaithiendiem_id=<?php echo ew_HtmlEncode($tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue) ?>">Export to Excel</a>
&nbsp;&nbsp;<a href="<?php echo $tbl_doncaithiendiem_view->PageUrl() ?>export=word&phieucaithiendiem_id=<?php echo ew_HtmlEncode($tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue) ?>">Export to Word</a>
&nbsp;&nbsp;<a href="<?php echo $tbl_doncaithiendiem_view->PageUrl() ?>export=xml&phieucaithiendiem_id=<?php echo ew_HtmlEncode($tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue) ?>">Export to XML</a>
&nbsp;&nbsp;<a href="<?php echo $tbl_doncaithiendiem_view->PageUrl() ?>export=csv&phieucaithiendiem_id=<?php echo ew_HtmlEncode($tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue) ?>">Export to CSV</a>
<?php } ?>
<br><br>
<?php if ($tbl_doncaithiendiem->Export == "") { ?>
<a href="tbl_doncaithiendiemlist.php">Back to List</a>&nbsp;
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $tbl_doncaithiendiem->AddUrl() ?>">Add</a>&nbsp;
<?php } ?>
<?php if ($Security->CanEdit()) { ?>
<a href="<?php echo $tbl_doncaithiendiem->EditUrl() ?>">Edit</a>&nbsp;
<?php } ?>
<?php if ($Security->CanAdd()) { ?>
<a href="<?php echo $tbl_doncaithiendiem->CopyUrl() ?>">Copy</a>&nbsp;
<?php } ?>
<?php if ($Security->CanDelete()) { ?>
<a href="<?php echo $tbl_doncaithiendiem->DeleteUrl() ?>">Delete</a>&nbsp;
<?php } ?>
<?php } ?>
</span></p>
<?php $tbl_doncaithiendiem_view->ShowMessage() ?>
<p>
<?php if ($tbl_doncaithiendiem->Export == "") { ?>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($tbl_doncaithiendiem_view->Pager)) $tbl_doncaithiendiem_view->Pager = new cNumericPager($tbl_doncaithiendiem_view->lStartRec, $tbl_doncaithiendiem_view->lDisplayRecs, $tbl_doncaithiendiem_view->lTotalRecs, $tbl_doncaithiendiem_view->lRecRange) ?>
<?php if ($tbl_doncaithiendiem_view->Pager->RecordCount > 0) { ?>
	<?php if ($tbl_doncaithiendiem_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $tbl_doncaithiendiem_view->PageUrl() ?>start=<?php echo $tbl_doncaithiendiem_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_doncaithiendiem_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $tbl_doncaithiendiem_view->PageUrl() ?>start=<?php echo $tbl_doncaithiendiem_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($tbl_doncaithiendiem_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $tbl_doncaithiendiem_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($tbl_doncaithiendiem_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $tbl_doncaithiendiem_view->PageUrl() ?>start=<?php echo $tbl_doncaithiendiem_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_doncaithiendiem_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $tbl_doncaithiendiem_view->PageUrl() ?>start=<?php echo $tbl_doncaithiendiem_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_doncaithiendiem_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	No records found
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
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
<table cellspacing="0" class="ewTable">
<?php if ($tbl_doncaithiendiem->phieucaithiendiem_id->Visible) { // phieucaithiendiem_id ?>
	<tr<?php echo $tbl_doncaithiendiem->phieucaithiendiem_id->RowAttributes ?>>
		<td class="ewTableHeader">Phieucaithiendiem Id</td>
		<td<?php echo $tbl_doncaithiendiem->phieucaithiendiem_id->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->phieucaithiendiem_id->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->phieucaithiendiem_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->loaidon_id->Visible) { // loaidon_id ?>
	<tr<?php echo $tbl_doncaithiendiem->loaidon_id->RowAttributes ?>>
		<td class="ewTableHeader">Loaidon Id</td>
		<td<?php echo $tbl_doncaithiendiem->loaidon_id->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->loaidon_id->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->loaidon_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->nhomdon_id->Visible) { // nhomdon_id ?>
	<tr<?php echo $tbl_doncaithiendiem->nhomdon_id->RowAttributes ?>>
		<td class="ewTableHeader">Nhomdon Id</td>
		<td<?php echo $tbl_doncaithiendiem->nhomdon_id->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->nhomdon_id->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->nhomdon_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->msv->Visible) { // msv ?>
	<tr<?php echo $tbl_doncaithiendiem->msv->RowAttributes ?>>
		<td class="ewTableHeader">Msv</td>
		<td<?php echo $tbl_doncaithiendiem->msv->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->msv->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->msv->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->hoten_sinhvien->Visible) { // hoten_sinhvien ?>
	<tr<?php echo $tbl_doncaithiendiem->hoten_sinhvien->RowAttributes ?>>
		<td class="ewTableHeader">Hoten Sinhvien</td>
		<td<?php echo $tbl_doncaithiendiem->hoten_sinhvien->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->hoten_sinhvien->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->hoten_sinhvien->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->ngay_sinh->Visible) { // ngay_sinh ?>
	<tr<?php echo $tbl_doncaithiendiem->ngay_sinh->RowAttributes ?>>
		<td class="ewTableHeader">Ngay Sinh</td>
		<td<?php echo $tbl_doncaithiendiem->ngay_sinh->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->ngay_sinh->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->ngay_sinh->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->lop_sinhhoat->Visible) { // lop_sinhhoat ?>
	<tr<?php echo $tbl_doncaithiendiem->lop_sinhhoat->RowAttributes ?>>
		<td class="ewTableHeader">Lop Sinhhoat</td>
		<td<?php echo $tbl_doncaithiendiem->lop_sinhhoat->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->lop_sinhhoat->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->lop_sinhhoat->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->so_dienthoai->Visible) { // so_dienthoai ?>
	<tr<?php echo $tbl_doncaithiendiem->so_dienthoai->RowAttributes ?>>
		<td class="ewTableHeader">So Dienthoai</td>
		<td<?php echo $tbl_doncaithiendiem->so_dienthoai->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->so_dienthoai->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->so_dienthoai->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->momthi_chinh->Visible) { // momthi_chinh ?>
	<tr<?php echo $tbl_doncaithiendiem->momthi_chinh->RowAttributes ?>>
		<td class="ewTableHeader">Momthi Chinh</td>
		<td<?php echo $tbl_doncaithiendiem->momthi_chinh->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->momthi_chinh->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->momthi_chinh->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->lop_tinchi->Visible) { // lop_tinchi ?>
	<tr<?php echo $tbl_doncaithiendiem->lop_tinchi->RowAttributes ?>>
		<td class="ewTableHeader">Lop Tinchi</td>
		<td<?php echo $tbl_doncaithiendiem->lop_tinchi->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->lop_tinchi->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->lop_tinchi->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->hoc_ky->Visible) { // hoc_ky ?>
	<tr<?php echo $tbl_doncaithiendiem->hoc_ky->RowAttributes ?>>
		<td class="ewTableHeader">Hoc Ky</td>
		<td<?php echo $tbl_doncaithiendiem->hoc_ky->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->hoc_ky->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->hoc_ky->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->nam_hoc1->Visible) { // nam_hoc1 ?>
	<tr<?php echo $tbl_doncaithiendiem->nam_hoc1->RowAttributes ?>>
		<td class="ewTableHeader">Nam Hoc 1</td>
		<td<?php echo $tbl_doncaithiendiem->nam_hoc1->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->nam_hoc1->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->nam_hoc1->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->nam_hoc2->Visible) { // nam_hoc2 ?>
	<tr<?php echo $tbl_doncaithiendiem->nam_hoc2->RowAttributes ?>>
		<td class="ewTableHeader">Nam Hoc 2</td>
		<td<?php echo $tbl_doncaithiendiem->nam_hoc2->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->nam_hoc2->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->nam_hoc2->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->diem->Visible) { // diem ?>
	<tr<?php echo $tbl_doncaithiendiem->diem->RowAttributes ?>>
		<td class="ewTableHeader">Diem</td>
		<td<?php echo $tbl_doncaithiendiem->diem->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->diem->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->diem->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->monthi_lan2->Visible) { // monthi_lan2 ?>
	<tr<?php echo $tbl_doncaithiendiem->monthi_lan2->RowAttributes ?>>
		<td class="ewTableHeader">Monthi Lan 2</td>
		<td<?php echo $tbl_doncaithiendiem->monthi_lan2->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->monthi_lan2->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->monthi_lan2->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->thoigian_h->Visible) { // thoigian_h ?>
	<tr<?php echo $tbl_doncaithiendiem->thoigian_h->RowAttributes ?>>
		<td class="ewTableHeader">Thoigian H</td>
		<td<?php echo $tbl_doncaithiendiem->thoigian_h->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->thoigian_h->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->thoigian_h->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->thoigian_phut->Visible) { // thoigian_phut ?>
	<tr<?php echo $tbl_doncaithiendiem->thoigian_phut->RowAttributes ?>>
		<td class="ewTableHeader">Thoigian Phut</td>
		<td<?php echo $tbl_doncaithiendiem->thoigian_phut->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->thoigian_phut->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->thoigian_phut->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->ngay_thi->Visible) { // ngay_thi ?>
	<tr<?php echo $tbl_doncaithiendiem->ngay_thi->RowAttributes ?>>
		<td class="ewTableHeader">Ngay Thi</td>
		<td<?php echo $tbl_doncaithiendiem->ngay_thi->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->ngay_thi->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->ngay_thi->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->ngay_tao_don->Visible) { // ngay_tao_don ?>
	<tr<?php echo $tbl_doncaithiendiem->ngay_tao_don->RowAttributes ?>>
		<td class="ewTableHeader">Ngay Tao Don</td>
		<td<?php echo $tbl_doncaithiendiem->ngay_tao_don->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->ngay_tao_don->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->ngay_tao_don->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->status->Visible) { // status ?>
	<tr<?php echo $tbl_doncaithiendiem->status->RowAttributes ?>>
		<td class="ewTableHeader">Status</td>
		<td<?php echo $tbl_doncaithiendiem->status->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->status->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->status->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->active->Visible) { // active ?>
	<tr<?php echo $tbl_doncaithiendiem->active->RowAttributes ?>>
		<td class="ewTableHeader">Active</td>
		<td<?php echo $tbl_doncaithiendiem->active->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->active->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->active->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->nguoidung_id->Visible) { // nguoidung_id ?>
	<tr<?php echo $tbl_doncaithiendiem->nguoidung_id->RowAttributes ?>>
		<td class="ewTableHeader">Nguoidung Id</td>
		<td<?php echo $tbl_doncaithiendiem->nguoidung_id->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->nguoidung_id->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->nguoidung_id->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->date_time_add->Visible) { // date_time_add ?>
	<tr<?php echo $tbl_doncaithiendiem->date_time_add->RowAttributes ?>>
		<td class="ewTableHeader">Date Time Add</td>
		<td<?php echo $tbl_doncaithiendiem->date_time_add->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->date_time_add->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->date_time_add->ViewValue ?></div></td>
	</tr>
<?php } ?>
<?php if ($tbl_doncaithiendiem->date_time_edit->Visible) { // date_time_edit ?>
	<tr<?php echo $tbl_doncaithiendiem->date_time_edit->RowAttributes ?>>
		<td class="ewTableHeader">Date Time Edit</td>
		<td<?php echo $tbl_doncaithiendiem->date_time_edit->CellAttributes() ?>>
<div<?php echo $tbl_doncaithiendiem->date_time_edit->ViewAttributes() ?>><?php echo $tbl_doncaithiendiem->date_time_edit->ViewValue ?></div></td>
	</tr>
<?php } ?>
</table>
</div>
</td></tr></table>
<?php if ($tbl_doncaithiendiem->Export == "") { ?>
<br>
<form name="ewpagerform" id="ewpagerform" class="ewForm" action="<?php echo ew_CurrentPage() ?>">
<table border="0" cellspacing="0" cellpadding="0" class="ewPager">
	<tr>
		<td nowrap>
<span class="phpmaker">
<?php if (!isset($tbl_doncaithiendiem_view->Pager)) $tbl_doncaithiendiem_view->Pager = new cNumericPager($tbl_doncaithiendiem_view->lStartRec, $tbl_doncaithiendiem_view->lDisplayRecs, $tbl_doncaithiendiem_view->lTotalRecs, $tbl_doncaithiendiem_view->lRecRange) ?>
<?php if ($tbl_doncaithiendiem_view->Pager->RecordCount > 0) { ?>
	<?php if ($tbl_doncaithiendiem_view->Pager->FirstButton->Enabled) { ?>
	<a href="<?php echo $tbl_doncaithiendiem_view->PageUrl() ?>start=<?php echo $tbl_doncaithiendiem_view->Pager->FirstButton->Start ?>"><b>First</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_doncaithiendiem_view->Pager->PrevButton->Enabled) { ?>
	<a href="<?php echo $tbl_doncaithiendiem_view->PageUrl() ?>start=<?php echo $tbl_doncaithiendiem_view->Pager->PrevButton->Start ?>"><b>Previous</b></a>&nbsp;
	<?php } ?>
	<?php foreach ($tbl_doncaithiendiem_view->Pager->Items as $PagerItem) { ?>
		<?php if ($PagerItem->Enabled) { ?><a href="<?php echo $tbl_doncaithiendiem_view->PageUrl() ?>start=<?php echo $PagerItem->Start ?>"><?php } ?><b><?php echo $PagerItem->Text ?></b><?php if ($PagerItem->Enabled) { ?></a><?php } ?>&nbsp;
	<?php } ?>
	<?php if ($tbl_doncaithiendiem_view->Pager->NextButton->Enabled) { ?>
	<a href="<?php echo $tbl_doncaithiendiem_view->PageUrl() ?>start=<?php echo $tbl_doncaithiendiem_view->Pager->NextButton->Start ?>"><b>Next</b></a>&nbsp;
	<?php } ?>
	<?php if ($tbl_doncaithiendiem_view->Pager->LastButton->Enabled) { ?>
	<a href="<?php echo $tbl_doncaithiendiem_view->PageUrl() ?>start=<?php echo $tbl_doncaithiendiem_view->Pager->LastButton->Start ?>"><b>Last</b></a>&nbsp;
	<?php } ?>
<?php } else { ?>	
	<?php if ($Security->CanList()) { ?>
	<?php if ($tbl_doncaithiendiem_view->sSrchWhere == "0=101") { ?>
	Please enter search criteria
	<?php } else { ?>
	No records found
	<?php } ?>
	<?php } else { ?>
	You do not have the right permission to view the page
	<?php } ?>
<?php } ?>
</span>
		</td>
	</tr>
</table>
</form>
<?php } ?>
<p>
<?php if ($tbl_doncaithiendiem->Export == "") { ?>
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
class ctbl_doncaithiendiem_view {

	// Page ID
	var $PageID = 'view';

	// Table Name
	var $TableName = 'tbl_doncaithiendiem';

	// Page Object Name
	var $PageObjName = 'tbl_doncaithiendiem_view';

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
	function ctbl_doncaithiendiem_view() {
		global $conn;

		// Initialize table object
		$GLOBALS["tbl_doncaithiendiem"] = new ctbl_doncaithiendiem();

		// Initialize other table object
		$GLOBALS['user'] = new cuser();

		// Intialize page id (for backward compatibility)
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'view', TRUE);

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
		if (!$Security->CanView()) {
			$Security->SaveLastUrl();
			$this->Page_Terminate("tbl_doncaithiendiemlist.php");
		}
		$Security->UserID_Loading();
		if ($Security->IsLoggedIn()) $Security->LoadUserID();
		$Security->UserID_Loaded();
	$tbl_doncaithiendiem->Export = @$_GET["export"]; // Get export parameter
	$gsExport = $tbl_doncaithiendiem->Export; // Get export parameter, used in header
	$gsExportFile = $tbl_doncaithiendiem->TableVar; // Get export file, used in header
	if (@$_GET["phieucaithiendiem_id"] <> "") {
		if ($gsExportFile <> "") $gsExportFile .= "_";
		$gsExportFile .= ew_StripSlashes($_GET["phieucaithiendiem_id"]);
	}
	if ($tbl_doncaithiendiem->Export == "excel") {
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xls');
	}
	if ($tbl_doncaithiendiem->Export == "word") {
		header('Content-Type: application/vnd.ms-word');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.doc');
	}
	if ($tbl_doncaithiendiem->Export == "xml") {
		header('Content-Type: text/xml');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.xml');
	}
	if ($tbl_doncaithiendiem->Export == "csv") {
		header('Content-Type: application/csv');
		header('Content-Disposition: attachment; filename=' . $gsExportFile .'.csv');
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
		global $tbl_doncaithiendiem;

		// Paging variables
		$this->lDisplayRecs = 1;
		$this->lRecRange = 10;

		// Load current record
		$bLoadCurrentRecord = FALSE;
		$sReturnUrl = "";
		$bMatchRecord = FALSE;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET["phieucaithiendiem_id"] <> "") {
				$tbl_doncaithiendiem->phieucaithiendiem_id->setQueryStringValue($_GET["phieucaithiendiem_id"]);
			} else {
				$bLoadCurrentRecord = TRUE;
			}

			// Get action
			$tbl_doncaithiendiem->CurrentAction = "I"; // Display form
			switch ($tbl_doncaithiendiem->CurrentAction) {
				case "I": // Get a record to display
					$this->lStartRec = 1; // Initialize start position
					$rs = $this->LoadRecordset(); // Load records
					$this->lTotalRecs = $rs->RecordCount(); // Get record count
					if ($this->lTotalRecs <= 0) { // No record found
						$this->setMessage("No records found"); // Set no record message
						$this->Page_Terminate("tbl_doncaithiendiemlist.php"); // Return to list page
					} elseif ($bLoadCurrentRecord) { // Load current record position
						$this->SetUpStartRec(); // Set up start record position

						// Point to current record
						if (intval($this->lStartRec) <= intval($this->lTotalRecs)) {
							$bMatchRecord = TRUE;
							$rs->Move($this->lStartRec-1);
						}
					} else { // Match key values
						while (!$rs->EOF) {
							if (strval($tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue) == strval($rs->fields('phieucaithiendiem_id'))) {
								$tbl_doncaithiendiem->setStartRecordNumber($this->lStartRec); // Save record position
								$bMatchRecord = TRUE;
								break;
							} else {
								$this->lStartRec++;
								$rs->MoveNext();
							}
						}
					}
					if (!$bMatchRecord) {
						$this->setMessage("No records found"); // Set no record message
						$sReturnUrl = "tbl_doncaithiendiemlist.php"; // No matching record, return to list
					} else {
						$this->LoadRowValues($rs); // Load row values
					}
			}

			// Export data only
			if ($tbl_doncaithiendiem->Export == "html" || $tbl_doncaithiendiem->Export == "csv" ||
				$tbl_doncaithiendiem->Export == "word" || $tbl_doncaithiendiem->Export == "excel" ||
				$tbl_doncaithiendiem->Export == "xml") {
				$this->ExportData();
				$this->Page_Terminate(); // Terminate response
				exit();
			}
		} else {
			$sReturnUrl = "tbl_doncaithiendiemlist.php"; // Not page request, return to list
		}
		if ($sReturnUrl <> "")
			$this->Page_Terminate($sReturnUrl);

		// Render row
		$tbl_doncaithiendiem->RowType = EW_ROWTYPE_VIEW;
		$this->RenderRow();
	}

	// Set up Starting Record parameters based on Pager Navigation
	function SetUpStartRec() {
		global $tbl_doncaithiendiem;
		if ($this->lDisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request			
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->lStartRec = $_GET[EW_TABLE_START_REC];
				$tbl_doncaithiendiem->setStartRecordNumber($this->lStartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$this->nPageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($this->nPageNo)) {
					$this->lStartRec = ($this->nPageNo-1)*$this->lDisplayRecs+1;
					if ($this->lStartRec <= 0) {
						$this->lStartRec = 1;
					} elseif ($this->lStartRec >= intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1) {
						$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1;
					}
					$tbl_doncaithiendiem->setStartRecordNumber($this->lStartRec);
				}
			}
		}
		$this->lStartRec = $tbl_doncaithiendiem->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->lStartRec) || $this->lStartRec == "") { // Avoid invalid start record counter
			$this->lStartRec = 1; // Reset start record counter
			$tbl_doncaithiendiem->setStartRecordNumber($this->lStartRec);
		} elseif (intval($this->lStartRec) > intval($this->lTotalRecs)) { // Avoid starting record > total records
			$this->lStartRec = intval(($this->lTotalRecs-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to last page first record
			$tbl_doncaithiendiem->setStartRecordNumber($this->lStartRec);
		} elseif (($this->lStartRec-1) % $this->lDisplayRecs <> 0) {
			$this->lStartRec = intval(($this->lStartRec-1)/$this->lDisplayRecs)*$this->lDisplayRecs+1; // Point to page boundary
			$tbl_doncaithiendiem->setStartRecordNumber($this->lStartRec);
		}
	}

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {
		global $conn, $tbl_doncaithiendiem;

		// Call Recordset Selecting event
		$tbl_doncaithiendiem->Recordset_Selecting($tbl_doncaithiendiem->CurrentFilter);

		// Load list page SQL
		$sSql = $tbl_doncaithiendiem->SelectSQL();
		if ($offset > -1 && $rowcnt > -1) $sSql .= " LIMIT $offset, $rowcnt";

		// Load recordset
		$conn->raiseErrorFn = 'ew_ErrorFn';	
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';

		// Call Recordset Selected event
		$tbl_doncaithiendiem->Recordset_Selected($rs);
		return $rs;
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
		$tbl_doncaithiendiem->status->setDbValue($rs->fields('status'));
		$tbl_doncaithiendiem->active->setDbValue($rs->fields('active'));
		$tbl_doncaithiendiem->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$tbl_doncaithiendiem->date_time_add->setDbValue($rs->fields('date_time_add'));
		$tbl_doncaithiendiem->date_time_edit->setDbValue($rs->fields('date_time_edit'));
	}

	// Render row values based on field settings
	function RenderRow() {
		global $conn, $Security, $tbl_doncaithiendiem;

		// Call Row_Rendering event
		$tbl_doncaithiendiem->Row_Rendering();

		// Common render codes for all row types
		// phieucaithiendiem_id

		$tbl_doncaithiendiem->phieucaithiendiem_id->CellCssStyle = "";
		$tbl_doncaithiendiem->phieucaithiendiem_id->CellCssClass = "";

		// loaidon_id
		$tbl_doncaithiendiem->loaidon_id->CellCssStyle = "";
		$tbl_doncaithiendiem->loaidon_id->CellCssClass = "";

		// nhomdon_id
		$tbl_doncaithiendiem->nhomdon_id->CellCssStyle = "";
		$tbl_doncaithiendiem->nhomdon_id->CellCssClass = "";

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

		// status
		$tbl_doncaithiendiem->status->CellCssStyle = "";
		$tbl_doncaithiendiem->status->CellCssClass = "";

		// active
		$tbl_doncaithiendiem->active->CellCssStyle = "";
		$tbl_doncaithiendiem->active->CellCssClass = "";

		// nguoidung_id
		$tbl_doncaithiendiem->nguoidung_id->CellCssStyle = "";
		$tbl_doncaithiendiem->nguoidung_id->CellCssClass = "";

		// date_time_add
		$tbl_doncaithiendiem->date_time_add->CellCssStyle = "";
		$tbl_doncaithiendiem->date_time_add->CellCssClass = "";

		// date_time_edit
		$tbl_doncaithiendiem->date_time_edit->CellCssStyle = "";
		$tbl_doncaithiendiem->date_time_edit->CellCssClass = "";
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
			if (strval($tbl_doncaithiendiem->nam_hoc1->CurrentValue) <> "") {
				switch ($tbl_doncaithiendiem->nam_hoc1->CurrentValue) {
					case "0":
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = "2010-2011";
						break;
					case "1":
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = "2011-2012";
						break;
					case "2":
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = "2012-2013";
						break;
					case "3":
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = "2013-2014";
						break;
					case "4":
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = "2014-2015";
						break;
					case "5":
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = "2015-2016";
						break;
					case "6":
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = "2017-2018";
						break;
					case "7":
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = "2018-2019";
						break;
					case "8":
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = "2019-2020";
						break;
					default:
						$tbl_doncaithiendiem->nam_hoc1->ViewValue = $tbl_doncaithiendiem->nam_hoc1->CurrentValue;
				}
			} else {
				$tbl_doncaithiendiem->nam_hoc1->ViewValue = NULL;
			}
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

			// phieucaithiendiem_id
			$tbl_doncaithiendiem->phieucaithiendiem_id->HrefValue = "";

			// loaidon_id
			$tbl_doncaithiendiem->loaidon_id->HrefValue = "";

			// nhomdon_id
			$tbl_doncaithiendiem->nhomdon_id->HrefValue = "";

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

			// status
			$tbl_doncaithiendiem->status->HrefValue = "";

			// active
			$tbl_doncaithiendiem->active->HrefValue = "";

			// nguoidung_id
			$tbl_doncaithiendiem->nguoidung_id->HrefValue = "";

			// date_time_add
			$tbl_doncaithiendiem->date_time_add->HrefValue = "";

			// date_time_edit
			$tbl_doncaithiendiem->date_time_edit->HrefValue = "";
		}

		// Call Row Rendered event
		$tbl_doncaithiendiem->Row_Rendered();
	}

	// Export data in XML or CSV format
	function ExportData() {
		global $tbl_doncaithiendiem;
		$sCsvStr = "";

		// Default export style
		$sExportStyle = "v";

		// Load recordset
		$rs = $this->LoadRecordset();
		$this->lTotalRecs = $rs->RecordCount();
		$this->lStartRec = 1;
			$this->SetUpStartRec(); // Set up start record position

			// Set the last record to display
			if ($this->lDisplayRecs < 0) {
				$this->lStopRec = $this->lTotalRecs;
			} else {
				$this->lStopRec = $this->lStartRec + $this->lDisplayRecs - 1;
			}
		if ($tbl_doncaithiendiem->Export == "xml") {
			$XmlDoc = new cXMLDocument();
		} else {
			echo ew_ExportHeader($tbl_doncaithiendiem->Export);

			// Horizontal format, write header
			if ($sExportStyle <> "v" || $tbl_doncaithiendiem->Export == "csv") {
				$sExportStr = "";
				ew_ExportAddValue($sExportStr, 'phieucaithiendiem_id', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'loaidon_id', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'nhomdon_id', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'msv', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'hoten_sinhvien', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'ngay_sinh', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'lop_sinhhoat', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'so_dienthoai', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'lop_tinchi', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'hoc_ky', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'nam_hoc1', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'nam_hoc2', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'diem', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'monthi_lan2', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'thoigian_h', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'thoigian_phut', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'ngay_thi', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'ngay_tao_don', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'status', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'active', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'nguoidung_id', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'date_time_add', $tbl_doncaithiendiem->Export);
				ew_ExportAddValue($sExportStr, 'date_time_edit', $tbl_doncaithiendiem->Export);
				echo ew_ExportLine($sExportStr, $tbl_doncaithiendiem->Export);
			}
		}

		// Move to first record
		$this->lRecCnt = $this->lStartRec - 1;
		if (!$rs->EOF) {
			$rs->MoveFirst();
			$rs->Move($this->lStartRec - 1);
		}
		while (!$rs->EOF && $this->lRecCnt < $this->lStopRec) {
			$this->lRecCnt++;
			if (intval($this->lRecCnt) >= intval($this->lStartRec)) {
				$this->LoadRowValues($rs);

				// Render row for display
				$tbl_doncaithiendiem->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->RenderRow();
				if ($tbl_doncaithiendiem->Export == "xml") {
					$XmlDoc->BeginRow();
					$XmlDoc->AddField('phieucaithiendiem_id', $tbl_doncaithiendiem->phieucaithiendiem_id->CurrentValue);
					$XmlDoc->AddField('loaidon_id', $tbl_doncaithiendiem->loaidon_id->CurrentValue);
					$XmlDoc->AddField('nhomdon_id', $tbl_doncaithiendiem->nhomdon_id->CurrentValue);
					$XmlDoc->AddField('msv', $tbl_doncaithiendiem->msv->CurrentValue);
					$XmlDoc->AddField('hoten_sinhvien', $tbl_doncaithiendiem->hoten_sinhvien->CurrentValue);
					$XmlDoc->AddField('ngay_sinh', $tbl_doncaithiendiem->ngay_sinh->CurrentValue);
					$XmlDoc->AddField('lop_sinhhoat', $tbl_doncaithiendiem->lop_sinhhoat->CurrentValue);
					$XmlDoc->AddField('so_dienthoai', $tbl_doncaithiendiem->so_dienthoai->CurrentValue);
					$XmlDoc->AddField('lop_tinchi', $tbl_doncaithiendiem->lop_tinchi->CurrentValue);
					$XmlDoc->AddField('hoc_ky', $tbl_doncaithiendiem->hoc_ky->CurrentValue);
					$XmlDoc->AddField('nam_hoc1', $tbl_doncaithiendiem->nam_hoc1->CurrentValue);
					$XmlDoc->AddField('nam_hoc2', $tbl_doncaithiendiem->nam_hoc2->CurrentValue);
					$XmlDoc->AddField('diem', $tbl_doncaithiendiem->diem->CurrentValue);
					$XmlDoc->AddField('monthi_lan2', $tbl_doncaithiendiem->monthi_lan2->CurrentValue);
					$XmlDoc->AddField('thoigian_h', $tbl_doncaithiendiem->thoigian_h->CurrentValue);
					$XmlDoc->AddField('thoigian_phut', $tbl_doncaithiendiem->thoigian_phut->CurrentValue);
					$XmlDoc->AddField('ngay_thi', $tbl_doncaithiendiem->ngay_thi->CurrentValue);
					$XmlDoc->AddField('ngay_tao_don', $tbl_doncaithiendiem->ngay_tao_don->CurrentValue);
					$XmlDoc->AddField('status', $tbl_doncaithiendiem->status->CurrentValue);
					$XmlDoc->AddField('active', $tbl_doncaithiendiem->active->CurrentValue);
					$XmlDoc->AddField('nguoidung_id', $tbl_doncaithiendiem->nguoidung_id->CurrentValue);
					$XmlDoc->AddField('date_time_add', $tbl_doncaithiendiem->date_time_add->CurrentValue);
					$XmlDoc->AddField('date_time_edit', $tbl_doncaithiendiem->date_time_edit->CurrentValue);
					$XmlDoc->EndRow();
				} else {
					if ($sExportStyle == "v" && $tbl_doncaithiendiem->Export <> "csv") { // Vertical format
						echo ew_ExportField('phieucaithiendiem_id', $tbl_doncaithiendiem->phieucaithiendiem_id->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('loaidon_id', $tbl_doncaithiendiem->loaidon_id->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('nhomdon_id', $tbl_doncaithiendiem->nhomdon_id->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('msv', $tbl_doncaithiendiem->msv->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('hoten_sinhvien', $tbl_doncaithiendiem->hoten_sinhvien->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('ngay_sinh', $tbl_doncaithiendiem->ngay_sinh->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('lop_sinhhoat', $tbl_doncaithiendiem->lop_sinhhoat->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('so_dienthoai', $tbl_doncaithiendiem->so_dienthoai->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('lop_tinchi', $tbl_doncaithiendiem->lop_tinchi->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('hoc_ky', $tbl_doncaithiendiem->hoc_ky->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('nam_hoc1', $tbl_doncaithiendiem->nam_hoc1->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('nam_hoc2', $tbl_doncaithiendiem->nam_hoc2->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('diem', $tbl_doncaithiendiem->diem->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('monthi_lan2', $tbl_doncaithiendiem->monthi_lan2->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('thoigian_h', $tbl_doncaithiendiem->thoigian_h->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('thoigian_phut', $tbl_doncaithiendiem->thoigian_phut->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('ngay_thi', $tbl_doncaithiendiem->ngay_thi->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('ngay_tao_don', $tbl_doncaithiendiem->ngay_tao_don->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('status', $tbl_doncaithiendiem->status->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('active', $tbl_doncaithiendiem->active->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('nguoidung_id', $tbl_doncaithiendiem->nguoidung_id->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('date_time_add', $tbl_doncaithiendiem->date_time_add->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportField('date_time_edit', $tbl_doncaithiendiem->date_time_edit->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
					}	else { // Horizontal format
						$sExportStr = "";
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->phieucaithiendiem_id->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->loaidon_id->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->nhomdon_id->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->msv->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->hoten_sinhvien->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->ngay_sinh->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->lop_sinhhoat->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->so_dienthoai->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->lop_tinchi->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->hoc_ky->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->nam_hoc1->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->nam_hoc2->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->diem->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->monthi_lan2->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->thoigian_h->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->thoigian_phut->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->ngay_thi->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->ngay_tao_don->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->status->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->active->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->nguoidung_id->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->date_time_add->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						ew_ExportAddValue($sExportStr, $tbl_doncaithiendiem->date_time_edit->ExportValue($tbl_doncaithiendiem->Export, $tbl_doncaithiendiem->ExportOriginalValue), $tbl_doncaithiendiem->Export);
						echo ew_ExportLine($sExportStr, $tbl_doncaithiendiem->Export);
					}
				}
			}
			$rs->MoveNext();
		}

		// Close recordset
		$rs->Close();
		if ($tbl_doncaithiendiem->Export == "xml") {
			header("Content-Type: text/xml");
			echo $XmlDoc->XML();
		} else {
			echo ew_ExportFooter($tbl_doncaithiendiem->Export);
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
}
?>
