MySQL Query:
USER:
CREATE TABLE `user` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`nama` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`username` VARCHAR(20) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`password` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`role` VARCHAR(10) NULL DEFAULT 'user' COLLATE 'utf8mb4_0900_ai_ci',
	`NIK` VARCHAR(20) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`tgl_lahir` DATE NULL DEFAULT NULL,
	`tempat_lahir` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`alamat` VARCHAR(120) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`agama` VARCHAR(25) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`jenis_kelamin` ENUM('laki-laki','perempuan') NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`nomor_telepon` VARCHAR(15) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`email` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
AUTO_INCREMENT=9
;
_____________________________________________________________
Pilihan_User:
CREATE TABLE `pilihan_user` (
	`pilihan_id` INT(10) NOT NULL AUTO_INCREMENT,
	`id_partai` INT(10) NULL DEFAULT NULL,
	`id_capres` INT(10) NULL DEFAULT NULL,
	`NIK` VARCHAR(20) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`tgl_coblos` DATE NULL DEFAULT NULL,
	PRIMARY KEY (`pilihan_id`) USING BTREE
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
AUTO_INCREMENT=5
;
_____________________________________________________________

Partai:
CREATE TABLE `partai` (
	`id_partai` INT(10) NULL DEFAULT NULL,
	`nama_partai` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci'
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;
_____________________________________________________________

Kandidat Capres:
CREATE TABLE `capres` (
	`id_capres` INT(10) NULL DEFAULT NULL,
	`nama_capres` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`visi` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`misi` VARCHAR(120) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci'
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;
_____________________________________________________________
