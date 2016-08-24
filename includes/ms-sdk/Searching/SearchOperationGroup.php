<?php
/*
 Search operation group
*/
class SearchOperationGroup
{
    
    var $Criteria;
    var $GroupType;
    var $count=0;
    var $countgroup;
    
    function __construct()
    {
        $this->count=0;
        $this->countgroup=0;
        $this->Criteria=array();
        $this->GroupType=array();
    }
    
    public function CriteriaAdd($SearchOperation)
    {
        
        $this->Criteria[$this->count] = $SearchOperation;
        $this->count++;    
    }
    
    public function SearchOperationGroupType($GroupType)
    {
    $this->GroupType[$this->countgroup] = array("GroupType"=>$GroupType);
    $this->countgroup++;
    }
    
}

?>