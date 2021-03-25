DELIMITER $$
DROP TRIGGER IF EXISTS Upnameteachers1 $$
CREATE TRIGGER Upnameteachers1
        BEFORE UPDATE ON Teachers
        FOR EACH ROW
BEGIN
        IF (New.id IS NOT NULL) THEN
                SET New.Teacher_name = UPPER(New.Teacher_name);
                SET New.Teacher_sur = UPPER(New.Teacher_sur);
        END IF;        

                
END $$
DELIMITER ;