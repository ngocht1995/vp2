<?php

// PHPMaker 6 configuration for Table Search_offer
$Search_offer = NULL; // Initialize table object

// Define table class
class cSearch_offer {

	// Define table level constants
	var $TableVar;
	var $TableName;
	var $SelectLimit = FALSE;
	var $anh_chaohang;
	var $tieude_chaohang;
	var $nganhnghe_id;
	var $kieu_chaohang;
	var $so_lanxem;	
	var $noidung_chaohang;
	var $chaohang_id;
	var $ten_congty;	
	var $xuatban;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var	$ExportAll = EW_EXPORT_ALL;
	var $SendEmail; // Send Email
	var $TableCustomInnerHtml; // Custom Inner Html

	function cSearch_offer() {
		$this->TableVar = "Search_offer";
		$this->TableName = "Search_offer";
		$this->anh_chaohang = new cField('Search_offer', 'x_anh_chaohang', 'anh_chaohang', "offer.anh_chaohang", 201, -1, TRUE);
		$this->fields['anh_chaohang'] =& $this->anh_chaohang;
		$this->tieude_chaohang = new cField('Search_offer', 'x_tieude_chaohang', 'tieude_chaohang', "offer.tieude_chaohang", 201, -1, FALSE);
		$this->fields['tieude_chaohang'] =& $this->tieude_chaohang;
		$this->nganhnghe_id = new cField('Search_offer', 'x_nganhnghe_id', 'nganhnghe_id', "offer.nganhnghe_id", 19, -1, FALSE);
		$this->fields['nganhnghe_id'] =& $this->nganhnghe_id;
		$this->kieu_chaohang = new cField('Search_offer', 'x_kieu_chaohang', 'kieu_chaohang', "offer.kieu_chaohang", 19, -1, FALSE);
		$this->fields['kieu_chaohang'] =& $this->kieu_chaohang;
		$this->so_lanxem = new cField('Search_offer', 'x_so_lanxem', 'so_lanxem', "offer.so_lanxem", 19, -1, FALSE);
		$this->fields['so_lanxem'] =& $this->so_lanxem;
		$this->noidung_chaohang = new cField('Search_offer', 'x_noidung_chaohang', 'noidung_chaohang', "offer.noidung_chaohang", 201, -1, FALSE);
		$this->fields['noidung_chaohang'] =& $this->noidung_chaohang;
		$this->chaohang_id = new cField('Search_offer', 'x_chaohang_id', 'chaohang_id', "offer.chaohang_id", 19, -1, FALSE);
		$this->fields['chaohang_id'] =& $this->chaohang_id;
		$this->ten_congty = new cField('Search_offer', 'x_ten_congty', 'ten_congty', "user.ten_congty", 201, -1, FALSE);
		$this->fields['ten_congty'] =& $this->ten_congty;
		$this->xuatban = new cField('Search_offer', 'x_xuatban', 'xuatban', "offer.xuatban", 19, -1, FALSE);
		$this->fields['xuatban'] =& $this->xuatban;
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
		return "Search_offer_Highlight";
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
		return "SELECT offer.*, user.ten_congty FROM offer Inner Join user On offer.nguoidung_id = user.nguoidung_id Inner Join career On career.nganhnghe_id=offer.nganhnghe_id";
	}

	function SqlWhere() { // Where
		return "offer.xuatban = 1";
	}

	function SqlGroupBy() { // Group By
		return "";
	}

	function SqlHaving() { // Having
		return "";
	}

