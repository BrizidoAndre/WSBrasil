create table Amenity
(
    id   int auto_increment
        primary key,
    name varchar(255) not null
);

create table Contacts
(
    id      int auto_increment
        primary key,
    name    varchar(255) not null,
    email   varchar(255) not null,
    message text         not null
);

create table RealtyType
(
    id   int auto_increment
        primary key,
    name varchar(255) not null
);

create table State
(
    id      int auto_increment
        primary key,
    name    varchar(255) not null,
    acronym varchar(2)   not null
);

create table City
(
    id       int auto_increment comment ' '
        primary key,
    name     varchar(255) not null,
    state_id int          not null,
    constraint City_State_id_fk
        foreign key (state_id) references State (id)
            on update cascade on delete cascade
);

create table Neighborhood
(
    id       int auto_increment
        primary key,
    name     varchar(255) not null,
    state_id int          not null,
    city_id  int          not null,
    constraint Neighborhood_City_id_fk
        foreign key (city_id) references City (id)
            on update cascade on delete cascade,
    constraint Neighborhood_State_id_fk
        foreign key (state_id) references State (id)
            on update cascade on delete cascade
);

create table Realty
(
    id              int auto_increment
        primary key,
    address         varchar(255) not null,
    offer_type      tinyint(1)   not null,
    rooms_qt        int          not null,
    toilet_qt       int          not null,
    suite_qt        int          not null,
    parkingspace_qt int          not null,
    value           float        not null,
    comments        text         not null,
    image_path      varchar(552) not null,
    size            float        not null,
    stateId         int          not null,
    cityId          int          not null,
    neighborhoodId  int          not null,
    realtyTypeId    int          not null,
    constraint Realty_City_id_fk
        foreign key (cityId) references City (id)
            on update cascade on delete cascade,
    constraint Realty_Neighborhood_id_fk
        foreign key (neighborhoodId) references Neighborhood (id)
            on update cascade on delete cascade,
    constraint Realty_RealtyType_id_fk
        foreign key (realtyTypeId) references RealtyType (id)
            on update cascade on delete cascade,
    constraint Realty_State_id_fk
        foreign key (stateId) references State (id)
            on update cascade on delete cascade
);

create table Accesses
(
    id       int auto_increment
        primary key,
    realtyId int           not null,
    number   int default 0 null,
    constraint Accesses_Realty_id_fk
        foreign key (realtyId) references Realty (id)
            on update cascade
);

create table Images
(
    id          int auto_increment
        primary key,
    filepath    varchar(522) not null,
    upload_date date         not null,
    isThumbnail tinyint(1)   not null,
    realtyId    int          not null,
    constraint Images_Realty_id_fk
        foreign key (realtyId) references Realty (id)
            on update cascade on delete cascade
);

create table Users
(
    id                int auto_increment
        primary key,
    username          varchar(255) not null,
    password          varchar(552) not null,
    registration_date datetime     not null,
    last_login_date   datetime     null
);

create table amenity_realty
(
    id         int auto_increment
        primary key,
    realty_id  int not null,
    amenity_id int not null,
    constraint amenity_realty_Amenity_id_fk
        foreign key (amenity_id) references Amenity (id)
            on update cascade on delete cascade,
    constraint amenity_realty_Realty_id_fk
        foreign key (realty_id) references Realty (id)
            on update cascade on delete cascade
);

