<?php

require_once "./src/functions.php";

//task 1
$usersArray = usersCreateArray();

$nameFileJson = 'users.json';

//task2
if (arrayInJsonFile($nameFileJson, $usersArray)) {
    echo "Список пользователей успешно сохранен в json файл {$nameFileJson}<br />";
} else {
    echo "Не удалось сохранить список пользователей в json файл {$nameFileJson}<br />";
}
echo "<br />";

//task3
$usersArray = arrayFromJsonFile($nameFileJson);
if ($usersArray !== false) {
    echo "Список пользователей успешно загружен из json файла {$nameFileJson}<br />";
} else {
    echo "Не удалось загрузить список пользователей из json файла {$nameFileJson}<br />";
}
echo "<br />";

//task4
$usersArrayCountRepeatNames = usersArrayCountRepeatNames($usersArray);
if ($usersArrayCountRepeatNames) {
    foreach ($usersArrayCountRepeatNames as $name => $countRepeatName) {
        echo "Имя: <b>$name</b>, количество повторений: <b>$countRepeatName</b><br />";
    }
} else {
    echo "Не удалось подсчиать количество пользователей с каждым именем в массиве";
}
echo "<br />";

//task 5
$mediumAgeUsers = getMediumAgeUsersArray($usersArray);
if ($mediumAgeUsers) {
    echo "Cредний возраст пользователей: $mediumAgeUsers<br />";
} else {
    echo "Не удалось вычислить средний возраст пользователей<br />";
}
