<h1>Welcome to My Diary</h1>
<form action='http://localhost/cakephp/' method='post'>
	Mail address<br>
	<input type='text' name='userid' placeholder='123@gmail.com'>
	password<br>
	<input type='password' name='pwd' placeholder='mm'>
	<input type='submit' value='login'>
</form>

<form action="users/register" method="post">
	<fieldset>
		<legend>Register</legend>
		<label for="mail">mail address</label>
		<input type='text' id="mail" name='mail' placeholder='123@gmail.com'>
		<label for="password">password</label>
		<input type='password' name='password'>
		<label for="password">confirm password</label>
		<input type='password' name='rePassword'>
		<input type="submit" value="OK!">
	</fieldset>
</form>