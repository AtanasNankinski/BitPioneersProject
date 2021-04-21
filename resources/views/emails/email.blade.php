<!DOCTYPE html>
<html>
<head>
	<title>Email</title>
</head>
<body>
<h1>You created booking</h1>
<p>Email: {{ $userEmail }}</p>
<p>Name: {{ $firstName }} {{ $lastName }}</p>
<p>Birthdate: {{ $birthdate }}</p>
<br>
<p>You created booking for this period:</p>
<p>{{ $startDate }} - {{ $endDate }}</p>
</body>
</html>