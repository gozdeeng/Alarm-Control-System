<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #FDBC00;
            color: white;
        }
    </style>
</head>

<body>


    <table id="customers">
        <tr>
            <th>Kullanıcı Adı</th>
            <th>Sicil No</th>
            <th>Ünvan</th>
            
        </tr>




        <?php
        

        session_start();
        
        
       if (empty($_SESSION["user"]))
            
        {
        header("Location: cikis.php");
    
        }
            
      else
      {
          
         
          echo "<a href='cikis.php'>ÇIKIŞ YAP</a><br><br><br>";
          
      
           include("baglanti2.php");

$sec="Select * From kullanicilar";
$sonuc=$baglan->query($sec);

if($sonuc->num_rows>0){

   while($cek=$sonuc->fetch_assoc()){
       
       echo "<tr>
    <td>".$cek['kullaniciad']."</td>
    <td>".$cek['sicilno']."</td>
    <td>".$cek['unvan']."</td>
   
</tr>";
   } 
    
}

else{
   
    echo "Veritabanında Kayıtlı Hiçbir Veri Bulunamamıştır.";
    
}

        

          
      }
      
            
           

?>


    </table>

</body>

</html>