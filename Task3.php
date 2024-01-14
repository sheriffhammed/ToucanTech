<html>

<head>
    <title>Toucan Tech :: Task3</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor' crossorigin='anonymous'>
</head>

<body>
    <div class='container mt-4'>
        <div class='row'>
            <div class="card">
                <div class="card-header">
                    <h3 class='col-md-12 text-center border border-dark text-white bg-primary'>Toucan Tech :: Task3</h3>
                </div>
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>Message Displayed</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                for ($i = 1; $i <= 100; $i++)
                                {
                                    
                                    if(($i % 3 == 0) && ($i % 5 == 0 ))
                                    {
                                        echo "<tr>";
                                        echo "<td>" , $i , "</td>";
                                        echo "<td>Toucan Tech </h6>";
                                        echo "</tr>";
                                    }
                                    else if(($i % 3 == 0) && ($i % 5 != 0 ))
                                    {
                                        echo "<tr>";
                                        echo "<td>" , $i , "</td>";
                                        echo "<td>Toucan </h6>";
                                        echo "</tr>";
                                        
                                    }
                                    else if(($i % 5 == 0) && ($i % 3 != 0 ))
                                    {
                                        echo "<tr>";
                                        echo "<td>" , $i , "</td>";
                                        echo "<td>Tech </h6>";
                                        echo "</tr>";
                                    }
                                    else{
                                        echo "<tr>";
                                        echo "<td>" , $i , "</td>";
                                        echo "<td>Not divisible by 3 and 5 </h6>";
                                        echo "</tr>";
                                    }                      

                            } 
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</body>
</html>