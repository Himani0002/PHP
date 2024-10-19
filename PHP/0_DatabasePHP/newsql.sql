use himanidb;
 
CREATE TABLE `users` (
	 `UId` 		     	int		   NOT NULL   AUTO_INCREMENT,
     `UFullName` 		varchar(100)    NOT NULL,
  	 `UUsername`		varchar(100)    NOT NULL,
     `UEmail` 	    	varchar(100)    NOT NULL,
     `UPhNumber`        varchar(100)    NOT NULL,
  	 `UPassword` 		varchar(100)    NOT NULL,
     `UGender`   		varchar(100)    NOT NULL,
	 PRIMARY KEY (`UId`)
     
)  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE EMPLOYEE
(
	EId					int 			NOT NULL 	auto_increment,
    EFname 				varchar(100) 	NOT NULL ,
    ELname				varchar(100) 	NOT NULL ,
    EDOB				date 			NOT NULL,
    EDOJ				date 			NOT NULL,
    EGender				varchar(100)    NOT NULL,
	EPhnumber			int 			NOT NULL,
    EEmail				varchar(100)	NOT NULL,
    ECity 				varchar(100) 	NOT NULL,
    EPinCode			varchar(100) 	NOT NULL,
    
    
    EDOJ				date			NOT NULL,
	Es
    
    PRIMARY KEY (EID)
    
);


