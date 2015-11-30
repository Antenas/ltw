DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS events;
DROP TABLE IF EXISTS comment;
DROP TABLE IF EXISTS eventUsers;
DROP TABLE IF EXISTS eventTypes;
DROP TABLE IF EXISTS eventAdmin;

CREATE TABLE users(
	idUser INTEGER PRIMARY KEY AUTOINCREMENT,
	admin BOOLEAN,
	username VARCHAR,
	password VARCHAR	
);


CREATE TABLE events(
	idEvent INTEGER PRIMARY KEY AUTOINCREMENT,
	event_type VARCHAR,
	event_name VARCHAR,
	username VARCHAR
	image_path VARCHAR,
	date DATE,
	description VARCHAR
);

CREATE TABLE comment(
	idcomment INTEGER PRIMARY KEY,
	idUser INTEGER REFERENCES users(idUser),
	idEvent INTEGER REFERENCES events(Events),
	comment VARCHAR NOT NULL
);

CREATE TABLE eventUsers(
	idUSer INTEGER REFERENCES users(idUser),
	idEvent INTEGER REFERENCES events(idEvent),
	PRIMARY KEY(idUser,idEvent)
);


CREATE TABLE eventAdmin(
	idUser INTEGER REFERENCES users(idUser),
	idEvent INTEGER REFERENcES events(idEvent),
	PRIMARY KEY(idUser,idEvent)
);


CREATE TABLE eventTypes(
	idEventType INTEGER PRIMARY KEY,
	idEvent INTEGER REFERENCES events(idEvent),
	type VARCHAR NOT NULL
);

INSERT INTO users VALUES (
	NULL,
	1,
	'admin',
	'password'
);

INSERT INTO users VALUES(
	NULL,
	0,
	'ruben',
	'password'
);