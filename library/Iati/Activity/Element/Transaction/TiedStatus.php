<?php
class Iati_Activity_Element_Transaction_TiedStatus extends Iati_Activity_Element
{
    protected $_type = 'TiedStatus';
    protected $_parentType = 'Transaction';
    protected $_validAttribs = array('text' => '', '@xml_lang' => '', '@code' => '');
}