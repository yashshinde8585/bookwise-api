<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


-----

# Bookwise API

Welcome to the **Bookwise API** documentation\! This API provides a robust set of endpoints for managing books, user authentication, and book reviews.

## Base URL

The base URL for all API endpoints is: `http://localhost:8000/api/v1`

## Authentication

All **authenticated endpoints** require a **Bearer Token** in the `Authorization` header. You can obtain this token by registering and logging in.

-----

## Authentication API Endpoints

### 1\. Register a New User

  * **Endpoint:** `/register`

  * **Method:** `POST`

  * **Description:** Registers a new user account.

  * **Request Body (JSON):**

    ```json
    {
      "name": "Abhi Shinde",
      "email": "abhi@example.com",
      "password": "password123",
      "password_confirmation": "password123"
    }
    ```

### 2\. User Login

  * **Endpoint:** `/login`

  * **Method:** `POST`

  * **Description:** Authenticates a user and returns an access token.

  * **Request Body (JSON):**

    ```json
    {
      "email": "abhi@example.com",
      "password": "password123"
    }
    ```

### 3\. User Logout

  * **Endpoint:** `/logout`

  * **Method:** `POST`

  * **Description:** Invalidates the current user's access token.

  * **Request Headers:**

    ```
    Authorization: Bearer <your_access_token>
    Accept: application/json
    ```

-----

## Book API Endpoints

### 1\. Create a New Book

  * **Endpoint:** `/books`

  * **Method:** `POST`

  * **Description:** Creates a new book entry. Requires authentication.

  * **Request Headers:**

    ```
    Authorization: Bearer <your_access_token>
    Accept: application/json
    ```

  * **Request Body (JSON):**

    ```json
    {
      "title": "Python",
      "description": "A book about practical approaches to software development and programming best practices by Abhi Shinde"
    }
    ```

### 2\. Update a Book

  * **Endpoint:** `/books/{id}`

  * **Method:** `PUT`

  * **Description:** Updates an existing book by its ID. Requires authentication.

  * **Path Parameters:**

      * `id`: The ID of the book to update (e.g., `1`).

  * **Request Headers:**

    ```
    Authorization: Bearer <your_access_token>
    Accept: application/vnd.api+json
    ```

  * **Request Body (JSON):**

    ```json
    {
      "title": "The Pragmatic Programmer",
      "description": "A book about practical approaches to software development and programming best practices with Mr.Yash Shinde"
    }
    ```

### 3\. Get All Books

  * **Endpoint:** `/books`
  * **Method:** `GET`
  * **Description:** Retrieves a list of all available books.

### 4\. Get a Specific Book

  * **Endpoint:** `/books/{id}`

  * **Method:** `GET`

  * **Description:** Retrieves details for a specific book by its ID.

  * **Path Parameters:**

      * `id`: The ID of the book to retrieve (e.g., `3`).

  * **Request Headers (Optional for public access, required if restricted):**

    ```
    Authorization: Bearer <your_access_token>
    Accept: application/json
    ```

  * **Example Response Body (JSON):**

    ```json
    {
      "title": "The Pragmatic Programmer",
      "description": "A book about practical approaches to software development and programming best practices."
    }
    ```

### 5\. Delete a Book

  * **Endpoint:** `/books/{id}`

  * **Method:** `DELETE`

  * **Description:** Deletes a book by its ID. Requires authentication.

  * **Path Parameters:**

      * `id`: The ID of the book to delete (e.g., `2`).

  * **Request Headers:**

    ```
    Authorization: Bearer <your_access_token>
    ```

-----

## Review API Endpoints

### 1\. Get All Reviews of a Book

  * **Endpoint:** `/books/{book_id}/reviews`
  * **Method:** `GET`
  * **Description:** Retrieves all reviews associated with a specific book.
  * **Path Parameters:**
      * `book_id`: The ID of the book whose reviews are to be retrieved (e.g., `1`).

### 2\. Add Review for a Book

  * **Endpoint:** `/books/{book_id}/reviews`

  * **Method:** `POST`

  * **Description:** Adds a new review for a specific book. Requires authentication.

  * **Path Parameters:**

      * `book_id`: The ID of the book to add a review for (e.g., `1`).

  * **Request Headers:**

    ```
    Authorization: Bearer <your_access_token>
    ```

  * **Request Body (JSON):**

    ```json
    {
      "rating": 4,
      "review_text": "An insightful and well-written book. Highly recommended!"
    }
    ```
