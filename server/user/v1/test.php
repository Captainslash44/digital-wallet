<?php


include("../../models/wallet.php");

echo (Wallet::checkBalance(1));

echo (Wallet::removeFunds(1,90));






?>