	function SqlOrderBy() { // Order By
		return "offer.tg_suachaohang desc";
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
		return "INSERT INTO offer Inner Join user On offer.nguoidung_id = user.nguoidung_id ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		$SQL = "UPDATE offer Inner Join user On offer.nguoidung_id = user.nguoidung_id SET ";
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
		$SQL = "DELETE FROM offer Inner Join user On offer.nguoidung_id = user.nguoidung_id WHERE ";
		$SQL .= EW_DB_QUOTE_START . 'chaohang_id' . EW_DB_QUOTE_END . '=' .	ew_QuotedValue($rs['chaohang_id'], $this->chaohang_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter for table
	function SqlKeyFilter() {
		return "offer.chaohang_id = @chaohang_id@";
	}

	// Return Key filter for table
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->chaohang_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@chaohang_id@", ew_AdjustSql($this->chaohang_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "Search_offerlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// View url
	function ViewUrl() {
		return $this->KeyUrl("Search_offerview.php", $this->UrlParm());
	}

	// Add url
	function AddUrl() {
		$AddUrl = "Search_offeradd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit url
	function EditUrl() {
		return $this->KeyUrl("Search_offeredit.php", $this->UrlParm());
	}

	// Inline edit url
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy url
	function CopyUrl() {
		return $this->KeyUrl("Search_offeradd.php", $this->UrlParm());
	}

	// Inline copy url
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete url
	function DeleteUrl() {
		return $this->KeyUrl("Search_offerdelete.php", $this->UrlParm());
	}

	// Key url
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->chaohang_id->CurrentValue)) {
			$sUrl .= "chaohang_id=" . urlencode($this->chaohang_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=Search_offer" : "";
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
		$this->anh_chaohang->Upload->DbValue = $rs->fields('anh_chaohang');
		$this->tieude_chaohang->setDbValue($rs->fields('tieude_chaohang'));
		$this->nganhnghe_id->setDbValue($rs->fields('nganhnghe_id'));
		$this->kieu_chaohang->setDbValue($rs->fields('kieu_chaohang'));
		$this->so_lanxem->setDbValue($rs->fields('so_lanxem'));
		$this->noidung_chaohang->setDbValue($rs->fields('noidung_chaohang'));
		$this->chaohang_id->setDbValue($rs->fields('chaohang_id'));
		$this->ten_congty->setDbValue($rs->fields('ten_congty'));
		$this->xuatban->setDbValue($rs->fields('xuatban'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

		// anh_chaohang
		if (!is_null($this->anh_chaohang->Upload->DbValue)) {
			$this->anh_chaohang->ViewValue = $this->anh_chaohang->Upload->DbValue;
			$this->anh_chaohang->ImageWidth = 0;
			$this->anh_chaohang->ImageHeight = 100;
			$this->anh_chaohang->ImageAlt = "";
		} else {
			$this->anh_chaohang->ViewValue = "";
		}
		$this->anh_chaohang->CssStyle = "";
		$this->anh_chaohang->CssClass = "";
		$this->anh_chaohang->ViewCustomAttributes = "";

		// tieude_chaohang
		$this->tieude_chaohang->ViewValue = $this->tieude_chaohang->CurrentValue;
		$this->tieude_chaohang->CssStyle = "";
		$this->tieude_chaohang->CssClass = "";
		$this->tieude_chaohang->ViewCustomAttributes = "";

		// nganhnghe_id
		if (strval($this->nganhnghe_id->CurrentValue) <> "") {
			$sSqlWrk = "SELECT `nganhnghe_ten` FROM `career` WHERE `nganhnghe_id` = " . ew_AdjustSql($this->nganhnghe_id->CurrentValue) . "";
			$rswrk = $conn->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup value(s) found
				$this->nganhnghe_id->ViewValue = $rswrk->fields('nganhnghe_ten');
				$rswrk->Close();
			} else {
				$this->nganhnghe_id->ViewValue = $this->nganhnghe_id->CurrentValue;
			}
		} else {
			$this->nganhnghe_id->ViewValue = NULL;
		}
		$this->nganhnghe_id->CssStyle = "";
		$this->nganhnghe_id->CssClass = "";
		$this->nganhnghe_id->ViewCustomAttributes = "";

		// kieu_chaohang
		if (strval($this->kieu_chaohang->CurrentValue) <> "") {
			switch ($this->kieu_chaohang->CurrentValue) {
				case "1":
					$this->kieu_chaohang->ViewValue = "Chào bán";
					break;
				case "2":
					$this->kieu_chaohang->ViewValue = "Chào mua";
					break;
				default:
					$this->kieu_chaohang->ViewValue = $this->kieu_chaohang->CurrentValue;
			}
		} else {
			$this->kieu_chaohang->ViewValue = NULL;
		}
		$this->kieu_chaohang->CssStyle = "";
		$this->kieu_chaohang->CssClass = "";
		$this->kieu_chaohang->ViewCustomAttributes = "";

		// so_lanxem
		$this->so_lanxem->ViewValue = $this->so_lanxem->CurrentValue;
		$this->so_lanxem->CssStyle = "";
		$this->so_lanxem->CssClass = "";
		$this->so_lanxem->ViewCustomAttributes = "";

		// ten_congty
		$this->ten_congty->ViewValue = $this->ten_congty->CurrentValue;
		$this->ten_congty->CssStyle = "";
		$this->ten_congty->CssClass = "";
		$this->ten_congty->ViewCustomAttributes = "";

		// anh_chaohang
		if (!is_null($this->anh_chaohang->Upload->DbValue)) {
			$this->anh_chaohang->HrefValue = ew_UploadPathEx(FALSE, EW_UPLOAD_DEST_PATH) . ((!empty($this->anh_chaohang->ViewValue)) ? $this->anh_chaohang->ViewValue : $this->anh_chaohang->CurrentValue);
			if ($this->Export <> "") $Search_offer->anh_chaohang->HrefValue = ew_ConvertFullUrl($this->anh_chaohang->HrefValue);
		} else {
			$this->anh_chaohang->HrefValue = "";
		}

		// tieude_chaohang
		$this->tieude_chaohang->HrefValue = "";

		// nganhnghe_id
		$this->nganhnghe_id->HrefValue = "";

		// kieu_chaohang
		$this->kieu_chaohang->HrefValue = "";

		// so_lanxem
		$this->so_lanxem->HrefValue = "";

		// ten_congty
		$this->ten_congty->HrefValue = "";

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
