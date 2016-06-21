CREATE DATABASE mathcountsgrading;

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
  tie_index #TODO
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
