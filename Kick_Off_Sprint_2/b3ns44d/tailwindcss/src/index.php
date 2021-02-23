<?php

function celToFah(float $degrees)
{
    return $degrees * 1.8 + 32;
}

function fahToCel(float $degrees)
{
    return ($degrees - 32) / 1.8;
}
if (isset($_POST['convert'])) {
    if (!empty($_POST['unit'])) {
        $selected = $_POST['unit'];
        $input = floatval($_POST['convert']);
        if ($selected == 'fah') {
            $fah = fahToCel($input);
            $fahMsg = "$cel &deg;C = $fah &deg;F";
        } elseif ($selected == 'cel') {
            $cel = celToFah($input);
            $celMsg = "$fah &deg;F = $cel &deg;C";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Challenge</title>
    <link rel="stylesheet" href="../public/main.css" />
</head>

<body>
    <div class="md:container mt-8">
        <label for="price" class="block text-sm font-medium text-gray-700">Convert</label>
        <form action="./index.php" method="POST">
            <div class="mt-1 relative rounded-md shadow-sm w-1/2">
                <div class=" absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                </div>
                <input type="text" name="convert" id="convert" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="0">
                <div class="absolute inset-y-0 right-0 flex items-center">
                    <label for="unit" class="sr-only">Unit</label>
                    <select id="unit" name="unit" class="focus:ring-indigo-500 focus:border-indigo-500 h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-md">
                        <option value="fah">Fahrenheit</option>
                        <option value="cel">Celsius</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-8">
                Submit
            </button>
            <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3 mt-8 w-1/2" role="alert">
                <p class="font-bold">Your stuff bro</p>
                <p class="text-sm"><?php
                                    if (isset($fahMsg)) {
                                        echo $fahMsg;
                                    }
                                    if (isset($celMsg)) {
                                        echo $celMsg;
                                    }
                                    ?></p>
            </div>
        </form>
    </div>

</body>

</html>