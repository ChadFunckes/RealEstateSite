-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2016 at 11:01 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12


USE cresite;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
--
-- Table structure for table `appraisers`
--

CREATE TABLE IF NOT EXISTS `appraisers` (
  `appraiser_ID` int(11) NOT NULL,
  `company` varchar(15) DEFAULT NULL,
  `company_Street` varchar(15) DEFAULT NULL,
  `company_SuiteNum` varchar(8) DEFAULT NULL,
  `company_City` varchar(15) DEFAULT NULL,
  `company_State` char(2) DEFAULT NULL,
  `company_Phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `corporate_investors`
--

CREATE TABLE IF NOT EXISTS `corporate_investors` (
  `corporate_investor_ID` int(11) NOT NULL,
  `company_name` varchar(105) NOT NULL,
  `funds_want_investing` int(15) NOT NULL,
  `investment_portfolio` text NOT NULL,
  `max_price` double NOT NULL,
  `min_price` double NOT NULL,
  `size_Min` double NOT NULL,
  `size_Max` double NOT NULL,
  `current_price_rates` double NOT NULL,
  `current_size` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cre_agents`
--

CREATE TABLE IF NOT EXISTS `cre_agents` (
  `cre_ID` int(11) NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `rating` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE IF NOT EXISTS `developers` (
  `developer_ID` int(11) NOT NULL,
  `developer_rating` varchar(45) DEFAULT NULL,
  `developer_project_portfolio` varchar(255) DEFAULT NULL,
  `Company_Phone` int(11) NOT NULL,
  `Company_Street` varchar(15) NOT NULL,
  `Company_City` varchar(15) NOT NULL,
  `Company_State` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `interested_lands`
--

CREATE TABLE IF NOT EXISTS `interested_lands` (
  `land_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `interested_properties`
--

CREATE TABLE IF NOT EXISTS `interested_properties` (
  `PropID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `interest_proptypes`
--

CREATE TABLE IF NOT EXISTS `interest_proptypes` (
  `user_id` int(11) NOT NULL COMMENT 'user ID''s are the same accross all subclass types...this is not connected directly to tables for efficiency',
  `prop_type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lands`
--

CREATE TABLE IF NOT EXISTS `lands` (
  `idLand` int(11) NOT NULL,
  `northEast` double DEFAULT NULL,
  `northWest` double DEFAULT NULL,
  `southEast` double DEFAULT NULL,
  `southWest` double DEFAULT NULL,
  `actualSize` double NOT NULL,
  `county` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lenders_mortgage_brokers`
--

CREATE TABLE IF NOT EXISTS `lenders_mortgage_brokers` (
  `lender_ID` int(11) NOT NULL,
  `company_name` varchar(15) NOT NULL,
  `lender_client_history` varchar(255) NOT NULL,
  `lender_rating` varchar(45) NOT NULL,
  `company_Street` varchar(15) NOT NULL,
  `company_City` varchar(15) NOT NULL,
  `company_State` char(2) NOT NULL,
  `company_Phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `listed_lands`
--

CREATE TABLE IF NOT EXISTS `listed_lands` (
  `land_ID` int(11) NOT NULL,
  `agent_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `listed_properties`
--

CREATE TABLE IF NOT EXISTS `listed_properties` (
  `propID` int(11) NOT NULL,
  `Agent_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `owner_investors`
--

CREATE TABLE IF NOT EXISTS `owner_investors` (
  `owner_Investor_ID` int(11) NOT NULL,
  `max_price` double NOT NULL,
  `min_price` double NOT NULL,
  `size_Min` double DEFAULT NULL,
  `size_Max` double DEFAULT NULL,
  `current_price_rates` double DEFAULT NULL,
  `current_size` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE IF NOT EXISTS `properties` (
  `idProperty` int(11) NOT NULL,
  `mainImage` varchar(45) DEFAULT NULL,
  `listingType` char(1) DEFAULT NULL,
  `propTitle` varchar(45) NOT NULL,
  `propDetails` text NOT NULL,
  `propPrice` double DEFAULT NULL,
  `propType` char(1) NOT NULL,
  `propLoc` varchar(45) NOT NULL,
  `propSize` double NOT NULL,
  `agent` int(11) NOT NULL,
  `propImages` int(11) DEFAULT NULL,
  `propManager` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `propertytypes`
--

CREATE TABLE IF NOT EXISTS `propertytypes` (
  `type` char(1) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE IF NOT EXISTS `property_images` (
  `idImages` int(11) NOT NULL,
  `propID` int(11) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `property_managers`
--

CREATE TABLE IF NOT EXISTS `property_managers` (
  `manager_ID` int(11) NOT NULL,
  `company` varchar(15) NOT NULL,
  `company_Street` varchar(15) DEFAULT NULL,
  `company_SuiteNum` varchar(8) DEFAULT NULL,
  `company_City` varchar(15) DEFAULT NULL,
  `company_State` char(2) DEFAULT NULL,
  `company_Phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `from_id` int(11) NOT NULL,
  `rated_id` int(11) NOT NULL,
  `up_down` tinyint(4) DEFAULT NULL,
  `Comment` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_types`
--

CREATE TABLE IF NOT EXISTS `subscription_types` (
  `type` char(1) NOT NULL,
  `start_time` datetime NOT NULL,
  `finish_time` datetime NOT NULL,
  `subs_benefits` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscription_types`
--

INSERT INTO `subscription_types` (`type`, `start_time`, `finish_time`, `subs_benefits`) VALUES
('a', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'default type');

-- --------------------------------------------------------

--
-- Table structure for table `tennants`
--

CREATE TABLE IF NOT EXISTS `tennants` (
  `tennantID` int(11) NOT NULL,
  `rent_Min` double DEFAULT NULL,
  `rent_Max` double DEFAULT NULL,
  `size_Min` double DEFAULT NULL,
  `size_Max` double DEFAULT NULL,
  `current_Rent` double DEFAULT NULL,
  `current_Size` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE IF NOT EXISTS `testimonials` (
  `fromID` int(11) NOT NULL,
  `forID` int(11) NOT NULL,
  `Testimonial` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `first` varchar(15) NOT NULL,
  `last` varchar(15) NOT NULL,
  `userName` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `user_Type` char(2) NOT NULL,
  `subs_type` char(1) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `bio` text,
  `work_Hist` text,
  `skype_ID` varchar(45) DEFAULT NULL,
  `password_reset_token` varchar(45) DEFAULT NULL,
  `password_reset_exp` datetime DEFAULT NULL,
  `activation_token` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`first`, `last`, `userName`, `email`, `password`, `user_Type`, `subs_type`, `phone`, `bio`, `work_Hist`, `skype_ID`, `password_reset_token`, `password_reset_exp`, `activation_token`) VALUES
('jerry', 'curl', 'jcurl', 'jcurl@test.com', '12345', 'C', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `type_ID` char(1) NOT NULL,
  `desc` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`type_ID`, `desc`) VALUES
('C', 'commercial agents');
INSERT INTO `user_types` (`type_ID`, `desc`) VALUES
('A', 'default user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appraisers`
--
ALTER TABLE `appraisers`
  ADD PRIMARY KEY (`appraiser_ID`);

--
-- Indexes for table `corporate_investors`
--
ALTER TABLE `corporate_investors`
  ADD PRIMARY KEY (`corporate_investor_ID`),
  ADD KEY `fk_Corporate Investors_User1_idx` (`corporate_investor_ID`);

--
-- Indexes for table `cre_agents`
--
ALTER TABLE `cre_agents`
  ADD PRIMARY KEY (`cre_ID`),
  ADD KEY `fk_CRE_Agent_User1_idx` (`cre_ID`);

--
-- Indexes for table `developers`
--
ALTER TABLE `developers`
  ADD PRIMARY KEY (`developer_ID`);

--
-- Indexes for table `interested_lands`
--
ALTER TABLE `interested_lands`
  ADD PRIMARY KEY (`land_ID`,`User_ID`),
  ADD KEY `interstedLand_UserID_FK_idx` (`User_ID`);

--
-- Indexes for table `interested_properties`
--
ALTER TABLE `interested_properties`
  ADD PRIMARY KEY (`PropID`,`User_ID`),
  ADD KEY `interestedproperty_User_FK_idx` (`User_ID`);

--
-- Indexes for table `interest_proptypes`
--
ALTER TABLE `interest_proptypes`
  ADD PRIMARY KEY (`user_id`,`prop_type`),
  ADD KEY `proptype_propTypeID_FK_idx` (`prop_type`);

--
-- Indexes for table `lands`
--
ALTER TABLE `lands`
  ADD PRIMARY KEY (`idLand`);

--
-- Indexes for table `lenders_mortgage_brokers`
--
ALTER TABLE `lenders_mortgage_brokers`
  ADD PRIMARY KEY (`lender_ID`);

--
-- Indexes for table `listed_lands`
--
ALTER TABLE `listed_lands`
  ADD PRIMARY KEY (`land_ID`,`agent_ID`),
  ADD KEY `Land_agent_ID_FK_idx` (`agent_ID`);

--
-- Indexes for table `listed_properties`
--
ALTER TABLE `listed_properties`
  ADD PRIMARY KEY (`propID`,`Agent_ID`),
  ADD KEY `prop_agentID_FK_idx` (`Agent_ID`);

--
-- Indexes for table `owner_investors`
--
ALTER TABLE `owner_investors`
  ADD PRIMARY KEY (`owner_Investor_ID`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`idProperty`),
  ADD KEY `prop_list_type_FK_idx` (`propType`),
  ADD KEY `prop_agent_FK_idx` (`agent`),
  ADD KEY `porp_propmngr_FK_idx` (`propManager`);

--
-- Indexes for table `propertytypes`
--
ALTER TABLE `propertytypes`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `property_images`
--
ALTER TABLE `property_images`
  ADD PRIMARY KEY (`idImages`),
  ADD KEY `propImages_propID_FK_idx` (`propID`);

--
-- Indexes for table `property_managers`
--
ALTER TABLE `property_managers`
  ADD PRIMARY KEY (`manager_ID`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`from_id`,`rated_id`),
  ADD KEY `rating_to_fk_idx` (`rated_id`);

--
-- Indexes for table `subscription_types`
--
ALTER TABLE `subscription_types`
  ADD PRIMARY KEY (`type`);

--
-- Indexes for table `tennants`
--
ALTER TABLE `tennants`
  ADD PRIMARY KEY (`tennantID`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`fromID`,`forID`),
  ADD KEY `test_userID_FK_idx` (`forID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD USER_ID INT PRIMARY KEY AUTO_INCREMENT,
  ADD KEY `Type_FK_idx` (`user_Type`),
  ADD KEY `fk_User_subscription type1_idx` (`subs_type`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`type_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appraisers`
--
ALTER TABLE `appraisers`
  ADD CONSTRAINT `appraiser_user_FK` FOREIGN KEY (`appraiser_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `corporate_investors`
--
ALTER TABLE `corporate_investors`
  ADD CONSTRAINT `fk_Corporate Investors_User1` FOREIGN KEY (`corporate_investor_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `cre_agents`
--
ALTER TABLE `cre_agents`
  ADD CONSTRAINT `fk_CRE_Agent_User1` FOREIGN KEY (`cre_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `developers`
--
ALTER TABLE `developers`
  ADD CONSTRAINT `fk_Developer_User1` FOREIGN KEY (`developer_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `interested_lands`
--
ALTER TABLE `interested_lands`
  ADD CONSTRAINT `interested_landID_FK` FOREIGN KEY (`land_ID`) REFERENCES `lands` (`idLand`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `interstedLand_UserID_FK` FOREIGN KEY (`User_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `interested_properties`
--
ALTER TABLE `interested_properties`
  ADD CONSTRAINT `interested_property_FK` FOREIGN KEY (`PropID`) REFERENCES `properties` (`idProperty`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `interestedproperty_User_FK` FOREIGN KEY (`User_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `interest_proptypes`
--
ALTER TABLE `interest_proptypes`
  ADD CONSTRAINT `proptype_propTypeID_FK` FOREIGN KEY (`prop_type`) REFERENCES `propertytypes` (`type`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ID_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `lenders_mortgage_brokers`
--
ALTER TABLE `lenders_mortgage_brokers`
  ADD CONSTRAINT `fk_Lenders_User1` FOREIGN KEY (`lender_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `listed_lands`
--
ALTER TABLE `listed_lands`
  ADD CONSTRAINT `Land_agent_ID_FK` FOREIGN KEY (`agent_ID`) REFERENCES `cre_agents` (`cre_ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `lands_ID_FK` FOREIGN KEY (`land_ID`) REFERENCES `lands` (`idLand`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `listed_properties`
--
ALTER TABLE `listed_properties`
  ADD CONSTRAINT `propID_FK` FOREIGN KEY (`propID`) REFERENCES `properties` (`idProperty`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `prop_agentID_FK` FOREIGN KEY (`Agent_ID`) REFERENCES `cre_agents` (`cre_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `owner_investors`
--
ALTER TABLE `owner_investors`
  ADD CONSTRAINT `fk_Owner Investor_User1` FOREIGN KEY (`owner_Investor_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `porp_propmngr_FK` FOREIGN KEY (`propManager`) REFERENCES `property_managers` (`manager_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prop_agent_FK` FOREIGN KEY (`agent`) REFERENCES `cre_agents` (`cre_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `prop_list_type_FK` FOREIGN KEY (`propType`) REFERENCES `propertytypes` (`type`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `property_images`
--
ALTER TABLE `property_images`
  ADD CONSTRAINT `propImages_propID_FK` FOREIGN KEY (`propID`) REFERENCES `properties` (`idProperty`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `property_managers`
--
ALTER TABLE `property_managers`
  ADD CONSTRAINT `man_user_FK` FOREIGN KEY (`manager_ID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `rating_from_fk` FOREIGN KEY (`from_id`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `rating_to_fk` FOREIGN KEY (`rated_id`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tennants`
--
ALTER TABLE `tennants`
  ADD CONSTRAINT `Tennant_user_FK` FOREIGN KEY (`tennantID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `test_devID_FK` FOREIGN KEY (`fromID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `test_userID_FK` FOREIGN KEY (`forID`) REFERENCES `users` (`user_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `Type_FK` FOREIGN KEY (`user_Type`) REFERENCES `user_types` (`type_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_User_subscription type1` FOREIGN KEY (`subs_type`) REFERENCES `subscription_types` (`type`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Add templogin table
--
CREATE TABLE IF NOT EXISTS `tempLogin` ( `email` VARCHAR(45) NOT NULL , `code` INT(30) NOT NULL );
ALTER TABLE `tempLogin` ADD PRIMARY KEY(`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
