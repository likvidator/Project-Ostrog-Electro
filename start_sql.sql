CREATE SCHEMA IF NOT EXISTS `home` DEFAULT CHARACTER SET utf8 ;
USE `home` ;

-- -----------------------------------------------------
-- Table `home`.`сonsumer`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `home`.`сonsumer` (
  `id_сonsumer` INT NOT NULL AUTO_INCREMENT,
  `Name_сonsumer` VARCHAR(45) NULL,
  `Phone_сonsumer` VARCHAR(45) NULL,
  `Personal_account` VARCHAR(45) NULL,
  `Face` VARCHAR(45) NULL,
  PRIMARY KEY (`id_сonsumer`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `home`.`object`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`object` (
  `id_object` INT NOT NULL AUTO_INCREMENT,
  `Owner_FIO` VARCHAR(45) NULL,
  `Renter_FIO` VARCHAR(45) NULL,
  `Name_object` VARCHAR(45) NULL,
  `Mailing_address` VARCHAR(45) NULL,
  `Phone_object` VARCHAR(45) NULL,
  `Source_of_power` VARCHAR(45) NULL,
  `Voltage_class` VARCHAR(45) NULL, 
  `Obj_Cons_id` INT NOT NULL,
  PRIMARY KEY (`id_object`, `Obj_Cons_id`),
  INDEX `fk_Объект_Потребитель_idx` (`Obj_Cons_id` ASC),
  CONSTRAINT `fk_Объект_Потребитель`
    FOREIGN KEY (`Obj_Cons_id`)
    REFERENCES `home`.`сonsumer` (`id_сonsumer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `home`.`transfor_vol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`transfor_vol` (
  `id_tr_vol` INT NOT NULL AUTO_INCREMENT,
  `Type_tr_vol` VARCHAR(45) NULL,
  `Mark_tr_vol` VARCHAR(45) NULL,
  `Denomin_tr_vol` VARCHAR(45) NULL,
  `Plomb_tr_vol` VARCHAR(100) NULL,
  `object_id_tr_vol` INT NOT NULL,
  `Cons_id_obj_tr_vol` INT NOT NULL,
  PRIMARY KEY (`id_tr_vol`),
  INDEX `fk_transfor_vol_object1_idx` (`object_id_tr_vol` ASC, `Cons_id_obj_tr_vol` ASC),
  CONSTRAINT `fk_transfor_vol_object1`
    FOREIGN KEY (`object_id_tr_vol` , `Cons_id_obj_tr_vol`)
    REFERENCES `home`.`object` (`id_object` , `Obj_Cons_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `home`.`counter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`counter` (
  `id_count` INT NOT NULL AUTO_INCREMENT,
  `Type_count` VARCHAR(45) NULL,
  `Mark_count` VARCHAR(45) NULL,
  `Number_count` VARCHAR(45) NULL,
  `Year_release_count` VARCHAR(45) NULL,
  `Class_accur_count` VARCHAR(45) NULL,
  `Kol_plomb_gospr` VARCHAR(45) NULL,
  `Kol_holog_stick` VARCHAR(45) NULL,
  `Plomb_netw_org` VARCHAR(45) NULL,
  `Antimag_plomb` VARCHAR(45) NULL,
  `Plomb_shu` VARCHAR(45) NULL,
  `Other_places_count` VARCHAR(45) NULL,
  `Obj_id_count` INT NOT NULL,
  `Obj_Cons_id_count` INT NOT NULL,
  PRIMARY KEY (`id_count`, `Obj_id_count`, `Obj_Cons_id_count`),
  INDEX `fk_Счетчик_Объект1_idx` (`Obj_id_count` ASC, `Obj_Cons_id_count` ASC),
  CONSTRAINT `fk_Счетчик_Объект1`
    FOREIGN KEY (`Obj_id_count` , `Obj_Cons_id_count`)
    REFERENCES `home`.`object` (`id_object` , `Obj_Cons_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `home`.`transfor_cur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`transfor_cur` (
  `id_tr_cur` INT NOT NULL,
  `Type_tr_cur` VARCHAR(45) NULL,
  `Mark_tr_cur` VARCHAR(45) NULL,
  `Denomin_tr_cur` VARCHAR(45) NULL,
  `Year_release_tr_cur` VARCHAR(45) NULL,
  `Num_tr_cur_fa` VARCHAR(45) NULL,
  `Num_tr_cur_fb` VARCHAR(45) NULL,
  `Num_tr_cur_fc` VARCHAR(45) NULL,
  `Obj_id_tr_cur` INT NOT NULL,
  `Obj_Cons_id_tr_cur` INT NOT NULL,
  PRIMARY KEY (`id_tr_cur`),
  INDEX `fk_transfor_cur_object1_idx` (`Obj_id_tr_cur` ASC, `Obj_Cons_id_tr_cur` ASC),
  CONSTRAINT `fk_transfor_cur_object1`
    FOREIGN KEY (`Obj_id_tr_cur` , `Obj_Cons_id_tr_cur`)
    REFERENCES `home`.`object` (`id_object` , `Obj_Cons_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `home`.`plombs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`plombs` (
  `id_plomb` INT NOT NULL AUTO_INCREMENT,
  `L1` VARCHAR(45) NULL,
  `L2` VARCHAR(45) NULL,
  `I1` VARCHAR(45) NULL,
  `I2` VARCHAR(45) NULL,
  `Other_places_plomb` VARCHAR(45) NULL,
  PRIMARY KEY (`id_plomb`))
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `home`.`phase_tr_cur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`phase_tr_cur` (
  `Phase` INT NULL,
  `transfor_cur_id_phase` INT NOT NULL,
  `Phase_id_plomb` INT NOT NULL,
  INDEX `fk_Fase_tr_cur_transfor_cur1_idx` (`transfor_cur_id_phase` ASC),
  INDEX `fk_Fase_tr_cur_plombs1_idx` (`Phase_id_plomb` ASC),
  CONSTRAINT `fk_Fase_tr_cur_transfor_cur1`
    FOREIGN KEY (`transfor_cur_id_phase`)
    REFERENCES `home`.`transfor_cur` (`id_tr_cur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Fase_tr_cur_plombs1`
    FOREIGN KEY (`Phase_id_plomb`)
    REFERENCES `home`.`plombs` (`id_plomb`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `home`.`dimension`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`dimension` (
  `id_dimen` INT NOT NULL AUTO_INCREMENT,
  `Date_dimen` VARCHAR(45) NULL,
  `Alter_phase` VARCHAR(45) NULL,
  `Load_fa` VARCHAR(45) NULL,
  `Load_fb` VARCHAR(45) NULL,
  `Load_fc` VARCHAR(45) NULL,
  `Cos_fi` VARCHAR(45) NULL,
  `Kol_turn_disk` VARCHAR(45) NULL,
  `Power_consum` VARCHAR(45) NULL,
  `Obj_id_dimen` INT NOT NULL,
  `Obj_Cons_id_dimen` INT NOT NULL,
  PRIMARY KEY (`id_dimen`),
  INDEX `fk_Данные об измерениях_Объект1_idx` (`Obj_id_dimen` ASC, `Obj_Cons_id_dimen` ASC),
  CONSTRAINT `fk_Данные об измерениях_Объект1`
    FOREIGN KEY (`Obj_id_dimen` , `Obj_Cons_id_dimen`)
    REFERENCES `home`.`object` (`id_object` , `Obj_Cons_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `home`.`change_count`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `home`.`change_count` (
  `id_change` INT NOT NULL AUTO_INCREMENT,
  `Date_change` VARCHAR(45) NULL,
  `Cause_change` VARCHAR(45) NULL,
  `FIO_change` VARCHAR(45) NULL,
  `Nomber_old` VARCHAR(45) NOT NULL,
  `Nomber_new` VARCHAR(45) NOT NULL,
  `counter_id_count` INT NOT NULL,
  PRIMARY KEY (`id_change`),
  INDEX `fk_change_count_counter1_idx` (`counter_id_count` ASC),
  CONSTRAINT `fk_change_count_counter1`
    FOREIGN KEY (`counter_id_count`)
    REFERENCES `home`.`counter` (`id_count`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `home`.`type_date`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`type_date` (
  `id_Type` INT not NULL ,
  `Type` VARCHAR(2000) NOT NULL,
  PRIMARY KEY (`id_Type`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `home`.`date_list`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`date_list` (
  `id_Date` INT NOT NULL AUTO_INCREMENT,
  `Date_l` DATE NOT NULL,
  `type_date_id` INT NOT NULL,
  PRIMARY KEY (`id_Date`, `type_date_id`),
  INDEX `fk_date_list_type_date1_idx` (`type_date_id` ASC),
  CONSTRAINT `fk_date_list_type_date1`
    FOREIGN KEY (`type_date_id`)
    REFERENCES `home`.`type_date` (`id_Type`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `home`.`all_dates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`all_dates` (
  `date_list_id` INT NOT NULL,
  `counter_id_count` INT DEFAULT null,
  `transfor_vol_id` INT DEFAULT null,
  `transfor_cur_id` INT DEFAULT null ,
  `Conclusio` VARCHAR(45) NULL,
  `Notes` VARCHAR(45) NULL,
  PRIMARY KEY (`date_list_id`),
  INDEX `fk_date_list_has_counter_counter1_idx` (`counter_id_count` ASC),
  INDEX `fk_date_list_has_counter_date_list1_idx` (`date_list_id` ASC),
  INDEX `fk_date_list_has_counter_transfor_vol1_idx` (`transfor_vol_id` ASC),
  INDEX `fk_date_list_has_counter_transfor_cur1_idx` (`transfor_cur_id` ASC),
  CONSTRAINT `fk_date_list_has_counter_date_list1`
    FOREIGN KEY (`date_list_id`)
    REFERENCES `home`.`date_list` (`id_Date`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_date_list_has_counter_counter1`
    FOREIGN KEY (`counter_id_count`)
    REFERENCES `home`.`counter` (`id_count`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_date_list_has_counter_transfor_vol1`
    FOREIGN KEY (`transfor_vol_id`)
    REFERENCES `home`.`transfor_vol` (`id_tr_vol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_date_list_has_counter_transfor_cur1`
    FOREIGN KEY (`transfor_cur_id`)
    REFERENCES `home`.`transfor_cur` (`id_tr_cur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `home`. user (
  id INT NOT NULL AUTO_INCREMENT,
  Name  varchar(20),
  Password TEXT,
  PRIMARY KEY(id)
);


INSERT INTO type_date (id_Type,Type)
VALUES ('1','инструментальная проверка счетчика');

INSERT INTO type_date (id_Type,Type)
VALUES ('2','госпроверка счетчика');

INSERT INTO type_date (id_Type,Type)
VALUES ('3','инструментальная проверка трансформатора тока');

INSERT INTO type_date (id_Type,Type)
VALUES ('4','госпроверка трансформаторая тока');

INSERT INTO type_date (id_Type,Type)
VALUES ('5','инструментальная проверка трансформатора напряжения');

INSERT INTO type_date (id_Type,Type)
VALUES ('6','госпроверка трансформатора напряжения');



ALTER TABLE `home`.`change_count` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`сonsumer` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`counter` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`dimension` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`object` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`plombs` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`transfor_cur` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`transfor_vol` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`user` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`type_date` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`date_list` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`all_dates` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`phase_tr_cur` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;