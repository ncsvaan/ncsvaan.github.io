<?php

function randLetter()
{
    $int = rand(0,25);
    $A_Z = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $rand_letter = $A_Z[$int];
    return $rand_letter;
}

function getNextLetter($randomOrder, $currentLetter) {
    $A_Z = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    
//    print '<br>'.'current letter coming in = '.$currentLetter;
     
    $nextLetter = '';
    if ($randomOrder) {
        $nextLetter = randLetter();
    } elseif ($currentLetter == '') {
        $nextLetter = 'A';
    } else {
//        print '<br>'.'got to last else with current letter = '.$currentLetter;
        $nextLetterIndex = strpos($A_Z, $currentLetter) + 1;
        if ($nextLetterIndex < 0 || $nextLetterIndex > 25) {
            $nextLetterIndex = 0;
        }
        $nextLetter = $A_Z[$nextLetterIndex]; 
//        print '<br>'.$nextLetterIndex.' = '.$nextLetter;
        
    }
     return $nextLetter;
}
