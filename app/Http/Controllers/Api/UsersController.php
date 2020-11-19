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
        // Set current page
        $currentPage = is_numeric($request->get('page', 1)) ? $request->get('page', 1) : 1;

        // Check if role provided and is valid
        if (($role = strtolower($request->get('role', ''))) && in_array($role, $validRoles)) {
            $key = "{$role}_users_{$currentPage}";
        } else {
            $key = "users_{$currentPage}";
        }

        // Fetch users as per role, if role not provided retrieve all users
        $users = Cache::remember($key, 100, function () use ($role){
            $query = User::query();
            if ($role) {
                $query->where('role', $role);
            }
            return $query->paginate(20);
        });

        return response()->json(['status' => true, 'data' => $users]);
    }
}
