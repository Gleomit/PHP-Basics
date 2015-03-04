<?php
    $n = 145;
    if($n > 102)
    {
        for ($i = 100; $i <= $n; $i++) {
            if ($i <= 999)
                $temp = number_format($i);
            else
                break;
            if (isNRD($temp))
                echo $i . " ";
        }
    }
    else
        echo 'no';

    function isNRD($num)
    {
        if ($num[0] != $num[1] && $num[0] != $num[2] && $num[1] != $num[2])
            return true;
        else
            return false;
    }
?>