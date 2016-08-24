<?php
/*
 This class is used to to save all the constants and common funtions of sdk.
 Created Date: 21/March/2013
 Created By: SmartdataInc.
*/
set_time_limit(0);
$filedir = dirname(__FILE__);
$filedir = substr($filedir,0,-3);

define('base_path',$filedir);

include_once(base_path.'lib/Config.php');
include_once(base_path.'lib/Curl.php');
include_once(base_path.'classes/Login.php');
include_once(base_path.'classes/SearchApI.php');
include_once(base_path.'classes/Data.php');
include_once(base_path.'classes/MetaData.php');
include_once(base_path.'lib/Cryptomanager.php');
include_once(base_path.'classes/Job.php');
include_once(base_path.'classes/Diagnostics.php');
include_once(base_path.'classes/Document.php');
include_once(base_path.'classes/Event.php');
include_once(base_path.'classes/Finance.php');
include_once(base_path.'classes/Fundraising.php');
include_once(base_path.'classes/Integration.php');
include_once(base_path.'classes/Membership.php');
include_once(base_path.'classes/Order.php');
include_once(base_path.'classes/Portal.php');
include_once(base_path.'Types/DataTransferObjects.php');
include_once(base_path.'Types/Address.php');
include_once(base_path.'Types/CommandShortcut.php');
include_once(base_path.'Types/MemberSuiteObject.php');
include_once(base_path.'Jobs/SubscriptionFulfillmentJobManifest.php');
include_once(base_path.'Jobs/SubscriptionRenewalJobManifest.php');
include_once(base_path.'Searching/Expr.php');
include_once(base_path.'Searching/Search.php');
include_once(base_path.'Searching/SearchOperationGroup.php');

?>
