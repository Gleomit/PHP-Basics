<!DOCTYPE html>
<html>
<head>

</head>
<body>
<form action="StringModifier.php" method="post">
    <input type="text" name="inputString"/>
    <input type="radio" name="option" id="palindrome" value="palindrome" checked/>
    <label for="palindrome">Check Palindrome</label>
    <input type="radio" name="option" id="Reverse String" value="reverse"/>
    <label for="reverse">Reverse String</label>
    <input type="radio" name="option" id="split" value="split"/>
    <label for="split">Split</label>
    <input type="radio" name="option" id="hash" value="hash"/>
    <label for="hash">Hash String</label>
    <input type="radio" name="option" id="shuffle" value="shuffle"/>
    <label for="shuffle">Shuffle String</label>
    <input type="submit" value="Submit" name="submitBTN"/>
</form>
    <?php
    if(isset($_POST["submitBTN"]))
    {
        $theInput = $_POST["inputString"];
        $chosenOption = $_POST["option"];
        if($chosenOption == "palindrome")
        {
            if($theInput == join("", array_reverse(str_split($theInput))))
                echo htmlspecialchars($theInput) . " is palindrome!";
            else
                echo htmlspecialchars($theInput) . " is not a palindrome!";
        }
        elseif($chosenOption == "reverse")
        {
            echo htmlspecialchars(join("", array_reverse(str_split($theInput))));
        }
        elseif($chosenOption == "split")
        {
            echo htmlspecialchars(join(" ", str_split($theInput)));
        }
        elseif($chosenOption == "hash")
        {
            echo htmlspecialchars(crypt($theInput, 'tempSalt'));
        }
        elseif($chosenOption == "shuffle")
        {
            echo htmlspecialchars(str_shuffle($theInput));
        }
    }
    ?>
</body>
</html>