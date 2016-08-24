<?php
/*
Membersuite Object Types 

*/

class msDomainObject
{
  var $CLASS_NAME = 'DomainObject';

  public function __construct($data){
    if(is_object($data)){
      $data = $this->create_dictionary($data);
    }
    $this->load_data($data);
  }
  
  protected function load_data($data){
  }
  
  protected function create_dictionary($data){
    $resdata = $this->object_to_array($data->bFields->bKeyValueOfstringanyType);
    $data = array();
    foreach($resdata as $result){
      $data[$result['bKey']]=$result['bValue'];
    }
    return $data;
  }
  
  protected function object_to_array($data) 
  {
    if ((!is_array($data)) and (!is_object($data))) return $data;
    
    $result = array();
    $data = (array) $data;
    foreach ($data as $key => $value) {
      if (is_object($value)) $value = (array) $value;
      if (is_array($value)) 
      $result[$key] = $this->object_to_array($value);
      else
          $result[$key] = $value;
    }
    return $result;
  }
}

class msAggregate extends msDomainObject
{
  var $CLASS_NAME = 'Aggregate';
  var $ClassType = 'Aggregate';
  
  //Fields
  var $ID;
  var $Name;
  var $Keywords;
  var $LastModifiedBy;
  var $LastModifiedDate;
  var $CreatedDate;
  var $CreatedBy;
  var $LockedForDeletion;
  var $IsConfiguration;
  var $IsSealed;
  var $SystemTimestamp;
  
  protected function load_data($data){
    if(isset($data['ID'])){
      $this->ID = $data['ID'];
    }
    if(isset($data['Name'])){
      $this->Name=$data['Name'];
    }
    if(isset($data['LastModifiedBy'])){
      $this->LastModifiedBy=$data['LastModifiedBy'];
    }
    if(isset($data['LastModifiedDate'])){
      $this->LastModifiedDate=$data['LastModifiedDate'];
    }
    if(isset($data['CreatedDate'])){
      $this->CreatedDate=$data['CreatedDate'];
    }
    if(isset($data['CreatedBy'])){
      $this->CreatedBy=$data['CreatedBy'];
    }
    if(isset($data['IsConfiguration'])){
      $this->IsConfiguration=$data['IsConfiguration'];
    }
    if(isset($data['SystemTimestamp'])){
      $this->SystemTimestamp=$data['SystemTimestamp'];
    }
  }
}

class msEntity extends msAggregate
{
  var $CLASS_NAME = 'Entity';
  var $ClassType = 'Entity';
  
  protected function load_data($data){
    parent::load_data($data);
    
    if(isset($data['Owner'])){
      $this->Owner=$data['Owner'];
    }
    if(isset($data['EmailAddress'])){
      $this->EmailAddress=$data['EmailAddress'];
    }
    if(isset($data['Addresses'])){
      $this->Addresses=$data['Addresses'];
    }
    if(isset($data['TaxExempt'])){
      $this->TaxExempt=$data['TaxExempt'];
    }
    if(isset($data['DefaultCreditTerms'])){
      $this->DefaultCreditTerms=$data['DefaultCreditTerms'];
    }
    if(isset($data['PhoneNumbers'])){
      $this->PhoneNumbers=$data['PhoneNumbers'];
    }
    if(isset($data['PreferredAddressType'])){
      $this->PreferredAddressType=$data['PreferredAddressType'];
    }
    if(isset($data['PreferredPhoneNumberType'])){
      $this->PreferredPhoneNumberType=$data['PreferredPhoneNumberType'];
    }
    if(isset($data['DonorLevel'])){
      $this->DonorLevel=$data['DonorLevel'];
    }
    if(isset($data['SourceCode'])){
      $this->SourceCode=$data['SourceCode'];
    }
    if(isset($data['MediaCode'])){
      $this->MediaCode=$data['MediaCode'];
    }
    if(isset($data['WebSite'])){
      $this->WebSite=$data['WebSite'];
    }
    if(isset($data['Notes'])){
      $this->Notes=$data['Notes'];
    }
    if(isset($data['Image'])){
      $this->Image=$data['Image'];
    }
    if(isset($data['LocalID'])){
      $this->LocalID=$data['LocalID'];
    }
    if(isset($data['LegislativeDistricts'])){
      $this->LegislativeDistricts=$data['LegislativeDistricts'];
    }
  }
  
  var $Owner;
  var $SortName;
  var $EmailAddress;
  var $Addresses;
  var $TaxExempt;
  var $DefaultCreditTerms;
  var $PhoneNumbers;
  var $PreferredAddressType;
  var $PreferredPhoneNumberType;
  var $DonorLevel;
  var $SourceCode;
  var $MediaCode;
  var $WebSite;
  var $Notes;
  var $Image;
  var $LocalID;
  var $LegislativeDistricts;
}

class msIndividual extends msEntity
{
  var $ClassType="Individual";
  
  var $FirstName;
  var $MiddleName;
  var $LastName;
  var $Nickname;
  var $LocalID;
  var $Name;
  var $DoNotEmail;
  var $OptOuts;
  var $DoNotFax;
  var $DoNotMail;
  var $Age;
  var $Type;
  var $DateOfBirth;
  var $EmailAddress2;
  var $EmailAddress3;
  var $Title;
  var $Prefix;
  var $Suffix;
  var $Designation;
  var $Company;
  var $SeasonalAddressStart;
  var $SeasonalAddressEnd;
  
  protected function load_data($data){
    parent::load_data($data);
    
    if($data['FirstName']){
      $this->FirstName=$data['FirstName'];
    }  
    if($data['MiddleName']){
      $this->MiddleName=$data['MiddleName'];
    }
    if($data['LastName']){
      $this->LastName=$data['LastName'];
    }
    if($data['Nickname']){
      $this->Nickname=$data['Nickname'];
    }
    if($data['DoNotEmail']){
      $this->DoNotEmail=$data['DoNotEmail'];
    }
    if($data['OptOuts']){
      $this->OptOuts=$data['OptOuts'];
    }
    if($data['DoNotFax']){
      $this->DoNotFax=$data['DoNotFax'];
    }
    if($data['DoNotMail']){
      $this->DoNotMail=$data['DoNotMail'];
    }
    if($data['Age']){
      $this->Age=$data['Age'];
    }
    if($data['Type']){
      $this->Type=$data['Type'];
    }
    if($data['DateOfBirth']){
      $this->DateOfBirth=$data['DateOfBirth'];
    }
    if($data['EmailAddress2']) {
      $this->EmailAddress2=$data['EmailAddress2'];
    }
    if($data['EmailAddress3']){
      $this->EmailAddress3=$data['EmailAddress3'];
    }
    if($data['Title']){
      $this->Title=$data['Title'];
    }
    if($data['Prefix']){
      $this->Prefix=$data['Prefix'];
    }
    if($data['Suffix']){
      $this->Suffix=$data['Suffix'];
    }
    if($data['Designation']){
      $this->Designation=$data['Designation'];
    }
    if($data['Company']){
      $this->Company=$data['Company'];
    }
    if($data['SeasonalAddressStart']){
      $this->SeasonalAddressStart=$data['SeasonalAddressStart'];
    }  
    if($data['SeasonalAddressEnd']){
      $this->SeasonalAddressEnd=$data['SeasonalAddressEnd'];
    }
  }
}

class msUser extends msAggregate
{
 var $ClassType="CustomerUser"; 
 var $FirstName = "FirstName";
 var $LastName = "LastName";
 var $Name = "Name";
 var $EmailAddress = "EmailAddress";
 var $PasswordHash = "PasswordHash";
 var $Department = "Department";
 var $IsSuspended = "IsSuspended";
 var $IsSuperUser = "IsSuperUser";
 var $TimeZone = "TimeZone";
 var $PhoneNumber = "PhoneNumber";
 var $Notes = "Notes";
 var $SecurityQuestion = "SecurityQuestion";
 var $SecurityAnswer = "SecurityAnswer";
 var $MustChangePassword = "MustChangePassword";
 
 function __construct($datauser="")
 {
  if($datauser)
  {
  $dataarray = $this->ConvertToArray($datauser->bFields->bKeyValueOfstringanyType);
  
   $data = array();
   foreach($dataarray as $result)
   {
    
    $data[$result['bKey']]=$result['bValue'];
    
   }
  }
  else
  $data = "";
  if(isset($data['FirstName']))
  {
   $this->FirstName =$data['FirstName'];
  }
  
  if(isset($data['LastName']))
  {
   $this->LastName =$data['LastName'];
  }
  if(isset($data['EmailAddress']))
  {
   $this->EmailAddress =$data['EmailAddress'];
  }
  if(isset($data['PasswordHash']))
  {
   $this->PasswordHash =$data['PasswordHash'];
  }
  if(isset($data['Department']))
  {
   $this->Department =$data['Department'];
  }
  if(isset($data['IsSuspended']))
  {
   $this->IsSuspended =$data['IsSuspended'];
  }
  if(isset($data['IsSuperUser']))
  {
   $this->IsSuperUser =$data['IsSuperUser'];
  }
  if(isset($data['TimeZone']))
  {
   $this->TimeZone =$data['TimeZone'];
  }
  
  if(isset($data['PhoneNumber']))
  {
   $this->PhoneNumber =$data['PhoneNumber'];
  }
  if(isset($data['Notes']))
  {
   $this->Notes =$data['Notes'];
  }
  if(isset($data['SecurityQuestion']))
  {
   $this->SecurityQuestion =$data['SecurityQuestion'];
  }
  if(isset($data['SecurityAnswer']))
  {
   $this->SecurityAnswer =$data['SecurityAnswer'];
  }
  if(isset($data['MustChangePassword']))
  {
   $this->MustChangePassword =$data['MustChangePassword'];
  }
  if(isset($data['ID']))
  {
   $this->ID =$data['ID'];
  }
  if(isset($data['SystemTimestamp']))
  {
   $this->SystemTimestamp = $data['SystemTimestamp'];
  }
  if(isset($data['Name']))
  {
   $this->Name = $data['Name'];
  }
  
 }
 
