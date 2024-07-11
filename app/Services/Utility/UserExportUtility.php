<?php

namespace App\Services\Utility;

use App\Services\User\UserService;

class UserExportUtility extends BaseExportUtility
{
    protected static function getRecordsWithRelations()
    {
        $userService = app(UserService::class);
        return $userService->getAllUsersWithData();
    }

    protected static function getCsvHeaders()
    {
        return [
            'User ID', 'Name', 'Email', 'Role',
            'City', 'Region', 'Post Code', 'Phone Number'
        ];
    }

    protected static function getCsvRow($user)
    {
        $userData = [
            $user->id,
            $user->name,
            $user->email,
            $user->role,
        ];

        $city = $user->userData->city ?? '';
        $region = $user->userData->region ?? '';
        $postCode = $user->userData->postCode ?? '';
        $phoneNumber = $user->userData->phoneNumber ?? '';


        return array_merge($userData,[$city, $region, $postCode, $phoneNumber]);
    }

    protected static function getFileNamePrefix()
    {
        return 'users';
    }
}
