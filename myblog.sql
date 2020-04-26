CREATE TABLE `users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `drink_counter` int(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`iduser`)
);

INSERT INTO `posts` (`iduser`, `name`, `email`, `drink_counter`) VALUES
(1,'Technology Post One', 'a@a.com',1),
(2,'Gaming Post One', 'a@a.com',2)
