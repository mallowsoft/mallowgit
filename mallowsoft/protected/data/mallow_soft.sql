-- Table: agent

-- DROP TABLE agent;

CREATE TABLE agent
(
  agent_code integer NOT NULL,
  agent_name text,
  address text,
  city text,
  country text,
  phone_primary bigint,
  phone_alternative bigint,
  email text,
  sno bigserial NOT NULL,
  CONSTRAINT agent_pkey PRIMARY KEY (agent_code)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE agent
  OWNER TO postgres;
-- Table: currency

-- DROP TABLE currency;

CREATE TABLE currency
(
  currency_code integer NOT NULL,
  currency_name text,
  currency_symbol text,
  CONSTRAINT currency_pkey PRIMARY KEY (currency_code)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE currency
  OWNER TO postgres;

 -- Table: customer

-- DROP TABLE customer;

CREATE TABLE customer
(
  customer_code text NOT NULL,
  customer_name text,
  invoicing_address text,
  city text,
  country text,
  "phone_(primary)" bigint,
  "phone_(alternative)" bigint,
  email text,
  destination_port text,
  delivery_address text,
  delivery_city text,
  delivery_country text,
  delivery_phone bigint,
  delivery_email text,
  CONSTRAINT customer_pkey PRIMARY KEY (customer_code)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE customer
  OWNER TO postgres;


  -- Table: delivery_terms

-- DROP TABLE delivery_terms;

CREATE TABLE delivery_terms
(
  delivery_code integer NOT NULL,
  information text,
  delivery_terms text,
  CONSTRAINT delivery_terms_pkey PRIMARY KEY (delivery_code)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE delivery_terms
  OWNER TO postgres;
-- Table: payment_terms

-- DROP TABLE payment_terms;

CREATE TABLE payment_terms
(
  payment_code integer NOT NULL,
  information text,
  payment_terms text,
  CONSTRAINT payment_terms_pkey PRIMARY KEY (payment_code)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE payment_terms
  OWNER TO postgres;
