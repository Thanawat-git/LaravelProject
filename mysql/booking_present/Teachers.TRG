TYPE=TRIGGERS
triggers='CREATE DEFINER=`root`@`%` TRIGGER Upnameteachers\n        BEFORE INSERT ON Teachers\n        FOR EACH ROW\nBEGIN\n        IF (New.id IS NOT NULL) THEN\n               \n                SET New.Teacher_name = UPPER(New.Teacher_name);\n                SET New.Teacher_sur = UPPER(New.Teacher_sur);\n        END IF;        \nEND' 'CREATE DEFINER=`root`@`%` TRIGGER Upnameteachers1\n        BEFORE UPDATE ON Teachers\n        FOR EACH ROW\nBEGIN\n        IF (New.id IS NOT NULL) THEN\n               \n                SET New.Teacher_name = UPPER(New.Teacher_name);\n                SET New.Teacher_sur = UPPER(New.Teacher_sur);\n\n        \n        END IF;        \n\n                \nEND'
sql_modes=524288 524288
definers='root@%' 'root@%'
client_cs_names='utf8mb4' 'utf8mb4'
connection_cl_names='utf8mb4_unicode_ci' 'utf8mb4_unicode_ci'
db_cl_names='utf8_general_ci' 'utf8_general_ci'
created=158583454136 158583459002
