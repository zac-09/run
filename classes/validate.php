<?php 


class validate{

private $_errors = array(),
        $_passed = false,
        $_db = null;


        public function __construct()
        {
            $this->_db = DB::getinstance();
        }


        public function check ($source, $items = array())
        {
             foreach ($items as $item => $rules)
            {
                foreach($rules as $rule => $rule_value)
                {
                    $value = trim($source[$item]);

                    if( $rule === 'required' && empty($value))
                    {
                        $this->addError("{$item } is required");

                    }else if(!empty($value)){
                        switch ($rule){
                            case 'min':
                            if(strlen($value) < $rule_value){
                            $this->addError("a min length of {$rule_value} is required");

                            }
                            break;

                            case 'max':
                            if(strlen($value) >$rule_value){
                                 $this->addError("a maximun length of {$rule_value} is required");
    
                                }
                            break;
                            case 'unique':
                            $dbe = new DB();
                            $check = $dbe->get($rule_value,array($item, '=', $value));

                            if($check->count()){

                                $this->addError("{$item} already exists");
                            }
                            break;


                            case 'matches':
                            if($value != $source[$rule_value]){
                                $this->addError("{$rule_value} does not match {$item}");

                            }
                            break;
                            
                            


                        }
                    }

                }
            }

            if(empty($this->error())) {

              return  $this->_passed = true;
            }
            return $this; 

        }

        public function addError($error){
        $this->_errors[]= $error;
        }

        public function error(){
            return $this->_errors;



        }


        public function passed(){
            return $this->_passed;
        }












}




?>