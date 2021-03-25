DELIMITER $$
DROP TRIGGER IF EXISTS Upnameteachers $$
CREATE TRIGGER Upnameteachers
        BEFORE INSERT ON Teachers
        FOR EACH ROW
BEGIN
        IF (New.id IS NOT NULL) THEN
               
                SET New.Teacher_name = UPPER(New.Teacher_name);
                SET New.Teacher_sur = UPPER(New.Teacher_sur);
        END IF;        
END $$
DELIMITER ;