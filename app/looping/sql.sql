CREATE TABLE user_(
   id_user INT AUTO_INCREMENT,
   conection_id VARCHAR(50) NOT NULL,
   password VARCHAR(100) NOT NULL,
   email VARCHAR(50),
   admin BOOLEAN NOT NULL,
   PRIMARY KEY(id_user),
   UNIQUE(conection_id)
);

CREATE TABLE success(
   id_success INT AUTO_INCREMENT,
   name VARCHAR(50) NOT NULL,
   PRIMARY KEY(id_success),
   UNIQUE(name)
);

CREATE TABLE story(
   id_story INT AUTO_INCREMENT,
   name VARCHAR(50) NOT NULL,
   confirmed BOOLEAN NOT NULL,
   id_user INT,
   PRIMARY KEY(id_story),
   UNIQUE(name),
   FOREIGN KEY(id_user) REFERENCES user_(id_user)
);

CREATE TABLE body_text(
   id_body_text INT AUTO_INCREMENT,
   text VARCHAR(500),
   image VARBINARY(50),
   id_body_text_is_modifying INT,
   id_success INT,
   id_story INT NOT NULL,
   PRIMARY KEY(id_body_text),
   UNIQUE(id_body_text_is_modifying),
   FOREIGN KEY(id_body_text_is_modifying) REFERENCES body_text(id_body_text),
   FOREIGN KEY(id_success) REFERENCES success(id_success),
   FOREIGN KEY(id_story) REFERENCES story(id_story)
);

CREATE TABLE choice(
   id_choice INT AUTO_INCREMENT,
   text VARCHAR(50),
   id_choice_is_modifying INT,
   id_body_text_leads_to INT NOT NULL,
   PRIMARY KEY(id_choice),
   UNIQUE(id_choice_is_modifying),
   FOREIGN KEY(id_choice_is_modifying) REFERENCES choice(id_choice),
   FOREIGN KEY(id_body_text_leads_to) REFERENCES body_text(id_body_text)
);

CREATE TABLE detain(
   id_user INT,
   id_success INT,
   PRIMARY KEY(id_user, id_success),
   FOREIGN KEY(id_user) REFERENCES user_(id_user),
   FOREIGN KEY(id_success) REFERENCES success(id_success)
);

CREATE TABLE play(
   id_body_text INT,
   id_user INT,
   PRIMARY KEY(id_body_text, id_user),
   FOREIGN KEY(id_body_text) REFERENCES body_text(id_body_text),
   FOREIGN KEY(id_user) REFERENCES user_(id_user)
);

CREATE TABLE possess(
   id_body_text_comes_from INT,
   id_choice INT,
   PRIMARY KEY(id_body_text_comes_from, id_choice),
   FOREIGN KEY(id_body_text_comes_from) REFERENCES body_text(id_body_text),
   FOREIGN KEY(id_choice) REFERENCES choice(id_choice)
);
