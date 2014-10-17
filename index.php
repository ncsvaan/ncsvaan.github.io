
<?php
include 'functions.php';
//include 'letterToPixArray.php';
include 'letterToPixListArray.php';

$randomLetters = FALSE;
$displayUpperAndLowerCase = FALSE;

$letterToDisplay='';
$inputLetter='';
$picName='';

//print_r($letterToPix);
//print_r($_REQUEST);

 
if (isset($_REQUEST['letterOnDisplay'])) {
        $letterOnDisplay = \strval($_REQUEST['letterOnDisplay']);
        $letterOnDisplay = strtoupper($letterOnDisplay[0]);
} 
elseif ($randomLetters) {
    $letterOnDisplay = '';
} else {
    $letterOnDisplay = 'A';
}

if (isset($_REQUEST['inputLetter'])) {
    $inputLetter = strtoupper(\strval($_REQUEST['inputLetter']));
} else {
    $inputLetter = '';
}

//print '<br>'.'letter on display = '.$letterOnDisplay ;
//print '<br>'.'input letter = .'.$inputLetter .'.';   

if ($inputLetter == ' ' || $letterOnDisplay == '') {
    $letterOnDisplay = strtoupper(getNextLetter($randomLetters, $letterOnDisplay));  
} 
//print '<br>'.'NEW letter on display = '.$letterOnDisplay ;

if ($displayUpperAndLowerCase) {
        $letterOnDisplay .= strtolower($letterOnDisplay);
    }
$letterAndPicHtml = $letterOnDisplay;
    
if ($inputLetter == $letterOnDisplay[0]) {
    $picIndexToDisplay = array_rand($letterToPixList[$letterOnDisplay[0]]);
    $picName = ucwords($letterToPixList[$letterOnDisplay[0]][$picIndexToDisplay]);
    $letterAndPicHtml = $letterOnDisplay.
            "</td><td><img src='../pix/".$picName.".jpg' height='300px' />";
//    print '<br>'.'pic filename string = '.$picToDisplay;
} 

//print '<br>'.'letter on display = '.$letterOnDisplay ;
//print '<br>'.'input letter = '.$inputLetter ;   
    
?>

<head>
<meta charset=utf-8 />
<title>Letters Game</title>
<script>
function SelectText () {     
        var input = document.getElementById("inputLetter");
            input.focus();
            input.toUpperCase();
            input.setSelectionRange(0,50);
}
</script>
<script>
function MySubmitText () {     
         var form = document.getElementById("gameForm");
             form.submit();
}
</script>
</head>

<form method='post' id='gameForm' action='index.php'>
    
    <input type='hidden' name='letterOnDisplay'   value='<?= $letterOnDisplay ?>' />
   
    <table border='1' >
        <tr>
            <td style="font-size:288;font-family: arial; " rowspan="2" >
                <?= $letterAndPicHtml ?>
            </td>
        </tr>
        <tr>
            <td style="text-align:center; font-size: 35; font-family: arial" >
                <?= $picName ?></td>
        </tr>
    </table>
    <input type='text' id='inputLetter' name='inputLetter' autofocus="TRUE" 
                       onkeypress="return MySelectText()" 
                       onkeydown="return MySelectText()" 
                       oninput="return MySubmitText()" 
                       value='' size='1' /> 
</form>



