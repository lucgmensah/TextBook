/*==============================================================*/
/* Nom de SGBD :  Sybase SQL Anywhere 11                        */
/* Date de création :  05/05/2023 10:34:49                      */
/*==============================================================*/


if exists(select 1 from sys.sysforeignkey where role='FK_ENSEIGNA_AVOIR_GRA_GRADE') then
    alter table ENSEIGNANT
       delete foreign key FK_ENSEIGNA_AVOIR_GRA_GRADE
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_ENSEIGNA_AVOIR_SEX_SEXE') then
    alter table ENSEIGNANT
       delete foreign key FK_ENSEIGNA_AVOIR_SEX_SEXE
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_ENSEIGNA_AVOIR_SPE_SPECIALI') then
    alter table ENSEIGNANT
       delete foreign key FK_ENSEIGNA_AVOIR_SPE_SPECIALI
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_ENSEIGNE_ENSEIGNER_CLASSE') then
    alter table ENSEIGNER
       delete foreign key FK_ENSEIGNE_ENSEIGNER_CLASSE
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_ENSEIGNE_ENSEIGNER_UE') then
    alter table ENSEIGNER
       delete foreign key FK_ENSEIGNE_ENSEIGNER_UE
end if;

if exists(select 1 from sys.sysforeignkey where role='FK_ENSEIGNE_ENSEIGNER_ENSEIGNA') then
    alter table ENSEIGNER
       delete foreign key FK_ENSEIGNE_ENSEIGNER_ENSEIGNA
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='CLASSE_PK'
     and t.table_name='CLASSE'
) then
   drop index CLASSE.CLASSE_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='CLASSE'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table CLASSE
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='AVOIR_SEXE_FK'
     and t.table_name='ENSEIGNANT'
) then
   drop index ENSEIGNANT.AVOIR_SEXE_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='AVOIR_SPEC_FK'
     and t.table_name='ENSEIGNANT'
) then
   drop index ENSEIGNANT.AVOIR_SPEC_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='AVOIR_GRADE_FK'
     and t.table_name='ENSEIGNANT'
) then
   drop index ENSEIGNANT.AVOIR_GRADE_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ENSEIGNANT_PK'
     and t.table_name='ENSEIGNANT'
) then
   drop index ENSEIGNANT.ENSEIGNANT_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='ENSEIGNANT'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table ENSEIGNANT
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ENSEIGNER_FK'
     and t.table_name='ENSEIGNER'
) then
   drop index ENSEIGNER.ENSEIGNER_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ENSEIGNER3_FK'
     and t.table_name='ENSEIGNER'
) then
   drop index ENSEIGNER.ENSEIGNER3_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ENSEIGNER2_FK'
     and t.table_name='ENSEIGNER'
) then
   drop index ENSEIGNER.ENSEIGNER2_FK
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='ENSEIGNER_PK'
     and t.table_name='ENSEIGNER'
) then
   drop index ENSEIGNER.ENSEIGNER_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='ENSEIGNER'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table ENSEIGNER
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='GRADE_PK'
     and t.table_name='GRADE'
) then
   drop index GRADE.GRADE_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='GRADE'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table GRADE
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='SEXE_PK'
     and t.table_name='SEXE'
) then
   drop index SEXE.SEXE_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='SEXE'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table SEXE
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='SPECIALITE_PK'
     and t.table_name='SPECIALITE'
) then
   drop index SPECIALITE.SPECIALITE_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='SPECIALITE'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table SPECIALITE
end if;

if exists(
   select 1 from sys.sysindex i, sys.systable t
   where i.table_id=t.table_id 
     and i.index_name='UE_PK'
     and t.table_name='UE'
) then
   drop index UE.UE_PK
end if;

