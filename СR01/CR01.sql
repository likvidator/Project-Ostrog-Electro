ALTER TABLE `consumer` CHANGE `Name_consumer` `Name_consumer` VARCHAR(4000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;


ALTER TABLE `counter` ADD `Place` VARCHAR(4000) ;
ALTER TABLE `counter` ADD `Base_of_verifications` VARCHAR(4000) ;
ALTER TABLE `counter` ADD `Discharge` VARCHAR(4000) ;
ALTER TABLE `counter` ADD `Values_counter` VARCHAR(4000) ;

ALTER TABLE `object` ADD `Balanse_state` VARCHAR(4000) ; 
ALTER TABLE `object` ADD `Number_TU` VARCHAR(4000) ;
ALTER TABLE `object` ADD `Date_TU` DATE ;
ALTER TABLE `object` ADD `Description` VARCHAR(4000) ;


