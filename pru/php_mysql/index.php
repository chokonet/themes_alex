<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>

 	var name = 'jonathan_sss';
 	var rno = 'alex@losma.com';
 	$.ajax({
	 	type: "POST",
	 	url: "ajax.php",
	 	data: {fname:name, id:rno}
	}).done(function( result ) {
	 	console.log(result);
	});

</script>
<?php

	// we've writen this code where we need
	function __autoload($classname) {
	    $filename = "./". $classname .".php";
	    include_once($filename);
	}

	// we've called a class ***
	$obj = new Usuario('alejandro');

	$conexion = new PDO('mysql:host=localhost;dbname=pruebas_db','root','root');


	//crear una tabla
	$create_table = "CREATE TABLE IF NOT EXISTS pb_usuarios (
				ID BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
				user_name VARCHAR(40) NOT NULL DEFAULT '',
				user_mail VARCHAR(40) NOT NULL DEFAULT '',
				PRIMARY KEY (ID),
				KEY user_name (user_name)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

	$conexion->query($create_table);


// EJEMPLOS INSERT INFO MYSQL PDO ///////////////////////////////////////////////////////////////////////


	// $resultados = $conexion->query("INSERT INTO pb_usuarios(user_name, user_mail) VALUES ('alex', 'ale')");

	////////////////////////////////////

	// $name = 'alex';
	// $name2 = 'san';
	// $mail = 'alex@losmaquiladores.com';

	// $qry = $conexion->prepare('INSERT INTO pb_usuarios(user_name, user_mail) VALUES (?, ?)');
	// $qry->execute(array($name, $mail));

	// //////////////////////////////

	// $stmt = $conexion->prepare("INSERT INTO pb_usuarios(user_name,user_mail) VALUES(:field1,:field2)");
	// $stmt->execute(array(':field1' => $name2, ':field2' => $mail));
	// $affected_rows = $stmt->rowCount();

	// //////////////////////////////

	// $values = array('bob', 'alice', 'lisa', 'john');
	// $name = '';
	// $stmt = $conexion->prepare("INSERT INTO pb_usuarios(user_name) VALUES(:name)");
	// $stmt->bindParam(':name', $name, PDO::PARAM_STR);
	// foreach($values as $name) {
	//    $stmt->execute();
	// }


// EJEMPLOS UPDATE INFO MYSQL PDO ///////////////////////////////////////////////////////////////////////

	$user_name = 'pablo';
	$id = '11';
	$stmt = $conexion->prepare("UPDATE pb_usuarios SET user_name=? WHERE ID=?");
	$stmt->execute(array($user_name, $id));
	$affected_rows = $stmt->rowCount();




// EJEMPLOS SELECT INFO MYSQL PDO ///////////////////////////////////////////////////////////////////////


	$resultados = $conexion->query("SELECT * FROM pb_usuarios;");
	$results = $resultados->fetchAll(PDO::FETCH_ASSOC); //trae el arreglo con solo los datos

	echo '<pre>Resultados<hr>';
	foreach($results as $user){

		echo 'Nombre: '.$user['user_name'].'<br/>'.'email: '.$user['user_mail'].'<br/><br/>';
	}


// EJEMPLOS DELETE INFO MYSQL PDO ///////////////////////////////////////////////////////////////////////


 	$count = $conexion->exec("DELETE FROM pb_usuarios WHERE ID = '14'");

	////////////////////////////////

	$id=13;
	$sql = "DELETE FROM pb_usuarios WHERE ID=?";

	$sq = $conexion->prepare($sql);
	$sq->bindParam(1, $id, PDO::PARAM_INT);
	$sq->execute();

