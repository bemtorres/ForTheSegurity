
DROP DATABASE IF EXISTS 4tp;
CREATE database 4tp;
use 4tp;

CREATE TABLE tipo_usuario (
	id_tipo_usuario	INT(11)	PRIMARY KEY AUTO_INCREMENT,
	nombre			VARCHAR(100) NOT NULL
);

CREATE TABLE usuario (
	id_usuario		INT(11) PRIMARY KEY AUTO_INCREMENT,
	usuario			VARCHAR2(100) NOT NULL,
	password		VARCHAR2(64) NOT NULL,
	id_tipo_usuario	INT(11) NOT NULL,
	CONSTRAINT usua_tipo_fk	FOREIGN KEY (id_tipo_usuario)
		REFERENCES tipo_usuario (id_tipo_usuario)
);

CREATE TABLE persona (
	id_persona 		INT(11) PRIMARY KEY AUTO_INCREMENT,
	nombre			VARCHAR2(100) NOT NULL,
	ap_paterno		VARCHAR2(100) NOT NULL,
	ap_materno		VARCHAR2(100) NOT NULL,
	correo			VARCHAR2(200) NOT NULL,
	id_usuario		INT(11)	NOT NULL,
	CONSTRAINT pers_usua_fk FOREIGN KEY (id_usuario)
		REFERENCES usuario (id_usuario)
);

CREATE TABLE institucion (
	id_institucion	INT(11) PRIMARY KEY AUTO_INCREMENT,
	nombre			VARCHAR2(100) NOT NULL,
	id_usuario		INT(11)	NOT NULL,
	CONSTRAINT inst_usua_fk FOREIGN KEY (id_usuario)
		REFERENCES usuario (id_usuario)
);

CREATE TABLE deta_pers_inst (
	id_deta_pers_inst INT(11) PRIMARY KEY AUTO_INCREMENT,
	id_persona 		INT(11)	NOT NULL,
	id_institucion	INT(11)	NOT NULL,
	CONSTRAINT deta_pers_fk	FOREIGN KEY (id_persona)
		REFERENCES persona (id_persona),
	CONSTRAINT deta_inst_fk	FOREIGN KEY (id_institucion)
		REFERENCES institucion (id_institucion)
);

CREATE TABLE pregunta (
	id_pregunta 	INT(11) PRIMARY KEY AUTO_INCREMENT,
	descripcion		VARCHAR(250) NOT NULL
);

--las preguntas tienen una orientación: prevención o salud (por el momento)
CREATE TABLE orientacion (
	id_orientacion	INT(11)	PRIMARY KEY AUTO_INCREMENT,
	descripcion		VARCHAR2(250)
);

--detalle entre pregunta y orientación
CREATE TABLE deta_preg_orie (
	id_deta_preg_orie	INT(11) PRIMARY KEY AUTO_INCREMENT,
	id_pregunta 	INT(11) NOT NULL,
	id_orientacion  INT(11)	NOT NULL,
	CONSTRAINT deta_preg_fk FOREIGN KEY (id_pregunta)
		REFERENCES pregunta (id_pregunta),
	CONSTRAINT deta_orie_fk FOREIGN KEY (id_orientacion)
		REFERENCES orientacion (id_orientacion)
);

--alternativas de respuesta para las preguntas
CREATE TABLE alternativa (
	id_alternativa 	INT(11) PRIMARY KEY AUTO_INCREMENT,
	descripcion 	VARCHAR2(250) NOT NULL,
);

--Pregunta Alternativa : PA
CREATE TABLE deta_preg_alte (
	id_deta_pa INT(11) PRIMARY KEY AUTO_INCREMENT,
	id_pregunta 	INT(11) NOT NULL,
	id_alternativa 	INT(11)	NOT NULL,
	CONSTRAINT detaPA_preg_fk FOREIGN KEY (id_pregunta)
		REFERENCES pregunta (id_pregunta),
	CONSTRAINT detaPA_alte_fk FOREIGN KEY (id_alternativa)
		REFERENCES alternativa (id_alternativa)
);

CREATE TABLE respuesta (
	id_respuesta	INT(11) PRIMARY KEY AUTO_INCREMENT,
	id_usuario		INT(11) NOT NULL,
	id_deta_pa		INT(11) NOT NULL,
	CONSTRAINT resp_usua_fk FOREIGN KEY (id_usuario),
		REFERENCES usuario (id_usuario),
	CONSTRAINT resp_PA_fk	FOREIGN KEY (id_deta_pa)
		REFERENCES deta_preg_alte (id_deta_pa)
);