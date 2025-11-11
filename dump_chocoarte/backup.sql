--
-- PostgreSQL database dump
--

\restrict ILkDdSnmquLNhTaF9BCVF4zeNKWuDmfPjc3LQWTHuxblbAH5vNswopOQOD1SP6r

-- Dumped from database version 17.6
-- Dumped by pg_dump version 17.6

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: forma_pagamento; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.forma_pagamento AS ENUM (
    'dinheiro',
    'cartao',
    'pix',
    'boleto'
);


ALTER TYPE public.forma_pagamento OWNER TO postgres;

--
-- Name: status_nf; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.status_nf AS ENUM (
    'em_andamento',
    'emitida',
    'cancelada'
);


ALTER TYPE public.status_nf OWNER TO postgres;

--
-- Name: tipo_alerta; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.tipo_alerta AS ENUM (
    'baixo_estoque',
    'sem_estoque',
    'vencimento'
);


ALTER TYPE public.tipo_alerta OWNER TO postgres;

--
-- Name: tipo_movimentacao_caixa; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.tipo_movimentacao_caixa AS ENUM (
    'entrada',
    'saida'
);


ALTER TYPE public.tipo_movimentacao_caixa OWNER TO postgres;

--
-- Name: tipo_movimentacao_estoque; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.tipo_movimentacao_estoque AS ENUM (
    'entrada',
    'saida'
);


ALTER TYPE public.tipo_movimentacao_estoque OWNER TO postgres;

--
-- Name: tipo_operacao_nf; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.tipo_operacao_nf AS ENUM (
    'entrada',
    'saida'
);


ALTER TYPE public.tipo_operacao_nf OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: alertas_estoque; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.alertas_estoque (
    id integer NOT NULL,
    produto_id integer,
    data_alerta timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    tipo public.tipo_alerta NOT NULL,
    enviado boolean DEFAULT false
);


ALTER TABLE public.alertas_estoque OWNER TO postgres;

--
-- Name: alertas_estoque_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.alertas_estoque_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.alertas_estoque_id_seq OWNER TO postgres;

--
-- Name: alertas_estoque_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.alertas_estoque_id_seq OWNED BY public.alertas_estoque.id;


--
-- Name: caixa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.caixa (
    id integer NOT NULL,
    data_abertura timestamp without time zone,
    valor_inicial numeric(10,2),
    data_fechamento timestamp without time zone,
    valor_final numeric(10,2),
    observacao text
);


ALTER TABLE public.caixa OWNER TO postgres;

--
-- Name: caixa_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.caixa_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.caixa_id_seq OWNER TO postgres;

--
-- Name: caixa_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.caixa_id_seq OWNED BY public.caixa.id;


--
-- Name: categorias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categorias (
    id integer NOT NULL,
    nome character varying(100) NOT NULL
);


ALTER TABLE public.categorias OWNER TO postgres;

--
-- Name: categorias_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categorias_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.categorias_id_seq OWNER TO postgres;

--
-- Name: categorias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categorias_id_seq OWNED BY public.categorias.id;


--
-- Name: estoque; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estoque (
    id integer NOT NULL,
    produto_id integer,
    quantidade integer DEFAULT 0 NOT NULL
);


ALTER TABLE public.estoque OWNER TO postgres;

--
-- Name: estoque_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.estoque_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.estoque_id_seq OWNER TO postgres;

--
-- Name: estoque_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.estoque_id_seq OWNED BY public.estoque.id;


