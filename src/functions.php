<?php

function usersCreateArray(int $countUsers = 50): array
{
    $usersArray = [];
    $nameUsers = ['Мария', 'Татьяна', 'Иван', 'Игорь', 'Андрей'];
    for ($i = 0; $i < $countUsers; $i++) {
        $usersArray[] = [
            'id' => $i,
            'name' => $nameUsers[array_rand($nameUsers)],
            'age' => mt_rand(18, 45)
        ];
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
    return (bool)$createFile;
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
    if ($usersArray) {
        if (!array_key_exists('name', $usersArray[0])) {
            return false;
        }
    }
    $usersArrayName = array_column($usersArray, 'name');
    if (!$usersArrayName) {
        return false;
    }
    return array_count_values($usersArrayName);
}

function getMediumAgeUsersArray(array $usersArray)
{
    if ($usersArray) {
        if (!array_key_exists('age', $usersArray[0])) {
            return false;
        }
    }
    $usersArrayAge = array_column($usersArray, 'age');
    if (!$usersArrayAge) {
        return false;
    }
    $sumAge = array_sum($usersArrayAge);
    $countUsers = count($usersArrayAge);
    if ($countUsers === 0) {
        return false;
    }
    return (int)($sumAge / $countUsers);
}
