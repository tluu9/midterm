<?php

//validate name and answer
function form()
{
    global $f3;
    $isValid= true;

    if (!validString($f3->get('name'))) {
        $isValid = false;
        $f3->set("errors['name']", "Please enter your name ");
    }

    if (!validAnswers($f3->get('answers'))) {
        $isValid = false;
        $f3->set("errors['answers']", "Please select an answer.");
    }
    return $isValid;
}

//string only
function validString($string)
{
    return $string !== "" && ctype_alpha($string);
}


function validAnswers($answers)
{
    global $f3;
    if (empty($answers))
    {
        return true;
    }

    foreach($answers as $select)
    {
        if(!in_array($select, $f3->get('answers')))
        {
            return false;
        }
    }

    return true;
}