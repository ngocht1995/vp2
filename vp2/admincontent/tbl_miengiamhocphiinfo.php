<?php

// PHPMaker 6 configuration for Table tbl_miengiamhocphi
$tbl_miengiamhocphi = NULL; // Initialize table object

// Define table class
class ctbl_miengiamhocphi {

	// Define table level constants
	var $TableVar;
	var $TableName;
	var $SelectLimit = FALSE;
	var $don_tchthp_id;
	var $loaidon_id;
	var $nhomdon_id;
	var $msv;
	var $hoten_sinhvien;
	var $ngay_thang_nam;
	var $noi_sinh;
	var $hoten_chame;
	var $hokhau;
	var $nganhhoc;
	var $doituong;
	var $datetime;
	var $status;
	var $active;
	var $nguoidung_id;
	var $datetime_add;
	var $dateedit_edit;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var	$ExportAll = EW_EXPORT_ALL;
	var $SendEmail; // Send Email
	var $TableCustomInnerHtml; // Custom Inner Html

	function ctbl_miengiamhocphi() {
		$this->TableVar = "tbl_miengiamhocphi";
		$this->TableName = "tbl_miengiamhocphi";
		$this->SelectLimit = TRUE;
		$this->don_tchthp_id = new cField('tbl_miengiamhocphi', 'x_don_tchthp_id', 'don_tchthp_id', "`don_tchthp_id`", 3, -1, FALSE);
		$this->fields['don_tchthp_id'] =& $this->don_tchthp_id;
		$this->loaidon_id = new cField('tbl_miengiamhocphi', 'x_loaidon_id', 'loaidon_id', "`loaidon_id`", 3, -1, FALSE);
		$this->fields['loaidon_id'] =& $this->loaidon_id;
		$this->nhomdon_id = new cField('tbl_miengiamhocphi', 'x_nhomdon_id', 'nhomdon_id', "`nhomdon_id`", 3, -1, FALSE);
		$this->fields['nhomdon_id'] =& $this->nhomdon_id;
		$this->msv = new cField('tbl_miengiamhocphi', 'x_msv', 'msv', "`msv`", 200, -1, FALSE);
		$this->fields['msv'] =& $this->msv;
		$this->hoten_sinhvien = new cField('tbl_miengiamhocphi', 'x_hoten_sinhvien', 'hoten_sinhvien', "`hoten_sinhvien`", 200, -1, FALSE);
		$this->fields['hoten_sinhvien'] =& $this->hoten_sinhvien;
		$this->ngay_thang_nam = new cField('tbl_miengiamhocphi', 'x_ngay_thang_nam', 'ngay_thang_nam', "`ngay_thang_nam`", 200, -1, FALSE);
		$this->fields['ngay_thang_nam'] =& $this->ngay_thang_nam;
		$this->noi_sinh = new cField('tbl_miengiamhocphi', 'x_noi_sinh', 'noi_sinh', "`noi_sinh`", 200, -1, FALSE);
		$this->fields['noi_sinh'] =& $this->noi_sinh;
		$this->hoten_chame = new cField('tbl_miengiamhocphi', 'x_hoten_chame', 'hoten_chame', "`hoten_chame`", 200, -1, FALSE);
		$this->fields['hoten_chame'] =& $this->hoten_chame;
		$this->hokhau = new cField('tbl_miengiamhocphi', 'x_hokhau', 'hokhau', "`hokhau`", 201, -1, FALSE);
		$this->fields['hokhau'] =& $this->hokhau;
		$this->nganhhoc = new cField('tbl_miengiamhocphi', 'x_nganhhoc', 'nganhhoc', "`nganhhoc`", 200, -1, FALSE);
		$this->fields['nganhhoc'] =& $this->nganhhoc;
		$this->doituong = new cField('tbl_miengiamhocphi', 'x_doituong', 'doituong', "`doituong`", 201, -1, FALSE);
		$this->fields['doituong'] =& $this->doituong;
		$this->datetime = new cField('tbl_miengiamhocphi', 'x_datetime', 'datetime', "`datetime`", 135, 7, FALSE);
		$this->fields['datetime'] =& $this->datetime;
		$this->status = new cField('tbl_miengiamhocphi', 'x_status', 'status', "`status`", 3, -1, FALSE);
		$this->fields['status'] =& $this->status;
		$this->active = new cField('tbl_miengiamhocphi', 'x_active', 'active', "`active`", 3, -1, FALSE);
		$this->fields['active'] =& $this->active;
		$this->nguoidung_id = new cField('tbl_miengiamhocphi', 'x_nguoidung_id', 'nguoidung_id', "`nguoidung_id`", 3, -1, FALSE);
		$this->fields['nguoidung_id'] =& $this->nguoidung_id;
		$this->datetime_add = new cField('tbl_miengiamhocphi', 'x_datetime_add', 'datetime_add', "`datetime_add`", 135, 7, FALSE);
		$this->fields['datetime_add'] =& $this->datetime_add;
		$this->dateedit_edit = new cField('tbl_miengiamhocphi', 'x_dateedit_edit', 'dateedit_edit', "`dateedit_edit`", 135, 7, FALSE);
		$this->fields['dateedit_edit'] =& $this->dateedit_edit;
	}

