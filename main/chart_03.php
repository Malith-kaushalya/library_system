<?php
// get current date & time...
date_default_timezone_set("Asia/Colombo");
$current_date = date("Y-m-d");

    //get month dates..... 
    $jan_first = date('Y-01-01');
    $jan_last = date('Y-01-31');

    $feb_first = date('Y-02-01');
    $feb_last = date('Y-02-31');

    $mar_first = date('Y-03-01');
    $mar_last = date('Y-03-31');

    $apr_first = date('Y-04-01');
    $apr_last = date('Y-04-31');

    $may_first = date('Y-05-01');
    $may_last = date('Y-05-31');

    $jun_first = date('Y-06-01');
    $jun_last = date('Y-06-31');

    $jul_first = date('Y-07-01');
    $jul_last = date('Y-07-31');

    $aug_first = date('Y-08-01');
    $aug_last = date('Y-08-31');

    $sep_first = date('Y-09-01');
    $sep_last = date('Y-09-31');

    $oct_first = date('Y-10-01');
    $oct_last = date('Y-10-31');

    $nov_first = date('Y-11-01');
    $nov_last = date('Y-11-31');

    $dec_first = date('Y-12-01');
    $dec_last = date('Y-12-31');




    $sql2 =" SELECT count(*) as count FROM borrower_data WHERE bo_borrow_date >= '$jan_first' AND bo_borrow_date <= '$jan_last'";
        $result=mysqli_query($conn,$sql2);
            while($row=mysqli_fetch_assoc($result)){
                $jan = $row['count'];
            }  
    $sql1="SELECT count(*) as count FROM borrower_data WHERE bo_borrow_date >= '$feb_first' AND bo_borrow_date <= '$feb_last'";
        $result1=mysqli_query($conn,$sql1);
            while($row1=mysqli_fetch_assoc($result1)){
                $feb =$row1['count'];
            } 
    $sql4="SELECT count(*) as count FROM borrower_data WHERE bo_borrow_date >= '$mar_first' AND bo_borrow_date <= '$mar_last'";
        $result4=mysqli_query($conn,$sql4);
            while($row4=mysqli_fetch_assoc($result4)){
                $mar =$row4['count'];
            }
    $sql5="SELECT count(*) as count FROM borrower_data WHERE  bo_borrow_date >= '$apr_first' AND bo_borrow_date <= '$apr_last'";
        $result5=mysqli_query($conn,$sql5);
            while($row5=mysqli_fetch_assoc($result5)){
                $apr =$row5['count'];
            }

     $sql6 =" SELECT count(*) as count FROM borrower_data WHERE bo_borrow_date >= '$may_first' AND bo_borrow_date <= '$may_last'";
        $result6=mysqli_query($conn,$sql6);
            while($row6=mysqli_fetch_assoc($result6)){
                $may = $row6['count'];
            }  
    $sql7="SELECT count(*) as count FROM borrower_data WHERE bo_borrow_date >= '$jun_first' AND bo_borrow_date <= '$jun_last'";
        $result7=mysqli_query($conn,$sql7);
            while($row7=mysqli_fetch_assoc($result7)){
                $jun =$row7['count'];
            } 
    $sql9="SELECT count(*) as count FROM borrower_data WHERE bo_borrow_date >= '$jul_first' AND bo_borrow_date <= '$jul_last'";
        $result9=mysqli_query($conn,$sql9);
            while($row9=mysqli_fetch_assoc($result9)){
                $jul =$row9['count'];
            }
    $sql10="SELECT count(*) as count FROM borrower_data WHERE  bo_borrow_date >= '$aug_first' AND bo_borrow_date <= '$aug_last'";
        $result10=mysqli_query($conn,$sql10);
            while($row10=mysqli_fetch_assoc($result10)){
                $aug =$row10['count'];
            }

     $sql11 =" SELECT count(*) as count FROM borrower_data WHERE bo_borrow_date >= '$sep_first' AND bo_borrow_date <= '$sep_last'";
        $result11=mysqli_query($conn,$sql11);
            while($row11=mysqli_fetch_assoc($result11)){
                $sep = $row11['count'];
            }  
    $sql12="SELECT count(*) as count FROM borrower_data WHERE bo_borrow_date >= '$oct_first' AND bo_borrow_date <= '$oct_last'";
        $result12=mysqli_query($conn,$sql12);
            while($row12=mysqli_fetch_assoc($result12)){
                $oct =$row12['count'];
            } 
    $sql13="SELECT count(*) as count FROM borrower_data WHERE bo_borrow_date >= '$nov_first' AND bo_borrow_date <= '$nov_last'";
        $result13=mysqli_query($conn,$sql13);
            while($row13=mysqli_fetch_assoc($result13)){
                $nov =$row13['count'];
            }
    $sql14="SELECT count(*) as count FROM borrower_data WHERE  bo_borrow_date >= '$dec_first' AND bo_borrow_date <= '$dec_last'";
        $result14=mysqli_query($conn,$sql14);
            while($row14=mysqli_fetch_assoc($result14)){
                $dec =$row14['count'];
            }
            
            
    //get member registration count....
    $sql20 =" SELECT count(*) as count FROM member WHERE m_reg_date >= '$jan_first' AND m_reg_date <= '$jan_last'";
        $result20=mysqli_query($conn,$sql20);
            while($row02=mysqli_fetch_assoc($result20)){
                $jan1 = $row02['count'];
            }  
    $sql21="SELECT count(*) as count FROM member WHERE m_reg_date >= '$feb_first' AND m_reg_date <= '$feb_last'";
        $result21=mysqli_query($conn,$sql21);
            while($row21=mysqli_fetch_assoc($result21)){
                $feb1 =$row21['count'];
            } 
    $sql22="SELECT count(*) as count FROM member WHERE m_reg_date >= '$mar_first' AND m_reg_date <= '$mar_last'";
        $result22=mysqli_query($conn,$sql22);
            while($row22=mysqli_fetch_assoc($result22)){
                $mar1 =$row22['count'];
            }
    $sql23="SELECT count(*) as count FROM member WHERE  m_reg_date >= '$apr_first' AND m_reg_date <= '$apr_last'";
        $result23=mysqli_query($conn,$sql23);
            while($row23=mysqli_fetch_assoc($result23)){
                $apr1 =$row23['count'];
            }

     $sql24 =" SELECT count(*) as count FROM member WHERE m_reg_date >= '$may_first' AND m_reg_date <= '$may_last'";
        $result24=mysqli_query($conn,$sql24);
            while($row24=mysqli_fetch_assoc($result24)){
                $may1 = $row24['count'];
            }  
    $sq25="SELECT count(*) as count FROM member WHERE m_reg_date >= '$jun_first' AND m_reg_date <= '$jun_last'";
        $result25=mysqli_query($conn,$sq25);
            while($row25=mysqli_fetch_assoc($result25)){
                $jun1 =$row25['count'];
            } 
    $sq26="SELECT count(*) as count FROM member WHERE m_reg_date >= '$jul_first' AND m_reg_date <= '$jul_last'";
        $result26=mysqli_query($conn,$sq26);
            while($row26=mysqli_fetch_assoc($result26)){
                $jul1 =$row26['count'];
            }
    $sql27="SELECT count(*) as count FROM member WHERE  m_reg_date >= '$aug_first' AND m_reg_date <= '$aug_last'";
        $result27=mysqli_query($conn,$sql27);
            while($row27=mysqli_fetch_assoc($result27)){
                $aug1 =$row27['count'];
            }

     $sql28 =" SELECT count(*) as count FROM member WHERE m_reg_date >= '$sep_first' AND m_reg_date <= '$sep_last'";
        $result28=mysqli_query($conn,$sql28);
            while($row28=mysqli_fetch_assoc($result28)){
                $sep1 = $row28['count'];
            }  
    $sql29="SELECT count(*) as count FROM member WHERE m_reg_date >= '$oct_first' AND m_reg_date <= '$oct_last'";
        $result29=mysqli_query($conn,$sql29);
            while($row29=mysqli_fetch_assoc($result29)){
                $oct1 =$row29['count'];
            } 
    $sql30="SELECT count(*) as count FROM member WHERE m_reg_date >= '$nov_first' AND m_reg_date <= '$nov_last'";
        $result30=mysqli_query($conn,$sql30);
            while($row30=mysqli_fetch_assoc($result30)){
                $nov1 =$row30['count'];
            }
    $sql31="SELECT count(*) as count FROM member WHERE  m_reg_date >= '$dec_first' AND m_reg_date <= '$dec_last'";
        $result31=mysqli_query($conn,$sql31);
            while($row31=mysqli_fetch_assoc($result31)){
                $dec1 =$row31['count'];
            }
