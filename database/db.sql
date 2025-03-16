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

