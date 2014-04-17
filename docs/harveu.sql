--
-- Estrutura da tabela 'posts'
--

CREATE TABLE posts (
	id int unsigned not null auto_increment primary key,
    title varchar(80) not null,
    body text not null,
    created datetime,
    created_by int not null,
    modified datetime,
    modified_by int
);

-- --------------------------------------------------------