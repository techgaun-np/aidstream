<?php
class Iati_WEP_Activity_Elements_DefaultAidType extends Iati_WEP_Activity_Elements_ElementBase
{
    protected $attributes = array('id', 'code', 'text', 'xml_lang');
     protected $code;
     protected $text;
     protected $xml_lang;
     protected $id = 0;
     protected $options = array();
     protected $validators = array(
                                'code' => array('NotEmpty',)
                            );
     protected $attributes_html = array(
        'id' => array(
                    'name' => 'id',
                    'html' => '<input type= "hidden" name="%(name)s" value= "%(value)s" />' 
        ),
        'code' => array(
            'name' => 'code',
            'label' => 'Aid Type Code',
            'html' => '<select name="%(name)s" %(attrs)s>%(options)s</select><div class="help default_aid_type-code"></div>',
            'options' => '',
            'attrs' => array('class' => array('form-select'))
        ),
        'text' => array(
            
            'name' => 'text',
            'label' => 'Text',
            'html' => '<textarea rows="2" cols="20" name="%(name)s" %(attrs)s>%(value)s</textarea><div class="help default_aid_type-text"></div>',
            'attrs' => array('class' => array('form-text'))
        ),
        'xml_lang' => array(
            'name' => 'xml_lang',
            'label' => 'Language',
            'html' => '<select name="%(name)s" %(attrs)s>%(options)s</select><div class="help default_aid_type-xml_lang"></div>',
            'options' => '',
            'attrs' => array('class' => array('form-select'))
        )                   
     );
     protected $className = "DefaultAidType";
     
     protected static $count = 0;
     protected $objectId;
     protected $error = array();
     protected $hasError = false;
     protected $multiple = false;

    public function __construct($id = 0)
    {
//        $this->checkPrivilege();
        parent::__construct();
        $this->objectId = self::$count;
        self::$count += 1;
        $this->setOptions();
    }
     
    
    public function setOptions()
    {
        $model = new Model_Wep();
        
        $this->options['code'] = $model->getCodeArray('AidType', null, '1');
        $this->options['xml_lang'] = $model->getCodeArray('Language', null, '1');
    }
    
    public function setAttributes ($data) {
        $this->id = (key_exists('id', $data))?$data['id']:0;
        $this->code = (key_exists('@code', $data))?$data['@code']:$data['code'];
        $this->xml_lang = (key_exists('@xml_lang', $data))? $data['@xml_lang'] : $data['xml_lang'];
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
        $data['code'] = $this->code;
        $data['xml_lang'] = $this->xml_lang;
        $data['text'] = $this->text;
        parent::validate($data);
    }
    
    public function getCleanedData(){
        $data = array();
        $data ['id'] = $this->id;
        $data['@code'] = $this->code;
        $data['@xml_lang'] = $this->xml_lang;
        $data['text'] = $this->text;
        //print_r($data);exit;
        return $data;
    }
    
}