-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2021 at 05:21 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_answer`
--

CREATE TABLE `tbl_answer` (
  `slno` int(3) NOT NULL,
  `uid` varchar(30) NOT NULL,
  `cid` int(3) NOT NULL,
  `qno` int(3) NOT NULL,
  `ca` char(1) NOT NULL,
  `dop` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_answer`
--

INSERT INTO `tbl_answer` (`slno`, `uid`, `cid`, `qno`, `ca`, `dop`) VALUES
(75, 'ranitmondal98@gmail.com', 101, 1, 'A', '2021-03-01'),
(76, 'ranitmondal98@gmail.com', 101, 2, 'A', '2021-03-01'),
(77, 'ranitmondal98@gmail.com', 101, 3, 'B', '2021-03-01'),
(78, 'ranitmondal98@gmail.com', 101, 4, 'B', '2021-03-01'),
(79, 'ranitmondal98@gmail.com', 101, 5, 'A', '2021-03-01'),
(80, 'ranitmondal98@gmail.com', 101, 6, 'B', '2021-03-01'),
(81, 'ranitmondal98@gmail.com', 101, 7, 'C', '2021-03-01'),
(82, 'ranitmondal98@gmail.com', 101, 8, 'C', '2021-03-01'),
(83, 'ranitmondal98@gmail.com', 101, 9, 'C', '2021-03-01'),
(84, 'ranitmondal98@gmail.com', 101, 10, 'C', '2021-03-01'),
(85, 'ranitmondal98@gmail.com', 102, 1, 'A', '2021-03-07'),
(86, 'ranitmondal98@gmail.com', 102, 2, 'B', '2021-03-07'),
(87, 'ranitmondal98@gmail.com', 102, 3, 'B', '2021-03-07'),
(88, 'ranitmondal98@gmail.com', 102, 4, 'B', '2021-03-07'),
(89, 'ranitmondal98@gmail.com', 102, 5, 'B', '2021-03-07'),
(90, 'ranitmondal98@gmail.com', 102, 6, 'B', '2021-03-07'),
(91, 'ranitmondal98@gmail.com', 102, 7, 'B', '2021-03-07'),
(92, 'ranitmondal98@gmail.com', 102, 8, 'B', '2021-03-07'),
(93, 'ranitmondal98@gmail.com', 102, 9, 'B', '2021-03-07'),
(94, 'ranitmondal98@gmail.com', 102, 10, 'B', '2021-03-07'),
(95, 'ranitmondal98@gmail.com', 104, 1, 'A', '2021-03-07'),
(96, 'ranitmondal98@gmail.com', 104, 2, 'B', '2021-03-07'),
(97, 'ranitmondal98@gmail.com', 104, 3, 'C', '2021-03-07'),
(98, 'ranitmondal98@gmail.com', 104, 4, 'B', '2021-03-07'),
(99, 'ranitmondal98@gmail.com', 104, 5, 'C', '2021-03-07'),
(100, 'ranitmondal98@gmail.com', 104, 6, 'C', '2021-03-07'),
(101, 'ranitmondal98@gmail.com', 104, 7, 'B', '2021-03-07'),
(102, 'ranitmondal98@gmail.com', 104, 8, 'A', '2021-03-07'),
(103, 'ranitmondal98@gmail.com', 104, 9, 'B', '2021-03-07'),
(104, 'ranitmondal98@gmail.com', 104, 10, 'B', '2021-03-07'),
(105, 'ranitmondal98@gmail.com', 103, 1, 'A', '2021-03-07'),
(106, 'ranitmondal98@gmail.com', 103, 2, 'C', '2021-03-07'),
(107, 'ranitmondal98@gmail.com', 103, 3, 'A', '2021-03-07'),
(108, 'ranitmondal98@gmail.com', 103, 4, 'B', '2021-03-07'),
(109, 'ranitmondal98@gmail.com', 103, 5, 'B', '2021-03-07'),
(110, 'ranitmondal98@gmail.com', 103, 6, 'C', '2021-03-07'),
(111, 'ranitmondal98@gmail.com', 103, 7, 'A', '2021-03-07'),
(112, 'ranitmondal98@gmail.com', 103, 8, 'C', '2021-03-07'),
(113, 'ranitmondal98@gmail.com', 103, 9, 'A', '2021-03-07'),
(114, 'ranitmondal98@gmail.com', 103, 10, 'B', '2021-03-07'),
(115, 'ranitmondal98@gmail.com', 101, 1, 'A', '2021-03-07'),
(116, 'ranitmondal98@gmail.com', 101, 2, 'A', '2021-03-07'),
(117, 'ranitmondal98@gmail.com', 101, 3, 'B', '2021-03-07'),
(118, 'ranitmondal98@gmail.com', 101, 4, 'B', '2021-03-07'),
(119, 'ranitmondal98@gmail.com', 101, 5, 'A', '2021-03-07'),
(120, 'ranitmondal98@gmail.com', 101, 6, 'B', '2021-03-07'),
(121, 'ranitmondal98@gmail.com', 101, 7, 'C', '2021-03-07'),
(122, 'ranitmondal98@gmail.com', 101, 8, 'C', '2021-03-07'),
(123, 'ranitmondal98@gmail.com', 101, 9, 'C', '2021-03-07'),
(124, 'ranitmondal98@gmail.com', 101, 10, 'C', '2021-03-07'),
(125, 'ranitmondal98@gmail.com', 101, 1, 'A', '2021-03-07'),
(126, 'ranitmondal98@gmail.com', 101, 2, 'A', '2021-03-07'),
(127, 'ranitmondal98@gmail.com', 101, 3, 'B', '2021-03-07'),
(128, 'ranitmondal98@gmail.com', 101, 4, 'B', '2021-03-07'),
(129, 'ranitmondal98@gmail.com', 101, 5, 'A', '2021-03-07'),
(130, 'ranitmondal98@gmail.com', 101, 6, 'B', '2021-03-07'),
(131, 'ranitmondal98@gmail.com', 101, 7, 'C', '2021-03-07'),
(132, 'ranitmondal98@gmail.com', 101, 8, 'C', '2021-03-07'),
(133, 'ranitmondal98@gmail.com', 101, 9, 'C', '2021-03-07'),
(134, 'ranitmondal98@gmail.com', 101, 10, 'C', '2021-03-07'),
(135, 'ranitmondal98@gmail.com', 101, 1, 'A', '2021-03-14'),
(136, 'ranitmondal98@gmail.com', 101, 2, 'A', '2021-03-14'),
(137, 'ranitmondal98@gmail.com', 101, 3, 'B', '2021-03-14'),
(138, 'ranitmondal98@gmail.com', 101, 4, 'B', '2021-03-14'),
(139, 'ranitmondal98@gmail.com', 101, 5, 'A', '2021-03-14'),
(140, 'ranitmondal98@gmail.com', 101, 6, 'B', '2021-03-14'),
(141, 'ranitmondal98@gmail.com', 101, 7, 'C', '2021-03-14'),
(142, 'ranitmondal98@gmail.com', 101, 8, 'C', '2021-03-14'),
(143, 'ranitmondal98@gmail.com', 101, 9, 'C', '2021-03-14'),
(144, 'ranitmondal98@gmail.com', 101, 10, 'C', '2021-03-14'),
(145, 'sanjib@gmail.com', 101, 1, 'A', '2021-03-16'),
(146, 'sanjib@gmail.com', 101, 2, 'A', '2021-03-16'),
(147, 'sanjib@gmail.com', 101, 3, 'A', '2021-03-16'),
(148, 'sanjib@gmail.com', 101, 4, 'B', '2021-03-16'),
(149, 'sanjib@gmail.com', 101, 5, 'B', '2021-03-16'),
(150, 'sanjib@gmail.com', 101, 5, 'B', '2021-03-16'),
(151, 'sanjib@gmail.com', 101, 6, 'C', '2021-03-16'),
(152, 'sanjib@gmail.com', 101, 7, 'B', '2021-03-16'),
(153, 'sanjib@gmail.com', 101, 8, 'C', '2021-03-16'),
(154, 'sanjib@gmail.com', 101, 9, 'B', '2021-03-16'),
(155, 'sanjib@gmail.com', 101, 10, 'B', '2021-03-16'),
(156, 'sanjib@gmail.com', 101, 1, 'A', '2021-03-16'),
(157, 'sanjib@gmail.com', 101, 2, 'A', '2021-03-16'),
(158, 'sanjib@gmail.com', 101, 3, 'A', '2021-03-16'),
(159, 'sanjib@gmail.com', 101, 4, 'B', '2021-03-16'),
(160, 'sanjib@gmail.com', 101, 5, 'B', '2021-03-16'),
(161, 'sanjib@gmail.com', 101, 6, 'C', '2021-03-16'),
(162, 'sanjib@gmail.com', 101, 7, 'B', '2021-03-16'),
(163, 'sanjib@gmail.com', 101, 8, 'C', '2021-03-16'),
(164, 'sanjib@gmail.com', 101, 9, 'B', '2021-03-16'),
(165, 'sanjib@gmail.com', 101, 9, 'B', '2021-03-16'),
(166, 'sanjib@gmail.com', 101, 10, 'B', '2021-03-16'),
(167, 'ranitmondal98@gmail.com', 101, 1, 'A', '2021-03-20'),
(168, 'ranitmondal98@gmail.com', 101, 2, 'A', '2021-03-20'),
(169, 'ranitmondal98@gmail.com', 101, 3, 'B', '2021-03-20'),
(170, 'ranitmondal98@gmail.com', 101, 4, 'B', '2021-03-20'),
(171, 'ranitmondal98@gmail.com', 101, 5, 'A', '2021-03-20'),
(172, 'ranitmondal98@gmail.com', 101, 6, 'B', '2021-03-20'),
(173, 'ranitmondal98@gmail.com', 101, 7, 'C', '2021-03-20'),
(174, 'ranitmondal98@gmail.com', 101, 8, 'C', '2021-03-20'),
(175, 'ranitmondal98@gmail.com', 101, 9, 'C', '2021-03-20'),
(176, 'ranitmondal98@gmail.com', 101, 10, 'C', '2021-03-20'),
(177, 'ankita@gmail.com', 101, 1, 'A', '2021-03-20'),
(178, 'ankita@gmail.com', 101, 2, 'B', '2021-03-20'),
(179, 'ankita@gmail.com', 101, 3, 'C', '2021-03-20'),
(180, 'ankita@gmail.com', 101, 4, 'B', '2021-03-20'),
(181, 'ankita@gmail.com', 101, 5, 'C', '2021-03-20'),
(182, 'ankita@gmail.com', 101, 6, 'A', '2021-03-20'),
(183, 'ankita@gmail.com', 101, 7, 'C', '2021-03-20'),
(184, 'ankita@gmail.com', 101, 8, 'B', '2021-03-20'),
(185, 'ankita@gmail.com', 101, 9, 'B', '2021-03-20'),
(186, 'ankita@gmail.com', 101, 10, 'C', '2021-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cid` varchar(10) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `qno` int(3) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cid`, `cname`, `qno`) VALUES
('101', 'C', 11),
('102', 'C++', 11),
('103', 'JAVA', 12),
('104', 'DATA STRUCTURE', 11),
('105', 'PYTHON', 11),
('106', 'DBMS', 1),
('107', 'DIGITAL LOGIC', 1),
('108', 'NETWORKING', 1),
('109', 'CYBER SECURITY', 1),
('110', 'php', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_player`
--

CREATE TABLE `tbl_player` (
  `user_name` varchar(60) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_player`
--

INSERT INTO `tbl_player` (`user_name`, `email`, `password`, `dob`) VALUES
('', '', '', '0000-00-00'),
('Ankita', 'ankita@gmail.com', '123', '2021-03-23'),
('ranit', 'ranitmondal98@gmail.com', '123', '2021-04-01'),
('sanjib', 'sanjib@gmail.com', '123', '2021-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `sno` int(3) NOT NULL,
  `cid` int(3) NOT NULL,
  `qno` int(3) NOT NULL,
  `question` varchar(200) NOT NULL,
  `op1` varchar(100) NOT NULL,
  `op2` varchar(100) NOT NULL,
  `op3` varchar(100) NOT NULL,
  `op4` varchar(100) NOT NULL,
  `ca` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`sno`, `cid`, `qno`, `question`, `op1`, `op2`, `op3`, `op4`, `ca`) VALUES
(17, 102, 1, 'which of the following is the correct syntax to print the message in c++ language?', 'cout<<\"hello world!\";', 'cout<<hello world!;', 'out<<\"hello world!;', 'none of the above', 'A'),
(18, 102, 2, 'which of the following is the correct identifire?', '$var_name', 'var_123', 'varname@', 'none of the above', 'B'),
(19, 102, 3, 'which of the following is the address operator?', '@', '#', '&', '%', 'C'),
(20, 102, 4, 'the programming language that has the ability create new data types is called--------', 'overloaded', 'encapsulated', 'reprehensible', 'extensible', 'D'),
(21, 102, 5, 'which of the following is the original creator of the c++ language', 'dennis ritchie', 'ken thompson', 'bjarne stroustrup', 'brian kernighan', 'C'),
(22, 102, 6, 'which of the following is the correct syntax to read the single character to console in the c++ language', 'read ch()', 'getline vh()', 'get(ch)', 'scanf(ch)', 'C'),
(23, 102, 7, 'the c++ language is------object-oriented language', 'pure object oriented', 'not object oriented', 'semi object-oriented or partial object-oriented', 'none of the above', 'C'),
(24, 102, 8, 'c++ is a--------type of language', 'high-level language', 'low level language', 'middle level language', 'none of the above', 'C'),
(25, 102, 9, 'which of the following comment syntax is correct to create a single-line comment in the c++ program?', '//comment', '/comment/', 'comment//', 'none of the above', 'A'),
(26, 102, 10, 'which one of the following represents the tab?', '\n', '	', '\r', 'none of the above', 'B'),
(27, 103, 1, 'which of the following option leads to the portability and security of java?', 'bytecode is executed by Jvm', 'the applet makes the java code secure and portable', 'use of exception handling', 'dynamic binding between objects', 'A'),
(28, 103, 2, 'which of the following is not a java features?', 'dynamic', 'architecture neutral', 'use of pointers', 'object-oriented', 'C'),
(29, 103, 3, 'the u0021 article referred to as a', 'unicode escape sequence', 'octal escape', 'hexadecimal', 'line feed', 'A'),
(30, 103, 4, '-------is used to find and fix bugs in the java programs', 'jvm', 'jre', 'jdk', 'jdb', 'D'),
(31, 103, 5, 'which of the following is a valid long literal?', 'abh8097', 'l990023', '904423', '0xnf029l', 'D'),
(32, 103, 6, 'what is the return type of the hashcode()method in the object class?', 'object', 'int', 'long', 'void', 'B'),
(33, 103, 7, 'what does the expression floar a=35/0 return?', '0', 'not a number', 'infinity', 'run time exception', 'C'),
(35, 103, 8, 'which of the following is a  marker interface?', 'runnable interface', 'remote interface', 'readable interface', 'result interface', 'B'),
(36, 103, 9, 'which of the following is a reserved keyword in java?', 'object', 'strictfp', 'main', 'system', 'B'),
(37, 103, 10, 'which keyword is used for accessing the features of a package?', 'package', 'import', 'extends', 'export', 'B'),
(38, 101, 1, 'WHO DEVELOPED C?', 'dennis ritchie', 'kerminghum', 'james gosling', 'rasmus ledorf', 'A'),
(39, 101, 2, 'what is a lint?', 'c compiler', 'interactive debugger', 'analyzing tool', 'c interpreter', 'C'),
(40, 101, 3, 'what is the output of this statement \"print(%d\",(a++))\"?', 'the value of (a+1)', 'the current value of a', 'error message', 'garbage', 'B'),
(41, 101, 4, 'why is a macro used in place of a function?', 'it reduce execution time', 'it reduce code size', 'it increases execution time', 'it increases code size', 'B'),
(42, 101, 5, 'in the c language,the constant is defined---------.', 'before main', 'after main', 'anywhere,but starting on a new line', 'none of the these', 'C'),
(43, 101, 6, 'how many times will the following loop execute? for(j=1;j<=10;j=j-1)', 'forever', 'never', '0', '1', 'A'),
(44, 101, 7, 'which one of the following is a loop construct that will always be executed once?', 'for', 'while', 'switch', 'do while', 'D'),
(45, 101, 8, 'how many characters can a string hold when declared as follows?  char name[20]:', '18', '19', '20', 'none of the these', 'C'),
(46, 101, 9, 'directives are translated by the', 'pre-processor', 'compiler', 'linker', 'editor', 'A'),
(47, 101, 10, 'how many bytes does \"int=d\" use?', '0', '1', '2 or 4', '10', 'C'),
(48, 105, 1, 'what is the maximum possible length of an identifier?', '16', '32', '64', 'none of the above', 'D'),
(49, 105, 2, 'who developed the python language?', 'zim den', 'guido van rossum', 'niene stom', 'wick van rossum', 'B'),
(50, 105, 3, 'in which year was the python language developed?', '1995', '1972', '1981', '1989', 'D'),
(51, 105, 4, 'in which language is python  written?', 'english', 'php', 'c', 'none of the above', 'C'),
(52, 105, 5, 'which one of the following is the correct extension of the python file?', '.py', '.python', '.p', 'none of the these', 'A'),
(53, 105, 6, 'in which year was the python 3.0 version developed?', '2008', '20000', '2010', '2005', 'A'),
(54, 105, 7, 'what do we use to define a block of code in python language?', 'key', 'brackets', 'indentation', 'none of the these', 'C'),
(55, 105, 8, 'which character is used in python to make a single line comment?', '/', '//', '#', '!', 'C'),
(56, 105, 9, 'what is the method inside the class in python language?', 'object', 'function', 'attribute', 'argument', 'B'),
(57, 105, 10, 'which of the following is not a keyword in python language?', 'val', 'raise', 'try', 'with', 'A'),
(58, 104, 1, 'which of the following is the correct way of declaring an array?', 'int javapoint[10];', 'int javapoint;', 'javapoint{20};', 'array javapoint[10];', 'A'),
(59, 104, 2, 'how can we initialize an array in c language?', 'int arr[2]=(10,20)', 'int arr(2)={10,20}', 'int arr[2]={10,20}', 'int arr(2)=(10,20)', 'C'),
(60, 104, 3, 'which of the following highly uses the concept of an array', 'binary search tree', 'caching', 'spatial locality', 'scheduling of processes', 'C'),
(61, 104, 4, 'which one of the following is the size of int arr[9] assuming that int is of 4 bytes?', '9', '36', '35', 'none of the above', 'B'),
(62, 104, 5, 'which one of the following is the process of inserting an element in the stack?', 'insert', 'add', 'push', 'none of the above', 'C'),
(63, 104, 6, 'which one of the following is not the application of the stack data structure', 'string reversal', 'recursion', 'backtracking', 'asynchronous data transfer', 'D'),
(64, 104, 7, 'which data structure is mainly used for implementing the recursive algorithm?', 'queue', 'stack', 'binary tree', 'linked list', 'B'),
(65, 104, 8, 'which of the following is the infix expression?', 'a+b*c', '+a*bc', 'abc+*', 'none of the above', 'A'),
(66, 104, 9, 'the minimum number of stack required to implement a stack is-----', '1', '3', '2', '5', 'C'),
(67, 104, 10, 'what is another name for the circle queue among the following options?', 'square buffer', 'rectangle buffer', 'ring buffer', 'none of the above', 'C'),
(68, 110, 1, 'sdghfjhsd', 'sdj', 'bdkkj', 'jwdkj', ',jwqhdj', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register_user`
--

CREATE TABLE `tbl_register_user` (
  `uid` varchar(20) NOT NULL,
  `pwd` varchar(40) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `contact_no` int(10) NOT NULL,
  `img_name` varchar(100) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_register_user`
--

INSERT INTO `tbl_register_user` (`uid`, `pwd`, `uname`, `dob`, `contact_no`, `img_name`) VALUES
('', '', '', '0000-00-00', 0, 'default.png'),
('admin', '1233', 'sayani chanda', '2021-01-05', 1234567890, 'WIN_20191114_14_43_37_Pro.jpg'),
('admin1', '123456', 'sayani', '2021-01-14', 2147483647, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `cid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`cid`) VALUES
(128);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_answer`
--
ALTER TABLE `tbl_answer`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tbl_player`
--
ALTER TABLE `tbl_player`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `tbl_register_user`
--
ALTER TABLE `tbl_register_user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_answer`
--
ALTER TABLE `tbl_answer`
  MODIFY `slno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
