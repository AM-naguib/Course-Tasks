<?php
// Write a PHP script that records 3 digits and prints the total of the first two digits multiplied by the third digit.

function sum_multi($num1, $num2, $num3)
{
    $sum = $num1 + $num2;
    return $sum * $num3;
}

// A program that calculates the size of a box whose length and width are fixed with a value of 5 and 10 and the height is variable (size = length x width x height)

function calc_size($height)
{
    return $height * 5 * 10;
}

// Write a PHP script that takes a number integer representing the hours and converts it to seconds.

function convert_to_seconds($hours)
{
    $min = $hours * 60;
    return $min * 60;
}
// Write a PHP script that calculates the Area of a Triangle store the base and height Print the area.


function calc_triangle_area($b, $h)
{
    return 0.5 * $b * $h;
}
//  Write a PHP script that takes the age in years and prints the age in days.

function years_to_days($years)
{
    return $years * 365;
}
// ________________________________________________________________________________________

$string = "EraaSoft Learn by practice";
// Get the length of this sentence. 
echo strlen($string);

// Get the length of this sentence without spaces.  
echo strlen(str_replace(" ", "", $string));

// Get the number of words in this sentence. 
echo str_word_count($string);

// Check if this word (by) exists in the string or not.
echo strpos($string, "by"); //لو مش موجودى هترجع false

// Get the word (EraaSoft) from the string and print it.
echo strtok($string, " ");

// Remove the word (by) from the string and print the string with and without (by)
echo str_replace("by", "", $string);
// ________________________________________________________________________________________
$string_one = "Eraa";
$string_two = "Soft";
// Make a new variable called (Full_string) that concatenate string_one and string_two
$full_string = $string_one . $string_two;
// Compare the full_string and this string (EraaSoft).
if ($full_string == "EraaSoft") {
    echo "tmam";
}
// Write a PHP script to split the following string.
// Sample string: 'ErraSoft' 
//           Expected Output: Er/ra/So/ft
echo "<br>";
$spit_string = str_split("ErraSoft", 2);
echo implode("/", $spit_string);


//  Write a PHP script that stores the number as a variable and checks if it is odd or even.

function check_num_odd_or_even($num)
{
    if ($num / 2) {
        echo "$num is even";
    } else {
        echo "$num is odd";
    }
}
//  Write a PHP script that stores the string as a variable and checks if the length is odd or even.
function check_len_odd_or_even($str)
{
    $len = strlen($str);
    if ($len / 2) {
        echo "$str len  is even";
    } else {
        echo "$str len is odd";
    }
}

// Check from this string o If the string has “gain” Print ( success word ) o If the string has ( peen ) Print ( success word )  Else ( wrong word )

$description = "no pain , no gain ";

if (strpos($description, "gain") !== false || strpos($description, "peen") !== false) {
    echo "success word";
} else {
    echo "wrong word";
}


// A Boolean is a data type that has only two values true or false. These values often correspond to 1 (true) or 0 (false). When a 1 or a 0 is used, it's called an int Boolean. Write a PHP script that stores an int Boolean and outputs its opposite
// (1 becomes 0 and 0 becomes 1).


function convert_boolean($input){
    if($input == 0)
        $input =1;
    else
        $input = 0;
    return $input;
}

// Write a PHP script that stores a word and determines Is the Word is Singular or Plural? (A plural word is one that ends in "s".)
function singular_or_plural($str)
{
    $last_char = $str[strlen($str) - 1];
    if ($last_char == "s") {
        return "$str is Plural";
    } else {
        return "$str is Singular ";
    }
}


// Make a calculator with these operations using if and else if
// o Submission 
// o Subtraction 
// o Multiplication 
// o Division 
// o Power 
// o Modulus 

function calc($num1, $num2, $op)
{
    if ($op == "+")
        return $num1 + $num2;
    elseif ($op == "-")
        return $num1 - $num2;
    elseif ($op == "*")
        return $num1 * $num2;
    elseif ($op == "/")
        return $num1 / $num2;
    elseif ($op == "**")
        return $num1 ** $num2;
    elseif ($op == "%")
        return $num1 % $num2;
}

