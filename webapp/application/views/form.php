<h2>Entry Form</h2>
        <div class="divider"></div>
        <br/>
       
<?php
if (isset($data))
{
	
}
else {
	$data=0;
}

echo form_open();
echo "<table>";
echo "<tr colspan=2 class='error'>";
echo "<td>";
echo validation_errors();
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td>";
echo "ID:";
echo "</td>";
echo "<td>";
echo form_input('id', set_value('id', $data['id']));
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Name:";
echo "</td>";
echo "<td>";
echo form_input('name', set_value('name', $data['name']));
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Address:";
echo "</td>";
echo "<td>";
echo form_input('address', set_value('address', $data['address']));
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Phone:";
echo "</td>";
echo "<td>";
echo form_input('phone',set_value('phone', $data['phone']));
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";
echo "Email:";
echo "</td>";
echo "<td>";
echo form_input('email', set_value('email',$data['email']));
echo "</td>";
echo "</tr>";

echo "<tr>";
echo "<td>";

echo "</td>";
echo "<td>";
echo form_submit('submit','save');
echo "</td>";

echo "</tr>";

echo "</table>";
?>