<!DOCTYPE html>			<!--declare that webpage is of type html5-->

<html lang="en">
<!--Head of code-->
<head>
<link rel="stylesheet" href="CSS/finalProjectCSS.css">
<title>Javascript Final Project</title>
<script src="chance.js"></script>
</head>

<!--Body of code-->
<body>
	<form action="phpHangman.php" method="post" id="hman">
        <?php
            if (isset($_POST["btns"])){
                $hiddenVal = $_POST["hiddenGuess"];
                // $answerVal = $_POST["answer"];
                $choice = $_POST["btns"];
                $currCount = $_POST["counter"];
                
                // change answer Val for working with hiddenVal
                // if(stripos($hiddenVal, "*") === false){
                //     for($i = 0; $i < strlen($answerVal); $i++){
                //         $answerVal{$i} = "*";
                //     }
                // }
                
                // ensure characters in value are updated based on button clicked
                if(((strlen($hiddenVal) - substr_count($hiddenVal, "*")) > 1) and ($currCount < 14)){
                    if((stripos($hiddenVal, $choice)) !== false){
                        // $answerVal{stripos($hiddenVal, $choice)} = $choice;
                        // var_dump($answerVal);
                        // var_dump($choice);
//                        var_dump($hiddenVal);
                        
                        trim($hiddenVal);
                        $hiddenVal{stripos($hiddenVal, $choice)} = "*";
                        echo "<p>You chose a valid letter, only ".(strlen($hiddenVal) - substr_count($hiddenVal, "*"))." left to go!</p>";
                    }
                    else{
                        echo "<p>Wrong choice</p>";
                        $currCount += 1;
                    }
                }
                elseif($currCount >= 14){
                    $currCount = 15;
                    echo "<p>You Lose</p>";
                }
                else{
                    echo "<p>You Win</p>";
                }
                // ensure hidden value is retained each webpage refresh
                $string = 'HIMG/hangman'.$currCount.'.jpg';
                echo "<input type='hidden' name='hiddenGuess' value='".$hiddenVal."'>";
                // echo "<input type='hidden' name='answer' value='".$answerVal."'>";
                echo "<input type='hidden' name='counter' value='".$currCount."'>";
            }
            else{
            ?>
                <!--JavaScript code-->
                <script type="text/javascript">
                    var temp = chance.state({territories: true, full: true}).toLowerCase();	// set state value
                    // create input value for transfer with php on input
//                    var ans = document.createElement("INPUT");
//                    ans.type = 'hidden';
//                    ans.name = 'answer';
//                    ans.value = temp;
//                    document.getElementById("hman").appendChild(ans);

                    // store hidden value and append to form
                    var hide = document.createElement("INPUT");
                    hide.type = 'hidden';
                    hide.name = 'hiddenGuess';
                    hide.value = temp;
                    document.getElementById("hman").appendChild(hide);
                    // document.write(temp);
                </script>
            <?php
            $string = 'HIMG/hangman0.jpg';
            $curr = 0;      // counter for images and turns
            echo "<input type='hidden' name='counter' value='".$curr."'>";
            }
            // create buttons for each possible input
            $asciiVal = 65;     // for converting to ascii
            for ($count = 0; $count <26; $count++) {
                echo "<input type='submit' value='".chr($count + $asciiVal)."' size=2 maxlength=2 name=btns>";      // buttons for submission
                if($count % 10 === 0 and $count !== 0){
                    echo "<br>";
                }
            }
        ?>
    </form><br>
    <img src='<?php echo $string;?>' border = 0 alt="Hangman">
</body>

</html>
