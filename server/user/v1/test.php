<?php


include("../../models/wallet.php");
include("../../utils/emailLogin.php");
include("../../utils/phoneLogin.php");

// echo (Wallet::checkBalance(1));

// echo (Wallet::removeFunds(1,90));

// echo json_encode(Wallet::getAllUserWallets(1));

echo phoneLogin(666, "IamAwesome");


?>