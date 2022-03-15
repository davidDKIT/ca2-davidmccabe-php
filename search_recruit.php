<?php
                    if (isset($_POST['submit'])) {
                        $searchValue = $_POST['search'];
                        $con = new mysqli("localhost", "root", "", "ukraine_signup");
                        if ($con->connect_error) {
                            echo "connection Failed: " . $con->connect_error;
                        } else {
                            $sql = "SELECT * FROM recruits WHERE recruitName LIKE '%$searchValue%'";

                            $result = $con->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "Recruit found in database: " . $row['recruitName'] . '<br>' . "Their job associated: " . $row['job'] . '<br>' . '<br>';
                            }
                        }
                    }
?>