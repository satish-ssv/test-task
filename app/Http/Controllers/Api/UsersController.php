<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UsersController extends Controller
{
    final public function index(Request $request): JsonResponse
    {
        $validRoles = ['user', 'editor', 'admin'];
        $role = '';

        // Check if role provided and is valid
        if (($role = strtolower($request->get('role', ''))) && in_array($role, $validRoles)) {
            $key = "{$role}_users";
        } else {
            $key = 'users';
        }

        // Fetch users as per role, if role not provided retrieve all users
        $users = Cache::remember($key, 10, function () use ($role){
            $query = User::query();
            if ($role) {
                $query->where('role', $role);
            }
            return $query->get();
        });

        return response()->json(['status' => true, 'data' => $users]);
    }
}
