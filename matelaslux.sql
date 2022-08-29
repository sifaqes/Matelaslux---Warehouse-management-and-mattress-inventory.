-- phpMyAdmin SQL Dump
-- version 4.9.10
-- https://www.phpmyadmin.net/
--
-- Hôte : db5007270364.hosting-data.io
-- Généré le : ven. 22 avr. 2022 à 00:11
-- Version du serveur : 5.7.36-log
-- Version de PHP : 7.0.33-0+deb9u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dbs5992035`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `user` text NOT NULL,
  `rol` int(5) NOT NULL,
  `nom` text NOT NULL,
  `indi` text NOT NULL,
  `tel` text NOT NULL,
  `email` text NOT NULL,
  `fecha` text NOT NULL,
  `dir` text NOT NULL,
  `bat` text NOT NULL,
  `port` text NOT NULL,
  `ville` text NOT NULL,
  `wilaya` text NOT NULL,
  `postal` text NOT NULL,
  `tipo` text NOT NULL,
  `dim` text NOT NULL,
  `hut` text NOT NULL,
  `den` text NOT NULL,
  `track` text NOT NULL,
  `statue` text NOT NULL,
  `liv` text NOT NULL,
  `cupon` text NOT NULL,
  `prix` text NOT NULL,
  `text` text NOT NULL,
  `dateofdelivery` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `user`, `rol`, `nom`, `indi`, `tel`, `email`, `fecha`, `dir`, `bat`, `port`, `ville`, `wilaya`, `postal`, `tipo`, `dim`, `hut`, `den`, `track`, `statue`, `liv`, `cupon`, `prix`, `text`, `dateofdelivery`) VALUES
(130, 'AM', 1, '2dZOuYwc7qKyS8wfusw5bqfJmViBDh/AXy/sBfX5fxg=', 'CY20pJG9IlJEyEg9JPcyzg==', 'W9rLgb8k+zesqczrKNx1FA==', '1ykJGGXda6/t8HmoJp2b8g==', '2022-04-16', 'pGgqmIz9I8sCg86gLxJ9Eo+40TI5pDQUOPGq/hX9F2E=', 'IW3tuHSOyD9u9QtKPnZkxg==', 'IW3tuHSOyD9u9QtKPnZkxg==', 'JBaIuxKvt5UiaVaZcf0ClQ==', 'bPp83BgK7l0J9Jwtkz96UQ==', '1ykJGGXda6/t8HmoJp2b8g==', 'shgUB8iZguW9SrMl6oB9vg==', 'eBaPC/xNDc3w98V0p+i7fw==', '1MRYPE0WKIdO0zpC+6vgpA==', 'WX4KH5JmAkqPrGvDWAQlfw==', 'mcVUrFcuOzFygdkmAhbYdQ==', '1ykJGGXda6/t8HmoJp2b8g==', 'LaTQFFNokL6qQow6/n21lg==', '1ykJGGXda6/t8HmoJp2b8g==', 'LaTQFFNokL6qQow6/n21lg==', 'cM3sTZZIUI8Kez3S9VDQ7C1Gt/Bd5UEOgy5qgSI+kdc=', '0000-00-00 00:00:00'),
(131, 'AM', 2, 'GdS47wVz9GkHqua2tY9HCzEmnIHtKFZDwWcBQhuMj2U=', 'CY20pJG9IlJEyEg9JPcyzg==', 'pC9A1yCjsdnxM/pmCCovlw==', '1ykJGGXda6/t8HmoJp2b8g==', '2022-04-16', 'iUDMsV9MNu8W9uqhh0TI1Q==', '5F62DHrNWrqfjaa/oE9wHA==', '5F62DHrNWrqfjaa/oE9wHA==', 'PEUQgcKyKoebLWmD2Hhf3Q==', 'PEUQgcKyKoebLWmD2Hhf3Q==', '1ykJGGXda6/t8HmoJp2b8g==', 'shgUB8iZguW9SrMl6oB9vg==', 'MKdG7udfrNrfoESX08ouXw==', 'i42E5qz2Zv5JZlK1LwLkzg==', 'WX4KH5JmAkqPrGvDWAQlfw==', 'bP+tFHoVmcXys2qyLC3xxg==', 'M8KEH+2SX7n98lDrRO88iQ==', '/zZFOYJ5LOxsKu0lK80dLA==', 'AFRv3VRb4+dFRt3eIIdipw==', 'Z9eKIYWzxvrIxdkYgRW0tg==', 'cM3sTZZIUI8Kez3S9VDQ7C1Gt/Bd5UEOgy5qgSI+kdc=', '0000-00-00 00:00:00'),
(134, 'AM', 3, '2cdE81kr9HONW1lWV06PdQ==', 'CY20pJG9IlJEyEg9JPcyzg==', 'RNPmbRpQDxGxGjqpEnGuNQ==', '1ykJGGXda6/t8HmoJp2b8g==', '2022-04-16', '2RVYgridisqDcta7NRmrT8A/4xursExCuB/vm3i3ytYlfFzstcB+Q+FaGHQpx4RS', '5F62DHrNWrqfjaa/oE9wHA==', '5F62DHrNWrqfjaa/oE9wHA==', 'fNg5ys+svwWKWIKokR17Sa+A1bP5Ghp2lmjoX68Y+23DBHgHs4ZdRiKHQIR5ZB9i', 'v4DoQdQ/Pd0MDQOyeqOfKA==', '1ykJGGXda6/t8HmoJp2b8g==', 'shgUB8iZguW9SrMl6oB9vg==', 'MKdG7udfrNrfoESX08ouXw==', '1MRYPE0WKIdO0zpC+6vgpA==', 'WX4KH5JmAkqPrGvDWAQlfw==', '1ykJGGXda6/t8HmoJp2b8g==', 'M8KEH+2SX7n98lDrRO88iQ==', 'Gnex0q/2teNuCXgBRSfZ7A==', '1ykJGGXda6/t8HmoJp2b8g==', 'Gnex0q/2teNuCXgBRSfZ7A==', '00aLOV5JCydlizWiZZZjGEuPf3pZJYhMwazFtf7+cY3vVeRe/VsSZqy5otVYF5MPN4woDRW0ez1+sBi2h711RqUVv0t2M70rwf8rCTyr3czPsZF4t2lRLS/XuN1T6zGn6nVJrchkT/7hdnwS94sDkA==', '0000-00-00 00:00:00'),
(135, 'AM', 4, 'G7Ics76d4ZKPah3l1p3fbIwhl5WJAssQDwbM9PDtTzs=', 'CY20pJG9IlJEyEg9JPcyzg==', '6uo8pdjDujHDsNztGcGLiQ==', '1ykJGGXda6/t8HmoJp2b8g==', '2022-04-16', 'jS5cOZYfkjOUjkdFYaxXl6IwsELKtKhtBoHM9Xe2uNCf/4WjxWrkJthG+k+6KG/y', '5F62DHrNWrqfjaa/oE9wHA==', '5F62DHrNWrqfjaa/oE9wHA==', '0CPni5I6mGeTz4oxeTfPHA==', 'Ko8eSRJ6OiYIkMkkrvTEAQ==', '1ykJGGXda6/t8HmoJp2b8g==', 'shgUB8iZguW9SrMl6oB9vg==', 'eBaPC/xNDc3w98V0p+i7fw==', 'i42E5qz2Zv5JZlK1LwLkzg==', 'WX4KH5JmAkqPrGvDWAQlfw==', 'NOK6QKj7Dp2sbro4EkAflg==', 'M8KEH+2SX7n98lDrRO88iQ==', 'ncLtLgtcpCq+TLd/Dg2BYQ==', '1ykJGGXda6/t8HmoJp2b8g==', 'ncLtLgtcpCq+TLd/Dg2BYQ==', 'cM3sTZZIUI8Kez3S9VDQ7C1Gt/Bd5UEOgy5qgSI+kdc=', '0000-00-00 00:00:00'),
(136, 'AM', 5, 'TmKRF1iuDTY6iqSYxQd2OA==', 'CY20pJG9IlJEyEg9JPcyzg==', 'hg0gEpHnKUqx/JNZsZAn0A==', '1ykJGGXda6/t8HmoJp2b8g==', '2022-04-16', 'Jm9uwfIo+17JHeEfwMmWOiVY8xZHUCf7h3b4SgatZJR5yVN26EfYK9XrVoUFU5GJxKTLRyvxFs5C2cVmdoYa0w==', 'XkkNqPNJ9wkld1M5gbGDyg==', 'XkkNqPNJ9wkld1M5gbGDyg==', 'DL7JrZzgtxz1izOMmJi8z42VNsjqn+RwwSkIqdXYFCY=', 'sEOKvsMAjH4zlHCbsKAAbjN/QQDK1OLei4coZktFnCU=', '1ykJGGXda6/t8HmoJp2b8g==', 'shgUB8iZguW9SrMl6oB9vg==', 'MKdG7udfrNrfoESX08ouXw==', '1MRYPE0WKIdO0zpC+6vgpA==', 'WX4KH5JmAkqPrGvDWAQlfw==', '1ykJGGXda6/t8HmoJp2b8g==', 'M8KEH+2SX7n98lDrRO88iQ==', 'ZPn9XAQcv14A33Qh6WztXg==', 'FrjWK6YYA29SVDJ4F8fIyA==', 'cHY7y93chx2A920Zqa+tcQ==', 'OB6OfFRj15bUnd01tw82e3JeVh66fC/95vLejqk6YUCJ8MIRVlBLTrgOG39pCloZikW8h7PhdnEwYM7XeD4vrw==', '0000-00-00 00:00:00'),
(151, 'SF', 1, 'CN0RqCTvcViqIfcctVUGLMM2+7IHtj8qvZ7gWg+hJxw=', 'CY20pJG9IlJEyEg9JPcyzg==', '3RtXM+8XhYT+Bi+iiu489g==', '19yX8SURPhuhYpTEgJD+CS3OWNBN4CxH8YFCCjVbXyc=', '2022-04-16', 'PpEluERmPWVOl8MH6i1liFPI6j7ioaRNEMxtlnUiRTk=', '7TrRneaQ9aqj+QLKxKrMUA==', '1ykJGGXda6/t8HmoJp2b8g==', 'ddwnHmrr5lLZIYCAi86LIVAZK11RpWO7w8apGYLciWY=', 'jBllWvjbZD5MHfO8jY0+lA==', 'UXXFZcQxh4cj9PWKFBejYg==', 'ACVpVaWoOoKExObiNFoPdQ==', 'Eq7ZMh8kaI8rAWGflvy6SA==', 'i42E5qz2Zv5JZlK1LwLkzg==', 'WX4KH5JmAkqPrGvDWAQlfw==', '1ykJGGXda6/t8HmoJp2b8g==', 'lH0lFCfm+nHFBFwOJVE1sQ==', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', '4L6AbRN5/IinWDksf26ikg==', 'cM3sTZZIUI8Kez3S9VDQ7C1Gt/Bd5UEOgy5qgSI+kdc=', '0000-00-00 00:00:00'),
(154, 'KH2', 89, 'ZmSKOfg/X6V5QE6IiIuBOe9KiL7cub2Jvvn7lWrzbKw=', 'CY20pJG9IlJEyEg9JPcyzg==', 'usTt3kIm2gyMbS1RZcrQdQ==', '1ykJGGXda6/t8HmoJp2b8g==', '2022-04-17', 'muUi7Sm2FAFWX2ougdy+oe67ZTEY3x2RPPnAtqsGn8T8eZ0G3zz42Ou9lXSmjKNv', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', '3yrht/1nxNmZx2HwLxRCNA==', 'ERvNUP0XJwSUpRoECBuG8A==', '1ykJGGXda6/t8HmoJp2b8g==', 'shgUB8iZguW9SrMl6oB9vg==', 'E6lyXWMHCv4txYnZGSBhCA==', 'i42E5qz2Zv5JZlK1LwLkzg==', 'WX4KH5JmAkqPrGvDWAQlfw==', '1ykJGGXda6/t8HmoJp2b8g==', 'M8KEH+2SX7n98lDrRO88iQ==', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', 'LSDHtLvfG0REW9azylq/ag==', 'cM3sTZZIUI8Kez3S9VDQ7C1Gt/Bd5UEOgy5qgSI+kdc=', '0000-00-00 00:00:00'),
(162, 'AM', 6, 'cbfw52+tMgPOcsiE00uA9mMsh2Abx+SpA0FOTadEqoI=', 'CY20pJG9IlJEyEg9JPcyzg==', 'NJrolG96p1UHc9PvjZPTUA==', '1ykJGGXda6/t8HmoJp2b8g==', '2022-04-18', 'y9Vl/zIoGj+h/BOAugnEnUVAred/eet/WLYo36lUjj0=', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', 'SlH+oHRp+JOP+ApPbAY1eg==', 'Pk4fCo+YtEQQj1UPxK9aDA==', '1ykJGGXda6/t8HmoJp2b8g==', 'shgUB8iZguW9SrMl6oB9vg==', 'MKdG7udfrNrfoESX08ouXw==', '1MRYPE0WKIdO0zpC+6vgpA==', 'WX4KH5JmAkqPrGvDWAQlfw==', '1ykJGGXda6/t8HmoJp2b8g==', 'M8KEH+2SX7n98lDrRO88iQ==', 'I9ET9WJXFV7RfCox6O7n6Q==', '1ykJGGXda6/t8HmoJp2b8g==', 'I9ET9WJXFV7RfCox6O7n6Q==', 'VPanvL4f8lXTIVw3hUnVUybP16tdXZzOphzZM0gs5PNMe2J4tFDlchPfGyLLUBXGwA3h22tyvt+zxUKmqoeprcz+Q76jYTuZc6NWohlNOgVpppfp0oTr1dTYEHzmUiC5BZbXdoNoFFeGh+sVwukmAQ==', '0000-00-00 00:00:00'),
(163, 'AM', 7, 'ZmSKOfg/X6V5QE6IiIuBOb0paxhRX7ip2eJV6YAGHZk=', 'CY20pJG9IlJEyEg9JPcyzg==', 'usTt3kIm2gyMbS1RZcrQdQ==', '1ykJGGXda6/t8HmoJp2b8g==', '2022-04-18', '0zork7JmQmWJmivxJsdrRZ0/WgOy8i+p6XlFeO7b33HN24+VLki0JL8cDm6vBU72', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', 'I1nT1djkugh1MCa72YDOqQ==', 'A4QVTiPdW4RMixa57GA2wOWtayCn9DJRVnUDQuoPewg=', '1ykJGGXda6/t8HmoJp2b8g==', 'shgUB8iZguW9SrMl6oB9vg==', 'E6lyXWMHCv4txYnZGSBhCA==', 'i42E5qz2Zv5JZlK1LwLkzg==', 'WX4KH5JmAkqPrGvDWAQlfw==', '1ykJGGXda6/t8HmoJp2b8g==', 'M8KEH+2SX7n98lDrRO88iQ==', 'LSDHtLvfG0REW9azylq/ag==', '1ykJGGXda6/t8HmoJp2b8g==', 'LSDHtLvfG0REW9azylq/ag==', 'cM3sTZZIUI8Kez3S9VDQ7C1Gt/Bd5UEOgy5qgSI+kdc=', '0000-00-00 00:00:00'),
(164, 'AM', 8, 'RiEdW8W0V/yz6KC8O0KUQTt2vWB6x51xNsV5SECS1pQ=', 'CY20pJG9IlJEyEg9JPcyzg==', 'Yf7sKXNHKDpzjgap2/7yzA==', '1ykJGGXda6/t8HmoJp2b8g==', '2022-04-18', 'JfKFn7ZeRX+oGNmayLUmW/feGbgEKokmIm+K/cZ0Zqs=', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', 'yuY7lnd4v3oK/mkE6yOG7g==', 'sEOKvsMAjH4zlHCbsKAAbjN/QQDK1OLei4coZktFnCU=', '1ykJGGXda6/t8HmoJp2b8g==', 'shgUB8iZguW9SrMl6oB9vg==', 'MKdG7udfrNrfoESX08ouXw==', '1MRYPE0WKIdO0zpC+6vgpA==', 'WX4KH5JmAkqPrGvDWAQlfw==', '1ykJGGXda6/t8HmoJp2b8g==', 'M8KEH+2SX7n98lDrRO88iQ==', 'ZPn9XAQcv14A33Qh6WztXg==', '1ykJGGXda6/t8HmoJp2b8g==', 'ZPn9XAQcv14A33Qh6WztXg==', 'cM3sTZZIUI8Kez3S9VDQ7C1Gt/Bd5UEOgy5qgSI+kdc=', '0000-00-00 00:00:00'),
(165, 'KH1', 167, 'pygfBaQwPENK3pC2BuPVGs9+dZGgf6K8Jqyj1g9Ox+g=', 'CY20pJG9IlJEyEg9JPcyzg==', 'sRjG7fPxGnfPevifvGOzfw==', '1ykJGGXda6/t8HmoJp2b8g==', '2022-04-19', 'urOf9fs1qeTOTlnJDUtAav03IQxSUaAeWRifA8zZzSA=', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', 'gznbqujIbmDgOJD91gqi5w==', 'drMn2COGTPfIjiye4lQdFQ==', '1ykJGGXda6/t8HmoJp2b8g==', 'shgUB8iZguW9SrMl6oB9vg==', 'E6lyXWMHCv4txYnZGSBhCA==', 'i42E5qz2Zv5JZlK1LwLkzg==', 'WX4KH5JmAkqPrGvDWAQlfw==', '1ykJGGXda6/t8HmoJp2b8g==', 'M8KEH+2SX7n98lDrRO88iQ==', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', 'LSDHtLvfG0REW9azylq/ag==', 'cM3sTZZIUI8Kez3S9VDQ7C1Gt/Bd5UEOgy5qgSI+kdc=', '0000-00-00 00:00:00'),
(166, 'KH1', 168, 'Pv9IX8xjkYhyBDovWQUBrwMfjyPIenVPzS89cmy+YW0=', 'CY20pJG9IlJEyEg9JPcyzg==', 'bDV+sQRYovWhNEz0l9I39Q==', '1ykJGGXda6/t8HmoJp2b8g==', '2022-04-19', 'Pk8p9tY/hWH38E0UBO/MH1fTfFjHWLwcNGX6PMJYsjM=', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', 'BZLadnjx7lk6xQ6CBflr4CQYav1h6yXxJunGV3kD6e8=', 'lpyqj+MthnakRTiQiSYGwxzt+sTVahiaDxKy8xFa3aw=', '1ykJGGXda6/t8HmoJp2b8g==', 'shgUB8iZguW9SrMl6oB9vg==', 'MKdG7udfrNrfoESX08ouXw==', '1MRYPE0WKIdO0zpC+6vgpA==', 'WX4KH5JmAkqPrGvDWAQlfw==', '1ykJGGXda6/t8HmoJp2b8g==', 'M8KEH+2SX7n98lDrRO88iQ==', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', 'ZPn9XAQcv14A33Qh6WztXg==', 'shQQhzbZ9T+tWuqSaPO9t5t8XBApPMDnhrPUWh0kAXw=', '0000-00-00 00:00:00'),
(167, 'AM', 19042022, 'X7iyn6O3q72Ct5xtwqozPYpuID1BnvvAGTqMo2+GHYA=', 'CY20pJG9IlJEyEg9JPcyzg==', '2bz4VpNSex0F5je/OZ1AKQ==', '1ykJGGXda6/t8HmoJp2b8g==', '2022-04-19', '6nwb4HM1ZI6aK4Snge74jFUd+R5eYH7ZJsHInp9x3Cw=', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', 'WOqUAOdiZ9CxBCnJ7IwQvwXWTfeSXS/7xWr+ZB2FbCk=', 'WOqUAOdiZ9CxBCnJ7IwQvwXWTfeSXS/7xWr+ZB2FbCk=', '1ykJGGXda6/t8HmoJp2b8g==', 'shgUB8iZguW9SrMl6oB9vg==', '78JO1skb0PK6fTU3+FeNGw==', '1MRYPE0WKIdO0zpC+6vgpA==', 'WX4KH5JmAkqPrGvDWAQlfw==', '1ykJGGXda6/t8HmoJp2b8g==', 'M8KEH+2SX7n98lDrRO88iQ==', 'ePe4vhL55BuLRaWTJvKdrQ==', '1ykJGGXda6/t8HmoJp2b8g==', 'ePe4vhL55BuLRaWTJvKdrQ==', 'cM3sTZZIUI8Kez3S9VDQ7C1Gt/Bd5UEOgy5qgSI+kdc=', '0000-00-00 00:00:00'),
(168, 'KH1', 169, 'AtLfXOP6Mz/z0MZ6PfsACg6NA4zJk+8CBx04J2gbxJo=', 'CY20pJG9IlJEyEg9JPcyzg==', 'zBD0iMrEFAsh1R8MCum+fw==', '1ykJGGXda6/t8HmoJp2b8g==', '2022-04-19', 'AWnjliFzzsCmeSEl++da9Q==', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', 'x+zi0E+J6yrcP4SWx5vIsQ==', '1ykJGGXda6/t8HmoJp2b8g==', 'shgUB8iZguW9SrMl6oB9vg==', 'L2Fs+J657r750sPxgQkv3Q==', 'i42E5qz2Zv5JZlK1LwLkzg==', 'WX4KH5JmAkqPrGvDWAQlfw==', '1ykJGGXda6/t8HmoJp2b8g==', 'M8KEH+2SX7n98lDrRO88iQ==', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', 'EyqtjJrajw65PaOJrgyGdw==', 'QPQ8zhQ8b5HKA4ibrSbelA==', '0000-00-00 00:00:00'),
(169, 'AM', 19042022, 'X7iyn6O3q72Ct5xtwqozPYpuID1BnvvAGTqMo2+GHYA=', 'CY20pJG9IlJEyEg9JPcyzg==', 'LEYqEGuwqUPijHbEfvjWjQ==', '1ykJGGXda6/t8HmoJp2b8g==', '2022-04-20', '6nwb4HM1ZI6aK4Snge74jHsjyxVQ+vD6iPkABIslnBA=', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', 'WOqUAOdiZ9CxBCnJ7IwQvwXWTfeSXS/7xWr+ZB2FbCk=', 'WOqUAOdiZ9CxBCnJ7IwQvwXWTfeSXS/7xWr+ZB2FbCk=', '1ykJGGXda6/t8HmoJp2b8g==', 'shgUB8iZguW9SrMl6oB9vg==', '78JO1skb0PK6fTU3+FeNGw==', '1MRYPE0WKIdO0zpC+6vgpA==', 'WX4KH5JmAkqPrGvDWAQlfw==', 'mExwW2SSI+wiIQ8/VWSQ8Q==', 'M8KEH+2SX7n98lDrRO88iQ==', 'ePe4vhL55BuLRaWTJvKdrQ==', '1ykJGGXda6/t8HmoJp2b8g==', 'ePe4vhL55BuLRaWTJvKdrQ==', 'cM3sTZZIUI8Kez3S9VDQ7C1Gt/Bd5UEOgy5qgSI+kdc=', '0000-00-00 00:00:00'),
(177, 'KH1', 170, 'UWut/VVplS26FCM9wa+B4A==', 'CY20pJG9IlJEyEg9JPcyzg==', 'YNEmUGgrvYDfcXVqEK1/rQ==', '1ykJGGXda6/t8HmoJp2b8g==', '2022-04-20', '7juKD/ld4lTMGQ5UejcM19bf7QAPtFQZyQ4CEBCLtS1gj1bER4k9u1l0y49wbxLB', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', 'l+wFsZ90lAxnURphxuzi3Q==', '3gB8NxzrLhRofQXgW30+eFUy6FltUl+kZNIE0ZDo6Rs=', '1ykJGGXda6/t8HmoJp2b8g==', 'shgUB8iZguW9SrMl6oB9vg==', '78JO1skb0PK6fTU3+FeNGw==', 'i42E5qz2Zv5JZlK1LwLkzg==', 'WX4KH5JmAkqPrGvDWAQlfw==', 'Gl06l6jRW/R92yD61ksDCA==', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', 'IGeNholKiBjUoOdt9Q793w==', 'cM3sTZZIUI8Kez3S9VDQ7C1Gt/Bd5UEOgy5qgSI+kdc=', '0000-00-00 00:00:00'),
(178, 'KH1', 171, '3EUndBnxCHg5O+dxfkz5a+56neW+URN9oO6V1vUqVy0=', 'CY20pJG9IlJEyEg9JPcyzg==', 'gc1oh2WUKyFl0BsTQxdAKA==', '1ykJGGXda6/t8HmoJp2b8g==', '2022-04-20', '1CRQK62NuX9IgC07fB1MKW5nhbmmD0qit2IL2XQXANvywU3fj8DIwUQoc3pu8eSO', 'Lt8z3Bk+cdCTV4HkwFuhrQ==', '1ykJGGXda6/t8HmoJp2b8g==', 't2ScP3sddRIs8bLZWJztQg==', '9l0MZDQBsxY3B0mPYD8f7Q==', '1ykJGGXda6/t8HmoJp2b8g==', 'ACVpVaWoOoKExObiNFoPdQ==', 'E6lyXWMHCv4txYnZGSBhCA==', 'i42E5qz2Zv5JZlK1LwLkzg==', 'WX4KH5JmAkqPrGvDWAQlfw==', '1ykJGGXda6/t8HmoJp2b8g==', 'M8KEH+2SX7n98lDrRO88iQ==', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', 'alO1vYy+OkdINrFkINXlNg==', 'OaNsk2I5EHtaO6a60hXsteWRScuNW6z9A4xq0KyRyqhRGHEkODGM6w9HFjcGoKckv0M+0z7uKwIpRIpzKC7tUA==', '0000-00-00 00:00:00'),
(179, 'KH1', 172, 'plWgdGSQAdiN+68gCYEYOvtM8fVc6u3nl1ecz8d5S34=', 'CY20pJG9IlJEyEg9JPcyzg==', 'Ygout3fjHnmY+GiCkvdr4A==', '1ykJGGXda6/t8HmoJp2b8g==', '2022-04-20', 'W65pLxLAjRzoEVMLKjcAHw/2xwdi/+rIjXlvoZNwLt0=', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', 'G7qkD5db9jPW0ESAXsGxqaExxML2drAqXo2pw4eXFlE=', 'NNXWv8IeH/mck8keC3ztHA==', '1ykJGGXda6/t8HmoJp2b8g==', 'shgUB8iZguW9SrMl6oB9vg==', 'LgrtwG7SS+8FTXxs5QHE+A==', 'i42E5qz2Zv5JZlK1LwLkzg==', 'WX4KH5JmAkqPrGvDWAQlfw==', '1ykJGGXda6/t8HmoJp2b8g==', 'M8KEH+2SX7n98lDrRO88iQ==', '1ykJGGXda6/t8HmoJp2b8g==', '1ykJGGXda6/t8HmoJp2b8g==', 'l09CJnvt6yBvKTOgRdlqnQ==', 'cM3sTZZIUI8Kez3S9VDQ7C1Gt/Bd5UEOgy5qgSI+kdc=', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `login_attempts`
--

INSERT INTO `login_attempts` (`user_id`, `time`) VALUES
(1, '1385995353'),
(1, '1386011064'),
(9, '1650104455'),
(9, '1650107899'),
(9, '1650131633'),
(9, '1650132050'),
(6, '1650216977'),
(7, '1650229348'),
(9, '1650235349'),
(9, '1650405988'),
(9, '1650472938'),
(9, '1650515103');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `username`, `email`, `password`, `salt`) VALUES
(2, 'SF', 'siphax@admin.es', '770cef90c273d6d9d9a2b04a40214ef78ea2889373282c47c3e17e945a9b980d22d2cc2fbc1232b37014e798c53f77144166c5f68d84ddd9308a6aa72105fc75', '6af25dc16efab6ddbdbc0b0dc3a4300d14f04ee074980b8d8c13fd65ce23250ef31671cffad6952ee6a90153bdf8bd7655e7a2c2290fd4d2e8fae2ce2bb826cf'),
(6, 'KH1', 'khadidja1@matelaslux.com', 'd070d86afc8e7a9c093d6cca9c1c7943481e5d5d6cc7d6358706b971771582f0511bd85de108d106d88e41a8cc78ccc8af60db41cece4c3f484e1b6f0bcd79c7', 'aa0547205e38d1084d85b1bd3ba483c03d76090af9fbd2f44e99100c2d8092b3f6c5647ac8de2ae9d3f6616204bc928ce217a5c13ae23a4aa6d89a0f83c60631'),
(7, 'KH2', 'khadidja2@matelaslux.com', '5f02ebddf111cef6a841332d451d370e2787dbb9bacee2e84a5d189adf55a875ae2b9384565791e70c229b46f5aeb58a733899fcc7b3eca13a39ddbebd444e4a', '37327cba626ee7911f86359aed0bb9cd5f99c42e0ea126a1d27a2fbd10d9250ef75b2a6425e87730fcfd10758776bed3b1bf65f979af38da169bddde2109f588'),
(8, 'YOUVA', 'Youvaflash19@gmail.com', '3110c37f76236cb9000c93658c91a54e50105b171bee2e53b8d78a6c809b6b9a65820b3a24b8e6b00f7daaf607ebbe83b281bddfb0a3d66a395e127e0a485531', '43b566acd2bbe21641bcdd1b5faf9053e1765e66c16f5c08c885ce64d213a79ef248d53660f3620e33536c3ff4296ab16364d82397c40f948403571ff3c7191f'),
(9, 'AM', 'omar01031962@gmail.com', '2989c6c0d64e3f1e6d31bba6d09e57bce535adc00db91651863e3058adcd9ce9bd90861bb07a22d752d45c64c898b0fdc4bd2fbfba8b21d39bc58689f51e5e5e', '874eb68f02d10449123772682f0bb009c72d351c33763dbac4e454764c4b8bea6beee7923f3bd15d18d7271dca840579ecac5a4646cd4cc0d93963fdf4fc7ff1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT pour la table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
