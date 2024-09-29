<?php
          
          $a = 10;
          $b = 9;
          $c = 6;
       
        // Si el número 1 es más pequeño o igual que el número 2 y el número 3
        if($a <= $b && $a <= $c)
        {
            if ($b <= $c)
            {
                echo "$a $b $c";
            }
            else
            {
                echo "$a $c $b";
            }
        }
        
        // Si el número 2 es más pequeño o igual que el número 1 y el número 3
        if($b <= $a && $b <= $c)
        {
            if ($a <= $c)
            {
                echo "$b $a $c";
            }
            else
            {
                echo "$b $c $a";
            }
        }
        
        // Si el número 3 es más pequeño o igual que el número 1 y el número 2
        if($c <= $a && $c <= $b)
        {
            if ($a <= $b)
            {
                echo "$c $a $b";
            }
            else
            {
                echo "$c $b $a";
            }
        }

        ?>