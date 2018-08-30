<?php

    function letterToNumber($letter){
        $letterIntoAscii = ord(strtolower($letter)) - 97;
        return $letterIntoAscii;
    }
    
    function numberToLetter($number){
        $letter = chr(97 + $number);
        return $letter;
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        
        <style> @import url("css/style.css");</style>
       
    </head>
    <body >
         <?php
            
            $inverseOfaValue = $_GET['AInverse'];
            $bValue = $_GET['B'];
            $messageToDecode = $_GET['message'];
            echo "Your message to decode is : " . $messageToDecode . "<br>";
            echo "Inverse of A is " . $inverseOfaValue . "<br>";
            echo "B is " . $bValue . "<br>";
            
            echo "<br> <br>";
            $messageAsString = str_split($messageToDecode);
            $decodedArray = array();
            foreach ($messageAsString as $values){
                if($values == ' '){
                    array_push($decodedArray, " ");
                } else{
                    $let = letterToNumber($values);
                    $num = $let - $bValue;
                    $number = $inverseOfaValue * $num;
                    $final = $number % 26;
                    if ($final < 0){
                        $final = $final + 26;
                    }
                    $decodedLetter = numberToLetter($final);
                    echo $values . " turns into " . $let . " as a number <br>";
                    echo $inverseOfaValue . "(" . $let . "-" . $bValue . ") = " . $number . "<br>";
                    echo $number . "mod(26) = " . $final . "<br>";
                    echo $final . " as a letter is " . $decodedLetter . "<br>";
                    
                    echo "<br>";
                    array_push($decodedArray, $decodedLetter);
                    //echo $decodedLetter;
                }
            }
            echo "<br> <br> <br>";
            echo "Your message decoded is : ";
            foreach($decodedArray as $letter){
                echo $letter;
            }
    
        ?>
        
    </body>
    
</html>