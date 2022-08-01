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
    email VARCHAR (255) UNIQUE NOT NULL,
    phone INT NOT NULL,
    pwdChecksum VARCHAR (255) NOT NULL,
    userType ENUM('Admin', 'Researcher', 'Delegate', 'User'),
    `active` BIT DEFAULT 1,
    FOREIGN KEY (citizenship) REFERENCES Countries (countryName),
    PRIMARY KEY (username)
);

CREATE TABLE Privileges (
	username VARCHAR (255) NOT NULL,
    `right` enum ('add', 'edit', 'delete', 'suspend') NOT NULL,
    `subject` enum ('user', 'article') NOT NULL,
    PRIMARY KEY (username, `subject`),
    FOREIGN KEY (username) REFERENCES Users (username) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Articles (
	articleName VARCHAR(255) NOT NULL,
	authorUsername VARCHAR(255) NOT NULL,
	orgID INT NOT NULL,
	publicationDate DATE NOT NULL,
	majorTopic VARCHAR(255) NOT NULL,
	minorTopic VARCHAR(255) NOT NULL,
	summary VARCHAR(255) NOT NULL,
	PRIMARY KEY (articleName, authorUsername, orgID, publicationDate),
	FOREIGN KEY (authorUsername) REFERENCES Users (username) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (orgID) REFERENCES Organizations (orgID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE EmailLogs (
	recipientEmail VARCHAR (255) NOT NULL,
    `dateTime` DATETIME NOT NULL,
    `subject` VARCHAR (255) NOT NULL,
    body TEXT NOT NULL, -- TODO: MAKE SURE THIS DATA TYPE IS CORRECT
    PRIMARY KEY (recipientEmail, `dateTime`),
    FOREIGN KEY (recipientEmail) REFERENCES Users (email) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Subscriptions (
	username VARCHAR (255) NOT NULL,
    authorUsername VARCHAR (255) NOT NULL,
    `orgID` INT NOT NULL,
    FOREIGN KEY (username) REFERENCES Users (username) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (authorUsername) REFERENCES Articles (authorUsername) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (orgID) REFERENCES Organizations (orgID) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (username, authorUsername, orgID)
);

CREATE TABLE Employees (
	username VARCHAR (255) NOT NULL,
    orgID INT NOT NULL,
    FOREIGN KEY (username) REFERENCES Users (username) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (orgID) REFERENCES Organizations (orgID) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (username, orgID)
);

CREATE TABLE Regions (
	regionName VARCHAR (255) NOT NULL,
    PRIMARY KEY (regionName)
);

CREATE TABLE Countries (
	countryName VARCHAR (255) NOT NULL,
    regionName VARCHAR (255) NOT NULL,
    orgID INT, -- TODO: MAKE SURE THIS CAN BE NULL
    PRIMARY KEY (countryName),
    FOREIGN KEY (regionName) REFERENCES Regions (regionName) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (orgID) REFERENCES Organizations (orgID) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE ProStaTers (
	prostaterName VARCHAR(255) NOT NULL,
    countryName VARCHAR(255) NOT NULL,
    population INT NOT NULL,
    PRIMARY KEY (prostaterName, countryName),
    FOREIGN KEY (countryName) REFERENCES Countries (countryName) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE Vaccines (
	vaccineName VARCHAR (255) NOT NULL,
    PRIMARY KEY (vaccineName)
);

CREATE TABLE Vaccinations (
	prostaterName VARCHAR (255) NOT NULL,
    vaccineName VARCHAR (255) NOT NULL,
    vaccinated INT NOT NULL,
    `dateTime` DATETIME NOT NULL,
    FOREIGN KEY (prostaterName) REFERENCES ProStaTers (prostaterName) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (vaccineName) REFERENCES Vaccines (vaccineName) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (vaccineName, prostaterName, `dateTime`)
);

CREATE TABLE Cases (
	vaccineName VARCHAR (255) NOT NULL,
    prostaterName VARCHAR (255) NOT NULL,
    infections INT NOT NULL,
    deaths INT NOT NULL,
    `dateTime` DATETIME NOT NULL,
    FOREIGN KEY (vaccineName) REFERENCES Vaccines (vaccineName) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (prostaterName) REFERENCES ProStaTers (prostaterName) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (vaccineName, prostaterName, `dateTime`)
);

-- CREATE TABLE UpdateLogs (
-- 	orgID INT NOT NULL,
--     prostaterName VARCHAR (255) NOT NULL,
--     `date` DATE NOT NULL,
--     vaccineName VARCHAR (255) NOT NULL,
--     vaccinated INT NOT NULL,
--     infections INT NOT NULL,
--     deaths INT NOT NULL,
--     FOREIGN KEY (orgID) REFERENCES Organizations (orgID) ON DELETE CASCADE ON UPDATE CASCADE,
--     FOREIGN KEY (prostaterName) REFERENCES ProStaTers (prostaterName) ON DELETE CASCADE ON UPDATE CASCADE,
--     FOREIGN KEY (vaccineName) REFERENCES Vaccines (vaccineName) ON DELETE CASCADE ON UPDATE CASCADE,
--     PRIMARY KEY (orgID, `date`)
-- );
