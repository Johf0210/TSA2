-- IT0049 TSA1 Tasks for Today Management System

CREATE DATABASE IF NOT EXISTS tasks_today
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE tasks_today;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'pending',
    task_date DATE NOT NULL,
    created_at DATETIME NOT NULL,
    is_archived BOOLEAN NOT NULL DEFAULT FALSE
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL
);

INSERT INTO tasks (title, status, task_date, created_at) VALUES
('Review the morning sales report', 'completed', '2026-10-08', '2026-10-08 08:00:00'),
('Prepare the weekly inventory list', 'pending', '2026-10-08', '2026-10-08 09:15:00'),
('Check supplier messages', 'completed', '2026-10-09', '2026-10-09 08:30:00'),
('Update the customer contact list', 'in-progress', '2026-10-09', '2026-10-09 10:00:00'),
('Review today’s priority orders', 'pending', '2026-10-10', '2026-10-10 08:00:00'),
('Confirm staff schedules', 'in-progress', '2026-10-10', '2026-10-10 09:00:00'),
('Prepare the end-of-day checklist', 'pending', '2026-10-10', '2026-10-10 10:30:00'),
('Archive completed task notes', 'pending', '2026-10-11', '2026-10-11 08:15:00');

INSERT INTO users (username, full_name, email, password, created_at) VALUES
('johf0210', '[Replace with your full name]', 'your.email@example.com', '$2y$10$QrjMd0CR9CMLb1/bVynFmukaAlfvA0itHvfHz46Hnz6OOUW4MgniS', '2026-10-10 08:00:00');
