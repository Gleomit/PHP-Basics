<!DOCTYPE html>
<html>
    <head>
        <title>Stundet Sorting</title>
        <link rel="stylesheet" href="StundetSortingCSS.css"/>
    </head>
    <body>
        <form action="StudentSorting.php" method="post">
            <table id="theTable">
                <tr>
                    <th>First name:</th>
                    <th>Second name:</th>
                    <th>Email:</th>
                    <th>Exam score:</th>
                    <th></th>
                </tr>
                </tr>
            </table>
            <a id="add" class="addRemove">+</a>
            <label for="option">Sort by:</label>
            <select name="option">
                <option value="option-score">Exam score</option>
                <option value="-option-firstName">First name</option>
                <option value="option-lastName">Last name</option>
                <option value="option-email">Email</option>
            </select>
            <label for="order">Sort by:</label>
            <select name="order">
                <option value="descending">Descending</option>
                <option value="ascending">Ascending</option>
            </select>
            <input type="submit" value="SUBMIT" name="submit"/>
        </form>
        <script src="StudentSortingJS.js"></script>
        <?php
        if(isset($_POST["submit"]))
        {
            $users = [];
            $averageScore = 0;
            $max =  max(count($_POST["scores"]), max(count($_POST["email"]), max(count($_POST["firstName"]), count($_POST["lastName"]))));
            $canProceed = true;
            for($i = 0; $i < $max;$i++)
            {
                if(preg_match_all('/[^a-zA-Z]+/', $_POST["firstName"][$i]) <= 0 &&
                    strlen($_POST["firstName"][$i]) >= 2 && strlen($_POST["firstName"][$i]) <= 20
                    && strlen($_POST["lastName"][$i]) >= 2 && strlen($_POST["lastName"][$i]) <= 20 && preg_match_all('/[^a-zA-Z]+/',$_POST["lastName"][$i]) <= 0
                    && $_POST["scores"][$i] >= 0 && (substr_count($_POST["email"][$i],'@') == 1 &&
                        substr_count($_POST["email"][$i],'.') == 1 && preg_match_all('/[^a-zA-Z\@\.]+/', $_POST["email"][$i]) <= 0))
                {
                    $users[$i] = [];
                    $users[$i]["firstName"] = $_POST["firstName"][$i];
                    $users[$i]["lastName"] = $_POST["lastName"][$i];
                    $users[$i]["email"] = $_POST["email"][$i];
                    $users[$i]["score"] = $_POST["scores"][$i];
                    $averageScore += $users[$i]["score"];
                }
                else
                {
                    $canProceed = false;
                    break;
                }
            }

            if($canProceed == true)
            {
                $sortOption = $_POST["option"];
                $orderType = $_POST["order"];
                $averageScore = number_format($averageScore / count($users), 0);
                if ($sortOption == "option-score") {
                    usort($users, function ($first, $second) {
                        if($_POST["order"] == "descending")
                            return ($first["score"] - $second["score"]) * -1;
                        else
                            return ($first["score"] - $second["score"]);
                    });
                } elseif ($sortOption == "option-firstName") {
                    usort($users, function ($first, $second) {
                        if($_POST["order"] == "descending")
                            return strcmp($first["firstName"], $second["firstName"]) * -1;
                        else
                            return strcmp($first["firstName"], $second["firstName"]);
                    });
                } elseif ($sortOption == "option-lastName") {
                    usort($users, function ($first, $second) {
                        if($_POST["order"] == "descending")
                            return strcmp($first["lastName"], $second["lastName"]) * -1;
                        else
                            return strcmp($first["lastName"], $second["lastName"]);
                    });
                } elseif ($sortOption == "option-email") {
                    usort($users, function ($first, $second) {
                        if($_POST["order"] == "descending")
                            return strcmp($first["email"], $second["email"]) * -1;
                        else
                            return strcmp($first["email"], $second["email"]);
                    });
                }
                ?>
                <br><br>
                <table border='1' id="result">
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Exam score</th>
                </tr>
                <?php for ($i = 0; $i < count($users); $i++) {
                    echo "<tr><td>" . $users[$i]["firstName"] . "</td><td>" . $users[$i]["lastName"] .
                        "</td><td>" . $users[$i]["email"] . "</td><td>" . $users[$i]["score"] . "</td></tr>";
                } ?>
                <tfoot>
                <tr>
                    <td colspan='3'>Average score: </td>
                    <td><?php $averageScore ?></td>
                </tr>
                </tfoot>
                </table>
            <?php }
            else
                echo "<br><br><h1>You\'ve entered invalid data somewhere in the fields!</h1>";
        }
        ?>

    </body>
</html>