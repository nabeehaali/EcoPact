use nabeehaali;

/********** USER INFORMATION TABLES *************/

CREATE TABLE User_Info (
	username	VARCHAR(50)		PRIMARY KEY,
	email		VARCHAR(50)		NOT NULL,
    password	VARCHAR(50)		NOT NULL
);

INSERT INTO User_Info (username, email, password)
VALUES ('admin', 'test@test.com', 'admin');

SELECT * FROM User_Info;


