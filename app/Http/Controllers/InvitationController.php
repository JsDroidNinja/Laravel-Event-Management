<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use App\Http\Requests\InviteUserRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Http\Requests\MarkAttendanceRequest;
use App\Traits\ApiResponseTrait;

class InvitationController extends Controller
{
    use ApiResponseTrait;

    /**
     * Invite user to an event.
     */
    public function inviteUser(InviteUserRequest $request)
    {
        // Check if the user is already invited to the event
        $existingInvitation = Invitation::where('user_id', $request->user_id)
                                        ->where('event_id', $request->event_id)
                                        ->first();

        // If an invitation already exists, return an error response
        if ($existingInvitation) {
            return $this->errorResponse('User has already been invited to this event', [], 400);
        }

        // Create the invitation
        $invitation = Invitation::create([
            'user_id' => $request->user_id,
            'event_id' => $request->event_id
        ]);

        return $this->successResponse('User invited successfully', $invitation, 201);
    }


    /**
     * Update invitation status (pending, accepted, or declined).
     */
    public function updateStatus(UpdateStatusRequest $request, Invitation $invitation)
    {
        $invitation->update(['status' => $request->status]);

        return $this->successResponse('Invitation status updated', $invitation);
    }

    /**
     * Mark attendance for the invitation.
     */
    public function markAttendance(MarkAttendanceRequest $request, Invitation $invitation)
    {
        $invitation->update(['attended' => $request->attended]);

        return $this->successResponse('Attendance marked successfully', $invitation);
    }
}
