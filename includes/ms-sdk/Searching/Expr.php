<?php

class Expr
{
  
  public function  Equals($FieldName,$value)
  {
    return array("Type"=>"Equals","FieldName"=>$FieldName,"Value"=>$value);
  }
  
  public function  DoesNotEqual($FieldName,$value)
  {
    return array("Type"=>"DoesNotEqual","FieldName"=>$FieldName,"Value"=>$value);
  }
  
  public function  IsGreaterThanOrEqualTo($FieldName,$value)
  {
    return array("Type"=>"IsGreaterThanOrEqualTo","FieldName"=>$FieldName,"Value"=>$value);
  }
  
  public function  IsGreaterThan($FieldName,$value)
  {
    return array("Type"=>"IsGreaterThan","FieldName"=>$FieldName,"Value"=>$value);
  }
  
  public function  IsLessThanOrEqual($FieldName,$value)
  {
    return array("Type"=>"IsLessThanOrEqual","FieldName"=>$FieldName,"Value"=>$value);
  }
  
  public function  IsLessThan($FieldName,$value)
  {
    return array("Type"=>"IsLessThan","FieldName"=>$FieldName,"Value"=>$value);
  }
  
  public function  Contains($FieldName,$value)
  {
    return array("Type"=>"Contains","FieldName"=>$FieldName,"Value"=>$value);
  }
  
  public function  IsBlank($FieldName,$value)
  {
    return array("Type"=>"IsBlank","FieldName"=>$FieldName,"Value"=>$value);
  }
  
  public function  IsNotBlank($FieldName,$value)
  {
    return array("Type"=>"IsNotBlank","FieldName"=>$FieldName,"Value"=>$value);
  }
  
  public function  IsBetween($FieldName,$value)
  {
    return array("Type"=>"IsBetween","FieldName"=>$FieldName,"Value"=>$value);
  }
  
  public function  IsOneOfTheFollowing($FieldName,$value)
  {
    return array("Type"=>"IsOneOfTheFollowing","FieldName"=>$FieldName,"Value"=>$value);
  }
    
    
}

?>