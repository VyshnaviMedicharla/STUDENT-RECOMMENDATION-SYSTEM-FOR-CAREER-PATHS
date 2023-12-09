

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);


CREATE TABLE `contact` (
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `mobile` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `description` text(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `marks` (
  `subject_id` int(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `score` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `questions` (
  `question_id` int(2) NOT NULL,
  `subject_id`  int(2) NOT NULL,
  `question_text` text(30) NOT NULL,
  `option1` text(30) NOT NULL,
  `option2` text(30) NOT NULL,
  `option3` text(30) NOT NULL,
  `option4` text(30) NOT NULL,
  `correct_option` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);


INSERT INTO `questions` ( `question_id`, `subject_id`, `question_text`, `option1`, `option2`, `option3`, `option4`, `correct_option` ) VALUES
('1','1','‘Dadasaheb Phalke Lifetime Achievement Award was recently conferred to which actor?','Waheeda Rehman','Madhubala','Sridevi','Shabana Azmi','1'),
('2','1','Which state launched a dedicated ‘Tourism Policy 2023’, and aums to attract ₹20,000-crore investments in 5 years?',' Gujarat','Tamil Nadu',' Karnataka','Maharashtra','2'),
('3','1','Which state has signed Rs 2000 crore deal with ropeway construction company Poma Group in London?','Gujarat','Uttarakhand','Assam','Karnataka','2'),
('4','1','Which institution released a report titled ‘India Ageing Report 2023?','NITI Aayog','NSO','UNFPA','World Bank','3'),
('5','1','Standardised Precipitation Index (SPI) is a tool used to monitor which parameter?','Flood','Drought','Air Quality','Radiations','2'),
('6','2','An organization awarded 48 medals in event A, 25 in event B and 18 in event C. If these medals went to total 60 men and only five men got medals in all the three events, then, how many received medals in exactly two of three events?','10','15','21','9','3'),
('7','2','All words, with or without meaning, are made using all the letters of the word MONDAY. These words are written as in a dictionary with serial numbers. The serial number of the word MONDAY is :','324','328','326','327','4'),
('8','2','If the letters of the word MATHS are permuted and all possible words so formed are arranged as in a dictionary with serial numbers, then the serial number of the word THAMS is :','103','104','102','101','1'),
('9','2','The number of five digit numbers, greater than 40000 and divisible by 5 , which can be formed using the digits 0,1,3,5,7 and 9 without repetition, is equal to :','132','72','120','96','3'),
('10','2','The total number of three-digit numbers, divisible by 3, which can be formed using the digits 1,3,5,8 if repetition of digits is allowed, is :','21','22','18','20','2'),
('11','3','A vehicle of mass  200kg is moving along a levelled curved road of radius  70m with angular velocity of  0.2rad/s. The centripetal force acting on the vehicle is:','560N','14N','2800N','2240N','1'),
('12','3','A coin placed on a rotating table just slips when it is placed at a distance of  1cm from the center. If the angular velocity of the table in halved, it will just slip when placed at a distance of _________ from the centre :','4cm','5cm','8cm','9cm','1'),
('13','3','A child of mass  5kg is going round a merry-go-round that makes 1 rotation in  3.14s. The radius of the merry-go-round is  2m. The centrifugal force on the child will be','50N','40N','30N','20N','2'),
('14','3','Two bodies are having kinetic energies in the ratio 16 : 9. If they have same linear momentum, the ratio of their masses respectively is :','10:5','5:10','9:16','16:9','3'),
('15','3','A bullet of mass  0.1kg moving horizontally with speed  400m/s hits a wooden block of mass  3.9kg kept on a horizontal rough surface. The bullet gets embedded into the block and moves 20m before coming to rest. The coefficient of friction between the block and the surface is __________.','0.25','0.85','0.23','0.24','1');




CREATE TABLE `results` (
  `email` varchar(30) NOT NULL,
  `score` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `results`
  ADD PRIMARY KEY (`email`);

CREATE TABLE `subjects` (
  `subject_id` int(2) NOT NULL,
  `subject_name` text(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

INSERT INTO `subjects` (`subject_id`,`subject_name`) VALUES
('1','Current Affairs'),
('2','JEE Maths'),
('3','JEE Physics');







































































