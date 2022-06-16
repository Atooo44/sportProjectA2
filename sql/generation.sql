------------------------------------------------------------
--        Script Postgre 
------------------------------------------------------------

DROP TABLE IF EXISTS city CASCADE;
DROP TABLE IF EXISTS users CASCADE;
DROP TABLE IF EXISTS match CASCADE;
DROP TABLE IF EXISTS reservation CASCADE;

------------------------------------------------------------
-- Table: city
------------------------------------------------------------
CREATE TABLE public.city(
	city   VARCHAR (50) NOT NULL  ,
	CONSTRAINT city_PK PRIMARY KEY (city)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: user
------------------------------------------------------------
CREATE TABLE public.user(
	mail           VARCHAR (50) NOT NULL ,
	first_name     VARCHAR (50) NOT NULL ,
	last_name      VARCHAR (50) NOT NULL ,
	age            INT  NOT NULL ,
	password       VARCHAR (80) NOT NULL ,
	fit            VARCHAR (50) NOT NULL ,
	match_played   INT  NOT NULL ,
	city           VARCHAR (50) NOT NULL  ,
	CONSTRAINT user_PK PRIMARY KEY (mail)

	,CONSTRAINT user_city_FK FOREIGN KEY (city) REFERENCES public.city(city)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: match
------------------------------------------------------------
CREATE TABLE public.match(
	id_match      SERIAL NOT NULL ,
	sport         VARCHAR (50) NOT NULL ,
	max_player    INT  NOT NULL ,
	date          TIMESTAMP  NOT NULL ,
	length        FLOAT  NOT NULL ,
	price         FLOAT  NOT NULL ,
	score         VARCHAR (50) NOT NULL ,
	best_player   VARCHAR (50) NOT NULL ,
	mail          VARCHAR (50) NOT NULL ,
	city          VARCHAR (50) NOT NULL  ,
	CONSTRAINT match_PK PRIMARY KEY (id_match)

	,CONSTRAINT match_user_FK FOREIGN KEY (mail) REFERENCES public.user(mail)
	,CONSTRAINT match_city0_FK FOREIGN KEY (city) REFERENCES public.city(city)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: reservation
------------------------------------------------------------
CREATE TABLE public.reservation(
	id_reservation   SERIAL NOT NULL ,
	validation       INT  NOT NULL ,
	mail             VARCHAR (50) NOT NULL ,
	id_match         INT  NOT NULL  ,
	CONSTRAINT reservation_PK PRIMARY KEY (id_reservation)

	,CONSTRAINT reservation_user_FK FOREIGN KEY (mail) REFERENCES public.user(mail)
	,CONSTRAINT reservation_match0_FK FOREIGN KEY (id_match) REFERENCES public.match(id_match)
)WITHOUT OIDS;



