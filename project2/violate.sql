--Movie id must be positive
insert into Movie values (-1,'love and love', 2001, 'G', 'Disney');

--Movie id should be unique
-- ERROR 1062 (23000): Duplicate entry '1974' for key 1
insert into Movie values(1974,'love and love', 2001,'G','Warner');

--Actor must have dob
insert into Actor values(998888, 'Ann', 'Hugh', 'Female', null, 19910923);

--insert a tuple with the id that has already exist
-- ERROR 1062 (23000): Duplicate entry '68614' for key 1
insert into Actor values(68614, 'Bob', 'John', 'Male', 19900101, null);

--insert a tuple that the id has already exist
--ERROR 1062 (23000): Duplicate entry '68525' for key 1
insert into Director values(68525, 'Jame', 'Jimmy', 19860202, null);

--insert a review with rating smaller than 1
insert into Review values('Anne',2001-02-02, 4734, -1, 'bad');

--insert a Movie genre which id is not in the Movie
-- ERROR 1452 (23000): Cannot add or update a child row: 
-- a foreign key constraint fails (`CS143/MovieGenre`, CONSTRAINT `MovieGenre_ibfk_1` 
	-- FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))
insert into MovieGenre values (0, 'bank');

--insert a Movie Director whose mid is not in the table Movie
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails 
-- (`CS143/MovieDirector`, CONSTRAINT `MovieDirector_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))
insert into MovieDirector values(1,68517);

--insert a MovieDirector whose did is not in table Director
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails 
-- (`CS143/MovieDirector`, CONSTRAINT `MovieDirector_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))
insert into MovieDirector values(4735,68503);

--insert a MovieActor with a Movie id that is not exist
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails 
-- (`CS143/MovieActor`, CONSTRAINT `MovieActor_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))
insert into MovieActor values(4735,68635,"Kingsman");

--insert a MovieActor with an Actor id that is not exist
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails 
-- (`CS143/MovieActor`, CONSTRAINT `MovieActor_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `Actor` (`id`))
insert into MovieActor values(4734,68636,"Kingsman");

--insert a review with a movie id that is not exist
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails
-- (`CS143/Review`, CONSTRAINT `Review_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))
insert into Review values('Sab', 2001-02-01, 4735, 1, 'just so so');
