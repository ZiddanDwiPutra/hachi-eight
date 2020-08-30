CREATE database hachi_eight;
use hachi_eight;

create TABLE if NOT EXISTS `he_people_feed` (
  `name` varchar(100),
  `email` varchar(100),
  `message` text,
  `date` DATE,
  `id` int AUTO_INCREMENT,
  PRIMARY KEY (`id`)
);

create TABLE if NOT EXISTS `he_people_ideas` ( 
  `id` INT AUTO_INCREMENT , 
  `name` VARCHAR(150), 
  `email` VARCHAR(100), 
  `messageEncode` TEXT, 
  `date` DATE, 
  `privacy` BOOLEAN, 
  `userId` VARCHAR(20), 
  PRIMARY KEY (`id`)
);