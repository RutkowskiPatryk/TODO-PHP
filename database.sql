/*         SQL used in App         */

CREATE DATABASE tasks;

CREATE TABLE task (
    id int NOT NULL AUTO_INCREMENT,
    title varchar(256) NOT NULL,
    description varchar(5120) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO task (title,description) VALUES ('Title #1','Description #1');

DELETE FROM task WHERE id = ?;