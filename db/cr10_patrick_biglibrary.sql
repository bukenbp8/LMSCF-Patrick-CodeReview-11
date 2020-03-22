-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2020 at 03:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr10_patrick_biglibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `authorID` int(11) NOT NULL,
  `firstNameAuthor` tinytext NOT NULL,
  `lastNameAuthor` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`authorID`, `firstNameAuthor`, `lastNameAuthor`) VALUES
(1, 'John', 'Green'),
(3, 'Hunter S. ', 'Thompson'),
(7, 'Douglas', 'Adams'),
(8, 'Neil ', 'Shubin'),
(9, 'J. R. R.', 'Tolkien'),
(10, 'Chuck', 'Palahniuk'),
(11, 'Kurt', 'Cobain'),
(12, 'Jimmy', 'Page'),
(13, 'Terry', 'Jones');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed`
--

CREATE TABLE `borrowed` (
  `idBorrowed` int(11) NOT NULL,
  `idUsers` int(11) NOT NULL,
  `idMedia` int(11) NOT NULL,
  `startBorrowed` date DEFAULT NULL,
  `endBorrowed` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `idMedia` int(11) NOT NULL,
  `titelMedia` tinytext NOT NULL,
  `imgMedia` tinytext NOT NULL,
  `authorIdMedia` int(11) DEFAULT NULL,
  `isbnMedia` tinytext NOT NULL,
  `descMedia` text NOT NULL,
  `publDateMedia` year(4) NOT NULL,
  `publisherIdMedia` int(11) DEFAULT NULL,
  `typeMedia` enum('Book','DVD','CD') NOT NULL,
  `statusMedia` enum('Available','Not available') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`idMedia`, `titelMedia`, `imgMedia`, `authorIdMedia`, `isbnMedia`, `descMedia`, `publDateMedia`, `publisherIdMedia`, `typeMedia`, `statusMedia`) VALUES
(3, 'The Fault in Our Stars', 'https://upload.wikimedia.org/wikipedia/en/a/a9/The_Fault_in_Our_Stars.jpg', 1, '0141345659', 'Despite the tumour-shrinking medical miracle that has bought her a few years, Hazel has never been anything but terminal, her final chapter inscribed upon diagnosis. But when a gorgeous plot twist named Augustus Waters suddenly appears at Cancer Kid Support Group, Hazels story is about to be completely rewritten. Insightful, bold, irreverent, and raw, The Fault in Our Stars brilliantly explores the funny, thrilling, and tragic business of being alive and in love.', 2013, 1, 'Book', 'Available'),
(7, 'Fear and Loathing in Las Vegas', 'https://theagencyreview.files.wordpress.com/2013/07/whitewar.jpg', 3, '0007204493', 'The book is a roman à clef, rooted in autobiographical incidents. The story follows its protagonist, Raoul Duke, and his attorney, Dr. Gonzo, as they descend on Las Vegas to chase the American Dream through a drug-induced haze, all the while ruminating on the failure of the 1960s countercultural movement.', 1972, 3, 'Book', 'Available'),
(9, 'The Hitchhikers Guide to the Galaxy', 'https://i.pinimg.com/originals/fc/34/a3/fc34a32c5a16264a2f9b128b1938d917.png', 7, '0345391802', 'Earthman Arthur Dent is rescued by his friend, Ford Prefect—an alien researcher for the titular Hitchhikers Guide to the Galaxy, an enormous work providing information about every planet in the universe—from the Earth just before it is destroyed by the alien Vogons.', 1979, 7, 'Book', 'Available'),
(10, 'Your Inner Fish', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9780/1410/9780141027586.jpg', 8, '0307277453', 'By examining fossils and DNA, he shows us that our hands actually resemble fish fins, our heads are organized like long-extinct jawless fish, and major parts of our genomes look and function like those of worms and bacteria. Your Inner Fish makes us look at ourselves and our world in an illuminating new light. This is science writing at its finest.', 2008, 1, 'Book', 'Available'),
(11, 'The Lord of the Rings: The Fellowship of the Ring', 'https://upload.wikimedia.org/wikipedia/en/8/8a/The_Lord_of_the_Rings_The_Fellowship_of_the_Ring_%282001%29.jpg', 9, '9788373191723', 'The future of civilization rests in the fate of the One Ring, which has been lost for centuries. Powerful forces are unrelenting in their search for it. But fate has placed it in the hands of a young Hobbit named Frodo Baggins (Elijah Wood), who inherits the Ring and steps into legend. A daunting task lies ahead for Frodo when he becomes the Ringbearer - to destroy the One Ring in the fires of Mount Doom where it was forged.', 2001, 9, 'DVD', 'Available'),
(12, 'Fight Club', 'https://upload.wikimedia.org/wikipedia/en/f/fc/Fight_Club_poster.jpg', 10, 'B07XJ5FP2C', 'A depressed man (Edward Norton) suffering from insomnia meets a strange soap salesman named Tyler Durden (Brad Pitt) and soon finds himself living in his squalid house after his perfect apartment is destroyed. The two bored men form an underground club with strict rules and fight other men who are fed up with their mundane lives. Their perfect partnership frays when Marla (Helena Bonham Carter), a fellow support group crasher, attracts Tylers attention.', 1999, 10, 'DVD', 'Available'),
(13, 'Nirvana Nevermind', 'https://upload.wikimedia.org/wikipedia/en/b/b7/NirvanaNevermindalbumcover.jpg', 11, '123456', 'Grunge - alternative rock', 1991, 11, 'CD', 'Available'),
(14, 'Led Zeppelin Mothership', 'https://upload.wikimedia.org/wikipedia/en/c/cb/Led_Zeppelin_-_Mothership.jpg', 12, '5432167', 'Hard rock, heavy metal, blues rock, folk rock', 2007, 12, 'CD', 'Available'),
(15, 'Life of Brian', 'https://m.media-amazon.com/images/M/MV5BMzAwNjU1OTktYjY3Mi00NDY5LWFlZWUtZjhjNGE0OTkwZDkwXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_SY1000_CR0,0,637,1000_AL_.jpg', 13, '6423453467', 'Born on the original Christmas in the stable next door to Jesus Christ, Brian of Nazareth spends his life being mistaken for a messiah. ', 1979, 13, 'DVD', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `idPublisher` int(11) NOT NULL,
  `namePublisher` tinytext NOT NULL,
  `sizePublisher` enum('big','medium','small') NOT NULL,
  `addressPublisher` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`idPublisher`, `namePublisher`, `sizePublisher`, `addressPublisher`) VALUES
(1, 'Penguin Books', 'big', '61-63 Uxbridge Road Ealing, London, W5 5SA'),
(3, 'Random House', 'big', 'Random House Tower, New York City, New York, United States'),
(7, 'Pan Books', 'big', 'Clerkenwell, London'),
(9, 'New Line Cinema', 'big', 'who cares'),
(10, '20th Century Fox', 'big', 'LA'),
(11, 'DGC', 'medium', 'Seattle'),
(12, 'Atlantic', 'big', 'United States'),
(13, 'Cinema International Corporation', 'medium', 'London');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `firstNameUsers` tinytext NOT NULL,
  `lastNameUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `roleUsers` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `firstNameUsers`, `lastNameUsers`, `emailUsers`, `pwdUsers`, `roleUsers`) VALUES
