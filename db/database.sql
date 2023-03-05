CREATE DATABASE `sweetch` DEFAULT CHARACTER SET utf8mb4;

CREATE TABLE `age` (
                       `code` varchar(30) NOT NULL,
                       `description` varchar(255) NOT NULL,
                       `sort_order` int(11) NOT NULL,
                       PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `area` (
                        `code` varchar(30) NOT NULL,
                        `description` varchar(255) NOT NULL,
                        `sort_order` int(11) NOT NULL,
                        PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `data` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `year` int(11) NOT NULL,
                        `age` varchar(30) NOT NULL,
                        `ethnic` int(11) NOT NULL,
                        `sex` tinyint(4) NOT NULL,
                        `area` varchar(30) NOT NULL,
                        `count` int(11) NOT NULL,
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34959673 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `ethnic` (
                          `code` int(11) NOT NULL,
                          `description` varchar(255) NOT NULL,
                          `sort_order` int(11) NOT NULL,
                          PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `sex` (
                       `code` tinyint(4) NOT NULL,
                       `description` varchar(255) NOT NULL,
                       `sort_order` int(11) NOT NULL,
                       PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `year` (
                        `code` int(11) NOT NULL,
                        `description` varchar(255) NOT NULL,
                        `sort_order` int(11) NOT NULL,
                        PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
