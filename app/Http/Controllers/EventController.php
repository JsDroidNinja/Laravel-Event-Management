<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEventRequest;
use App\Traits\ApiResponseTrait;

class EventController extends Controller {
    use ApiResponseTrait;
     /**
     * Get all events.
     */
    public function index()
    {
        $Events = Event::simplePaginate(10); // Paginate with 10 events per page
        return $this->successResponse('Event List', $Events);
    }

    /**
     * Store a new event.
     */
    public function store(StoreEventRequest $request)
    {
        $event = Event::create($request->validated());
        return $this->successResponse('Event created successfully', $event, 201);
    }

    /**
     * Get users assigned to a particular event with event details.
     */
    public function getEventUsers($eventId)
    {
        // Fetch the event along with users assigned to it
        $event = Event::with(['users' => function ($query) {
            $query->select('users.id', 'users.name', 'users.email')
                ->withPivot('status', 'attended'); // Include pivot data
        }])->find($eventId);

        // Check if event exists
        if (!$event) {
            return $this->errorResponse('Event not found', 404);
        }

        return $this->successResponse('Event Users List', $event);
    }

}
