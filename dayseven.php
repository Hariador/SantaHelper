<?php {
    /**
     * Created by PhpStorm.
     * User: jon_000
     * Date: 12/7/2015
     * Time: 10:00 PM
     */
    class Instruction
    {

        protected $type = null;
        protected $operand = null;
        public $label = null;
        public $value1 = null;
        protected $value2 = null;

        public function __construct($instruction_text)
        {
            if (count($instruction_text) == 3) {
                $this->ParseInput($instruction_text);
            }
            if (count($instruction_text) == 4) {
                $this->ParseNot($instruction_text);

            }
            if (count($instruction_text) == 5) {
                $this->ParseEval($instruction_text);
            }
            if($this->label == 'lx')
                printf($this->toString(). "\n");
        }

        public function Evalu()
        {

            printf($this->toString()."\n");
            if($this->type === 0) {
                if (!is_numeric($this->value1)) {
                    $this->value1 = Find($this->value1);
                }
            }
            if ($this->type === 1) {
                if (!is_numeric($this->value1)) {
                    $this->value1 = Find($this->value1);
                }
                $this->value1 = ~$this->value1;
            }
            if ($this->type === 2) {
                if (!is_numeric($this->value1)) {

                    $this->value1 = Find($this->value1);
                }
                if (!is_numeric($this->value2)) {

                    $this->value2 = Find($this->value2);
                }
                switch ($this->operand) {
                    case 'AND':
                        $this->value1 = $this->value1 & $this->value2;
                        break;
                    case 'OR':
                        $this->value1 = $this->value1 | $this->value2;
                        break;
                    case 'LSHIFT':
                        $this->value1 = $this->value1 << $this->value2;
                        break;
                    case 'RSHIFT':
                        $this->value1 = $this->value1 >> $this->value2;
                        break;
                    case 'XOR':
                        $this->value1 = $this->value1 ^ $this->value2;
                        break;
                }
            }
            $this->type = 0;
            $this->value2 = null;
            $this->operand = null;
            printf($this->toString()."\n");
            return $this->value1;
        }

        public function toString()
        {
            global $depth;
            $i_string = "";
            for($i = 0; $i < $depth; $i++){
                $i_string = $i_string ."-" ;
            }
            $i_string = $i_string. $this->label . " = " . $this->value1 . " " . $this->operand . " " .$this->value2;
            return $i_string;
        }

        protected function ParseInput($instruction)
        {
            $this->type = 0;
            $this->label = $instruction[2];
            $this->value1 = $instruction[0];

        }

        protected function ParseNot($instruction)
        {
            $this->type = 1;
            $this->label = $instruction[3];
            $this->operand = $instruction[0];
            $this->value1 = $instruction[1];
        }

        protected function ParseEval($instruction)
        {
            $this->type = 2;
            $this->label = $instruction[4];
            $this->operand = $instruction[1];
            $this->value1 = $instruction[0];
            $this->value2 = $instruction[2];

        }
    }

function Find($label)
    {
        global $depth;
        global $table;
        $depth++;
        $value = 0;
        foreach ($table as $instruction) {
            if ($instruction->label == $label) {
                $value = $instruction->Evalu();
                break;
            }
        }
        $depth--;
        return $value;
    }

    /**
     * Instructions table
     * Type 0 = input value; 1 = NOT op; 2 = evaluable
     * INPUT = VALUE|LABLE
     * NOT = VALUE1| LABLE
     * EVAL = OPERAND | VALUE1 |  VALUE2 | LABEL
     *
     * TYPE|LABEL|OP|VALUE1|VALUE2
     */

    $table = [];
    $depth = 0;
    $input = fopen('7.input', 'r');
    while ($line = fgets($input)) {
        $instruction = explode(' ', trim($line));
        array_push($table, new Instruction($instruction));
    }

    $a = 0;
    foreach ($table as $instruction) {
        if($instruction->label == 'a') {
            $a = $instruction->Evalu();
            printf($instruction->toString() . "\n");
        }
    }

    printf("RESET\n\n");
    $table = [];
    fclose($input);
    $input = fopen('7.input','r');
    while ($line = fgets($input)) {
        $instruction = explode(' ', trim($line));
        array_push($table, new Instruction($instruction));
    }
    foreach($table as $instruction) {
        if($instruction->label == 'b')
            $instruction->value1 = $a;
    }
    foreach ($table as $instruction) {
        if($instruction->label == 'a') {
            $a = $instruction->Evalu();
            printf($instruction->toString() . "\n");
        }
    }
}



