<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Formulaire de contact</title>
</head>
<style>
	 p{font-size:16px;font-family: cursive;}
	 h1{font-family: cursive;color:#E9A6A6 ;}
</style>
<body>
<h1>Message de contact </h1>
<p >Name:{{$details['name']}}</p>
<p>Email:{{$details['email']}}</p>
<p>Subject:{{$details['subject']}}</p>
<p>Message:{{$details['message']}}</p>


</body>
</html>