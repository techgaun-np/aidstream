<?php
class Iati_WEP_Activity_Elements_DocumentLink_Language extends 
                                    Iati_WEP_Activity_Elements_DocumentLink
{
    protected $attributes = array('id', 'text',);
    protected $text;
    protected $id = 0;
    protected $options = array();
    protected $className = 'Language';
    protected $validators = array();
    protected $attributes_html = array(
                'id' => array(
                    'name' => 'id',
                    'html' => '<input type= "hidden" name="%(name)s" value= "%(value)s" />' 
                ),
                'text' => array(
                    'name' => 'text',
                    'label' => 'Text',
                    'html' => '<select name="%(name)s" %(attrs)s>%(options)s</select><div class="help document_link-language-text"></div>',
                    'options' => '',
                    'attrs' => array('class' => array('form-select'))
                ),
    );
    
    protected static $count = 0;
    protected $objectId;
    protected $error = array();
    protected $hasError = false;
    protected $multiple = true;
    protected $required = false;
    protected $isAttributeSet = false;
    
    public function __construct()
    {
        $this->objectId = self::$count;
        self::$count += 1;
        $this->setOptions();
    }
    
    public function setOptions()
    {
        $model = new Model_Wep();
        
        $this->options['text'] = $model->getCodeArray('Language', null, '1');
    }
    
    public function setAttributes ($data) {
        $this->id = (key_exists('id', $data))?$data['id']:0;
        $this->text = $data['text'];
        $this->attributeState();
    }
    
    public function attributeState()
    {
        foreach($this->attributes as $attribute){
            if($this->$attribute){
                $this->isAttributeSet = true;
                break;
            }
        }
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
        $data['text'] = $this->text;
         
        foreach($data as $key => $eachData){
            
            if(empty($this->validators[$key])){ continue; }
            
            if($this->required){
                if((in_array('NotEmpty', $this->validators[$key]) == false) && (empty($eachData))){
                    continue;
                }
                
            }else{
                if(!$this->isAttributeSet){
                    continue;
                }else{
                    if((in_array('NotEmpty', $this->validators[$key]) == false) && (empty($eachData))){
                        continue;
                    }
                }
            }
            
            foreach($this->validators[$key] as $validator){
                $string = "Zend_Validate_". $validator;
              $validator = new $string();
              $error = '';
              if(!$validator->isValid($eachData)){
                $error = isset($this->error[$key])?array_merge($this->error[$key], $validator->getMessages())
                                :$validator->getMessages();
                  $this->error[$key] = $error;
                  $this->hasError = true;
  
              }  
            }
        }
    }
    
    public function getCleanedData(){
        $data = array();
        $data ['id'] = $this->id;
        $data['text'] = $this->text;
        
        return $data;
    }
    
    
}