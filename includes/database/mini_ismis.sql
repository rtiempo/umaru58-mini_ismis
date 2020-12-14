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
	facultyId INT,
	
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

INSERT INTO users(id, fName, lName, MI, email, pass, userType) VALUES 
(1, 'adminFN', 'adminLN', 'a', 'admin@gmail.com', 'a48826003e3e161b92538c432a7b33433fac2d0fe262c9fddab42b1a71451747e45167aa0d08012407b9a6842d47a074facc1ba56e8954ed245951c39f07302a', 'Admin'), /* password = testadmin */
(2, 'facultyFN', 'facultyLN', 'f', 'faculty@gmail.com', '1bc5df7186ca4173f7fa8962c79a4b98d9e7f72f671134d67b8508120fc1e1a98af7fd9100d5dc8a61e8cce3c0a36122a0c9af141d521f3c698d354d28a0412e', 'Faculty'), /* password = testfaculty */
(3, 'studentFN', 'studentLN', 's', 'student@gmail.com', '7fdd22c22b596e2e103c704369478b9761dc17e0f51e7f1936ea38fed2ad83da8db0a37a9fefcf256158513f17fc8ac001c5bf10dcf2d16a41a9a49c480e46d2', 'Student');

INSERT INTO subject (subjectId, subName, maxStud) VALUES
(1, 'WebDev', 30);

INSERT INTO class (classId, classDay1, classTime1, classDay2, classTime2, subjectId, facultyId) VALUES
(1, 'Monday', '7:30 am - 9:00 am', 'Wednesday', '7:30 am - 9:00 am', 1, 2);
