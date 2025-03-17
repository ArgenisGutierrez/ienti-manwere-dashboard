CREATE TABLE usuarios (
  id_usuario INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR (255) NOT NULL UNIQUE KEY,
  role VARCHAR (255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE KEY,
  password TEXT NOT NULL,

  fyh_creacion DATETIME NULL,
  fyh_modificacion DATETIME NULL,
  estado VARCHAR (11)
)ENGINE=InnoDB;

INSERT INTO usuarios (
  usuario,role,email,password,fyh_creacion,estado
) VALUES ( 
  'ientiadmin','Administrador','admin@ienti.com.mx','ientiadmin95*','2025-03-16 15:21:55','1'
);

CREATE TABLE roles (
  id_rol INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nombre_rol VARCHAR (255) NOT NULL,

  fyh_creacion DATETIME NULL,
  fyh_modificacion DATETIME NULL,
  estado VARCHAR (11)
)ENGINE=InnoDB;


INSERT INTO roles (
  nombre_rol,fyh_creacion,estado
) VALUES ( 
'ADMINISTRADOR','2025-03-16 23:52:02','1'
);

INSERT INTO roles (
  nombre_rol,fyh_creacion,estado
) VALUES ( 
'USUARIO','2025-03-16 23:52:02','1'
);
