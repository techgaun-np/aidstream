<?php
class Iati_Activity_Element_DefaultFlowType extends Iati_Activity_Element
{
    protected $_type = 'DefaultFlowType';
    protected $_parentType = 'Activity';
    protected $_validAttribs = array('@code' => '', 'text' => '', '@xml_lang' => '');
}