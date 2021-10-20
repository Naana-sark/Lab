
<?php
include("../Login/registerprocess.php");
            if($errors){
                foreach($errors as $error){
                    echo "<script type='text/javascript'> 
                    alert('$error');
                    
                    </script>";
                        }
                    }
       ?>