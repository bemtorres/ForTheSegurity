
DROP DATABASE IF EXISTS 4tp;
CREATE database 4tp;
use 4tp;


CREATE TABLE administrador
  (
    id_administrador INTEGER NOT NULL ,
    nombres          VARCHAR2 (60) NOT NULL ,
    username         VARCHAR2 (64) NOT NULL UNIQUE,
    password         VARCHAR2 (64) NOT NULL ,
    correo           VARCHAR2 (100) NOT NULL
  ) ;
ALTER TABLE administrador ADD CONSTRAINT administrador_PK PRIMARY KEY ( id_administrador ) ;


CREATE TABLE alcance
  (
    id_alcance     INTEGER NOT NULL ,
    nombre_alcance VARCHAR2 (100) NOT NULL ,
    activo         INTEGER NOT NULL
  ) ;
ALTER TABLE alcance ADD CONSTRAINT alcance_PK PRIMARY KEY ( id_alcance ) ;


CREATE TABLE correo_sistema
  (
    id_correo      INTEGER NOT NULL ,
    cuenta_usuario VARCHAR2 (50) NOT NULL UNIQUE,
    clave_usuario  VARCHAR2 (10) NOT NULL ,
    protocolo      VARCHAR2 (60) NOT NULL ,
    host           VARCHAR2 (60) NOT NULL ,
    port           INTEGER NOT NULL
  ) ;
ALTER TABLE correo_sistema ADD CONSTRAINT correo_sistema_PK PRIMARY KEY ( id_correo ) ;


CREATE TABLE detalle_alcance
  (
    id_detalle_alcance INTEGER NOT NULL ,
    id_alcance         INTEGER NOT NULL ,
    id_variable        INTEGER NOT NULL ,
    activo             INTEGER NOT NULL
  ) ;
ALTER TABLE detalle_alcance ADD CONSTRAINT detalle_alcance_PK PRIMARY KEY ( id_detalle_alcance ) ;


CREATE TABLE empresa
  (
    id_empresa     INTEGER NOT NULL ,
    nombre_empresa VARCHAR2 (100) NOT NULL ,
    username       VARCHAR2 (64) NOT NULL UNIQUE,
    password       VARCHAR2 (64) NOT NULL ,
    correo         VARCHAR2 (100) NOT NULL UNIQUE,
    activo         INTEGER NOT NULL
  ) ;
ALTER TABLE empresa ADD CONSTRAINT empresa_PK PRIMARY KEY ( id_empresa ) ;


CREATE TABLE estado_registro
  (
    id_estado_registro INTEGER NOT NULL ,
    nombre_estado_r    VARCHAR2 (60) NOT NULL
  ) ;
ALTER TABLE estado_registro ADD CONSTRAINT estado_registro_PK PRIMARY KEY ( id_estado_registro ) ;


CREATE TABLE evento
  (
    id_evento      INTEGER NOT NULL ,
    id_empresa     INTEGER NOT NULL ,
    fecha_creacion DATE NOT NULL ,
    nombre_evento  VARCHAR2 (100) NOT NULL ,
    fecha_inicio   DATE NOT NULL ,
    fecha_termino  DATE ,
    id_tipo_evento INTEGER NOT NULL ,
    code_evento    VARCHAR2 (100) NOT NULL ,
    num_veces      INTEGER NOT NULL ,
    comentario     VARCHAR2 (300) ,
    estado_evento  INTEGER NOT NULL ,
    activo         INTEGER NOT NULL
  ) ;
ALTER TABLE evento ADD CONSTRAINT evento_PK PRIMARY KEY ( id_evento ) ;


CREATE TABLE formulario_variables
  (
    id_formulario_v INTEGER NOT NULL ,
    id_evento       INTEGER NOT NULL ,
    id_alcance      INTEGER NOT NULL
  ) ;
ALTER TABLE formulario_variables ADD CONSTRAINT formulario_variables_PK PRIMARY KEY ( id_formulario_v ) ;


CREATE TABLE mes
  (
    id_mes      INTEGER NOT NULL ,
    id_evento   INTEGER NOT NULL ,
    n_mes       INTEGER NOT NULL ,
    anio_actual INTEGER NOT NULL ,
    code_mes    VARCHAR2 (100) NOT NULL ,
    activo      INTEGER NOT NULL
  ) ;
