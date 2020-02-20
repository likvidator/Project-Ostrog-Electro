CREATE SCHEMA IF NOT EXISTS `home` DEFAULT CHARACTER SET utf8 ;
USE `home` ;

-- -----------------------------------------------------
-- Table `home`.`Consumer`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `home`.`Consumer` (
  `id_consumer` INT NOT NULL AUTO_INCREMENT,
  `Name_consumer` VARCHAR(45) NULL,
  `Phone_consumer` VARCHAR(45) NULL,
  `Personal_account` VARCHAR(45) NULL,
  `Face` VARCHAR(45) NULL,
  PRIMARY KEY (`id_consumer`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `home`.`Object`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`Object` (
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
    REFERENCES `home`.`Consumer` (`id_consumer`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `home`.`Transfor_vol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`Transfor_vol` (
  `id_tr_vol` INT NOT NULL AUTO_INCREMENT,
  `Type_tr_vol` VARCHAR(45) NULL,
  `Mark_tr_vol` VARCHAR(45) NULL,
  `Denomin_tr_vol` VARCHAR(45) NULL,
  `Plomb_tr_vol` VARCHAR(100) NULL,
  `Object_id_tr_vol` INT NOT NULL,
  `Cons_id_obj_tr_vol` INT NOT NULL,
  PRIMARY KEY (`id_tr_vol`),
  INDEX `fk_Transfor_vol_Object1_idx` (`Object_id_tr_vol` ASC, `Cons_id_obj_tr_vol` ASC),
  CONSTRAINT `fk_Transfor_vol_Object1`
    FOREIGN KEY (`Object_id_tr_vol` , `Cons_id_obj_tr_vol`)
    REFERENCES `home`.`Object` (`id_object` , `Obj_Cons_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `home`.`Counter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`Counter` (
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
    REFERENCES `home`.`Object` (`id_object` , `Obj_Cons_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `home`.`Transfor_cur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`Transfor_cur` (
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
  INDEX `fk_Transfor_cur_Object1_idx` (`Obj_id_tr_cur` ASC, `Obj_Cons_id_tr_cur` ASC),
  CONSTRAINT `fk_Transfor_cur_Object1`
    FOREIGN KEY (`Obj_id_tr_cur` , `Obj_Cons_id_tr_cur`)
    REFERENCES `home`.`Object` (`id_object` , `Obj_Cons_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `home`.`Plombs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`Plombs` (
  `id_plomb` INT NOT NULL AUTO_INCREMENT,
  `L1` VARCHAR(45) NULL,
  `L2` VARCHAR(45) NULL,
  `I1` VARCHAR(45) NULL,
  `I2` VARCHAR(45) NULL,
  `Other_places_plomb` VARCHAR(45) NULL,
  PRIMARY KEY (`id_plomb`))
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `home`.`Phase_tr_cur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`Phase_tr_cur` (
  `Phase` INT NULL,
  `Transfor_cur_id_phase` INT NOT NULL,
  `Phase_id_plomb` INT NOT NULL,
  INDEX `fk_Fase_tr_cur_Transfor_cur1_idx` (`Transfor_cur_id_phase` ASC),
  INDEX `fk_Fase_tr_cur_Plombs1_idx` (`Phase_id_plomb` ASC),
  CONSTRAINT `fk_Fase_tr_cur_Transfor_cur1`
    FOREIGN KEY (`Transfor_cur_id_phase`)
    REFERENCES `home`.`Transfor_cur` (`id_tr_cur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Fase_tr_cur_Plombs1`
    FOREIGN KEY (`Phase_id_plomb`)
    REFERENCES `home`.`Plombs` (`id_plomb`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `home`.`Dimension`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`Dimension` (
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
    REFERENCES `home`.`Object` (`id_object` , `Obj_Cons_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `home`.`Change_count`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `home`.`change_count` (
  `id_change` INT NOT NULL AUTO_INCREMENT,
  `Date_change` VARCHAR(45) NULL,
  `Cause_change` VARCHAR(45) NULL,
  `FIO_change` VARCHAR(45) NULL,
  `Nomber_old` VARCHAR(45) NOT NULL,
  `Nomber_new` VARCHAR(45) NOT NULL,
  `Counter_id_count` INT NOT NULL,
  PRIMARY KEY (`id_change`),
  INDEX `fk_Change_count_Counter1_idx` (`Counter_id_count` ASC),
  CONSTRAINT `fk_Change_count_Counter1`
    FOREIGN KEY (`Counter_id_count`)
    REFERENCES `home`.`Counter` (`id_count`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `home`.`Type_date`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`Type_date` (
  `id_Type` INT not NULL ,
  `Type` VARCHAR(2000) NOT NULL,
  PRIMARY KEY (`id_Type`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `home`.`Date_list`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`Date_list` (
  `id_Date` INT NOT NULL AUTO_INCREMENT,
  `Date_l` DATE NOT NULL,
  `Type_date_id` INT NOT NULL,
  PRIMARY KEY (`id_Date`, `Type_date_id`),
  INDEX `fk_Date_list_Type_date1_idx` (`Type_date_id` ASC),
  CONSTRAINT `fk_Date_list_Type_date1`
    FOREIGN KEY (`Type_date_id`)
    REFERENCES `home`.`Type_date` (`id_Type`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `home`.`All_dates`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `home`.`All_dates` (
  `Date_list_id` INT NOT NULL,
  `Counter_id_count` INT DEFAULT null,
  `Transfor_vol_id` INT DEFAULT null,
  `Transfor_cur_id` INT DEFAULT null ,
  `Conclusio` VARCHAR(45) NULL,
  `Notes` VARCHAR(45) NULL,
  PRIMARY KEY (`Date_list_id`),
  INDEX `fk_Date_list_has_Counter_Counter1_idx` (`Counter_id_count` ASC),
  INDEX `fk_Date_list_has_Counter_Date_list1_idx` (`Date_list_id` ASC),
  INDEX `fk_Date_list_has_Counter_Transfor_vol1_idx` (`Transfor_vol_id` ASC),
  INDEX `fk_Date_list_has_Counter_Transfor_cur1_idx` (`Transfor_cur_id` ASC),
  CONSTRAINT `fk_Date_list_has_Counter_Date_list1`
    FOREIGN KEY (`Date_list_id`)
    REFERENCES `home`.`Date_list` (`id_Date`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Date_list_has_Counter_Counter1`
    FOREIGN KEY (`Counter_id_count`)
    REFERENCES `home`.`Counter` (`id_count`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Date_list_has_Counter_Transfor_vol1`
    FOREIGN KEY (`Transfor_vol_id`)
    REFERENCES `home`.`Transfor_vol` (`id_tr_vol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Date_list_has_Counter_Transfor_cur1`
    FOREIGN KEY (`Transfor_cur_id`)
    REFERENCES `home`.`Transfor_cur` (`id_tr_cur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `home`. User (
  id INT NOT NULL AUTO_INCREMENT,
  Name  varchar(20),
  Password TEXT,
  PRIMARY KEY(id)
);


INSERT INTO Type_date (id_Type,Type)
VALUES ('1','инструментальная проверка счетчика');

INSERT INTO Type_date (id_Type,Type)
VALUES ('2','госпроверка счетчика');

INSERT INTO Type_date (id_Type,Type)
VALUES ('3','инструментальная проверка трансформатора тока');

INSERT INTO Type_date (id_Type,Type)
VALUES ('4','госпроверка трансформаторая тока');

INSERT INTO Type_date (id_Type,Type)
VALUES ('5','инструментальная проверка трансформатора напряжения');

INSERT INTO Type_date (id_Type,Type)
VALUES ('6','госпроверка трансформатора напряжения');



ALTER TABLE `home`.`change_count` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`Consumer` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`Counter` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`Dimension` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`Object` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`Plombs` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`Transfor_cur` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`Transfor_vol` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`User` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`Type_date` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`Date_list` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`All_dates` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;
ALTER TABLE `home`.`Phase_tr_cur` CONVERT TO CHARACTER SET utf8 COLLATE utf8_general_ci;