--
-- PostgreSQL database dump
--

-- Dumped from database version 17.2 (Debian 17.2-1.pgdg120+1)
-- Dumped by pg_dump version 17.2 (Debian 17.2-1.pgdg120+1)

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: notes; Type: TABLE; Schema: public; Owner: gaba
--

CREATE TABLE public.notes (
    id integer NOT NULL,
    id_user bigint NOT NULL,
    gifted_name character varying(16) NOT NULL,
    date_of_birth date NOT NULL,
    ideas character varying(255) NOT NULL
);


ALTER TABLE public.notes OWNER TO gaba;

--
-- Name: notes_id_seq; Type: SEQUENCE; Schema: public; Owner: gaba
--

CREATE SEQUENCE public.notes_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.notes_id_seq OWNER TO gaba;

--
-- Name: notes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gaba
--

ALTER SEQUENCE public.notes_id_seq OWNED BY public.notes.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: gaba
--

CREATE TABLE public.users (
    id integer NOT NULL,
    user_role character varying(5) DEFAULT 'user'::character varying NOT NULL,
    user_name character varying(16) NOT NULL,
    email character varying(100) NOT NULL,
    passw character varying(255) NOT NULL,
    creation_date date DEFAULT CURRENT_DATE NOT NULL
);


ALTER TABLE public.users OWNER TO gaba;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: gaba
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO gaba;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: gaba
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: notes id; Type: DEFAULT; Schema: public; Owner: gaba
--

ALTER TABLE ONLY public.notes ALTER COLUMN id SET DEFAULT nextval('public.notes_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: gaba
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: notes; Type: TABLE DATA; Schema: public; Owner: gaba
--

COPY public.notes (id, id_user, gifted_name, date_of_birth, ideas) FROM stdin;
6	9	Ala	2005-05-04	kot
7	9	kot dawida	2020-01-01	karma\r\n
8	9	mama	1980-08-07	kwiaty, czekolada, książka kryminalna
9	9	Veska	2020-08-30	puzzle, żelki, ciastolina
10	9	piotrek	2002-11-10	miodowa whisky, rekin z ikei
11	9	Honorata	2011-04-11	duży zestaw Lego lub coś artystycznego
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: gaba
--

COPY public.users (id, user_role, user_name, email, passw, creation_date) FROM stdin;
9	admin	gaba	gaba@gmail.pl	$2a$12$3eqGLcgJsymV/f40cQfYBO2ViLp7ULP2AOIzYHCWCQddZwpvKhU8K	2025-01-31
10	user	gaba	gaba@gaba.gaba	$2y$10$c1uXWuAk5bDkHzk17N2s0e3qfPVQga8MhHPulSiVa/hViAidjhoTW	2025-01-31
11	user	dawideqqq	dawid12312@gmail.com	$2y$10$36/ZgoWBt.esBSxDx4KhCuEh4y60h3YQHbSHaTLRLIWcfYpt4sc3e	2025-02-01
12	user	ania	anusia@o2.pl	$2y$10$gJBE7t0gFnzOeXQZws5Wpu0CZiksFBzZW6GkB2tvDw/NxG97Hpssq	2025-02-01
13	user	mama muminka	muminek1980@wp.pl	$2y$10$.py9nhZbCYf0TjGNOOl0Y.huKiyEryt9LpMj0c4muw.pzoPxQHRTC	2025-02-01
14	user	chrupek	brbrb@o2.pl	$2y$10$TZ9jMAxsFtCamDVdED8v8OspHQ9j4iC9h9xTgf/QOct9lb/epEs3y	2025-02-01
\.


--
-- Name: notes_id_seq; Type: SEQUENCE SET; Schema: public; Owner: gaba
--

SELECT pg_catalog.setval('public.notes_id_seq', 11, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: gaba
--

SELECT pg_catalog.setval('public.users_id_seq', 14, true);


--
-- Name: notes notes_pkey; Type: CONSTRAINT; Schema: public; Owner: gaba
--

ALTER TABLE ONLY public.notes
    ADD CONSTRAINT notes_pkey PRIMARY KEY (id);


--
-- Name: users users_email_key; Type: CONSTRAINT; Schema: public; Owner: gaba
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_key UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: gaba
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: notes notes_id_user_fkey; Type: FK CONSTRAINT; Schema: public; Owner: gaba
--

ALTER TABLE ONLY public.notes
    ADD CONSTRAINT notes_id_user_fkey FOREIGN KEY (id_user) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

