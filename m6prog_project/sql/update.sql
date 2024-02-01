UPDATE `image` set uploaddatetime = DATE_ADD(uploaddatetime, INTERVAL -31 DAY);

UPDATE `image` set uploaddatetime = DATE_ADD(CURRENT_TIMESTAMP, INTERVAL -31 DAY);

UPDATE `image` set uploaddatetime = DATE_SUB(uploaddatetime, INTERVAL 1 YEAR);