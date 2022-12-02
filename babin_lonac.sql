CREATE TABLE IF NOT EXISTS `kategorija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `jelo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(100) NOT NULL,
  `kategorija_id` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `slika` varchar(100) NOT NULL,
  `opis` text NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_kategorija` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorija` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `korisnik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(100) NOT NULL,
  `korisnicko_ime` varchar(100) NOT NULL UNIQUE,
  `lozinka` varchar(100) NOT NULL,
  `prezime` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE IF NOT EXISTS `porudzbina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datum_porudzbine` timestamp NOT NULL DEFAULT current_timestamp(),
  `iznos` int(11) NOT NULL,
  `isporucena` bit(1) NOT NULL DEFAULT b'0',
  `adresa` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `stavka_porudzbine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `porudzbina_id` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL,
  `proizvod_id` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_JELO_STAVKA` FOREIGN KEY (`proizvod_id`) REFERENCES `jelo` (`id`),
  CONSTRAINT `FK_PORUDZ_STAVKA` FOREIGN KEY (`porudzbina_id`) REFERENCES `porudzbina` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `kategorija` (`id`, `naziv`) VALUES
(1, 'Doručak'),
(2, 'Glavno jelo'),
(3, 'Večera'),
(4, 'Dezerti');

INSERT INTO `jelo` (`id`, `naziv`, `kategorija_id`, `cena`, `slika`, `opis`) VALUES
(1, 'Tortilje', 1, 600, '', 'Meksicka hrana'),
(2, 'Prženi Ravioli', 1, 500, '', ''),
(3, 'Pohovane pečurke', 1, 650, '', ''),
(4, 'Mozzarella štapići', 1, 820, '', ''),
(5, 'Pečena punjena piletina', 2, 1600, '', ''),
(6, 'Pasta sa piletinom i pečurkama', 2, 1800, '', ''),
(7, 'Lazanje sa mesom', 2, 1000, '', ''),
(8, 'Pizza Toscana', 2, 1400, '', ''),
(9, 'Govedina sa đumbirom', 3, 800, '', ''),
(10, 'Hrskava pržena piletina', 3, 850, '', ''),
(11, 'Mongolski škampi i brokoli', 3, 900, '', ''),
(12, 'Začinjeni losos sa kokosom', 3, 1000, '', ''),
(13, 'Čokoladna torta', 4, 860, '', ''),
(14, 'Knedle sa čokoladom i višnjama', 4, 950, '', ''),
(15, 'Voćni kolač', 4, 750, '', ''),
(16, 'Cheesecake sa vanilom', 4, 560, '', '');

INSERT INTO `korisnik` (`id`, `ime`, `korisnicko_ime`, `lozinka`, `prezime`) VALUES
(1, 'Natasa', 'natasa', 'natasa', 'Maric');

INSERT INTO `porudzbina` (`id`, `datum_porudzbine`, `iznos`, `isporucena`, `adresa`) VALUES
(1, '2022-11-02 23:00:00', 0, b'0', 'AA'),
(2, '2022-11-03 00:33:03', 0, b'0', 'ZZ'),
(3, '2022-11-03 00:36:52', 0, b'0', 'q');

INSERT INTO `stavka_porudzbine` (`id`, `porudzbina_id`, `kolicina`, `proizvod_id`, `cena`) VALUES
(1, 2, 1, 13, 860),
(2, 3, 1, 16, 560);