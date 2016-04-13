CREATE TABLE Movie(
	id int NOT NULL,
	title varchar(100) NOT NULL,
	year int,
	rating varchar(10),
	company varchar(50),
	primary key (id),
	CHECK (id >= 0)
)ENGINE=INNODB;

CREATE TABLE Actor(
	id int NOT NULL,
	last varchar(20),
	first varchar(20),
	sex varchar(6),
	dob date NOT NULL,
	dod date,
	primary key (id),
	CHECK (dob<dod)
)ENGINE=INNODB;

CREATE TABLE Director(
	id int,
	last varchar(20),
	first varchar(20),
	dob date NOT NULL,
	dod date,
	primary key (id),
	CHECK (dob < dod)
)ENGINE = INNODB;

CREATE TABLE MovieGenre(
	mid int NOT NULL,
	genre varchar(20),
	foreign key(mid) references Movie(id)
)ENGINE=INNODB;

CREATE TABLE MovieDirector(
	mid int,
	did int,
	foreign key(mid) references Movie(id),
	foreign key(did) references Director(id)
)ENGINE=INNODB;

CREATE TABLE MovieActor(
	mid int,
	aid int,
	role varchar(50),
	foreign key(mid) references Movie(id),
	foreign key(aid) references Actor(id)
)ENGINE=INNODB;

CREATE TABLE Review(
	name varchar(20),
	time timestamp,
	mid int,
	rating int,
	comment varchar(500),
	foreign key(mid) references Movie(id),
	CHECK (rating >=0 and rating <= 5)
)ENGINE=INNODB;

CREATE TABLE MaxPersonID(
	id int
)ENGINE=INNODB;

CREATE TABLE MaxMovieID(
	id int
)ENGINE=INNODB;








