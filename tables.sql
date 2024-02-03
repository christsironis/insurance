
CREATE TABLE users (
    id INT AUTO_INCREMENT,
    username VARCHAR(255) not NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,  
    created DATETIME,
    modified DATETIME,
    PRIMARY KEY (id),
    UNIQUE KEY (username),
    UNIQUE KEY (email)
);

CREATE TABLE clients (
    id INT AUTO_INCREMENT,
    firstname VARCHAR(255) NULL,
    lastname VARCHAR(255) NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NULL,
    afm VARCHAR(255) NULL,  
    created DATETIME,
    modified DATETIME,
    PRIMARY KEY (id)
);

CREATE TABLE notifications(
    id INT AUTO_INCREMENT,
    client_id int not null,
    slug VARCHAR(255) NULL,
    sms int not null default 0,
    email int not null default 0,
    file VARCHAR(255) NOT NULL,
    completed int not null default 0,
    exp_date DATE,
    created DATETIME,
    FOREIGN KEY (client_id) REFERENCES clients(id),
    PRIMARY KEY (id)
);

CREATE TABLE contracts(
    id INT AUTO_INCREMENT,
    client_id int not null,
    slug VARCHAR(255) NULL,
    file VARCHAR(255) NOT NULL,
    exp_date DATE,
    created DATETIME,
    PRIMARY KEY (id)
);

CREATE TABLE crons (
    id INT AUTO_INCREMENT,
    notification_id int not null,
    execute_date DATETIME not null,
    completed int not null default 0,
    created DATETIME DEFAULT NOW(),
    PRIMARY KEY (id)
);

CREATE TABLE settings(
    id INT AUTO_INCREMENT,
    code VARCHAR(255) NULL,
    name VARCHAR(255) NOT NULL,
    value VARCHAR(1000) NOT NULL,
    created DATETIME,
    PRIMARY KEY (id),
    UNIQUE(code)
);



INSERT INTO `clients` (`id`, `firstname`, `lastname`, `email`, `phone`, `afm`, `created`, `modified`) VALUES
(1, 'teset', 'ζχψζχψ', 'test@gmail.com', '214743383647', '234', '2024-02-02 20:29:34', '2024-02-02 20:29:34');

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created`, `modified`) VALUES
(2, 'test', 'test@gmail.com', '$2y$10$TKXtqBfKUZ8EJSy4lfWgS.S.Rasbm8VVJmRaLBLVd9.pe7XEQsgnW', '2024-02-02 19:58:05', '2024-02-02 19:58:05');