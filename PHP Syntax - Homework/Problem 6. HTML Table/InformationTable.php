<!DOCTYPE html>
<html>
    <head>
        <title>Information title</title>
        <style>
            table{
                border: 1px solid black;
            }
            td:last-child{
                text-align: right;
            }
            td:first-child{
                background-color: #ff8c00;
            }
        </style>
    </head>
    <body>
        <?php
        $name = 'Gosho';
        $phone_number = '0882-321-423';
        $age = 24;
        $address = 'Hadji Dimitar';
        ?>
        <table>
        <tr>
            <td>Name</td>
            <td><?php echo htmlspecialchars($name); ?></td>
        </tr>
        <tr>
            <td>Phone number</td>
            <td><?php echo htmlspecialchars($phone_number); ?></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><?php echo htmlspecialchars($age); ?></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><?php echo htmlspecialchars($address); ?></td>
        </tr>
        </table>
    </body>
</html>


