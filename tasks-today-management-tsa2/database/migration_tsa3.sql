-- Run once against an existing TSA1/TSA2 database before deploying the new app.
ALTER TABLE users ADD COLUMN password VARCHAR(255) NOT NULL DEFAULT '' AFTER email;
UPDATE users
SET password = '$2y$10$QrjMd0CR9CMLb1/bVynFmukaAlfvA0itHvfHz46Hnz6OOUW4MgniS'
WHERE username = 'johf0210';

ALTER TABLE tasks ADD COLUMN is_archived BOOLEAN NOT NULL DEFAULT FALSE AFTER created_at;
