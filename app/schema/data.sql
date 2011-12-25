--  Eftakhairul Islam < eftakhairul@gmail.com> http://eftakhairul.com
-- 14 November, 2011


SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

INSERT INTO `user_types` (`user_type_id`, `title`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Employer'),
(4, 'Employee');

INSERT INTO `users` (`user_id`, `username`, `password`, `user_type_id`, `created_date`, `modified_date`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 2, '2011-11-14', '0000-00-00 00:00:00');





SET FOREIGN_KEY_CHECKS=1;