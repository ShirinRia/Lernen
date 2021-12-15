-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2021 at 04:14 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learnen_two`
--

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `cid` int(200) NOT NULL,
  `tchr` varchar(200) DEFAULT NULL,
  `user_nm` varchar(200) NOT NULL,
  `usr_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`cid`, `tchr`, `user_nm`, `usr_id`) VALUES
(10, 'Humaira Ahmed', 'humaira', 2),
(4, 'Humaira Ahmed', 'shirin', 1),
(2, 'Shirin Sultana', 'shirinria', 9);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `aname` varchar(200) DEFAULT NULL,
  `bcat` varchar(200) DEFAULT NULL,
  `bid` int(200) NOT NULL,
  `bname` varchar(200) DEFAULT NULL,
  `pdf` varchar(500) DEFAULT NULL,
  `publshr` varchar(500) DEFAULT NULL,
  `edtn` varchar(500) DEFAULT NULL,
  `lang` varchar(500) DEFAULT NULL,
  `img_path` varchar(500) DEFAULT NULL,
  `size` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`aname`, `bcat`, `bid`, `bname`, `pdf`, `publshr`, `edtn`, `lang`, `img_path`, `size`) VALUES
('Weygandt Kimmel Lieso', 'Academic(College)', 9, 'Accounting', 'Accounting Principles, 10th edition.pdf', 'John Wiley & Sons, Inc', '10th edition', 'English', 'uploads/download (2).jpg', 28188938),
('Vishal Layka', 'Development', 10, 'Learn Java for Web Development ', 'Learn Java for Web Development .pdf', '', '', 'English', 'uploads/java.jpg', NULL),
('Noel Kalicharan', 'Programming', 14, 'Learn to Program with C', 'Learn to Program with C_ Learn to Program using the Popular C Programming Language ( PDFDrive ).pdf', '', '', 'English', 'uploads/c.jpg', 3),
('V.V.K. Subburaj', 'GK', 15, 'Basic General Knowledge Book', 'Basic General Knowledge Book ( PDFDrive ).pdf', 'Sura College of Competition', '(1 January 2012)', 'English', 'uploads/Basic General Knowledge Book.jpg', 5),
(' Monira Khaton', 'IELTS', 16, 'Best Practice Book for IELTS Writing 230 IELTS Writing Samples ', 'Best Practice Book for IELTS Writing 230 IELTS Writing Samples ( PDFDrive ).pdf', '', '', '', 'uploads/41i809t4r+L.jpg', 4),
('Glenn Beck', 'Islam Shikkha', 17, 'It IS About Islam', 'It IS About Islam_ Exposing the Truth About ISIS, Al Qaeda, Iran, and the Caliphate ( PDFDrive ).pdf', '', 'August 18, 2015', 'English', 'uploads/It IS About Islam_ Exposing the Truth About ISIS, Al Qaeda, Iran, and the Caliphate.jpg', 2),
('Rupayon Neogy', 'Design', 18, 'Web Design & UI_UX', 'Web Design & UI_UX ( PDFDrive ).pdf', '', '', 'English', 'uploads/html.jpg', 3),
('Andy Ilachinski', 'Photography', 19, 'BWClassNotesBelnavisGallery', 'BWClassNotesBelnavisGalleryFeb2011.pdf', '', 'Feb2011', 'English', 'uploads/1-03c8a2bd48.jpg', 6),
('Trishna', 'Academic(School)', 20, 'Chemistry (Class 9)', 'Chemistry (Class 9) ( PDFDrive ).pdf', '', '2014', 'English', 'uploads/382f5ec66911100097c5d3d69b6cb06f.jpg', 33);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `category` int(200) DEFAULT NULL,
  `c_id` int(200) NOT NULL,
  `c_name` varchar(500) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `des` varchar(500) NOT NULL,
  `img_path` varchar(500) NOT NULL,
  `tid` int(200) NOT NULL,
  `tname` varchar(500) NOT NULL,
  `cdes` mediumtext NOT NULL,
  `learn` mediumtext DEFAULT NULL,
  `rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`category`, `c_id`, `c_name`, `Date`, `des`, `img_path`, `tid`, `tname`, `cdes`, `learn`, `rating`) VALUES
(13, 1, 'PHP', '2021-11-03', 'PHP is a general-purpose scripting language geared towards web development. PHP is a popular general-purpose scripting language that is especially suited to web development.', 'uploads\\PHP.jpg', 2, 'Humaira Ahmed', 'Are you new to PHP or need a refresher? Then this course will help you get all the fundamentals of Procedural PHP, Object Oriented PHP, MYSQLi, and end the course by building a CMS system similar to WordPress, Joomla, or Drupal.', 'You will learn to create a (CMS) Content Management System like WordPress, Drupal, or Joomla\r\nYou will learn how to use Databases\r\nYou will learn MySQL\r\nObject-Oriented Programming\r\nYou will learn how to launch your application online\r\nHow to use forms to submit data to databases', 3),
(12, 2, 'IELTS', '2021-11-03', 'The International English Language Testing System, or IELTS, is an international standardized test of English language proficiency for non-native English language speakers. It is jointly managed by the British Council', 'uploads/IELTS.png', 9, 'Shirin Sultana', '', NULL, 1),
(2, 4, 'Web Design', '2021-11-03', 'Web design encompasses many different skills and disciplines in the production and maintenance of websites. The different areas of web design include web graphic design; user interface design; authoring, including standardised code and proprietary software; user experience design; and search engine optimization.', 'uploads/Web Design.jpg', 9, 'Shirin Sultana', '', NULL, 0),
(2, 10, 'Graphic Design', '2021-11-09', 'Graphic design is the profession and academic discipline whose activity consists in projecting visual communications intended to transmit specific messages to social groups, with specific objectives.', 'uploads/Graphic Design.jpg', 2, 'Humaira Ahmed', '', NULL, 2),
(1, 14, 'Develop your own game', '2021-11-11', 'Sometimes game development is a challenging, painful process — but nothing compares to seeing the pure elation of someone experiencing your game for the first time. ', 'uploads/Develop your own game.jpg', 2, 'Humaira Ahmed', 'Game Development is the art of creating games and describes the design, development and release of a game. It may involve concept generation, design, build, test and release. ... A game developer could be a programmer, a sound designer, an artist, a designer or many other roles available in the industry.We spoke to game developers and boiled down the game development process to the following five stages: Prototyping, progress, ship, watch, and repeat.', 'Master beginner C# concepts, like variables, \"if\" statements, and arrays Detect collisions, receive user input, and create player movements Create power-ups including triple shots, laser beams, speed boosts, and shields Apply shaders that transform your game backgrounds Create enemies with basic AI behavior Collect and destroy game objects Implement sound effects, background music, and particle effects Activate and use Unity’s Team Collaboration service Navigate the Unity Engine and discover unique features like the Asset Store Deploy your game to over 20 web or mobile platforms', 0),
(1, 15, 'Frontend web development Course', '2021-11-11', 'We\'ll Cover HTML5, CSS3, JavaScript, jQuery, Bootstrap 4 and SVG from scratch.  You\'ll learn all the fundamentals of Front-End Web Development and how you can  Use them to start creating you own websites. ', 'uploads/Frontend web development Course.jpg', 9, 'Shirin Sultana', 'Web development is the work involved in developing a Web site for the Internet or an intranet. Web development can range from developing a simple single static page of plain text to complex web applications, electronic businesses, and social network services. ', 'You\'ll learn all the fundamentals of Front-End Web Development and how you can Use them to start creating websites!', 3.3333333333333);

-- --------------------------------------------------------

--
-- Table structure for table `crs_cat`
--

CREATE TABLE `crs_cat` (
  `Category` varchar(200) NOT NULL,
  `cat_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crs_cat`
--

INSERT INTO `crs_cat` (`Category`, `cat_id`) VALUES
('Development', 1),
('Design', 2),
('MS Office', 4),
('Photography', 5),
('Adobe', 6),
('Editing', 7),
('GK', 8),
('Academic(School)', 10),
('Academic(College)', 11),
('IELTS', 12),
('Programming', 13),
('Health & Fitness', 14),
('Islam Shikkha', 15),
('Digital Marketing', 16),
('IT & Networking', 17),
('Entrepreneurship', 18),
('Fashion & Lifestyle', 19),
('Technology', 20);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `question_number` int(11) NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  `coption` text NOT NULL,
  `crs_id` int(200) NOT NULL,
  `level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_number`, `is_correct`, `coption`, `crs_id`, `level`) VALUES
(5, 1, 0, ' Personal Hypertext Processor', 1, 'Basic'),
(6, 1, 0, 'Private Home Page', 1, 'Basic'),
(7, 1, 1, 'PHP: Hypertext Preprocessor', 1, 'Basic'),
(8, 2, 1, 'echo \"Helow World\";', 1, 'Basic'),
(9, 2, 0, '\"Hello World\";', 1, 'Basic'),
(10, 2, 0, 'Document.Write(\"Hello World\");', 1, 'Basic'),
(11, 3, 1, '$', 1, 'Basic'),
(12, 3, 0, '%', 1, 'Basic'),
(13, 3, 0, '?', 1, 'Basic'),
(14, 3, 0, '!', 1, 'Basic'),
(15, 4, 0, '.', 1, 'Basic'),
(16, 4, 0, 'New Line', 1, 'Basic'),
(17, 4, 0, '</php?', 1, 'Basic'),
(18, 4, 1, ';', 1, 'Basic'),
(19, 5, 0, 'Java', 1, 'Basic'),
(20, 5, 1, 'Perl and C', 1, 'Basic'),
(21, 5, 0, 'Visual Basic', 1, 'Basic'),
(22, 5, 0, 'VB Script', 1, 'Basic'),
(23, 1, 0, 'TRUE', 1, 'Medium'),
(24, 1, 1, 'FALSE', 1, 'Medium'),
(25, 2, 1, 'TRUE', 1, 'Medium'),
(26, 2, 0, 'FALSE', 1, 'Medium'),
(27, 3, 1, 'function myFunction()', 1, 'Medium'),
(28, 3, 0, 'new_function myFunction()', 1, 'Medium'),
(29, 3, 0, 'create myFunction()', 1, 'Medium'),
(30, 4, 1, 'TRUE', 1, 'Medium'),
(31, 4, 0, 'FALSE', 1, 'Medium'),
(32, 5, 1, '/*..... */', 1, 'Medium'),
(33, 5, 0, '<comment>....</comment>', 1, 'Medium'),
(45, 1, 0, 'HighText Machine Language', 4, 'Basic'),
(46, 1, 0, 'HyperText and links Markup Language', 4, 'Basic'),
(47, 1, 1, 'HyperText Markup Language', 4, 'Basic'),
(48, 1, 0, 'None of these', 4, 'Basic'),
(49, 2, 0, 'Head, Title, HTML, body', 4, 'Basic'),
(50, 2, 0, 'HTML, Body, Title, Head', 4, 'Basic'),
(51, 2, 0, 'HTML, Title, Body, Head', 4, 'Basic'),
(52, 2, 1, 'HTML, Head, Title, Body', 4, 'Basic'),
(53, 3, 0, 'Scripting Language', 4, 'Basic'),
(54, 3, 1, 'Markup Language', 4, 'Basic'),
(55, 3, 0, 'Programming Language', 4, 'Basic'),
(56, 3, 0, 'Network Protocol', 4, 'Basic'),
(57, 4, 0, 'User defined tags', 4, 'Basic'),
(58, 4, 0, 'Pre-specified tags', 4, 'Basic'),
(59, 4, 1, 'Fixed tags defined by the language', 4, 'Basic'),
(60, 4, 0, 'Tags only for linking', 4, 'Basic'),
(61, 5, 0, '1990', 4, 'Basic'),
(62, 5, 1, '1980', 4, 'Basic'),
(63, 5, 0, '2000', 4, 'Basic'),
(64, 5, 0, '1995', 4, 'Basic'),
(69, 1, 0, 'Scalar And Raster   ', 10, 'Basic'),
(70, 1, 1, 'Vector And Raster', 10, 'Basic'),
(71, 1, 0, 'Vector And Scalar', 10, 'Basic'),
(72, 1, 0, 'None Of These', 10, 'Basic'),
(73, 2, 0, 'Paths   ', 10, 'Basic'),
(74, 2, 0, 'Palette', 10, 'Basic'),
(75, 2, 1, 'Pixels', 10, 'Basic'),
(76, 2, 0, 'None Of These', 10, 'Basic'),
(77, 3, 0, 'One Dimensional Grid', 10, 'Basic'),
(78, 3, 1, 'Two Dimensional Grid', 10, 'Basic'),
(79, 3, 0, 'Three Dimensional Grid', 10, 'Basic'),
(80, 3, 0, 'None Of These', 10, 'Basic'),
(81, 4, 0, 'Graphical user interface', 10, 'Basic'),
(82, 4, 1, 'Graphical user interaction', 10, 'Basic'),
(83, 4, 0, 'Graphics uniform interaction', 10, 'Basic'),
(84, 4, 0, 'None of above', 10, 'Basic'),
(85, 5, 0, 'Two Or Three', 10, 'Basic'),
(86, 5, 0, 'One Or Two', 10, 'Basic'),
(87, 5, 1, 'Three Or Four', 10, 'Basic'),
(88, 5, 0, 'None Of These', 10, 'Basic'),
(159, 1, 0, 'body background=\"yellow\"', 15, ''),
(160, 1, 0, ' b.) <background>yellow</background>', 15, ''),
(161, 1, 1, ' c.) body style=\"background-color:yellow\" ', 15, ''),
(162, 1, 0, 'd.) <background color=\"yellow\">text<background>', 15, ''),
(163, 2, 0, '<a name=\"\">A</a>', 15, ''),
(164, 2, 0, ' <a>B</a>', 15, ''),
(165, 2, 1, '<a href=\"http://www.example.com\">example</a>', 15, ''),
(166, 2, 0, '<a url=\"http://www.example.com\">example</a>', 15, ''),
(167, 3, 0, '<a href=\"url\" new>', 15, ''),
(168, 3, 0, '<a href=\"url\" target=\"new\"> ', 15, ''),
(169, 3, 1, '<a href=\"url\" target=\"_blank\">', 15, ''),
(170, 3, 0, '<a href=\"url\" target=\"\">', 15, ''),
(171, 4, 0, '<table><head><tfoot>', 15, ''),
(172, 4, 1, '<table><tr><td>', 15, ''),
(173, 4, 0, '<table><tr><tt>', 15, ''),
(174, 4, 0, '<thead><body><tr>', 15, ''),
(175, 1, 0, 'Easy data exchange', 15, ''),
(176, 1, 0, 'High speed on network', 15, ''),
(177, 1, 0, 'Only B.is correct ', 15, ''),
(178, 1, 1, 'Both A & B', 15, ''),
(179, 1, 1, 'Var', 15, ''),
(180, 1, 0, 'Dim', 15, ''),
(181, 1, 0, 'String', 15, ''),
(182, 1, 0, 'None of the above', 15, ''),
(222, 1, 1, '.php', 1, 'High'),
(223, 1, 0, '.hphp', 1, 'High'),
(224, 1, 0, '.xml', 1, 'High'),
(225, 1, 0, '.html', 1, 'High');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ans` varchar(200) NOT NULL,
  `cid` int(200) NOT NULL,
  `id` int(200) NOT NULL,
  `ques` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ans`, `cid`, `id`, `ques`, `user`) VALUES
('Go to  \"https://laravel.com/docs/8.x/installation\"', 1, 20, 'I\'m still a bit confused about what was installed during the laravel install', 'shirin'),
('class=\"btn posia\" ', 1, 21, 'I\'m still a bit confused about what was installed during the laravel install', 'shirin'),
('', 1, 22, 'I haven\'t understand what is the meaning of this error', 'shirin');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `iddd` int(11) NOT NULL,
  `question_number` int(200) NOT NULL,
  `question_text` text NOT NULL,
  `crs_id` int(200) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`iddd`, `question_number`, `question_text`, `crs_id`, `level`) VALUES
(1, 1, 'What does PHP stand for?', 1, 'Basic'),
(2, 2, 'How do you write \"Hello World\" in PHP', 1, 'Basic'),
(3, 3, 'All variables in PHP start with which symbol?', 1, 'Basic'),
(4, 4, 'What is the correct way to end a PHP statement?', 1, 'Basic'),
(5, 5, 'The PHP syntax is most similar to:', 1, 'Basic'),
(6, 1, 'When using the POST method, variables are displayed in the URL:', 1, 'Medium'),
(7, 2, 'In PHP you can use both single quotes (  ) and double quotes ( \" \" ) for strings:', 1, 'Medium'),
(8, 3, 'What is the correct way to create a function in PHP?', 1, 'Medium'),
(9, 4, 'PHP allows you to send emails directly from a script', 1, 'Medium'),
(10, 5, 'What is a correct way to add a comment in PHP?', 1, 'Medium'),
(15, 1, 'HTML stands for -', 4, 'Basic'),
(16, 2, 'The correct sequence of HTML tags for starting a webpage is -', 4, 'Basic'),
(17, 3, 'HTML is what type of language ?', 4, 'Basic'),
(18, 4, 'HTML uses', 4, 'Basic'),
(19, 5, 'The year in which HTML was first proposed _______.', 4, 'Basic'),
(21, 1, 'Types of computer graphics are', 10, 'Basic'),
(22, 2, 'Raster graphics are composed of', 10, 'Basic'),
(23, 3, 'Pixels can be arranged in a regular  ', 10, 'Basic'),
(24, 4, 'GUI stands for ', 10, 'Basic'),
(25, 5, 'Each pixels has ----  basic color components', 10, 'Basic'),
(46, 1, 'What is the preferred way for adding a background color in HTML?', 15, 'Basic'),
(47, 2, 'What is the correct HTML for creating a hyperlink?', 15, 'Basic'),
(48, 3, 'How can you open a link in a new browser window?', 15, 'Basic'),
(49, 4, 'Which of these tags are all <table> tags?', 15, 'Basic'),
(50, 1, 'Whats so great about XML?', 15, 'Medium'),
(51, 1, ' _________ keyword is used to declare variables in javascript.', 15, 'High'),
(62, 1, 'Which of the following is the default file extension of PHP?', 1, 'High');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `cors_name` varchar(200) NOT NULL,
  `c_id` int(200) NOT NULL,
  `register_date` date NOT NULL DEFAULT current_timestamp(),
  `tcr_id` int(200) NOT NULL,
  `tcr_name` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `usrid` int(200) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'In progress'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`cors_name`, `c_id`, `register_date`, `tcr_id`, `tcr_name`, `user`, `usrid`, `status`) VALUES
('Graphic Design', 10, '2021-11-11', 2, 'Humaira Ahmed', 'shirin', 1, 'In progress'),
('Develop your own game', 14, '2021-11-11', 2, 'Humaira Ahmed', 'shirin', 1, 'In progress'),
('PHP', 1, '2021-11-11', 2, 'Humaira Ahmed', 'maruf', 10, 'In progress'),
('PHP', 1, '2021-11-11', 2, 'Humaira Ahmed', 'ria', 7, 'In progress'),
('Frontend web development Course', 15, '2021-11-11', 9, 'Shirin Sultana', 'maruf', 10, 'In progress'),
('Frontend web development Course', 15, '2021-11-12', 9, 'Shirin Sultana', 'humaira', 2, 'In progress'),
('PHP', 1, '2021-11-12', 2, 'Humaira Ahmed', 'shirinria', 9, 'In progress'),
('PHP', 1, '2021-11-15', 2, 'Humaira Ahmed', 'humaira', 2, 'done'),
('PHP', 24, '2021-11-25', 2, 'Humaira Ahmed', 'humaira', 2, 'In progress'),
('IELTS', 2, '2021-11-25', 9, 'Shirin Sultana', 'shirin', 1, 'In progress'),
('PHP', 1, '2021-11-25', 2, 'Humaira Ahmed', 'shirin', 1, 'In progress'),
('IELTS', 2, '2021-11-25', 9, 'Shirin Sultana', 'shirinria', 9, 'In progress'),
('test4', 28, '2021-11-25', 9, 'Shirin Sultana', 'shirinria', 9, 'In progress'),
('test4', 28, '2021-11-25', 9, 'Shirin Sultana', 'shirin', 1, 'In progress');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `cid` int(200) NOT NULL,
  `review` varchar(10000) NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`cid`, `review`, `user`) VALUES
(1, 'Great Course.', 'shirinria'),
(1, 'Great Course.', 'maruf'),
(1, 'Helpful', 'maruf'),
(1, 'Great Course.', 'maruf'),
(1, 'Great Course.', 'maruf'),
(1, 'Great Course.', 'maruf'),
(1, 'Great Course.', 'maruf'),
(1, 'Great Course.', 'maruf'),
(1, 'Great Course.', 'maruf'),
(1, 'Great Course.', 'maruf'),
(1, 'Great Course.', 'maruf');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `crs_id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `video` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`crs_id`, `name`, `video`) VALUES
('1', 'Lecture', 'uploads/1.mp4'),
('2', 'Lecture', 'uploads/2.mp4'),
('4', 'HTML', 'uploads/HTML4.wmv'),
('10', 'Lecture', 'uploads/Lecture10.mp4'),
('15', 'HTML Tutorial: Semantic Tags in HTML', 'uploads/HTML Tutorial: Semantic Tags in HTML15.mp4'),
('18', 'one', 'uploads/one18.wmv');

