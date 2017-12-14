<?php

// PHPMaker 6 configuration for Table tbl_doncaithiendiem
$tbl_doncaithiendiem = NULL; // Initialize table object

// Define table class
class ctbl_doncaithiendiem {

	// Define table level constants
	var $TableVar;
	var $TableName;
	var $SelectLimit = FALSE;
	var $phieucaithiendiem_id;
	var $loaidon_id;
	var $nhomdon_id;
	var $msv;
	var $hoten_sinhvien;
	var $ngay_sinh;
	var $lop_sinhhoat;
	var $so_dienthoai;
	var $momthi_chinh;
        var $ma_mon;
	var $lop_tinchi;
	var $hoc_ky;
	var $nam_hoc1;
	var $nam_hoc2;
	var $diem;
	var $monthi_lan2;
	var $thoigian_h;
	var $thoigian_phut;
	var $ngay_thi;
	var $ngay_tao_don;
        var $email;
	var $note;
	var $status_email;
	var $status;
	var $active;
	var $nguoidung_id;
	var $date_time_add;
	var $date_time_edit;
        var $file_name;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var	$ExportAll = EW_EXPORT_ALL;
	var $SendEmail; // Send Email
	var $TableCustomInnerHtml; // Custom Inner Html

	function ctbl_doncaithiendiem() {
		$this->TableVar = "tbl_doncaithiendiem";
		$this->TableName = "tbl_doncaithiendiem";
		$this->SelectLimit = TRUE;
		$this->phieucaithiendiem_id = new cField('tbl_doncaithiendiem', 'x_phieucaithiendiem_id', 'phieucaithiendiem_id', "`phieucaithiendiem_id`", 3, -1, FALSE);
		$this->fields['phieucaithiendiem_id'] =& $this->phieucaithiendiem_id;
		$this->loaidon_id = new cField('tbl_doncaithiendiem', 'x_loaidon_id', 'loaidon_id', "`loaidon_id`", 3, -1, FALSE);
		$this->fields['loaidon_id'] =& $this->loaidon_id;
		$this->nhomdon_id = new cField('tbl_doncaithiendiem', 'x_nhomdon_id', 'nhomdon_id', "`nhomdon_id`", 3, -1, FALSE);
		$this->fields['nhomdon_id'] =& $this->nhomdon_id;
		$this->msv = new cField('tbl_doncaithiendiem', 'x_msv', 'msv', "`msv`", 3, -1, FALSE);
		$this->fields['msv'] =& $this->msv;
		$this->hoten_sinhvien = new cField('tbl_doncaithiendiem', 'x_hoten_sinhvien', 'hoten_sinhvien', "`hoten_sinhvien`", 200, -1, FALSE);
		$this->fields['hoten_sinhvien'] =& $this->hoten_sinhvien;
		$this->ngay_sinh = new cField('tbl_doncaithiendiem', 'x_ngay_sinh', 'ngay_sinh', "`ngay_sinh`", 135, 7, FALSE);
		$this->fields['ngay_sinh'] =& $this->ngay_sinh;
		$this->lop_sinhhoat = new cField('tbl_doncaithiendiem', 'x_lop_sinhhoat', 'lop_sinhhoat', "`lop_sinhhoat`", 200, -1, FALSE);
		$this->fields['lop_sinhhoat'] =& $this->lop_sinhhoat;
		$this->so_dienthoai = new cField('tbl_doncaithiendiem', 'x_so_dienthoai', 'so_dienthoai', "`so_dienthoai`", 200, -1, FALSE);
		$this->fields['so_dienthoai'] =& $this->so_dienthoai;
		$this->momthi_chinh = new cField('tbl_doncaithiendiem', 'x_momthi_chinh', 'momthi_chinh', "`momthi_chinh`", 201, -1, FALSE);
		$this->fields['momthi_chinh'] =& $this->momthi_chinh;
		$this->lop_tinchi = new cField('tbl_doncaithiendiem', 'x_lop_tinchi', 'lop_tinchi', "`lop_tinchi`", 200, -1, FALSE);
		$this->fields['lop_tinchi'] =& $this->lop_tinchi;
		$this->hoc_ky = new cField('tbl_doncaithiendiem', 'x_hoc_ky', 'hoc_ky', "`hoc_ky`", 200, -1, FALSE);
		$this->fields['hoc_ky'] =& $this->hoc_ky;
		$this->nam_hoc1 = new cField('tbl_doncaithiendiem', 'x_nam_hoc1', 'nam_hoc1', "`nam_hoc1`", 200, -1, FALSE);
		$this->fields['nam_hoc1'] =& $this->nam_hoc1;
		$this->nam_hoc2 = new cField('tbl_doncaithiendiem', 'x_nam_hoc2', 'nam_hoc2', "`nam_hoc2`", 200, -1, FALSE);
		$this->fields['nam_hoc2'] =& $this->nam_hoc2;
		$this->diem = new cField('tbl_doncaithiendiem', 'x_diem', 'diem', "`diem`", 200, -1, FALSE);
		$this->fields['diem'] =& $this->diem;
		$this->monthi_lan2 = new cField('tbl_doncaithiendiem', 'x_monthi_lan2', 'monthi_lan2', "`monthi_lan2`", 200, -1, FALSE);
		$this->fields['monthi_lan2'] =& $this->monthi_lan2;
		$this->thoigian_h = new cField('tbl_doncaithiendiem', 'x_thoigian_h', 'thoigian_h', "`thoigian_h`", 200, -1, FALSE);
		$this->fields['thoigian_h'] =& $this->thoigian_h;
		$this->thoigian_phut = new cField('tbl_doncaithiendiem', 'x_thoigian_phut', 'thoigian_phut', "`thoigian_phut`", 200, -1, FALSE);
		$this->fields['thoigian_phut'] =& $this->thoigian_phut;
		$this->ngay_thi = new cField('tbl_doncaithiendiem', 'x_ngay_thi', 'ngay_thi', "`ngay_thi`", 135, 7, FALSE);
		$this->fields['ngay_thi'] =& $this->ngay_thi;
		$this->ngay_tao_don = new cField('tbl_doncaithiendiem', 'x_ngay_tao_don', 'ngay_tao_don', "`ngay_tao_don`", 135, 7, FALSE);
		$this->fields['ngay_tao_don'] =& $this->ngay_tao_don;
		$this->status = new cField('tbl_doncaithiendiem', 'x_status', 'status', "`status`", 3, -1, FALSE);
		$this->fields['status'] =& $this->status;
		$this->active = new cField('tbl_doncaithiendiem', 'x_active', 'active', "`active`", 3, -1, FALSE);
		$this->fields['active'] =& $this->active;
		$this->nguoidung_id = new cField('tbl_doncaithiendiem', 'x_nguoidung_id', 'nguoidung_id', "`nguoidung_id`", 3, -1, FALSE);
		$this->fields['nguoidung_id'] =& $this->nguoidung_id;
		$this->date_time_add = new cField('tbl_doncaithiendiem', 'x_date_time_add', 'date_time_add', "`date_time_add`", 135, 7, FALSE);
		$this->fields['date_time_add'] =& $this->date_time_add;
		$this->date_time_edit = new cField('tbl_doncaithiendiem', 'x_date_time_edit', 'date_time_edit', "`date_time_edit`", 135, 7, FALSE);
		$this->fields['date_time_edit'] =& $this->date_time_edit;
                $this->note = new cField('tbl_doncaithiendiem', 'x_note', 'note', "`note`", 201, -1, FALSE);
		$this->fields['note'] =& $this->note;
                $this->ma_mon = new cField('tbl_doncaithiendiem', 'x_ma_mon', 'ma_mon', "`ma_mon`", 200, -1, FALSE);
		$this->fields['ma_mon'] =& $this->ma_mon;
                $this->email = new cField('tbl_doncaithiendiem', 'x_zemail', 'email', "`email`", 200, -1, FALSE);
		$this->fields['email'] =& $this->email;
		$this->status_email = new cField('tbl_doncaithiendiem', 'x_status_email', 'status_email', "`status_email`", 3, -1, FALSE);
		$this->fields['status_email'] =& $this->status_email;
                $this->file_name = new cField('tbl_doncaithiendiem', 'x_file_name', 'file_name', "`file_name`", 200, -1, FALSE);
		$this->fields['file_name'] =& $this->file_name;
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
		return "tbl_doncaithiendiem_Highlight";
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
		return "SELECT * FROM `tbl_doncaithiendiem`";
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
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin() && $Security->CurrentUserLevelID() == '3') { // Non system admin
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
		if ($Security->CurrentUserID() <> "" && !$Security->IsAdmin() && $Security->CurrentUserLevelID() == '3') { // Non system admin
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
		return "INSERT INTO `tbl_doncaithiendiem` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		$SQL = "UPDATE `tbl_doncaithiendiem` SET ";
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
		$SQL = "DELETE FROM `tbl_doncaithiendiem` WHERE ";
		$SQL .= EW_DB_QUOTE_START . 'phieucaithiendiem_id' . EW_DB_QUOTE_END . '=' .	ew_QuotedValue($rs['phieucaithiendiem_id'], $this->phieucaithiendiem_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter for table
	function SqlKeyFilter() {
		return "`phieucaithiendiem_id` = @phieucaithiendiem_id@";
	}

	// Return Key filter for table
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->phieucaithiendiem_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@phieucaithiendiem_id@", ew_AdjustSql($this->phieucaithiendiem_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "tbl_doncaithiendiemlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// View url
	function ViewUrl() {
		return $this->KeyUrl("tbl_doncaithiendiemview.php", $this->UrlParm());
	}

	// Add url
	function AddUrl() {
		$AddUrl = "tbl_doncaithiendiemadd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit url
	function EditUrl() {
		return $this->KeyUrl("tbl_doncaithiendiemedit.php", $this->UrlParm());
	}

	// Inline edit url
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy url
	function CopyUrl() {
		return $this->KeyUrl("tbl_doncaithiendiemadd.php", $this->UrlParm());
	}

	// Inline copy url
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete url
	function DeleteUrl() {
		return $this->KeyUrl("tbl_doncaithiendiemdelete.php", $this->UrlParm());
	}

	// Key url
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->phieucaithiendiem_id->CurrentValue)) {
			$sUrl .= "phieucaithiendiem_id=" . urlencode($this->phieucaithiendiem_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=tbl_doncaithiendiem" : "";
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
		$this->phieucaithiendiem_id->setDbValue($rs->fields('phieucaithiendiem_id'));
		$this->loaidon_id->setDbValue($rs->fields('loaidon_id'));
		$this->nhomdon_id->setDbValue($rs->fields('nhomdon_id'));
		$this->msv->setDbValue($rs->fields('msv'));
		$this->hoten_sinhvien->setDbValue($rs->fields('hoten_sinhvien'));
		$this->ngay_sinh->setDbValue($rs->fields('ngay_sinh'));
		$this->lop_sinhhoat->setDbValue($rs->fields('lop_sinhhoat'));
		$this->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$this->momthi_chinh->setDbValue($rs->fields('momthi_chinh'));
		$this->lop_tinchi->setDbValue($rs->fields('lop_tinchi'));
		$this->hoc_ky->setDbValue($rs->fields('hoc_ky'));
		$this->nam_hoc1->setDbValue($rs->fields('nam_hoc1'));
		$this->nam_hoc2->setDbValue($rs->fields('nam_hoc2'));
		$this->diem->setDbValue($rs->fields('diem'));
		$this->monthi_lan2->setDbValue($rs->fields('monthi_lan2'));
		$this->thoigian_h->setDbValue($rs->fields('thoigian_h'));
		$this->thoigian_phut->setDbValue($rs->fields('thoigian_phut'));
		$this->ngay_thi->setDbValue($rs->fields('ngay_thi'));
		$this->ngay_tao_don->setDbValue($rs->fields('ngay_tao_don'));
		$this->status->setDbValue($rs->fields('status'));
		$this->active->setDbValue($rs->fields('active'));
		$this->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$this->date_time_add->setDbValue($rs->fields('date_time_add'));
		$this->date_time_edit->setDbValue($rs->fields('date_time_edit'));
		$this->file_name->setDbValue($rs->fields('file_name'));
	}

	// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

		// phieucaithiendiem_id
		$this->phieucaithiendiem_id->ViewValue = $this->phieucaithiendiem_id->CurrentValue;
		$this->phieucaithiendiem_id->CssStyle = "";
		$this->phieucaithiendiem_id->CssClass = "";
		$this->phieucaithiendiem_id->ViewCustomAttributes = "";

		// loaidon_id
		$this->loaidon_id->ViewValue = $this->loaidon_id->CurrentValue;
		$this->loaidon_id->CssStyle = "";
		$this->loaidon_id->CssClass = "";
		$this->loaidon_id->ViewCustomAttributes = "";

		// nhomdon_id
		$this->nhomdon_id->ViewValue = $this->nhomdon_id->CurrentValue;
		$this->nhomdon_id->CssStyle = "";
		$this->nhomdon_id->CssClass = "";
		$this->nhomdon_id->ViewCustomAttributes = "";

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

		// ngay_sinh
		$this->ngay_sinh->ViewValue = $this->ngay_sinh->CurrentValue;
		$this->ngay_sinh->ViewValue = ew_FormatDateTime($this->ngay_sinh->ViewValue, 7);
		$this->ngay_sinh->CssStyle = "";
		$this->ngay_sinh->CssClass = "";
		$this->ngay_sinh->ViewCustomAttributes = "";

		// lop_sinhhoat
		$this->lop_sinhhoat->ViewValue = $this->lop_sinhhoat->CurrentValue;
		$this->lop_sinhhoat->CssStyle = "";
		$this->lop_sinhhoat->CssClass = "";
		$this->lop_sinhhoat->ViewCustomAttributes = "";

		// so_dienthoai
		$this->so_dienthoai->ViewValue = $this->so_dienthoai->CurrentValue;
		$this->so_dienthoai->CssStyle = "";
		$this->so_dienthoai->CssClass = "";
		$this->so_dienthoai->ViewCustomAttributes = "";

		// lop_tinchi
		$this->lop_tinchi->ViewValue = $this->lop_tinchi->CurrentValue;
		$this->lop_tinchi->CssStyle = "";
		$this->lop_tinchi->CssClass = "";
		$this->lop_tinchi->ViewCustomAttributes = "";

		// hoc_ky
		$this->hoc_ky->ViewValue = $this->hoc_ky->CurrentValue;
		$this->hoc_ky->CssStyle = "";
		$this->hoc_ky->CssClass = "";
		$this->hoc_ky->ViewCustomAttributes = "";

		// nam_hoc1
		if (strval($this->nam_hoc1->CurrentValue) <> "") {
			switch ($this->nam_hoc1->CurrentValue) {
				case "0":
					$this->nam_hoc1->ViewValue = "2010-2011";
					break;
				case "1":
					$this->nam_hoc1->ViewValue = "2011-2012";
					break;
				case "2":
					$this->nam_hoc1->ViewValue = "2012-2013";
					break;
				case "3":
					$this->nam_hoc1->ViewValue = "2013-2014";
					break;
				case "4":
					$this->nam_hoc1->ViewValue = "2014-2015";
					break;
				case "5":
					$this->nam_hoc1->ViewValue = "2015-2016";
					break;
				case "6":
					$this->nam_hoc1->ViewValue = "2017-2018";
					break;
				case "7":
					$this->nam_hoc1->ViewValue = "2018-2019";
					break;
				case "8":
					$this->nam_hoc1->ViewValue = "2019-2020";
					break;
				default:
					$this->nam_hoc1->ViewValue = $this->nam_hoc1->CurrentValue;
			}
		} else {
			$this->nam_hoc1->ViewValue = NULL;
		}
		$this->nam_hoc1->CssStyle = "";
		$this->nam_hoc1->CssClass = "";
		$this->nam_hoc1->ViewCustomAttributes = "";

		// nam_hoc2
		$this->nam_hoc2->ViewValue = $this->nam_hoc2->CurrentValue;
		$this->nam_hoc2->CssStyle = "";
		$this->nam_hoc2->CssClass = "";
		$this->nam_hoc2->ViewCustomAttributes = "";

		// diem
		$this->diem->ViewValue = $this->diem->CurrentValue;
		$this->diem->CssStyle = "";
		$this->diem->CssClass = "";
		$this->diem->ViewCustomAttributes = "";

		// monthi_lan2
		$this->monthi_lan2->ViewValue = $this->monthi_lan2->CurrentValue;
		$this->monthi_lan2->CssStyle = "";
		$this->monthi_lan2->CssClass = "";
		$this->monthi_lan2->ViewCustomAttributes = "";

		// thoigian_h
		$this->thoigian_h->ViewValue = $this->thoigian_h->CurrentValue;
		$this->thoigian_h->CssStyle = "";
		$this->thoigian_h->CssClass = "";
		$this->thoigian_h->ViewCustomAttributes = "";

		// thoigian_phut
		$this->thoigian_phut->ViewValue = $this->thoigian_phut->CurrentValue;
		$this->thoigian_phut->CssStyle = "";
		$this->thoigian_phut->CssClass = "";
		$this->thoigian_phut->ViewCustomAttributes = "";

		// ngay_thi
		$this->ngay_thi->ViewValue = $this->ngay_thi->CurrentValue;
		$this->ngay_thi->ViewValue = ew_FormatDateTime($this->ngay_thi->ViewValue, 7);
		$this->ngay_thi->CssStyle = "";
		$this->ngay_thi->CssClass = "";
		$this->ngay_thi->ViewCustomAttributes = "";

		// ngay_tao_don
		$this->ngay_tao_don->ViewValue = $this->ngay_tao_don->CurrentValue;
		$this->ngay_tao_don->ViewValue = ew_FormatDateTime($this->ngay_tao_don->ViewValue, 7);
		$this->ngay_tao_don->CssStyle = "";
		$this->ngay_tao_don->CssClass = "";
		$this->ngay_tao_don->ViewCustomAttributes = "";

		// status
		if (strval($this->status->CurrentValue) <> "") {
			switch ($this->status->CurrentValue) {
				case "0":
					$this->status->ViewValue = "khong xet duyet";
					break;
				case "1":
					$this->status->ViewValue = "cho xet duyet";
					break;
				case "2":
					$this->status->ViewValue = "dang xu ly";
					break;
				case "3":
					$this->status->ViewValue = "ket thuc";
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

		// active
		if (strval($this->active->CurrentValue) <> "") {
			switch ($this->active->CurrentValue) {
				case "0":
					$this->active->ViewValue = "khong kich hoat";
					break;
				case "1":
					$this->active->ViewValue = "kich hoat";
					break;
				default:
					$this->active->ViewValue = $this->active->CurrentValue;
			}
		} else {
			$this->active->ViewValue = NULL;
		}
		$this->active->CssStyle = "";
		$this->active->CssClass = "";
		$this->active->ViewCustomAttributes = "";

		// nguoidung_id
		$this->nguoidung_id->ViewValue = $this->nguoidung_id->CurrentValue;
		$this->nguoidung_id->CssStyle = "";
		$this->nguoidung_id->CssClass = "";
		$this->nguoidung_id->ViewCustomAttributes = "";

		// date_time_add
		$this->date_time_add->ViewValue = $this->date_time_add->CurrentValue;
		$this->date_time_add->ViewValue = ew_FormatDateTime($this->date_time_add->ViewValue, 7);
		$this->date_time_add->CssStyle = "";
		$this->date_time_add->CssClass = "";
		$this->date_time_add->ViewCustomAttributes = "";

		// date_time_edit
		$this->date_time_edit->ViewValue = $this->date_time_edit->CurrentValue;
		$this->date_time_edit->ViewValue = ew_FormatDateTime($this->date_time_edit->ViewValue, 7);
		$this->date_time_edit->CssStyle = "";
		$this->date_time_edit->CssClass = "";
		$this->date_time_edit->ViewCustomAttributes = "";

		// phieucaithiendiem_id
		$this->phieucaithiendiem_id->HrefValue = "";

		// loaidon_id
		$this->loaidon_id->HrefValue = "";

		// nhomdon_id
		$this->nhomdon_id->HrefValue = "";

		// msv
		$this->msv->HrefValue = "";

		// hoten_sinhvien
		$this->hoten_sinhvien->HrefValue = "";

		// ngay_sinh
		$this->ngay_sinh->HrefValue = "";

		// lop_sinhhoat
		$this->lop_sinhhoat->HrefValue = "";

		// so_dienthoai
		$this->so_dienthoai->HrefValue = "";

		// lop_tinchi
		$this->lop_tinchi->HrefValue = "";

		// hoc_ky
		$this->hoc_ky->HrefValue = "";

		// nam_hoc1
		$this->nam_hoc1->HrefValue = "";

		// nam_hoc2
		$this->nam_hoc2->HrefValue = "";

		// diem
		$this->diem->HrefValue = "";

		// monthi_lan2
		$this->monthi_lan2->HrefValue = "";

		// thoigian_h
		$this->thoigian_h->HrefValue = "";

		// thoigian_phut
		$this->thoigian_phut->HrefValue = "";

		// ngay_thi
		$this->ngay_thi->HrefValue = "";

		// ngay_tao_don
		$this->ngay_tao_don->HrefValue = "";

		// status
		$this->status->HrefValue = "";

		// active
		$this->active->HrefValue = "";

		// nguoidung_id
		$this->nguoidung_id->HrefValue = "";

		// date_time_add
		$this->date_time_add->HrefValue = "";

		// date_time_edit
		$this->date_time_edit->HrefValue = "";

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
