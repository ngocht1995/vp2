<?php

    $today = date("Y-m-d H:i:s");    
    $sSqlWrk = "Select * From `t_setting` Where (set_id=1) And (set_active=1) And (t_setting.set_date_start<='$today') And (t_setting.set_date_end>='$today')";   
    $rswrk = $conn->Execute($sSqlWrk);
    $arwrk = ($rswrk) ? $rswrk->GetRows() : array();
    if ($rswrk) $rswrk->Close();
    $rowswrk = count($arwrk);
    if ($rowswrk>0)
    {
        echo '<div style="color:#111111">'.$arwrk[0]['set_description'].'</div>';
        exit();
    }
    
?>
