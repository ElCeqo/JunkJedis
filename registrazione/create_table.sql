create table utente (
    email varchar(40),
    nome varchar(40),
    cognome varchar(40),
    comune varchar(40),
    via varchar(40),
    paswd varchar(32) not null,
    primary key (email)
);