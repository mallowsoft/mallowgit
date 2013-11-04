-- Table: agent

-- DROP TABLE agent;

CREATE TABLE agent
(
  agent_name text,
  address text,
  city text,
  country text,
  phone_primary bigint,
  phone_alternative bigint,
  email text,
  agent_code text,
  agent_id bigserial NOT NULL,
  CONSTRAINT agent_pkey PRIMARY KEY (agent_id)
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
  currency_name text,
  currency_symbol text,
  currency_code text,
  currency_id bigserial NOT NULL,
  CONSTRAINT currency_pkey PRIMARY KEY (currency_id)
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
  customer_code text,
  customer_name text,
  invoicing_address text,
  city text,
  country text,
  phone_primary bigint,
  phone_alternative bigint,
  email text,
  destination_port text,
  delivery_address text,
  delivery_city text,
  delivery_country text,
  delivery_phone bigint,
  delivery_email text,
  customer_code_id bigserial NOT NULL,
  currency_id integer,
  agent_id integer,
  payment_terms_id integer,
  delivery_terms_id integer,
  CONSTRAINT customer_pkey PRIMARY KEY (customer_code_id)
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
  information text,
  delivery_terms text,
  delivery_terms_code text,
  delivery_terms_id bigserial NOT NULL,
  CONSTRAINT delivery_terms_pkey PRIMARY KEY (delivery_terms_id)
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
  information text,
  payment_terms text,
  payment_terms_code text,
  payment_terms_id bigserial NOT NULL,
  CONSTRAINT payment_terms_pkey PRIMARY KEY (payment_terms_id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE payment_terms
  OWNER TO postgres;
-- Table: units

-- DROP TABLE units;

CREATE TABLE units
(
  unit_name text,
  unit_code text,
  unit_id bigserial NOT NULL,
  CONSTRAINT units_pkey PRIMARY KEY (unit_id)
)
-- Table: proforma_invoice

-- DROP TABLE proforma_invoice;

CREATE TABLE proforma_invoice
(
  proforma_no text,
  production_order_no text,
  proforma_date date,
  customer_code text,
  currency_value numeric DEFAULT 0.00,
  shipment_date date,
  "FC_value" numeric DEFAULT 0.00,
  exchange_rate numeric DEFAULT 0.00,
  "INR_value" numeric DEFAULT 0.00,
  "FPC_booking_period" text,
  eta date,
  destination_port text,
  delivery_terms text,
  payment_terms text,
  total_cbm numeric,
  no_type_containers text,
  agent text,
  agent_commision numeric DEFAULT 0.00,
  proforma_invoice_id bigserial NOT NULL,
  currency_code text,
  booked_exchange_rate numeric DEFAULT 0.00,
  fpc_booking_on boolean,
  fpc_booking_off boolean,
  currency_symbol text,
  CONSTRAINT proforma_invoice_pkey PRIMARY KEY (proforma_invoice_id),
  CONSTRAINT proforma_invoice_production_order_no_key UNIQUE (production_order_no),
  CONSTRAINT proforma_invoice_proforma_no_key UNIQUE (proforma_no)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE proforma_invoice
  OWNER TO postgres;

  -- Table: sales_invoice

-- DROP TABLE sales_invoice;

CREATE TABLE sales_invoice
(
  production_order_no text,
  invoice_date date,
  customer text,
  quantity numeric DEFAULT 0.00,
  weight numeric(12,3) DEFAULT 0.000,
  unit text,
  fc_value numeric(12,2) DEFAULT 0.00,
  currency text,
  "Ex_rate" numeric DEFAULT 0.00,
  inr_value numeric(15,2) DEFAULT 0.00,
  invoice_no integer NOT NULL,
  payment_due_date date,
  bank_ref_no bigint,
  payment_date date,
  ecgc_payment_terms text,
  shipment_board_date date,
  loading_port text,
  destination_port text,
  shipping_bill_no bigint,
  additional_bill_no bigint,
  house_agent text,
  feeder_vessel text,
  clearance_customs_house text,
  expected_eta_date date,
  date date,
  forwarder_name text,
  mother_vessel text,
  additional_date date,
  premium_rate numeric,
  shipment_no integer,
  proforma_id integer,
  currency_symbol text,
  CONSTRAINT sales_invoice_pkey PRIMARY KEY (invoice_no),
  CONSTRAINT sales_invoice_proforma_id_fkey FOREIGN KEY (proforma_id)
      REFERENCES proforma_invoice (proforma_invoice_id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);
ALTER TABLE sales_invoicess
  OWNER TO postgres;
