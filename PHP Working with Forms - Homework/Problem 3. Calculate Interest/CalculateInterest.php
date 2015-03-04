<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <form method="post">
            <section><input type="text" name="amount"/></section>
            <section>
                <input type="radio" checked name="currency" value="usd"/><label>USD</label>
                <input type="radio" name="currency" value="eur"/><label>EUR</label>
                <input type="radio" name="currency" value="bgn"/><label>BGN</label>
            </section>
            <section>
                <label for="CIA">Compound Interest Amount</label><input type="text" name="CIA"/>
            </section>
            <section>
                <select name="periodTime">
                    <option value="6">6 Months</option>
                    <option value="12">1 Year</option>
                    <option value="24">2 Years</option>
                    <option value="60">5 Years</option>
                </select>
                <input type="submit" name="submit" value="Calculate"/>
            </section>
        </form>
        <?php
            if(isset($_POST["submit"]))
            {
                $currencyDisplay = [];
                $currencyDisplay["usd"] = "$";
                $currencyDisplay["eur"] = "€";
                $currencyDisplay["bgn"] = "BGN";
                $amount = (float)$_POST["amount"];
                $currency = $_POST["currency"];
                $compoundIA = (float)$_POST["CIA"] / 12;
                $periodOfTime = (int)$_POST["periodTime"];
                for($i = 1; $i <= $periodOfTime; $i++)
                {
                    $amount = $amount + $amount*$compoundIA / 100;
                }
                echo $currencyDisplay[$currency] . " " . number_format($amount, 2, '.', '');
            }
        ?>
    </body>
</html>