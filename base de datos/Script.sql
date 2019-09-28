
DROP DATABASE IF EXISTS hackathon_achs;
CREATE database hackathon_achs;
use  hackathon_achs;

CREATE TABLE alternativa
  (
    id_alternativa INT NOT NULL ,
    id_pregunta    INT NOT NULL ,
    descripcion    VARCHAR (255) NOT NULL ,
    eliminado      INT NOT NULL ,
    activo         INT NOT NULL
  ) ;
ALTER TABLE alternativa ADD CONSTRAINT alternativa_PK PRIMARY KEY ( id_alternativa ) ;


CREATE TABLE detalle_persona_inst
  (
    id_deta_pers_inst INT NOT NULL ,
    id_persona        INT NOT NULL ,
    id_institucion    INT NOT NULL
  ) ;
ALTER TABLE detalle_persona_inst ADD CONSTRAINT detalle_persona_inst_PK PRIMARY KEY ( id_deta_pers_inst ) ;


CREATE TABLE detalle_preg_orien
  (
    id_detalle_pre_o INT NOT NULL ,
    id_pregunta      INT NOT NULL ,
    id_orientacion   INT NOT NULL
  ) ;
ALTER TABLE detalle_preg_orien ADD CONSTRAINT detalle_preg_orien_PK PRIMARY KEY ( id_detalle_pre_o ) ;


CREATE TABLE institucion
  (
    id_institucion INT NOT NULL ,
    id_usuario     INT NOT NULL
  ) ;
ALTER TABLE institucion ADD CONSTRAINT institucion_PK PRIMARY KEY ( id_institucion ) ;

CREATE TABLE administrador
  (
    id_admin   INTEGER NOT NULL ,
    id_usuario INTEGER NOT NULL
  ) ;
ALTER TABLE administrador ADD CONSTRAINT admin_PK PRIMARY KEY ( id_admin ) ;


CREATE TABLE orientacion
  (
    id_orientacion INT NOT NULL ,
    descripcion    VARCHAR (255) ,
    eliminado      INT NOT NULL ,
    activo         INT NOT NULL
  ) ;
ALTER TABLE orientacion ADD CONSTRAINT orientacion_PK PRIMARY KEY ( id_orientacion ) ;


CREATE TABLE persona
  (
    id_persona INT NOT NULL ,
    id_usuario INT NOT NULL ,
    rut        VARCHAR (15) NOT NULL,
    apellidos  VARCHAR (100) NOT NULL ,
    foto       VARCHAR (100) ,
    sexo       INT NOT NULL
  ) ;
ALTER TABLE persona ADD CONSTRAINT persona_PK PRIMARY KEY ( id_persona ) ;


CREATE TABLE pregunta
  (
    id_pregunta INT NOT NULL ,
    fecha       DATETIME NOT NULL ,
    descripcion VARCHAR (255) NOT NULL ,
    isDelete    INT NOT NULL
  ) ;
ALTER TABLE pregunta ADD CONSTRAINT pregunta_PK PRIMARY KEY ( id_pregunta ) ;


CREATE TABLE respuesta
  (
    id_respuesta   INT NOT NULL ,
    fecha_creacion DATETIME NOT NULL ,
    id_persona     INT NOT NULL ,
    id_alternativa INT NOT NULL
  ) ;
ALTER TABLE respuesta ADD CONSTRAINT respuesta_PK PRIMARY KEY ( id_respuesta )
;


CREATE TABLE usuario
  (
    id_usuario   INT NOT NULL ,
    username     VARCHAR (30) NOT NULL ,
    password     VARCHAR (64) NOT NULL ,
    correo       VARCHAR (100) NOT NULL unique ,
    fecha_create DATETIME NOT NULL ,
    nombre       VARCHAR (100) NOT NULL ,
    tipo_usuario INTEGER NOT NULL ,
    activo       INT NOT NULL
  ) ;
