

<?php

include "baglanti.php";


if (isset($_POST['ip_no'])) {
    $ip_no = $_POST['ip_no'];

 
    $sql = "SELECT * FROM alarmkayit WHERE alarmip = ?";
    $stmt = $baglan->prepare($sql);
    $stmt->bind_param("s", $ip_no);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
       
        while ($row = $result->fetch_assoc()) {
           
            echo "IP: " . htmlspecialchars($row['alarmip']) . "<br>";
            echo "Kullanıcı Adı: " . htmlspecialchars($row['kullaniciad']) . "<br>";
            echo "Alarm Kodu: " . htmlspecialchars($row['alarmkod']) . "<br>";
            echo "Açıklama: " . htmlspecialchars($row['aciklama']) . "<br>";
           
        }
    } else {
        echo "Veri bulunamadı.";
    }
}
?>

<body style=" background: url(resimler/alarm.jpg);
    background-size: cover;">
    
    <div style=" background: rgba(255,255,255,0.2);  padding: 50px 20px;
    border-radius: 50px;
    margin-bottom: 50px;
    height: 550px;" >
    
<form method="post" action="" style="text-align: center;
    margin-top: 100px; ">
    <h2 style="font-size: 30px; color: white">IP No:</h2>
     <input type="text" name="ip_no" style="padding: 15px 20px;">
    <input type="submit" value="Sorgula" style="border 2px solid white; padding: 15px 20px; ">
</form>
        
     </div> 
</body>