ALTER TABLE mes ADD CONSTRAINT mes_PK PRIMARY KEY ( id_mes ) ;


CREATE TABLE registro_mes
  (
    id_registro_mes    INTEGER NOT NULL ,
    id_mes             INTEGER NOT NULL ,
    code_registro_m    VARCHAR2 (100) NOT NULL ,
    id_estado_registro INTEGER NOT NULL ,
    fecha_registro     DATE ,
    activo             INTEGER NOT NULL
  ) ;
ALTER TABLE registro_mes ADD CONSTRAINT registro_mes_PK PRIMARY KEY ( id_registro_mes ) ;


CREATE TABLE registro_semana
  (
    id_registro_semana INTEGER NOT NULL ,
    id_semana          INTEGER NOT NULL ,
    code_registro_s    VARCHAR2 (100) NOT NULL ,
    id_estado_registro INTEGER NOT NULL ,
    fecha_registro     DATE ,
    activo             INTEGER NOT NULL
  ) ;
ALTER TABLE registro_semana ADD CONSTRAINT registro_semana_PK PRIMARY KEY ( id_registro_semana ) ;


CREATE TABLE reporte
  (
    id_reporte         INTEGER NOT NULL ,
    id_registro_semana INTEGER NOT NULL ,
    id_alcance         INTEGER NOT NULL ,
    valor              NUMBER (10,3) ,
    id_variable        INTEGER NOT NULL
  ) ;
ALTER TABLE reporte ADD CONSTRAINT reporte_PK PRIMARY KEY ( id_reporte ) ;


CREATE TABLE reporte_mes
  (
    id_reporte_mes  INTEGER NOT NULL ,
    id_registro_mes INTEGER NOT NULL ,
    id_alcance      INTEGER NOT NULL ,
    valor           NUMBER (10,3) ,
    id_variable     INTEGER NOT NULL
  ) ;
ALTER TABLE reporte_mes ADD CONSTRAINT reporte_mes_PK PRIMARY KEY ( id_reporte_mes ) ;


CREATE TABLE semana
  (
    id_semana     INTEGER NOT NULL ,
    id_evento     INTEGER NOT NULL ,
    n_semana      INTEGER NOT NULL ,
    anio_actual   INTEGER NOT NULL ,
    code_semana   VARCHAR2 (100) NOT NULL ,
    fecha_inicio  DATE NOT NULL ,
    fecha_termino DATE ,
    activo        INTEGER NOT NULL
  ) ;
ALTER TABLE semana ADD CONSTRAINT semana_PK PRIMARY KEY ( id_semana ) ;


CREATE TABLE tipo_evento
  (
    id_tipo_evento     INTEGER NOT NULL ,
    nombre_tipo_evento VARCHAR2 (50) NOT NULL
  ) ;
ALTER TABLE tipo_evento ADD CONSTRAINT tipo_evento_PK PRIMARY KEY ( id_tipo_evento ) ;


CREATE TABLE tipo_medida
  (
    id_tipo_medida INTEGER NOT NULL ,
    nombre_medida  VARCHAR2 (10) NOT NULL ,
    activo         INTEGER NOT NULL
  ) ;
ALTER TABLE tipo_medida ADD CONSTRAINT tipo_medida_PK PRIMARY KEY ( id_tipo_medida ) ;


CREATE TABLE valor_variable
  (
    id_variable     INTEGER NOT NULL ,
    nombre_variable VARCHAR2 (100) ,
    factor          NUMBER (10,5) NOT NULL ,
    id_tipo_medida  INTEGER NOT NULL
  ) ;
ALTER TABLE valor_variable ADD CONSTRAINT valor_variable_PK PRIMARY KEY ( id_variable ) ;

