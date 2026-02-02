# Book & Author Management System

A simple Laravel backend API for managing Authors and their Books.

## Features

- Full CRUD operations for Authors
- Full CRUD operations for Books
- Proper relationships (Author has many Books)
- Request validation
- RESTful API endpoints

## Requirements

- PHP 8.2 or higher
- Composer
- SQLite (already included)

## Installation

1. Clone the repository:
```bash
git clone <your-repo-url>
cd book-store
```

2. Install dependencies:
```bash
composer install
```

3. Copy environment file:
```bash
cp .env.example .env
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Run migrations:
```bash
php artisan migrate
```

6. Start the development server:
```bash
php artisan serve
```

The API will be available at `http://localhost:8000`

## API Endpoints

### Authors

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/authors` | Get all authors |
| POST | `/api/authors` | Create new author |
| GET | `/api/authors/{id}` | Get single author |
| PUT | `/api/authors/{id}` | Update author |
| DELETE | `/api/authors/{id}` | Delete author |

### Books

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/books` | Get all books |
| POST | `/api/books` | Create new book |
| GET | `/api/books/{id}` | Get single book |
| PUT | `/api/books/{id}` | Update book |
| DELETE | `/api/books/{id}` | Delete book |

## API Examples

### Create Author

**Request:**
```bash
curl -X POST http://localhost:8000/api/authors \
  -H "Content-Type: application/json" \
  -d '{
    "name": "J.K. Rowling",
    "email": "jk@example.com",
    "bio": "British author, best known for Harry Potter series"
  }'
```

**Response:**
```json
{
  "id": 1,
  "name": "J.K. Rowling",
  "email": "jk@example.com",
  "bio": "British author, best known for Harry Potter series",
  "created_at": "2026-02-02T15:30:00.000000Z",
  "updated_at": "2026-02-02T15:30:00.000000Z"
}
```

### Create Book

**Request:**
```bash
curl -X POST http://localhost:8000/api/books \
  -H "Content-Type: application/json" \
  -d '{
    "title": "Harry Potter and the Philosopher Stone",
    "isbn": "978-0-7475-3269-9",
    "description": "First book in the Harry Potter series",
    "published_year": 1997,
    "author_id": 1
  }'
```

**Response:**
```json
{
  "id": 1,
  "title": "Harry Potter and the Philosopher Stone",
  "isbn": "978-0-7475-3269-9",
  "description": "First book in the Harry Potter series",
  "published_year": 1997,
  "author_id": 1,
  "created_at": "2026-02-02T15:35:00.000000Z",
  "updated_at": "2026-02-02T15:35:00.000000Z",
  "author": {
    "id": 1,
    "name": "J.K. Rowling",
    "email": "jk@example.com",
    "bio": "British author, best known for Harry Potter series",
    "created_at": "2026-02-02T15:30:00.000000Z",
    "updated_at": "2026-02-02T15:30:00.000000Z"
  }
}
```

### Get All Authors

**Request:**
```bash
curl http://localhost:8000/api/authors
```

**Response:**
```json
[
  {
    "id": 1,
    "name": "J.K. Rowling",
    "email": "jk@example.com",
    "bio": "British author, best known for Harry Potter series",
    "created_at": "2026-02-02T15:30:00.000000Z",
    "updated_at": "2026-02-02T15:30:00.000000Z",
    "books_count": 1
  }
]
```

### Get Single Author with Books

**Request:**
```bash
curl http://localhost:8000/api/authors/1
```

**Response:**
```json
{
  "id": 1,
  "name": "J.K. Rowling",
  "email": "jk@example.com",
  "bio": "British author, best known for Harry Potter series",
  "created_at": "2026-02-02T15:30:00.000000Z",
  "updated_at": "2026-02-02T15:30:00.000000Z",
  "books": [
    {
      "id": 1,
      "title": "Harry Potter and the Philosopher Stone",
      "isbn": "978-0-7475-3269-9",
      "description": "First book in the Harry Potter series",
      "published_year": 1997,
      "author_id": 1,
      "created_at": "2026-02-02T15:35:00.000000Z",
      "updated_at": "2026-02-02T15:35:00.000000Z"
    }
  ]
}
```

### Update Author

**Request:**
```bash
curl -X PUT http://localhost:8000/api/authors/1 \
  -H "Content-Type: application/json" \
  -d '{
    "bio": "British author and philanthropist, best known for Harry Potter series"
  }'
```

### Delete Author

**Request:**
```bash
curl -X DELETE http://localhost:8000/api/authors/1
```

**Response:**
```json
{
  "message": "Author deleted successfully"
}
```

## Validation Rules

### Author

- `name`: Required, string, max 255 characters
- `email`: Required, valid email, unique
- `bio`: Optional, string

### Book

- `title`: Required, string, max 255 characters
- `isbn`: Required, string, unique
- `description`: Optional, string
- `published_year`: Required, integer, between 1000 and current year
- `author_id`: Required, must exist in authors table

## Database Schema

### Authors Table

- `id` - Primary key
- `name` - String
- `email` - String (unique)
- `bio` - Text (nullable)
- `created_at` - Timestamp
- `updated_at` - Timestamp

### Books Table

- `id` - Primary key
- `title` - String
- `isbn` - String (unique)
- `description` - Text (nullable)
- `published_year` - Integer
- `author_id` - Foreign key (references authors.id, cascade on delete)
- `created_at` - Timestamp
- `updated_at` - Timestamp

## Notes

- When an author is deleted, all their books are automatically deleted (cascade delete)
- All API responses are in JSON format
- The application uses SQLite database for easy setup
