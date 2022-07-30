<!DOCTYPE html>
<html>

<head>
    <title>
        COMP353 Final Project
    </title>
</head>

<body>
    <h1>Welcome to C19PPS System</h1>
    <p>By Jason Forte, Aydin Azari Farhad, Ryan Feher, and Deniz Dinchdonmez</p>
    <table class="table table-striped">
        <tr>
            <th>Branch ID</th>
            <th>Brnach Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Postal Code</th>
            <th>Province</th>
            <th>Phone</th>
            <th>Country</th>
        </tr>
        <?php
        foreach ($data['branches'] as $branch) {
            echo "<tr><td>$branch->bID</td>";
            echo "<td>$branch->bName</td>";
            echo "<td>$branch->address</td>";
            echo "<td>$branch->city</td>";
            echo "<td>$branch->postalCode</td>";
            echo "<td>$branch->province</td>";
            echo "<td>$branch->phone</td>";
            echo "<td>$branch->country</td>";
            echo "<td><a href='/Branches/delete/$branch->bID'>DELETE!!!!!</a></td></tr>";
        }
        ?>
    </table>
</body>

</html>