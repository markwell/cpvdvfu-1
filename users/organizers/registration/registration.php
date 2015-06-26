<registration role="org">
	<font face="Verdana" size="4">Анкета организатора</font>
	<table>
	<form action="verification.php" method="POST">
	<tr>
	<td>Название организации:</td>
	<td><input name="OrganizerName" size="20" type="text" required /></td>
	</tr>
	<tr>
	<td>Фамилия<span style="color: red;">*</span>:</td>
	<td><input name="LastName" size="20" type="text" required /></td>
	</tr>
	<tr>
	<td>Имя<span style="color: red;">*</span>:</td>
	<td><input name="FirstName" size="20" type="text" required /></td>
	</tr>
	<tr>
	<td>Отчество<span style="color: red;">*</span>:</td>
	<td><input name="MiddleName" size="20" type="text" required /></td>
	</tr>
	<tr>
	<td>Дата рождения<span style="color: red;">*</span>:</td>
	<td><input name="DoB" size="20" type="date" required /></td>
	</tr>
    <tr>
	<td>Пол<span style="color: red;">*</span>:</td>
	<td>
		<input type="radio" name="Gender" id="Male" checked/>
		<label for="Male">Мужской</label>
		<input type="radio" name="Gender" id="Female" />
	    <label for="Female">Женский</label>
    </td>
	</tr>
	<tr>
	<td>E-mail<span style="color: red;">*</span>:</td>
	<td><input name="Email" size="20" type="email" required /></td>
	</tr>
	<tr>
	<td>Телефон<span style="color: red;">*</span>:</td>
	<td><input name="MobilePhone" size="20" type="tel" required /></td>
	</tr>
	<td>Соц. сети:</td>
	<td><input name="Social" size="20" type="url" /></td>
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
      <td colspan="2"><input class="plain button red" type="submit" value="Зарегистроваться" name="submitorganizer" ></td>
      </tr>
     <br>
      </form>
      </table>
	<font face="Verdana" size="4">Поля со значком <font color="red">*</font> должны быть обязательно заполнены!</font>
</registration>