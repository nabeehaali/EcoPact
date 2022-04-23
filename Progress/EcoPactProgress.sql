use nabeehaali;

CREATE TABLE user_points (
id		INTEGER		PRIMARY KEY,
total	INTEGER		NOT NULL
);

INSERT INTO user_points (id, total)
VALUES (1, 0);

DROP TABLE user_points;

CREATE TABLE user_count (
id			INTEGER		PRIMARY KEY,
food		INTEGER		NOT NULL,
transit		INTEGER		NOT NULL,
house		INTEGER		NOT NULL,
dayoflog	DATE		NOT NULL
);