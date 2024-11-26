# Laravel Task Manager API

This is a RESTful API built with Laravel to manage tasks. It includes endpoints for creating, reading, updating and deleting tasks.

## Endpoints

### POST /tasks

Creates a new task.

#### Request Body

* `title`: The title of the task. Required.
* `description`: The description of the task. Optional.

#### Response

* `id`: The ID of the newly created task.
* `title`: The title of the task.
* `description`: The description of the task.

#### Validation Rules

* `title`: required|string|max:255
* `description`: nullable|string|max:255

### GET /tasks

Returns a list of all tasks.

#### Response

* An array of tasks, each containing:
	+ `id`: The ID of the task.
	+ `title`: The title of the task.
	+ `description`: The description of the task.

### GET /tasks/{id}

Returns a single task by ID.

#### Path Parameters

* `id`: The ID of the task. Required.

#### Response

* The task, containing:
	+ `id`: The ID of the task.
	+ `title`: The title of the task.
	+ `description`: The description of the task.

### PUT /tasks/{id}

Updates a task by ID.

#### Path Parameters

* `id`: The ID of the task. Required.

#### Request Body

* `title`: The title of the task. Optional.
* `description`: The description of the task. Optional.

#### Response

* The updated task, containing:
	+ `id`: The ID of the task.
	+ `title`: The title of the task.
	+ `description`: The description of the task.

### DELETE /tasks/{id}

Deletes a task by ID.

#### Path Parameters

* `id`: The ID of the task. Required.

## Authentication

This API uses JWT authentication. To authenticate, send a `POST` request to the `/login` endpoint with the following body:

* `email`: The email address of the user. Required.
* `password`: The password of the user. Required.

The response will contain a `token` field, which should be sent in the `Authorization` header of subsequent requests. For example:

`Authorization: Bearer <token>`

## Security

This API uses Laravel's built-in CSRF protection and encryption. Additionally, all endpoints are protected by middleware that checks for a valid JWT token in the `Authorization` header. If the token is invalid or missing, a 401 response will be returned.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