(1, 'test', 'Hans', 'Wurst', 'test@test.de', '$2y$10$.wI/7FpbxpwIg7s62HooxeZ.RwM3c3g2W/oBm9mAXlWx36c35Do0W', 'user'),
(2, 'Admin', 'Supreme', 'Administrator', 'admin@test.com', '$2y$10$afnsX3de5tKeRb7twwwiyu5fpOGC8yiMoRIgrrfkv3JnUf0gHPuUq', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorID`);

--
-- Indexes for table `borrowed`
--
ALTER TABLE `borrowed`
  ADD PRIMARY KEY (`idBorrowed`),
  ADD KEY `fk_user_id` (`idUsers`),
  ADD KEY `fk_media_id` (`idMedia`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`idMedia`),
  ADD KEY `fk_publisher_id` (`publisherIdMedia`),
  ADD KEY `fk_author_id` (`authorIdMedia`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`idPublisher`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `authorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `borrowed`
--
ALTER TABLE `borrowed`
  MODIFY `idBorrowed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `idMedia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `idPublisher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowed`
--
ALTER TABLE `borrowed`
  ADD CONSTRAINT `fk_media_id` FOREIGN KEY (`idMedia`) REFERENCES `media` (`idMedia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `fk_author_id` FOREIGN KEY (`authorIdMedia`) REFERENCES `authors` (`authorID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_publisher_id` FOREIGN KEY (`publisherIdMedia`) REFERENCES `publisher` (`idPublisher`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
