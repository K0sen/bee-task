<?php

namespace app\components;

class Model
{

    /**
     * Register error handlers
     * key is a name of a rule parameter so in rule [['name'], 'length' => 20] 'length' is an identifier for handler
     * @var array
     */
    private $methods = [
        'require' => 'checkRequire',
        'length' => 'checkLength',
        'type' => 'checkType',
    ];
    public $errors = [];

    /**
     * Check if fields satisfying the rules
     * @var $this
     * @return mixed
     */
    public function validate()
    {
        $rules = $this->rules();

        foreach($rules as $rule) {
            //shift field names that specified in rule so in array remains only rule
            $subs = array_shift($rule);
            foreach ($subs as $sub) {
                //search text by name of the field and call method by key of the rule
                //so in rule 'length' => 20 we will search in $methods array a handler with key 'length'
                $text = $this->$sub;
                $method = $this->methods[key($rule)];
                $this->$method($sub, $text, $rule);
            }
        }
        return $this->hasErrors();
    }

    /**
     * Sets rules for form fields
     * to specify a rule write an array like [['email'], 'length' => 50]
     * first param is a field name/names in array like ['email'] or ['name', 'email', 'text', 'filename']
     * second param is name of the rule as a key and it parameter as limiter like 'length' => 50 - it may means that limit of field is 50 characters
     * to set a rule you need to make sure that it register in $methods array
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * @param $sub - name of the field
     * @param $text - text of the field
     * @param $rule
     */
    public function checkRequire($sub, $text, $rule)
    {
        if( $rule['require'] == 'required' && $text == '') {
            $this->errors[$sub][] = "Field $sub must be not empty";
        }
    }

    /**
     * @param $sub
     * @param $text
     * @param $rule
     */
    public function checkLength($sub, $text, $rule)
    {
        if( strlen($text) > $rule['length'] ) {
            $this->errors[$sub][] = "Maximum length exceeded ({$rule['length']}/{$rule['length']})";
        }
    }

    /**
     * @param $sub
     * @param $text
     * @param $rule
     */
    public function checkType($sub, $text, $rule)
    {
        if( !in_array($text, $rule['type']) ) {
            $this->errors[$sub][] = "Illegal type '$text'";
        }
    }

    /**
     * Check for errors exist
     * @return bool
     */
    public function hasErrors()
    {
        return (!$this->errors);
    }
}
