<?php

class RepositorioUsuario {
	
	public static function obtenerTodos($conexion) {
		
		$usuarios = array();
		
		if (isset($conexion)) {
			
			try {
				
				include_once 'Usuario.inc.php';
				
				$sql = "SELECT * FROM usuarios";
				
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				
				$resultado = $sentencia -> fetchAll();
				
				if (count($resultado)) {
					foreach ($resultado as $fila) {
						$usuarios[] = new Usuario(
							$fila['id'], $fila['nombre'], $fila['email'], $fila['password'], $fila['foto'], $fila['fecha_registro'], $fila['activo']
						);
					}
				}	else {
						print "No hay usuarios";
					}
				
			} catch (PDOException $ex) {
				print "ERROR" . $ex -> getMessage();
			}
			
		}
		
		return $usuarios;
	}
	
	public static function obtenerNumeroUsuarios($conexion) {
		
		$totalUsuarios = null;
		if (isset($conexion)) {
			try	{
				$sql = "SELECT COUNT(*) as total FROM usuarios";
				
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetch();
				
				$totalUsuarios = $resultado['total'];
			} catch (PDOException $ex) {
				print "ERROR" . $ex -> getMessage();
			}
		}
		
		return $totalUsuarios;
		
	}
	
	public static function insertarUsuario($conexion, $usuario) {
		$usuarioInsertado = false;
		
		if (isset($conexion)) {
			try {
				$sql = "INSERT INTO usuarios(nombre, email, password, foto, fecha_registro, activo) VALUES(:nombre, :email, :password, :foto, NOW(), 0)";
				
				$nombreTemp = $usuario -> obtenerNombre();
				$emailTemp = $usuario -> obtenerEmail();
				$passwordTemp = $usuario -> obtenerPassword();
				$fotoTemp = $usuario -> obtenerFoto();
				
				$sentencia = $conexion -> prepare($sql);
				
				$sentencia -> bindParam(':nombre', $nombreTemp, PDO::PARAM_STR);
				$sentencia -> bindParam(':email', $emailTemp, PDO::PARAM_STR);
				$sentencia -> bindParam(':password', $passwordTemp, PDO::PARAM_STR);
				$sentencia -> bindParam(':foto', $fotoTemp, PDO::PARAM_STR);
				
				$usuarioInsertado = $sentencia -> execute();
				
			} catch (PDOException $ex) {
				print 'ERROR' . $ex->getMessage();
			}
		}
		
		return $usuarioInsertado;
	}
	
	public static function nombreExiste($conexion, $nombre) {
		$nombreExiste = True;
		if (isset($conexion)) {
			try {
				$sql = "SELECT * FROM usuarios WHERE nombre = :nombre";
				
				$sentencia = $conexion -> prepare($sql);
				
				$sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
				
				$sentencia -> execute();
				
				$resultado = $sentencia -> fetchAll();
				
				if (count($resultado)) {
					$nombreExiste = true;
				} else {
					$nombreExiste = false;
				}
			} catch (PDOException $ex) {
				print 'ERROR' . $ex -> getMessage();
			}
		}
		
		return $nombreExiste;
	}
	
	public static function emailExiste($conexion, $email) {
		$emailExiste = True;
		if (isset($conexion)) {
			try {
				$sql = "SELECT * FROM usuarios WHERE email = :email";
				
				$sentencia = $conexion -> prepare($sql);
				
				$sentencia -> bindParam(':email', $email, PDO::PARAM_STR);
				
				$sentencia -> execute();
				
				$resultado = $sentencia -> fetchAll();
				
				if (count($resultado)) {
					$emailExiste = true;
				} else {
					$emailExiste = false;
				}
			} catch (PDOException $ex) {
				print 'ERROR' . $ex -> getMessage();
			}
		}
		
		return $emailExiste;
	}

	public static function obtenerUsuarioXEmail($conexion, $email) {
		$usuario = null;

		if (isset($conexion)) {
			try {
				include_once 'Usuario.inc.php';

				$sql = "SELECT * FROM usuarios WHERE email = :email";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':email', $email, PDO::PARAM_STR);

				$sentencia -> execute();

				$resultado = $sentencia -> fetch();

				if (!empty($resultado)) {
					$usuario = new Usuario($resultado['id'], $resultado['nombre'], $resultado['email'], $resultado['password'], $resultado['foto'], $resultado['fecha_registro'], $resultado['activo']);
				}
				
			} catch (PDOException $ex) {
				print 'ERROR' . $ex -> getMessage();
			}
		}

		return $usuario;
	}
	
}