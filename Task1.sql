:::::::::::::::::Task1:::::::::::::::::::::::::::::::::::::::::::::::::

SELECT p.UserRefID,p.FirstName,p.SurName, e.EmailAddress FROM emails e 
INNER JOIN (SELECT EmailAddress FROM emails GROUP BY EmailAddress HAVING COUNT(*) > 1) d 
ON d.EmailAddress = e.EmailAddress 
JOIN profiles p on p.UserRefID = e.UserRefID where p.Deceased = 0;



Note: Default column in emails table is a reserved word in mysql so therefore it is not advisable to be use, 
if i have my way Default column will not be use to create the table. 





