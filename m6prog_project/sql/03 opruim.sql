DELETE FROM `image`
where uploaddatetime < DATE_SUB(curdate(), INTERVAL 1 DAY);