-- --------------------------------------------------------

--
-- Table structure for table `sign`
--

CREATE TABLE `sign` (
  `bdate` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fullname` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `mobile` varchar(500) NOT NULL,
  `OTP` varchar(500) NOT NULL,
  `passwor` varchar(200) DEFAULT NULL,
  `type` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `img_path` varchar(500) NOT NULL,
  `ides` varchar(5000) DEFAULT NULL,
  `otpmtch` varchar(20) NOT NULL DEFAULT 'Not Match'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sign`
--

INSERT INTO `sign` (`bdate`, `country`, `email`, `fullname`, `gender`, `mobile`, `OTP`, `passwor`, `type`, `username`, `user_id`, `img_path`, `ides`, `otpmtch`) VALUES
('', '', 'efshitaria123@gmail.com', 'Shirin Sultana', 'female', '', '59843', '84ddfb34126fc3a48ee38d7044e87276', 'Learner', 'shirin', 1, 'uploads/efshitaria123@gmail.com.jpg', '', 'Match'),
('2000-02-12', 'Bangladesh', 'shirinsultana596@gmail.com', 'Humaira Ahmed', 'female', '', '35591', 'dc40b7120e77741d191c0d2b82cea7be', 'Teacher', 'humaira', 2, 'uploads/shirinsultana596@gmail.com.', '<p><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">I am a Web developer.I </span><strong style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">construct the layout of a website, creating a visually interesting home page and user-friendly design, and may sometimes write content for the website</strong><span style=\"color: #202124; font-family: arial, sans-serif; font-size: 16px; background-color: #ffffff;\">. After a website is up and running, developers ensure the site is functional on all web browsers, testing and updating as needed.</span></p>', 'Match'),
('', '', 'ssria41@gmail.com', 'Shirin Sultana', 'female', '', '71349', '84ddfb34126fc3a48ee38d7044e87276', 'Learner', 'ria', 7, '', NULL, 'Match'),
('', '', 'shirinria76@gmail.com', 'Shirin Sultana', 'female', '', '76076', '08f90c1a417155361a5c4b8d297e0d78', 'Teacher', 'shirinria', 9, '', NULL, 'Match'),
('', '', 'ni242185@gmail.com', 'Maruf Khan', 'male', '', '29790', '67ff32d40fb51f1a2fd2c4f1b1019785', 'Learner', 'maruf', 10, '', NULL, 'Match'),
('', '', 'farhanaamir2000@gmail.com', 'Farhana Amir', 'female', '', '69444', '84ddfb34126fc3a48ee38d7044e87276', 'Learner', 'farhana', 13, '', NULL, 'Match');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `aid` int(200) NOT NULL,
  `ansr` varchar(500) NOT NULL,
  `cid` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`aid`, `ansr`, `cid`) VALUES
