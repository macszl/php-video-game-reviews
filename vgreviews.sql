-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 17, 2023 at 11:33 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vgreviews`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `vg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `vg_id`, `user_id`, `date`) VALUES
(1, 3, 12, '2023-01-10'),
(2, 8, 12, '2023-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`) VALUES
(1, 'Default', 'Default genre.'),
(3, 'RTS', 'Real time strategy. A subset of strategy games, where the consequences of the player\'s actions are felt immediately.'),
(4, 'FPS', 'First person shooter. A subset of games where the player sees a first perspective view and uses firearms and weapons.'),
(5, 'Rhythm', 'Rhythm game or rhythm action is a genre of music-themed action video game that challenges a player\'s sense of rhythm. '),
(6, 'Turn-based', 'A game where the players take turns when playing.'),
(7, 'RPG', 'A role-playing game (sometimes spelled roleplaying game, RPG) is a game in which players assume the roles of characters in a fictional setting.'),
(8, 'Simulation', 'Simulation video games are a diverse super-category of video games, generally designed to closely simulate real world activities.'),
(9, 'Sports', 'A genre that simulates the practice of sports. Most sports have been recreated with a game, including team sports, extreme sports, and combat sports.'),
(10, 'Puzzle', 'A broad genre of video games that emphasize puzzle solving. Puzzles can test problem-solving skills, including logic, pattern recognition, sequence solving, spatial recognition, and word completion.'),
(11, 'MMORPG', 'MMORPG feature the usual RPG objectives of doing quests and strengthening one\'s player character, but involve up to hundreds of players interacting with each other on the same world in real-time.'),
(12, 'TRPG', 'The tactical role-playing game subgenre principally refers to games which incorporate gameplay from strategy games as an alternative to traditional RPG systems.'),
(13, 'Roguelike', 'A roguelike is a two-dimensional dungeon crawl with a high degree of randomness via procedural generation, an emphasis on statistical character development, and the use of permadeath.'),
(14, 'Metroidvania', 'Metroidvania games are a subgenre of platformer, named after its two first well-known franchises, Metroid and Castlevania. '),
(15, 'Visual novel', 'A visual novel is a game featuring mostly static graphics, usually with anime-style art. As the name suggests, they resemble mixed-media novels or tableau vivant stage plays.'),
(16, 'Fighting', 'Fighting games center around close-ranged combat, typically one-on-one fights or against a small number of equally powerful opponents, often involving violent and exaggerated unarmed attacks.'),
(17, 'Survival', 'Survival games with the player in a hostile, open-world environment, and require them to collect resources, craft tools, weapons, and shelter, in order to survive. ');

-- --------------------------------------------------------

--
-- Table structure for table `genres_videogames`
--

CREATE TABLE `genres_videogames` (
  `id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `vg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres_videogames`
--

INSERT INTO `genres_videogames` (`id`, `genre_id`, `vg_id`) VALUES
(5, 10, 8),
(6, 4, 10),
(11, 8, 3),
(12, 3, 3),
(13, 7, 22),
(14, 4, 22),
(15, 17, 22),
(16, 17, 23),
(17, 5, 23);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `vg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_content` varchar(4000) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `vg_id`, `user_id`, `review_content`, `date`) VALUES
(8, 4, 12, '                I think this game is ok. 4/5.', '2023-01-10'),
(9, 6, 12, '                This game is unplayable, the bots ruin it for everyone else. 1/5', '2023-01-10'),
(10, 3, 12, 'I love this game. 5/5', '2023-01-10'),
(11, 8, 12, '                qasdasdsa', '2023-01-10'),
(12, 10, 12, '                CS 1.6 was better.', '2023-01-11'),
(13, 15, 12, '                This game is ok. 3/5', '2023-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(70) NOT NULL,
  `permission_level` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `permission_level`) VALUES
(1, 'adder', 'adder@gmail.com', '$2y$10$1g4e2JZpRV3UsdE0PNktqOja6B2qD03a4KEOUIFO4AYzpgDx.1/Ja', 0),
(2, 'heyhey', 'heyhey@gmail.com', '$2y$10$icy0dcKy5VoSOPVfltf48OPyavZYYOrxgBDCtSyOKMfWq/xSbecje', 0),
(3, 'ilovepineapples', 'ilovepineapples@daaa.pl', '$2y$10$B4iRR6sF2wpxHVlRkifnte2V/eqFnZor7.l8SkkFLYMt0CHZvQHt.', 0),
(4, 'ilovecar', 'ilovecar@we.pl', '$2y$10$lGNKjSkIf97NdO9qLySmO.XGpeKEiX.CHU2qNLt5wRlhccPi3GOjy', 0),
(5, 'heydude', 'heydude@gmail.com', '$2y$10$jf.Ab0INZbXw7aYuIOmTy.J3nhkduiY8DPV/bS7NwkvuZZGoHjxry', 0),
(7, 'hellofriends', 'hellofriends@g.pl', '$2y$10$c6NMcRNnqFK7Jy42ii/Smuw2M8tzbctXds0tzNAxYvbLD/pfp8SZO', 0),
(8, 'red', 'red@gmail.com', '$2y$10$9P6MbSmF89qILm/H1C7mfeQSLWcEl0H2TVZpS.Ey3h.FJRV6/l4R6', 0),
(12, 'friend', 'friend@gmail.com', '$2y$10$fWLCWyzUbsTxAbOLvsVVre4EhkRPfhoVYkMGIqBFb05OxpeWWnBPK', 0),
(13, 'boy', 'boy@gmail.com', '$2y$10$smBa9WZwrXvZzGZrUKLZduQ38vpQ8DZXAw71vXYvRBHIYqKQll0.q', 0),
(14, 'hey', 'hey@gmail.com', '$2y$10$Gi9Wl8v5kd1xkOqvCW8ktOYmypLArCla6/NGrHMcKxzjcmZObI7R2', 0),
(15, 'jesus', 'jesus@gmail.com', '$2y$10$TYdsVjiSNtPgytPCMuCLp.09Kpmg4P89ccszd9FOOvrDHZYzOSf3S', 0),
(17, 'admin', 'admin@vgreviews.net', '$2y$10$9pwngSsFHoWqluw9d2e2leeL/7tjyt93yJtQumDvpekBr3zmOGfki', 2),
(18, 'tupet', 'tupet@gmail.com', '$2y$10$atDwglQMXPUjd0QgEXQAe.TNC8Ovr4JPW0X2o/TdorGRfcBTif1BS', 0),
(19, 'tybka', 'tybka@gmail.com', '$2y$10$mCqox5ZviusTyryysXc/z.4zCEemphLfGtVsb/oyYWrioJR3SuW7G', 0);

-- --------------------------------------------------------

--
-- Table structure for table `videogames`
--

CREATE TABLE `videogames` (
  `id` int(11) NOT NULL,
  `title` varchar(60) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videogames`
--

INSERT INTO `videogames` (`id`, `title`, `description`, `path`) VALUES
(3, 'Victoria 2', 'Victoria II is a grand strategy game developed by the Swedish game company Paradox Development Studio and published by Paradox Interactive. It was announced on August 19, 2009, and released on August 13, 2010. It is a sequel to Victoria: An Empire Under the Sun. Virtual Programming published the Mac OS X version of the game on September 17, 2010, which is available on the App Store. The game was localized for Russia by 1C Company and Snowball Studios.\r\n', '../assets/images/gallery/vic2.jpg'),
(4, 'Age of Empires II', 'Made by: Ensemble Studios\r\n\r\nAge of Empires II: The Age of Kings is a real-time strategy video game developed by Ensemble Studios and published by Microsoft. Released in 1999 for Microsoft Windows and Macintosh, it is the second game in the Age of Empires series. The Age of Kings is set in the Middle Ages and contains thirteen playable civilizations. Players aim to gather resources, which they use to build towns, create armies, and defeat their enemies. There are five historically based campaigns, which conscript the player to specialized and story-backed conditions, as well as three additional single-player game modes; multiplayer is also supported.', '../assets/images/gallery/aoe2.jpg'),
(5, 'Company of Heroes 2', 'The Company of Heroes 2 base game gives you access to two multiplayer armies from the Eastern Front: the Red Army (SOV) and the Wehrmacht Ostheer (GER). It also comes with a gritty single-player campaign that will give you a chance to familiarize yourself with the series core tenets. Step into the boots of a Soviet commander of the Red Army, entrenched in brutal frontline warfare to free Mother Russia from the Enemy invaders! Adjust your tactics to take into account the brutal weather conditions and wield the might of the Soviet Empire as you smash your way to Berlin.', '../assets/images/gallery/coh2-wallpaper-1600x900.jpg'),
(6, 'Team Fortress 2', 'Team Fortress 2 is a 2007 multiplayer first-person shooter game developed and published by Valve Corporation. It is the sequel to the 1996 Team Fortress mod for Quake and its 1999 remake, Team Fortress Classic. \r\n\r\nPlayers join one of two teams—RED and BLU—and choose one of nine character classes to play as in game modes such as capture the flag and king of the hill. Development was led by John Cook and Robin Walker, the developers of the original Team Fortress mod. Team Fortress 2 was announced in 1998 under the name Team Fortress 2: Brotherhood of Arms. Initially, the game had more realistic, militaristic visuals and gameplay, but this changed over the protracted nine years of development.', '../assets/images/gallery/ws_Team_Fortress_2_1366x768.jpg'),
(7, 'Portal 2', 'Portal 2 is the sequel to the award winning and hugely successful Portal developed by Valve Corporation. It features a single-player story set after the events of Portal\'s story; and a brand-new Co-op game mode, featuring additional test chambers designed specifically for Co-operative play. Portal 2 was released April 19, 2011 on the Steam platform. Retail release in North America started on April 19, 2011; and later, Europe and Australia on April 21, 2011.', '../assets/images/gallery/portal2-high-res (1).jpg'),
(8, 'Portal 1', 'Portal is a 2007 puzzle-platform game developed and published by Valve. It was released in a bundle, The Orange Box, for Windows, Xbox 360 and PlayStation 3, and has been since ported to other systems, including Mac OS X, Linux, Android (via Nvidia Shield), and Nintendo Switch.\r\n\r\nPortal consists primarily of a series of puzzles that must be solved by teleporting the player\'s character and simple objects using \"the Aperture Science Handheld Portal Device\", often referred to as the \"portal gun\", a device that can create inter-spatial portals between two flat planes. The player-character, Chell, is challenged and taunted by an artificial intelligence named GLaDOS (Genetic Lifeform and Disk Operating System) to complete each puzzle in the Aperture Science Enrichment Center using the portal gun with the promise of receiving cake when all the puzzles are completed. The game\'s unique physics allows kinetic energy to be retained through portals, requiring creative use of portals to maneuver through the test chambers. ', '../assets/images/gallery/portal1.jpg'),
(9, 'The Last of Us', 'The Last of Us is a 2013 action-adventure game developed by Naughty Dog and published by Sony Computer Entertainment. Players control Joel, a smuggler tasked with escorting a teenage girl, Ellie, across a post-apocalyptic United States. The Last of Us is played from a third-person perspective. Players use firearms and improvised weapons and can use stealth to defend against hostile humans and cannibalistic creatures infected by a mutated fungus in the genus Cordyceps. In the online multiplayer mode, up to eight players engage in cooperative and competitive gameplay.\r\n\r\n', '../assets/images/gallery/the_last_of_us_box_art-wallpaper-1600x900.jpg'),
(10, 'Counter Strike: Global Offensive', 'Counter-Strike: Global Offensive (CS:GO) is a 2012 multiplayer tactical first-person shooter developed by Valve and Hidden Path Entertainment. It is the fourth game in the Counter-Strike series. Developed for over two years, Global Offensive was released for OS X, PlayStation 3, Windows, and Xbox 360 in August 2012, and for Linux in 2014. Valve still regularly updates the game, both with smaller balancing patches and larger content additions.\r\n\r\nThe game pits two teams, Terrorists and Counter-Terrorists, against each other in different objective-based game modes. The most common game modes involve the Terrorists planting a bomb while Counter-Terrorists attempt to stop them, or Counter-Terrorists attempting to rescue hostages that the Terrorists have captured. There are nine official game modes, all of which have distinct characteristics specific to that mode. The game also has matchmaking support that allows players to play on dedicated Valve servers, in addition to community-hosted servers with custom maps and game modes. A battle-royale game-mode, \"Danger Zone\", was introduced in late 2018.', '../assets/images/gallery/csgo.jpg'),
(11, 'Mordhau', 'MORDHAU is a medieval first & third person multiplayer slasher. Enter a hectic battlefield of up to 80 players as a mercenary in a fictional, but realistic world, where you will get to experience the brutal and satisfying melee combat that will have you always coming back for more.', '../assets/images/gallery/mordhau.jpg'),
(12, 'Hearts of Iron IV', 'Take command of the world’s mightiest war machine, managing industry, diplomacy and battle plans to defend your interests and dominate the planet in Hearts of Iron IV.\r\n\r\nThis grand strategy wargame offers both deep historical gameplay and tantalizing alternate histories as the dramatic events of the Second World War unfold on your computer. Hearts of Iron IV is a compelling simulation of modern war that rewards replay and strategic thinking.', '../assets/images/gallery/hoi4.jpg'),
(13, 'Europa Universalis IV', 'Europa Universalis IV is a 2013 grand strategy video game in the Europa Universalis series, developed by Paradox Development Studio and published by Paradox Interactive as a sequel to Europa Universalis III (2007).[1] The game was released on 13 August 2013. It is a strategy game where players can control a nation from the Late Middle Ages through the early modern period (1444–1821),[2] conducting trade, administration, diplomacy, colonization, and warfare.', '../assets/images/gallery/528004-Europa-Universalis.jpg'),
(14, 'Bloodborne', 'Bloodborne is a 2015 action role-playing game developed by FromSoftware and published by Sony Computer Entertainment for the PlayStation 4. Bloodborne follows the player\'s character, a Hunter, through the decrepit Gothic, Victorian-era–inspired city of Yharnam, whose inhabitants are afflicted with a blood-borne disease which transforms the residents, called Yharnamites, into horrific beasts. Attempting to find the source of the plague, the player\'s character unravels the city\'s mysteries while fighting beasts and cosmic beings.\r\n\r\n', '../assets/images/gallery/bloodborne.jpg'),
(15, 'Dark Souls 1', 'Dark Souls is the new action role-playing game from the developers who brought you Demon’s Souls, FromSoftware. Dark Souls will have many familiar features: A dark fantasy universe, tense dungeon crawling, fearsome enemy encounters and unique online interactions. Dark Souls is a spiritual successor to Demon’s, not a sequel. Prepare for a new, despair-inducing world, with a vast, fully-explorable horizon and vertically-oriented landforms.', '../assets/images/gallery/darksouls 1.jpg'),
(16, 'Dark Souls 2', 'Dark Souls II is a 2014 action role-playing game developed by FromSoftware and published by Bandai Namco Games. An entry in the Dark Souls series, it was released for Windows, PlayStation 3, and Xbox 360. Taking place in the kingdom of Drangleic, the game features both player versus environment (PvE) and player versus player (PvP) gameplay. Dark Souls II was released in March 2014 after some initial delays, with the Windows version being released the following month.\r\n\r\nDark Souls II was a critical and commercial success. A remastered version of the game, titled Dark Souls II: Scholar of the First Sin, was released for PlayStation 3, PlayStation 4, Xbox 360, Xbox One, and Windows in April 2015. It contains the original game and its downloadable content with upgraded graphics, expanded online multiplayer capacity, and various other changes. A sequel, Dark Souls III, was released in 2016.', '../assets/images/gallery/darksouls 2.jpg'),
(17, 'Dark Souls 3', 'Dark Souls III is a 2016 action role-playing game developed by FromSoftware and published by Bandai Namco Entertainment for PlayStation 4, Xbox One, and Windows. The third and final entry in the Dark Souls series, it is played in a third-person perspective, and players have access to various weapons, armour, magic, and consumables that they can use to fight their enemies. Hidetaka Miyazaki, the creator of the series, returned to direct the game after handing the development duties of Dark Souls II to others.\r\n\r\nDark Souls III was critically and commercially successful, with critics calling it a worthy and fitting conclusion to the series. It shipped over three million copies within its first two months and over 10 million by 2020. Two downloadable content (DLC) expansions, Ashes of Ariandel and The Ringed City, were also made. Dark Souls III: The Fire Fades Edition, containing the base game and both expansions, was released in April 2017.', '../assets/images/gallery/darksouls 3.jpg'),
(18, 'Demons Souls', 'Demon\'s Souls[b] is a 2009 action role-playing game developed by FromSoftware for the PlayStation 3 under the supervision of Japan Studio. It was published in Japan by Sony Computer Entertainment in February, in North America by Atlus USA in October, and in PAL territories by Namco Bandai Partners in June 2010. The game is referred to as a spiritual successor to FromSoftware\'s King\'s Field series.\r\n\r\nDemon\'s Souls is set in Boletaria, a kingdom consumed by a dark being called the Old One, following its release through the use of forbidden Soul Arts. Players take on the role of a hero brought to Boletaria to kill its fallen king Allant and pacify the Old One. Gameplay has players navigating five different worlds from a hub called the Nexus, with a heavy emphasis on challenging combat and mechanics surrounding player death and respawning. Online multiplayer allows both player cooperation and world invasions featuring player versus player combat.\r\n\r\n', '../assets/images/gallery/demons-souls.jpg'),
(19, 'Elden Ring', 'Elden Ring is an action role-playing game played in a third person perspective, with gameplay focusing on combat and exploration. It features elements similar to those found in other games developed by FromSoftware, such as the Dark Souls series, Bloodborne, and Sekiro: Shadows Die Twice.', '../assets/images/gallery/eldenring.jpg'),
(20, 'Total War Warhammer', 'Total War: Warhammer is a 2016 turn-based strategy and real-time tactics video game developed by Creative Assembly and published by Sega for Microsoft Windows via the Steam gaming platform. The game was brought to macOS and Linux by Feral Interactive. The game features the gameplay of the Total War series with factions of Games Workshop\'s Warhammer Fantasy series; it is the first Total War game not to portray a historical setting. It is the 10th title in the Total War series and the first title to be released in the Total War: Warhammer trilogy.', '../assets/images/gallery/total war warhammer.png'),
(21, 'They are Billions', 'They Are Billions is a Steampunk strategy game set on a post-apocalyptic planet. Build and defend colonies to survive against the billions of the infected that seek to annihilate the few remaining living humans. Can humanity survive after the zombie apocalypse?', '../assets/images/gallery/they are billions.jpg'),
(22, 'Fallout: New Vegas', 'Fallout New Vegas (FNV) is a first and third person RPG set in the Mojave Wasteland, two centuries after the world was devastated by nuclear Armageddon. Players impersonate “The Courier”, at first a mere errand boy on a trip to deliver an unassuming package… that holds however an invaluable item.', '../assets/images/gallery/cropped-1440-900-423458.jpg'),
(23, 'Chess', 'Chess is a board game between two players. It is sometimes called international chess or Western chess to distinguish it from related games, such as xiangqi (Chinese chess) and shogi (Japanese chess). The current form of the game emerged in Spain and the rest of Southern Europe during the second half of the 15th century after evolving from chaturanga, a similar but much older game of Indian origin. Today, chess is one of the world\'s most popular games, played by millions of people worldwide.', '../assets/images/gallery/PRLk9kpTURBXy9kYjk0MDY4ZDdmYzYyNGU4ZTY1ZWIxYzFjYzZkNTQyMS5qcGeSlQMAH80D6M0CMpMFzQSwzQKF3gABoTAB.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Vid_Favorites` (`vg_id`),
  ADD KEY `FK_Uid_Favorites` (`user_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres_videogames`
--
ALTER TABLE `genres_videogames`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_genre_id_junctiontable` (`genre_id`),
  ADD KEY `FK_vid_junctiontable` (`vg_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Uid_Reviews` (`user_id`),
  ADD KEY `FK_Vid_Reviews` (`vg_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `videogames`
--
ALTER TABLE `videogames`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `genres_videogames`
--
ALTER TABLE `genres_videogames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `videogames`
--
ALTER TABLE `videogames`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `FK_Uid_Favorites` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Vid_Favorites` FOREIGN KEY (`vg_id`) REFERENCES `videogames` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `genres_videogames`
--
ALTER TABLE `genres_videogames`
  ADD CONSTRAINT `FK_genre_id_junctiontable` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_vid_junctiontable` FOREIGN KEY (`vg_id`) REFERENCES `videogames` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_Uid_Reviews` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_Vid_Reviews` FOREIGN KEY (`vg_id`) REFERENCES `videogames` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