--
-- Name: historico_produtos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.historico_produtos (
    id integer NOT NULL,
    produto_id integer,
    campo_alterado character varying(100),
    valor_antigo text,
    valor_novo text,
    data_alteracao timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.historico_produtos OWNER TO postgres;

--
-- Name: historico_produtos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.historico_produtos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.historico_produtos_id_seq OWNER TO postgres;

--
-- Name: historico_produtos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.historico_produtos_id_seq OWNED BY public.historico_produtos.id;


--
-- Name: inventario_itens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.inventario_itens (
    id integer NOT NULL,
    inventario_id integer,
    produto_id integer,
    quantidade_contada integer,
    quantidade_estoque integer
);


ALTER TABLE public.inventario_itens OWNER TO postgres;

--
-- Name: inventario_itens_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.inventario_itens_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.inventario_itens_id_seq OWNER TO postgres;

--
-- Name: inventario_itens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.inventario_itens_id_seq OWNED BY public.inventario_itens.id;


--
-- Name: inventarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.inventarios (
    id integer NOT NULL,
    data_inicio timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    descricao text
);


ALTER TABLE public.inventarios OWNER TO postgres;

--
-- Name: inventarios_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.inventarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.inventarios_id_seq OWNER TO postgres;

--
-- Name: inventarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.inventarios_id_seq OWNED BY public.inventarios.id;


--
-- Name: movimentacoes_caixa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.movimentacoes_caixa (
    id integer NOT NULL,
    caixa_id integer,
    tipo public.tipo_movimentacao_caixa NOT NULL,
    valor numeric(10,2) NOT NULL,
    forma_pagamento public.forma_pagamento NOT NULL,
    data_movimentacao timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    descricao text
);


ALTER TABLE public.movimentacoes_caixa OWNER TO postgres;

--
-- Name: movimentacoes_caixa_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.movimentacoes_caixa_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.movimentacoes_caixa_id_seq OWNER TO postgres;

--
-- Name: movimentacoes_caixa_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.movimentacoes_caixa_id_seq OWNED BY public.movimentacoes_caixa.id;


--
-- Name: movimentacoes_estoque; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.movimentacoes_estoque (
    id integer NOT NULL,
    produto_id integer NOT NULL,
    tipo public.tipo_movimentacao_estoque NOT NULL,
    quantidade integer NOT NULL,
    data_movimentacao timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    motivo character varying(100)
);


ALTER TABLE public.movimentacoes_estoque OWNER TO postgres;

--
-- Name: movimentacoes_estoque_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.movimentacoes_estoque_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.movimentacoes_estoque_id_seq OWNER TO postgres;

--
-- Name: movimentacoes_estoque_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.movimentacoes_estoque_id_seq OWNED BY public.movimentacoes_estoque.id;


--
-- Name: nota_fiscal_produtos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.nota_fiscal_produtos (
    id integer NOT NULL,
    nota_fiscal_id integer,
    produto_id integer,
    quantidade integer,
    preco_unitario numeric(10,2)
);


ALTER TABLE public.nota_fiscal_produtos OWNER TO postgres;

--
-- Name: nota_fiscal_produtos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.nota_fiscal_produtos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.nota_fiscal_produtos_id_seq OWNER TO postgres;

--
-- Name: nota_fiscal_produtos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.nota_fiscal_produtos_id_seq OWNED BY public.nota_fiscal_produtos.id;


--
-- Name: notas_fiscais; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.notas_fiscais (
    id integer NOT NULL,
    tipo_operacao public.tipo_operacao_nf NOT NULL,
    status public.status_nf DEFAULT 'em_andamento'::public.status_nf,
    data_emissao timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    xml text,
    chave_acesso character varying(100),
    protocolo character varying(100)
);


ALTER TABLE public.notas_fiscais OWNER TO postgres;

--
-- Name: notas_fiscais_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.notas_fiscais_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.notas_fiscais_id_seq OWNER TO postgres;

--
-- Name: notas_fiscais_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.notas_fiscais_id_seq OWNED BY public.notas_fiscais.id;


--
-- Name: produtos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produtos (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    codigo character varying(50) NOT NULL,
    descricao text,
    preco_venda numeric(10,2),
    preco_custo numeric(10,2),
    unidade character varying(20),
    categoria_id integer,
    qtd_minima_estoque integer
);


ALTER TABLE public.produtos OWNER TO postgres;

--
-- Name: produtos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.produtos_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.produtos_id_seq OWNER TO postgres;

--
-- Name: produtos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produtos_id_seq OWNED BY public.produtos.id;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuarios (
    id integer NOT NULL,
    nome character varying(200) NOT NULL,
    email character varying(200) NOT NULL,
    senha character varying(200) NOT NULL,
    tipo character varying(200) NOT NULL
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuarios_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.usuarios_id_seq OWNER TO postgres;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;


--
-- Name: alertas_estoque id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alertas_estoque ALTER COLUMN id SET DEFAULT nextval('public.alertas_estoque_id_seq'::regclass);


--
-- Name: caixa id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.caixa ALTER COLUMN id SET DEFAULT nextval('public.caixa_id_seq'::regclass);


--
-- Name: categorias id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias ALTER COLUMN id SET DEFAULT nextval('public.categorias_id_seq'::regclass);


--
-- Name: estoque id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estoque ALTER COLUMN id SET DEFAULT nextval('public.estoque_id_seq'::regclass);


--
-- Name: historico_produtos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.historico_produtos ALTER COLUMN id SET DEFAULT nextval('public.historico_produtos_id_seq'::regclass);


--
-- Name: inventario_itens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inventario_itens ALTER COLUMN id SET DEFAULT nextval('public.inventario_itens_id_seq'::regclass);


--
-- Name: inventarios id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inventarios ALTER COLUMN id SET DEFAULT nextval('public.inventarios_id_seq'::regclass);


--
-- Name: movimentacoes_caixa id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.movimentacoes_caixa ALTER COLUMN id SET DEFAULT nextval('public.movimentacoes_caixa_id_seq'::regclass);


--
-- Name: movimentacoes_estoque id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.movimentacoes_estoque ALTER COLUMN id SET DEFAULT nextval('public.movimentacoes_estoque_id_seq'::regclass);


--
-- Name: nota_fiscal_produtos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nota_fiscal_produtos ALTER COLUMN id SET DEFAULT nextval('public.nota_fiscal_produtos_id_seq'::regclass);


--
-- Name: notas_fiscais id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.notas_fiscais ALTER COLUMN id SET DEFAULT nextval('public.notas_fiscais_id_seq'::regclass);


--
-- Name: produtos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos ALTER COLUMN id SET DEFAULT nextval('public.produtos_id_seq'::regclass);


--
-- Name: usuarios id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);


--
-- Data for Name: alertas_estoque; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.alertas_estoque (id, produto_id, data_alerta, tipo, enviado) FROM stdin;
\.


--
-- Data for Name: caixa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.caixa (id, data_abertura, valor_inicial, data_fechamento, valor_final, observacao) FROM stdin;
\.


--
-- Data for Name: categorias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categorias (id, nome) FROM stdin;
\.


--
-- Data for Name: estoque; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.estoque (id, produto_id, quantidade) FROM stdin;
\.


--
-- Data for Name: historico_produtos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.historico_produtos (id, produto_id, campo_alterado, valor_antigo, valor_novo, data_alteracao) FROM stdin;
\.


--
-- Data for Name: inventario_itens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.inventario_itens (id, inventario_id, produto_id, quantidade_contada, quantidade_estoque) FROM stdin;
\.


--
-- Data for Name: inventarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.inventarios (id, data_inicio, descricao) FROM stdin;
\.


--
-- Data for Name: movimentacoes_caixa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.movimentacoes_caixa (id, caixa_id, tipo, valor, forma_pagamento, data_movimentacao, descricao) FROM stdin;
\.


--
-- Data for Name: movimentacoes_estoque; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.movimentacoes_estoque (id, produto_id, tipo, quantidade, data_movimentacao, motivo) FROM stdin;
\.


--
-- Data for Name: nota_fiscal_produtos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.nota_fiscal_produtos (id, nota_fiscal_id, produto_id, quantidade, preco_unitario) FROM stdin;
\.


--
-- Data for Name: notas_fiscais; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.notas_fiscais (id, tipo_operacao, status, data_emissao, xml, chave_acesso, protocolo) FROM stdin;
\.


--
-- Data for Name: produtos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.produtos (id, nome, codigo, descricao, preco_venda, preco_custo, unidade, categoria_id, qtd_minima_estoque) FROM stdin;
\.


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuarios (id, nome, email, senha, tipo) FROM stdin;
\.


--
-- Name: alertas_estoque_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.alertas_estoque_id_seq', 1, false);


--
-- Name: caixa_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.caixa_id_seq', 1, false);


--
-- Name: categorias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categorias_id_seq', 1, false);


--
-- Name: estoque_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.estoque_id_seq', 1, false);


--
-- Name: historico_produtos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.historico_produtos_id_seq', 1, false);


--
-- Name: inventario_itens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.inventario_itens_id_seq', 1, false);


--
-- Name: inventarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.inventarios_id_seq', 1, false);


--
-- Name: movimentacoes_caixa_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.movimentacoes_caixa_id_seq', 1, false);


--
-- Name: movimentacoes_estoque_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.movimentacoes_estoque_id_seq', 1, false);


--
-- Name: nota_fiscal_produtos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.nota_fiscal_produtos_id_seq', 1, false);


--
-- Name: notas_fiscais_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.notas_fiscais_id_seq', 1, false);


--
-- Name: produtos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produtos_id_seq', 1, false);


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 1, false);


