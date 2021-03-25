DELIMITER //

DROP PROCEDURE IF EXISTS UpdateFKtoNull //

CREATE PROCEDURE UpdateFKtoNull (IN sub_id INT)
BEGIN

UPDATE  Queues q INNER JOIN Subjects s 
ON q.Sub_id = s.id 
SET q.Sub_id = Null
where s.id=sub_id;

END  //

DELIMITER ;