ALTER TABLE usuario ADD CONSTRAINT usuario_PK PRIMARY KEY ( id_usuario ) ;

CREATE TABLE correo_sistema
  (
    id_correo      INT NOT NULL ,
    cuenta_usuario VARCHAR (50) NOT NULL UNIQUE,
    clave_usuario  VARCHAR (10) NOT NULL ,
    protocolo      VARCHAR (60) NOT NULL ,
    host           VARCHAR (60) NOT NULL ,
    port           INT NOT NULL
  ) ;
ALTER TABLE correo_sistema ADD CONSTRAINT correo_sistema_PK PRIMARY KEY ( id_correo ) ;


ALTER TABLE alternativa CHANGE COLUMN `id_alternativa` `id_alternativa` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE usuario CHANGE COLUMN `id_usuario` `id_usuario` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE respuesta CHANGE COLUMN `id_respuesta` `id_respuesta` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE detalle_persona_inst CHANGE COLUMN `id_deta_pers_inst` `id_deta_pers_inst` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE detalle_preg_orien CHANGE COLUMN `id_detalle_pre_o` `id_detalle_pre_o` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE orientacion CHANGE COLUMN `id_orientacion` `id_orientacion` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE persona CHANGE COLUMN `id_persona` `id_persona` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE pregunta CHANGE COLUMN `id_pregunta` `id_pregunta` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE institucion CHANGE COLUMN `id_institucion` `id_institucion` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE administrador CHANGE COLUMN `id_admin` `id_admin` INT(11) NOT NULL AUTO_INCREMENT ;

ALTER TABLE administrador ADD CONSTRAINT admin_usuario_FK FOREIGN KEY ( id_usuario ) REFERENCES usuario ( id_usuario ) ;
ALTER TABLE alternativa ADD CONSTRAINT alter_pregu_FK FOREIGN KEY ( id_pregunta) REFERENCES pregunta ( id_pregunta ) ;
ALTER TABLE detalle_persona_inst ADD CONSTRAINT deta_pers_inst_inst_FK FOREIGN KEY ( id_institucion ) REFERENCES institucion ( id_institucion ) ;
ALTER TABLE detalle_preg_orien ADD CONSTRAINT deta_preg_orien_orie_FK FOREIGN KEY ( id_orientacion ) REFERENCES orientacion ( id_orientacion ) ;
ALTER TABLE detalle_preg_orien ADD CONSTRAINT deta_preg_orien_pre_FK FOREIGN KEY ( id_pregunta ) REFERENCES pregunta ( id_pregunta ) ;
ALTER TABLE detalle_persona_inst ADD CONSTRAINT detalle_per_inst_pers_FK FOREIGN KEY ( id_persona ) REFERENCES persona ( id_persona ) ;
ALTER TABLE institucion ADD CONSTRAINT institucion_usuario_FK FOREIGN KEY ( id_usuario ) REFERENCES usuario ( id_usuario ) ;
ALTER TABLE persona ADD CONSTRAINT persona_usuario_FK FOREIGN KEY ( id_usuario ) REFERENCES usuario ( id_usuario ) ;
ALTER TABLE respuesta ADD CONSTRAINT respue_alterna_FK FOREIGN KEY ( id_alternativa ) REFERENCES alternativa ( id_alternativa ) ;
ALTER TABLE respuesta ADD CONSTRAINT respuesta_persona_FK FOREIGN KEY ( id_persona ) REFERENCES persona ( id_persona ) ;


-- 1 admin
-- 2 institucion
-- 3 persona 

INSERT INTO usuario VALUES (1,'admin','5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5','benja.mora.torres@gmail.com' , '2019-09-28', 'admin',1,1);
INSERT INTO administrador VALUES (1,1);


-- insert
INSERT INTO correo_sistema VALUES(1,'webscontactos@gmail.com','abcd13abcd','ssl','smtp.gmail.com',465);
