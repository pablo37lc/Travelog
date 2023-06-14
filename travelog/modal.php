            <?php
                $con = mysqli_connect("localhost", "root", "qwer", "travelog");
                mysqli_query($con,'SET NAMES utf8');	
                
   
            
                $userid = $_POST[ 'userid' ];
                $query = "SELECT * FROM member WHERE id LIKE '%".$userid."%'"; 
                $result = $con->query($query);
                while($row = $result->fetch_assoc())
                {
                echo"
                <a href='create_chatroom.php?usrId=".$row["id"]."'>
                    <div>
                        <ul>
                            <li class='lim'>   
                            <img src= ".$row['image'].">
                            <div class='profilem'>
                                <p>".$row['id']."</p>                                
                                <p>".$row['memo']."</p>
                            </div>
                            </li>
                        </ul>
                    </div>
                </a>";            
                }
                ?>