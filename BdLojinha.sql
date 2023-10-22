-- Criação do banco de dados
CREATE DATABASE dbLojinha;

-- Utilização do banco de dados
USE dbLojinha;

-- Criação da tabela tblCategoria
CREATE TABLE IF NOT EXISTS tblCategoria (
  albumCategoria INT PRIMARY KEY AUTO_INCREMENT,
  grupoCategoria ENUM('M', 'F') NOT NULL -- Use ENUM para representar 'M' (masculino) ou 'F' (feminino)
);

-- Inserção de valores na tabela tblCategoria (EXEMPLO) COMANDO NAO EXCUTADO //
INSERT INTO tblCategoria (grupoCategoria)
VALUES
  ('M'), 
  ('F'); 

-- Criação da tabela tblAlbum
CREATE TABLE IF NOT EXISTS tblAlbum (
  codAlbum INT PRIMARY KEY AUTO_INCREMENT,
  nomeAlbum VARCHAR(100) NOT NULL,
  AlbumCategoria INT NOT NULL,
  grupoAlbum INT NOT NULL,
  valorAlbum DECIMAL(6, 2) NOT NULL,
  qtdEstoque INT NOT NULL,
  descricaoAlbum TEXT NOT NULL,
  lancamentoAlbum ENUM('S', 'N') NOT NULL,
  CONSTRAINT fk_AlbumCategoria FOREIGN KEY (AlbumCategoria) REFERENCES tblCategoria(albumCategoria),
  CONSTRAINT fk_grupoAlbum FOREIGN KEY (grupoAlbum) REFERENCES tblCategoria(albumCategoria)
);

-- Inserção de valores na tabela tblAlbum (EXEMPLO) COMANDO NAO EXCUTADO //
INSERT INTO tblAlbum (nomeAlbum, AlbumCategoria, grupoAlbum, valorAlbum, qtdEstoque, descricaoAlbum, lancamentoAlbum)
VALUES
  ('BTS', 1, 1, 29.99, 100, 'Descrição do álbum do BTS', 'S');
  
  
-- Criação de uma view para simplificar consultas
CREATE VIEW vw_Album AS
SELECT
  tblAlbum.nomeAlbum,
  tblAlbum.codAlbum,
  tblAlbum.AlbumCategoria,
  tblCategoria.grupoCategoria,
  tblAlbum.valorAlbum,
  tblAlbum.qtdEstoque,
  tblAlbum.descricaoAlbum,
  tblAlbum.lancamentoAlbum
FROM tblAlbum
INNER JOIN tblCategoria ON tblAlbum.AlbumCategoria = tblCategoria.albumCategoria;
select * from vw_Album;
drop database dbLojinha;


create table tbl_usuario(
  cod_usuario int primary key AUTO_INCREMENT,
  nome_usuario varchar(80) not null,
  ds_email varchar(80) not null,
  ds_senha varchar(6) not null,
  ds_status boolean not null,
  ds_endereco varchar(80) not null,
  ds_cidade varchar(50) not null,
  no_cep char (9) not null
) default charset utf8;

insert into tbl_usuario
values(default,"Batata Quente","batataquente@gmail.com","mussarela123","batatao",1,"Rua Torrada Queimada","12","Farofa","40028-9922");

insert into tbl_usuario
values(default,"Torta de Limao","limaozinho@gmail.com","tortinha123","limaozao",2,"Rua Torta Queimada","15","Doceria","40027-4900");

insert into tbl_usuario
values(default,"Sanduiche","sanduiche@gmail.com","paoziho123","lanchao",3,"Rua Sanduba Grandao","14","Lanches","80028-6776" );