/* screen 1 */
SELECT !STRCMP('hash', (SELECT password FROM user WHERE email = 'hello@foo.com')); /* email is logname, return 1 if comparison successful, else 0 */

/* screen 2 */
SELECT CID competition_type, competition_date FROM competition;

/* screen 3 */
SELECT team_name FROM school_info;

/* screen 4 */
INSERT INTO school_info (SCID, team_name, town, coach, address, contact_email, first_year, ly_rank, ly_score)
VALUES (...), /* school 1 */
VALUES (...), /* school 2 */
VALUES (...); /* school 3, etc. */

INSERT INTO mathlete_info (SID, SCID, last_name, first_name, nickname, gender, is_team)
VALUES (...), /* school 1 */
VALUES (...), /* school 2 */
VALUES (...); /* school 3, etc. */

/* screen 5 */
INSERT INTO competition_answers (CID, problem_type, problem_number, answer, tie_index)
VALUES (...),
VALUES (...); /* etc. */

/* screen 6 */
INSERT INTO user (UID, last_name, first_name, email, password)
VALUES (...),
VALUES (...); /* etc. */

/* screen 7 */
SELECT team_name, SCID FROM school_info WHERE SCID IN (SELECT SCID FROM competition_participants WHERE CID = curr);  /* curr: ID of current competition */
SELECT a.team_name, a.SCID FROM school_info a INNER JOIN competition_participants b ON a.SCID = b.SCID WHERE b.CID = curr; /* same as above, but with inner join */

/* screen 8 */
SELECT a.first_name, a.last_name, a.nickname FROM mathlete_info a WHERE (a.CID = 1) AND (a.SCID = 2) AND (a.is_team = 1);


/* screen 9 */
SELECT status_sprint, status_target1, status_target2, status_target3, status_target4, status_team FROM competition WHERE CID = curr;


/* 2) */
SELECT team_name, SCID FROM school_info WHERE SCID NOT IN (SELECT SCID FROM team_cleaner WHERE CID = 1);

