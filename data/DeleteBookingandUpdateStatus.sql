DELIMITER //

DROP PROCEDURE IF EXISTS UpdateStatus //
DROP PROCEDURE IF EXISTS DeleteBookingand //


CREATE PROCEDURE UpdateStatus (IN book_id INT)
BEGIN

UPDATE Queues q INNER JOIN Booking b  
ON q.id = b.queue_id
SET Status = 'Free' 
WHERE b.id=book_id;


END  //

CREATE PROCEDURE DeleteBookingand (IN book_id INT)
BEGIN


DELETE FROM Booking 
WHERE id = book_id;



END  //

DELIMITER ;