-- AUTOINCREMENT
ALTER TABLE administrador CHANGE COLUMN `id_administrador` `id_administrador` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE alcance CHANGE COLUMN `id_alcance` `id_alcance` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE detalle_alcence CHANGE COLUMN `id_detalle_alcence` `id_detalle_alcence` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE empresa CHANGE COLUMN `id_empresa` `id_empresa` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE evento CHANGE COLUMN `id_evento` `id_evento` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE formulario_variables CHANGE COLUMN `id_formulario_v` `id_formulario_v` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE mes CHANGE COLUMN `id_mes` `id_mes` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE registro_mes CHANGE COLUMN `id_registro_mes` `id_registro_mes` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE registro_semana CHANGE COLUMN `id_registro_semana` `id_registro_semana` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE reporte CHANGE COLUMN `id_reporte` `id_reporte` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE reporte_mes CHANGE COLUMN `id_reporte_mes` `id_reporte_mes` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE semana CHANGE COLUMN `id_semana` `id_semana` INT(11) NOT NULL AUTO_INCREMENT ;
ALTER TABLE valor_variable CHANGE COLUMN `id_variable` `id_variable` INT(11) NOT NULL AUTO_INCREMENT ;


-- FK
ALTER TABLE detalle_alcance ADD CONSTRAINT deta_alca_alca_FK FOREIGN KEY ( id_alcance ) REFERENCES alcance ( id_alcance ) ;
ALTER TABLE detalle_alcance ADD CONSTRAINT deta_alcance_valor_var_FK FOREIGN KEY ( id_variable ) REFERENCES valor_variable ( id_variable ) ;
ALTER TABLE evento ADD CONSTRAINT even_tipo_even_FK FOREIGN KEY ( id_tipo_evento ) REFERENCES tipo_evento ( id_tipo_evento ) ;
ALTER TABLE evento ADD CONSTRAINT evento_empresa_FK FOREIGN KEY ( id_empresa ) REFERENCES empresa ( id_empresa ) ;
ALTER TABLE formulario_variables ADD CONSTRAINT form_varia_alcan_FK FOREIGN KEY ( id_alcance ) REFERENCES alcance ( id_alcance ) ;
ALTER TABLE formulario_variables ADD CONSTRAINT forml_vari_even_FK FOREIGN KEY ( id_evento ) REFERENCES evento ( id_evento ) ;
ALTER TABLE mes ADD CONSTRAINT mes_even_FK FOREIGN KEY ( id_evento ) REFERENCES evento ( id_evento ) ;
ALTER TABLE reporte_mes ADD CONSTRAINT re_mes_valor_varia_FK FOREIGN KEY ( id_variable ) REFERENCES valor_variable ( id_variable ) ;
ALTER TABLE registro_mes ADD CONSTRAINT regi_mes_esta_regi_FK FOREIGN KEY ( id_estado_registro ) REFERENCES estado_registro ( id_estado_registro ) ;
ALTER TABLE registro_semana ADD CONSTRAINT regi_sema_esta_regi_FK FOREIGN KEY ( id_estado_registro ) REFERENCES estado_registro ( id_estado_registro ) ;
ALTER TABLE registro_semana ADD CONSTRAINT regi_sema_sema_FK FOREIGN KEY ( id_semana ) REFERENCES semana ( id_semana ) ;
ALTER TABLE registro_mes ADD CONSTRAINT registro_mes_mes_FK FOREIGN KEY ( id_mes ) REFERENCES mes ( id_mes ) ;
ALTER TABLE reporte_mes ADD CONSTRAINT rep_mes_regis_mes_FK FOREIGN KEY ( id_registro_mes ) REFERENCES registro_mes ( id_registro_mes ) ;
ALTER TABLE reporte ADD CONSTRAINT repo_regis_sem_FK FOREIGN KEY ( id_registro_semana ) REFERENCES registro_semana ( id_registro_semana ) ;
ALTER TABLE reporte ADD CONSTRAINT reporte_valor_vari_FK FOREIGN KEY ( id_variable ) REFERENCES valor_variable ( id_variable ) ;
ALTER TABLE semana ADD CONSTRAINT semana_evento_FK FOREIGN KEY ( id_evento ) REFERENCES evento ( id_evento ) ;
ALTER TABLE valor_variable ADD CONSTRAINT val_varia_tipo_med_FK FOREIGN KEY ( id_tipo_medida ) REFERENCES tipo_medida ( id_tipo_medida ) ;
