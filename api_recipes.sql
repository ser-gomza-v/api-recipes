PGDMP     ,    4                u            api_recipes    10.1    10.1 '               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false                       1262    16393    api_recipes    DATABASE     �   CREATE DATABASE api_recipes WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Russian_Russia.1251' LC_CTYPE = 'Russian_Russia.1251';
    DROP DATABASE api_recipes;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false                       0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                        3079    12924    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false                       0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    16394    images    TABLE     �   CREATE TABLE images (
    image_id integer NOT NULL,
    src character varying(255) NOT NULL,
    recipe_id integer NOT NULL
);
    DROP TABLE public.images;
       public         postgres    false    3            �            1259    24660    images_image_id_seq    SEQUENCE     �   CREATE SEQUENCE images_image_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public.images_image_id_seq;
       public       postgres    false    196    3                       0    0    images_image_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE images_image_id_seq OWNED BY images.image_id;
            public       postgres    false    203            �            1259    16402    recipes    TABLE     �   CREATE TABLE recipes (
    recipe_id integer NOT NULL,
    user_id integer NOT NULL,
    name character varying(255) NOT NULL,
    "desc" text,
    date_c timestamp with time zone NOT NULL
);
    DROP TABLE public.recipes;
       public         postgres    false    3            �            1259    24647    recipes_recipe_id_seq    SEQUENCE     �   CREATE SEQUENCE recipes_recipe_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE public.recipes_recipe_id_seq;
       public       postgres    false    197    3                       0    0    recipes_recipe_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE recipes_recipe_id_seq OWNED BY recipes.recipe_id;
            public       postgres    false    202            �            1259    16410    sessions    TABLE     �   CREATE TABLE sessions (
    session_id integer NOT NULL,
    user_id integer NOT NULL,
    session character varying(255) NOT NULL,
    token character(32) NOT NULL
);
    DROP TABLE public.sessions;
       public         postgres    false    3            �            1259    24625    sessions_session_id_seq    SEQUENCE     y   CREATE SEQUENCE sessions_session_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.sessions_session_id_seq;
       public       postgres    false    198    3                       0    0    sessions_session_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE sessions_session_id_seq OWNED BY sessions.session_id;
            public       postgres    false    201            �            1259    16418    users    TABLE     �   CREATE TABLE users (
    user_id integer NOT NULL,
    name character varying(255) NOT NULL,
    login character varying(255) NOT NULL,
    pass character(32) NOT NULL
);
    DROP TABLE public.users;
       public         postgres    false    3            �            1259    24622    users_user_id_seq    SEQUENCE     s   CREATE SEQUENCE users_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.users_user_id_seq;
       public       postgres    false    199    3                       0    0    users_user_id_seq    SEQUENCE OWNED BY     9   ALTER SEQUENCE users_user_id_seq OWNED BY users.user_id;
            public       postgres    false    200            �
           2604    24662    images image_id    DEFAULT     d   ALTER TABLE ONLY images ALTER COLUMN image_id SET DEFAULT nextval('images_image_id_seq'::regclass);
 >   ALTER TABLE public.images ALTER COLUMN image_id DROP DEFAULT;
       public       postgres    false    203    196            �
           2604    24649    recipes recipe_id    DEFAULT     h   ALTER TABLE ONLY recipes ALTER COLUMN recipe_id SET DEFAULT nextval('recipes_recipe_id_seq'::regclass);
 @   ALTER TABLE public.recipes ALTER COLUMN recipe_id DROP DEFAULT;
       public       postgres    false    202    197            �
           2604    24627    sessions session_id    DEFAULT     l   ALTER TABLE ONLY sessions ALTER COLUMN session_id SET DEFAULT nextval('sessions_session_id_seq'::regclass);
 B   ALTER TABLE public.sessions ALTER COLUMN session_id DROP DEFAULT;
       public       postgres    false    201    198            �
           2604    24624    users user_id    DEFAULT     `   ALTER TABLE ONLY users ALTER COLUMN user_id SET DEFAULT nextval('users_user_id_seq'::regclass);
 <   ALTER TABLE public.users ALTER COLUMN user_id DROP DEFAULT;
       public       postgres    false    200    199                      0    16394    images 
   TABLE DATA               3   COPY images (image_id, src, recipe_id) FROM stdin;
    public       postgres    false    196   '                 0    16402    recipes 
   TABLE DATA               D   COPY recipes (recipe_id, user_id, name, "desc", date_c) FROM stdin;
    public       postgres    false    197   N'                 0    16410    sessions 
   TABLE DATA               @   COPY sessions (session_id, user_id, session, token) FROM stdin;
    public       postgres    false    198   k'                 0    16418    users 
   TABLE DATA               4   COPY users (user_id, name, login, pass) FROM stdin;
    public       postgres    false    199   �'                   0    0    images_image_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('images_image_id_seq', 4, true);
            public       postgres    false    203            !           0    0    recipes_recipe_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('recipes_recipe_id_seq', 1, false);
            public       postgres    false    202            "           0    0    sessions_session_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('sessions_session_id_seq', 1, true);
            public       postgres    false    201            #           0    0    users_user_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('users_user_id_seq', 21, true);
            public       postgres    false    200            �
           2606    24671    images images_image_id_pk 
   CONSTRAINT     V   ALTER TABLE ONLY images
    ADD CONSTRAINT images_image_id_pk PRIMARY KEY (image_id);
 C   ALTER TABLE ONLY public.images DROP CONSTRAINT images_image_id_pk;
       public         postgres    false    196            �
           2606    24659    recipes recipes_recipe_id_pk 
   CONSTRAINT     Z   ALTER TABLE ONLY recipes
    ADD CONSTRAINT recipes_recipe_id_pk PRIMARY KEY (recipe_id);
 F   ALTER TABLE ONLY public.recipes DROP CONSTRAINT recipes_recipe_id_pk;
       public         postgres    false    197            �
           2606    24596    sessions sessions_session_id_pk 
   CONSTRAINT     ^   ALTER TABLE ONLY sessions
    ADD CONSTRAINT sessions_session_id_pk PRIMARY KEY (session_id);
 I   ALTER TABLE ONLY public.sessions DROP CONSTRAINT sessions_session_id_pk;
       public         postgres    false    198            �
           2606    24584    users users_user_id_pk 
   CONSTRAINT     R   ALTER TABLE ONLY users
    ADD CONSTRAINT users_user_id_pk PRIMARY KEY (user_id);
 @   ALTER TABLE ONLY public.users DROP CONSTRAINT users_user_id_pk;
       public         postgres    false    199            �
           1259    24669    images_image_id_uindex    INDEX     M   CREATE UNIQUE INDEX images_image_id_uindex ON images USING btree (image_id);
 *   DROP INDEX public.images_image_id_uindex;
       public         postgres    false    196            �
           1259    24657    recipes_recipe_id_uindex    INDEX     Q   CREATE UNIQUE INDEX recipes_recipe_id_uindex ON recipes USING btree (recipe_id);
 ,   DROP INDEX public.recipes_recipe_id_uindex;
       public         postgres    false    197            �
           1259    24594    sessions_session_id_uindex    INDEX     U   CREATE UNIQUE INDEX sessions_session_id_uindex ON sessions USING btree (session_id);
 .   DROP INDEX public.sessions_session_id_uindex;
       public         postgres    false    198            �
           1259    24582    users_user_id_uindex    INDEX     I   CREATE UNIQUE INDEX users_user_id_uindex ON users USING btree (user_id);
 (   DROP INDEX public.users_user_id_uindex;
       public         postgres    false    199               +   x�3�,)J�+NL.����+�K�42�2�4270��b���� ��
4            x������ � �         M   x�3�4�,K)K��-(�.�30,�6N����6�-06�LO.�45)�JJ,K�O-*3(/362K-ʵ0�4��I����� 4�h         8   x�3��K�M�I-.�420JN�43JL6�4072M��M�R��M���b���� U�4     