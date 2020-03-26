CREATE DATABASE mini_ismis;

USE mini_ismis;

CREATE TABLE users (
	id INT AUTO_INCREMENT,
	fName VARCHAR(50) NOT NULL,
	lName VARCHAR(50) NOT NULL,
	MI CHAR(1) NOT NULL,
	email VARCHAR(100) NOT NULL,
	pass VARCHAR(150) NOT NULL,
	userType ENUM('Student', 'Faculty', 'Admin') DEFAULT 'Student',
	
	CONSTRAINT users_pk PRIMARY KEY (id)
);

CREATE TABLE subject (
	subjectId INT AUTO_INCREMENT,
	subName VARCHAR(50) NOT NULL,
	maxStud INT DEFAULT 40,
	
	CONSTRAINT subject_pk PRIMARY KEY (subjectId)
);

CREATE TABLE class (
	classId INT AUTO_INCREMENT,
	classDay1 ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'),
	classTime1 ENUM('7:30 am - 9:00 am', '9:00 am - 10:30 am', '10:30 am - 12:00 pm',
					'12:00 pm - 1:30 pm', '1:30 pm - 3:00 pm', '3:00 pm - 4:30 pm',
					'4:30 pm - 6:00 pm', '6:00 pm - 7:30 pm'),
	classDay2 ENUM('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'),
	classTime2 ENUM('7:30 am - 9:00 am', '9:00 am - 10:30 am', '10:30 am - 12:00 pm',
					'12:00 pm - 1:30 pm', '1:30 pm - 3:00 pm', '3:00 pm - 4:30 pm',
					'4:30 pm - 6:00 pm', '6:00 pm - 7:30 pm'),					
	subjectId INT NOT NULL,
	facultyId INT NOT NULL,
	
	CONSTRAINT classId_pk PRIMARY KEY (classId),
	CONSTRAINT class_fk1 FOREIGN KEY (subjectId) REFERENCES subject (subjectId),
	CONSTRAINT subject_fk FOREIGN KEY (facultyId) REFERENCES users (id)
);

CREATE TABLE schedule (
	schedId INT AUTO_INCREMENT,
	id INT NOT NULL,
	classId INT NOT NULL,
	subjectId INT NOT NULL,
	
	CONSTRAINT schedule_pk PRIMARY KEY (schedId),
	CONSTRAINT schedule_fk1 FOREIGN KEY (id) REFERENCES users (id),
	CONSTRAINT schedule_fk2 FOREIGN KEY (classId) REFERENCES class (classId),
	CONSTRAINT schedule_fk3 FOREIGN KEY (subjectId) REFERENCES subject (subjectId)
);

INSERT INTO users(fName, lName, MI, email, pass, userType) 
VALUES ('admin', 'a', 'admin', 'admin@gmail.com', 
'a48826003e3e161b92538c432a7b33433fac2d0fe262c9fddab42b1a71451747e45167aa0d0801240
7b9a6842d47a074facc1ba56e8954ed245951c39f07302a', 'Admin'); /*password = testadmin*/