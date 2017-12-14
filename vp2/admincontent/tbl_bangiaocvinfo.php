<?php

// PHPMaker 6 configuration for Table tbl_bangiaocv
$tbl_bangiaocv = NULL; // Initialize table object

// Define table class
class ctbl_bangiaocv {

	// Define table level constants
	var $TableVar;
	var $TableName;
	var $SelectLimit = FALSE;
	var $bangiao_id;
	var $tieude_congviec;
	var $thoigian_diadiem;
	var $phamvi_doituong;
	var $doituong_thuchien;
	var $thoigian_ketthuc;
	var $thoigian_batdau;
	var $ghichu;
	var $trangthai;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var	$ExportAll = EW_EXPORT_ALL;
	var $SendEmail; // Send Email
	var $TableCustomInnerHtml; // Custom Inner Html

	function ctbl_bangiaocv() {
		$this->TableVar = "tbl_bangiaocv";
		$this->TableName = "tbl_bangiaocv";
		$this->SelectLimit = TRUE;
		$this->bangiao_id = new cField('tbl_bangiaocv', 'x_bangiao_id', 'bangiao_id', "`bangiao_id`", 3, -1, FALSE);
		$this->fields['bangiao_id'] =& $this->bangiao_id;
		$this->tieude_congviec = new cField('tbl_bangiaocv', 'x_tieude_congviec', 'tieude_congviec', "`tieude_congviec`", 200, -1, FALSE);
		$this->fields['tieude_congviec'] =& $this->tieude_congviec;
		$this->thoigian_diadiem = new cField('tbl_bangiaocv', 'x_thoigian_diadiem', 'thoigian_diadiem', "`thoigian_diadiem`", 200, -1, FALSE);
		$this->fields['thoigian_diadiem'] =& $this->thoigian_diadiem;
		$this->phamvi_doituong = new cField('tbl_bangiaocv', 'x_phamvi_doituong', 'phamvi_doituong', "`phamvi_doituong`", 200, -1, FALSE);
		$this->fields['phamvi_doituong'] =& $this->phamvi_doituong;
		$this->doituong_thuchien = new cField('tbl_bangiaocv', 'x_doituong_thuchien', 'doituong_thuchien', "`doituong_thuchien`", 200, -1, FALSE);
		$this->fields['doituong_thuchien'] =& $this->doituong_thuchien;
		$this->thoigian_ketthuc = new cField('tbl_bangiaocv', 'x_thoigian_ketthuc', 'thoigian_ketthuc', "`thoigian_ketthuc`", 135, 7, FALSE);
		$this->fields['thoigian_ketthuc'] =& $this->thoigian_ketthuc;
		$this->thoigian_batdau = new cField('tbl_bangiaocv', 'x_thoigian_batdau', 'thoigian_batdau', "`thoigian_batdau`", 135, 7, FALSE);
		$this->fields['thoigian_batdau'] =& $this->thoigian_batdau;
		$this->ghichu = new cField('tbl_bangiaocv', 'x_ghichu', 'ghichu', "`ghichu`", 201, -1, FALSE);
		$this->fields['ghichu'] =& $this->ghichu;
		$this->trangthai = new cField('tbl_bangiaocv', 'x_trangthai', 'trangthai', "`trangthai`", 3, -1, FALSE);
		$this->fields['trangthai'] =& $this->trangthai;
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
		return "tbl_bangiaocv_Highlight";
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
		return "SELECT * FROM `tbl_bangiaocv`";
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
		return "INSERT INTO `tbl_bangiaocv` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		$SQL = "UPDATE `tbl_bangiaocv` SET ";
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
		$SQL = "DELETE FROM `tbl_bangiaocv` WHERE ";
		$SQL .= EW_DB_QUOTE_START . 'bangiao_id' . EW_DB_QUOTE_END . '=' .	ew_QuotedValue($rs['bangiao_id'], $this->bangiao_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter for table
	function SqlKeyFilter() {
		return "`bangiao_id` = @bangiao_id@";
	}

	// Return Key filter for table
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->bangiao_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@bangiao_id@", ew_AdjustSql($this->bangiao_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "tbl_bangiaocvlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// View url
	function ViewUrl() {
		return $this->KeyUrl("tbl_bangiaocvview.php", $this->UrlParm());
	}

	// Add url
	function AddUrl() {
		$AddUrl = "tbl_bangiaocvadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit url
	function EditUrl() {
		return $this->KeyUrl("tbl_bangiaocvedit.php", $this->UrlParm());
	}

	// Inline edit url
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy url
	function CopyUrl() {
		return $this->KeyUrl("tbl_bangiaocvadd.php", $this->UrlParm());
	}

	// Inline copy url
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete url
	function DeleteUrl() {
		return $this->KeyUrl("tbl_bangiaocvdelete.php", $this->UrlParm());
	}

	// Key url
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->bangiao_id->CurrentValue)) {
			$sUrl .= "bangiao_id=" . urlencode($this->bangiao_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=tbl_bangiaocv" : "";
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
		$this->bangiao_id->setDbValue($rs->fields('bangiao_id'));
		$this->tieude_congviec->setDbValue($rs->fields('tieude_congviec'));
		$this->thoigian_diadiem->setDbValue($rs->fields('thoigian_diadiem'));
		$this->phamvi_doituong->setDbValue($rs->fields('phamvi_doituong'));
		$this->doituong_thuchien->setDbValue($rs->fields('doituong_thuchien'));
		$this->thoigian_ketthuc->setDbValue($rs->fields('thoigian_ketthuc'));
		$this->thoigian_batdau->setDbValue($rs->fields('thoigian_batdau'));
		$this->ghichu->setDbValue($rs->fields('ghichu'));
		$this->trangthai->setDbValue($rs->fields('trangthai'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

		// tieude_congviec
		$this->tieude_congviec->ViewValue = $this->tieude_congviec->CurrentValue;
		$this->tieude_congviec->CssStyle = "";
		$this->tieude_congviec->CssClass = "";
		$this->tieude_congviec->ViewCustomAttributes = "";

		// thoigian_diadiem
		$this->thoigian_diadiem->ViewValue = $this->thoigian_diadiem->CurrentValue;
		$this->thoigian_diadiem->CssStyle = "";
		$this->thoigian_diadiem->CssClass = "";
		$this->thoigian_diadiem->ViewCustomAttributes = "";

		// phamvi_doituong
		$this->phamvi_doituong->ViewValue = $this->phamvi_doituong->CurrentValue;
		$this->phamvi_doituong->CssStyle = "";
		$this->phamvi_doituong->CssClass = "";
		$this->phamvi_doituong->ViewCustomAttributes = "";

		// doituong_thuchien
		$this->doituong_thuchien->ViewValue = $this->doituong_thuchien->CurrentValue;
		$this->doituong_thuchien->CssStyle = "";
		$this->doituong_thuchien->CssClass = "";
		$this->doituong_thuchien->ViewCustomAttributes = "";

		// thoigian_ketthuc
		$this->thoigian_ketthuc->ViewValue = $this->thoigian_ketthuc->CurrentValue;
		$this->thoigian_ketthuc->ViewValue = ew_FormatDateTime($this->thoigian_ketthuc->ViewValue, 7);
		$this->thoigian_ketthuc->CssStyle = "";
		$this->thoigian_ketthuc->CssClass = "";
		$this->thoigian_ketthuc->ViewCustomAttributes = "";

		// thoigian_batdau
		$this->thoigian_batdau->ViewValue = $this->thoigian_batdau->CurrentValue;
		$this->thoigian_batdau->ViewValue = ew_FormatDateTime($this->thoigian_batdau->ViewValue, 7);
		$this->thoigian_batdau->CssStyle = "";
		$this->thoigian_batdau->CssClass = "";
		$this->thoigian_batdau->ViewCustomAttributes = "";

		// ghichu
		$this->ghichu->ViewValue = $this->ghichu->CurrentValue;
		$this->ghichu->CssStyle = "";
		$this->ghichu->CssClass = "";
		$this->ghichu->ViewCustomAttributes = "";

		// trangthai
		if (strval($this->trangthai->CurrentValue) <> "") {
			switch ($this->trangthai->CurrentValue) {
				case "0":
					$this->trangthai->ViewValue = "Khong kich hoat";
					break;
				case "1":
					$this->trangthai->ViewValue = "Kich hoat";
					break;
				default:
					$this->trangthai->ViewValue = $this->trangthai->CurrentValue;
			}
		} else {
			$this->trangthai->ViewValue = NULL;
		}
		$this->trangthai->CssStyle = "";
		$this->trangthai->CssClass = "";
		$this->trangthai->ViewCustomAttributes = "";

		// tieude_congviec
		$this->tieude_congviec->HrefValue = "";

		// thoigian_diadiem
		$this->thoigian_diadiem->HrefValue = "";

		// phamvi_doituong
		$this->phamvi_doituong->HrefValue = "";

		// doituong_thuchien
		$this->doituong_thuchien->HrefValue = "";

		// thoigian_ketthuc
		$this->thoigian_ketthuc->HrefValue = "";

		// thoigian_batdau
		$this->thoigian_batdau->HrefValue = "";

		// ghichu
		$this->ghichu->HrefValue = "";

		// trangthai
		$this->trangthai->HrefValue = "";

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
