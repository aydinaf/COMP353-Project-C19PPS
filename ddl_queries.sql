CREATE TABLE Organizations (
	orgID INT AUTO_INCREMENT NOT NULL,
    orgName VARCHAR (255) NOT NULL,
    orgType enum ('Company', 'ResearchCenter', 'GovAgency') NOT NULL,
    PRIMARY KEY (orgID)
);

CREATE TABLE Users(
	username VARCHAR (255) NOT NULL,
    firstName VARCHAR (255) NOT NULL, -- RESIZE LENGHTS OF VARCHARS
    lastName VARCHAR (255) NOT NULL,
    citizenship VARCHAR (255) NOT NULL,
    email VARCHAR (255) NOT NULL,
    phone INT NOT NULL,
    pwdChecksum VARCHAR (255) NOT NULL,
    PRIMARY KEY (username)
);

CREATE TABLE Privilages (
	username VARCHAR (255),
    `right` enum ('add', 'edit', 'delete', 'suspend'),
    `subject` enum ('user', 'article'),
    PRIMARY KEY (username, `subject`)
);

CREATE TABLE Articles (
	articleName VARCHAR(255) NOT NULL,
	authorFirstName VARCHAR(255),
	authorLastName VARCHAR(255),
	orgID VARCHAR(255),
	publicationDate DATE NOT NULL,
	majorTopic VARCHAR(255) NOT NULL,
	minorTopic VARCHAR(255) NOT NULL,
	summary VARCHAR(255) NOT NULL,
	PRIMARY KEY (articleName, authorFirstName, authorLastName, orgID, publicationDate),
	FOREIGN KEY (authorFirstName) REFERENCES Users (firstName) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (authorLastName) REFERENCES Users (lastName) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (orgID) REFERENCES Organizations (orgID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE EmailLogs (
	recipientEmail VARCHAR (255),
    `dateTime` DATETIME,
    `subject` VARCHAR (255),
    body TEXT, -- TODO: MAKE SURE THIS DATA TYPE IS CORRECT
    PRIMARY KEY (recipientEmail, `dateTime`)
);

CREATE TABLE Subscriptions (
	username VARCHAR (255) NOT NULL,
    authorFirstName VARCHAR (255) NOT NULL,
    authorLastName VARCHAR (255) NOT NULL,
    organization VARCHAR (255) NOT NULL,
    FOREIGN KEY (username) REFERENCES Users (username) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (authorFirstName) REFERENCES Articles (firstName) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (authorLastName) REFERENCES Articles (lastName) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Delegates (
	username VARCHAR (255) NOT NULL,
    orgID INT NOT NULL,
    FOREIGN KEY (username) REFERENCES Users (username) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (orgID) REFERENCES Organizations (orgID) ON DELETE CASCADE ON UPDATE CASCADE
);

