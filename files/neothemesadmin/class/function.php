<?php

//物件類別 ($target)

class targetclass
{
    public function functionpublica($a)
    {
        switch ($a) {
            case "0":
                $target = '_self';
                break;

            case "1":
                $target = '_blank';
                break;
        }
        return $target;
    }
}

//物件類別 ($ture)

class tureclass
{
    public function functionpublicb($a, $b)
    {
        if ($a == $b) {
            $ture = ture;
        } else {
            $ture = '';
        }
        return $ture;
    }
}
