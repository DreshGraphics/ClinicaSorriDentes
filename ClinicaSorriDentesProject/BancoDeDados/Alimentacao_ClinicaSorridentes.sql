/*Acessando a base de dados*/
USE clinica_sorridentes_database;

/*Realizando a inserção de 3 valores por tabela*/
INSERT INTO PACIENTE VALUES
(NULL, 'Hugo Silva', 'Masculino', '1999-06-11', '07334565477', 'Database Administrator', 'Ortopédico', '(88) 99749-1825', 'Solteiro(a)', 'Av. Josefa Nogueira', 'Centro', 1204, 'Atendido', 'Icó', 'CE', 'Ao lado do cabannas', '63430000'),
(NULL, 'Steve Cavalcante', 'Masculino', '1989-04-21', '87987656459', 'Design', 'Dermatologia', '(89) 99567-2346', 'Casado(a)', 'Rua Constantine Alves', 'Centro', 809, 'Em espera', 'Lavras', 'CE', 'none', '63470000'),
(NULL, 'Priscila Silva', 'Feminino', '1999-02-21', '11223344556', 'Marketing Administrator', 'Fisioterapeutico', '(88) 97876-2345', 'Casado(a)', 'Av. Jose furtado', 'Centro', 456, 'Finalizado', 'Jaguaribara', 'CE', 'Avenida liceu', '63490000');

INSERT INTO PROCEDIMENTO VALUES
(NULL, 'Extração', 21, 'MEDIA IMPORTANCIA', 70, 65, current_timestamp(), 1),
(NULL, 'Flúor', 11, 'BAIXA IMPORTANCIA', 40, 30, current_timestamp(), 2),
(NULL, 'Canal', 16, 'ALTA IMPORTANCIA', 90, 87, current_timestamp(), 3);

INSERT INTO FICHA_CLINICA VALUES
(NULL, NOW(), 'FICHA ARMAZENADA TEMPORÁRIAMENTE', 1),
(NULL, NOW(), 'PACIENTE COM PRESSÃO ALTA', 2),
(NULL, NOW(), 'REALIZAR RAIO-X', 3);

INSERT INTO MEDICO VALUES
(NULL, 'Hugo Silva Nascimento', '(88) 99749-1825', 'hugosilva05512@gmail.com', '1999-06-11', 'Regional de Saúde', 'Metodologias Ativas/ consultoria', 'DBA', 'Consultoria de Databases'),
(NULL, 'Marcos Lima Silva', '(88) 99675-9876', 'marquinhos@gmail.com', '1985-03-26', 'Regional de Saúde', 'Pediátrico', 'Pediatra', 'Avaliador de enfermidades'),
(NULL, 'Francisco Antônio Nunes', '(88) 91234-2345', 'fransquin@gmail.com', '1995-07-05', 'Nacional de Saúde', 'Dermatológico', 'COnsultor', 'Consultoria de avaliações');