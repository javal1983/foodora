<?php

/**
 * Description of runToRevertChangheScript
 * This script will for Reverting Changes on Foodora Table Done By First Script
 *
 * @author javal.patel<javalpatel@gmail.com>
 */
 
//include Class File
require("foodora.class.php");

// Creates the instance
$foodora = new foodora();

// Truncate vendor_schedule Tabel
$TruncateTable = $foodora->DeleteDataFromTable('vendor_schedule');

//Revert Data
$ImportData = $foodora->ImportDataTable('vendor_schedule');

echo 'Data Reverted Successfully';

?>