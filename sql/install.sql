CREATE DATABASE cafecoder;
USE cafecoder;
CREATE TABLE answers
(
  date datetime NOT NULL,
  id int NOT NULL AUTO_INCREMENT,
  question_id int NOT NULL,
  detail nvarchar(5000) NOT NULL,
  author varchar(128) NOT NULL,
  forum_id int NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE forums
(
  date datetime NOT NULL,
  id int NOT NULL AUTO_INCREMENT,
  name varchar(128) NOT NULL,
  author varchar(128) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE questions
(
  date datetime NOT NULL,
  id int NOT NULL AUTO_INCREMENT,
  title nvarchar(256) NOT NULL,
  detail nvarchar(5000) NOT NULL,
  author varchar(128) NOT NULL,
  forum_id int NOT NULL,
  status varchar(128) NOT NULL,
  PRIMARY KEY (id)
);
