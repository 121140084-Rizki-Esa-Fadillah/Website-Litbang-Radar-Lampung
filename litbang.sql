CREATE TABLE survey (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    title varchar(100) NOT NULL,
    wilayah varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE gender (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_survey INT NOT NULL,
    id_wilayah varchar(100) NOT NULL,
    laki_laki varchar(100) NOT NULL,
    perempuan varchar(100) NOT NULL,
    total_responden INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE usia (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_survey INT NOT NULL,
    id_wilayah varchar(100) NOT NULL,
    18_35 INT NOT NULL,
    65_up INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE lulusan (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_survey INT NOT NULL,
    id_wilayah varchar(100) NOT NULL,
    sd varchar(100) NOT NULL,
    smp varchar(100) NOT NULL,
    sma varchar(100) NOT NULL,
    diploma varchar(100) NOT NULL,
    s1_s2_s3 varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE profesi (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_survey INT NOT NULL,
    id_wilayah varchar(100) NOT NULL,
    pns varchar(100) NOT NULL,
    swasta_wiraswasta varchar(100) NOT NULL,
    pelajar_mahasiswa varchar(100) NOT NULL,
    pengangguran varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE respon (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    id_survey INT NOT NULL,
    id_wilayah varchar(100) NOT NULL,
    sangat_puas varchar(100) NOT NULL,
    puas varchar(100) NOT NULL,
    kurang_puas varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;