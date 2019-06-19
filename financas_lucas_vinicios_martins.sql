-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.20-log - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para financas_lucas_martins
CREATE DATABASE IF NOT EXISTS `financas_lucas_martins` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `financas_lucas_martins`;

-- Copiando estrutura para tabela financas_lucas_martins.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DESC_CATEGORIA` varchar(255) NOT NULL,
  `OBS_CATEGORIA` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela financas_lucas_martins.categoria: ~26 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` (`id_categoria`, `DESC_CATEGORIA`, `OBS_CATEGORIA`) VALUES
	(1, 'ALIMENTAÃ‡ÃƒO', 'DESPESAS COM ALIMENTAÃ‡ÃƒO.'),
	(2, 'CONDOMINIO', 'DESPESAS DE COIDOMINIO.'),
	(3, 'ENERGIA ELÃ‰TRICA', 'CONTAS DA CEMIG.'),
	(4, 'FARMÃCIA', 'FARMÃCIA'),
	(5, 'PRESENTE', 'PRESENTES'),
	(6, 'CASA', 'COMPRAS PARA CASA'),
	(7, 'IMPOSTOS', 'DIVIDAS COM IMPOSTOS DIVERSOS.'),
	(8, 'TELEFONE', 'GASTOS COM TELEFONE'),
	(9, 'AUTOMÃ“VEL', 'DESPESAS COM AUTOMÃ“VEL'),
	(10, 'VESTUÃRIO', 'SAPATOS,ROUPAS,ETC'),
	(11, 'INFORMÃTICA', 'INFORMÃTICA'),
	(12, 'COSMETICOS', 'PRODUTOS DE BELEZA'),
	(13, 'FILHO', 'DESPESAS COM O HERDEIRO'),
	(14, 'SUPERMERCADO', 'COMPRAS PARA CASA'),
	(15, 'COMBUSTÃVEL', 'COMBUSTÃVEL'),
	(16, 'SALÃƒO BELEZA', 'CORTES,UNHAS,ETC'),
	(17, 'ENTRETERIMENTO', 'CINEMAS E TEATROS,ETC'),
	(18, 'OUTROS', 'OUTROS'),
	(19, 'ESPORTES', 'ACADEMIA, MUSCULAÃ‡ÃƒO'),
	(21, 'GAMES', 'JOGOS / ELETRÃ”NICOS'),
	(22, 'ELETRODOMÃ‰STICO', 'ELETRODOMÃ‰STICO'),
	(23, 'MÃ“VEIS', 'MÃ“VEIS'),
	(24, 'SALÃRIO', 'SALÃRIO Ã€ RECEBER'),
	(25, 'ÃGUA', 'CONTAS DA COPASA'),
	(26, 'INTERNET', 'GASTOS COM INTERNET'),
	(27, 'ELETRÃ”NICOS', 'ELETRÃ”NICOS');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;

