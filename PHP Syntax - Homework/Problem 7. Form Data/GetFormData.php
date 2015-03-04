<!DOCTYPE html>
<html>
    <head>
        <title>Form Data</title>
    </head>
    <body>
        <form method="post">
            <section>
                <input type="text" name="name" placeholder="Name">
            </section>
            <section>
                <input type="text" name="age" placeholder="Age">
            </section>
            <section>
                <input type="radio" value="male" name="gender">
                <label for="male">Male</label>
            </section>
            <section>
                <input type="radio" value="female" name="gender">
                <label for="female">Female</label>
            </section>
            <input type="submit" name="sbm" value="Submit">
        </form>
        <?php
        if(isset($_POST["sbm"]))
        {
            if(isset($_POST["gender"]) && isset($_POST["name"]) && isset($_POST["age"]))
                echo "<br/><p>My name is " . htmlspecialchars($_POST["name"]) . ". I am " .
                    htmlspecialchars($_POST["age"]) . " years old. I am " . $_POST["gender"] .  ".</p>";
            else
                echo "<br/>Some of the fields are left blank.";
        }
        ?>
    </body>
</html>