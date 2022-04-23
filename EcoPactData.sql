USE andrewrholland;

CREATE TABLE user (
	UserID int,
	Points int NOT NULL,
    FName varchar(50) NOT NULL,
    Email varchar(50) NOT NULL,
	PRIMARY KEY(UserID)
);

CREATE TABLE contributions (
    contribID int auto_increment,
	contribution varchar(50) NOT NULL,
    contribHome int NOT NULL,
    contribFood int NOT NULL,
    contribTransit int NOT NULL,
    contribDate DATE NOT NULL,
	UserID int NOT NULL,
    PRIMARY KEY(contribID),
    FOREIGN KEY(UserID) REFERENCES user(UserID)
);

INSERT INTO user (UserID, Points, FName, Email)
VALUES (1, 0, "John" , "JS@gmail.com");

INSERT INTO contributions (UserID, contribution,contribHome,contribDate)
VALUES (1, "Nein", 1, 0000-00-00);

SELECT * FROM user WHERE UserID = 1;
SELECT * FROM contributions WHERE UserID = 1;

SELECT * FROM user INNER JOIN contributions ON user.UserID = contributions.UserID;

DROP TABLE user;
DROP TABLE contributions;

DELETE contributions FROM contributions WHERE contributions.UserID = 1;
DELETE user FROM user WHERE user.UserID = 1;
