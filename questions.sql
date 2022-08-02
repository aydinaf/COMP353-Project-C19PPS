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

SELECT authorUsername, firstName, lastName, Articles.orgID, citizenship, COUNT(*)
FROM Users, Articles, Organizations
WHERE Users.username = Articles.authorUsername OR Organizations.orgID = Articles.orgID
GROUP BY Articles.authorUsername
ORDER BY COUNT(*) DESC;

# 16



