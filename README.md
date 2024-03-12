MySQL Query:
CREATE TABLE `tmahasiswa` (
    `NIK` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
    `nama` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
    `tempat_lahir` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
    `tgl_lahir` DATE NULL DEFAULT NULL,
    `jenis_kelamin` ENUM('laki-laki','perempuan') NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
    `agama` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
    `nomor_telepon` VARCHAR(15) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
    `alamat` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
    PRIMARY KEY (`NIK`) USING BTREE
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=InnoDB
;
