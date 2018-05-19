CREATE DATABASE clinica_sorridentes_database;

USE clinica_sorridentes_database;

CREATE TABLE USUARIO(
	IDUSUARIO INT PRIMARY KEY AUTO_INCREMENT,
	NOME VARCHAR(50) NOT NULL,
	LOGIN VARCHAR(50) NOT NULL UNIQUE,
	SENHA VARCHAR(32) NOT NULL,
	TIPOUSUARIO VARCHAR(13) NOT NULL
);

INSERT INTO USUARIO(NOME, LOGIN, SENHA, TIPOUSUARIO) VALUES ("Admin","admin","21232f297a57a5a743894a0e4a801fc3","Administrador");

CREATE TABLE PACIENTE(
    IDPACIENTE INT PRIMARY KEY AUTO_INCREMENT,
    NOME VARCHAR(255) NOT NULL,
    SEXO VARCHAR(9) NOT NULL,
    DATANASC DATETIME NOT NULL,
    CPF VARCHAR(11) NOT NULL,
    PROFISSAO VARCHAR(255) NOT NULL,
    TIPOATENDIMENTO VARCHAR(255) NOT NULL,
    SITUACAO VARCHAR(50) NOT NULL DEFAULT "ESPERA",
    CELULAR VARCHAR(11) NOT NULL,
    ESTADOCIVIL VARCHAR(11) NOT NULL,
    ENDERECO VARCHAR(255) NOT NULL,
    BAIRRO VARCHAR(255) NOT NULL,
    NUMERO INT(2) NOT NULL,
    CIDADE VARCHAR(32) NOT NULL,
    ESTADO CHAR(2) NOT NULL,
    COMPLEMENTO VARCHAR(255) NULL,
    CEP VARCHAR(8) NOT NULL
);

CREATE TABLE FICHA_CLINICA(
	IDFICHACLINICA INT PRIMARY KEY AUTO_INCREMENT,
	DATA_FICHA DATETIME,
	OBSERVACOES VARCHAR(255),
	ID_PACIENTE INT
);

ALTER TABLE FICHA_CLINICA ADD CONSTRAINT FK_FICHACLINICA_PACIENTE
FOREIGN KEY FICHA_CLINICA(ID_PACIENTE) REFERENCES PACIENTE(IDPACIENTE);

/*Nome foi alterado, necessita modificar as outras chamadas e referências*/
CREATE TABLE PROCEDIMENTO_DENTES(
	IDDENTE INT PRIMARY KEY AUTO_INCREMENT,
	NUMERO_DENTE SMALLINT(2),
	PROCEDIMENTO VARCHAR(255),
	IMPORTANCIA ENUM("BAIXO", "MEDIO", "ALTO"),
	VALOR DECIMAL(10,2),
	ID_FICHACLINICA INT
);

ALTER TABLE PROCEDIMENTO_DENTES ADD CONSTRAINT FK_DENTES_FICHACLINICA
FOREIGN KEY PROCEDIMENTO_DENTES(ID_FICHACLINICA) REFERENCES FICHA_CLINICA(IDFICHACLINICA);

CREATE TABLE MEDICO(
	IDMEDICO INT(11) PRIMARY KEY AUTO_INCREMENT,
	NOME VARCHAR(255) NOT NULL,
	TELEFONE VARCHAR(15) NOT NULL,
	EMAIL VARCHAR(255) NOT NULL UNIQUE,
	DTANASCIMENTO DATE NOT NULL,
	CONSELHO VARCHAR(255) NOT NULL,
	ESPECIALIDADE VARCHAR(255) NOT NULL,
	FUNCAO VARCHAR(255) NOT NULL,
	TIPODEATENDIMENTO VARCHAR(255) NOT NULL
);

/*-----------------------------------------------------------------------------*/
/* /- TESTE -\ */
/*-----------------------------------------------------------------------------*/

