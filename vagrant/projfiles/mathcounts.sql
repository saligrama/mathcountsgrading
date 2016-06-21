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

CREATE TABLE TeamAnswers(
	CID INT NOT NULL,
	SCID INT NOT NULL,
	GID INT NOT NULL,
	ProblemNo INT NOT NULL,
	TeamAnswer VARCHAR(30)
);

CREATE TABLE MathleteInfo(
	SID INT NOT NULL,
	SCID INT NOT NULL,
	LastName VARCHAR(30),
	FirstName VARCHAR(30),
	NickName VARCHAR(30),
	Gender ENUM('Male', 'Female', 'Other') NOT NULL
);

CREATE TABLE MathleteScores(
	SID INT NOT NULL,
	CID INT NOT NULL,
	SprintRaw INT NOT NULL,
	TargetRaw1 INT NOT NULL,
	TargetRaw2 INT NOT NULL,
	TargetRaw3 INT NOT NULL,
	TargetRaw4 INT NOT NULL,
	Target INT NOT NULL,
	Total INT NOT NULL,
	MRank INT NOT NULL
);

CREATE TABLE StudentAnswers(
	CID INT NOT NULL,
	SID INT NOT NULL,
	GID INT NOT NULL,
	CDate DATE NOT NULL,
	ProblemNumber INT NOT NULL AUTO_INCREMENT,
	ProblemType ENUM('Sprint', 'Target', 'Team') NOT NULL,
	Answer VARCHAR(30),
	Points INT NOT NULL
);

CREATE TABLE TeamCleaner(
	SCID INT NOT NULL,
	CID INT NOT NULL,
	TeamRaw INT NOT NULL
);

CREATE TABLE StudentCleaner(
	SID INT NOT NULL,
	CID INT NOT NULL,
	SprintRaw INT NOT NULL,
	TargetRaw1 INT NOT NULL,
	TargetRaw2 INT NOT NULL,
	TargetRaw3 INT NOT NULL,
	TargetRaw4 INT NOT NULL
); 

