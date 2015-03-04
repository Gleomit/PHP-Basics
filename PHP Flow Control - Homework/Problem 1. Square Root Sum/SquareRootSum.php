<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <table border="1">
            <tr>
                <th>Number</th>
                <th>Square</th>
            </tr>
            <?php
                $total = 0;
                for($i = 0; $i <= 100; $i += 2){?>
                    <tr>
                        <td><?php echo $i; $total += sqrt($i); ?></td>
                        <td><?php echo round(sqrt($i), 2);?></td>
                    </tr>
            <?php }?>
            <tr>
                <td>
                    <strong>Total:</strong>
                </td>
                <td>
                    <?php echo round($total, 2);?>
                </td>
            </tr>
        </table>
    </body>
</html>