INSERT INTO PACIENTE VALUES(NULL, "HUGO SILVA", "M", "1999-06-11", "07229116776", "DBA", "ORTO", "ESPERA", "997491825", "SOLTEIRO", "RUA 12", "CENTRO", "12", "ICÓ", "CE", "AO LADO DO CABANNAS GRILL", "63430000");

INSERT INTO FICHA_CLINICA VALUES
(NULL, '2018-05-17', 'observando', 1);

INSERT INTO PROCEDIMENTO_DENTES VALUES
(NULL,2 , "PIVOT", "BAIXO", 5, 1);

INSERT INTO PROCEDIMENTO_DENTES VALUES
(NULL,2 , "PIVOT", "BAIXO", 5, 1);

INSERT INTO PROCEDIMENTO_DENTES VALUES
(NULL,3 , "PIVOT", "MEDIO", 5, 1);

INSERT INTO PROCEDIMENTO_DENTES VALUES
(NULL,4 , "EXTRAÇÃO", "MEDIO", 5, 1);

/*-----------------------------------------------------------------------------*/
/* /- QUERYS -\ */
/*-----------------------------------------------------------------------------*/

/* CONSULTA POR NOME E DATA*/

SELECT
P.NOME AS "NOME_PACIENTE",
D.NUMERO_DENTE,
D.PROCEDIMENTO,
COUNT(D.NUMERO_DENTE) AS "QUANTIDADE",
SUM(D.VALOR) AS "VALOR"
FROM PROCEDIMENTO_DENTES AS D
INNER JOIN FICHA_CLINICA AS F
ON D.ID_FICHACLINICA = F.IDFICHACLINICA
INNER JOIN PACIENTE P
ON F.ID_PACIENTE = P.IDPACIENTE
WHERE F.DATA_FICHA = '2018-05-17'
AND P.NOME = "HUGO SILVA"
GROUP BY D.IDDENTE;

/*
EX:
+---------------+--------------+--------------+------------+-------+
| NOME_PACIENTE | NUMERO_DENTE | PROCEDIMENTO | QUANTIDADE | VALOR |
+---------------+--------------+--------------+------------+-------+
| HUGO SILVA    |            2 | PIVOT        |          1 |  5.00 |
| HUGO SILVA    |            2 | PIVOT        |          1 |  5.00 |
| HUGO SILVA    |            3 | PIVOT        |          1 |  5.00 |
| HUGO SILVA    |            4 | EXTRAÇÃO     |          1 |  5.00 |
+---------------+--------------+--------------+------------+-------+
*/

/*CONSULTANDO PROCEDIMENTO, QUANTIDADE E PRECO POR DATA*/

SELECT
D.PROCEDIMENTO,
COUNT(D.PROCEDIMENTO) AS QUANTIDADE,
SUM(D.VALOR) AS PRECO
FROM PROCEDIMENTO_DENTES AS D INNER JOIN FICHA_CLINICA AS F
ON D.ID_FICHACLINICA = F.IDFICHACLINICA
WHERE F.DATA_FICHA = '2018-05-17'
GROUP BY D.PROCEDIMENTO;

/*
EX:
+--------------+------------+-------+
| PROCEDIMENTO | QUANTIDADE | PRECO |
+--------------+------------+-------+
| EXTRAÇÃO     |          1 |  5.00 |
| PIVOT        |          3 | 15.00 |
+--------------+------------+-------+
*/

/*RECEITA DO DIA COM DATA*/

SELECT
SUM(D.VALOR) AS TOTAL_DIA,
F.DATA_FICHA AS DATA
FROM PROCEDIMENTO_DENTES AS D
INNER JOIN FICHA_CLINICA AS F
ON D.ID_FICHACLINICA = F.IDFICHACLINICA
WHERE F.DATA_FICHA = '2018-05-17';

/*
EX:
+-----------+---------------------+
| TOTAL_DIA | DATA                |
+-----------+---------------------+
|     20.00 | 2018-05-17 00:00:00 |
+-----------+---------------------+
*/