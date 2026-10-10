# Tasks for Today Management System

This is an IT0049 CodeIgniter 4 extension of the TSA1 Tasks for Today Management System. It adds password authentication, protected task mutations, validated create/edit forms, and archive-based deletion.

## Pages

- `/` — Welcome page showing only tasks scheduled for the current date
- `/tasks` — complete task list ordered by date
- `/profile` — one demo user record
- `/about` — static developer and project information
- `/login` — login page for the demo user
- `/tasks/new` — protected task creation form
- `/tasks/{id}/edit` — protected task editing form

## Setup

1. Install PHP 8.0 or newer, Composer, MySQL, and a local web server.
2. Create a standard CodeIgniter app with `composer create-project codeigniter4/appstarter tasks-today`.
3. Copy this project's `app` and `public/assets` folders into the generated project.
4. Copy `.env.example` to `.env` in the generated project's root folder.
5. Replace the developer name and email in `database/schema.sql` before importing it.
6. Run `database/schema.sql` in MySQL.
7. Update the database values in `.env` if needed.
8. Run `php spark serve`.
9. Open `http://localhost:8080/` and test the public and protected routes.

## Demo login

- Username: `johf0210`
- Password: `password123`

The password is stored as a bcrypt hash in `database/schema.sql`; the application verifies it with `password_verify()` and never compares plaintext credentials.

## Access-control checks

While logged out, opening `/tasks/new`, `/tasks/1/edit`, or submitting a mutation redirects to `/login`. The public `/`, `/tasks`, `/profile`, and `/about` routes remain viewable. After logging in, create and edit require `title` and `task_date`; archive changes `is_archived` to `1` instead of deleting the row, and archived tasks disappear from `/` and `/tasks`.

The Welcome page filters tasks using the current date. The database seed contains records for October 8, 9, 10, and 11, 2026; update the seed date if testing on another date so that at least one task matches today's date.
