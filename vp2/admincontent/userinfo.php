<?php

// PHPMaker 6 configuration for Table user
$user = NULL; // Initialize table object

// Define table class
class cuser {

	// Define table level constants
	var $TableVar;
	var $TableName;
	var $SelectLimit = FALSE;
	var $nguoidung_id;
	var $nguoidung_option;
	var $tendangnhap;
	var $quocgia_id;
	var $gioi_tinh;
	var $hoten_nguoilienhe;
	var $mat_khau;
	var $ten_congty;
	var $ten_viettat;
	var $logo_congty;
	var $website;
	var $chuc_nang;
	var $loaikinhdoanh_id;
	var $loaicongty_id;
	var $so_congnhan;
	var $nam_thanhlap;
	var $kim_ngach;
	var $cung_cap;
	var $chung_chi;
	var $so_dkkd;
	var $ngay_thamgia;
	var $so_dienthoai;
	var $so_fax;
	var $dia_chi;
	var $tinh_thanh;
	var $quan_huyen;
	var $gioi_thieu;
	var $nick_yahoo;
	var $nick_skype;
	var $truycap_gannhat;
	var $kieu_giaodien;
	var $UserLevelID;
	var $nganhnghe_lienquan;
	var $thitruong_lienquan;
	var $fields = array();
	var $UseTokenInUrl = EW_USE_TOKEN_IN_URL;
	var $Export; // Export
	var $ExportOriginalValue = EW_EXPORT_ORIGINAL_VALUE;
	var	$ExportAll = EW_EXPORT_ALL;
	var $SendEmail; // Send Email
	var $TableCustomInnerHtml; // Custom Inner Html

