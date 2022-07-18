CREATE DATABASE wellness_test;

\c wellness;

CREATE TABLE TEST (
    ID INT NOT NULL,
    TEST VARCHAR(10),

    PRIMARY KEY (ID)
);