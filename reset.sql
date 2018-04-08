SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


DROP TABLE IF EXISTS `passenger`;
CREATE TABLE `passenger` (
  `bid` bigint(20) UNSIGNED NOT NULL,
  `passenger` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `bid`;
CREATE TABLE `bid` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car` bigint(20) UNSIGNED NOT NULL,
  `departureTime` varchar(20) NOT NULL,
  `fromCompany` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `driver` bigint(20) UNSIGNED NOT NULL,
  `numberSeats` int(2) NOT NULL,
  `licencePlate` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `surname` varchar(64) NOT NULL,
  `login` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `salt` varchar(128) NOT NULL,
  `address` varchar(512) NOT NULL,
  `company` bigint(20) UNSIGNED NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `address` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `bid`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `car` (`car`);

ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `driver` (`driver`);

ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `passenger`
  ADD PRIMARY KEY (`bid`,`passenger`),
  ADD KEY `bid` (`bid`),
  ADD KEY `passenger` (`passenger`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `company` (`company`);

ALTER TABLE `bid`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `car`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;


ALTER TABLE `company`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`car`) REFERENCES `car` (`id`) ON UPDATE CASCADE;

ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`driver`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

ALTER TABLE `passenger`
  ADD CONSTRAINT `passenger_ibfk_1` FOREIGN KEY (`passenger`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `passenger_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `bid` (`id`) ON UPDATE CASCADE;

ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`company`) REFERENCES `company` (`id`) ON UPDATE CASCADE;

INSERT INTO company (name, address) VALUES ("Company1","Address1");
COMMIT;