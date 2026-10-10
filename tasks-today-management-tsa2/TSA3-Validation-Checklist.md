# Laboratory Activity — CRUD and Authentication Validation

## Database

- [x] `users.password` is `VARCHAR(255)` and the demo value is a bcrypt hash.
- [x] `tasks.is_archived` is `BOOLEAN NOT NULL DEFAULT FALSE`.

## Public pages

- [x] `/`, `/tasks`, `/profile`, and `/about` do not require a session.
- [x] `/` and `/tasks` filter out archived tasks.

## Authentication

- [x] `POST /login` validates credentials with `password_verify()`.
- [x] `POST /logout` destroys the session and redirects to `/login`.

## Protected task actions

- [x] `/tasks/new` redirects to `/login` when logged out.
- [x] `/tasks/{id}/edit` redirects to `/login` when logged out.
- [x] Create, update, and archive POST actions repeat the session check server-side.
- [x] Title and task date are required on create and update.
- [x] Archive updates the row instead of deleting it.

## Manual test script

1. Visit `/tasks` while logged out; confirm the list is visible and only a login/manage link is shown.
2. Visit `/tasks/new`; confirm it redirects to `/login`.
3. Log in as `johf0210` / `password123`; confirm the task form is available.
4. Submit the form with blank title/date; confirm validation errors are shown.
5. Create a valid task, edit it, then archive it; confirm it disappears from `/tasks` and remains in the database with `is_archived = 1`.
6. Log out; confirm the navigation returns to the public state and protected routes redirect again.
