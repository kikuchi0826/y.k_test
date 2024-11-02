-- 使用しているSQL文
CREATE DATABASE yk_db
CHARACTER SET utf8
COLLATE utf8_general_ci;

select
    * ,
    CASE
    WHEN reactions.users_id = 2 THEN true
    ELSE false
  END AS reaction_flg
from reactions
right join schedules as s
on s.id = reactions.schedules_id
GROUP BY reactions.schedules_id
order by start_date asc

select
    COUNT(reactions.schedules_id) as reaction_int,
    `s`.`id` as `id`,
    `s`.`start_date`,
    `s`.`suggestion_id`,
    `event_name`,
    MAX(reactions.users_id = 3) AS reaction_flg from `reactions`
right join `schedules` as `s`
on `s`.`id` = `reactions`.`schedules_id`
group by `reactions`.`schedules_id`, `s`.`id`, `s`.`start_date`, `s`.`suggestion_id`, `event_name`
order by `start_date` asc

ALTER TABLE schedules
DROP COLUMN reaction_counter
