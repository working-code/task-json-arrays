<?php

function usersCreateArray(int $countUsers = 50): array
{
    $usersArray = [];
    $nameUsers = ['Мария', 'Татьяна', 'Иван', 'Игорь', 'Андрей'];
    for ($i = 0; $i < $countUsers; $i++) {
        $user = [
            'id' => $i,
            'name' => $nameUsers[array_rand($nameUsers)],
            'age' => mt_rand(18, 45)
        ];
        $usersArray[] = $user;
    }
    return $usersArray;
}

function arrayInJsonFile(string $nameFile, array $data): bool
{
    $strJson = json_encode($data);
    if ($strJson === false) {
        return false;
    }
    $createFile = file_put_contents($nameFile, $strJson);
    if ($createFile === false) {
        return false;
    }
    return true;
}

function arrayFromJsonFile(string $nameFile)
{
    $strJson = file_get_contents($nameFile);
    if ($strJson === false) {
        return false;
    }
    $data = json_decode($strJson, true);
    if (empty($data)) {
        return false;
    }
    return $data;
}

function usersArrayCountRepeatNames(array $usersArray)
{
    try {
        $usersArrayName = array_column($usersArray, 'name');
        $repeatNamesUsers = array_count_values($usersArrayName);
    } catch (Exception $e) {
        return false;
    }
    return $repeatNamesUsers;
}

function getMediumAgeUsersArray(array $usersArray)
{
    try {
        $usersArrayAge = array_column($usersArray, 'age');
        $sumAge = array_sum($usersArrayAge);
        $countUsers = count($usersArrayAge);
        $mediumAgeUsers = $sumAge / $countUsers;
    } catch (Exception $e) {
        return false;
    }
    return (int) $mediumAgeUsers;
}
