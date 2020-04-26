CREATE TABLE `users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `drink_counter` int(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`iduser`)
);


CREATE TABLE `drink_counter_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iduserdc` int(11) NOT NULL,
  `namedc` varchar(255) NOT NULL,
  `drink_counterdc` int(50) NOT NULL,
  `created_atdc` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);
