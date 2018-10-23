CREATE TABLE users (
  id int NOT NULL AUTO_INCREMENT,
  first_name varchar(255) NOT NULL,
  last_name varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE teams (
  id int NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE roles (
  id int NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB;

CREATE TABLE team_users (
  id int NOT NULL AUTO_INCREMENT,
  team_id int NOT NULL,
  user_id int NOT NULL,
  role_id int NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (team_id) REFERENCES teams (id),
  FOREIGN KEY (user_id) REFERENCES users (id),
  FOREIGN KEY (role_id) REFERENCES roles (id)
) ENGINE=InnoDB;

CREATE TABLE wellness (
  id int NOT NULL AUTO_INCREMENT,
  user_id int NOT NULL,
  sleep float NOT NULL,
  soreness float NOT NULL,
  fatigue float NOT NULL,
  overall float NOT NULL,
  recorded_at timestamp NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (user_id) REFERENCES users (id)
) ENGINE=InnoDB;

INSERT INTO users (first_name, last_name) VALUES 
('Allan','Bredly'),
('David','Due'),
('John','Smith'),
('Joseph','Bright'),
('Michael','Black'),
('Samual','Dio'),
('Caleb','Alty');

INSERT INTO roles (name) VALUES 
('Player'),
('Coach');

INSERT INTO teams (name) VALUES 
('First team'),
('Second team'),
('Third team');

INSERT INTO team_users (team_id,user_id,role_id) VALUES 
(1,1,1),
(1,2,1),
(1,3,1),
(1,6,2),
(2,1,1),
(2,4,1),
(2,6,2),
(3,1,1),
(3,2,1),
(3,5,1),
(3,7,2);

INSERT INTO wellness (user_id,sleep,soreness,fatigue,overall,recorded_at) VALUES 
(1,0.5,0,0,0.375,'2018-10-23 05:00:05'),
(2,0,0.5,0.8,0.325,'2018-10-22 01:00:05'),
(3,0,0,0,0,'2018-10-20 18:00:05'),
(4,0,0,0.5,0.125,'2018-10-20 11:00:05'),
(5,-1.0,0,0,-0.25,'2018-10-07 10:00:05');