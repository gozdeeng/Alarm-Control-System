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
            <th>Alarm Kodu</th>
            <th>Alarm IP Numarası</th>
            <th>Tarih-Saat</th>
            <th>Açıklama</th>
        </tr>




        <?php
        

        session_start();
        
        
       if (empty($_SESSION["user"]))
            
        {
        header("Location: cikis.php");
    
        }
            
      else
      {
          
          echo "Sicil No :".$_SESSION['user']."<br>";
          echo "<a href='cikis.php'>ÇIKIŞ YAP</a><br><br><br>";
          
      
           include("baglanti.php");

$sec="Select * From alarmkayit";
$sonuc=$baglan->query($sec);

if($sonuc->num_rows>0){

   while($cek=$sonuc->fetch_assoc()){
       
       echo "<tr>
    <td>".$cek['kullaniciad']."</td>
    <td>".$cek['alarmkod']."</td>
    <td>".$cek['alarmip']."</td>
    <td>".$cek['tarihsaat']."</td>
    <td>".$cek['aciklama']."</td>
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