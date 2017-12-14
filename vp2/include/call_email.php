<?php
			$conn = ew_Connect();
			$sSqlWrk = "Select id,SMTP_SERVER,SERVER_PORT,SERVER_USERNAME,SERVER_PASSWORD,SENDER_EMAIL,RECIPIENT_EMAIL From ew_email ";
			//"SELECT `nganhnghe_id`, `nganhnghe_ten` FROM `career`";
			$sWhereWrk = "";
			if ($sWhereWrk <> "") $sSqlWrk .= " WHERE $sWhereWrk";
			$rswrk = $conn->Execute($sSqlWrk);
			$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
			if ($rswrk) $rswrk->Close();
			$rowswrk = count($arwrk);
                        if ($rowswrk>0){
                            $_SESSION['mail']['SMTP_SERVER']=$arwrk[0][1];
                            $_SESSION['mail']['SERVER_PORT']=$arwrk[0][2];
                            $_SESSION['mail']['SERVER_USERNAME']=$arwrk[0][3];
                            $_SESSION['mail']['SERVER_PASSWORD']=$arwrk[0][4];
                            $_SESSION['mail']['SENDER_EMAIL']=$arwrk[0][5];
                            $_SESSION['mail']['RECIPIENT_EMAIL']=$arwrk[0][6];
                        }
                       
?>