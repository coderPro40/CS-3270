<!DOCTYPE html>
<html>
    <head>
        <title>Evil Hangman</title>
    </head>
    <body>
    <?php
        $string = 'HIMG/hangman0.jpg';
        $hiddenVal = 0;
        if(isset($_POST["guess"])){ // if guess is set
            // get hidden value
            $hiddenVal = $_POST["hidRong"];

            // after getting hidden val, decide image based on current value
            if (empty($hiddenVal)) {    // for first submit click
            //  echo "<img src='HIMG/hangman1.jpg' border = 0>";
                $string = 'HIMG/hangman1.jpg';
                $hiddenVal = 1;
            }
            else if($hiddenVal > 0 and $hiddenVal < 15) {   // for values past first submit click
                $string = 'HIMG/hangman'.$hiddenVal.'.jpg'; // string value of next img
                $hiddenVal += 1;                            // increment hidden value
            }
            else {
                $string = 'HIMG/hangman15.jpg';
            }
         }
    ?>
    <form action="hman0.php" method="post" name="hman">
        Guess: <input type="text" name="guess" ><br>
        <?php
            // create input for turns greater than first
            if($hiddenVal >= 1){
        ?>
            <input type='hidden' name='hidRong' value="<?php echo $hiddenVal;?>" />
        <?php
            }
            // create input for first turn
            else {
        ?>
            <input type='hidden' name='hidRong' value="0" />
        <?php
            }
        ?>
        <input type="submit" value="submit">
    </form><br>
    <img src='<?php echo $string;?>' border = 0 alt="Hangman">
    </body>
</html>