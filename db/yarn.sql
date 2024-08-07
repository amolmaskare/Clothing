create table agents
(
    id       int auto_increment
        primary key,
    name     varchar(50)                        not null,
    created  datetime default CURRENT_TIMESTAMP not null,
    modified datetime                           null
);

create table deniers
(
    id       int auto_increment
        primary key,
    den      int                                not null,
    created  datetime default CURRENT_TIMESTAMP not null,
    modified datetime                           null
);

create table designs
(
    id       int auto_increment
        primary key,
    name     varchar(150)                       not null,
    created  datetime default CURRENT_TIMESTAMP not null,
    modified datetime                           null
);

create table dispatch_stock_sales
(
    id             int auto_increment
        primary key,
    date           date                               not null,
    length_id      int                                not null,
    design_id      int                                not null,
    total_no_rolls int                                not null,
    created        datetime default CURRENT_TIMESTAMP not null,
    modified       datetime                           null
);

create table dispatch_to_own_factories
(
    id           int auto_increment
        primary key,
    date         date                               not null,
    pick_id      int                                not null,
    factory_name varchar(100)                       not null,
    quantity     int                                not null,
    created      datetime default CURRENT_TIMESTAMP not null,
    modified     datetime                           null
);

create table foldings
(
    id            int auto_increment
        primary key,
    date          date                               not null,
    length_id     int                                not null,
    design_id     int                                not null,
    mtrperroll_id int                                not null,
    total_rolls   int                                not null,
    created       datetime default CURRENT_TIMESTAMP not null,
    modified      datetime                           null
);

create table lengths
(
    id       int auto_increment
        primary key,
    L        varchar(100)                       not null,
    created  datetime default CURRENT_TIMESTAMP not null,
    modified datetime                           null
);

create table mtrperrolls
(
    id       int auto_increment
        primary key,
    number   int                                not null,
    created  datetime default CURRENT_TIMESTAMP not null,
    modified datetime                           null
);

create table picks
(
    id        int auto_increment
        primary key,
    name      varchar(100)                       not null,
    denier_id int                                not null,
    created   datetime default CURRENT_TIMESTAMP not null,
    modified  datetime                           null
);

create table printed_stock_entries
(
    id       int auto_increment
        primary key,
    date     date                               not null,
    pick_id  int                                not null,
    quantity int                                not null,
    created  datetime default CURRENT_TIMESTAMP not null,
    modified datetime                           null
);

create table users
(
    id         int auto_increment
        primary key,
    username   varchar(50)                        not null,
    password   varchar(255)                       not null,
    email      varchar(50)                        not null,
    first_name varchar(50)                        not null,
    last_name  varchar(50)                        not null,
    created    datetime default CURRENT_TIMESTAMP not null,
    modified   date                               null
)
    collate = utf8mb3_unicode_ci;

create table waterjets
(
    id       int auto_increment
        primary key,
    date     date                               not null,
    pick_id  int                                not null,
    quantity int                                not null,
    created  datetime default CURRENT_TIMESTAMP not null,
    modified datetime                           null
);

create table yarn_stocks
(
    id        int auto_increment
        primary key,
    denier_id int                                not null,
    agent_id  int                                not null,
    date      date                               not null,
    boxes     int                                not null,
    kg        decimal(10, 2)                     not null,
    created   datetime default CURRENT_TIMESTAMP not null,
    modified  datetime                           null
);

