<?php

// PHPMaker 6 configuration for Table Promotional
$Promotional = NULL; // Initialize table object

// Define table class
class cPromotional {

	// Define table level constants
	var $TableVar;
	var $TableName;
	var $SelectLimit = FALSE;
	var $tintuc_id;
	var $nguoidung_id;
	var $tieude_tintuc;
	var $tukhoa_tintuc;
	var $tomtat_tintuc;
	var $anh_tintuc;
	var $nguon_tintuc;
	var $noidung_tintuc;
	var $lienket_tintuc;
	var $hienthi_tungay;
	var $hienthi_denngay;
	var $thoigian_them;
	var $thoigian_sua;
	var $soluot_truynhap;
	var $trang_thai;
	var $thutu_sapxep;
	var $xuatban;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var	$ExportAll = EW_EXPORT_ALL;
	var $SendEmail; // Send Email
	var $TableCustomInnerHtml; // Custom Inner Html

	function cPromotional() {
		$this->TableVar = "Promotional";
		$this->TableName = "Promotional";
		$this->SelectLimit = TRUE;
		$this->tintuc_id = new cField('Promotional', 'x_tintuc_id', 'tintuc_id', "`tintuc_id`", 19, -1, FALSE);
		$this->fields['tintuc_id'] =& $this->tintuc_id;
		$this->nguoidung_id = new cField('Promotional', 'x_nguoidung_id', 'nguoidung_id', "`nguoidung_id`", 19, -1, FALSE);
		$this->fields['nguoidung_id'] =& $this->nguoidung_id;
		$this->tieude_tintuc = new cField('Promotional', 'x_tieude_tintuc', 'tieude_tintuc', "`tieude_tintuc`", 200, -1, FALSE);
		$this->fields['tieude_tintuc'] =& $this->tieude_tintuc;
		$this->tukhoa_tintuc = new cField('Promotional', 'x_tukhoa_tintuc', 'tukhoa_tintuc', "`tukhoa_tintuc`", 200, -1, FALSE);
		$this->fields['tukhoa_tintuc'] =& $this->tukhoa_tintuc;
		$this->tomtat_tintuc = new cField('Promotional', 'x_tomtat_tintuc', 'tomtat_tintuc', "`tomtat_tintuc`", 201, -1, FALSE);
		$this->fields['tomtat_tintuc'] =& $this->tomtat_tintuc;
		$this->anh_tintuc = new cField('Promotional', 'x_anh_tintuc', 'anh_tintuc', "`anh_tintuc`", 200, -1, TRUE);
		$this->fields['anh_tintuc'] =& $this->anh_tintuc;
		$this->nguon_tintuc = new cField('Promotional', 'x_nguon_tintuc', 'nguon_tintuc', "`nguon_tintuc`", 200, -1, FALSE);
		$this->fields['nguon_tintuc'] =& $this->nguon_tintuc;
		$this->noidung_tintuc = new cField('Promotional', 'x_noidung_tintuc', 'noidung_tintuc', "`noidung_tintuc`", 201, -1, FALSE);
		$this->fields['noidung_tintuc'] =& $this->noidung_tintuc;
		$this->lienket_tintuc = new cField('Promotional', 'x_lienket_tintuc', 'lienket_tintuc', "`lienket_tintuc`", 200, -1, FALSE);
		$this->fields['lienket_tintuc'] =& $this->lienket_tintuc;
		$this->hienthi_tungay = new cField('Promotional', 'x_hienthi_tungay', 'hienthi_tungay', "`hienthi_tungay`", 135, 7, FALSE);
		$this->fields['hienthi_tungay'] =& $this->hienthi_tungay;
		$this->hienthi_denngay = new cField('Promotional', 'x_hienthi_denngay', 'hienthi_denngay', "`hienthi_denngay`", 135, 7, FALSE);
		$this->fields['hienthi_denngay'] =& $this->hienthi_denngay;
		$this->thoigian_them = new cField('Promotional', 'x_thoigian_them', 'thoigian_them', "`thoigian_them`", 135, 7, FALSE);
		$this->fields['thoigian_them'] =& $this->thoigian_them;
		$this->thoigian_sua = new cField('Promotional', 'x_thoigian_sua', 'thoigian_sua', "`thoigian_sua`", 135, 7, FALSE);
		$this->fields['thoigian_sua'] =& $this->thoigian_sua;
		$this->soluot_truynhap = new cField('Promotional', 'x_soluot_truynhap', 'soluot_truynhap', "`soluot_truynhap`", 19, -1, FALSE);
		$this->fields['soluot_truynhap'] =& $this->soluot_truynhap;
		$this->trang_thai = new cField('Promotional', 'x_trang_thai', 'trang_thai', "`trang_thai`", 19, -1, FALSE);
		$this->fields['trang_thai'] =& $this->trang_thai;
		$this->thutu_sapxep = new cField('Promotional', 'x_thutu_sapxep', 'thutu_sapxep', "`thutu_sapxep`", 5, -1, FALSE);
		$this->fields['thutu_sapxep'] =& $this->thutu_sapxep;
		$this->xuatban = new cField('Promotional', 'x_xuatban', 'xuatban', "`xuatban`", 19, -1, FALSE);
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
		return "Promotional_Highlight";
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
		return "SELECT * FROM `Promotional`";
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
		global $Security;

		// Add User ID filter
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$sFilter = $this->AddUserIDFilter($sFilter);
		}
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
		global $Security;