	// Records per page
	function getRecordsPerPage() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_REC_PER_PAGE];
	}

	function setRecordsPerPage($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_REC_PER_PAGE] = $v;
	}

	// Start record number
	function getStartRecordNumber() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_START_REC];
	}

	function setStartRecordNumber($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_START_REC] = $v;
	}

	// Search Highlight Name
	function HighlightName() {
		return "tbl_miengiamhocphi_Highlight";
	}

	// Advanced search
	function getAdvancedSearch($fld) {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ADVANCED_SEARCH . "_" . $fld];
	}

	function setAdvancedSearch($fld, $v) {
		if (@$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ADVANCED_SEARCH . "_" . $fld] <> $v) {
			$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ADVANCED_SEARCH . "_" . $fld] = $v;
		}
	}

	// Basic search Keyword
	function getBasicSearchKeyword() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH];
	}

	function setBasicSearchKeyword($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH] = $v;
	}

	// Basic Search Type
	function getBasicSearchType() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH_TYPE];
	}

	function setBasicSearchType($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_BASIC_SEARCH_TYPE] = $v;
	}

	// Search where clause
	function getSearchWhere() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_SEARCH_WHERE];
	}

	function setSearchWhere($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_SEARCH_WHERE] = $v;
	}

	// Single column sort
	function UpdateSort(&$ofld) {
		if ($this->CurrentOrder == $ofld->FldName) {
			$sSortField = $ofld->FldExpression;
			$sLastSort = $ofld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$sThisSort = $this->CurrentOrderType;
			} else {
				$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			}
			$ofld->setSort($sThisSort);
			$this->setSessionOrderBy($sSortField . " " . $sThisSort); // Save to Session
		} else {
			$ofld->setSort("");
		}
	}

	// Session WHERE Clause
	function getSessionWhere() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_WHERE];
	}

	function setSessionWhere($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_WHERE] = $v;
	}

	// Session ORDER BY
	function getSessionOrderBy() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ORDER_BY];
	}

	function setSessionOrderBy($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_ORDER_BY] = $v;
	}

	// Session Key
	function getKey($fld) {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_KEY . "_" . $fld];
	}

	function setKey($fld, $v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_KEY . "_" . $fld] = $v;
	}

	// Table level SQL
	function SqlSelect() { // Select
		return "SELECT * FROM `tbl_miengiamhocphi`";
	}

	function SqlWhere() { // Where
		return "";
	}

	function SqlGroupBy() { // Group By
		return "";
	}

	function SqlHaving() { // Having
		return "";
	}

	function SqlOrderBy() { // Order By
		return "";
	}

	// SQL variables
	var $CurrentFilter; // Current filter
	var $CurrentOrder; // Current order
	var $CurrentOrderType; // Current order type

	// Get SQL
	function GetSQL($where, $orderby) {
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$where, $orderby);
	}

	// Table SQL
	function SQL() {
		$sFilter = $this->CurrentFilter;
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$sFilter, $sSort);
	}

	// Return table sql with list page filter
	function SelectSQL() {
		$sFilter = $this->getSessionWhere();
		if ($this->CurrentFilter <> "") {
			if ($sFilter <> "") $sFilter = "($sFilter) AND ";
			$sFilter .= "(" . $this->CurrentFilter . ")";
		}
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql($this->SqlSelect(), $this->SqlWhere(),
			$this->SqlGroupBy(), $this->SqlHaving(), $this->SqlOrderBy(),
			$sFilter, $sSort);
	}

	// Return record count
	function SelectRecordCount() {
		global $conn;
		$cnt = -1;
		$sFilter = $this->CurrentFilter;
		$this->Recordset_Selecting($this->CurrentFilter);
		if ($this->SelectLimit) {
			$sSelect = $this->SelectSQL();
			if (strtoupper(substr($sSelect, 0, 13)) == "SELECT * FROM") {
				$sSelect = "SELECT COUNT(*) FROM" . substr($sSelect, 13);
				if ($rs = $conn->Execute($sSelect)) {
					if (!$rs->EOF)
						$cnt = $rs->fields[0];
					$rs->Close();
				}
			}
		}
		if ($cnt == -1) {
			if ($rs = $conn->Execute($this->SelectSQL())) {
				$cnt = $rs->RecordCount();
				$rs->Close();
			}
		}
		$this->CurrentFilter = $sFilter;
		return intval($cnt);
	}

	// INSERT statement
	function InsertSQL(&$rs) {
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			$names .= $this->fields[$name]->FldExpression . ",";
			$values .= (is_null($value) ? "NULL" : ew_QuotedValue($value, $this->fields[$name]->FldDataType)) . ",";
		}
		if (substr($names, -1) == ",") $names = substr($names, 0, strlen($names)-1);
		if (substr($values, -1) == ",") $values = substr($values, 0, strlen($values)-1);
		return "INSERT INTO `tbl_miengiamhocphi` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		$SQL = "UPDATE `tbl_miengiamhocphi` SET ";
		foreach ($rs as $name => $value) {
			$SQL .= $this->fields[$name]->FldExpression . "=" .
					(is_null($value) ? "NULL" : ew_QuotedValue($value, $this->fields[$name]->FldDataType)) . ",";
		}
		if (substr($SQL, -1) == ",") $SQL = substr($SQL, 0, strlen($SQL)-1);
		if ($this->CurrentFilter <> "")	$SQL .= " WHERE " . $this->CurrentFilter;
		return $SQL;
	}

	// DELETE statement
	function DeleteSQL(&$rs) {
		$SQL = "DELETE FROM `tbl_miengiamhocphi` WHERE ";
		$SQL .= EW_DB_QUOTE_START . 'don_tchthp_id' . EW_DB_QUOTE_END . '=' .	ew_QuotedValue($rs['don_tchthp_id'], $this->don_tchthp_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter for table
	function SqlKeyFilter() {
		return "`don_tchthp_id` = @don_tchthp_id@";
	}

	// Return Key filter for table
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->don_tchthp_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@don_tchthp_id@", ew_AdjustSql($this->don_tchthp_id->CurrentValue), $sKeyFilter); // Replace key value
		return $sKeyFilter;
	}

	// Return url
	function getReturnUrl() {

		// Get referer URL automatically
		if (ew_ServerVar("HTTP_REFERER") <> "" && ew_ReferPage() <> ew_CurrentPage() && ew_ReferPage() <> "login.php") // Referer not same page or login page
			$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = ew_ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] <> "") {
			return $_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL];
		} else {
			return "tbl_miengiamhocphilist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// View url
	function ViewUrl() {
		return $this->KeyUrl("tbl_miengiamhocphiview.php", $this->UrlParm());
	}

	// Add url
	function AddUrl() {
		$AddUrl = "tbl_miengiamhocphiadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit url
	function EditUrl() {
		return $this->KeyUrl("tbl_miengiamhocphiedit.php", $this->UrlParm());
	}

	// Inline edit url
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy url
	function CopyUrl() {
		return $this->KeyUrl("tbl_miengiamhocphiadd.php", $this->UrlParm());
	}

	// Inline copy url
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete url
	function DeleteUrl() {
		return $this->KeyUrl("tbl_miengiamhocphidelete.php", $this->UrlParm());
	}

	// Key url
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->don_tchthp_id->CurrentValue)) {
			$sUrl .= "don_tchthp_id=" . urlencode($this->don_tchthp_id->CurrentValue);
		} else {
			return "javascript:alert('Invalid Record! Key is null');";
		}
		return $sUrl;
	}

	// Sort Url
	function SortUrl(&$fld) {
		if ($this->CurrentAction <> "" || $this->Export <> "" ||
			($fld->FldType == 205)) { // Unsortable data type
			return "";
		} else {
			$sUrlParm = $this->UrlParm("order=" . urlencode($fld->FldName) . "&ordertype=" . $fld->ReverseSort());
			return ew_CurrentPage() . "?" . $sUrlParm;
		}
	}

	// URL parm
	function UrlParm($parm = "") {
		$UrlParm = ($this->UseTokenInUrl) ? "t=tbl_miengiamhocphi" : "";
		if ($parm <> "") {
			if ($UrlParm <> "")
				$UrlParm .= "&";
			$UrlParm .= $parm;
		}
		return $UrlParm;
	}

	// Function LoadRs
	// - Load rows based on filter
	function LoadRs($sFilter) {
		global $conn;

		// Set up filter (Sql Where Clause) and get Return Sql
		$this->CurrentFilter = $sFilter;
		$sSql = $this->SQL();
		return $conn->Execute($sSql);
	}

	// Load row values from recordset
	function LoadListRowValues(&$rs) {
		$this->don_tchthp_id->setDbValue($rs->fields('don_tchthp_id'));
		$this->loaidon_id->setDbValue($rs->fields('loaidon_id'));
		$this->nhomdon_id->setDbValue($rs->fields('nhomdon_id'));
		$this->msv->setDbValue($rs->fields('msv'));
		$this->hoten_sinhvien->setDbValue($rs->fields('hoten_sinhvien'));
		$this->ngay_thang_nam->setDbValue($rs->fields('ngay_thang_nam'));
		$this->noi_sinh->setDbValue($rs->fields('noi_sinh'));
		$this->hoten_chame->setDbValue($rs->fields('hoten_chame'));
		$this->hokhau->setDbValue($rs->fields('hokhau'));
		$this->nganhhoc->setDbValue($rs->fields('nganhhoc'));
		$this->doituong->setDbValue($rs->fields('doituong'));
		$this->datetime->setDbValue($rs->fields('datetime'));
		$this->status->setDbValue($rs->fields('status'));
		$this->active->setDbValue($rs->fields('active'));
		$this->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$this->datetime_add->setDbValue($rs->fields('datetime_add'));
		$this->dateedit_edit->setDbValue($rs->fields('dateedit_edit'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

		// loaidon_id
		if (strval($this->loaidon_id->CurrentValue) <> "") {
			switch ($this->loaidon_id->CurrentValue) {
				case "0":
					$this->loaidon_id->ViewValue = "khong xu ly";
					break;
				case "1":
					$this->loaidon_id->ViewValue = "Xu ly";
					break;
				default:
					$this->loaidon_id->ViewValue = $this->loaidon_id->CurrentValue;
			}
		} else {
			$this->loaidon_id->ViewValue = NULL;
		}
		$this->loaidon_id->CssStyle = "";
		$this->loaidon_id->CssClass = "";
		$this->loaidon_id->ViewCustomAttributes = "";

		// msv
		$this->msv->ViewValue = $this->msv->CurrentValue;
		$this->msv->CssStyle = "";
		$this->msv->CssClass = "";
		$this->msv->ViewCustomAttributes = "";

		// hoten_sinhvien
		$this->hoten_sinhvien->ViewValue = $this->hoten_sinhvien->CurrentValue;
		$this->hoten_sinhvien->CssStyle = "";
		$this->hoten_sinhvien->CssClass = "";
		$this->hoten_sinhvien->ViewCustomAttributes = "";

		// noi_sinh
		$this->noi_sinh->ViewValue = $this->noi_sinh->CurrentValue;
		$this->noi_sinh->CssStyle = "";
		$this->noi_sinh->CssClass = "";
		$this->noi_sinh->ViewCustomAttributes = "";

		// datetime
		$this->datetime->ViewValue = $this->datetime->CurrentValue;
		$this->datetime->ViewValue = ew_FormatDateTime($this->datetime->ViewValue, 7);
		$this->datetime->CssStyle = "";
		$this->datetime->CssClass = "";
		$this->datetime->ViewCustomAttributes = "";

		// status
		if (strval($this->status->CurrentValue) <> "") {
			switch ($this->status->CurrentValue) {
				case "0":
					$this->status->ViewValue = "Khong xet duyet";
					break;
				case "1":
					$this->status->ViewValue = "Cho xet duyet";
					break;
				case "2":
					$this->status->ViewValue = "dang xu ly";
					break;
				case "3 ":
					$this->status->ViewValue = "Ket thuc";
					break;
				default:
					$this->status->ViewValue = $this->status->CurrentValue;
			}
		} else {
			$this->status->ViewValue = NULL;
		}
		$this->status->CssStyle = "";
		$this->status->CssClass = "";
		$this->status->ViewCustomAttributes = "";

		// datetime_add
		$this->datetime_add->ViewValue = $this->datetime_add->CurrentValue;
		$this->datetime_add->ViewValue = ew_FormatDateTime($this->datetime_add->ViewValue, 7);
		$this->datetime_add->CssStyle = "";
		$this->datetime_add->CssClass = "";
		$this->datetime_add->ViewCustomAttributes = "";

		// dateedit_edit
		$this->dateedit_edit->ViewValue = $this->dateedit_edit->CurrentValue;
		$this->dateedit_edit->ViewValue = ew_FormatDateTime($this->dateedit_edit->ViewValue, 7);
		$this->dateedit_edit->CssStyle = "";
		$this->dateedit_edit->CssClass = "";
		$this->dateedit_edit->ViewCustomAttributes = "";

		// loaidon_id
		$this->loaidon_id->HrefValue = "";

		// msv
		$this->msv->HrefValue = "";

		// hoten_sinhvien
		$this->hoten_sinhvien->HrefValue = "";

		// noi_sinh
		$this->noi_sinh->HrefValue = "";

		// datetime
		$this->datetime->HrefValue = "";

		// status
		$this->status->HrefValue = "";

		// datetime_add
		$this->datetime_add->HrefValue = "";

		// dateedit_edit
		$this->dateedit_edit->HrefValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();
	}
	var $CurrentAction; // Current action
	var $EventName; // Event name
	var $EventCancelled; // Event cancelled
	var $CancelMessage; // Cancel message
	var $RowType; // Row Type
	var $CssClass; // Css class
	var $CssStyle; // Css style
	var $RowClientEvents; // Row client events

	// Row Attribute
	function RowAttributes() {
		$sAtt = "";
		if (trim($this->CssStyle) <> "") {
			$sAtt .= " style=\"" . trim($this->CssStyle) . "\"";
		}
		if (trim($this->CssClass) <> "") {
			$sAtt .= " class=\"" . trim($this->CssClass) . "\"";
		}
		if ($this->Export == "") {
			if (trim($this->RowClientEvents) <> "") {
				$sAtt .= " " . trim($this->RowClientEvents);
			}
		}
		return $sAtt;
	}

	// Field objects
	function fields($fldname) {
		return $this->fields[$fldname];
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here	
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here	
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here	
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here	
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>); 

	}

	// Row Inserting event
	function Row_Inserting(&$rs) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted(&$rs) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating(&$rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated(&$rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}
}
?>
