
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `Gender` enum('Male','Female') NOT NULL DEFAULT 'Male',
  `Title` varchar(6) NOT NULL,
  `First` varchar(16) NOT NULL,
  `Last` varchar(32) NOT NULL,
  `Street` varchar(48) NOT NULL,
  `City` varchar(40) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Zip` varchar(32) NOT NULL,
  `Email` varchar(48) NOT NULL,
  `UserName` varchar(32) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `DOB` int(16) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Picture` varchar(64) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


