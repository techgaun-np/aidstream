<?php
class Iati_Activity_Element_RelatedActivity extends Iati_Activity_Element
{
    protected $_type = 'RelatedActivity';
    protected $_parentType = 'Activity';
    protected $_validAttribs = array('text' => '', '@xml_lang' => '', '@ref' => '', '@type' => '');
}