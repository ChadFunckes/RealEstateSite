-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema CRE_Site
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema CRE_Site
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `CRE_Site` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `CRE_Site` ;

-- -----------------------------------------------------
-- Table `CRE_Site`.`User_Types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`User_Types` (
  `type_ID` CHAR(1) NOT NULL COMMENT '',
  `desc` TEXT NULL COMMENT '',
  PRIMARY KEY (`type_ID`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Subscription_types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Subscription_types` (
  `type` CHAR(1) NOT NULL COMMENT '',
  `start_time` DATETIME NOT NULL COMMENT '',
  `finish_time` DATETIME NOT NULL COMMENT '',
  `subs_benefits` TEXT NOT NULL COMMENT '',
  PRIMARY KEY (`type`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Users` (
  `user_ID` INT NOT NULL COMMENT '',
  `first` VARCHAR(15) NOT NULL COMMENT '',
  `last` VARCHAR(15) NOT NULL COMMENT '',
  `userName` VARCHAR(15) NOT NULL COMMENT '',
  `email` VARCHAR(45) NOT NULL COMMENT '',
  `password` VARCHAR(45) NOT NULL COMMENT '',
  `user_Type` CHAR(2) NOT NULL COMMENT '',
  `subs_type` CHAR(1) NOT NULL COMMENT '',
  `phone` INT NULL COMMENT '',
  `bio` TEXT NULL COMMENT '',
  `work_Hist` TEXT NULL COMMENT '',
  `skype_ID` VARCHAR(45) NULL COMMENT '',
  `password_reset_token` VARCHAR(45) NULL COMMENT '',
  `password_reset_exp` DATETIME NULL COMMENT '',
  `activation_token` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`user_ID`)  COMMENT '',
  INDEX `Type_FK_idx` (`user_Type` ASC)  COMMENT '',
  INDEX `fk_User_subscription type1_idx` (`subs_type` ASC)  COMMENT '',
  CONSTRAINT `Type_FK`
    FOREIGN KEY (`user_Type`)
    REFERENCES `CRE_Site`.`User_Types` (`type_ID`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `fk_User_subscription type1`
    FOREIGN KEY (`subs_type`)
    REFERENCES `CRE_Site`.`Subscription_types` (`type`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Tennants`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Tennants` (
  `tennantID` INT NOT NULL COMMENT '',
  `rent_Min` DOUBLE NULL COMMENT '',
  `rent_Max` DOUBLE NULL COMMENT '',
  `size_Min` DOUBLE NULL COMMENT '',
  `size_Max` DOUBLE NULL COMMENT '',
  `current_Rent` DOUBLE NULL COMMENT '',
  `current_Size` DOUBLE NULL COMMENT '',
  PRIMARY KEY (`tennantID`)  COMMENT '',
  CONSTRAINT `Tennant_user_FK`
    FOREIGN KEY (`tennantID`)
    REFERENCES `CRE_Site`.`Users` (`user_ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Property_Managers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Property_Managers` (
  `manager_ID` INT NOT NULL COMMENT '',
  `company` VARCHAR(15) NOT NULL COMMENT '',
  `company_Street` VARCHAR(15) NULL COMMENT '',
  `company_SuiteNum` VARCHAR(8) NULL COMMENT '',
  `company_City` VARCHAR(15) NULL COMMENT '',
  `company_State` CHAR(2) NULL COMMENT '',
  `company_Phone` INT NULL COMMENT '',
  PRIMARY KEY (`manager_ID`)  COMMENT '',
  CONSTRAINT `man_user_FK`
    FOREIGN KEY (`manager_ID`)
    REFERENCES `CRE_Site`.`Users` (`user_ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Appraisers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Appraisers` (
  `appraiser_ID` INT NOT NULL COMMENT '',
  `company` VARCHAR(15) NULL COMMENT '',
  `company_Street` VARCHAR(15) NULL COMMENT '',
  `company_SuiteNum` VARCHAR(8) NULL COMMENT '',
  `company_City` VARCHAR(15) NULL COMMENT '',
  `company_State` CHAR(2) NULL COMMENT '',
  `company_Phone` INT NULL COMMENT '',
  PRIMARY KEY (`appraiser_ID`)  COMMENT '',
  CONSTRAINT `appraiser_user_FK`
    FOREIGN KEY (`appraiser_ID`)
    REFERENCES `CRE_Site`.`Users` (`user_ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`CRE_Agents`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`CRE_Agents` (
  `cre_ID` INT NOT NULL COMMENT '',
  `company_name` VARCHAR(45) NOT NULL COMMENT '',
  `rating` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`cre_ID`)  COMMENT '',
  INDEX `fk_CRE_Agent_User1_idx` (`cre_ID` ASC)  COMMENT '',
  CONSTRAINT `fk_CRE_Agent_User1`
    FOREIGN KEY (`cre_ID`)
    REFERENCES `CRE_Site`.`Users` (`user_ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Corporate_Investors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Corporate_Investors` (
  `corporate_investor_ID` INT NOT NULL COMMENT '',
  `company_name` VARCHAR(105) NOT NULL COMMENT '',
  `funds_want_investing` INT(15) NOT NULL COMMENT '',
  `investment_portfolio` TEXT NOT NULL COMMENT '',
  `max_price` DOUBLE NOT NULL COMMENT '',
  `min_price` DOUBLE NOT NULL COMMENT '',
  `size_Min` DOUBLE NOT NULL COMMENT '',
  `size_Max` DOUBLE NOT NULL COMMENT '',
  `current_price_rates` DOUBLE NOT NULL COMMENT '',
  `current_size` DOUBLE NOT NULL COMMENT '',
  PRIMARY KEY (`corporate_investor_ID`)  COMMENT '',
  INDEX `fk_Corporate Investors_User1_idx` (`corporate_investor_ID` ASC)  COMMENT '',
  CONSTRAINT `fk_Corporate Investors_User1`
    FOREIGN KEY (`corporate_investor_ID`)
    REFERENCES `CRE_Site`.`Users` (`user_ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Lenders_mortgage_brokers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Lenders_mortgage_brokers` (
  `lender_ID` INT NOT NULL COMMENT '',
  `company_name` VARCHAR(15) NOT NULL COMMENT '',
  `lender_client_history` VARCHAR(255) NOT NULL COMMENT '',
  `lender_rating` VARCHAR(45) NOT NULL COMMENT '',
  `company_Street` VARCHAR(15) NOT NULL COMMENT '',
  `company_City` VARCHAR(15) NOT NULL COMMENT '',
  `company_State` CHAR(2) NOT NULL COMMENT '',
  `company_Phone` INT NOT NULL COMMENT '',
  PRIMARY KEY (`lender_ID`)  COMMENT '',
  CONSTRAINT `fk_Lenders_User1`
    FOREIGN KEY (`lender_ID`)
    REFERENCES `CRE_Site`.`Users` (`user_ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Owner_Investors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Owner_Investors` (
  `owner_Investor_ID` INT NOT NULL COMMENT '',
  `max_price` DOUBLE NOT NULL COMMENT '',
  `min_price` DOUBLE NOT NULL COMMENT '',
  `size_Min` DOUBLE NULL COMMENT '',
  `size_Max` DOUBLE NULL COMMENT '',
  `current_price_rates` DOUBLE NULL COMMENT '',
  `current_size` DOUBLE NULL COMMENT '',
  PRIMARY KEY (`owner_Investor_ID`)  COMMENT '',
  CONSTRAINT `fk_Owner Investor_User1`
    FOREIGN KEY (`owner_Investor_ID`)
    REFERENCES `CRE_Site`.`Users` (`user_ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Developers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Developers` (
  `developer_ID` INT NOT NULL COMMENT '',
  `developer_rating` VARCHAR(45) NULL COMMENT '',
  `developer_project_portfolio` VARCHAR(255) NULL COMMENT '',
  `Company_Phone` INT NOT NULL COMMENT '',
  `Company_Street` VARCHAR(15) NOT NULL COMMENT '',
  `Company_City` VARCHAR(15) NOT NULL COMMENT '',
  `Company_State` CHAR(2) NOT NULL COMMENT '',
  PRIMARY KEY (`developer_ID`)  COMMENT '',
  CONSTRAINT `fk_Developer_User1`
    FOREIGN KEY (`developer_ID`)
    REFERENCES `CRE_Site`.`Users` (`user_ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Lands`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Lands` (
  `idLand` INT NOT NULL COMMENT '',
  `northEast` DOUBLE NULL COMMENT '',
  `northWest` DOUBLE NULL COMMENT '',
  `southEast` DOUBLE NULL COMMENT '',
  `southWest` DOUBLE NULL COMMENT '',
  `actualSize` DOUBLE NOT NULL COMMENT '',
  `county` VARCHAR(10) NOT NULL COMMENT '',
  `city` VARCHAR(10) NOT NULL COMMENT '',
  PRIMARY KEY (`idLand`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`PropertyTypes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`PropertyTypes` (
  `type` CHAR(1) NOT NULL COMMENT '',
  `description` TEXT NULL COMMENT '',
  PRIMARY KEY (`type`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Properties`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Properties` (
  `idProperty` INT NOT NULL COMMENT '',
  `mainImage` VARCHAR(45) NULL COMMENT '',
  `listingType` CHAR(1) NULL COMMENT '',
  `propTitle` VARCHAR(45) NOT NULL COMMENT '',
  `propDetails` TEXT NOT NULL COMMENT '',
  `propPrice` DOUBLE NULL COMMENT '',
  `propType` CHAR(1) NOT NULL COMMENT '',
  `propLoc` VARCHAR(45) NOT NULL COMMENT '',
  `propSize` DOUBLE NOT NULL COMMENT '',
  `agent` INT NOT NULL COMMENT '',
  `propImages` INT NULL COMMENT '',
  `propManager` INT NULL COMMENT '',
  PRIMARY KEY (`idProperty`)  COMMENT '',
  INDEX `prop_list_type_FK_idx` (`propType` ASC)  COMMENT '',
  INDEX `prop_agent_FK_idx` (`agent` ASC)  COMMENT '',
  INDEX `porp_propmngr_FK_idx` (`propManager` ASC)  COMMENT '',
  CONSTRAINT `prop_list_type_FK`
    FOREIGN KEY (`propType`)
    REFERENCES `CRE_Site`.`PropertyTypes` (`type`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `prop_agent_FK`
    FOREIGN KEY (`agent`)
    REFERENCES `CRE_Site`.`CRE_Agents` (`cre_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `porp_propmngr_FK`
    FOREIGN KEY (`propManager`)
    REFERENCES `CRE_Site`.`Property_Managers` (`manager_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Property_Images`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Property_Images` (
  `idImages` INT NOT NULL COMMENT '',
  `propID` INT NULL COMMENT '',
  `image` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`idImages`)  COMMENT '',
  INDEX `propImages_propID_FK_idx` (`propID` ASC)  COMMENT '',
  CONSTRAINT `propImages_propID_FK`
    FOREIGN KEY (`propID`)
    REFERENCES `CRE_Site`.`Properties` (`idProperty`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Listed_Lands`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Listed_Lands` (
  `land_ID` INT NOT NULL COMMENT '',
  `agent_ID` INT NOT NULL COMMENT '',
  PRIMARY KEY (`land_ID`, `agent_ID`)  COMMENT '',
  INDEX `Land_agent_ID_FK_idx` (`agent_ID` ASC)  COMMENT '',
  CONSTRAINT `lands_ID_FK`
    FOREIGN KEY (`land_ID`)
    REFERENCES `CRE_Site`.`Lands` (`idLand`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `Land_agent_ID_FK`
    FOREIGN KEY (`agent_ID`)
    REFERENCES `CRE_Site`.`CRE_Agents` (`cre_ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Listed_Properties`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Listed_Properties` (
  `propID` INT NOT NULL COMMENT '',
  `Agent_ID` INT NOT NULL COMMENT '',
  PRIMARY KEY (`propID`, `Agent_ID`)  COMMENT '',
  INDEX `prop_agentID_FK_idx` (`Agent_ID` ASC)  COMMENT '',
  CONSTRAINT `propID_FK`
    FOREIGN KEY (`propID`)
    REFERENCES `CRE_Site`.`Properties` (`idProperty`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `prop_agentID_FK`
    FOREIGN KEY (`Agent_ID`)
    REFERENCES `CRE_Site`.`CRE_Agents` (`cre_ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Testimonials`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Testimonials` (
  `fromID` INT NOT NULL COMMENT '',
  `forID` INT NOT NULL COMMENT '',
  `Testimonial` TEXT NULL COMMENT '',
  PRIMARY KEY (`fromID`, `forID`)  COMMENT '',
  INDEX `test_userID_FK_idx` (`forID` ASC)  COMMENT '',
  CONSTRAINT `test_devID_FK`
    FOREIGN KEY (`fromID`)
    REFERENCES `CRE_Site`.`Users` (`user_ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `test_userID_FK`
    FOREIGN KEY (`forID`)
    REFERENCES `CRE_Site`.`Users` (`user_ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Interest_propTypes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Interest_propTypes` (
  `user_id` INT NOT NULL COMMENT 'user ID\'s are the same accross all subclass types...this is not connected directly to tables for efficiency',
  `prop_type` CHAR(1) NOT NULL COMMENT '',
  PRIMARY KEY (`user_id`, `prop_type`)  COMMENT '',
  INDEX `proptype_propTypeID_FK_idx` (`prop_type` ASC)  COMMENT '',
  CONSTRAINT `user_ID_FK`
    FOREIGN KEY (`user_id`)
    REFERENCES `CRE_Site`.`Users` (`user_ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `proptype_propTypeID_FK`
    FOREIGN KEY (`prop_type`)
    REFERENCES `CRE_Site`.`PropertyTypes` (`type`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Interested_lands`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Interested_lands` (
  `land_ID` INT NOT NULL COMMENT '',
  `User_ID` INT NOT NULL COMMENT '',
  PRIMARY KEY (`land_ID`, `User_ID`)  COMMENT '',
  INDEX `interstedLand_UserID_FK_idx` (`User_ID` ASC)  COMMENT '',
  CONSTRAINT `interested_landID_FK`
    FOREIGN KEY (`land_ID`)
    REFERENCES `CRE_Site`.`Lands` (`idLand`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `interstedLand_UserID_FK`
    FOREIGN KEY (`User_ID`)
    REFERENCES `CRE_Site`.`Users` (`user_ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Interested_Properties`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Interested_Properties` (
  `PropID` INT NOT NULL COMMENT '',
  `User_ID` INT NOT NULL COMMENT '',
  PRIMARY KEY (`PropID`, `User_ID`)  COMMENT '',
  INDEX `interestedproperty_User_FK_idx` (`User_ID` ASC)  COMMENT '',
  CONSTRAINT `interested_property_FK`
    FOREIGN KEY (`PropID`)
    REFERENCES `CRE_Site`.`Properties` (`idProperty`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `interestedproperty_User_FK`
    FOREIGN KEY (`User_ID`)
    REFERENCES `CRE_Site`.`Users` (`user_ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `CRE_Site`.`Ratings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `CRE_Site`.`Ratings` (
  `from_id` INT NOT NULL COMMENT '',
  `rated_id` INT NOT NULL COMMENT '',
  `up_down` TINYINT NULL COMMENT '',
  `Comment` TEXT NULL COMMENT '',
  PRIMARY KEY (`from_id`, `rated_id`)  COMMENT '',
  INDEX `rating_to_fk_idx` (`rated_id` ASC)  COMMENT '',
  CONSTRAINT `rating_from_fk`
    FOREIGN KEY (`from_id`)
    REFERENCES `CRE_Site`.`Users` (`user_ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `rating_to_fk`
    FOREIGN KEY (`rated_id`)
    REFERENCES `CRE_Site`.`Users` (`user_ID`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
