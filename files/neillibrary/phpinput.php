<?php

//input物件
//text
/**
 * @param string $class
 * @param string $name
 * @param string $value
 * @param string $placeholder
 * @param string $id
 * @return string
 */
function inputtext($class = "", $name = "", $value = "", $placeholder = "", $id = "")
{
    $inputtext = "<input type='text' id='" . $id . "' class='" . $class . " form-control' name='" . $name . "'  value='" . $value . "' placeholder='" . $placeholder . "'>";
    return $inputtext;
}

//textarea
/**
 * @param string $class
 * @param string $name
 * @param string $id
 * @param string $rows
 * @param string $cols
 * @param string $value
 * @return string
 */
function inputtextarea($class = "", $name = "", $id = "", $rows = "", $cols = "", $value = "")
{
    $inputtextarea = "<textarea class='" . $class . " form-control' name='" . $name . "'  id='" . $id . "' rows='" . $rows . "' cols='" . $cols . "'>" . $value . "</textarea>";
    return $inputtextarea;
}

//radio物件群組(0/1選項)
/**
 * @param string $class
 * @param string $name
 * @param string $text
 * @param string $checked
 * @param string $id
 * @return string
 */
function radioinline($class = "", $name = "", $text = "", $checked = "", $id = "")
{
    foreach ($text as $key => $val) {
        if ($checked == $key) {
            $checkedtrue = "checked=checked";
        }

        $radioinline .= "<label class='radio-inline'>
      <input type='radio' id='" . $id . "' name='" . $name . "' " . $checkedtrue . " value='" . $key . "'>" . $val . "
    </label>";
        unset($checkedtrue);
    }
    return $radioinline;
}

//radio物件單組(多選自訂$value)
/**
 * @param string $dataid
 * @param string $class
 * @param string $name
 * @param string $text
 * @param string $value
 * @param string $oid
 * @param string $id
 * @return string
 */
function radioinlinelist($dataid = "", $class = "", $name = "", $text = "", $value = "", $oid = "", $id = "")
{
    $dataid == $oid ? $checkedtrue = "checked='checked'" : '';

    $radioinline .= "<label class='radio-inline'>
      <input id='" . $id . "' type='radio' name='" . $name . "' " . $checkedtrue . " value='" . $value . "'>" . $text . "
    </label>";
    unset($checkedtrue);

    return $radioinline;
}

//checkbox物件
/**
 * @param string $dataid
 * @param string $name
 * @param string $value
 * @param string $optionname
 * @param string $oid
 * @param string $i
 * @param string $class
 * @return string
 */
function checkbox($dataid = "", $name = "", $value = "", $optionname = "", $oid = "", $i = "", $class = "")
{
    $dataid == $oid ? $checked = "checked='checked'" : '';

    $checkboxinline = "<label class='" . $class . " checkbox-inline checkboxeach'><input id='checkbox" . $i . "' " . $checked . " type='checkbox' name='" . $name . "'  value='" . $value . "'>" . $optionname . "</label>";
    unset($checked);
    return $checkboxinline;
}

//option物件無URL
/**
 * @param string $dataid
 * @param string $optionname
 * @param string $oid
 * @param string $value
 * @return string
 */
function optionselect($dataid = "", $optionname = "", $oid = "", $value = "")
{
    $dataid == $oid ? $selected = "selected='selected'" : '';

    $option = "<option " . $selected . "   value=" . $value . "  data-id=" . $dataid . " >" . $optionname . "</option>";

    unset($selected);

    return $option;
}

//file物件
/**
 * @param string $multiple
 * @param string $name
 * @param string $id
 * @return string
 */
function typefile($multiple = "", $name = "", $id = "")
{
    if (!empty($multiple)) {
        $multiple = 'multiple';
    }

    $typefile = "<input type='file' class='form-control' " . $multiple . " name='" . $name . "' id='" . $id . "' >";
    return $typefile;
}