	function cuser() {
		$this->TableVar = "user";
		$this->TableName = "user";
		$this->SelectLimit = TRUE;
		$this->nguoidung_id = new cField('user', 'x_nguoidung_id', 'nguoidung_id', "`nguoidung_id`", 19, -1, FALSE);
		$this->fields['nguoidung_id'] =& $this->nguoidung_id;
		$this->nguoidung_option = new cField('user', 'x_nguoidung_option', 'nguoidung_option', "`nguoidung_option`", 19, -1, FALSE);
		$this->fields['nguoidung_option'] =& $this->nguoidung_option;
		$this->tendangnhap = new cField('user', 'x_tendangnhap', 'tendangnhap', "`tendangnhap`", 200, -1, FALSE);
		$this->fields['tendangnhap'] =& $this->tendangnhap;
		$this->quocgia_id = new cField('user', 'x_quocgia_id', 'quocgia_id', "`quocgia_id`", 200, -1, FALSE);
		$this->fields['quocgia_id'] =& $this->quocgia_id;
		$this->gioi_tinh = new cField('user', 'x_gioi_tinh', 'gioi_tinh', "`gioi_tinh`", 19, -1, FALSE);
		$this->fields['gioi_tinh'] =& $this->gioi_tinh;
		$this->hoten_nguoilienhe = new cField('user', 'x_hoten_nguoilienhe', 'hoten_nguoilienhe', "`hoten_nguoilienhe`", 200, -1, FALSE);
		$this->fields['hoten_nguoilienhe'] =& $this->hoten_nguoilienhe;
		$this->mat_khau = new cField('user', 'x_mat_khau', 'mat_khau', "`mat_khau`", 200, -1, FALSE);
		$this->fields['mat_khau'] =& $this->mat_khau;
		$this->ten_congty = new cField('user', 'x_ten_congty', 'ten_congty', "`ten_congty`", 200, -1, FALSE);
		$this->fields['ten_congty'] =& $this->ten_congty;
		$this->ten_viettat = new cField('user', 'x_ten_viettat', 'ten_viettat', "`ten_viettat`", 200, -1, FALSE);
		$this->fields['ten_viettat'] =& $this->ten_viettat;
		$this->logo_congty = new cField('user', 'x_logo_congty', 'logo_congty', "`logo_congty`", 205, -1, TRUE);
		$this->fields['logo_congty'] =& $this->logo_congty;
		$this->website = new cField('user', 'x_website', 'website', "`website`", 200, -1, FALSE);
		$this->fields['website'] =& $this->website;
		$this->chuc_nang = new cField('user', 'x_chuc_nang', 'chuc_nang', "`chuc_nang`", 19, -1, FALSE);
		$this->fields['chuc_nang'] =& $this->chuc_nang;
		$this->loaikinhdoanh_id = new cField('user', 'x_loaikinhdoanh_id', 'loaikinhdoanh_id', "`loaikinhdoanh_id`", 19, -1, FALSE);
		$this->fields['loaikinhdoanh_id'] =& $this->loaikinhdoanh_id;
		$this->loaicongty_id = new cField('user', 'x_loaicongty_id', 'loaicongty_id', "`loaicongty_id`", 19, -1, FALSE);
		$this->fields['loaicongty_id'] =& $this->loaicongty_id;
		$this->so_congnhan = new cField('user', 'x_so_congnhan', 'so_congnhan', "`so_congnhan`", 19, -1, FALSE);
		$this->fields['so_congnhan'] =& $this->so_congnhan;
		$this->nam_thanhlap = new cField('user', 'x_nam_thanhlap', 'nam_thanhlap', "`nam_thanhlap`", 19, -1, FALSE);
		$this->fields['nam_thanhlap'] =& $this->nam_thanhlap;
		$this->kim_ngach = new cField('user', 'x_kim_ngach', 'kim_ngach', "`kim_ngach`", 19, -1, FALSE);
		$this->fields['kim_ngach'] =& $this->kim_ngach;
		$this->cung_cap = new cField('user', 'x_cung_cap', 'cung_cap', "`cung_cap`", 200, -1, FALSE);
		$this->fields['cung_cap'] =& $this->cung_cap;
		$this->chung_chi = new cField('user', 'x_chung_chi', 'chung_chi', "`chung_chi`", 200, -1, FALSE);
		$this->fields['chung_chi'] =& $this->chung_chi;
		$this->so_dkkd = new cField('user', 'x_so_dkkd', 'so_dkkd', "`so_dkkd`", 200, -1, FALSE);
		$this->fields['so_dkkd'] =& $this->so_dkkd;
		$this->ngay_thamgia = new cField('user', 'x_ngay_thamgia', 'ngay_thamgia', "`ngay_thamgia`", 135, 7, FALSE);
		$this->fields['ngay_thamgia'] =& $this->ngay_thamgia;
		$this->so_dienthoai = new cField('user', 'x_so_dienthoai', 'so_dienthoai', "`so_dienthoai`", 200, -1, FALSE);
		$this->fields['so_dienthoai'] =& $this->so_dienthoai;
		$this->so_fax = new cField('user', 'x_so_fax', 'so_fax', "`so_fax`", 200, -1, FALSE);
		$this->fields['so_fax'] =& $this->so_fax;
		$this->dia_chi = new cField('user', 'x_dia_chi', 'dia_chi', "`dia_chi`", 200, -1, FALSE);
		$this->fields['dia_chi'] =& $this->dia_chi;
		$this->tinh_thanh = new cField('user', 'x_tinh_thanh', 'tinh_thanh', "`tinh_thanh`", 200, -1, FALSE);
		$this->fields['tinh_thanh'] =& $this->tinh_thanh;
		$this->quan_huyen = new cField('user', 'x_quan_huyen', 'quan_huyen', "`quan_huyen`", 200, -1, FALSE);
		$this->fields['quan_huyen'] =& $this->quan_huyen;
		$this->gioi_thieu = new cField('user', 'x_gioi_thieu', 'gioi_thieu', "`gioi_thieu`", 201, -1, FALSE);
		$this->fields['gioi_thieu'] =& $this->gioi_thieu;
		$this->nick_yahoo = new cField('user', 'x_nick_yahoo', 'nick_yahoo', "`nick_yahoo`", 200, -1, FALSE);
		$this->fields['nick_yahoo'] =& $this->nick_yahoo;
		$this->nick_skype = new cField('user', 'x_nick_skype', 'nick_skype', "`nick_skype`", 200, -1, FALSE);
		$this->fields['nick_skype'] =& $this->nick_skype;
		$this->truycap_gannhat = new cField('user', 'x_truycap_gannhat', 'truycap_gannhat', "`truycap_gannhat`", 135, 7, FALSE);
		$this->fields['truycap_gannhat'] =& $this->truycap_gannhat;
		$this->kieu_giaodien = new cField('user', 'x_kieu_giaodien', 'kieu_giaodien', "`kieu_giaodien`", 19, -1, FALSE);
		$this->fields['kieu_giaodien'] =& $this->kieu_giaodien;
		$this->UserLevelID = new cField('user', 'x_UserLevelID', 'UserLevelID', "`UserLevelID`", 3, -1, FALSE);
		$this->fields['UserLevelID'] =& $this->UserLevelID;
		$this->nganhnghe_lienquan = new cField('user', 'x_nganhnghe_lienquan', 'nganhnghe_lienquan', "`nganhnghe_lienquan`", 200, -1, FALSE);
		$this->fields['nganhnghe_lienquan'] =& $this->nganhnghe_lienquan;
		$this->thitruong_lienquan = new cField('user', 'x_thitruong_lienquan', 'thitruong_lienquan', "`thitruong_lienquan`", 200, -1, FALSE);
		$this->fields['thitruong_lienquan'] =& $this->thitruong_lienquan;
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
		return "user_Highlight";
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
		return "SELECT * FROM `user`";
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
		$sFilter = "`nguoidung_id` IN ($Security->CurrentUserID)";
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
			if (EW_MD5_PASSWORD && $name == 'mat_khau') {
				$value = (EW_CASE_SENSITIVE_PASSWORD) ? md5($value) : md5(strtolower($value));
			}
			$names .= $this->fields[$name]->FldExpression . ",";
			$values .= (is_null($value) ? "NULL" : ew_QuotedValue($value, $this->fields[$name]->FldDataType)) . ",";
		}
		if (substr($names, -1) == ",") $names = substr($names, 0, strlen($names)-1);
		if (substr($values, -1) == ",") $values = substr($values, 0, strlen($values)-1);
		return "INSERT INTO `user` ($names) VALUES ($values)";
	}

	// UPDATE statement
	function UpdateSQL(&$rs) {
		$SQL = "UPDATE `user` SET ";
		foreach ($rs as $name => $value) {
			if (EW_MD5_PASSWORD && $name == 'mat_khau') {
				$value = (EW_CASE_SENSITIVE_PASSWORD) ? md5($value) : md5(strtolower($value));
			}
			$SQL .= $this->fields[$name]->FldExpression . "=" .
					(is_null($value) ? "NULL" : ew_QuotedValue($value, $this->fields[$name]->FldDataType)) . ",";
		}
		if (substr($SQL, -1) == ",") $SQL = substr($SQL, 0, strlen($SQL)-1);
		if ($this->CurrentFilter <> "")	$SQL .= " WHERE " . $this->CurrentFilter;
		return $SQL;
	}

	// DELETE statement
	function DeleteSQL(&$rs) {
		$SQL = "DELETE FROM `user` WHERE ";
		$SQL .= EW_DB_QUOTE_START . 'nguoidung_id' . EW_DB_QUOTE_END . '=' .	ew_QuotedValue($rs['nguoidung_id'], $this->nguoidung_id->FldDataType) . ' AND ';
		if (substr($SQL, -5) == " AND ") $SQL = substr($SQL, 0, strlen($SQL)-5);
		if ($this->CurrentFilter <> "")	$SQL .= " AND " . $this->CurrentFilter;
		return $SQL;
	}

	// Key filter for table
	function SqlKeyFilter() {
		return "`nguoidung_id` = @nguoidung_id@";
	}

	// Return Key filter for table
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->nguoidung_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@nguoidung_id@", ew_AdjustSql($this->nguoidung_id->CurrentValue), $sKeyFilter); // Replace key value
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
			return "userlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// View url
	function ViewUrl() {
		return $this->KeyUrl("userview.php", $this->UrlParm());
	}

	// Add url
	function AddUrl() {
		$AddUrl = "useradd.php";
		$sUrlParm = $this->UrlParm();
		if ($sUrlParm <> "")
			$AddUrl .= "?" . $sUrlParm;
		return $AddUrl;
	}

	// Edit url
	function EditUrl() {
		return $this->KeyUrl("useredit.php", $this->UrlParm());
	}

	// Inline edit url
	function InlineEditUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
	}

	// Copy url
	function CopyUrl() {
		return $this->KeyUrl("useradd.php", $this->UrlParm());
	}

	// Inline copy url
	function InlineCopyUrl() {
		return $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
	}

	// Delete url
	function DeleteUrl() {
		return $this->KeyUrl("userdelete.php", $this->UrlParm());
	}

	// Key url
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->nguoidung_id->CurrentValue)) {
			$sUrl .= "nguoidung_id=" . urlencode($this->nguoidung_id->CurrentValue);
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
		$UrlParm = ($this->UseTokenInUrl) ? "t=user" : "";
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
		$this->nguoidung_id->setDbValue($rs->fields('nguoidung_id'));
		$this->nguoidung_option->setDbValue($rs->fields('nguoidung_option'));
		$this->tendangnhap->setDbValue($rs->fields('tendangnhap'));
		$this->quocgia_id->setDbValue($rs->fields('quocgia_id'));
		$this->gioi_tinh->setDbValue($rs->fields('gioi_tinh'));
		$this->hoten_nguoilienhe->setDbValue($rs->fields('hoten_nguoilienhe'));
	        $this->mat_khau->setDbValue($rs->fields('mat_khau'));
		$this->ten_congty->setDbValue($rs->fields('ten_congty'));
		$this->ten_viettat->setDbValue($rs->fields('ten_viettat'));
		$this->logo_congty->Upload->DbValue = $rs->fields('logo_congty');
		$this->website->setDbValue($rs->fields('website'));
		$this->chuc_nang->setDbValue($rs->fields('chuc_nang'));
		$this->loaikinhdoanh_id->setDbValue($rs->fields('loaikinhdoanh_id'));
		$this->loaicongty_id->setDbValue($rs->fields('loaicongty_id'));
		$this->so_congnhan->setDbValue($rs->fields('so_congnhan'));
		$this->nam_thanhlap->setDbValue($rs->fields('nam_thanhlap'));
		$this->kim_ngach->setDbValue($rs->fields('kim_ngach'));
		$this->cung_cap->setDbValue($rs->fields('cung_cap'));
		$this->chung_chi->setDbValue($rs->fields('chung_chi'));
		$this->so_dkkd->setDbValue($rs->fields('so_dkkd'));
		$this->ngay_thamgia->setDbValue($rs->fields('ngay_thamgia'));
		$this->so_dienthoai->setDbValue($rs->fields('so_dienthoai'));
		$this->so_fax->setDbValue($rs->fields('so_fax'));
		$this->dia_chi->setDbValue($rs->fields('dia_chi'));
		$this->tinh_thanh->setDbValue($rs->fields('tinh_thanh'));
		$this->quan_huyen->setDbValue($rs->fields('quan_huyen'));
		$this->gioi_thieu->setDbValue($rs->fields('gioi_thieu'));
		$this->nick_yahoo->setDbValue($rs->fields('nick_yahoo'));
		$this->nick_skype->setDbValue($rs->fields('nick_skype'));
		$this->truycap_gannhat->setDbValue($rs->fields('truycap_gannhat'));
		$this->kieu_giaodien->setDbValue($rs->fields('kieu_giaodien'));
		$this->UserLevelID->setDbValue($rs->fields('UserLevelID'));
		$this->nganhnghe_lienquan->setDbValue($rs->fields('nganhnghe_lienquan'));
		$this->thitruong_lienquan->setDbValue($rs->fields('thitruong_lienquan'));
	}
	//Tạo link kiểu giao diện
	function Getlink_kieu_giaodien() {
		$kieu_giaodienlink = "";
	if (strval($this->kieu_giaodien->CurrentValue) <> "") {
			switch ($this->kieu_giaodien->CurrentValue) {
				case "1":
					$kieu_giaodienlink .= "../shop/index.htm";
					break;
				case "2":
					$kieu_giaodienlink .= "../shop/index1.htm";
					break;
				case "3":
					$kieu_giaodienlink .= "../shop/index2.htm";
					break;
                                case "4":
					$kieu_giaodienlink .= "../shop/index3.htm";
					break;
                                case "5":
					$kieu_giaodienlink .= "../shop/index4.htm";
					break;
                                case "6":
					$kieu_giaodienlink .= "../shop/index5.htm";
					break;
				case "7":
					$kieu_giaodienlink .= $this->website->CurrentValue;
					break;
				default:
					$this->kieu_giaodien->ViewValue = $this->kieu_giaodien->CurrentValue;
			}
		} else {
			$this->kieu_giaodien->ViewValue = NULL;
		}
		return $kieu_giaodienlink;
	}
        //Taoj link ảnh giao diện
      function getimage_kieu_giaodien() {
		$kieu_giaodienimage = "";
            if (strval($this->kieu_giaodien->CurrentValue) <> "") {
			switch ($this->kieu_giaodien->CurrentValue) {
				case "1":
					$kieu_giaodienimage .= "../images/shop1.png";
					break;
				case "2":
					$kieu_giaodienimage .= "../images/shop2.png";
					break;
				case "3":
					$kieu_giaodienimage .= "../images/shop3.png";
					break;
                                case "4":
					$kieu_giaodienimage .= "../images/shop4.png";
					break;
                                case "5":
					$kieu_giaodienimage .= "../images/shop5.png";
					break;
                                case "6":
					$kieu_giaodienimage .= "../images/shop6.png";
					break;
				case "7":
					$kieu_giaodienimage .= $this->website->CurrentValue;
					break;
				default:
					$this->kieu_giaodien->ViewValue = $this->kieu_giaodien->CurrentValue;
			}
		} else {
			$this->kieu_giaodien->ViewValue = NULL;
		}
		return $kieu_giaodienimage;
      }