 public function ConvertToArray($data) 
    {
     if ((! is_array($data)) and (! is_object($data))) return 'xxx'; //$data;
     
       $result = array();
       
       $data = (array) $data;
       foreach ($data as $key => $value) {
       if (is_object($value)) $value = (array) $value;
       if (is_array($value)) 
       $result[$key] = $this->ConvertToArray($value);
       else
           $result[$key] = $value;
       }
     
     return $result;
    }
  
 }
 
 class GetSafeValue extends msIndividual
 {
  var $ID;
  var $Name;
  
  function __construct($datauser)
  {
  
  $dataarray = $this->object_to_array($datauser->bFields->bKeyValueOfstringanyType);
  
  $data = array();
   foreach($dataarray as $result)
   {
    
    $data[$result['bKey']]=$result['bValue'];
    
   }
  
  if($data['FirstName'])
  {
   $this->FirstName =$data['FirstName'];
  }
  
  if($data['MiddleName'])
  {
   $this->MiddleName =$data['MiddleName'];
  }
  if($data['LastName'])
  {
   $this->LastName =$data['LastName'];
  }
  if($data['Nickname'])
  {
   $this->Nickname =$data['Nickname'];
  }
  if($data['DoNotEmail'])
  {
   $this->DoNotEmail =$data['DoNotEmail'];
  }
  if($data['OptOuts'])
  {
   $this->OptOuts =$data['OptOuts'];
  }
  if($data['DoNotFax'])
  {
   $this->DoNotFax =$data['DoNotFax'];
  }
  if($data['DoNotMail'])
  {
   $this->DoNotMail =$data['DoNotMail'];
  }
  if($data['Age'])
  {
   $this->Age =$data['Age'];
  }
  if($data['Type'])
  {
   $this->Type =$data['Type'];
  }
  if($data['DateOfBirth'])
  {
   $this->DateOfBirth =$data['DateOfBirth'];
  }
  if($data['EmailAddress2'])
  {
   $this->EmailAddress2 =$data['EmailAddress2'];
  }
  if($data['EmailAddress3'])
  {
   $this->EmailAddress3 =$data['EmailAddress3'];
  }
  if($data['Title'])
  {
   $this->Title =$data['Title'];
  }
  if($data['Prefix'])
  {
   $this->Prefix =$data['Prefix'];
  }
  if($data['Suffix'])
  {
   $this->Suffix =$data['Suffix'];
  }
  if($data['Designation'])
  {
   $this->Designation =$data['Designation'];
  }
  if($data['Company'])
  {
   $this->Company =$data['Company'];
  }
  if($data['SeasonalAddressStart'])
  {
   $this->SeasonalAddressStart =$data['SeasonalAddressStart'];
  }
  
  if($data['SeasonalAddressEnd'])
  {
   $this->SeasonalAddressEnd =$data['SeasonalAddressEnd'];
  }
  
  if(isset($data['LocalID']))
  {
   $this->LocalID =$data['LocalID'];
  }
  
  if(isset($data['Name']))
  {
   $this->Name =$data['Name'];
  }
  
  if(isset($data['ID']))
  {
   $this->ID =$data['ID'];
  }
   
  }
 }
 
 class msEntitlement extends msAggregate
 {
  
  var $CLASS_NAME='Entitlement';
  var $ClassType = 'Entitlement';
  var $Owner = "Owner";
  var $Quantity = "Quantity";
  var $QuantityAvailable = "QuantityAvailable";
  var $AvailableFrom = "AvailableFrom";
  var $AvailableUntil = "AvailableUntil";
  var $Comments = "Comments";
  var $Order = "Order";
  var $OrderLineItemID = "OrderLineItemID";
  var $SecurityLock = "SecurityLock";
  
 }
 
 class msCustomEntitlement extends msEntitlement
 {
  var $CLASS_NAME = 'CustomEntitlement';
  var $ClassType = 'CustomEntitlement';
  var $CustomType = 'CustomType';
 }
 
 class msAuditLog extends msAggregate
 {
  
  var $CLASS_NAME = "AuditLog";
  var $ClassType = "AuditLog";
  var $Type = "Type";
  var $AffectedFields = "AffectedFields";
  var $Actor = "Actor";
  var $AffectedRecord_Type = "AffectedRecord_Type";
  var $AffectedRecord_ID = "AffectedRecord_ID";
  var $AffectedRecord_Name = "AffectedRecord_Name";
  var $Description = "Description";
  var $ServiceName = "ServiceName";
  var $SecurityLock = "SecurityLock";
  
 }
 
 class msEventBase extends msAggregate
 {
  var $CLASS_NAME = "EventBase";
  var $ClassType = "EventBase";
  var $BusinessUnit = "BusinessUnit";
  var $ConfirmationEmail = "ConfirmationEmail";
  var $CertificationComponent = "CertificationComponent";
  var $Description = "Description";
  var $ShortSummary = "ShortSummary";
  var $StartDate = "StartDate";
  var $EndDate = "EndDate";
  var $RegistrationMode = "RegistrationMode";
  var $PreRegistrationCutOffDate = "PreRegistrationCutOffDate";
  var $EarlyRegistrationCutOffDate = "EarlyRegistrationCutOffDate";
  var $RegularRegistrationCutOffDate = "RegularRegistrationCutOffDate";
  var $LateRegistrationCutOffDate = "LateRegistrationCutOffDate";
  var $PostToWeb = "PostToWeb";
  var $RemoveFromWeb = "RemoveFromWeb";
  var $Agenda = "Agenda";
  var $Minutes = "Minutes";
  var $FeaturedPriority = "FeaturedPriority";
  var $FeaturedFrom = "FeaturedFrom";
  var $FeaturedUntil = "FeaturedUntil";
  var $VisibleInPortal = "VisibleInPortal";
  var $TimeZone = "TimeZone";
  var $ParentEvent = "ParentEvent";
  var $MustBeRegisteredForParent = "MustBeRegisteredForParent";
  var $Capacity = "Capacity";
  var $RegistrationGoal = "RegistrationGoal";
  var $RevenueGoal = "RevenueGoal";
  var $ProjectedAttendance = "ProjectedAttendance";
  var $GuaranteedAttendance = "GuaranteedAttendance";
  var $AllowWaitList = "AllowWaitList";
  var $RequiresApproval = "RequiresApproval";
  var $Url = "Url";
  var $RegistrationOpenDate = "RegistrationOpenDate";
  var $RegistrationCloseDate = "RegistrationCloseDate";
  var $Courses = "Courses";
  var $Speakers = "Speakers";
  var $RegistrationUrl = "RegistrationUrl";
  var $LocalID = "LocalID"; 
 }
 
 class msEvent extends msEventBase
 {
  var $CLASS_NAME = 'Event';
  var $ClassType = 'Event';
  var $Code = "Code";
  var $Type = "Type";
  var $Category = "Category";
  var $EnableAbstracts = "EnableAbstracts";
  var $AllowEditAbstracts = "AllowEditAbstracts";
  var $AcceptAbstractsFrom = "AcceptAbstractsFrom";
  var $AcceptAbstractsUntil = "AcceptAbstractsUntil";
  var $Location = "Location";
  var $Chapter = "Chapter";
  var $OrganizationalLayer = "OrganizationalLayer";
  var $Section = "Section";
  var $MerchantAccount = "MerchantAccount";
  var $EnableGroupRegistrations = "EnableGroupRegistrations";
  var $IncludeInEntitySearch = "IncludeInEntitySearch";
  var $InviteOnly = "InviteOnly";
  var $AllowGroupRegistrationsFrom = "AllowGroupRegistrationsFrom";
  var $AllowGroupRegistrationsUntil = "AllowGroupRegistrationsUntil";
  var $WorkshopSubmissionInstructions = "WorkshopSubmissionInstructions";
  var $WorkshopConfirmationInstructions = "WorkshopConfirmationInstructions";
  var $RegistrationTypeSelectionInstructions = "RegistrationTypeSelectionInstructions";
  var $SessionSelectionInstructions = "SessionSelectionInstructions";
  var $PreceedingEvent = "PreceedingEvent";
  var $NextEvent = "NextEvent";
  var $RegistrationFeeInstructions = "RegistrationFeeInstructions";
  var $RegistrationFormInstructions = "RegistrationFormInstructions";
  var $AcknowledgementText = "AcknowledgementText";
  var $GroupRegistrationRelationshipTypes = "GroupRegistrationRelationshipTypes";
  var $DisplayStartEndDateTimesAs = "DisplayStartEndDateTimesAs";
  var $IsClosed = "IsClosed";
  
 }
 
 class msFiscalYear extends msAggregate
 {
  var $CLASS_NAME = 'FiscalYear';
  var $ClassType = 'FiscalYear';
  var $IsConfiguration = "IsConfiguration";
  var $Year = "Year";
  var $BusinessUnit = "BusinessUnit";
  var $IsClosed = "IsClosed";
  var $ClosedBy = "ClosedBy";
  var $StartDate = "StartDate";
  var $EndDate = "EndDate";
  var $Periods = "Periods";
  var $SecurityLock = "SecurityLock";
 }
 
 
 class msBatch extends msAggregate
 {
  
  var $CLASS_NAME = "Batch";
  var $ClassType = "Batch";
  var $IsDefault = "IsDefault";
  var $Description = "Description";
  var $DatePosted = "DatePosted";
  var $DateClosed = "DateClosed";
  var $DateExported = "DateExported";
  var $ClosedBy = "ClosedBy";
  var $PostedBy = "PostedBy";
  var $FiscalYear = "FiscalYear";
  var $FiscalPeriod = "FiscalPeriod";
  var $Type = "Type";
  var $BusinessUnit = "BusinessUnit";
  var $Status = "Status";
  var $DateVerified = "DateVerified";
  var $Date = "Date";
  var $ControlTotal = "ControlTotal";
  var $ControlCount = "ControlCount";
  var $RestrictAccess = "RestrictAccess";
  var $SecurityRoles = "SecurityRoles";
  var $UserGroups = "UserGroups";
  var $LocalID = 'LocalID';
  var $SecurityLock = 'SecurityLock';
  
 }
 
 class msBatchMember extends msAggregate
 {
  var $CLASS_NAME = "BatchMember";
  var $ClassType = "BatchMember";
  var $Date = "Date";
  var $Memo = "Memo";
  var $Batch = "Batch";
  var $IsVoid = "IsVoid";
  var $SourceCode = "SourceCode";
  var $MediaCode = "MediaCode";
  var $LocalID = "LocalID";
 }
 
 class msCredit extends msBatchMember
 {
  var $CLASS_NAME = "Credit";
  var $ClassType = "Credit";
  var $BillTo = "BillTo";
  var $InvoiceAdjustment = "InvoiceAdjustment";
  var $Invoice = "Invoice";
  var $BusinessUnit = "BusinessUnit";
  var $ExpenseAccount = "ExpenseAccount";
  var $LiabilityAccount = "LiabilityAccount";
  var $UseFrom = "UseFrom";
  var $UseThrough = "UseThrough";
  var $Notes = "Notes";
  var $Total = "Total";
  var $AmountUsed = "AmountUsed";
 }
 
 class msInvoice extends msBatchMember
 {
  var $CLASS_NAME = "Invoice";
  var $ClassType = "Invoice";
  var $BusinessUnit = "BusinessUnit";
  var $AccountsReceivableGLCode = "AccountsReceivableGLCode";
  var $DueDate = "DueDate";
  var $BillTo = "BillTo";
  var $BillingAddress = "BillingAddress";
  var $Order = "Order";
  var $BillingEmailAddress = "BillingEmailAddress";
  var $Terms = "Terms";
  var $PurchaseOrderNumber = "PurchaseOrderNumber";
  var $CustomerMessage = "CustomerMessage";
  var $Total = "Total";
  var $BalanceDue = "BalanceDue";
  var $ToBePrinted = "ToBePrinted";
  var $ToBeEmailed = "ToBeEmailed";
  var $Type = "Type";
  var $Notes = "Notes";
  var $ProForma = "ProForma";
  var $InsertionOrder = "InsertionOrder";
  var $LineItems = "LineItems";
  
 }
 
 class msWriteOff extends msBatchMember
 {
  var $CLASS_NAME = "WriteOff";
  var $ClassType = "WriteOff";
  var $BusinessUnit = "BusinessUnit";
  var $Total = "Total";
  var $Invoice = "Invoice";
  var $Customer = "Customer";
  var $AccountsReceivableGLCode = "AccountsReceivableGLCode";
  var $Method = "Method";
  var $Notes = "Notes";
  var $LineItems = "LineItems";
  var $WriteOffGLAccount = "WriteOffGLAccount";
 }
 
 class msRefund extends msBatchMember
 {
  var $CLASS_NAME = "Refund";
  var $ClassType = "Refund";
  var $RefundTo = "RefundTo";
  var $RefundAddress = "RefundAddress";
  var $CheckNumber = "CheckNumber";
  var $CheckDate = "CheckDate";
  var $TransactionID = "TransactionID";
  var $Paid = "Paid";
  var $LineItems = "LineItems";
  var $Notes = "Notes";
  var $PostToSubLedger = "PostToSubLedger";
  var $Total = "Total";
 }
 
 class msPayment extends msBatchMember
 {
  var $CLASS_NAME = "Payment";
  var $ClassType = "Payment";
  var $LinkedPayment = "LinkedPayment";
  var $Owner = "Owner";
  var $BusinessUnit = "BusinessUnit";
  var $Order = "Order";
  var $Total = "Total";
  var $ReferenceNumber = "ReferenceNumber";
  var $PaymentMethod = "PaymentMethod";
  var $CreditCardType = "CreditCardType";
  var $LineItems = "LineItems";
  var $Notes = "Notes";
  var $MerchantAccount = "MerchantAccount";
  var $TransactionID = "TransactionID";
  var $CreditCardLastFiveDigits = "CreditCardLastFiveDigits";
 }

 class msGift extends msBatchMember
 {
  var $CLASS_NAME = "Gift";
  var $ClassType = "Gift";
  var $Type = "Type";
  var $SubType = "SubType";
  var $IsAnonymous = "IsAnonymous";
  var $Donor = "Donor";
  var $Order = "Order";
  var $OrderLineItemID = "OrderLineItemID";
  var $Product = "Product";
  var $Campaign = "Campaign";
  var $Fund = "Fund";
  var $Appeal = "Appeal";
  var $Package = "Package";
  var $MasterGift = "MasterGift";
  var $ListAs = "ListAs";
  var $Amount = "Amount";
  var $Notes = "Notes";
  var $StockSymbol = "StockSymbol";
  var $NumberOfShares = "NumberOfShares";
  var $Status = "Status";
  var $PledgeStartDate = "PledgeStartDate";
  var $RecurrenceTemplate = "RecurrenceTemplate";
  var $NextTransactionDue = "NextTransactionDue";
  var $NextTransactionAmount = "NextTransactionAmount";
  var $BalanceDue = "BalanceDue";
  var $InstallmentID = "InstallmentID";
  var $ReceiptStatus = "ReceiptStatus";
  var $ReceiptDate = "ReceiptDate";
  var $Receipt = "Receipt";
  var $AcknowledgmentStatus = "AcknowledgmentStatus";
  var $AcknowledgmentDate = "AcknowledgmentDate";
  var $AcknowledgmentLetter = "AcknowledgmentLetter";
  var $PaymentMethod = "PaymentMethod";
  var $CreditCardType = "CreditCardType";
  var $PaymentReference = "PaymentReference";
  var $Tributes = "Tributes";
  var $Installments = "Installments";
  var $Attributes = "Attributes";
  var $Solicitors = "Solicitors";
  var $Premiums = "Premiums";
  var $Splits = "Splits";
  
 }
 
 class msGiftAttribute
 {
  var $CLASS_NAME = "GiftAttribute";
  var $ClassType = "GiftAttribute";
  var $Category = "Category";
  var $Description = "Description";
  var $Date = "Date";
  var $Comments = "Comments";
 }
 
 class msGiftSplit
 {
  var $CLASS_NAME = "GiftSplit";
  var $ClassType = "GiftSplit";
  var $Fund = "Fund";
  var $Amount = "Amount";
  var $Comments = "Comments";
 }
 
 class msGiftInstallment
 {
  var $CLASS_NAME = "GiftInstallment";
  var $ClassType = "GiftInstallment";
  var $InstallmentID = "InstallmentID";
  var $Date = "Date";
  var $Amount = "Amount";
  var $AmountPaid = "AmountPaid";
  var $Comments = "Comments";
 }
 
 class msGiftTribute
 {
  var $CLASS_NAME = "GiftTribute";
  var $ClassType = "GiftTribute";
  var $Tribute = "Tribute";
  var $Comments = "Comments";
 }
 
 class msGiftPremium
 {
  var $CLASS_NAME = "GiftPremium";
  var $ClassType = "GiftPremium";
  var $Premium = "Premium";
  var $Quantity = "Quantity";
  var $FairMarketValue = "FairMarketValue";
  var $Order = "Order";
  var $OrderLineItemID = "OrderLineItemID";
  var $Comments = "Comments";
 }
 
 class msGiftSolicitor
 {
  var $CLASS_NAME = "GiftSolicitor";
  var $ClassType = "GiftSolicitor";
  var $Solicitor = "Solicitor";
  var $Amount = "Amount";
  var $Comments = "Comments";
 }
 
 class msExtensionService extends msAggregate
 {
  var $CLASS_NAME = "ExtensionService";
  var $ClassType = "ExtensionService";
  var $IsConfiguration = "IsConfiguration";
  var $Transport = "Transport";
  var $Uri = "Uri";
  var $LastAccess = "LastAccess";
  var $Faulted = "Faulted";
  var $LastErrorMessage = "LastErrorMessage";
  var $DisabledUntil = "DisabledUntil";
  var $IsActive = "IsActive";
  var $SecurityLock = "SecurityLock";
 }
 
 class msOrder extends msAggregate
 {
  var $CLASS_NAME = "Order";
  var $ClassType = "Order";
  var $AmountDueNow = "AmountDueNow";
  var $HasGeneratedCEUCredits = "HasGeneratedCEUCredits";
  var $Batch = "Batch";
  var $TrackingNumber = "TrackingNumber";
  var $ShipDate = "ShipDate";
  var $CustomerNotes = "CustomerNotes";
  var $Date = "Date";
  var $SourceCode = "SourceCode";
  var $MediaCode = "MediaCode";
  var $ShipTo = "ShipTo";
  var $BillTo = "BillTo";
  var $PaymentMethod = "PaymentMethod";
  var $PaymentReferenceNumber = "PaymentReferenceNumber";
  var $MerchantAccount = "MerchantAccount";
  var $CreditCardNumber = "CreditCardNumber";
  var $ACHAccountNumber = "ACHAccountNumber";
  var $ACHRoutingNumber = "ACHRoutingNumber";
  var $BillingTemplate = "BillingTemplate";
  var $CreditCardExpirationDate = "CreditCardExpirationDate";
  var $CreditCardAuthorizationID = "CreditCardAuthorizationID";
  var $CreditCardType = "CreditCardType";
  var $CCVCode = "CCVCode";
  var $ShippingAddress = "ShippingAddress";
  var $BillingAddress = "BillingAddress";
  var $BillingEmailAddress = "BillingEmailAddress";
  var $DiscountCodes = "DiscountCodes";
  var $Status = "Status";
  var $LocalID = "LocalID";
  var $Discount = "Discount";
  var $Total = "Total";
  var $Notes = "Notes";
  var $InvoiceType = "InvoiceType";
  var $IsCreditCardEncrypted = "IsCreditCardEncrypted";
  var $Memo = "Memo";
  var $LineItems = "LineItems";
  var $PurchaseOrderNumber = "PurchaseOrderNumber";
  var $ShippingMethod = "ShippingMethod";
  var $MembershipRenewalBatch = "MembershipRenewalBatch";
  var $WorkflowTrackingID = "WorkflowTrackingID";
 }
 
 class msReturn extends msAggregate
 {
  var $CLASS_NAME = "Return";
  var $ClassType = "Return";
  var $Batch = "Batch";
  var $Date = "Date";
  var $Order = "Order";
  var $Reason = "Reason";
  var $Comments = "Comments";
  var $LineItems = "LineItems";
  var $LocalID = "LocalID";
 }
 
 class msFulfillmentBatch extends msAggregate
 {
  var $CLASS_NAME = "FulfillmentBatch";
  var $ClassType = "FulfillmentBatch";
  var $IsClosed = "IsClosed";
  var $DateClosed = "DateClosed";
  var $ClosedBy = "ClosedBy";
  var $Notes = "Notes";
  var $LineItems = "LineItems";
  var $LocalID = "LocalID";
 }
 
 class msFulfillmentBatchLineItem
 {
  var $CLASS_NAME = "FulfillmentBatchLineItem";
  var $ClassType = "FulfillmentBatchLineItem";
  var $Order = "Order";
  var $OrderLineItemID = "OrderLineItemID";
  var $QuantityShipped = "QuantityShipped";
  var $ShippingCarrier = "ShippingCarrier";
  var $TrackingNumber = "TrackingNumber";
 }
 
 class msProduct extends msAggregate
 {
  var $CLASS_NAME = "Product";
  var $ClassType = "Product";
  var $Code = "Code";
  var $IsActive = "IsActive";
  var $BusinessUnit = "BusinessUnit";
  var $Category = "Category";
  var $DisplayOrder = "DisplayOrder";
  var $Description = "Description";
  var $ConfirmationEmail = "ConfirmationEmail";
  var $SellOnline = "SellOnline";
  var $SellFrom = "SellFrom";
  var $SellUntil = "SellUntil";
  var $NewUntil = "NewUntil";
  var $Price = "Price";
  var $AllowCustomersToPayLater = "AllowCustomersToPayLater";
  var $MemberPrice = "MemberPrice";
  var $UseSpecialPricesOnly = "UseSpecialPricesOnly";
  var $DisplayPriceAs = "DisplayPriceAs";
  var $TrackInventory = "TrackInventory";
  var $Weight = "Weight";
  var $AllowBackOrders = "AllowBackOrders";
  var $EligibleForShippingCharges = "EligibleForShippingCharges";
  var $Taxable = "Taxable";
  var $TaxTable = "TaxTable";
  var $ProrationTable = "ProrationTable";
  var $SpecialPrices = "SpecialPrices";
  var $LinkedProducts = "LinkedProducts";
  var $LocalID = "LocalID";
  var $LinkedEntitlements = "LinkedEntitlements";
  var $Project = "Project";
  var $ARAccount = "ARAccount";
  var $RevenueAccount = "RevenueAccount";
  var $DeferredRevenueAccount = "DeferredRevenueAccount";
  var $WriteOffAccount = "WriteOffAccount";
  var $InventoryAccount = "InventoryAccount";
  var $COGSAccount = "COGSAccount";
  var $RevenueSplits = "RevenueSplits";
  var $CEUCredits = "CEUCredits";
  var $RevenueRecognitionTemplate = "RevenueRecognitionTemplate";
  var $Vendor = "Vendor";
  var $BillingTemplate = "BillingTemplate";
  var $DefaultWarehouse = "DefaultWarehouse";
  var $ShowOnMembershipForm = "ShowOnMembershipForm";
  var $Image = "Image";
  var $ReorderPoint = "ReorderPoint";
  
 }
 
 class msCustomField extends msAggregate
 {
  var $CLASS_NAME = "CustomField";
  var $ClassType = "CustomField";
  var $ApplicableType = "ApplicableType";
  var $FieldDefinition = "FieldDefinition";
  var $Type = "Type";
  var $Event = "Event";
  var $Competition = "Competition";
  var $Product = "Product";
  var $DisplayOrder = "DisplayOrder";
  var $RestrictDisplayBasedOnFee = "RestrictDisplayBasedOnFee";
  var $ApplicableFees = "ApplicableFees";
  var $CustomObject = "CustomObject";
  var $SecurityLock = "SecurityLock";
 }
 
 class msVolunteerTimesheet extends msAggregate
 {
  var $CLASS_NAME = "VolunteerTimesheet";
  var $ClassType = "VolunteerTimesheet";
  var $JobAssignment = "JobAssignment";
  var $HoursWorked = "HoursWorked";
  var $StartDate = "StartDate";
  var $LocalID = "LocalID";
  var $EndDate = "EndDate";
  var $Comments = "Comments";
  
 }
 
 class msPortalUser extends msUser
 {
  var $CLASS_NAME = "PortalUser";
  var $ClassType = "PortalUser";
  var $Owner = "Owner";
  var $LastLoggedInAs = "LastLoggedInAs";
  var $SecurityLock = "SecurityLock";  
 }
 
 class msPackage extends msProduct
 {
  var $CLASS_NAME = "Package";
  var $ClassType = "Package";
  var $Products = "Products";
 }
 
 class msPackagedProduct
 {
  var $CLASS_NAME = "PackagedProduct";
  var $ClassType = "PackagedProduct";
  var $Quantity = "Quantity";
  var $Product = "Product";
  var $Price = "Price";
 }
 
 class msInventoryTransaction extends msAggregate
 {
  var $CLASS_NAME = "InventoryTransaction";
  var $ClassType = "InventoryTransaction";
  var $Date = "Date";
  var $Product = "Product";
  var $Warehouse = "Warehouse";
  var $Quantity = "Quantity";
  var $InvoiceNumber = "InvoiceNumber";
  var $Notes = "Notes";
 }
 
 class msInventoryReceipt extends msInventoryTransaction
 {
  var $CLASS_NAME = "InventoryReceipt";
  var $ClassType = "InventoryReceipt";
  var $StartingQuantity = "StartingQuantity";
  var $EndingQuantity = "EndingQuantity";
  var $COGSQuantityRemaining = "COGSQuantityRemaining";
  var $UnitCost = "UnitCost";
  
 }
 
 class msInventoryAdjustment extends msInventoryTransaction
 {
  var $CLASS_NAME = "InventoryAdjustment";
  var $ClassType = "InventoryAdjustment";
 }
 
 class msOrderRelatedInventoryTransaction extends msInventoryTransaction
 {
  var $CLASS_NAME = "OrderRelatedInventoryTransaction";
  var $ClassType = "OrderRelatedInventoryTransaction";
  var $Order = "Order";
  var $OrderLineItemID = "OrderLineItemID";
  
 }
 
 class msInventoryBackorder extends msOrderRelatedInventoryTransaction
 {
  var $CLASS_NAME = "InventoryBackorder";
  var $ClassType = "InventoryBackorder";
 }
 
 class msInventoryReservation extends msInventoryTransaction
 {
  var $CLASS_NAME = "InventoryReservation";
  var $ClassType = "InventoryReservation";
 }
 
 class msExpiringProduct extends msProduct
 {
  var $CLASS_NAME = "ExpiringProduct";
  var $ClassType = "ExpiringProduct";
  var $ExpirationType = "ExpirationType";
  var $Availability = "Availability";
  var $StartDate = "StartDate";
  var $SellForNextYearAfter = "SellForNextYearAfter";
  var $SetDatesBasedOnPaymentDate = "SetDatesBasedOnPaymentDate";
  var $SellForNextMonthAfterDay = "SellForNextMonthAfterDay";
  var $StartDay = "StartDay";
  var $TermLength = "TermLength";
  var $UpdateDatesWhen = "UpdateDatesWhen";
  var $RequiresApproval = "RequiresApproval";
  var $RenewalTerms = "RenewalTerms";
  var $ProFormaRenewalInvoices = "ProFormaRenewalInvoices";
  var $GracePeriod = "GracePeriod";
  var $InvoicePercentage = "InvoicePercentage";
  var $AutoRenew = "AutoRenew";
  
 }
 
 class msTask extends msAggregate
 {
  var $CLASS_NAME = "Task";
  var $ClassType = "Task";
  var $Description = "Description";
  var $DueDate = "DueDate";
  var $Status = "Status";
  var $Owner = "Owner";
  var $SecurityLock = "SecurityLock";
 }

 class msMetadataContainer extends msAggregate
 {
  var $CLASS_NAME = "MetadataContainer";
  var $ClassType = "MetadataContainer";
  var $IsDefault = "IsDefault";
  var $CustomObject = "CustomObject";
  var $Description = "Description";
  var $ApplicableType = "ApplicableType";
 }
 
 class msForum extends msAggregate
 {
  var $CLASS_NAME = "Forum";
  var $ClassType = "Forum";
  var $DisplayOrder = "DisplayOrder";
  var $DiscussionBoard = "DiscussionBoard";
  var $Description = "Description";
  var $GroupName = "GroupName";
  var $MembersOnly = "MembersOnly";
  var $Moderated = "Moderated";
  var $IsActive = "IsActive";
 }
 
 class msInsertionOrderInvoiceBatch extends msAggregate
 {
  var $CLASS_NAME = "InsertionOrderInvoiceBatch";
  var $ClassType = "InsertionOrderInvoiceBatch";
  var $Issue = "Issue";
  var $Terms = "Terms";
  var $AutomaticallyEmailInvoices = "AutomaticallyEmailInvoices";
  var $Status = "Status";
  var $CompletionDate = "CompletionDate";
  var $SearchToUse = "SearchToUse";
  var $InvoiceBatch = "InvoiceBatch";
 }
 
 class msFund extends msAggregate
 {
  var $CLASS_NAME = "Fund";
  var $ClassType = "Fund";
  var $BusinessUnit = "BusinessUnit";
  var $Code = "Code";
  var $Description = "Description";
  var $StartDate = "StartDate";
  var $EndDate = "EndDate";
  var $Goal = "Goal";
  var $Notes = "Notes";
  var $GLAccounts = "GLAccounts";
  var $Premiums = "Premiums";
  var $IsActive = "IsActive";
  var $SecurityLock = "SecurityLock";
 }
 
 class CreditCard
 {
  var $NameOnCard;
  var $CardNumber;
  var $CardExpirationDate;
  var $BillingAddress;
  var $CCVCode;
 }
 
 class msInvoiceAdjustment extends msBatchMember
 {
  var $CLASS_NAME = "InvoiceAdjustment";
  var $ClassType = "InvoiceAdjustment";
  var $Invoice = "Invoice";
  var $Total = "Total";
  var $LineItems = "LineItems";
 }
 
 class PaymentAdjustmentInstruction
 {
  var $PaymentLineItemID;
  var $PaymentID;
  var $InvoiceAdjustmentPaymentAction;
  var $Amount;
 }
 
 class msPaymentLineItem
 {
  var $CLASS_NAME = "PaymentLineItem";
  var $ClassType = "PaymentLineItem";
  var $Type = "Type";
  var $Credit = "Credit";
  var $Invoice = "Invoice";
  var $Amount = "Amount";
 }
 
 class msRevenueRecognitionSchedule extends msFinancialSchedule
 {
  var $CLASS_NAME = "RevenueRecognitionSchedule";
  var $ClassType = "RevenueRecognitionSchedule";
  var $Entries = "Entries";
  var $BusinessUnit = "BusinessUnit";
  var $Invoice = "Invoice";
  var $InvoiceLineItemID = "InvoiceLineItemID";
 
 }
 
 class msBillingSchedule extends msFinancialSchedule
 {
  var $CLASS_NAME = "BillingSchedule";
  var $ClassType = "BillingSchedule";
  var $Entries = "Entries";
  var $Status = "Status";
  var $OrderLineItemID = "OrderLineItemID";
  var $Order = "Order";
  var $Notes = "Notes";
 }
 
 class msJob extends msAggregate
 {
  var $CLASS_NAME = "Job";
  var $ClassType = "Job";
  var $Description = "Description";
  var $Context = "Context";
  var $Status = "Status";
  var $DateStarted = "DateStarted";
  var $DateCompleted = "DateCompleted";
  var $Log = "Log";
  var $ConfirmationEmail = "ConfirmationEmail";
  var $LocalID = "LocalID";
 }
 
 class msMembershipRenewalJob extends msJob
 {
  var $CLASS_NAME = "MembershipRenewalJob";
  var $ClassType = "MembershipRenewalJob";
  var $SendOutEmails = "SendOutEmails";
 }
 
 class msCustomJob extends msJob
 {
  var $CLASS_NAME = "CustomJob";
  var $ClassType = "CustomJob";
  
 }
 
 class msLegislativeTerm extends msAggregate
 {
  var $CLASS_NAME = "LegislativeTerm";
  var $ClassType = "LegislativeTerm";
  var $LegislativeBody = "LegislativeBody";
  var $StartDate = "StartDate";
  var $EndDate = "EndDate";
  var $Description = "Description";
  var $SecurityLock = "SecurityLock";
 }
 
 class msExhibitor extends msAggregate
 {
  var $CLASS_NAME = "Exhibitor";
  var $ClassType = "Exhibitor";
  var $Show = "Show";
  var $Status = "Status";
  var $Customer = "Customer";
  var $RegistrationWindow = "RegistrationWindow";
  var $ContractSendDate = "ContractSendDate";
  var $ContractReceivedDate = "ContractReceivedDate";
  var $CancellationDate = "CancellationDate";
  var $Notes = "Notes";
  var $Booths = "Booths";
  var $BoothPreferences = "BoothPreferences";
  var $Contacts = "Contacts";
  var $BoothTypes = "BoothTypes";
  var $Logo = "Logo";
  var $Bio = "Bio";
  var $Order = "Order";
  var $OrderLineItemID = "OrderLineItemID";
 }
 
 class msSalesOrderLineItem
 {
  var $CLASS_NAME = "SalesOrderLineItem";
  var $ClassType = "SalesOrderLineItem";
  var $Product = "Product";
  var $Quantity = "Quantity";
  var $UnitPrice = "UnitPrice";
  var $Description = "Description";
  var $Total = "Total";
  
 }
 
 class msMembershipLeader
 {
  var $CLASS_NAME = "MembershipLeader";
  var $ClassType = "MembershipLeader";
  var $Individual = "Individual";
  var $CanCreateMembers = "CanCreateMembers";
  var $CanDownloadRoster = "CanDownloadRoster";
  var $CanMakePayments = "CanMakePayments";
  var $CanManageCommittees = "CanManageCommittees";
  var $CanManageEvents = "CanManageEvents";
  var $CanManageLeaders = "CanManageLeaders";
  var $CanUpdateContactInfo = "CanUpdateContactInfo";
  var $CanUpdateInformation = "CanUpdateInformation";
  var $CanUpdateMembershipInfo = "CanUpdateMembershipInfo";
  var $CanViewAccountHistory = "CanViewAccountHistory";
  var $CanViewMembers = "CanViewMembers";
  var $CanLoginAs = "CanLoginAs";
  var $CanManageDocuments = "CanManageDocuments";
  var $CanModerateDiscussions = "CanModerateDiscussions";
 }
 
 class msFundraisingProduct extends msProduct
 {
  var $CLASS_NAME = "FundraisingProduct";
  var $ClassType = "FundraisingProduct";
  var $Campaign = "Campaign";
  var $Appeal = "Appeal";
  var $GiftSubType = "GiftSubType";
  var $Fund = "Fund";
 }
 
 class msRegistrationBase extends msAggregate
 {
  var $CLASS_NAME = "RegistrationBase";
  var $ClassType = "RegistrationBase";
  var $Order = "Order";
  var $OrderLineItemID = "OrderLineItemID";
  var $Fee = "Fee";
  var $Event = "Event";
  var $Approved = "Approved";
  var $Notes = "Notes";
  var $DateApproved = "DateApproved";
  var $HasGeneratedCEUCredits = "HasGeneratedCEUCredits";
  var $Owner = "Owner";
  var $CheckInDate = "CheckInDate";
  var $AssignedTo = "AssignedTo";
  var $OnWaitList = "OnWaitList";
  var $CancellationDate = "CancellationDate";
  var $CancellationReason = "CancellationReason";
  var $Group;
 }
 
 class msCertification extends msAggregate
 {
  var $ClassType = 'Certification';
  var $Certificant = "Certificant";
  var $Program = "Program";
  var $Status = "Status";
  var $StatusReason = "StatusReason";
  var $Certified = "Certified";
  var $RequirementsMet = "RequirementsMet";
  var $PaidThruDate = "PaidThruDate";
  var $RecertificationDate = "RecertificationDate";
  var $CertificationDate = "CertificationDate";
  var $ApplicationDate = "ApplicationDate";
  var $EffectiveDate = "EffectiveDate";
  var $ExpirationDate = "ExpirationDate";
  var $CertificateSentDate = "CertificateSentDate";
  var $EnrollmentDate = "EnrollmentDate";
  var $TerminationDate = "TerminationDate";
  var $Notes = "Notes";
  var $CEUGracePeriod = "CEUGracePeriod";
  
 }
 
 class msCertificationProgram extends msAggregate
 {
  var $CLASS_NAME = "CertificationProgram";
  var $ClassType = "CertificationProgram";
  var $Code = "Code";
  var $Type = "Type";
  var $Description = "Description";
  var $Term = "Term";
  var $Designation = "Designation";
  var $RenewalProgram = "RenewalProgram";
  var $AwardDesignation = "AwardDesignation";
  var $MembersOnly = "MembersOnly";
  var $RecommendationRequirements = "RecommendationRequirements";
  var $CEURequirements = "CEURequirements";
  var $ExamRequirements = "ExamRequirements";
 }
 
 class msAwardRecipient extends msAggregate
 {
  var $CLASS_NAME = "AwardRecipient";
  var $ClassType = "AwardRecipient";
  var $Award = "Award";
  var $Recipient = "Recipient";
  var $Period = "Period";
  var $Date = "Date";
  var $Status = "Status";
  var $CompetitionEntry = "CompetitionEntry";
  var $Notes = "Notes";
}

 class msChapter extends msAggregate
 {
  var $CLASS_NAME = "Chapter";
  var $ClassType = "Chapter";
  var $Code = "Code";
  var $IsActive = "IsActive";
  var $MembershipOrganization = "MembershipOrganization";
  var $Type = "Type";
  var $LinkedOrganization = "LinkedOrganization";
  var $Layer = "Layer";
  var $Description = "Description";
  var $EmailAddress = "EmailAddress";
  var $Url = "Url";
  var $NewMemberConfirmationEmail = "NewMemberConfirmationEmail";
  var $RenewingMemberConfirmationEmail = "RenewingMemberConfirmationEmail";
  var $Leaders = "Leaders";
  var $LocalID;
 }
 
 class msExhibitorContactRestriction extends msAggregate
 {
  var $CLASS_NAME = "ExhibitorContactRestriction";
  var $ClassType = "ExhibitorContactRestriction";
  var $Show = "Show";
  var $EvaluationOrder = "EvaluationOrder";
  var $ContactType = "ContactType";
  var $PriorityPointMinimum = "PriorityPointMinimum";
  var $PriorityPointMaximum = "PriorityPointMaximum";
  var $SquareFootageMinimum = "SquareFootageMinimum";
  var $SquareFootageMaximum = "SquareFootageMaximum";
  var $MaximumNumberOfContacts = "MaximumNumberOfContacts";
  var $BoothCategory = "BoothCategory";
  var $BoothType = "BoothType";
  var $ErrorMessage = "ErrorMessage";
  var $Notes = "Notes";
 }
 
 class msAdvertisingContract extends msAggregate
 {
  var $CLASS_NAME = "AdvertisingContract";
  var $ClassType = "AdvertisingContract";
  var $Publication = "Publication";
  var $Agency = "Agency";
  var $Advertiser = "Advertiser";
  var $BillTo = "BillTo";
  var $BillingAddress = "BillingAddress";
  var $RateCard = "RateCard";
  var $ContactName = "ContactName";
  var $ContactPhone = "ContactPhone";
  var $ContactEmail = "ContactEmail";
  var $SignatureDate = "SignatureDate";
  var $ReceivedDate = "ReceivedDate";
  var $TermStart = "TermStart";
  var $TermEnd = "TermEnd";
  var $NumberOfPlacements = "NumberOfPlacements";
  var $Notes = "Notes";
  var $LocalID;
 }
 
 class msSubscription extends msAggregate
 {
  var $CLASS_NAME = "Subscription";
  var $ClassType = "Subscription";
  var $Publication = "Publication";
  var $Fee = "Fee";
  var $Address = "Address";
  var $OriginalOrder = "OriginalOrder";
  var $OriginalOrderLineItemID = "OriginalOrderLineItemID";
  var $LastOrder = "LastOrder";
  var $LastOrderLineItemID = "LastOrderLineItemID";
  var $Owner = "Owner";
  var $OnHold = "OnHold";
  var $OverrideShipToAddress = "OverrideShipToAddress";
  var $OverrideShipToName = "OverrideShipToName";
  var $StartDate = "StartDate";
  var $TerminationDate = "TerminationDate";
  var $TerminationReason = "TerminationReason";
  var $ExpirationDate = "ExpirationDate";
  var $Notes = "Notes";
  var $DoNotRenew = "DoNotRenew";
  var $AutomaticallyPayForRenewal = "AutomaticallyPayForRenewal";
 }
 
 class msDiscountCode extends msAggregate
 {
  var $CLASS_NAME = "DiscountCode";
  var $ClassType = "DiscountCode";
  var $Code = "Code";
  var $Description = "Description";
  var $ValidFrom = "ValidFrom";
  var $ValidUntil = "ValidUntil";
  var $ApplicableProducts = "ApplicableProducts";
  var $ApplicableProductTypes = "ApplicableProductTypes";
  var $ApplicableProductCategories = "ApplicableProductCategories";
  var $MaximumNumberOfUsages = "MaximumNumberOfUsages";
  var $MaximumNumberOfUsagesPerCustomer = "MaximumNumberOfUsagesPerCustomer";
  var $EligibleCustomers = "EligibleCustomers";
  var $RestrictToEligibleProducts = "RestrictToEligibleProducts";
  var $RestrictToSpecifiedCustomers = "RestrictToSpecifiedCustomers";
  var $Amount = "Amount";
  var $Percentage = "Percentage";
  var $DiscountProduct = "DiscountProduct";
 }
 
 class msMiscellaneousProduct extends msProduct
 {
  var $CLASS_NAME = "MiscellaneousProduct";
  var $ClassType = "MiscellaneousProduct";
 }
 
 class msAccountingProject extends msAggregate
 {
  var $CLASS_NAME = "AccountingProject";
  var $ClassType = "AccountingProject";
  var $Description = "Description";
  var $BusinessUnit = "BusinessUnit";
  var $Code = "Code";
  var $EndDate = "EndDate";
  var $IsActive = "IsActive";
  
 }
 
 class msDiscussionTopic extends msAggregate
 {
  var $CLASS_NAME = "DiscussionTopic";
  var $ClassType = "DiscussionTopic";
  var $Forum = "Forum";
  var $PostedBy = "PostedBy";
 }
 
 class msSearchEntitlement extends msEntitlement
 {
  var $CLASS_NAME = "SearchEntitlement";
  var $ClassType = "SearchEntitlement";
  var $Search = "Search";
  
 }
 
 class msFinancialSchedule extends msAggregate
 {
  var $CLASS_NAME = "FinancialSchedule";
  var $ClassType = "FinancialSchedule";
  var $IsSuspended = "IsSuspended";
  var $SecurityLock = "SecurityLock";
 }
 
 
 class msFinancialScheduleEntry
 {
  var $CLASS_NAME = "FinancialScheduleEntry";
  var $ClassType = "FinancialScheduleEntry";
  var $EntryID = "EntryID";
  var $DateProcessed = "DateProcessed";
  var $Date = "Date";
  var $Amount = "Amount";
 }
 
 class msBillingScheduleEntry extends msFinancialScheduleEntry
 {
  var $CLASS_NAME = "BillingScheduleEntry";
  var $ClassType = "BillingScheduleEntry";
  var $Status = "Status";
  var $IsPerpetual = "IsPerpetual";
  var $Message = "Message";
  var $Invoice = "Invoice";
  var $Payment = "Payment";
 }
 
 class msVolunteerJobAssignment extends msAggregate
 {
  var $CLASS_NAME = "VolunteerJobAssignment";
  var $ClassType = "VolunteerJobAssignment";
  var $JobOccurrence = "JobOccurrence";
  var $Volunteer = "Volunteer";
  var $StartDateTime = "StartDateTime";
  var $EndDateTime = "EndDateTime";
  var $Comments = "Comments";
  var $LocalID = "LocalID";
  }
  
 class msPortalControlPropertyOverride extends msAggregate
 {
  var $CLASS_NAME = "PortalControlPropertyOverride";
  var $ClassType = "PortalControlPropertyOverride";
  var $PageName = "PageName";
  var $ControlName = "ControlName";
  var $PropertyName = "PropertyName";
  var $Value = "Value";
  var $Description = "Description";
 }
 
 class msPortalPageLayoutContainer extends msMetadataContainer
 {
  var $CLASS_NAME = "PortalPageLayoutContainer";
  var $ClassType = "PortalPageLayoutContainer";
  var $Metadata = "Metadata";
 }
 
 class msData360PageLayoutContainer extends msMetadataContainer
 {
  var $CLASS_NAME = "Data360PageLayoutContainer";
  var $ClassType = "Data360PageLayoutContainer";
  var $Metadata = "Metadata";
 }
 
 class msDataEntryPageLayoutContainer extends msMetadataContainer
 {
  var $CLASS_NAME = "DataEntryPageLayoutContainer";
  var $ClassType = "DataEntryPageLayoutContainer";
  var $Metadata = "Metadata";
 }
 
 class msUserPreferencesContainer extends msAggregate
 {
  var $CLASS_NAME = "UserPreferencesContainer";
  var $ClassType = "UserPreferencesContainer";
  var $User = "User";
  var $RecentItems = "RecentItems";
  var $Favorites = "Favorites";
  var $Preferences = "Preferences";
 }
 
 class msConsoleMetadataContainer extends msMetadataContainer
 {
  var $CLASS_NAME = "ConsoleMetadataContainer";
  var $ClassType = "ConsoleMetadataContainer";
  var $Metadata = "Metadata";
 }
 
 class msIntegrationLink extends msAggregate
 {
  var $CLASS_NAME = "IntegrationLink";
  var $ClassType = "IntegrationLink";
  var $Type = "Type";
  var $TargetGroup = "TargetGroup";
  var $Display = "Display";
  var $TargetName = "TargetName";
  var $Description = "Description";
  var $Link = "Link";
  var $DisplayCriteria = "DisplayCriteria";
  var $PostLoginToken = "PostLoginToken";
 }
 
 class msActivity extends msAggregate
 {
  var $CLASS_NAME = "Activity";
  var $ClassType = "Activity";
  var $Type = "Type";
  var $Status = "Status";
  var $Owner = "Owner";
  var $Entity = "Entity";
  var $Bill = "Bill";
  var $Legislator = "Legislator";
  var $Accreditation = "Accreditation";
  var $AccreditationAppeal = "AccreditationAppeal";
  var $AccreditationSiteVisit = "AccreditationSiteVisit";
  var $Lead = "Lead";
  var $Request = "Request";
  var $Gift = "Gift";
  var $Date = "Date";
  var $Description = "Description";
  var $Opportunity = "Opportunity";
 }
 
 class msInvoiceTerms extends msAggregate
 {
  var $CLASS_NAME = "InvoiceTerms";
  var $ClassType = "InvoiceTerms";
  var $NumberOfDays = "NumberOfDays";
  var $IsDefault = "IsDefault";
  var $IsActive;
 }
 
 class msLead extends msAggregate
 {
  var $CLASS_NAME = "Lead";
  var $ClassType = "Lead";
  var $Owner = "Owner";
  var $FirstName = "FirstName";
  var $LastName = "LastName";
  var $Organization = "Organization";
  var $Title = "Title";
  var $Phone = "Phone";
  var $Status = "Status";
  var $Type = "Type";
  var $Email = "Email";
  var $AnnualRevenue = "AnnualRevenue";
  var $Address = "Address";
  var $Description = "Description";
  var $DateConverted = "DateConverted";
  var $Opportunity = "Opportunity";
  var $Account = "Account";
  var $Contact = "Contact";
  var $Campaigns = "Campaigns";
  var $LocalID = "LocalID";
 }
 
 class msVolunteer extends msAggregate
 {
  var $CLASS_NAME = "Volunteer";
  var $ClassType = "Volunteer";
  var $Types = "Types";
  var $Individual = "Individual";
  var $EmergencyContactName = "EmergencyContactName";
  var $EmergencyContactPhone = "EmergencyContactPhone";
  var $Sponsor = "Sponsor";
  var $Traits = "Traits";
  var $Availability = "Availability";
  var $Locations = "Locations";
  var $AvailabilityComment = "AvailabilityComment";
  var $UnavailableFrom = "UnavailableFrom";
  var $UnavailableTo = "UnavailableTo";
 }
 
 class msVolunteerAssignedType
 {
  var $CLASS_NAME = "VolunteerAssignedType";
  var $ClassType = "VolunteerAssignedType";
  var $Type = "Type";
  var $StartDate = "StartDate";
  var $EndDate = "EndDate";
  var $Status = "Status";
 }
 
 class msVolunteerAvailability
 {
  var $CLASS_NAME = "VolunteerAvailability";
  var $ClassType = "VolunteerAvailability";
  var $StartDate = "StartDate";
  var $EndDate = "EndDate";
  var $DaysOfWeek = "DaysOfWeek";
  var $StartTime = "StartTime";
  var $EndTime = "EndTime";
  
 }
 
 class msResume extends msAggregate
 {
  var $CLASS_NAME = "Resume";
  var $ClassType = "Resume";
  var $Owner = "Owner";
  var $File = "File";
  var $IsActive = "IsActive";
  var $IsApproved = "IsApproved";
  var $LocalID = "LocalID";
 }
 
 class msMerchantAccount extends msAggregate
 {
  var $CLASS_NAME = "MerchantAccount";
  var $ClassType = "MerchantAccount";
  var $Description = "Description";
  var $BusinessUnit = "BusinessUnit";
  var $CashAccount = "CashAccount";
  var $IsDefault = "IsDefault";
  var $DefaultBatch = "DefaultBatch";
  var $CutOffHour = "CutOffHour";
  var $IsExternalAccount = "IsExternalAccount";
  var $Chapter = "Chapter";
  var $OrganizationalLayer = "OrganizationalLayer";
  var $Section = "Section";
  var $LocalID = "LocalID"; 
 }
 
 class msPayPalMerchantAccount extends msMerchantAccount
 {
  var $CLASS_NAME = "PayPalMerchantAccount";
  var $ClassType = "PayPalMerchantAccount";
  var $UserName = "UserName";
  var $Password = "Password";
  var $APISignature = "APISignature";
 }
 
 class msAuthorizeNetMerchantAccount extends msMerchantAccount
 {
  var $CLASS_NAME = "AuthorizeNetMerchantAccount";
  var $ClassType = "AuthorizeNetMerchantAccount";
  var $MerchantLoginID = "MerchantLoginID";
  var $TransactionKey = "TransactionKey";
 }
 
 class msPayFlowProMerchantAccount extends msMerchantAccount
 {
  var $CLASS_NAME = "PayFlowProMerchantAccount";
  var $ClassType = "PayFlowProMerchantAccount";
  var $MerchantLoginID = "MerchantLoginID";
  var $Partner = "Partner";
  var $Password = "Password";
 }
 
 class msAgency extends msAggregate
 {
  var $CLASS_NAME = "Agency";
  var $ClassType = "Agency";
  var $Organization = "Organization";
  var $Notes = "Notes";
  var $Discount = "Discount";
  var $LocalID = "LocalID";
 }
 
 class msLegacyProduct extends msProduct
 {
  var $CLASS_NAME = "LegacyProduct";
  var $ClassType = "LegacyProduct";
 }
 
 class msHistoricalTransaction extends msAggregate
 {
  var $CLASS_NAME = "HistoricalTransaction";
  var $ClassType = "HistoricalTransaction";
  var $Date = "Date";
  var $Type = "Type";
  var $Memo = "Memo";
  var $Owner = "Owner";
  var $Order = "Order";
  var $Total = "Total";
  var $LineItems = "LineItems";
  var $ReferenceNumber = "ReferenceNumber";
  var $Notes = "Notes";
  var $LocalID = "LocalID";
 }
 
 class msHistoricalTransactionLineItem
 {
  var $CLASS_NAME = "HistoricalTransactionLineItem";
  var $ClassType = "HistoricalTransactionLineItem";
  var $Quantity = "Quantity";
  var $UnitPrice = "UnitPrice";
  var $Description = "Description";
  var $Total = "Total";
 }
 
 class msBillingTemplate extends msAggregate
 {
  var $CLASS_NAME = "BillingTemplate";
  var $ClassType = "BillingTemplate";
  var $Description = "Description";
  var $GenerateEntireInvoiceUpFront = "GenerateEntireInvoiceUpFront";
  var $RecurrenceTemplate = "RecurrenceTemplate";
  var $LocalID = "LocalID";
 }
 
 class msPortalForm extends msAggregate
 {
  var $CLASS_NAME = "PortalForm";
  var $ClassType = "PortalForm";
  var $DisplayOrder = "DisplayOrder";
  var $LoginScreenDisplayName = "LoginScreenDisplayName";
  var $DisplayOnHomeScreen = "DisplayOnHomeScreen";
  var $HomeScreenDisplayName = "HomeScreenDisplayName";
  var $CustomerType = "CustomerType";
  var $Module = "Module";
  var $Description = "Description";
  var $ShowFrom = "ShowFrom";
  var $ShowUntil = "ShowUntil";
  var $MembersOnly = "MembersOnly";
  var $DisplayOnLoginScreen = "DisplayOnLoginScreen";
  var $ConfirmationEmail = "ConfirmationEmail";
  var $FormInstructions = "FormInstructions";
  var $EditInstructions = "EditInstructions";
  var $ConfirmationInstructions = "ConfirmationInstructions";
  var $ViewInstructions = "ViewInstructions";
  var $ManageInstructions = "ManageInstructions";
  var $PostSubmissionInstructions = "PostSubmissionInstructions";
  var $CreatePageLayout = "CreatePageLayout";
  var $EditPageLayout = "EditPageLayout";
  var $ViewPageLayout = "ViewPageLayout";
  var $ActivityType = "ActivityType";
  var $ValueAssignments = "ValueAssignments";
  var $LocalID = "LocalID";
 }
 
 class msPortalFormValueAssignment
 {
  var $CLASS_NAME = "PortalFormValueAssignment";
  var $ClassType = "PortalFormValueAssignment";
  var $FieldName = "FieldName";
  var $ValueToSet = "ValueToSet";
  var $OnlyIfPreviouslyNull = "OnlyIfPreviouslyNull";
  var $ClearExistingValues = "ClearExistingValues";
 }
 
 class msCustomObjectPortalForm extends msPortalForm
 {
  var $CLASS_NAME = "CustomObjectPortalForm";
  var $ClassType = "CustomObjectPortalForm";
  var $CustomObject = "CustomObject";
  var $MaximumNumberOfSubmissions = "MaximumNumberOfSubmissions";
  var $AccessMode = "AccessMode";
  var $FormSubmissionManagementLinkText = "FormSubmissionManagementLinkText";
  var $ManagementFieldsToDisplay = "ManagementFieldsToDisplay";
  var $AllowAnonymousSubmissions = "AllowAnonymousSubmissions";
  var $AnonymousSubmissionCompletionUrl = "AnonymousSubmissionCompletionUrl";
 }
 
 class msProrationTable extends msAggregate
 {
  var $CLASS_NAME = "ProrationTable";
  var $ClassType = "ProrationTable";
  var $Description = "Description";
  var $Entries = "Entries";
 }
 
 class msProrationTableEntry
 {
  var $CLASS_NAME = "ProrationTableEntry";
  var $ClassType = "ProrationTableEntry";
  var $StartDate = "StartDate";
  var $EndDate = "EndDate";
  var $Proration = "Proration";
 }
 
 class msConfigurableType extends msAggregate
 {
  var $CLASS_NAME = "ConfigurableType";
  var $ClassType = "ConfigurableType";
  var $Description = "Description";
  var $Code = "Code";
  var $DisplayOrder = "DisplayOrder";
  var $IsDefault = "IsDefault";
 }
 
 class msPageLayoutConfigurableType extends msConfigurableType
 {
  var $CLASS_NAME = "PageLayoutConfigurableType";
  var $ClassType = "PageLayoutConfigurableType";
  var $CreatePageLayout = "CreatePageLayout";
  var $EditPageLayout = "EditPageLayout";
  var $ViewPageLayout = "ViewPageLayout";
  var $PortalPageLayout = "PortalPageLayout";
 }
 
 class msReturnReason extends msConfigurableType
 {
  var $CLASS_NAME = "ReturnReason";
  var $ClassType = "ReturnReason";
 }
 
 class DuplicateField
 {
  var $Name;
  var $DuplicateDetectionMatchMode;//0,1,2
  
 }
 
 class msAssociationConfigurationContainer extends msAggregate
 {
  var $CLASS_NAME = "AssociationConfigurationContainer";
  var $ClassType = "AssociationConfigurationContainer";
  var $ConfigurationValues = "ConfigurationValues";
  var $DisplayAddress = "DisplayAddress";
  var $EnableApiAccess = "EnableApiAccess";
  var $Mode = "Mode";
  var $Acronym = "Acronym";
  var $Address = "Address";
  var $Logo = "Logo";
  var $WriteOffMethod = "WriteOffMethod";
  var $AccountingMethod = "AccountingMethod";
  var $FinancialSoftwarePackage = "FinancialSoftwarePackage";
  var $BatchDownloadMethod = "BatchDownloadMethod";
  var $InvoiceReport = "InvoiceReport";
  var $PaymentReceiptReport = "PaymentReceiptReport";
  var $OrderReceiptReport = "OrderReceiptReport";
  var $VerifyControlValuesWhenPostingBatches = "VerifyControlValuesWhenPostingBatches";
  var $PortalHeaderGraphic = "PortalHeaderGraphic";
  var $PortalSkin = "PortalSkin";
  var $PortalLoginScreenText = "PortalLoginScreenText";
  var $PortalDisplayBecomeMember = "PortalDisplayBecomeMember";
  var $PortalDisplayMakeDonation = "PortalDisplayMakeDonation";
  var $PortalAdditionalLinks = "PortalAdditionalLinks";
  var $ShowUpcomingEventsTabInPortal = "ShowUpcomingEventsTabInPortal";
  var $SendEmailWhenUserUpdatesInformation = "SendEmailWhenUserUpdatesInformation";
  var $PortalDisplayCreateUserAccount = "PortalDisplayCreateUserAccount";
  var $AssociationHomePageUrl = "AssociationHomePageUrl";
  var $MembershipDirectoryEnabled = "MembershipDirectoryEnabled";
  var $MembershipDirectoryForMembersOnly = "MembershipDirectoryForMembersOnly";
  var $MembershipDirectorySearchFields = "MembershipDirectorySearchFields";
  var $MembershipDirectoryTabularResultsFields = "MembershipDirectoryTabularResultsFields";
  var $MembershipDirectoryDetailsFields = "MembershipDirectoryDetailsFields";
  var $PickListReport = "PickListReport";
  var $PackingListReport = "PackingListReport";
  var $OnlineStorefrontEnabled = "OnlineStorefrontEnabled";
  var $IsVerticalResponseEnabled = "IsVerticalResponseEnabled";
  var $VerticalResponseUserName = "VerticalResponseUserName";
  var $CEUSelfReportingMode = "CEUSelfReportingMode";
  var $ComponentSelfReportingMode = "ComponentSelfReportingMode";
  var $ShowCertificationsInPortal = "ShowCertificationsInPortal";
  var $ShowComponentRegistrationsInPortal = "ShowComponentRegistrationsInPortal";
  var $ShowCEUCreditsInPortal = "ShowCEUCreditsInPortal";
  var $DefaultJobPostingExpiration = "DefaultJobPostingExpiration";
  var $JobPostingAccessMode = "JobPostingAccessMode";
  var $ResumeSearchFields = "ResumeSearchFields";
  var $ResumeTabularResultsFields = "ResumeTabularResultsFields";
  var $ResumeDetailsFields = "ResumeDetailsFields";
  var $CompetitionEntryDraftStatus = "CompetitionEntryDraftStatus";
  var $CompetitionEntryPendingPaymentStatus = "CompetitionEntryPendingPaymentStatus";
  var $CompetitionEntrySubmittedStatus = "CompetitionEntrySubmittedStatus";
  var $DisableDuplicateCheckConsole = "DisableDuplicateCheckConsole";
  var $DisableDuplicateCheckPortal = "DisableDuplicateCheckPortal";
  var $PortalCSS = "PortalCSS";
  var $PortalLoginScreenTitle = "PortalLoginScreenTitle";
  var $PortalHideDropShadow = "PortalHideDropShadow";
  var $UseDropDownsForStatesAndCountries = "UseDropDownsForStatesAndCountries";
  var $ReorderPointNoficationEmail = "ReorderPointNoficationEmail";
  
 }
 
 class ReportManifest
 {
  var $ReportSpecificationName;
  
 }
 
 class msCatalogAggregate extends msAggregate
 {
  var $CLASS_NAME = "CatalogAggregate";
  var $ClassType = "CatalogAggregate";
 }
 
 class msCustomerDomainObject extends msCatalogAggregate
 {
  var $CLASS_NAME = "CustomerDomainObject";
  var $ClassType = "CustomerDomainObject";
  var $Customer = "Customer";
 }
 
 class msAssociation extends msCustomerDomainObject
 {
  var $CLASS_NAME = "Association";
  var $ClassType = "Association";
  var $Acronym = "Acronym";
  var $DatabaseServer = "DatabaseServer";
  var $BaseCurrency = "BaseCurrency";
  var $PortalSelfHostUri = "PortalSelfHostUri";
  var $PortalDisabled = "PortalDisabled";
  var $PartitionKey = "PartitionKey";
  var $FiscalYearEnd = "FiscalYearEnd";
  var $Mode = "Mode";
  var $Status = "Status";
  var $EnableApiAccess = "EnableApiAccess";
  var $TrialEndDate = "TrialEndDate";
  var $BillingId = "BillingId";
 }
 
?>