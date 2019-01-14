<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 10/01/2019
 * Time: 09:38
 */

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jointure";
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
else{
    $conn->select_db($dbname);
}


    $sql = "SELECT * from eleves_infos,eleves where eleves_infos.eleves_id = eleves.id";
    $result = $conn->query($sql);

    while ($row = $result->fetch_assoc()) {
        echo "id =" . $row['id'] . " prenom =" . $row['prenom'] . " mdp =" . $row['password']." ville =" . $row['ville']." avatar =". $row['avatar'] . '<br>'.'<br>';

    }

    echo "<br>"."<br>";


$sql = "SELECT * from eleves_competences,eleves,competences where eleves_competences.eleves_id = eleves.id and eleves_competences.competences_id=competences.id";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "id =" . $row['id'] . " titre =" . $row['titre'] . " description =" . $row['description']." niveau =" . $row['niveau']." niveau_ae =". $row['niveau_ae'] . '<br>'.'<br>';

}

echo "<br>"."<br>";
?>

<html>
<head>
    <script src= "https://cdn.zingchart.com/zingchart.min.js"></script>
    <script> zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9","ee6b7db5b51705a13dc2339db3edaf6d"];</script></head>
<body>
<div id='myChart'><a class="zc-ref" href="https://www.zingchart.com/">Powered by ZingChart</a></div>

<style>
    body {
        height:100%;
        width:100%;
    }
    #myChart {
        height:100%;
        width:100%;
        min-height:250px;
    }
    .zc-ref {
        display:none;
    }
</style>


<script>


    var myConfig = {
        type : 'radar',
        plot : {
            aspect : 'area',
            animation: {
                effect:3,
                sequence:1,
                speed:700
            }
        },
        scaleV : {
            visible : false
        },
        scaleK : {
            values : '0:5:1',
            labels : ['Dogs','Cats','Fish','Birds', 'Reptiles', 'Horses' ],
            item : {
                fontColor : '#607D8B',
                backgroundColor : "white",
                borderColor : "#aeaeae",
                borderWidth : 1,
                padding : '5 10',
                borderRadius : 10
            },
            refLine : {
                lineColor : '#c10000'
            },
            tick : {
                lineColor : '#59869c',
                lineWidth : 2,
                lineStyle : 'dotted',
                size : 20
            },
            guide : {
                lineColor : "#607D8B",
                lineStyle : 'solid',
                alpha : 0.3,
                backgroundColor : "#c5c5c5 #718eb4"
            }
        },
        series : [
            {
                values : [59, 39, 38, 19, 21, 35],
                text:'farm'
            },
            {
                values : [20, 20, 54, 41, 41, 35],
                lineColor : '#53a534',
                backgroundColor : '#689F38'
            }
        ]
    };

    zingchart.render({
        id : 'myChart',
        data : myConfig,
        height: '100%',
        width: '100%'
    });


</script>
</body>
</html>



