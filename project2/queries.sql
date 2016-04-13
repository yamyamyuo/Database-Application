--Give me the names of all the actors in the movie 'Die Another Day'. 
--Please also make sure actor names are in this format:  <firstname> <lastname>   
--(seperated by single space).
select concat(first, ' ', last) name
from Actor as A, Movie as M, MovieActor as MA
where A.id = MA.aid and M.id = MA.mid and M.title = 'Die Another Day';

--Give me the count of all the actors who acted in multiple movies.
select count(*)
from (
	select Actor.id
	from Actor
	join MovieActor on Actor.id = MovieActor.aid
	Group by Actor.id
	having count(MovieActor.aid) > 1
	) as temp;

--How many Directors who had direct Crime movie before?
select count(*)
from (
	select D.id
	from Director as D, MovieDirector as MD, MovieGenre as MG
	where D.id = MD.did and MD.mid = MG.mid and MG.genre = 'Crime'
) as temp;

--List Movie id , Movie title and the number of actors in every movie directed by Ang Lee.
select M.id, M.title, count(*) as num
from Movie as M, MovieActor as MA, Actor as A, MovieDirector as MD, Director as D
where M.id = MA.mid and MA.aid = A.id and MD.mid = M.id and MD.did = D.id and D.last = "Lee" and D.first = "Ang"
Group by M.id

--List Ang Lee's movie
select M.id, M.title
from Movie as M, MovieDirector as MD, Director as D
where M.id = MD.mid and MD.did = D.id and D.last = "Lee" and D.first = "Ang";