<script src="script.js"></script>

<?php 
    $sql = "SELECT * from parking_space";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    do
    {
?>
    <table>
                <form action="CONFIRMATION.php" method="post">
                <tr>
                    <td>
                        <?php echo $row['location']?>
                    </td>
                    <td>
                        <?php 
                            if($row['status'] == "BOOKED")
                            {
                                echo "<button class='status-booked' id = 'booked' onclick='showmodal()' style = 'background-color: red'> BOOKED </button>"; 
                            }
                            else 
                            {
                                echo "<button class='status-available' id = 'available' style = 'background-color: green'> AVAILABLE </button>"; 

                            }
                        ?>
                    </td>
                </tr>   
                </form>
            </table>
            <?php 
                }while($row = mysqli_fetch_assoc($result));
            ?>