<?php
include_once $_SERVER['DOCUMENT_ROOT']."/cpvdvfu/system/bd.php";

$result = mysql_query("SELECT * FROM Volunteers WHERE VolunteerID='1'");
$array = mysql_fetch_array($result);
?>
<profile role="coord">
	<table>
	<form action="verification.php" method="POST">
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
	<td>
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
	<tr> 	
	<td>Адрес проживания:</td>
	<td><textarea rows="4" cols="10" name="Place" required value="<?php echo $array['Place']?>" ></textarea></td>
	</tr>
	<tr>
	<td>Учебное заведение:</td>
	<td><textarea rows="4" cols="10" name="Stud" required value="<?php echo $array['Stud']?>" ></textarea></td>
	</tr>
	<td>Соц. сети:</td>
	<td><input name="Social" size="20" type="url" value="<?php echo $array['Social']?>" /></td>
	</tr>
	<tr>
	<td>Размер одежды:</td>
	<td><select name="Size"> <!-- <input name="Size" size="20" type="text" /> -->
		<option value="XXS">XXS</option>
		<option value="XS">XS</option>
		<option value="S">S</option>
		<option value="M">M</option>
		<option value="L">L</option>
		<option value="XL">XL</option>
		<option value="XXL">XXL</option>
		<option value="XXXL">XXXL</option>
	</select></td>
	<tr>
	<td>Рост:</td>
	<td><input name="Growth" size="20" type="number" required value="<?php echo $array['Growth']?>" /></td>
	</tr>
	<tr>
	<td>Языки:</td>
	<td><textarea rows="4" cols="10" name="Languages" value="<?php echo $array['Languages']?>" ></textarea></td>
	</tr>
	<tr>
	<td>Пароль<span style="color: red;">*</span>:</td>
	<td><input maxlength="20" name="Password" size="20" type="password" required /></td>
	</tr>
	<tr>
	<td>Подтверждения пароля<span style="color: red;">*</span>:</td>
	<td><input maxlength="20" name="Password2" size="20" type="password" required /></td>
	</tr>
      <tr>
       <td></td>
      <td colspan="2"><input class="plain button red" type="submit" value="Сохранить" name="savecoordinator" ></td>
      </tr>
     <br>
      </form>
      </table>
</profile>