-- Copiando estrutura para tabela financas_lucas_martins.forma_pagamento
CREATE TABLE IF NOT EXISTS `forma_pagamento` (
  `ID_FORMA_PAGAMENTO` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `FORMA_PAGAMENTO` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DESC_FORMA_PAGAMENTO` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID_FORMA_PAGAMENTO`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela financas_lucas_martins.forma_pagamento: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `forma_pagamento` DISABLE KEYS */;
INSERT INTO `forma_pagamento` (`ID_FORMA_PAGAMENTO`, `FORMA_PAGAMENTO`, `DESC_FORMA_PAGAMENTO`) VALUES
	(3, 'C.C ITAUCARD', 'CARTÃƒO DE CRÃ‰DITO ITAUCARD'),
	(4, 'C.C NUBANK', 'CARTÃƒO DE CRÃ‰DITO NUBANK'),
	(5, 'DÃ‰BITO BRADESCO', 'DÃ‰BITO AUTOMÃTICO BRADESCO'),
	(7, 'DINHEIRO', 'PAGAMENTO EM CÃ‰DULAS DE DINHEIRO'),
	(8, 'C.C. INTER', 'CARTÃƒO DE CRÃ‰DITO INTER'),
	(9, 'C.C. SANTANDER PRIME', 'CARTÃƒO DE CRÃ‰DITO SANTANDER PRIME'),
	(10, 'DÃ‰BITO CAIXA', 'DÃ‰BITO EM CONTA POUPANÃ‡A CAIXA'),
	(11, 'C.C MASTERCARD', 'CARTÃƒO DE CRÃ‰DITO MASTERCARD'),
	(12, 'DEPÃ“SITO', 'DEPÃ“STIO BANCÃRIO');
/*!40000 ALTER TABLE `forma_pagamento` ENABLE KEYS */;

-- Copiando estrutura para tabela financas_lucas_martins.movimentacoes
CREATE TABLE IF NOT EXISTS `movimentacoes` (
  `idFINANCAS` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DESCRICAO` varchar(255) NOT NULL,
  `VALOR` double NOT NULL,
  `CATEGORIA` varchar(255) NOT NULL,
  `DATA_PAGAMENTO` date DEFAULT NULL,
  `DATA_VENCIMENTO` date DEFAULT NULL,
  `FORMA_PAGAMENTO` varchar(255) DEFAULT NULL,
  `TIPO` varchar(255) DEFAULT NULL,
  `SITUACAO` varchar(255) NOT NULL,
  `PARCELA` varchar(255) NOT NULL,
  `PARCELADO` varchar(4) NOT NULL,
  `LANCAMENTO` varchar(255) NOT NULL,
  `idUSUARIO` int(11) DEFAULT NULL,
  PRIMARY KEY (`idFINANCAS`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela financas_lucas_martins.movimentacoes: ~152 rows (aproximadamente)
/*!40000 ALTER TABLE `movimentacoes` DISABLE KEYS */;
INSERT INTO `movimentacoes` (`idFINANCAS`, `DESCRICAO`, `VALOR`, `CATEGORIA`, `DATA_PAGAMENTO`, `DATA_VENCIMENTO`, `FORMA_PAGAMENTO`, `TIPO`, `SITUACAO`, `PARCELA`, `PARCELADO`, `LANCAMENTO`, `idUSUARIO`) VALUES
	(1, 'SalÃ¡rio - Mensal', 1539.949951171875, 'SALÃRIO', '2019-01-07', '2019-01-07', 'DEPÃ“SITO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Receita', 373),
	(2, 'Conta de Luz', -130.3000030517578, 'ENERGIA ELÃ‰TRICA', '2019-01-07', '2019-01-12', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(3, 'Conta de Ãgua', -30, 'ÃGUA', '2019-01-07', '2019-01-12', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(4, 'ImpÃ©rio-Car  Seguro', -90, 'AUTOMÃ“VEL', '2019-01-10', '2019-01-20', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(5, 'Posto Ipiranga', -20, 'COMBUSTÃVEL', '2019-01-13', '2019-01-13', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(6, 'Material Escolar', -250, 'FILHO', '2019-01-14', '2019-01-14', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(7, 'SacolÃ£o ', -50, 'ALIMENTAÃ‡ÃƒO', '2019-01-14', '2019-01-14', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(8, 'AÃ§ougue', -78.8499984741211, 'ALIMENTAÃ‡ÃƒO', '2019-01-14', '2019-01-14', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(9, 'Compra do MÃªs/ Supermercado', -340, 'CASA', '2019-01-16', '2019-01-16', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(10, 'Padaria PÃ£o Brasil', -11.550000190734863, 'ALIMENTAÃ‡ÃƒO', '2019-01-04', '2019-01-04', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(11, 'IPVA 2019 - 3Â° Parcela', -151.66700744628906, 'AUTOMÃ“VEL', '2019-01-17', '2019-01-19', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'Sim', '3', 'Despeza', 373),
	(12, 'IPVA 2019 -  2Â° Parcela', -151.66700744628906, 'AUTOMÃ“VEL', '2019-02-18', '2019-02-19', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'Sim', '3', 'Despeza', 373),
	(13, 'IPVA 2019 -  1Â° Parcela', -151.66700744628906, 'AUTOMÃ“VEL', '2019-03-18', '2019-03-19', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'Sim', '3', 'Despeza', 373),
	(14, 'Minas Pizza', -39, 'ALIMENTAÃ‡ÃƒO', '2019-01-19', '2019-01-19', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(15, 'Posto Ipiranga', -30, 'COMBUSTÃVEL', '2019-01-22', '2019-01-22', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(16, 'Padaria PÃ£o Brasil', -8, 'ALIMENTAÃ‡ÃƒO', '2019-01-23', '2019-01-23', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(17, 'SacolÃ£o', -35, 'ALIMENTAÃ‡ÃƒO', '2019-01-24', '2019-01-24', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(19, 'Cachorro- Quente', -15.5, 'ALIMENTAÃ‡ÃƒO', '2019-01-26', '2019-01-26', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(20, 'PraÃ§ai - AÃ§ai/Vitaminas', -10, 'ALIMENTAÃ‡ÃƒO', '2019-01-27', '2019-01-27', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(21, 'SalÃ¡rio Mensal', 1539.75, 'SALÃRIO', '2019-02-07', '2019-02-07', 'DEPÃ“SITO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Receita', 373),
	(22, 'Conta de Luz', -121.19000244140625, 'ENERGIA ELÃ‰TRICA', '2019-02-07', '2019-02-03', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(23, 'Conta de Ãgua', -35.599998474121094, 'ÃGUA', '2019-02-08', '2019-02-12', 'C.C NUBANK', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(24, 'Padaria Bom Sucesso', -13.850000381469727, 'ALIMENTAÃ‡ÃƒO', '2019-02-09', '2019-02-09', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(25, 'VIVO Fixo', -49.900001525878906, 'TELEFONE', '2019-01-15', '2019-01-15', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(26, 'VIVO  Fibra', -65.9000015258789, 'INTERNET', '2019-01-15', '2019-01-17', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(27, 'Compra do MÃªs/ Supermercado', -322.75, 'CASA', '2019-02-09', '2019-02-09', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(28, 'SacolÃ£o', -40, 'ALIMENTAÃ‡ÃƒO', '2019-02-12', '2019-02-12', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(29, 'AÃ§ougue', -65.9000015258789, 'ALIMENTAÃ‡ÃƒO', '2019-02-12', '2019-02-12', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(30, 'Posto Ipiranga', -40, 'COMBUSTÃVEL', '2019-02-12', '2019-02-12', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(31, 'ImpÃ©rio Car - seguro', -92.75, 'AUTOMÃ“VEL', '2019-02-13', '2019-02-20', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(32, 'VIVO Fixo', -49.900001525878906, 'TELEFONE', '2019-02-15', '2019-02-17', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(33, 'Vivo Fibra', -65.9000015258789, 'INTERNET', '2019-02-15', '2019-02-17', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(34, 'Ferrari Pizzaria', -42.5, 'ALIMENTAÃ‡ÃƒO', '2019-02-16', '2019-02-16', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(35, 'Posto Ipiranga', -30, 'COMBUSTÃVEL', '2019-02-22', '2019-02-22', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(36, 'SacolÃ£o', -25, 'ALIMENTAÃ‡ÃƒO', '2019-02-21', '2019-02-21', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(37, 'AÃ§ougue', -49, 'ALIMENTAÃ‡ÃƒO', '2019-02-21', '2019-02-21', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(38, 'Lanchonete', -5, 'ALIMENTAÃ‡ÃƒO', '2019-02-22', '2019-02-22', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(39, 'Supermercados BH', -19.850000381469727, 'ALIMENTAÃ‡ÃƒO', '2019-02-25', '2019-02-25', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(40, 'SalÃ¡rio Mensal ', 1539.550048828125, 'SALÃRIO', '2019-03-07', '2019-03-07', 'DEPÃ“SITO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Receita', 373),
	(41, 'Conta de Ãgua', -30, 'ÃGUA', '2019-03-08', '2019-03-08', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(42, 'Conta de Luz', -119.8499984741211, 'ENERGIA ELÃ‰TRICA', '2019-03-08', '2019-03-08', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(43, 'Compra Mensal / Supermercados', -365, 'CASA', '2019-03-09', '2019-03-09', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(44, 'SacolÃ£o', -45, 'ALIMENTAÃ‡ÃƒO', '2019-03-09', '2019-03-09', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(45, 'AÃ§ougue', -65, 'ALIMENTAÃ‡ÃƒO', '2019-03-09', '2019-03-09', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(46, 'Posto Ipiranga', -20, 'COMBUSTÃVEL', '2019-03-11', '2019-03-11', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(47, 'RemÃ©dios', -28.5, 'FARMÃCIA', '2019-03-13', '2019-03-13', 'DÃ‰BITO CAIXA', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(48, 'Padaria PÃ£o Brasil', -11.550000190734863, 'ALIMENTAÃ‡ÃƒO', '2019-03-13', '2019-03-13', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(49, 'Vivo fixo', -49.900001525878906, 'TELEFONE', '2019-03-15', '2019-03-17', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(50, 'Vivo Fibra', -65.9000015258789, 'INTERNET', '2019-03-15', '2019-03-17', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(51, 'Academia Stylus', -130, 'ESPORTES', '2019-03-18', '2019-03-18', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(52, 'ImpÃ©rio Car - Seguro', -92.5, 'AUTOMÃ“VEL', '2019-03-18', '2019-03-18', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(53, 'Taxa Licenciamento Anual', -102.41000366210938, 'IMPOSTOS', '2019-03-21', '2019-03-31', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(54, 'Seguro DPVAT', -12, 'IMPOSTOS', '2019-03-21', '2019-03-31', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(55, 'SacolÃ£o', -30, 'ALIMENTAÃ‡ÃƒO', '2019-03-27', '2019-03-27', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(56, 'AÃ§ougue', -45, 'ALIMENTAÃ‡ÃƒO', '2019-03-27', '2019-03-27', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(57, 'Posto Ipiranga', -30, 'COMBUSTÃVEL', '2019-03-29', '2019-03-29', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(58, 'Cineart  ITAU', -75, 'ENTRETERIMENTO', '2019-03-30', '2019-03-30', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(59, 'Padaria PÃ£o Brasil', -15.75, 'ALIMENTAÃ‡ÃƒO', '2019-04-02', '2019-04-02', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(60, 'SalÃ¡rio Mensal', 1539.699951171875, 'SALÃRIO', '2019-04-05', '2019-04-05', 'DEPÃ“SITO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Receita', 373),
	(61, 'Conta de Luz', -121.5, 'ENERGIA ELÃ‰TRICA', '2019-04-08', '2019-04-08', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(62, 'Conta de Ãgua', -29.75, 'ÃGUA', '2019-04-08', '2019-04-08', 'DÃ‰BITO CAIXA', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(63, 'Compra Mensal / Supermercados', -348.75, 'CASA', '2019-04-10', '2019-04-10', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(64, 'ImpÃ©rio Car - Seguro', -92.5, 'AUTOMÃ“VEL', '2019-04-12', '2019-04-12', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(65, 'Posto Ipriranga', -40, 'COMBUSTÃVEL', '2019-04-14', '2109-04-14', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(66, 'SacolÃ£o', -50, 'ALIMENTAÃ‡ÃƒO', '2019-04-14', '2019-04-14', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(67, 'AÃ§ougue', -69.9000015258789, 'ALIMENTAÃ‡ÃƒO', '2019-04-14', '2019-04-14', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(68, 'Vivo Fixo', -49.5, 'TELEFONE', '2019-04-16', '2019-04-16', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(69, 'Vivo fibra', -65.9000015258789, 'INTERNET', '2019-04-16', '2019-04-16', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(70, 'Liquidificador', -89, 'ELETRODOMÃ‰STICO', '2019-04-17', '2019-04-17', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(71, 'Cel. Sansung Galaxy s7', -89.9000015258789, 'ELETRÃ”NICOS', '2019-04-19', '2019-04-19', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'Sim', '10', 'Despeza', 373),
	(72, 'Cel. Sansung Galaxy s7', -89.9000015258789, 'ELETRÃ”NICOS', '2019-05-18', '2019-05-19', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'Sim', '10', 'Despeza', 373),
	(73, 'Cel. Sansung Galaxy s7', -89.9000015258789, 'ELETRÃ”NICOS', '0000-00-00', '2019-06-19', 'C.C MASTERCARD', 'CrÃ©dito', 'Pendente', 'Sim', '10', 'Despeza', 373),
	(74, 'Cel. Sansung Galaxy s7', -89.9000015258789, 'ELETRÃ”NICOS', '0000-00-00', '2019-07-19', 'C.C MASTERCARD', 'CrÃ©dito', 'Pendente', 'Sim', '10', 'Despeza', 373),
	(75, 'Cel. Sansung Galaxy s7', -89.9000015258789, 'ELETRÃ”NICOS', '0000-00-00', '2019-08-19', 'C.C MASTERCARD', 'CrÃ©dito', 'Pendente', 'Sim', '10', 'Despeza', 373),
	(76, 'Cel. Sansung Galaxy s7', -89.9000015258789, 'ELETRÃ”NICOS', '0000-00-00', '2019-09-19', 'C.C MASTERCARD', 'CrÃ©dito', 'Pendente', 'Sim', '10', 'Despeza', 373),
	(77, 'Cel. Sansung Galaxy s7', -89.9000015258789, 'ELETRÃ”NICOS', '0000-00-00', '2019-10-19', 'C.C MASTERCARD', 'CrÃ©dito', 'Pendente', 'Sim', '10', 'Despeza', 373),
	(78, 'Cel. Sansung Galaxy s7', -89.9000015258789, 'ELETRÃ”NICOS', '0000-00-00', '2019-11-19', 'C.C MASTERCARD', 'CrÃ©dito', 'Pendente', 'Sim', '10', 'Despeza', 373),
	(79, 'Cel. Sansung Galaxy s7', -89.9000015258789, 'ELETRÃ”NICOS', '0000-00-00', '2019-12-19', 'C.C MASTERCARD', 'CrÃ©dito', 'Pendente', 'Sim', '10', 'Despeza', 373),
	(80, 'Cel. Sansung Galaxy s7', -89.9000015258789, 'ELETRÃ”NICOS', '0000-00-00', '2020-01-19', 'C.C MASTERCARD', 'CrÃ©dito', 'Pendente', 'Sim', '10', 'Despeza', 373),
	(81, 'ManutenÃ§Ã£o carro', -110, 'AUTOMÃ“VEL', '2019-04-23', '2019-04-23', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'Sim', '2', 'Despeza', 373),
	(82, 'ManutenÃ§Ã£o carro', -110, 'AUTOMÃ“VEL', '2019-05-21', '2019-05-23', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'Sim', '2', 'Despeza', 373),
	(83, 'Cachorro - Quente', -13.75, 'ALIMENTAÃ‡ÃƒO', '2019-04-25', '2019-04-25', 'DINHEIRO', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(84, 'SacolÃ£o', -25, 'ALIMENTAÃ‡ÃƒO', '2019-04-26', '2019-04-26', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(85, 'AÃ§ougue', -50, 'ALIMENTAÃ‡ÃƒO', '2019-04-26', '2019-04-26', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(86, 'Posto Ipiranga', -35, 'COMBUSTÃVEL', '2019-04-26', '2019-04-26', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(87, 'Padaria PÃ£o brasil ', -18.700000762939453, 'ALIMENTAÃ‡ÃƒO', '2019-04-26', '2019-04-26', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(88, 'Minas Pizza', -39, 'ALIMENTAÃ‡ÃƒO', '2019-04-27', '2019-04-27', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(89, 'Rodrigues Bar', 55, 'ENTRETERIMENTO', '2019-05-04', '2019-05-04', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Receita', 373),
	(90, 'SalÃ¡rio Mensal ', 1539.550048828125, 'SALÃRIO', '2019-05-07', '2019-05-07', 'DEPÃ“SITO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Receita', 373),
	(91, 'Conta de Luz', -132.75, 'ENERGIA ELÃ‰TRICA', '2019-05-08', '2019-05-08', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(92, 'Conta de Ãgua', -33.54999923706055, 'ÃGUA', '2019-05-08', '2019-05-08', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(93, 'Compra mensal / Supermercado', -355.20001220703125, 'CASA', '2019-05-10', '2019-05-10', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(94, 'Posto Ipiranga', -40, 'COMBUSTÃVEL', '2019-05-10', '2019-05-10', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(95, 'SacolÃ£o', -38, 'ALIMENTAÃ‡ÃƒO', '2019-05-11', '2019-05-11', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(96, 'AÃ§ougue', -67.75, 'ALIMENTAÃ‡ÃƒO', '2019-05-11', '2019-05-11', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(97, 'Imperio Car - seguro', -92.5, 'AUTOMÃ“VEL', '2019-05-13', '2019-05-13', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(98, 'Vivo Fixo', -49.5, 'TELEFONE', '2019-05-16', '2019-05-17', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(99, 'Vivo Fibra', -65.9000015258789, 'INTERNET', '2019-05-16', '2019-05-17', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(100, 'Academia stylus', -75, 'ESPORTES', '2019-05-17', '2019-05-20', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(101, 'Academia Stylus', -75.9000015258789, 'ESPORTES', '2019-04-18', '2019-04-20', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(102, 'RemÃ©dios', -56.75, 'FARMÃCIA', '2019-05-20', '2019-05-20', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(103, 'Cafeteira ElÃ©trica', -115, 'ELETRODOMÃ‰STICO', '2019-05-22', '2019-05-22', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(104, 'Posto Ipiranga', -30, 'COMBUSTÃVEL', '2019-05-23', '2019-05-23', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(105, 'Cinemark', -85, 'ENTRETERIMENTO', '2019-05-26', '2019-05-26', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(106, 'SacolÃ£o', -30, 'ALIMENTAÃ‡ÃƒO', '2019-05-27', '2019-05-27', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(107, 'AÃ§ougue', -54.54999923706055, 'ALIMENTAÃ‡ÃƒO', '2019-05-27', '2019-05-27', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(108, 'AÃ§ai / Vitaminas', -12, 'ALIMENTAÃ‡ÃƒO', '2019-05-28', '2019-05-28', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(109, 'Padaria Lindeia', -14, 'ALIMENTAÃ‡ÃƒO', '2019-05-30', '2019-05-30', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(110, 'SalÃ¡rio Mensal', 1539.6500244140625, 'SALÃRIO', '2019-06-07', '2019-06-07', 'DEPÃ“SITO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Receita', 373),
	(111, 'Conta de Luz', -140, 'ENERGIA ELÃ‰TRICA', '2019-06-07', '2019-06-07', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(112, 'Conta de Ãgua', -35, 'ÃGUA', '2019-06-07', '2019-06-07', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(113, 'Compras Mensal', -360, 'CASA', '2019-06-08', '2019-06-08', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(114, 'Pizza Minas', -43.5, 'ALIMENTAÃ‡ÃƒO', '2019-06-08', '2019-06-08', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(115, 'SacolÃ£o', -35, 'ALIMENTAÃ‡ÃƒO', '2019-06-10', '2019-06-10', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(116, 'AÃ§ougue', -60, 'ALIMENTAÃ‡ÃƒO', '2019-06-10', '2019-06-10', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(117, 'Posto Ipiranga', -30, 'COMBUSTÃVEL', '2019-06-10', '2019-06-10', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(118, 'ImpÃ©rio car - seguro', -92.5, 'AUTOMÃ“VEL', '2019-06-11', '2019-06-11', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 373),
	(119, 'Salario', 1050, 'SALÃRIO', '2019-05-03', '2019-05-05', 'DEPÃ“SITO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Receita', 379),
	(120, 'Conta de Ãgua', -34.5, 'ÃGUA', '2019-05-06', '2019-05-10', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 379),
	(121, 'Conta de Luz', -89.94999694824219, 'ENERGIA ELÃ‰TRICA', '2019-05-07', '2019-05-10', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 379),
	(122, 'Lanchonete', -11.5, 'ALIMENTAÃ‡ÃƒO', '2019-05-10', '2019-05-10', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 379),
	(124, 'Supermercados BH', -180, 'CASA', '2019-05-11', '2019-05-11', 'DÃ‰BITO BRADESCO', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 379),
	(125, 'Pizzaria Uai SÃ´', -35.9, 'ALIMENTAÃ‡ÃƒO', '2019-05-11', '2019-05-11', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 379),
	(126, 'Oi Velox', -69.9, 'INTERNET', '2019-05-15', '2019-05-15', 'DÃ‰BITO BRADESCO', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 379),
	(127, 'Recarga Celular', -15, 'ELETRÃ”NICOS', '2019-05-15', '2019-05-15', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 379),
	(128, 'Restaurante Caseiro ', -49.5, 'ALIMENTAÃ‡ÃƒO', '2019-05-19', '2019-05-19', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 379),
	(129, 'SacolÃ£o ABC', -32, 'ALIMENTAÃ‡ÃƒO', '2019-05-20', '2019-05-20', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 379),
	(130, 'Subway', -24.5, 'ALIMENTAÃ‡ÃƒO', '2019-05-21', '2019-05-21', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 379),
	(131, 'GÃ¡s de Cozinha', -89.9, 'CASA', '2019-05-22', '2019-05-22', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 379),
	(132, 'MineirÃ£o', -75, 'ENTRETERIMENTO', '2019-05-25', '2019-05-25', 'C.C MASTERCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 379),
	(133, 'Padaria Dona Florinda', -13.75, 'ALIMENTAÃ‡ÃƒO', '2019-05-26', '2019-05-26', 'DINHEIRO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Despeza', 379),
	(134, 'Pen Drive 16G', -32, 'INFORMÃTICA', '2019-05-29', '2019-05-29', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 379),
	(135, 'RemÃ©dios', -55, 'FARMÃCIA', '2019-05-31', '2019-05-31', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'NÃ£o', '1', 'Despeza', 379),
	(136, 'TelevisÃ£o LG 42 4K', -149.91666666667, 'ELETRODOMÃ‰STICO', '2019-06-04', '2019-06-04', 'C.C. INTER', 'CrÃ©dito', 'Pago', 'Sim', '12', 'Despeza', 379),
	(137, 'TelevisÃ£o LG 42 4K', -149.91666666667, 'ELETRODOMÃ‰STICO', '0000-00-00', '2019-07-04', 'C.C. INTER', 'CrÃ©dito', 'Pendente', 'Sim', '12', 'Despeza', 379),
	(138, 'TelevisÃ£o LG 42 4K', -149.91666666667, 'ELETRODOMÃ‰STICO', '0000-00-00', '2019-08-04', 'C.C. INTER', 'CrÃ©dito', 'Pendente', 'Sim', '12', 'Despeza', 379),
	(139, 'TelevisÃ£o LG 42 4K', -149.91666666667, 'ELETRODOMÃ‰STICO', '0000-00-00', '2019-09-04', 'C.C. INTER', 'CrÃ©dito', 'Pendente', 'Sim', '12', 'Despeza', 379),
	(140, 'TelevisÃ£o LG 42 4K', -149.91666666667, 'ELETRODOMÃ‰STICO', '0000-00-00', '2019-10-04', 'C.C. INTER', 'CrÃ©dito', 'Pendente', 'Sim', '12', 'Despeza', 379),
	(141, 'TelevisÃ£o LG 42 4K', -149.91666666667, 'ELETRODOMÃ‰STICO', '0000-00-00', '2019-11-04', 'C.C. INTER', 'CrÃ©dito', 'Pendente', 'Sim', '12', 'Despeza', 379),
	(142, 'TelevisÃ£o LG 42 4K', -149.91666666667, 'ELETRODOMÃ‰STICO', '0000-00-00', '2019-12-04', 'C.C. INTER', 'CrÃ©dito', 'Pendente', 'Sim', '12', 'Despeza', 379),
	(143, 'TelevisÃ£o LG 42 4K', -149.91666666667, 'ELETRODOMÃ‰STICO', '0000-00-00', '2020-01-04', 'C.C. INTER', 'CrÃ©dito', 'Pendente', 'Sim', '12', 'Despeza', 379),
	(144, 'TelevisÃ£o LG 42 4K', -149.91666666667, 'ELETRODOMÃ‰STICO', '0000-00-00', '2020-02-04', 'C.C. INTER', 'CrÃ©dito', 'Pendente', 'Sim', '12', 'Despeza', 379),
	(145, 'TelevisÃ£o LG 42 4K', -149.91666666667, 'ELETRODOMÃ‰STICO', '0000-00-00', '2020-03-04', 'C.C. INTER', 'CrÃ©dito', 'Pendente', 'Sim', '12', 'Despeza', 379),
	(146, 'TelevisÃ£o LG 42 4K', -149.91666666667, 'ELETRODOMÃ‰STICO', '0000-00-00', '2020-04-04', 'C.C. INTER', 'CrÃ©dito', 'Pendente', 'Sim', '12', 'Despeza', 379),
	(147, 'TelevisÃ£o LG 42 4K', -149.91666666667, 'ELETRODOMÃ‰STICO', '0000-00-00', '2020-05-04', 'C.C. INTER', 'CrÃ©dito', 'Pendente', 'Sim', '12', 'Despeza', 379),
	(148, 'SalÃ¡rio', 1049.75, 'SALÃRIO', '2019-06-07', '2019-06-07', 'DEPÃ“SITO', 'Dinheiro', 'Pago', 'NÃ£o', '1', 'Receita', 379),
	(149, 'Conta de Ãgua', -40, 'ÃGUA', '2019-06-07', '2019-06-12', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 379),
	(151, 'Conta de Luz', -115.75, 'ENERGIA ELÃ‰TRICA', '2019-06-07', '2019-06-10', 'DÃ‰BITO CAIXA', 'DÃ©bito', 'Pago', 'NÃ£o', '1', 'Despeza', 379),
	(152, 'ManutenÃ§Ã£o carro', -145, 'AUTOMÃ“VEL', '2019-06-10', '2019-06-10', 'C.C ITAUCARD', 'CrÃ©dito', 'Pago', 'Sim', '4', 'Despeza', 379),
	(153, 'ManutenÃ§Ã£o carro', -145, 'AUTOMÃ“VEL', '0000-00-00', '2019-07-10', 'C.C ITAUCARD', 'CrÃ©dito', 'Pendente', 'Sim', '4', 'Despeza', 379),
	(154, 'ManutenÃ§Ã£o carro', -145, 'AUTOMÃ“VEL', '0000-00-00', '2019-08-10', 'C.C ITAUCARD', 'CrÃ©dito', 'Pendente', 'Sim', '4', 'Despeza', 379),
	(155, 'ManutenÃ§Ã£o carro', -145, 'AUTOMÃ“VEL', '0000-00-00', '2019-09-10', 'C.C ITAUCARD', 'CrÃ©dito', 'Pendente', 'Sim', '4', 'Despeza', 379);
/*!40000 ALTER TABLE `movimentacoes` ENABLE KEYS */;

-- Copiando estrutura para tabela financas_lucas_martins.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `COD_Usuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cpf` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `perfil` int(11) NOT NULL,
  `cont_acesso` int(10) DEFAULT '0',
  `path_avatar` varchar(1024) DEFAULT 'img\\avatar.png',
  `ultimo_acesso` varchar(255) DEFAULT 'Nunca Acessou',
  `informacoes` varchar(1024) DEFAULT 'Sem Informações',
  PRIMARY KEY (`COD_Usuario`),
  UNIQUE KEY `ConstraintUnicos` (`cpf`,`login`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=380 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela financas_lucas_martins.usuario: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`COD_Usuario`, `cpf`, `nome`, `login`, `senha`, `email`, `perfil`, `cont_acesso`, `path_avatar`, `ultimo_acesso`, `informacoes`) VALUES
	(373, '128.384.755.72', 'Lucas Vinicios Martins', 'lucas_martins', '0192023a7bbd73250516f069df18b500', 'lukas.vinicios87@gmail.com', 0, 0, 'img\\avatar.png', 'Nunca Acessou', 'Sem Informações'),
	(374, '124.437.721-14', 'lucas vinicios martins', 'Lucas_admin', '1f2b339b880dfa8eb331cb4c3e0d670d', 'lucas03188@hotmail.com', 0, 0, 'img\\avatar.png', 'Nunca Acessou', 'Sem Informações'),
	(375, '125.742.354-40', 'Lucas Martins', 'adm_lucas', '0192023a7bbd73250516f069df18b500', 'lukas2019@gmail.com', 0, 0, 'img\\avatar.png', 'Nunca Acessou', 'Sem Informações'),
	(377, '121.122.331-10', 'teste', 'teste', 'e959088c6049f1104c84c9bde5560a13', 'lucas@outlook.com', 0, 0, 'img\\avatar.png', 'Nunca Acessou', 'Sem Informações'),
	(379, '112.145.164-14', 'Lucas Martins', 'teste2', '698dc19d489c4e4db73e28a713eab07b', 'teste2@hotmail.com', 0, 0, 'img\\avatar.png', 'Nunca Acessou', 'Sem Informações');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
