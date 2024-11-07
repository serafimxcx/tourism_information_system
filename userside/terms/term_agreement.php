<?php
    include("../../navbar.php");

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
    <link rel="stylesheet" href="termstyle.css">
    <title>User Term Agreement</title>
</head>
<body>
    <!--header-->
    <?php include_once("../../header.php"); ?>

    <div class="container_index" id="container_content_div">
        <div class="contentdiv">
            <div class="row terms_div">
                <h1 class="term_title">User Term Agreement</h1><br><br><br>
                <h3 class="term_subtitle">Welcome</h3>
                <p>
                This User Term Agreement ("Agreement") outlines the terms and conditions governing your use of our services ("Services") and the creation of your account ("Account"). By creating an Account and using the Services, you agree to be bound by this Agreement.
                </p>

                <h4 class="term_subtitle">1. Account Creation</h4>
                <p>
                1.1 To create an Account, you must enter a valid email address for your account verification. <br>
                1.2 You are responsible for maintaining the confidentiality of your login credentials and for all activity that occurs under your Account.
                </p>

                <h4 class="term_subtitle">2. Data Privacy</h4>
                <p>
                2.1 We are committed to protecting the privacy of our users. Please refer to our Privacy Policy: [link to Privacy Policy] for detailed information about how we collect, use, and disclose your personal data. <br>
                2.2 You understand that by using the Services, you consent to the collection, use, and disclosure of your personal data as described in our Privacy Policy.
                </p>

                <h4 class="term_subtitle">3. Your Rights</h4>
                <p>
                3.1 You have the right to access, rectify, erase, and restrict the processing of your personal data, as well as the right to data portability. <br>
                3.2 You can exercise your rights by contacting us through the methods described in our Privacy Policy.
                </p>

                <h4 class="term_subtitle">4. Prohibited Activities</h4>
                <p>
                4.1 You are prohibited from using the Services for any illegal or unauthorized purpose, including but not limited to: <br>
                * Infringing the intellectual property rights of others. <br>
                * Violating the privacy or rights of others. <br>
                * Engaging in fraudulent or deceptive activities. <br>
                * Distributing harmful content, such as viruses or malware. <br>
                * Disrupting the flow of the Services. 
                </p>
                <br><br><br>

                <h4 class="term_subtitle">5. Termination</h4>
                <p>
                5.1 We reserve the right to terminate your Account and access to the Services at any time, with or without notice, for any reason, including but not limited to: <br>
                * Violation of this Agreement. 

                </p>

                <h4 class="term_subtitle">6. Disclaimer</h4>
                <p>
                6.1 The Services are provided "as is" and "as available" without any warranties, express or implied. We disclaim all warranties, including but not limited to, warranties of merchantability, fitness for a particular purpose, and non-infringement. <br>
                6.2 We are not liable for any damages arising from your use of the Services, including but not limited to, direct, indirect, incidental, consequential, or punitive damages. <br>
                </p>

                <h4 class="term_subtitle">7. Changes to this Agreement</h4>
                <p>
                7.1 We reserve the right to modify this Agreement at any time by posting the revised Agreement on our website or through the Services. <br>
                7.2 Your continued use of the Services after the revised Agreement is posted constitutes your acceptance of the revised Agreement.

                </p>
                

                <h4 class="term_subtitle">8. Contact Us</h4>
                <p>
                11.1 If you have any questions about this Agreement, please contact us at <a href="mailto: contactus@juanguide.com">contactus@juanguide.com</a>. <br><br><br>

                
                <b>By creating an Account and using the Services, you acknowledge that you have read and understood this Agreement and agree to be bound by its terms and conditions.</b>
                </p>

                <br><br><br><br><br>
                <hr>
                <br><br><br>
                <h1 class="term_title">Privacy Policy</h1>
                
                <h3 class="term_subtitle">Welcome</h3>
                <p>
                This Privacy Policy ("Policy") explains how we, JuanGuide, collect, use, and disclose your personal information when you create an account ("Account") and use our travel web application ("App").
                </p>

                <h4 class="term_subtitle">1. Information We Collect</h4>
                <p>
                We collect the following information when you create an Account and use the App: 
                    <p style="padding-left: 30px;">
                        •	Account Information: Your name, email address, username, password (in hashed form), and profile picture. <br>
                        •	Travel Information: Your travel preferences, search history, and reviews. <br>
                        •	Usage Information: How you use the App, such as the features you access, the pages you visit, and the time you spend on the App.
                    </p>
                

                </p>

                <h4 class="term_subtitle">2. How We Use Your Information</h4>
                <p>
                We use your information to:
                    <p style="padding-left: 30px;">
                        •	Provide and improve the App and its functionalities. <br>
                        •	Analyze how the App is used to improve our services. <br>
                        •	Comply with applicable laws and regulations.

                    </p>
                

                </p>

                <h4 class="term_subtitle">3.Your Choices</h4>
                <p>
                You have the following choices regarding your information:
                    <p style="padding-left: 30px;">
                    •	You can access, update, and delete your information through your Account settings. <br>
                    •	You can control how your browser or device shares information with us by adjusting your privacy settings.
                    </p>
                </p>

                <h4 class="term_subtitle">4. Data Retention</h4>
                <p>
                We will retain your information for as long as your Account is active, and for a reasonable period of time afterwards to comply with our legal and regulatory obligations, resolve disputes, and enforce our agreements.
                </p>

                <h4 class="term_subtitle">5. Security</h4>
                <p>
                We take reasonable steps to protect your information from unauthorized access, disclosure, alteration, or destruction. However, no internet or electronic storage system is 100% secure.
                </p>

                <h4 class="term_subtitle">7. Changes to this Policy</h4>
                <p>
                We may update this Policy from time to time. We will notify you of any changes by posting the new Policy on this page. You are advised to review this Policy periodically for any changes.
                </p>

                <h4 class="term_subtitle">8. Contact Us</h4>
                <p>
                If you have any questions about this Policy, please contact us at <a href="mailto: contactus@juanguide.com">contactus@juanguide.com</a>.
                This Privacy Policy is incorporated into, and subject to, our User Term Agreement.

                </p>
  
            
            </div>



            <!--footer-->
        <?php include("../../footer.php"); ?>  
        </div>



        
    </div>
</body>
    <script>
        $(function(){
            $("#btn_menu").click(function(){
        if($("#navbar").css("display")=="none"){
            $("#navbar").css({"display":"block"});
            if (window.matchMedia('(max-width: 750px)').matches) {
                $("#btn_menu").css({"margin-left":"0"});
            } else {
                $("#btn_menu").css({"margin-left":"25%"});
            }
            
        }else if($("#navbar").css("display")=="block"){
            $("#navbar").css({"display":"none"});
            $("#btn_menu").css({"margin-left":"0"});
        }
    });

    $(".container").click(function(){
        $("#navbar").css({"display":"none"});
            $("#btn_menu").css({"margin-left":"0"});
    });
        });
    </script>
</html>