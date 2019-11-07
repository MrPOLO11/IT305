<?php

/**
 * reads students from a database
 */

    //Turn on error reporting -- this is critical
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    require('/home2/marcosri/connect.php');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/guestbook.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <title>Students</title>

</head>
<body>
<div class="container">
    <h3>Student Summary</h3>
    <table id="student-table" class="display">
        <thead>
            <tr>
                <th>SID</th>
                <th>Student Name</th>
                <th>Advisor Name</th>
            </tr>
        </thead>
        <tbody>
        <?php
        //Query the database
        $sql = 'SELECT s.sid, s.first, s.last, a.advisor_first, a.advisor_last
            FROM student s, advisor a
            WHERE s.advisor = a.advisor_id
            ORDER BY s.last, s.first';

        //Send the query to the database
        $result = mysqli_query($cnxn, $sql);
        //var_dump($result);
        //Print the results
        while($row = mysqli_fetch_assoc($result)) {
            $sid = $row['sid'];
            $sFirst = $row['first'];
            $sLast = $row['last'];
            $aFirst = $row['advisor_first'];
            $aLast = $row['advisor_last'];

            echo "<tr>
                    <td>$sid</td>
                    <td>$sLast, $sFirst</td>
                    <td>$aLast, $aFirst</td>
                   </tr>";
        }
        ?>
        </tbody>
    </table>
    <a href="new-student.html">Add a new student</a>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $('#student-table').DataTable();
</script>

</body>
</html>