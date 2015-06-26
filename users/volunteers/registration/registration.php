<registration role="vol">
	<font face="Verdana" size="4">Анкета волонтёра</font>
	<table>
	<form action="verification.php" method="POST">
	<tr>
	<td>Фамилия<span style="color: red;">*</span>:</td>
	<td><input name="LastName" size="20" type="text"/></td>
	</tr>
	<tr>
	<td>Имя<span style="color: red;">*</span>:</td>
	<td><input name="FirstName" size="20" type="text"  /></td>
	</tr>
	<tr>
	<td>Отчество<span style="color: red;">*</span>:</td>
	<td><input name="MiddleName" size="20" type="text" /></td>
	</tr>
	<tr>
	<td>Дата рождения<span style="color: red;">*</span>:</td>
	<td><input name="DoB" size="20" type="date" /></td>
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
	<td><input name="Email" size="20" type="email" /></td>
	</tr>
	<tr>
	<td>Телефон<span style="color: red;">*</span>:</td>
	<td><input name="MobilePhone" size="20" type="tel" /></td>
	</tr>
	<tr> 	
	<td>Адрес проживания<span style="color: red;">*</span>:</td>
	<td><textarea rows="4" cols="10" name="Place" ></textarea></td>
	</tr>
	<tr>
	<td>Учебное заведение<span style="color: red;">*</span>:</td>
	<td><textarea rows="4" cols="10" name="Stud" ></textarea></td>
	</tr>
	<td>Соц. сети:</td>
	<td><input name="Social" size="20" type="url" /></td>
	</tr>
	<tr>
	<td>Размер одежды<span style="color: red;">*</span>:</td>
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
	<td>Рост<span style="color: red;">*</span>:</td>
	<td><input name="Growth" size="20" type="number" /></td>
	</tr>
	<tr>
	<td>Языки:</td>
	<td><textarea rows="4" cols="10" name="Languages" ></textarea></td>
	</tr>
	<tr>
	<td>Пароль<span style="color: red;">*</span>:</td>
	<td><input maxlength="20" name="Password" size="20" type="password" /></td>
	</tr>
	<tr>
	<td>Подтверждения пароля<span style="color: red;">*</span>:</td>
	<td><input maxlength="20" name="Password2" size="20" type="password" /></td>
	</tr>
      <tr>
       <td></td>
      <td colspan="2"><input class="plain button red" type="submit" value="Зарегистроваться" name="submitvolunteer" ></td>
      </tr>
     <br>
      </form>
      </table>
	<font face="Verdana" size="4">Поля со значком <font color="red">*</font> должны быть обязательно заполнены!</font>
</registration>