if exists(
   select 1 from sys.systable 
   where table_name='UE'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table UE
end if;

/*==============================================================*/
/* Table : CLASSE                                               */
/*==============================================================*/
create table CLASSE 
(
   ID_CLASSE            integer                        not null,
   LIB_CLASSE           long varchar                   null,
   constraint PK_CLASSE primary key (ID_CLASSE)
);

/*==============================================================*/
/* Index : CLASSE_PK                                            */
/*==============================================================*/
create unique index CLASSE_PK on CLASSE (
ID_CLASSE ASC
);

/*==============================================================*/
/* Table : ENSEIGNANT                                           */
/*==============================================================*/
create table ENSEIGNANT 
(
   ID_ENSEIGNANT        integer                        not null,
   ID_GRADE             integer                        not null,
   ID_SPECIALITE        integer                        not null,
   ID_SEXE              integer                        not null,
   NOM                  long varchar                   null,
   PRENOM               long varchar                   null,
   CONTACT              long varchar                   null,
   NUM_CPTE             long varchar                   null,
   constraint PK_ENSEIGNANT primary key (ID_ENSEIGNANT)
);

/*==============================================================*/
/* Index : ENSEIGNANT_PK                                        */
/*==============================================================*/
create unique index ENSEIGNANT_PK on ENSEIGNANT (
ID_ENSEIGNANT ASC
);

/*==============================================================*/
/* Index : AVOIR_GRADE_FK                                       */
/*==============================================================*/
create index AVOIR_GRADE_FK on ENSEIGNANT (
ID_GRADE ASC
);

/*==============================================================*/
/* Index : AVOIR_SPEC_FK                                        */
/*==============================================================*/
create index AVOIR_SPEC_FK on ENSEIGNANT (
ID_SPECIALITE ASC
);

/*==============================================================*/
/* Index : AVOIR_SEXE_FK                                        */
/*==============================================================*/
create index AVOIR_SEXE_FK on ENSEIGNANT (
ID_SEXE ASC
);

/*==============================================================*/
/* Table : ENSEIGNER                                            */
/*==============================================================*/
create table ENSEIGNER 
(
   ID_UE                integer                        not null,
   ID_ENSEIGNANT        integer                        not null,
   ID_CLASSE            integer                        not null,
   DATE_ENS             date                           null,
   DEBUT_ENS            time                           null,
   FIN_ENS              time                           null,
   VOL_ENS              integer                        null,
   CONTENU              long varchar                   null,
   constraint PK_ENSEIGNER primary key (ID_UE, ID_ENSEIGNANT, ID_CLASSE)
);

/*==============================================================*/
/* Index : ENSEIGNER_PK                                         */
/*==============================================================*/
create unique index ENSEIGNER_PK on ENSEIGNER (
ID_UE ASC,
ID_ENSEIGNANT ASC,
ID_CLASSE ASC
);

/*==============================================================*/
/* Index : ENSEIGNER2_FK                                        */
/*==============================================================*/
create index ENSEIGNER2_FK on ENSEIGNER (
ID_UE ASC
);

/*==============================================================*/
/* Index : ENSEIGNER3_FK                                        */
/*==============================================================*/
create index ENSEIGNER3_FK on ENSEIGNER (
ID_ENSEIGNANT ASC
);

/*==============================================================*/
/* Index : ENSEIGNER_FK                                         */
/*==============================================================*/
create index ENSEIGNER_FK on ENSEIGNER (
ID_CLASSE ASC
);

/*==============================================================*/
/* Table : GRADE                                                */
/*==============================================================*/
create table GRADE 
(
   ID_GRADE             integer                        not null,
   LIB_GRADE            long varchar                   null,
   constraint PK_GRADE primary key (ID_GRADE)
);

/*==============================================================*/
/* Index : GRADE_PK                                             */
/*==============================================================*/
create unique index GRADE_PK on GRADE (
ID_GRADE ASC
);

/*==============================================================*/
/* Table : SEXE                                                 */
/*==============================================================*/
create table SEXE 
(
   ID_SEXE              integer                        not null,
   LIB_SEXE             long varchar                   null,
   constraint PK_SEXE primary key (ID_SEXE)
);

/*==============================================================*/
/* Index : SEXE_PK                                              */
/*==============================================================*/
create unique index SEXE_PK on SEXE (
ID_SEXE ASC
);

/*==============================================================*/
/* Table : SPECIALITE                                           */
/*==============================================================*/
create table SPECIALITE 
(
   ID_SPECIALITE        integer                        not null,
   LIB_SPECIALITE       long varchar                   null,
   constraint PK_SPECIALITE primary key (ID_SPECIALITE)
);

/*==============================================================*/
/* Index : SPECIALITE_PK                                        */
/*==============================================================*/
create unique index SPECIALITE_PK on SPECIALITE (
ID_SPECIALITE ASC
);

/*==============================================================*/
/* Table : UE                                                   */
/*==============================================================*/
create table UE 
(
   ID_UE                integer                        not null,
   LIB_UE               long varchar                   null,
   VOL_HORAIRE          integer                        null,
   CREDIT               float                          null,
   constraint PK_UE primary key (ID_UE)
);

/*==============================================================*/
/* Index : UE_PK                                                */
/*==============================================================*/
create unique index UE_PK on UE (
ID_UE ASC
);

alter table ENSEIGNANT
   add constraint FK_ENSEIGNA_AVOIR_GRA_GRADE foreign key (ID_GRADE)
      references GRADE (ID_GRADE)
      on update restrict
      on delete restrict;

alter table ENSEIGNANT
   add constraint FK_ENSEIGNA_AVOIR_SEX_SEXE foreign key (ID_SEXE)
      references SEXE (ID_SEXE)
      on update restrict
      on delete restrict;

alter table ENSEIGNANT
   add constraint FK_ENSEIGNA_AVOIR_SPE_SPECIALI foreign key (ID_SPECIALITE)
      references SPECIALITE (ID_SPECIALITE)
      on update restrict
      on delete restrict;

alter table ENSEIGNER
   add constraint FK_ENSEIGNE_ENSEIGNER_CLASSE foreign key (ID_CLASSE)
      references CLASSE (ID_CLASSE)
      on update restrict
      on delete restrict;

alter table ENSEIGNER
   add constraint FK_ENSEIGNE_ENSEIGNER_UE foreign key (ID_UE)
      references UE (ID_UE)
      on update restrict
      on delete restrict;

alter table ENSEIGNER
   add constraint FK_ENSEIGNE_ENSEIGNER_ENSEIGNA foreign key (ID_ENSEIGNANT)
      references ENSEIGNANT (ID_ENSEIGNANT)
      on update restrict
      on delete restrict;