		// Add User ID filter
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin()) { // Non system admin
			$sFilter = $this->AddUserIDFilter($sFilter);
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
		return "INSERT INTO `Promotional` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		$SQL = "UPDATE `Promotional` SET ";
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
		$SQL = "DELETE FROM `Promotional` WHERE ";
		$SQL .= EW_DB_QUOTE_START . 'tintuc_id' . EW_DB_QUOTE_END . '=' .	ew_QuotedValue($rs['tintuc_id'], $this->tintuc_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter for table
	function SqlKeyFilter() {
		return "`tintuc_id` = @tintuc_id@";
	}

	// Return Key filter for table
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->tintuc_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@tintuc_id@", ew_AdjustSql($this->tintuc_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "Promotionallist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// View url
	function ViewUrl() {
		return $this->KeyUrl("Promotionalview.php", $this->UrlParm());
	}

	// Add url
	function AddUrl() {
		$AddUrl = "Promotionaladd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit url
	function EditUrl() {
		return $this->KeyUrl("Promotionaledit.php", $this->UrlParm());
	}

	// Inline edit url
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy url
	function CopyUrl() {
		return $this->KeyUrl("Promotionaladd.php", $this->UrlParm());
	}

	// Inline copy url
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete url
	function DeleteUrl() {
		return $this->KeyUrl("Promotionaldelete.php", $this->UrlParm());
	}

	// Key url
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->tintuc_id->CurrentValue)) {
			$sUrl .= "tintuc_id=" . urlencode($this->tintuc_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=Promotional" : "";
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
		$this->tintuc_id->setDbValue($rs->fields('tintuc_id'));
		$this->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$this->tieude_tintuc->setDbValue($rs->fields('tieude_tintuc'));
		$this->tukhoa_tintuc->setDbValue($rs->fields('tukhoa_tintuc'));
		$this->tomtat_tintuc->setDbValue($rs->fields('tomtat_tintuc'));
		$this->anh_tintuc->Upload->DbValue = $rs->fields('anh_tintuc');
		$this->nguon_tintuc->setDbValue($rs->fields('nguon_tintuc'));
		$this->noidung_tintuc->setDbValue($rs->fields('noidung_tintuc'));
		$this->lienket_tintuc->setDbValue($rs->fields('lienket_tintuc'));
		$this->hienthi_tungay->setDbValue($rs->fields('hienthi_tungay'));
		$this->hienthi_denngay->setDbValue($rs->fields('hienthi_denngay'));
		$this->thoigian_them->setDbValue($rs->fields('thoigian_them'));
		$this->thoigian_sua->setDbValue($rs->fields('thoigian_sua'));
		$this->soluot_truynhap->setDbValue($rs->fields('soluot_truynhap'));
		$this->trang_thai->setDbValue($rs->fields('trang_thai'));
		$this->thutu_sapxep->setDbValue($rs->fields('thutu_sapxep'));
		$this->xuatban->setDbValue($rs->fields('xuatban'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

		// tieude_tintuc
		$this->tieude_tintuc->ViewValue = $this->tieude_tintuc->CurrentValue;
		$this->tieude_tintuc->CssStyle = "";
		$this->tieude_tintuc->CssClass = "";
		$this->tieude_tintuc->ViewCustomAttributes = "";

		// thoigian_them
		$this->thoigian_them->ViewValue = $this->thoigian_them->CurrentValue;
		$this->thoigian_them->ViewValue = ew_FormatDateTime($this->thoigian_them->ViewValue, 7);
		$this->thoigian_them->CssStyle = "";
		$this->thoigian_them->CssClass = "";
		$this->thoigian_them->ViewCustomAttributes = "";

		// soluot_truynhap
		$this->soluot_truynhap->ViewValue = $this->soluot_truynhap->CurrentValue;
		$this->soluot_truynhap->CssStyle = "";
		$this->soluot_truynhap->CssClass = "";
		$this->soluot_truynhap->ViewCustomAttributes = "";

		// trang_thai
		if (strval($this->trang_thai->CurrentValue) <> "") {
			switch ($this->trang_thai->CurrentValue) {
				case "1":
					$this->trang_thai->ViewValue = "chua kich hoat";
					break;
				case "2":
					$this->trang_thai->ViewValue = "da kich hoat";
					break;
				default:
					$this->trang_thai->ViewValue = $this->trang_thai->CurrentValue;
			}
		} else {
			$this->trang_thai->ViewValue = NULL;
		}
		$this->trang_thai->CssStyle = "";
		$this->trang_thai->CssClass = "";
		$this->trang_thai->ViewCustomAttributes = "";

		// xuatban
		if (strval($this->xuatban->CurrentValue) <> "") {
			switch ($this->xuatban->CurrentValue) {
				case "0":
					$this->xuatban->ViewValue = "dang cho";
					break;
				case "1":
					$this->xuatban->ViewValue = "xuat ban";
					break;
				default:
					$this->xuatban->ViewValue = $this->xuatban->CurrentValue;
			}
		} else {
			$this->xuatban->ViewValue = NULL;
		}
		$this->xuatban->CssStyle = "";
		$this->xuatban->CssClass = "";
		$this->xuatban->ViewCustomAttributes = "";

		// tieude_tintuc
		$this->tieude_tintuc->HrefValue = "";

		// thoigian_them
		$this->thoigian_them->HrefValue = "";

		// soluot_truynhap
		$this->soluot_truynhap->HrefValue = "";

		// trang_thai
		$this->trang_thai->HrefValue = "";

		// xuatban
		$this->xuatban->HrefValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Add User ID filter
	function AddUserIDFilter($sFilter) {
		global $Security;
		$sFilterWrk = $Security->UserIDList();
		if (!$Security->IsAdmin() && $sFilterWrk <> "") {
			$sFilterWrk = '`nguoidung_id` IN (' . $sFilterWrk . ')';
			if ($sFilter <> "")
				$sFilterWrk = "($sFilter) AND ($sFilterWrk)";
		} else {
			$sFilterWrk = $sFilter;
		}
		return $sFilterWrk;
	}

	// Get User ID subquery
	function GetUserIDSubquery(&$fld, &$masterfld) {
		global $conn;
		$sWrk = "";
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `Promotional` WHERE " . $this->AddUserIDFilter("");

		// List all values
		if ($rs = $conn->Execute($sSql)) {
			while (!$rs->EOF) {
				if ($sWrk <> "") $sWrk .= ",";
				$sWrk .= ew_QuotedValue($rs->fields[0], $masterfld->FldDataType);
				$rs->MoveNext();
			}
			$rs->Close();
		}
		if ($sWrk <> "") {
			$sWrk = $fld->FldExpression . " IN (" . $sWrk . ")";
		}
		return $sWrk;
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
