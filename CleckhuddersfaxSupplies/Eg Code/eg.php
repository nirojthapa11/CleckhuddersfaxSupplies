<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Interface</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="eg.css">
</head>
<body>
<div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Approved Traders</h3>


                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover border text-center" style="min-width: 1000px; width : 100%;">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">S.N</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Shop Name</th>
                                        <th scope="col">Phone no.</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="users-data">
                                    <?php
                                    $query = "SELECT u.USER_ID, u.first_name || ' ' || u.last_name as Name, u.EMAIL, s.shop_name, u.CONTACT_NUMBER, s.location 
                                    FROM \"USER\" u 
                                    inner join trader t on t.user_id = u.user_id 
                                    inner join shop s on s.user_id = t.user_id WHERE t.status=1 
                                    ORDER BY u.USER_ID";

                                    $stid = oci_parse($connection, $query);
                                    oci_execute($stid);

                                    $sn = 1;  // Serial Number counter
                                    while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                                        echo "<tr>\n";
                                        echo "    <td>" . htmlspecialchars($sn++) . "</td>\n";
                                        echo "    <td>" . htmlspecialchars($row['NAME']) . "</td>\n"; // Corrected from FIRST_NAME and LAST_NAME to NAME
                                        echo "    <td>" . htmlspecialchars($row['EMAIL']) . "</td>\n";
                                        echo "    <td>" . htmlspecialchars($row['SHOP_NAME']) . "</td>\n"; // Corrected from USERNAME to SHOP_NAME
                                        echo "    <td>" . htmlspecialchars($row['CONTACT_NUMBER']) . "</td>\n";
                                        echo "    <td>" . htmlspecialchars($row['LOCATION']) . "</td>\n"; // Corrected from ROLE to LOCATION
                                        echo "    <td><a class='btn btn-danger' href='?action=disapprove&id=" . htmlspecialchars($row['USER_ID']) . "' onclick='return confirm(\"Are you sure you want to disapprove this trader?\")'>Disapprove</a></td>\n";

                                        echo "</tr>\n";
                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Pending Traders</h3>


                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover border text-center" style="min-width: 1000px; width : 100%;">
                                <thead>
                                    <tr class="bg-dark text-light">
                                        <th scope="col">S.N</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Shop Name</th>
                                        <th scope="col">Phone no.</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="users-data">
                                    <?php
                                    $query = "SELECT u.USER_ID, u.first_name || ' ' || u.last_name as Name, u.EMAIL, s.shop_name, u.CONTACT_NUMBER, s.location 
                                    FROM \"USER\" u 
                                    inner join trader t on t.user_id = u.user_id 
                                    inner join shop s on s.user_id = t.user_id WHERE t.status=0
                                    ORDER BY u.USER_ID";

                                    $stid = oci_parse($connection, $query);
                                    oci_execute($stid);

                                    $sn = 1;  // Serial Number counter
                                    while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
                                        echo "<tr>\n";
                                        echo "    <td>" . htmlspecialchars($sn++) . "</td>\n";
                                        echo "    <td>" . htmlspecialchars($row['NAME']) . "</td>\n"; // Corrected from FIRST_NAME and LAST_NAME to NAME
                                        echo "    <td>" . htmlspecialchars($row['EMAIL']) . "</td>\n";
                                        echo "    <td>" . htmlspecialchars($row['SHOP_NAME']) . "</td>\n"; // Corrected from USERNAME to SHOP_NAME
                                        echo "    <td>" . htmlspecialchars($row['CONTACT_NUMBER']) . "</td>\n";
                                        echo "    <td>" . htmlspecialchars($row['LOCATION']) . "</td>\n"; // Corrected from ROLE to LOCATION
                                        echo "    <td><a class='btn btn-success' href='?action=approve&id=" . htmlspecialchars($row['USER_ID']) . "' onclick='return confirm(\"Are you sure you want to approve this trader?\")'>Approve</a></td>\n";

                                        echo "</tr>\n";
                                    }

                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
