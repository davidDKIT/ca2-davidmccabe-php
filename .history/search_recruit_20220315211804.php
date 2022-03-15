<?php
                    if (isset($_POST['submit'])) {
                        $searchValue = $_POST['search'];
                        $con = new mysqli("localhost", "root", "", "ukraine_signup");
                        if ($con->connect_error) {
                            echo "connection Failed: " . $con->connect_error;
                        } else {
                            $sql = "SELECT * FROM records WHERE price LIKE '%$searchValue%'";

                            $result = $con->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                echo "The product name: " . $row['name'] . '<br>' . "The price: " . $row['price'] . '<br>' . '<br>';
                            }
                        }
                    }
