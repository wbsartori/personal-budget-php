CREATE TABLE PERSON
(
    id        INTEGER PRIMARY KEY AUTOINCREMENT,
    name      TEXT,
    birthDate TEXT,
    gender    TEXT,
    email     TEXT,
    status    TEXT,
    createdAt TEXT,
    updatedAt TEXT
);

CREATE TABLE INCOME
(
    id          INTEGER PRIMARY KEY AUTOINCREMENT,
    idPerson    INTEGER,
    description TEXT,
    incomeDate  TEXT,
    value       DECIMAL(10, 2),
    PERSON      REAL CHECK (INCOME.idPerson > 0),
    createdAt   TEXT,
    updatedAt   TEXT
);

CREATE TABLE MOVEMENT
(
    id             INTEGER PRIMARY KEY AUTOINCREMENT,
    idPerson       INTEGER,
    description    TEXT,
    classification TEXT,
    typeOfCost     TEXT,
    movementDate   TEXT,
    value          NUMERIC,
    status         TEXT,
    PERSON         REAL CHECK (MOVEMENT.idPerson > 0),
    createdAt      TEXT,
    updatedAt      TEXT
);
