<?php 
    class Player{
        private $type;
        private $goal;
        private $min = 0, $max = 100;

        public function __construct($type){
            $this->type = $type; //There will be human and computer types
            $this->type = 0;
        }

        public function getType(){
            return $this->type;
        }

        public function playAsHuman($goal, $userNumber){
            if(is_int($userNumber)){
                if($goal == $userNumber){
                    echo "\nGreat you found it!!!\n";
                    return true;
                }
                if($userNumber < $goal){
                    echo "\nComputer number is higher \n";
                    return false;
                }else{
                    echo "\nComputer number is lower \n";
                    return false;
                }
            }else{
                echo "\nYou have to use only integer numbers to play";
                return false;
            }
            
        }

        public function playAsComputer(){
            $response = 0;
            $try = mt_rand($this->min, $this->max);
            echo "\t\t\t\n I think it could be: ".$try."\n";
            if($this->goal == $try){
                echo "\nGreat you found it!!!\n";
                return true;
            }

            do{
                echo "\nIs your number higher or lower:\n";
                echo "\n(1) Press 1 and Enter for higher\n";
                echo "\n(2) Press 2 and Enter for lower\n";
                trim(fscanf(STDIN, "%d\n", $response));
                echo $response;
            }while($response <= 0 && $response >= 3);

            if($response == 1 || $response == 2){
                if($response == 1){
                    $this->min = $try;
                    return false;
                }else{
                    $this->max = $try;
                    return false;
                }
            }
        }

        public function generateGoal(){
            $this->goal = mt_rand(1,100);
        }

        public function getGoal(){
            return $this->goal;
        }

        public function setGoal($goal){
            if($goal >= 1 || $goal <= 100){
                $this->goal = $goal;
                return true;
            }else{
                echo "Please try again, it has to be a number between 1 and 100";
                return false;
            }
            
        }
    }
?>