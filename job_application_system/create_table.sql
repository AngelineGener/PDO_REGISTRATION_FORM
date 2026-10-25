CREATE DATABASE IF NOT EXISTS job_application_db;
USE job_application_db;

CREATE TABLE applications (
    application_id   INT AUTO_INCREMENT PRIMARY KEY,
    first_name       VARCHAR(50)  NOT NULL,
    last_name        VARCHAR(50)  NOT NULL,
    email            VARCHAR(100) NOT NULL,
    phone            VARCHAR(20)  NOT NULL,
    years_experience INT          NOT NULL DEFAULT 0,
    primary_platform VARCHAR(50)  NOT NULL,
    portfolio_link   VARCHAR(255),
    expected_salary  DECIMAL(10,2) NOT NULL,
    cover_letter     TEXT,
    date_added       TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
