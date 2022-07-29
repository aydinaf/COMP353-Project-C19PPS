CREATE TABLE Organizations (
	orgID INT NOT NULL,
    orgName VARCHAR (255) NOT NULL,
    orgType enum ('Company', 'ResearchCenter', 'GovAgency') NOT NULL,
    PRIMARY KEY (orgID)
);

CREATE TABLE Users(
	username VARCHAR (255) NOT NULL,
    firstName VARCHAR (255) NOT NULL,
    lastName VARCHAR (255) NOT NULL,
    citizenship VARCHAR (255) NOT NULL,
    email VARCHAR (255) NOT NULL,
    phone INT NOT NULL,
    pwdChecksum INT NOT NULL,
    PRIMARY KEY (username)
);
