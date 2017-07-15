create table translog (
        id bigint unsigned auto_increment,
        user tinytext not null,
        timestamp timestamp not null,
        category tinytext not null,
        log_simple tinytext not null,
        log_detailed mediumtext null,
        primary key (id)
        );