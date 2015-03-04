<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8"/>
        <title>CV Generator</title>
        <link rel="stylesheet" href="CVGeneratorCS.css"/>
    </head>
    <body>
    <form method="post">
        <fieldset>
            <legend>Personal Info</legend>
            <input type="text" name="firstName" placeholder="First Name">
            <input type="text" name="lastName" placeholder="Last Name">
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="phoneNumber" placeholder="Phone Number">
            <input type="radio" name="gender" value="female" id="female">
            <label for="female">Female</label>
            <input type="radio" name="gender" value="male" id="male" checked>
            <label for="male">Male</label>
            <p>Birth Date</p>
            <input type="text" name="birthDate" id="birthDate" placeholder="dd/mm/yyyy">
            <p>Nationality</p>
            <select name="nationality">
                <option value="Bulgarian">Bulgarian</option>
                <option value="American">Indian</option>
                <option value="African">African</option>
                <option value="American">American</option>
                <option value="Russian">Russian</option>
            </select>
        </fieldset>
        <fieldset>
            <legend>Last Work Position</legend>
            <label for="companyName">Company Name</label>
            <input type="text" name="companyName"/>
            <section>
                <label for="fromDate">From</label>
                <input type="text" name="fromDate" id="fromDate" placeholder="dd/mm/yyyy"/>
            </section>
            <section>
                <label for="toDate">To</label>
                <input type="text" name="toDate" id="toDate" placeholder="dd/mm/yyyy"/>
            </section>
        </fieldset>
        <fieldset>
            <legend>Computer Skills</legend>
            <p>Programming Languages</p>
            <section id="computerLanguages">
                <section>
                    <input type="text" name="computerLanguage[]" class="displayInline"/>
                    <select name="computerLanguage-level[]">
                        <option value="Beginner">Beginner</option>
                        <option value="Programmer">Programmer</option>
                        <option value="Ninja">Ninja</option>
                    </select>
                </section>
            </section>
            <section>
                <a id="removeLanguageComputer">Remove Language</a>
                <a id="addLanguageComputer">Add Language</a>
            </section>
        </fieldset>
        <fieldset>
            <legend>Other Skills</legend>
            <p>Languages</p>
            <section id="languages">
                <section>
                    <input type="text" name="language[]" class="displayInline"/>
                    <select name="language-Comprehension[]">
                        <option value="default">-Comprehension-</option>
                        <option value="beginner">beginner</option>
                        <option value="intermediate">intermediate</option>
                        <option value="advanced">advanced</option>
                    </select>
                    <select name="language-Reading[]">
                        <option value="default">-Reading-</option>
                        <option value="beginner">beginner</option>
                        <option value="intermediate">intermediate</option>
                        <option value="advanced">advanced</option>
                    </select>
                    <select name="language-Writing[]">
                        <option value="default">-Writing-</option>
                        <option value="beginner">beginner</option>
                        <option value="intermediate">intermediate</option>
                        <option value="advanced">advanced</option>
                    </select>
                </section>
            </section>
            <section>
                <a id="removeLanguage">Remove Language</a>
                <a id="addLanguage">Add Language</a>
            </section>
            <p>Driver's License</p>
            <label for="licenseB">B</label>
            <input type="checkbox" name="driveLicense[]" value="B" id="licenseB"/>
            <label for="licenseA">A</label>
            <input type="checkbox" name="driveLicense[]" value="A" id="licenseA"/>
            <label for="licenseC">C</label>
            <input type="checkbox" name="driveLicense[]" value="C" id="licenseC"/>
        </fieldset>
        <input type="submit" value="Generate CV" name="submitBtn"/>
    </form>
        <?php
            if(isset($_POST["submitBtn"]))
            {
                $firstName = $_POST["firstName"];
                $lastName = $_POST["lastName"];

                $companyName = $_POST["companyName"];
                $phoneNumber = $_POST["phoneNumber"];
                $email = $_POST["email"];
                if(preg_match_all('/[^\d+\+\-\s+]+/',$phoneNumber) <= 0 &&
                    (strlen($companyName) >= 2 && strlen($companyName) <= 20 && preg_match_all('/[^\w+\d+]+/',$companyName) <= 0)
                    && (strlen($firstName) >= 2 && strlen($firstName) <= 20 && preg_match_all('/[^a-zA-Z]+/',$firstName) <= 0)
                    && (strlen($lastName) >= 2 && strlen($lastName) <= 20 && preg_match_all('/[^a-zA-Z]+/',$lastName) <= 0)
                    && (preg_match_all('/\w+\@{1}\w+\.{1}[a-z]*/', $email) <= 0 && substr_count($email,'@') == 1 && substr_count($email,'.') == 1))
                {
                    $canProceed = true;
                    $languages = $_POST['language'];
                    for($i = 0; $i < count($languages); $i++)
                    {
                        if(!(strlen($languages[$i]) >= 2 && strlen($languages[$i]) <= 20 &&
                            preg_match_all('/[^a-zA-Z]+/',$languages[$i]) <= 0))
                        {
                            $canProceed = false;
                            break;
                        }
                    }

                    if($canProceed == true)
                    {
                        $gender = $_POST["gender"];
                        $nationality = $_POST["nationality"];
                        $birthDate = $_POST["birthDate"];
                        $fromDate = $_POST["fromDate"];
                        $toDate = $_POST["toDate"];
                        $computerLanguages = $_POST['computerLanguage'];
                        $computerLanguageLevels = $_POST['computerLanguage-level'];

                        $comprehensions = $_POST["language-Comprehension"];
                        $readings = $_POST["language-Reading"];
                        $writings = $_POST["language-Writing"];
                        ?>
                        <section class="CV">
                            <h1>CV</h1>

                            <table>
                                <tr><th colspan="2">Personal Info</th></tr>
                                <tr><td>First Name</td><td><?php echo htmlspecialchars($firstName); ?></td></tr>
                                <tr><td>Last Name</td><td><?php echo htmlspecialchars($lastName); ?></td></tr>
                                <tr><td>Email</td><td><?php echo htmlspecialchars($email); ?></td></tr>
                                <tr><td>Phone Number</td><td><?php echo htmlspecialchars($phoneNumber); ?></td></tr>
                                <tr><td>Gender</td><td><?php echo htmlspecialchars($gender); ?></td></tr>
                                <tr><td>Birth Date</td><td><?php echo htmlspecialchars($birthDate); ?></td></tr>
                                <tr><td>Nationality</td><td><?php echo htmlspecialchars($nationality); ?></td></tr>
                            </table><br/>

                            <table>
                                <tr><th colspan="2">Last Work Positions</th></tr>
                                <tr><td>Company Name</td><td><?php echo htmlspecialchars($companyName); ?></td></tr>
                                <tr><td>From</td><td><?php echo htmlspecialchars($fromDate); ?></td></tr>
                                <tr><td>To</td><td><?php echo htmlspecialchars($toDate); ?></td></tr>
                            </table><br/>

                            <table>
                                <tr><th colspan="2">Computer Skills</th></tr>
                                <tr><td>Programming Languages</td>
                                <td><table><tr><th>Language</th><th>Skill Level</th></tr>
                                <?php for($i = 0; $i < count($computerLanguages); $i++)
                                    echo '<tr><td>' . htmlspecialchars($computerLanguages[$i]) . '</td><td>' . $computerLanguageLevels[$i] . '</td></tr>'; ?>
                                </table></td></tr>
                                </table><br/>

                                <table>
                                <tr><th colspan="2">Other Skills</th></tr>
                                <tr><td>Languages</td>
                                <td><table><tr><th>Language</th><th>Comprehension</th><th>Reading</th><th>Writing</th></tr>
                                <?php for($i = 0; $i < count($languages); $i++)
                                    echo '<tr><td>' . htmlspecialchars($languages[$i]) . '</td><td>' . $comprehensions[$i]
                                        . '</td><td>' . $readings[$i] . '</td><td>' . $writings[$i] . '</td></tr>'; ?>
                                </table></td></tr>
                                <tr><td>Driver\'s license</td><td><?php echo htmlspecialchars(implode(', ', $_POST["driveLicense"])); ?></td></tr>
                            </table>

                        </section>
                    <?php }
                    else
                    {
                        echo '<br/><h1>THE INFORMATION GIVEN IS INVALID!</h1>';
                    }
                }
                else
                {
                    echo '<br/><h1>THE INFORMATION GIVEN IS INVALID!</h1>';
                }
            }
        ?>
        <script src="CVGeneratorJS.js"></script>
    </body>
</html>