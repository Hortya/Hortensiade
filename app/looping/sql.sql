CREATE TABLE user_(
   id_user INT AUTO_INCREMENT,
   conection_id VARCHAR(50) NOT NULL,
   password VARCHAR(100) NOT NULL,
   email VARCHAR(50),
   admin BOOLEAN DEFAULT false,
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
   name VARCHAR(150) NOT NULL,
   confirmed BOOLEAN DEFAULT false,
   id_user INT,
   PRIMARY KEY(id_story),
   UNIQUE(name),
   FOREIGN KEY(id_user) REFERENCES user_(id_user)
);

CREATE TABLE body_text(
   id_body_text INT AUTO_INCREMENT,
   text VARCHAR(1500),
   image BLOB,
   id_body_text_modify_by INT,
   id_success INT,
   id_story INT NOT NULL,
   PRIMARY KEY(id_body_text),
   UNIQUE(id_body_text_modify_by),
   FOREIGN KEY(id_body_text_modify_by) REFERENCES body_text(id_body_text),
   FOREIGN KEY(id_success) REFERENCES success(id_success),
   FOREIGN KEY(id_story) REFERENCES story(id_story)
);

CREATE TABLE choice(
   id_choice INT AUTO_INCREMENT,
   text VARCHAR(150),
   id_choice_modify_by INT,
   id_body_text_vient_de INT NOT NULL,
   id_body_text_mene_a INT NOT NULL,
   PRIMARY KEY(id_choice),
   UNIQUE(id_choice_modify_by),
   FOREIGN KEY(id_choice_modify_by) REFERENCES choice(id_choice),
   FOREIGN KEY(id_body_text_vient_de) REFERENCES body_text(id_body_text),
   FOREIGN KEY(id_body_text_mene_a) REFERENCES body_text(id_body_text)
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