--
-- Name: alertas_estoque alertas_estoque_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alertas_estoque
    ADD CONSTRAINT alertas_estoque_pkey PRIMARY KEY (id);


--
-- Name: caixa caixa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.caixa
    ADD CONSTRAINT caixa_pkey PRIMARY KEY (id);


--
-- Name: categorias categorias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (id);


--
-- Name: estoque estoque_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estoque
    ADD CONSTRAINT estoque_pkey PRIMARY KEY (id);


--
-- Name: estoque estoque_produto_id_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estoque
    ADD CONSTRAINT estoque_produto_id_key UNIQUE (produto_id);


--
-- Name: historico_produtos historico_produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.historico_produtos
    ADD CONSTRAINT historico_produtos_pkey PRIMARY KEY (id);


--
-- Name: inventario_itens inventario_itens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inventario_itens
    ADD CONSTRAINT inventario_itens_pkey PRIMARY KEY (id);


--
-- Name: inventarios inventarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inventarios
    ADD CONSTRAINT inventarios_pkey PRIMARY KEY (id);


--
-- Name: movimentacoes_caixa movimentacoes_caixa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.movimentacoes_caixa
    ADD CONSTRAINT movimentacoes_caixa_pkey PRIMARY KEY (id);


--
-- Name: movimentacoes_estoque movimentacoes_estoque_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.movimentacoes_estoque
    ADD CONSTRAINT movimentacoes_estoque_pkey PRIMARY KEY (id);


