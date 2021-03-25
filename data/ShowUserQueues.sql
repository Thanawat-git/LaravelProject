DELIMITER //

DROP PROCEDURE IF EXISTS ShowUserQueues //
DROP PROCEDURE IF EXISTS SelectQueue //

CREATE PROCEDURE ShowUserQueues (IN u_id INT)
BEGIN

SELECT 

b1.id as booking_id,
q.id as queue_id,
u.name,
q.QNo,
q.status,
q.Date,
Concat(Time_Start,' น. - ',Time_End,' น.') AS TIME,
Subjects.Sub_name,
Concat(Teachers.Title,' ',Teachers.Teacher_name,' ',Teachers.Teacher_sur) AS Teacher_Name 
FROM Queues q
JOIN Subjects ON q.Sub_id = Subjects.id 
JOIN Teachers ON q.Teacher_id = Teachers.id 
JOIN Booking b1 ON b1.queue_id = q.id 
JOIN users u ON u.id = b1.user_id
Where u.id = u_id;


END  //
CREATE PROCEDURE SelectQueue ()
BEGIN

SELECT q.id as booking_id, q.id as queue_id, q.QNo, q.status, q.Date, 
Concat(Time_Start,' น. - ',Time_End,' น.') AS TIME,
Subjects.Sub_id,
Subjects.Sub_name,Teachers.id AS Teacher_id, Concat(Teachers.Title,' ',Teachers.Teacher_name,' ',Teachers.Teacher_sur) AS Teacher_Name 
FROM Queues q LEFT JOIN Subjects 
ON q.Sub_id = Subjects.id 
LEFT JOIN Teachers 
ON q.Teacher_id = Teachers.id
ORDER BY q.QNo ASC;;


END  //

DELIMITER ;

