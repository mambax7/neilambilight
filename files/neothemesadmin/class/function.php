<?php

//物件類別 ($target)

/**
 * Class targetclass
 */
class targetclass
{
    /**
     * @param $a
     * @return string
     */
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

/**
 * Class tureclass
 */
class tureclass
{
    /**
     * @param $a
     * @param $b
     * @return string
     */
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
