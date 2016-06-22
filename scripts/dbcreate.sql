CREATE DATABASE mathcountsgrading;

USE mathcountsgrading;

CREATE TABLE user(
  UID INT NOT NULL AUTO_INCREMENT,
  last_name VARCHAR(100),
  first_name VARCHAR(100),
  email VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  PRIMARY KEY(UID)
);

CREATE TABLE competition(
  CID INT NOT NULL AUTO_INCREMENT,
  competition_date DATE NOT NULL,
  competition_type ENUM('chapter', 'state', 'national') NOT NULL,
  status_sprint FLOAT(10,2),
  status_target1 FLOAT(10,2),
  status_target2 FLOAT(10,2),
  status_target3 FLOAT(10,2),
  status_target4 FLOAT(10,2),
  status_team FLOAT(10,2),
  PRIMARY KEY(CID)
);

CREATE TABLE competition_participants(
  CID INT NOT NULL,
  SCID INT NOT NULL
);

CREATE TABLE competition_answers(
  CID INT NOT NULL,
  problem_type ENUM('sprint', 'target1', 'target2', 'target3', 'target4', 'team') NOT NULL,
  problem_number INT NOT NULL,
  answer VARCHAR(100) NOT NULL,
  tie_index TINYINT
);

CREATE TABLE school_info(
  SCID INT NOT NULL AUTO_INCREMENT,
  team_name VARCHAR(100) NOT NULL,
  town VARCHAR(100) NOT NULL,
  coach VARCHAR(100) NOT NULL,
  address VARCHAR(100) NOT NULL,
  contact_email VARCHAR(100) NOT NULL,
  first_year BOOLEAN NOT NULL,
  ly_rank INT NOT NULL,
  ly_score FLOAT(10,2) NOT NULL,
  PRIMARY KEY(SCID)
);

CREATE TABLE team_answers(
  CID INT NOT NULL,
  SCID INT NOT NULL,
  GID INT NOT NULL,
  problem_number INT NOT NULL,
  team_answer VARCHAR(100)
);

CREATE TABLE mathlete_info(
  SID INT NOT NULL AUTO_INCREMENT,
  SCID INT NOT NULL,
  last_name VARCHAR(100) ,
  first_name VARCHAR(100) ,
  nickname VARCHAR(100) ,
  gender ENUM('Male', 'Female', 'Other') NOT NULL,
  is_team BOOLEAN NOT NULL,
  PRIMARY KEY(SID)
);

CREATE TABLE mathlete_scores(
  SID INT NOT NULL,
  CID INT NOT NULL,
  sprint_raw INT NOT NULL,
  target_raw1 INT NOT NULL,
  target_raw2 INT NOT NULL,
  target_raw3 INT NOT NULL,
  target_raw4 INT NOT NULL,
  target_raw_total INT NOT NULL,
  main_total INT NOT NULL,
  mathlete_rank INT NOT NULL
);

CREATE TABLE student_answers(
  CID INT NOT NULL,
  SID INT NOT NULL,
  GID INT NOT NULL,
  competition_date DATE NOT NULL,
  problem_number INT NOT NULL,
  problem_type ENUM('sprint', 'target1', 'target2', 'target3', 'target4', 'team') NOT NULL,
  answer VARCHAR(100),
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
