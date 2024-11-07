<?php
    $qrcontent = true;
    include("../navbar.php");

    $name = "";
    $profpic = "";
    $user_profpic="";
    $i_category = "";
    $date_time = "";
    $img_tips = "";
    $content = "";


    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $user_id = $_SESSION['user_id'];

        $result = $conn -> query("select * from tbl_users where fld_username like '$username'");
        while($row = $result->fetch_assoc()){
            if($row["fld_name"] == ""){
                $name = "";
            }else{
                $name = $row["fld_name"];
                $user_profpic = '../img_profile/'.$row["fld_profpic"];
            }
            
            
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="qrstyle.css">
    <title>White House</title>
</head>
<body>
    <!--header-->
    <?php include_once("../header.php"); ?>

    
    <div class="image-container">
        <div class="overlay_image">
            <div class="center_container">
                <div class="row">
                    <div class="col-lg-6 title_col">
                    <h1 id="centertitle">White House San Juan</h1>
                    </div>
                    <div class="col-lg-6 title_col">
                  
                    <h3 class="centersubtitle">
                        <table id="title_tbl">
                            <tr>
                                <td style="padding-right: 30px;"><i class="bi bi-geo-alt-fill"></i></td>
                                <td>Along Marasigan St. Corner Kalayaan St. Poblacion, San Juan Batangas</td>
                            </tr>
                            <tr>
                                <td style="padding-right: 30px;"><i class="bi bi-facebook"></i></td>
                                <td><a href="https://www.facebook.com/profile.php?id=100080632533666" target="_blank">WhiteHouse San Juan</a></td>
                            </tr>
                            <tr>
                                <td style="padding-right: 30px;"><i class="bi bi-instagram"></i></td>
                                <td><a href="https://www.instagram.com/whitehousesanjuan/" target="_blank">whitehousesanjuan</a></td>
                            </tr>
                        </table>

                    </h3><br>
                    </div>

                </div>
                <br>
                
                <a href="#container_content_div"><button type="button" class="btn_about" id="btn_content">See More</button></a> &nbsp;
               
            </div>
        </div>
        <div class='myImage'>
            <img src='./img_whitehouse/images/whitehouse.jpg' alt='Image' class='bg_image'>
        </div>
    </div>



    <div class="container_index" id="container_content_div">
        <div class="contentdiv">
            <div class="row people_div">
                <h1 class="contenttitle">AGUEDO DE VILLA MERCADO</h1>
                <p class="content_people">
                Mercado’s originally from Binan, Laguna. Son of Celestino Mercado and Sophia De Villa. Trader, both agriculturist, industrialist, and businessman. Owned the very first rice mill in San Juan. First-degree cousin of Don Leon Mercado, Katipunero, and the patriarch of the Leon Mercado ancestral house. Married to Pilar Mercado Marasigan, daughter of Francisco Marasigan, the first Captain Municipal of San Juan town.
                </p><br>
                <hr>
                <br>
                <h1 class="contenttitle">PILAR MERCADO MARASIGAN</h1>
                <p class="content_people">
                Marasigan's roots trace back to Cuenca. She is the spouse of Aguedo Mercado and holds the position of the youngest daughter among the ten children of Francisco de Villa Marasigan and Irene Perez Mercado. Notably, Irene Perez Mercado is the granddaughter of Camillo Perez, who served as the founder and inaugural gobernadorcillo of San Juan town.
                </p>
            </div>

            <div class="row angkans_div">
                <div class="col-lg centered_cell">
                    <h1 class="angkans_title">PROMINENT “ANGKANS” IN <br>SAN JUAN</h1>
                </div>

                <div class="col-lg">
                CHILDREN OF AGUEDO AND PILAR MERCADO: <br><br>
                <ul>
                    <li>Cleotilde Mercado Lao, married to Jose Mayo Lao native from San Pablo City. </li>
                    <li>Natividad Mercado Lopez, married to Marcel Lopez, former municipal councilor of San Juan in the 1960s.</li>
                    <li>Dra. Lourdes Mercado OB-Gynecologist by profession, finished a degree in UST. Completed her Masters Degree in University of Pennsylvania and practiced her medical profession in New York and New Jersey.</li>
                    <li>Atty. Felizardo Mercado, lawyer by profession, businessman and former JAGO (Judge Advocate General Office) of Philippine Constabulary. Served as Municipal Secretary of San Juan under Mayor Vicente Marasigan Lecaroz. Married to Lourdes Canopio native from Liliw Laguna.</li>
                </ul>
    

                </div>
            </div>

            <div class="row history_div">
            <center>
                <h1 class="contenttitle">HISTORY</h1>
                </center>
                <hr>
                <div class="row " style="margin-top: 30px;">
                    <div class="col-lg centered_cell">
                        <p class="content_history">
                            Built in year 1934 and 1940 with tax declaration no. 5490. Pre-war art decoration and neo classic design. <br><br>

                            A 500 sqm. residential area, with a total assessed value amounting to P85,800.00. (dated June 24, 1948)

                        </p>
                    </div>

                    <div class="col-lg ">
                    <img src='./img_whitehouse/images/whitehouse(2).jpg' alt='Image' class='img_content'>
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-lg centered_cell">
                        
                        <p class="content_history">
                        Spent 150 trees just to build the house. <br><br>

                        Big and solid timber of Narra, Balayong and Mulawin trees are the common wood materials. <br><br>

                        The house was the favorite “social” venue or place for afternoon or evening party. A musical party and relaxation of the guest, during Japanese occupation periods. Thus, Japanese General’s are some of the many guest of the house.


                        </p>
                    </div>

                    <div class="col-lg">
                        <img src='./img_whitehouse/images/whitehouse(3).jpg' alt='Image' class='img_content'>  
                    </div>
                    <br><br>
                </div>
            </div>

            
            <div class="row restorepics_div">
                <center>
                <h1 class="contenttitle">August 2021 Restoration Began…</h1>
                </center>
                
                <br><br>
                <table width="100%" style="margin-top: 30px;">
                        <tr>
                            <td width="10%"><i class="bi bi-caret-left-fill control_photo" id="slideLeft_d"></i></td>
                            <td width="80%" class="td_hw_m_photos">
                                
                                <div class="hw_m_photos_div">
                                    <table class="hw_m_photos">
                                        <tr>
                                            <?php 
                                               $imageURL = '/tourism_information_system/qrcontents/img_whitehouse/imgrestoration_slide/restore';

                                               for($i = 1; $i <= 9; $i++){
                                                    echo "<td>
                                                    <img src='$imageURL".$i.".jpg' alt='Image' class='hw_m_otherimages'>
                                                    </td>";
                                               }
                                                
                                            ?>
                                        </tr>
                                    </table>
                                </div>
                                
                            </td>
                            <td width="10%" style="text-align: right;"><i class="bi bi-caret-right-fill control_photo" id="slideRight_d"></i></td>
                        </tr>
                </table>
            </div>

            <div class="row history_div">
                <center>
                <h1 class="contenttitle">Welcome to 20th Century</h1>
                </center>

                <div class="row" style="margin-top: 10px;">
                <p class="content_people">
                After 80+ years, the White House has managed to maintain it’s grandeur and still one of the iconic heritage houses in San Juan Batangas.

                </p>
                <table width="100%" style="margin-top: 20px; margin-bottom: 30px;">
                        <tr>
                            <td width="100%" class="td_hw_m_photos">
                                
                                <div class="hw_m_photos_div2">
                                    <table class="hw_m_photos">
                                        <tr>
                                            <?php 
                                               $imageURL = '/tourism_information_system/qrcontents/img_whitehouse/imginterior/interior';

                                               for($i = 1; $i <= 4; $i++){
                                                    echo "<td>
                                                    <img src='$imageURL".$i.".jpg' alt='Image' class='hw_m_otherimages'>
                                                    </td>";
                                               }
                                                
                                            ?>
                                        </tr>
                                    </table>
                                </div>
                                
                            </td>
                        </tr>
                </table>
                                
                <p class="content_people">
                July 2, 2021 White House had a new owner and changed it’s name into <b>White House San Juan</b>.

                </p>

                </div>

            </div>

            <div class="row fam_div">
                <div class="col-lg">
                    <center>
                    <h1 class="angkans_title">MAALIHAN - MARUNDAN FAMILY</h1>
                    <img src='./img_whitehouse/images/family.png' alt='Image' class='img_content'>
                    </center>
               
                </div>
            </div>

            <div class="row history_div">

                <div class="col-lg">
                    <center>
                    <img src='./img_whitehouse/images/neil.png' alt='Image' class='img_content'>
                    </center>
                </div>
                <div class="col-lg" style="text-align: left;">
                <center><h1 class="contenttitle">NEIL COMPLE MARUNDAN </h1></center>
                    
                    <p class="content_people">
                    Nestor Vergara Marundan, a retired Air Force personnel, and Adelaida Ona Comple, a retired Teacher, are both natives of San Jose Batangas. Nestor is the youngest and only son among four siblings. At the age of 42, he acquired the White House, and the family's primary business revolves around Poultry and Piggery Farming. His educational journey includes 11 years in the seminary, where he completed a degree in AB Philosophy at the Oblates Of St. Joseph, a religious congregation. Additionally, he earned a Diploma in Human Resource as his second degree from De La Salle College of St. Benilde. Nestor's professional background encompasses a decade-long stint as a banker, with his last job position being an HR Manager before retiring. <br><br>

                    Currently residing in San Jose Batangas, Nestor is actively involved in Poultry and Organic Farming. Together with his wife, they manage JNJ Pharmacy in San Juan, overseeing four branches. At present, Nestor finds fulfillment in a restoration project at the White House, considering it a serendipitous experience. <br><br>  

                    This multifaceted individual has seamlessly transitioned from a military and educational background to a successful career in agriculture and entrepreneurship, embodying a diverse and fulfilling life journey. <br><br>
                    </p>
                </div>

            </div>

            <div class="row history_div">

                <div class="col-lg">
                    <center>
                    <img src='./img_whitehouse/images/joy.png' alt='Image' class='img_content'>
                    </center>
                </div>
                <div class="col-lg" style="text-align: left;">
                    <center><h1 class="contenttitle">JOY MARYLENE MEDINA <br>MAALIHAN </h1></center>
                    <p class="content_people">
                    Meynardo Escaro Maalihan, Nurse by profession and became Municipal Councilor in San Juan for 9 years. <br><br>
                    Evelyn Dimaculangan Medina, Nurse by profession and Pharmacist as her 2nd degree, native from Alitagtag Batangas. <br><br>
                    They are the founder of “JOJOs Pharmacy” (JNJ Pharmacy) the longest running drugstore in the municipality of San Juan, (established 1979, 42 years in the business) with 4 branches nowadays. <br><br>

                    Joy Marylene Medina Maalihan, having graduated with a Commerce degree from Sacred Heart College Lucena City, further pursued her medical education at the University of Perpetual Help Binan Laguna. She achieved a sub-specialization in Internal Medicine at Mary Mediatrix Medical Center Lipa City. As the youngest daughter and the fifth among six siblings, she acquired the White House at the age of 41. Currently, Joy practices her medical profession at JNJ Medical Building, Divine Care Hospital, San Juan Doctors, and Global East Medical Center Lipa City. <br><br>

                    In addition to her thriving medical career, Joy, along with her husband Meynardo Escaro Maalihan, manages a successful venture into Poultry Farming while overseeing the operations of JNJ Medical Building and JNJ Pharmacy with four branches. The restoration and revitalization of the White House have become a shared aspiration for the couple, adding a unique dimension to their entrepreneurial and familial journey. Blessed with two children, Chiara Ysabelle (7 years old) and Caleb Maynard (5 years old), Joy Marylene embodies a dynamic and well-rounded commitment to both healthcare and business, contributing to the vibrancy of their local community. <br><br>

                    </p>
                </div>

            </div>

            <div class="row restorepics_div">
                <h1 class="contenttitle">“Coincidence is God’s Way of Remaining Anonymous”</h1>
                <p class="content_people">
                    <ul>
                        <li>Dra. Lourdes Mercado (daughter of Aguedo and Pilar) is an OB Gynecology Doctor, same birthdate of the youngest son of the new owner. (Sept.8)</li>
                        <li>Dra. Liza Mercado (daughter of Atty. Felizardo Mercado, niece of Dra. Lourdes) is also an OB Gynecology Doctor. 
                        Lourdes Canopio (wife of Atty. Mercado, mother of Dra. Liza) born on Aug.13, 1937 while Mr. Neil Marundan was born on Aug. 13, 1979. From 1937 to 1979 a total of 42 years gap, which same age of Mr. Neil when they acquired the house.</li>
                        <li>Dra. Joy is also in medical profession as Internal Medicine Physician. At present, her parents house where the Pharmacy is located was the property of Mercado before. The medical building is situated on the same spot where the rice mill (kamalig) of the Mercado Family erected before. During that time the White House is not yet their property.</li> 
                        <li>The father of Dra. Joy came from politics, same as the father of Pilar Marasigan. Both of their parents served in the Municipality of San Juan.</li>
                        <li>Pilar Marasigan and Dra. Joy are both youngest daughter in the family.</li>
                        <li>Atty. Felizardo Mercado and Mr. Neil are both youngest and only son in the brood of 4 children in the family. 
                        The house was built in 1934, same birth year of Nestor Marundan (father of Mr. Neil).</li>
                        <li>All surnames starts with letter “M” even inter-marriage (Mercado-Marasigan, Medina-Maalihan and Maalihan-Marundan).</li>

                    </ul>
                </p>
            </div>
           




            <!--footer-->
            <?php include("../footer.php"); ?>    
        </div>
    </div>


</body>
    <script>
        $(function(){
            $("#slideRight_d").click(function(){
        $(".hw_m_photos_div").animate( { scrollLeft: '+=460px' }, 1000);

        
    });

    $("#slideLeft_d").click(function(){
        $(".hw_m_photos_div").animate( { scrollLeft: '-=460px' }, 1000);
    });
        });
    </script>
</html>