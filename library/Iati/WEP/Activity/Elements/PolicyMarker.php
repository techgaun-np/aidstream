<?php
class Iati_WEP_Activity_Elements_PolicyMarker extends Iati_WEP_Activity_Elements_ElementBase
{
    protected $attributes = array('id', 'text', 'significance', 'vocabulary', 'code', 'xml_lang');
    protected $text;
    protected $vocabulary;
    protected $significance;
    protected $code;
    protected $xml_lang;
    protected $id = 0;
    protected $options = array();
    protected $validators = array(
                                
                            );
    protected $className = 'PolicyMarker';
    protected $attributes_html = array(
                'id' => array(
                    'name' => 'id',
                    'html' => '<input type= "hidden" name="%(name)s" value= "%(value)s" />' 
                ),
                'significance' => array(
                    'name' => 'significance',
                    'label' => 'Significance',
                    'html' => '<select name="%(name)s" %(attrs)s>%(options)s</select><div class="help policy_marker-significance"></div>',
                    'options' => '',
                    'attrs' => array('class' => array('form-select'))
                ),
                'vocabulary' => array(
                    'name' => 'vocabulary',
                    'label' => 'Vocabulary',
                    'html' => '<select name="%(name)s" %(attrs)s>%(options)s</select><div class="help policy_marker-vocabulary"></div>',
                    'options' => '',
                    'attrs' => array('class' => array('form-select'))
                ),
                'code' => array(
                    'name' => 'code',
                    'label' => 'Policy Marker',
                    'html' => '<select name="%(name)s" %(attrs)s>%(options)s</select><div class="help policy_marker-code"></div>',
                    'options' => '',
                    'attrs' => array('class' => array('form-select'))
                ),
                'text' => array(
                    'name' => 'text',
                    'label' => 'Description',
                    'html' => '<textarea rows="2" cols="20" name="%(name)s" %(attrs)s>%(value)s</textarea><div class="help policy_marker-text"></div>',
                    'attrs' => array('class' => array('form-text'))
                ),
                'xml_lang' => array(
                    'name' => 'xml_lang',
                    'label' => 'Language',
                    'html' => '<select name="%(name)s" %(attrs)s>%(options)s</select><div class="help policy_marker-xml_lang"></div>',
                    'options' => '',
                    'attrs' => array('class' => array('form-select'))
                ),
    );
    
    protected static $count = 0;
    protected $objectId;
    protected $error = array();
    protected $hasError = false;
    protected $multiple = true;
   
    public function __construct()
    {
        parent::__construct();
        $this->objectId = self::$count;
        self::$count += 1;
        $this->setOptions();
    }
    
    public function setOptions()
    {
        $model = new Model_Wep();
        $this->options['significance'] = $model->getCodeArray('PolicySignificance', null, '1');
        $this->options['vocabulary'] = $model->getCodeArray('Vocabulary', null, '1');
        $this->options['code'] = $model->getCodeArray('PolicyMarker', null, '1');
        $this->options['xml_lang'] = $model->getCodeArray('Language', null, '1');
    }
    
    public function setAttributes ($data) {
        $this->id = (isset($data['id']))?$data['id']:0;
        $this->vocabulary = (key_exists('@vocabulary', $data))?$data['@vocabulary']:$data['vocabulary'];
        $this->significance = (key_exists('@significance', $data))?$data['@significance']:$data['significance'];
        $this->code = (key_exists('@code', $data))?$data['@code']:$data['code'];
        $this->xml_lang = (key_exists('@xml_lang', $data))?$data['@xml_lang']:$data['xml_lang'];
        $this->text = $data['text'];
        
    }
    
    public function getOptions($name = NULL)
    {
        return $this->options[$name];
    }
    
    public function getObjectId()
    {
        return $this->objectId;
    }
    
    public function getValidator($attr)
    {
        return $this->validators[$attr];
    }
    
    public function validate()
    {
        $data['id'] = $this->id;
        $data['vocabulary'] = $this->vocabulary;
        $data['significance'] = $this->significance;
        $data['code'] = $this->code;
        $data['xml_lang'] = $this->xml_lang;
        $data['text'] = $this->text;
        
        parent :: validate($data);
    }
    
    public function getCleanedData(){
        $data = array();
        $data ['id'] = $this->id;
        $data['@vocabulary'] = $this->vocabulary;
        $data['@significance'] = $this->significance;
        $data['@code'] = $this->code;
        $data['@xml_lang'] = $this->xml_lang;
        $data['text'] = $this->text;
        
        return $data;
    }
}