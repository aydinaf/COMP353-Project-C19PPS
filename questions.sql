# 10

SELECT userType, username, firstName, lastName, citizenship, email, phone
FROM Users
ORDER BY userType, citizenship;

# 11

SELECT authorUsername, firstName, lastName, Articles.orgID, majorTopic, minorTopic, publicationDate, citizenship
FROM Users, Articles, Organizations
WHERE Users.username = Articles.authorUsername OR Organizations.orgID = Articles.orgID
ORDER BY citizenship, lastName, firstName, publicationDate;

# 12

SELECT authorUsername, firstName, lastName, Articles.orgID, majorTopic, minorTopic, publicationDate, citizenship
FROM Users, Articles, Organizations
WHERE Users.username = Articles.authorUsername OR Organizations.orgID = Articles.orgID
AND availability = 'removed'
ORDER BY citizenship, lastName, firstName, publicationDate;

# 13

SELECT userType, username, firstName, lastName, citizenship, email, phone
FROM Users
WHERE active = 0;

# 14

SELECT publicationDate, majorTopic, minorTopic, summary, articleContent
FROM Articles
GROUP BY authorUsername
ORDER BY publicationDate;

# 15

SELECT authorUsername, firstName, lastName, Articles.orgID, citizenship, (SELECT COUNT(*) FROM Articles WHERE Users.username = Articles.authorUsername) AS totalPublications
FROM Users, Articles, Organizations
WHERE Users.username = Articles.authorUsername
GROUP BY Articles.authorUsername
ORDER BY totalPublications DESC;

# 16

SELECT Countries.regionName, citizenship, (SELECT COUNT(*) FROM Users WHERE Users.userType = 'researcher' AND Users.citizenship = Countries.countryName) AS researchers, (SELECT COUNT(*) FROM Articles, Users WHERE Articles.authorUsername = Users.username AND Countries.countryName = Users.citizenship) AS publications
FROM Users, Articles, Regions, Organizations, Countries
WHERE Users.username = Articles.authorUsername OR Organizations.orgID = Articles.orgID
AND Countries.countryName = Users.citizenship
GROUP BY Users.citizenship
ORDER BY Countries.regionName ASC, publications DESC;

# 17

SELECT ProStaTers.countryName, Countries.regionName, SUM(population) as countryPopulation, SUM(CASE WHEN Reports.vaccineName != 'None' THEN vaccinated END) AS totalVaccinated, SUM(deaths) AS totalDeaths, SUM(CASE WHEN Reports.vaccineName != 'None' THEN deaths END) as vaccinatedCovidDeaths, MAX(Reports.datetime) AS dateOfReport
FROM Countries, ProStaTers, Reports
WHERE ProStaTers.countryName = Countries.countryName
AND ProStaTers.prostaterName = Reports.prostaterName
GROUP BY ProStaTers.countryName
ORDER BY totalDeaths;

# 18

SELECT dateTime, recipientEmail, subject 
FROM EmailLogs
ORDER BY dateTime;

# 19

SELECT dateTime, ProStaTers.prostaterName, ProStaTers.population, SUM(CASE WHEN Reports.vaccineName = 'AstraZeneca' THEN vaccinated END) AS astraVaccinations,
										SUM(CASE WHEN Reports.vaccineName = 'JnJ' THEN vaccinated END) AS jnjVaccinations,
                                        SUM(CASE WHEN Reports.vaccineName = 'Moderna' THEN vaccinated END) AS modernaVaccinations,
                                        SUM(CASE WHEN Reports.vaccineName = 'Pfizer' THEN vaccinated END) AS pfizerVaccinations,
                                        SUM(infections) AS totalInfections,
                                        SUM(CASE WHEN Reports.vaccineName = 'AstraZeneca' THEN deaths END) AS astraCovidDeaths,
										SUM(CASE WHEN Reports.vaccineName = 'JnJ' THEN deaths END) AS jnjCovidDeaths,
                                        SUM(CASE WHEN Reports.vaccineName = 'Moderna' THEN deaths END) AS modernaCovidDeaths,
                                        SUM(CASE WHEN Reports.vaccineName = 'Pfizer' THEN deaths END) AS pfizerCovidDeaths
FROM ProStaTers, Reports
WHERE ProStaTers.prostaterName = Reports.prostaterName
AND ProStaTers.countryName = 'Canada'
GROUP BY DAY(Reports.dateTime), Reports.prostaterName
ORDER BY Reports.dateTime DESC;

# 20

SELECT Users.firstName, Users.lastName, Users.citizenship, (SELECT COUNT(*) FROM Subscriptions WHERE Subscriptions.authorUsername = Articles.authorUsername) AS subscriberCount
FROM Articles, Users
WHERE Users.username = Articles.authorUsername
GROUP BY Articles.authorUsername
ORDER BY subscriberCount DESC;