--
-- Name: nota_fiscal_produtos nota_fiscal_produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nota_fiscal_produtos
    ADD CONSTRAINT nota_fiscal_produtos_pkey PRIMARY KEY (id);


--
-- Name: notas_fiscais notas_fiscais_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.notas_fiscais
    ADD CONSTRAINT notas_fiscais_pkey PRIMARY KEY (id);


--
-- Name: produtos produtos_codigo_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT produtos_codigo_key UNIQUE (codigo);


--
-- Name: produtos produtos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT produtos_pkey PRIMARY KEY (id);


--
-- Name: usuarios usuarios_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_email_key UNIQUE (email);


--
-- Name: usuarios usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);


--
-- Name: alertas_estoque fk_alerta_produto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alertas_estoque
    ADD CONSTRAINT fk_alerta_produto FOREIGN KEY (produto_id) REFERENCES public.produtos(id) ON DELETE CASCADE;


--
-- Name: movimentacoes_caixa fk_caixa; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.movimentacoes_caixa
    ADD CONSTRAINT fk_caixa FOREIGN KEY (caixa_id) REFERENCES public.caixa(id) ON DELETE CASCADE;


--
-- Name: produtos fk_categoria; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produtos
    ADD CONSTRAINT fk_categoria FOREIGN KEY (categoria_id) REFERENCES public.categorias(id) ON DELETE SET NULL;


--
-- Name: estoque fk_estoque_produto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.estoque
    ADD CONSTRAINT fk_estoque_produto FOREIGN KEY (produto_id) REFERENCES public.produtos(id) ON DELETE CASCADE;


--
-- Name: historico_produtos fk_historico_produto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.historico_produtos
    ADD CONSTRAINT fk_historico_produto FOREIGN KEY (produto_id) REFERENCES public.produtos(id) ON DELETE CASCADE;


--
-- Name: inventario_itens fk_inventario; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inventario_itens
    ADD CONSTRAINT fk_inventario FOREIGN KEY (inventario_id) REFERENCES public.inventarios(id) ON DELETE CASCADE;


--
-- Name: inventario_itens fk_inventario_produto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.inventario_itens
    ADD CONSTRAINT fk_inventario_produto FOREIGN KEY (produto_id) REFERENCES public.produtos(id) ON DELETE CASCADE;


--
-- Name: movimentacoes_estoque fk_movimentacao_produto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.movimentacoes_estoque
    ADD CONSTRAINT fk_movimentacao_produto FOREIGN KEY (produto_id) REFERENCES public.produtos(id) ON DELETE CASCADE;


--
-- Name: nota_fiscal_produtos fk_nf; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nota_fiscal_produtos
    ADD CONSTRAINT fk_nf FOREIGN KEY (nota_fiscal_id) REFERENCES public.notas_fiscais(id) ON DELETE CASCADE;


--
-- Name: nota_fiscal_produtos fk_nf_produto; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.nota_fiscal_produtos
    ADD CONSTRAINT fk_nf_produto FOREIGN KEY (produto_id) REFERENCES public.produtos(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

\unrestrict ILkDdSnmquLNhTaF9BCVF4zeNKWuDmfPjc3LQWTHuxblbAH5vNswopOQOD1SP6r

