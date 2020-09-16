-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2020 at 08:49 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `milica`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `žanr` varchar(50) NOT NULL,
  `u_bioskopu` tinyint(1) NOT NULL,
  `trailer` text NOT NULL,
  `uskoro` tinyint(1) NOT NULL,
  `trajanje` int(11) NOT NULL,
  `glumci` text NOT NULL,
  `direktor` varchar(50) NOT NULL,
  `kontent` text NOT NULL,
  `godina` int(11) NOT NULL,
  `slika` text NOT NULL,
  `dan` text NOT NULL,
  `vreme` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `naziv`, `žanr`, `u_bioskopu`, `trailer`, `uskoro`, `trajanje`, `glumci`, `direktor`, `kontent`, `godina`, `slika`, `dan`, `vreme`) VALUES
(2, 'Avengers: Endgame', 'Action, Adventure, Drama', 0, 'https://www.youtube.com/watch?v=TcMBFSGVi1c', 0, 181, 'Robert Downey Jr., Chris Evans, Mark Ruffalo', 'Anthony Russo, Joe Russo', 'After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos actions and restore balance to the universe.', 2019, 'https://images8.alphacoders.com/100/thumb-1920-1003220.png', 'sreda', '22:00'),
(3, 'Captain America: Civil War', 'Action, Adventure, Sci-Fi', 0, 'https://www.youtube.com/watch?v=dKrVegVI0Us', 0, 147, 'Chris Evans, Robert Downey Jr., Scarlett Johansson', 'Anthony Russo, Joe Russo', 'Political involvement in the Avengers affairs causes a rift between Captain America and Iron Man.', 2018, 'https://i.pinimg.com/originals/b0/11/c7/b011c774ae6cb8c62b4e6b733ff2716f.jpg', 'utorak', '18:00'),
(4, 'Joker', 'Crime, Drama, Thriller', 0, 'https://www.youtube.com/watch?v=zAGVQLHvwOY', 0, 122, 'Joaquin Phoenix, Robert De Niro, Zazie Beetz', 'Todd Phillips', 'In Gotham City, mentally troubled comedian Arthur Fleck is disregarded and mistreated by society. He then embarks on a downward spiral of revolution and bloody crime. This path brings him face-to-face with his alter-ego: the Joker.', 2019, 'https://images.hdqwalls.com/wallpapers/joker-movie-2019-poster-0n.jpg', 'nedelja', '19:00'),
(5, 'The Lion King', 'Animation, Adventure, Drama', 0, 'https://www.youtube.com/watch?v=GibiNy4d4gc', 0, 118, 'Donald Glover, Beyoncé, Seth Rogen', 'Jon Favreau', 'After the murder of his father, a young lion prince flees his kingdom only to learn the true meaning of responsibility and bravery.', 2019, 'https://images.alphacoders.com/995/995566.jpg', 'petak', '15:00'),
(6, 'Interstellar', 'Adventure, Drama, Sci-Fi', 0, 'https://www.youtube.com/watch?v=2LqzF5WauAw', 0, 169, 'Matthew McConaughey, Anne Hathaway, Jessica Chastain', 'Christopher Nolan', 'A team of explorers travel through a wormhole in space in an attempt to ensure humanitys survival.', 2014, 'https://www.hdwallpaper.nu/wp-content/uploads/2017/06/interstellar-6.jpg', 'ponedeljak', '21:00'),
(7, 'The Secrets We Keep', 'Drama, Thriller', 0, 'https://www.youtube.com/watch?v=kGKX5rzRMho', 1, 97, 'Noomi Rapace, Joel Kinnaman, Chris Messina', 'Yuval Adler', 'In post-WWII America, a woman, rebuilding her life in the suburbs with her husband, kidnaps her neighbor and seeks vengeance for the heinous war crimes she believes he committed against her', 2020, 'https://www.cinemahalls.com/wp-content/uploads/2020/08/The-Secrets-We-Keep-Hollywood-Movie-Wallpaper-Cinema.jpg', '', ''),
(8, 'Wonder Woman 1984', 'Action, Adventure, Fantasy', 0, 'https://www.youtube.com/watch?v=XW2E2Fnh52w', 1, 151, 'Pedro Pascal, Gal Gadot, Robin Wright', 'Patty Jenkins', 'Fast forward to the 1980s as Wonder Womans next big screen adventure finds her facing two all-new foes: Max Lord and The Cheetah.', 2020, 'https://images.hdqwalls.com/wallpapers/wonder-woman-1984-4k-2020-4g.jpg', '', ''),
(12, 'Black Widow', 'Action, Adventure, Sci-Fi', 0, 'https://www.youtube.com/watch?v=RxAtuMu_ph4', 1, 136, 'Scarlett Johansson, Florence Pugh, Robert Downey Jr.', 'Cate Shortland', 'A film about Natasha Romanoff in her quests between the films Civil War and Infinity War.', 2020, 'https://free4kwallpapers.com/uploads/originals/2020/03/13/black-widow-wallpaper.png', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `email`, `password`, `is_admin`) VALUES
(3, 'GaGi', 'gagi@gagi.com', '4ed19dc084d50fdff56cddefd81128a2', 1),
(4, 'milica', 'milica@milica.com', 'f48690ed52f7c726712fcfe39435921d', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rezervacija`
--

CREATE TABLE `rezervacija` (
  `id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `telefon` text NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `banka` varchar(50) NOT NULL,
  `datum` date NOT NULL,
  `ime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rezervacija`
--

INSERT INTO `rezervacija` (`id`, `korisnik_id`, `film_id`, `telefon`, `adresa`, `banka`, `datum`, `ime`) VALUES
(20, 3, 2, '065 2844004', 'Beograd', 'Unicredit Bank', '2020-09-16', 'Milica'),
(21, 3, 4, '0652844023', 'Beograd', 'Intesa', '2020-09-16', 'GaGi'),
(22, 3, 4, '06358964774', 'Novi Sad', 'Erste Bank', '2020-09-16', 'Petar'),
(23, 4, 3, '0696566752', 'Bg', 'Eurobank', '2020-09-16', 'Milica');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rezervacija`
--
ALTER TABLE `rezervacija`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rezervacija`
--
ALTER TABLE `rezervacija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
