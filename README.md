# Event Management API

## Introduction
The Event Management API is a Laravel-based system for managing events, users, and invitations. It allows users to create events, invite users, track their status, and mark attendance.

## Features
- User management (create, list, retrieve details)
- Event management (create, list, retrieve event details)
- User invitations to events with status tracking
- Attendance marking

## Installation
1. Clone the repository:
   ```sh
   git clone https://github.com/your-repo/event-management-api.git
   ```
2. Navigate to the project directory:
   ```sh
   cd event-management-api
   ```
3. Install dependencies:
   ```sh
   composer install
   ```
4. Copy the environment file and configure the database:
   ```sh
   cp .env.example .env
   ```
5. Generate the application key:
   ```sh
   php artisan key:generate
   ```
6. Run database migrations:
   ```sh
   php artisan migrate
   ```
7. Start the development server:
   ```sh
   php artisan serve
   ```

## API Endpoints

### Users
- **Get All Users**
  - `GET /api/users`
- **Create User**
  - `POST /api/users`
  - Body:
    ```json
    {
      "name": "John Doe",
      "email": "john@example.com"
    }
    ```

### Events
- **Get All Events**
  - `GET /api/events`
- **Create Event**
  - `POST /api/events`
  - Body:
    ```json
    {
      "title": "Tech Conference 2025",
      "description": "A conference about emerging technologies.",
      "event_date": "2025-05-10 10:00:00"
    }
    ```
- **Get Event Users**
  - `GET /api/events/{event_id}/users`

### Invitations
- **Invite User to Event**
  - `POST /api/invitations/invite`
  - Body:
    ```json
    {
      "user_id": 1,
      "event_id": 1
    }
    ```
- **Update Invitation Status**
  - `PATCH /api/invitations/{invitation_id}/status`
  - Body:
    ```json
    {
      "status": "accepted"
    }
    ```
- **Mark Attendance**
  - `PATCH /api/invitations/{invitation_id}/attendance`
  - Body:
    ```json
    {
      "attended": true
    }
    ```

## Postman Collection
You can import the Postman collection using the following JSON:
```json
{
  "info": {
    "_postman_id": "886389df-6b98-4a23-a36b-024e7ae7b73b",
    "name": "Event Management API",
    "schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json"
  },
  "item": [
    {
      "name": "Users",
      "item": [
        {
          "name": "Get All Users",
          "request": {
            "method": "GET",
            "url": "{{base_url}}/api/users"
          }
        },
        {
          "name": "Create User",
          "request": {
            "method": "POST",
            "header": [{"key": "Content-Type", "value": "application/json"}],
            "body": {"mode": "raw", "raw": "{\"name\": \"John Doe\", \"email\": \"john@example.com\"}"
            },
            "url": "{{base_url}}/api/users"
          }
        }
      ]
    },
    {
      "name": "Events",
      "item": [
        {
          "name": "Get All Events",
          "request": {
            "method": "GET",
            "url": "{{base_url}}/api/events"
          }
        },
        {
          "name": "Create Event",
          "request": {
            "method": "POST",
            "header": [{"key": "Content-Type", "value": "application/json"}],
            "body": {"mode": "raw", "raw": "{\"title\": \"Tech Conference 2025\", \"description\": \"A conference about emerging technologies.\", \"event_date\": \"2025-05-10 10:00:00\"}"
            },
            "url": "{{base_url}}/api/events"
          }
        }
      ]
    }
  ]
}
```

## License
This project is licensed under the MIT License.

