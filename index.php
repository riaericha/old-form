<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include 'function.php';
        $stuffs = [];
    ?>
    <style>
        table, td, tr, th {
            border: 1px solid black;
            border-collapse: collapse;
        }

        input, td, th, select {
            padding: 5px;
            margin: 5px;
        }

        .red {
            background-color: red;
        }
        .yellow {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <section>
        <form action="" method="post">
            <label for="id">Stuff ID</label>
            <input type="number" name="id" id="id" required>
            <label for="name">Last Name</label>
            <input type="text" name="lname" id="lname" required>
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" required>
            <label for="MI">Middle initial</label>
            <input type="text" name="MI" id="MI" required>
            <select name="department" id="department">
                <option value="" selected disabled>Select department</option>
                <option value="Information Technology" required>IT Department</option>
                <option value="Computer Science" required>CS Department</option>
                <option value="Computer Technology" required>ACT Department</option>
            </select><br>
            <label for="numberOfHours">No. of Hours</label>
            <input type="number" id="numberOfHours" name="numberOfHours">
            <label for="loan">Loan</label>
            <input type="number" name="loan" id="loan">
            <button type="submit">Add</button>
        </form>
    </section>

    <section>
    <?php
        session_start();
        if (!isset($_SESSION['stuffs'])) {
            $_SESSION['stuffs'] = [];
        }

        if (isset($_POST['id'])) {
            $newStuff = [
                "id" => $_POST['id'],
                "lname" => $_POST['lname'],
                "iddept" => $_POST['department'],
                "fname" => $_POST['fname'],
                "MI" => $_POST['MI'],
                "numberOfHours" => $_POST['numberOfHours'],
                "loan" => $_POST['loan']
            ];
            
            $_SESSION['stuffs'][] = $newStuff;

            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        }

        $stuffs = $_SESSION['stuffs'];
    ?>
        <table>
            <tr>
                <th>STUFF ID</th>
                <th>Name</th>
                <th>Department</th>
                <th>Loan</th>
                <th>Deduction</th>
                <th>No. of Hours</th>
                <th>Salary</th>
                <th>Net</th>
            </tr>
            <?php foreach($stuffs as $stuffs): extract($stuffs); ?>
                <tr class=<?php echo $numberOfHours >= 120 ? "yellow" : ""; echo $numberOfHours <= 50 ? " red" : ""; ?>>
                    <td><?php echo $id?></td>
                    <td><?php echo $lname . ", " . $fname . " " .$MI?></td>
                    <td><?php echo $iddept?></td>
                    <td><?php echo $loan?></td>
                    <td><?php echo getDeduction($loan);?></td>
                    <td><?php echo $numberOfHours?></td>
                    <td><?php echo getSalary($numberOfHours);?></td>
                    <td><?php echo getNet($numberOfHours, $loan);?></td>
                </tr>
            <?php endforeach;?>
        </table>
        
    
    </section>

</body>
</html>          