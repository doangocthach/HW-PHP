<?php

require("../mysqli_connect.php");
$select = "select * from thachusers";
$result = mysqli_query($conn, $select);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td><a href='Edit.php?id= " . $row["userid"] . "'>Edit</a></td>
            <td><a  href='Delete.php?id= " . $row["userid"] . "'>Delete</a></td>
            <td>" . $row["first_name"] . "</td>
            <td>" . $row["last_name"] . "</td>
            <td>" . $row["email"] . "</td>
            <td>" . $row["registration_date"] . "</td>
            </tr>";
    }
}
