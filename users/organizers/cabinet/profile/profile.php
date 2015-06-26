<?php
include_once ('./system/bd.php');

$result = mysql_query("SELECT * FROM Organizers WHERE OrganizerID='1'");
$array = mysql_fetch_array($result);
?>
<profile role="org">
	<table>
	<form action="verification.php" method="POST">
	<tr>
	<td>Название организации:</td>
	<td><input name="OrganizerName" size="20" type="text" required value="<?php echo $array['OrganizerName']?>" /></td>
	</tr>
	<tr>
	<td>Фамилия:</td>
	<td><input name="LastName" size="20" type="text" required value="<?php echo $array['LastName']?>" /></td>
	</tr>
	<tr>
	<td>Имя:</td>
	<td><input name="FirstName" size="20" type="text" required value="<?php echo $array['FirstName']?>" /></td>
	</tr>
	<tr>
	<td>Отчество:</td>
	<td><input name="MiddleName" size="20" type="text" required value="<?php echo $array['MiddleName']?>" /></td>
	</tr>
	<tr>
	<td>Дата рождения:</td>
	<td><input name="DoB" size="20" type="date" required value="<?php echo $array['DoB']?>" /></td>
	</tr>
    <tr>
	<td>Пол:</td>
	<td> <!-- value="< ?php echo $array['Gender']?>" -->
		<input type="radio" name="Gender" id="Male" checked/>
		<label for="Male">Мужской</label>
		<input type="radio" name="Gender" id="Female" />
	    <label for="Female">Женский</label>
    </td>
	</tr>
	<tr>
	<td>E-mail:</td>
	<td><input name="Email" size="20" type="email" required value="<?php echo $array['Email']?>" /></td>
	</tr>
	<tr>
	<td>Телефон:</td>
	<td><input name="MobilePhone" size="20" type="tel" required value="<?php echo $array['MobilePhone']?>" /></td>
	</tr>
	<td>Соц. сети:</td>
	<td><input name="Social" size="20" type="url" value="<?php echo $array['Social']?>" /></td>
	</tr>
	<tr>
	<td>Пароль:</td>
	<td><input maxlength="20" name="Password" size="20" type="password"/></td>
	</tr>
	<tr>
	<td>Подтверждения пароля:</td>
	<td><input maxlength="20" name="Password2" size="20" type="password"/></td>
	</tr>
      <tr>
       <td></td>
      <td colspan="2"><input class="plain button red" type="submit" value="Сохранить" name="saveorganizer" ></td>
      </tr>
     <br>
      </form>
      </table>
</profile>