// Render list row values
	function RenderListRow() {
		global $conn, $Security;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// User id filter
	function UserIDFilter($userid) {
		$sUserIDFilter = '`nguoidung_id` = ' . ew_QuotedValue($userid, EW_DATATYPE_NUMBER);
		$sParentUserIDFilter = '`nguoidung_id` IN (SELECT `nguoidung_id` FROM ' . "`user`" . ' WHERE `UserLevelID` = ' . ew_QuotedValue($userid, EW_DATATYPE_NUMBER) . ')';
		$sUserIDFilter = "($sUserIDFilter) OR ($sParentUserIDFilter)";
		return $sUserIDFilter;
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

	// Add Parent User ID filter
	function AddParentUserIDFilter($sFilter, $userid) {
		global $Security;
		$result = $Security->ParentUserIDList($userid);
		if (!$Security->IsAdmin() && $result <> "") {
			$result = '`nguoidung_id` IN (' . $result . ')';
			if ($sFilter <> "")
				$result = "($sFilter) AND ($result)";
		} else {
			$result = $sFilter;
		}
		return $result;
	}

	// Get User ID subquery
	function GetUserIDSubquery(&$fld, &$masterfld) {
		global $conn;
		$sWrk = "";
		$sSql = "SELECT " . $masterfld->FldExpression . " FROM `user` WHERE " . $this->AddUserIDFilter("");

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
