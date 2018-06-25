<?php
require_once('./classes/player.php');
    $play = null;
    do{
        system('clear');

        /**
         * Initialize Game
         */
        echo "\t\tPlease select what kind of player you will use \n\n";
        echo "\t(1) Write 1 to play guessing a number that computer choose \n\n";
        echo "\t(2) Write 2 to let computer guess your number \n\n";
        echo "Then press ENTER: ";
        
        //Read user type
        trim(fscanf(STDIN, "%d\n", $selectedType));

        switch($selectedType){
            
            case 1 :    
                        system('clear');
                        echo "\t\tComputer generating a random number between 1 and 100 \n\n";
                        sleep(3);
                        echo "\t\tNumber already generated, try to guess it: \n";
                        $userNumber = 0;
                        $player = new Player($selectedType);
                        $player->generateGoal();
                        do{
                            echo "\nPlease insert your number and press ENTER: \n";
                            trim(fscanf(STDIN, "%d\n", $userNumber));
                            $result = $player->playAsHuman($player->getGoal(),$userNumber);    
                        }while(!$result);
                        break;
            case 2 : 
                        system('clear');
                        echo "Now computer will try to guess a number you enter\n";
                        echo "So please enter the number you would like to computer try to guess \n";
                        echo "\t\n\nPlease remember it has to be a number between 1 and 100\n";
                        
                        trim(fscanf(STDIN, "%d\n", $userNumber));
                        $player = new Player($selectedType);
                        system('clear');

                        do{
                            $result = $player->setGoal($userNumber);
                        }while(!$result);
                        
                        echo "Great! Now computer will start to guess your number";
                        do{
                            $result = $player->playAsComputer();
                        }while(!$result);
                        
                        break;
            default: echo "\n Looks like you didn't choice correctly a player type, try again \n\n\n";
                        exit;
        }
        echo "\n If you would like to play again, please write 1 and press ENTER, otherwise just press ENTER: \n";
        trim(fscanf(STDIN, "%d\n", $play));
    }while($play == 1);

?>