(15, 'uploads/SDP_3 (1).pdf', 1),
(29, 'uploads/s-1.png', 15),
(30, 'uploads/s-2.png', 15),
(31, 'uploads/s-3.png', 15),
(32, 'uploads/s-4.png', 15),
(33, 'uploads/s-5.png', 15),
(35, 'uploads/Lab-9.pdf', 2);

-- --------------------------------------------------------

--
-- Table structure for table `stars`
--

CREATE TABLE `stars` (
  `id` int(11) NOT NULL,
  `user` int(200) NOT NULL,
  `rateIndex` tinyint(4) NOT NULL,
  `crs_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stars`
--

INSERT INTO `stars` (`id`, `user`, `rateIndex`, `crs_id`) VALUES
(10, 4, 4, 1),
(12, 1, 1, 1),
(13, 1, 2, 10),
(16, 0, 0, 4),
(0, 7, 2, 1),
(0, 10, 2, 1),
(0, 0, 0, 15),
(0, 10, 2, 15),
(0, 1, 5, 15),
(0, 2, 3, 15),
(0, 2, 3, 1),
(0, 0, 0, 18),
(0, 1, 1, 14),
(0, 0, 0, 23),
(0, 0, 1, 24),
(0, 1, 5, 2),
(0, 0, 0, 29);

-- --------------------------------------------------------

--
-- Table structure for table `summry`
--

CREATE TABLE `summry` (
  `usrid` int(200) NOT NULL DEFAULT 0,
  `q_num` int(200) NOT NULL DEFAULT 0,
  `ansr` varchar(500) NOT NULL DEFAULT '0',
  `cid` int(200) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);
ALTER TABLE `course` ADD FULLTEXT KEY `c_name` (`c_name`,`des`);

--
-- Indexes for table `crs_cat`
--
ALTER TABLE `crs_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`iddd`);

--
-- Indexes for table `sign`
--
ALTER TABLE `sign`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `crs_cat`
--
ALTER TABLE `crs_cat`
  MODIFY `cat_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `iddd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `sign`
--
ALTER TABLE `sign`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `aid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
