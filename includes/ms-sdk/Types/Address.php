<?php
/*
Membersuite Address Object
*/

class Address
{
  var $RecordType = 'Address';
  var $CASSCertificationDate;
  var $CarrierRoute;
  var $City;
  var $Company;
  var $CongressionalDistrict;
  var $Country;
  var $County;
  var $DeliveryPointCheckDigit;
  var $DeliveryPointCode;
  var $GeocodeLat;
  var $GeocodeLong;
  var $LastGeocodeDate;
  var $Line1;
  var $Line2;
  var $PostalCode;
  var $State;
}

class EmailTemplate
{
      var $SenderID;
      var $DisplayName;
      var $SearchType;
      var $SearchContext;
      var $FromName;
      var $To;
      var $Cc;
      var $Bcc;
      var $Subject;
      var $HtmlBody;
      var $TextBody;
      var $ReplyTo;
}

class ClassMetadataOverride
{
    var $Name;
    var $Module;
    var $Createable;
    var $Updateable;
    var $Deletable;
    var $Label;
    var $LabelPlural;
    var $IsAbstract;
    var $IsSecurable;
    var $Fields;// list of fields
    var $ValidationRules;// list validation rules
    var $FieldCalculationRules;// list of calculation rules
}

class ValidationRule
{
    var $Name;
    var $Expression;
    var $ErrorMessage;
    var $IsActive;
}

class FieldCalculationRule
{
    var $Name;
    var $IsActive;
    var $TargetField;
    var $EvaluationOrder;
    var $Expression;
    var $Criteria;
    var $SkipIfTargetFieldIsSet;
    var $RunOnNewRecordsOnly;
    var $Notes;
    
}

?>
