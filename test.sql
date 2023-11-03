CREATE database test;
use 'test';
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla rol
--

CREATE TABLE rol (
  id int(11) NOT NULL,
  descripcion varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla rol
--

INSERT INTO rol (id, descripcion) VALUES
(1, 'administrador'),
(2, 'estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla usuarios
--

CREATE TABLE usuarios (
  id int(11) NOT NULL,
  nombre varchar(500) NOT NULL,
  usuario varchar(500) NOT NULL,
  pass varchar(500) NOT NULL,
  id_rol int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla usuarios
--

INSERT INTO usuarios (id, nombre, usuario, pass, id_rol) VALUES
(1, 'luis', '30420251', '12345', 1),
(2, 'david', '10987654', '123456', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla rol
--
ALTER TABLE rol
  ADD PRIMARY KEY (id);

--
-- Indices de la tabla usuarios
--
ALTER TABLE usuarios
  ADD PRIMARY KEY (id),
  ADD KEY id_rol (id_rol);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla rol
--
ALTER TABLE rol
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla usuarios
--
ALTER TABLE usuarios
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla usuarios
--
ALTER TABLE usuarios
  ADD CONSTRAINT usuarios_ibfk_1 FOREIGN KEY (id_rol) REFERENCES rol (id) ON DELETE CASCADE ON UPDATE CASCADE;
