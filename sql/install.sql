CREATE DATABASE cafecoder;
USE cafecoder;
CREATE TABLE answers (
  date datetime NOT NULL,
  id int NOT NULL AUTO_INCREMENT,
  question_id int NOT NULL,
  detail nvarchar(5000) NOT NULL,
  author varchar(128) NOT NULL,
  forum_id int NOT NULL,
  PRIMARY KEY (id)
);
CREATE TABLE forums (
  date datetime NOT NULL,
  id int NOT NULL AUTO_INCREMENT,
  category varchar(128) NOT NULL,
  name varchar(128) NOT NULL,
  author varchar(128) NOT NULL,
  PRIMARY KEY (id)
);
CREATE TABLE questions (
  date datetime NOT NULL,
  id int NOT NULL AUTO_INCREMENT,
  title nvarchar(256) NOT NULL,
  detail nvarchar(5000) NOT NULL,
  author varchar(128) NOT NULL,
  forum_id int NOT NULL,
  status varchar(128) NOT NULL,
  PRIMARY KEY (id)
);
CREATE TABLE users (
  date datetime NOT NULL,
  userid varchar(128) NOT NULL,
  passwd_hash varchar(256) NOT NULL,
  email varchar(256)
);
CREATE TABLE problems (
  date datetime NOT NULL,
  id int NOT NULL,
  title nvarchar(128) NOT NULL
);
INSERT INTO problems VALUE(
  '2020/02/02 01:29:00',
  1,
  'TLE Problem'
);
INSERT INTO forums VALUE(
  '2020/02/02 00:21:00',
  1000,
  'programming',
  'C',
  'admin'
);
INSERT INTO forums VALUE(
  '2020/02/02 00:21:00',
  1001,
  'programming',
  'C++',
  'admin'
);
INSERT INTO forums VALUE(
  '2020/02/02 00:21:00',
  1002,
  'programming',
  'Java',
  'admin'
);
INSERT INTO forums VALUE(
  '2020/02/02 00:21:00',
  1003,
  'programming',
  'Python3',
  'admin'
);
INSERT INTO forums VALUE(
  '2020/02/02 00:21:00',
  1004,
  'programming',
  'Scratch',
  'admin'
);

INSERT INTO forums VALUE(
  '2020/02/02 01:11:00',
  1005,
  'cafecoder',
  'tea001',
  'admin'
);

INSERT INTO forums VALUE(
  '2020/02/02 01:11:00',
  1006,
  'cafecoder',
  'tea002',
  'admin'
);

INSERT INTO forums VALUE(
  '2020/02/02 01:11:00',
  1007,
  'cafecoder',
  'tea003',
  'admin'
);

INSERT INTO forums VALUE(
  '2020/02/02 01:11:00',
  1008,
  'cafecoder',
  'tea004',
  'admin'
);