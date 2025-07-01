



CREATE TABLE tb_clientes(
	id INT AUTO_INCREMENT,
    nm_cliente VARCHAR(100),
    cl_email VARCHAR(200) NOT NULL UNIQUE,
    tel_cliente VARCHAR(20) UNIQUE,
    cad_cliente TIMESTAMP,
    idade TINYINT NOT NULL,
    cl_cep VARCHAR(100),
    cep_comp VARCHAR(100),
    senha VARCHAR(100),
    
    CONSTRAINT pk_clientes PRIMARY KEY(id)
);

CREATE TABLE tb_funcionario(
	id_funcionario INT AUTO_INCREMENT,
    nm_funcionario VARCHAR(100) NOT NULL,
    dt_funcionario TIMESTAMP,
    func_email VARCHAR(200) NOT NULL UNIQUE,
    tel_funcionario VARCHAR(20) NOT NULL UNIQUE,
    func_salario DECIMAL(10,2) NOT NULL,
    dt_nascimento DATE NOT NULL,
    func_senha VARCHAR(100),
    
    CONSTRAINT pk_funcionario PRIMARY KEY(id_funcionario)
);

CREATE TABLE tb_produto(
	id_produto INT AUTO_INCREMENT,
    nm_produto VARCHAR(100) NOT NULL UNIQUE,
    desc_produto VARCHAR(500) NOT NULL,
    prod_preco DECIMAL(10,2) NOT NULL,
    quant_prod INT(11),
    embalagem VARCHAR(10),
    img_produto VARCHAR(100),
    
    CONSTRAINT pk_produto PRIMARY KEY (id_produto)
);

CREATE TABLE tb_carrinho(
    id_carrinho INT(11) AUTO_INCREMENT,
    quant_cart INT(11),
    id_produto INT(11),
    id_cliente INT(11),
    preco_cart DECIMAL(10,2),

    CONSTRAINT pk_carrinho PRIMARY KEY(id_carrinho),
    CONSTRAINT fk_tb_produto FOREIGN KEY(id_produto) REFERENCES tb_produto(id_produto),
    CONSTRAINT fk_tb_clientes FOREIGN KEY(id_cliente) REFERENCES tb_clientes(id)

);

