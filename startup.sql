CREATE DATABASE security_test;

use security_test:

CREATE TABLE `m_user` (
  `id` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `regist_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO `m_user` values ('test', 'test', now(), null);