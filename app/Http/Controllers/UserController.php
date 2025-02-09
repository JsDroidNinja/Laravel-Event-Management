<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Traits\ApiResponseTrait;

class UserController extends Controller {
    use ApiResponseTrait;

    /**
     * Get all Users.
    */
    public function index(Request $request)
    {
        // Check if 'user_id' is provided
        if ($request->has('user_id')) {
            // Return a specific user's details based on user_id
            return $this->getUserWithDetails($request->user_id, $request->events);
        }
    
        // Otherwise, return a paginated list of users
        return $this->getUsersWithDetails($request->events);
    }

    /**
     * Store a new user.
    */
    public function store(StoreUserRequest  $request) {
        $user = User::create($request->validated());
        return $this->successResponse('User created successfully', $user, 201);
    }

     /**
     * Fetch a single user with events (if 'events' parameter is provided).
     */
    protected function getUserWithDetails($userId, $events)
    {
        // Define the query to get user details
        $userQuery = User::query();

        // Check if the 'events' parameter is provided and true
        if ($events === 'true') {
            // Eager load events with pivot fields (status, attended) if 'events' is true
            $userQuery->with(['events' => function($query) {
                $query->withPivot('status', 'attended'); // Include pivot fields (status, attended)
            }]);
        }

        // Fetch the user by ID
        $user = $userQuery->find($userId);

        // Check if the user exists
        if (!$user) {
            return $this->errorResponse('User not found', 404);
        }

        // Return the success response with the specific user's details
        return $this->successResponse('User Details', $user);
    }

    /**
     * Fetch a paginated list of users with events (if 'events' parameter is provided).
     */
    protected function getUsersWithDetails($events)
    {
        // Define the base query for fetching users
        $usersQuery = User::query();

        // Check if the 'events' parameter is provided and true
        if ($events === 'true') {
            // Eager load events with pivot fields (status, attended) if 'events' is true
            $usersQuery->with(['events' => function($query) {
                $query->withPivot('status', 'attended'); // Include pivot fields (status, attended)
            }]);
        }

        // Paginate users
        $users = $usersQuery->simplePaginate(10); // 10 users per page

        // Return the success response with the list of users
        return $this->successResponse('User List', $users);
    }
}
