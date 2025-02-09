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
  - Query Parameters:
  - events (boolean, optional): If true, returns the event list for the user.
  - user_id (integer, optional): If provided, returns details of a single user with or without events based on the events parameter.
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
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",
		"_exporter_id": "27026852"
	},
	"item": [
		{
			"name": "Users",
			"item": [
				{
					"name": "Get All Users",
					"request": {
						"method": "GET",
						"header": [],
						"url": {
							"raw": "{{base_url}}/api/users",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"users"
							]
						}
					},
					"response": []
				},
				{
					"name": "Create User",
					"request": {
						"method": "POST",
						"header": [
							{
								"key": "Content-Type",
								"value": "application/json"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "{\n  \"name\": \"John Doe\",\n  \"email\": \"john@example.com\"\n}"
						},
						"url": {
							"raw": "{{base_url}}/api/users",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"users"
							]
						}
					},
					"response": []
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
						"header": [],
						"url": {
							"raw": "{{base_url}}/api/events",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"events"
							]
						}
					},
					"response": []
				},
				{
					"name": "Create Event",
					"request": {
						"method": "POST",
						"header": [
							{
								"key": "Content-Type",
								"value": "application/json"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "{\n  \"title\": \"Tech Conference 2025\",\n  \"description\": \"A conference about emerging technologies.\",\n  \"event_date\": \"2025-05-10 10:00:00\"\n}"
						},
						"url": {
							"raw": "{{base_url}}/api/events",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"events"
							]
						}
					},
					"response": []
				},
				{
					"name": "Get Event Users",
					"request": {
						"method": "GET",
						"header": []
					},
					"response": []
				}
			]
		},
		{
			"name": "Invitations",
			"item": [
				{
					"name": "Invite User to Event",
					"request": {
						"method": "POST",
						"header": [
							{
								"key": "Content-Type",
								"value": "application/json"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "{\n  \"user_id\": 1,\n  \"event_id\": 1\n}"
						},
						"url": {
							"raw": "{{base_url}}/api/invitations/invite",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"invitations",
								"invite"
							]
						}
					},
					"response": []
				},
				{
					"name": "Update Invitation Status",
					"request": {
						"method": "PATCH",
						"header": [
							{
								"key": "Content-Type",
								"value": "application/json"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "{\n  \"status\": \"accepted\"\n}"
						},
						"url": {
							"raw": "{{base_url}}/api/invitations/1/status",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"invitations",
								"1",
								"status"
							]
						}
					},
					"response": []
				},
				{
					"name": "Mark Attendance",
					"request": {
						"method": "PATCH",
						"header": [
							{
								"key": "Content-Type",
								"value": "application/json"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "{\n  \"attended\": true\n}"
						},
						"url": {
							"raw": "{{base_url}}/api/invitations/1/attendance",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"invitations",
								"1",
								"attendance"
							]
						}
					},
					"response": []
				}
			]
		}
	],
	"variable": [
		{
			"key": "base_url",
			"value": "http://127.0.0.1:8000",
			"type": "string"
		}
	]
}
```

## License
This project is licensed under the MIT License.

