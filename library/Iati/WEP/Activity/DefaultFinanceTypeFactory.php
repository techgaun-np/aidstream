<?php
class Iati_WEP_Activity_DefaultFinanceTypeFactory extends Iati_WEP_Activity_BaseFactory
{
    public function __construct()
    {
        parent :: __construct();
    }

    public function factory($objectType = 'DefaultFinanceType', $data = array())
    {
        $this->globalObject = $this->getRootNode();
        if($data){
            $tree = $this->createObjects ($objectType, $this->globalObject, $data);
        }
        else{
            $tree = $this->createObjects ($objectType, $this->globalObject);
        }

        return $tree;
    }
    
    
}