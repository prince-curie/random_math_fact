# Random Math Fact API

This Laravel-powered API provides interesting mathematical facts about a given number.  It offers a public GET endpoint that accepts a number as a query parameter and returns a JSON response containing information about the number.

## Table of Contents

- [Introduction](#introduction)
- [Live Demo](#live-demo)
- [API Endpoint](#api-endpoint)
- [Request](#request)
- [Response](#response)
- [Error Handling](#error-handling)
- [Local Development](#local-development)
- [Contributing](#contributing)

## Introduction

The Random Math Fact API is a simple and informative API that provides insights into the mathematical properties of a given number.  It's built using the Laravel framework and designed to be easily accessible and integrated into other applications.

## Live Demo

You can visit the live demo of the API at: [https://random-math-fact.onrender.com/api](https://random-math-fact.onrender.com/api)

## API Endpoint

`GET /classify-number?number=[number]`

## Request

The API endpoint accepts a single query parameter:

-   `number`: (required) An integer.

### Example:
- `GET /classify-number?number=28`

## Response

### 200 OK

```json
{
    "number": 28,
    "is_prime": false,
    "is_perfect": true,
    "properties": [
        "even",
    ],
    "digit_sum": 10,
    "fun_fact": "28 is the second perfect number."
}
```

## Error Responses
The API returns JSON error responses with appropriate HTTP status codes when errors occur.

### 422 Unprocessable Content (Invalid Input):

```json
{
    "message": "-28 is uninteresting",
    "errors": {
        "number": [
            "-28 is uninteresting"
        ]
    }
}
```

## Local Development
1. Clone the repository:

```bash
git clone <repository_url>
cd random-math-fact-api
```
2. Install Composer dependencies:

```bash
composer install
```

4. Copy the .env.example file to .env and configure your environment variables:

```bash
cp .env.example .env
php artisan key:generate --force
```
5. Start the development server:

```bash
php artisan serve
```

6. Access the API: The API will be accessible at http://localhost:8000/api.

## Contributing
Contributions are welcome! Please open an issue or submit a pull request.  Be sure to follow the existing code style and include tests for any new features.