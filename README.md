# Online Registration Web App

A small full-stack web application built to demonstrate client-side validation, AJAX form submission, PHP request handling, server-side validation, and Docker-based deployment.

> This is a learning project. For larger production-style work, see the other repositories on my GitHub profile.

## Features

- Registration form for name, email, phone number, gender, and age
- Client-side validation with JavaScript and jQuery
- AJAX submission without a full-page reload
- Server-side validation and sanitization in PHP
- Registration listing page
- Docker and Docker Compose support
- Render/Replit-oriented deployment files

## Tech Stack

- HTML5
- CSS3
- JavaScript
- jQuery
- PHP
- Docker
- Apache

## Project Structure

```text
index.html          Registration form
save_data.php       Validation and persistence
show_data.php       Registration listing
registrations.txt   Local demo storage
Dockerfile          Container image
docker-compose.yml  Local container setup
render.yaml         Render deployment configuration
```

## Run Locally

### PHP built-in server

```bash
php -S localhost:8000
```

Then open `http://localhost:8000/index.html`.

### Docker Compose

```bash
docker compose up --build
```

Then open `http://localhost:8080/index.html`.

## Validation

The application validates:

- Required fields
- Gmail-format email addresses
- 10-digit phone numbers
- Input values on both client and server

## Engineering Notes

The project intentionally uses a text file for persistence to keep the example small and easy to inspect. A production version should use a database, authentication, CSRF protection, stronger validation rules, and appropriate authorization.

## Status

Completed learning project retained as an example of basic PHP web development and containerization.
