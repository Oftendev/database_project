CREATE DATABASE my_db;
CREATE TABLE my_db.posts(
    userId INT,
    Id INT NOT Null,
    title TEXT,
    body TEXT,
    PRIMARY KEY (id)
);
CREATE TABLE my_db.comments(
    postId INT,
    id INT,
    name TEXT,
    email VARCHAR(100),
    body TEXT,
    PRIMARY KEY (id),
    FOREIGN KEY (postId) REFERENCES posts(Id)
);