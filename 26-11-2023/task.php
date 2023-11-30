<?php
// مبحبش الحساب والله :D 
// _______________________________________________________________________________________________________________
// 1.	A program that calculates the average of the numbers in an array of n elements. The array is filled with random numbers.

// 2.	A program in which an array contains 10 numbers and another array 2D of size 2x5. What is required is that the second array is dictated by the first array.
// _______________________________________________________________________________________________________________

// 3.	A program in which an array of a group of numbers and print the largest and smallest number
// INPUT: 
// OUTPUT: 
// Largest number is: 11
// Smallest number is: 1
$array = [1, 10, 5, 2, 11];
$larg = $array[0];
$small = $array[0];
foreach ($array as $value) {
    if ($value > $larg) {
        $larg = $value;
    } elseif ($value < $small) {
        $small = $value;
    }
}


// 4.	The program, in which an array contains 10 numbers, and you store a number and calculates how many numbers are greater  than or equal and how many numbers are smaller  than this number inside.
// INPUT: 
// OUTPUT: 
// Numbers Smaller than (3) = 2 
// Numbers Greater then (3) = 3
$array = [1, 10, 5, 2, 11];
$x = 10;
function num_greter_smaller($arr, $num)
{
    $greater = 0;
    $smaller = 0;
    foreach ($arr as $value) {
        if ($value > $num) {
            $greater++;
        } else {
            $smaller++;
        }
    }
    return "Numbers Smaller than ($num) = $smaller <br> Numbers Greater then ($num) = $greater";
}

// 5.	Create a function that takes an array of names and returns an array where only the first letter of each name is capitalized.
// INPUT: 
// Array_of_names(["eraasoft", "backend", "group313"]) 
// OUTPUT: 
//  ["EraaSoft", "Backend", "Group313"]
$array = ["eraasoft", "backend", "group313"];
function make_cap($arr)
{
    foreach ($arr as $key => $value) {
        $arr[$key] = ucfirst($value);
    }
    return $arr;
}



// 6.	Given an integer array nums, move all 0's to the end of it while maintaining the relative order of the non-zero elements. Note that you must do this in-place without making a copy of the array.
// INPUT: 
// OUTPUT:
//  nums = [1,3,12,0,0]

$nums = [0, 1, 0, 3, 12];

function zero_in_last($arr)
{
    foreach ($arr as $key => $value) {
        if ($value == 0) {
            unset($arr[$key]);
            $arr[] = $value;
        }
    }
    $arr = array_values($arr);
    return $arr;
}




// 7.	Write a function that searches an array of names (unsorted) for the name "Bob" and returns the location in the array. If Bob is not in the array, return -1.
// INPUT: 
// $names = ["Alice", "Charlie", "Dave"]
// OUTPUT:
// 1
// -1
$names = ["Alice", "Bob", "Charlie", "Dave"];

function find_pos($arr, $str)
{
    $pos = -1;
    foreach ($arr as $key => $value) {
        echo "this is key = > $key and this is value = > $value <br>";
        if ($str == $value) {
            $pos = $key;
        }
    }
    return $pos;
}




// 8.	Create a function that takes a array of numbers and returns the second largest number.
// INPUT: 
$numbers = [11, 55, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// OUTPUT:
// 11

function sec_larg_num($arr)
{
    $largest = $arr[0];
    $second_largest = $arr[0];

    foreach ($arr as $value) {
        if ($value > $largest) {
            $second_largest = $largest;
            $largest = $value;
        }
    }
    return $second_largest;
}



// 9.	A program containing an array of different numbers and store a number $x If the number is not in the array prints not found and if it exists prints found and prints this number characteristics like
// ●	Positive or Negative 
// ●	How many digits are in this number 
// ●	Is-Prime or not. 
// ●	odd or even
// ●	read from the right as the left or not such as "505"
// INPUT: 
$numbers = [11, -55, 24, 43, 44, 545, 6, 777, 810, 94, 140, -554];
// OUTPUT:
// Found, Positive, not prime, odd , Yes 🡺 read from the right as the left

// $numbers = [11, 55, 24, 43, 44, 545, 6, 777, 810, 94, 140,31];
$x = 43;



function num_info($arr, $num)
{
    $status = false;
    $info = "";
    foreach ($arr as $value) {
        if($value == $num) $status = true;

    }
    if ($status) {
        $info .= "<h1>Number is $num </h1>";
        $info .= "Found, ";
        $info .= check_postive($num);
        $info .= "length " . len_int($num) . ", ";
        $info .= primeCheck($num) ? "Number is Prim, " : "Number not Prim, ";
        $info .= "Number is " . even_odd($num) . ", ";
    } else {
        $info .= "not found";
    }
    return $info;
}
echo num_info($numbers, $x);

// this functions to help num_info function
function check_postive($n)
{
    if ($n > 0) {

        return "Positive, ";
    }

    return "Negative, ";
}

function len_int($n)
{
    if (check_postive($n) == "Positive, ") {
        return strlen((string) $n);
    } else {
        $tostr = (string) $n;
        $tostr = str_replace("-", "", $tostr);
        return strlen($tostr);

    }
}
function primeCheck($n)
{
    if ($n == 1)
        return 0;

    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0)
            return 0;
    }
    return 1;
}
function even_odd($n)
{
    if ($n % 2 == 0) {
        return "even";
    }
    return "odd";
}