?>
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["MONTH", "LENDING COUNT", "MEMBER REGISTRATIONS"],
        ["JAN", <?php echo $jan; ?>, <?php echo $jan1; ?>],
        ["FEB", <?php echo $feb; ?>, <?php echo $feb1; ?>],
        ["MAR", <?php echo $mar; ?>, <?php echo $mar1; ?>],
        ["APR", <?php echo $apr; ?>, <?php echo $apr1; ?>],
        ["MAY", <?php echo $may; ?>, <?php echo $may1; ?>],
        ["JUN", <?php echo $jun; ?>, <?php echo $jun1; ?>],
        ["JUL", <?php echo $jul; ?>, <?php echo $jul1; ?>],
        ["AUG", <?php echo $aug; ?>, <?php echo $aug1; ?>],
        ["SEP", <?php echo $sep; ?>, <?php echo $sep1; ?>],
        ["OCT", <?php echo $oct; ?>, <?php echo $oct1; ?>],
        ["NOV", <?php echo $nov; ?>, <?php echo $nov1; ?>],
        ["DEC", <?php echo $dec; ?>, <?php echo $dec1; ?>]

      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1, 
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
   
       var options = {
          title: 'Monthly Book Lending and Member Registrations',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

      var chart = new google.visualization.LineChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 1100px; height: 300px;"></div>         
