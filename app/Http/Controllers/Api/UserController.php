<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
  public function show($user_id)
{
    // // Rate limiting
    // if (RateLimiter::tooManyAttempts('api-user:' . request()->ip(), 60)) {
    //     return Response::json([
    //         'status_code' => 429,
    //         'message' => 'Too many requests',
    //     ], 429);
    // }

    // RateLimiter::hit('api-user:' . request()->ip());

    $user = User::find($user_id);

    if (!$user) {
        return Response::json([
            'status_code' => 404,
            'message' => 'User not found',
        ], 404);
    }

    $address1 = json_decode($user->address1, true);
    $address2 = !empty($user->address2) ? json_decode($user->address2, true) : null;

    $addresses = [];


    unset($address1['primary']);
    if ($address2) {
        unset($address2['primary']);
    }

    if ($address1) {
        $addresses[] = [
            "address_type" => "home",
            "address1" => $address1,
            "primary" => isset($address1['primary']) && $address1['primary'] ? "yes" : "no"
        ];
    }

    if ($address2) {
        $addresses[] = [
            "address_type" => "office",
            "address2" => $address2,
            "primary" => isset($address2['primary']) && $address2['primary'] ? "yes" : "no"
        ];
    }

    $userData = [
        "user_name" => $user->user_name,
        "mobile" => $user->mobile,
        "dob" => $user->dob,
        "gender" => $user->gender,
        "Address" => $addresses
    ];

    return Response::json([
        'status_code' => 200,
        'message' => 'User details retrieved successfully',
        'data' => $userData
    ], 200);
}

}
