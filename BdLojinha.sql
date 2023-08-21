create database dbLojinha
default character set utf8
default collate utf8_general_ci;

use dbLojinha;

create table tblCategoria(
albumCategoria int primary key auto_increment,
grupoCategoria varchar (50) not null  /* grupos de kpop são dividos em feminino ou masculino,
então me baseei nisso pro char(2)*/
)
default charset utf8;

insert into tblCategoria -- inserindo mais coisas na tabela categoria
values(default,'Membros'),
(default,'Discografia');

insert into tblAlbum -- inserindo mais coisas na tabela dos albuns
values(default,'BTS'), -- codigo 1, tendo 4 albuns no site
(default,'TXT'), -- codigo 2 , tendo 5 albuns no site
(default,'SKZ'), -- codigo 3, tendo 3 albuns no site
(default,'NewJeans'), -- codigo 4 , 1 album
(default,'XG'), -- codigo 5 , 1 album
(default,'Aespa'); -- codigo 6 , 1 album

-- como defaults futuramente serão inseridas breves descrições sobre os grupos

select * from tblAlbum;
/*inserindo esse select imaginemos que seriam mostrados todos os grupos armazenados
nesse banco de dados a partir desse código*/

create table tblAlbum(
nomeAlbum varchar (100) primary key auto_incriment,
codAlbum int not null,
AlbumCategoria int not null,
grupoCategoria varchar(50) not null,
valorAlbum decimal (6,2) not null,
qtdEstoque int not null,
descricaoAlbum text not null,
lancamentoAlbum enum ('S','N') not null,

constraint fk_AlbumCategoria foreign key(AlbumCategoria) references tblCategoria(AlbumCategoria),
constraint fk_grupoAlbum foreign key(grupoCategoria) references tblCategoria(grupoCategoria)
);
-- selects do video 13
select * from tblCategoria; -- executaria a tabela categoria

select -- da tabela tbAlbum
   tblAlbum.nomeAlbum,
   tblAlbum.codAlbum,
   tbAlbum.AlbumCategoria,
   tbAlbum.grupoAlbum,
   tbAlbum.valorAlbum,
   tbAlbum.qtdEstoque,
   tbAlbum.descricaoAlbum,
   tbAlbum.lancamentoAlbum
from tblAlbum inner join nomeAlbum 
  on tblAlbum.nomeAlbum = tblAlbum.nomeAlbum
inner join tblCategoria
  on tblAlbum.albumCategoria  = tblCategoria.albumCategoria;

  -- criação da view que executa tudo acima em vez de escrever isso tudo
 select * from vw_Album;      

-- criação de usuário 
create user 'lojinha'@'localhost' identified with mysql_native_password by '123456';
grant all privilegs on dbLojinha.* to 'lojinha'@'localhost' with grant option;
