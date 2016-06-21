CREATE DATABASE mathcountsgrading;

USE mathcountsgrading;

CREATE TABLE user(
  UID INT NOT NULL AUTO_INCREMENT,
  last_name VARCHAR,
  first_name VARCHAR,
  email VARCHAR NOT NULL,
  password VARCHAR NOT NULL,
)

CREATE TABLE competition(
  CID INT NOT NULL AUTO_INCREMENT,
  competition_date DATE NOT NULL,
  competition_type ENUM('chapter', 'state', 'national') NOT NULL,
  status_sprint FLOAT,
  status_target1 FLOAT,
  status_target2 FLOAT,
  status_target3 FLOAT,
  status_target4 FLOAT,
  status_team FLOAT,
);

CREATE TABLE competition_participants(
  CID INT NOT NULL,
  SCID INT NOT NULL,
);

CREATE TABLE competition_answers(
  CID INT NOT NULL,
  problem_type ENUM('sprint', 'target1', 'target2', 'target3', 'target4', 'team') NOT NULL,
  problem_number INT NOT NULL,
  answer VARCHAR NOT NULL,
  tie_index TINYINT NOT NULL,
);

CREATE TABLE school_info(
  SCID INT NOT NULL AUTO_INCREMENT,
  team_name VARCHAR NOT NULL,
  town VARCHAR NOT NULL,
  coach VARCHAR NOT NULL,
  address VARCHAR NOT NULL,
  contact_email VARCHAR NOT NULL,
  first_year BOOLEAN NOT NULL,
  ly_rank INT NOT NULL,
  ly_score FLOAT NOT NULL,
);

CREATE TABLE team_answers(
  CID INT NOT NULL,
  SCID INT NOT NULL,
  GID INT NOT NULL,
  problem_number INT NOT NULL,
  team_answer VARCHAR(30)
);

CREATE TABLE mathlete_info(
  SID INT NOT NULL AUTO_INCREMENT,
  SCID INT NOT NULL,
  last_name VARCHAR(30),
  first_name VARCHAR(30),
  nickname VARCHAR(30),
  gender ENUM('Male', 'Female', 'Other') NOT NULL
);

CREATE TABLE mathlete_scores(
  SID INT NOT NULL,
  CID INT NOT NULL,
  sprint_raw INT NOT NULL,
  target_raw1 INT NOT NULL,
  target_raw2 INT NOT NULL,
  target_raw3 INT NOT NULL,
  target_raw4 INT NOT NULL
  target_raw_total INT NOT NULL,
  main_total INT NOT NULL,
  mathlete_rank INT NOT NULL
);

CREATE TABLE student_answers(
  CID INT NOT NULL,
  SID INT NOT NULL,
  GID INT NOT NULL,
  competition_date DATE NOT NULL,
  problem_number INT NOT NULL AUTO_INCREMENT,
  problem_type ENUM('sprint', 'target1', 'target2', 'target3', 'target4' 'team') NOT NULL,
  answer VARCHAR(30),
  points INT NOT NULL
);

CREATE TABLE team_cleaner(
  SCID INT NOT NULL,
  CID INT NOT NULL,
  team_raw INT NOT NULL
);

CREATE TABLE student_cleaner(
  SID INT NOT NULL,
  CID INT NOT NULL,
  sprint_raw INT NOT NULL,
  target_raw1 INT NOT NULL,
  target_raw2 INT NOT NULL,
  target_raw3 INT NOT NULL,
  target_raw4 INT NOT NULL
);
