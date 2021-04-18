<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <?php
    //setting timezone UTC
    date_default_timezone_set("Asia/Dhaka");

    //getting day name
    $date = date("D");
    $fulldate = date("l");

    // getting day number and its array to find next day
    $date_class_list = array("Sun", "Mon", "Tue", "Wed", "Thu");
    $full_date_list = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday");

    $date_num = array_search($date, $date_class_list);

//checking if today is  end of the week or holiday
// if end of the week then next day sunday 
// if its holiday fri/sat then next day snday 

    if ($date_num == count($full_date_list) - 1) {
        $next_date = $date_class_list[0];
    } elseif (!$date_num && $date_num !== 0) {
        $next_date = $date_class_list[0];
         $date_num = -1;  
        
    } else {
        $next_date = $date_class_list[$date_num + 1];
    }
    ?>
    <?php
    function date_routine_printer($date, $date_class_list, $day, $full_date_list, $date_num, $fulldate){
    ?>
    <h1>
        <?php
        //title generation for today and next day
        if ($day == "Today") {
            echo $day, "/", $fulldate;
        } else {
            if ($date_num == count($full_date_list) - 1) {
                echo "Next Class", "/", $full_date_list[0];
            } else {
                echo "Next Class", "/", $full_date_list[$date_num + 1];
                $date = $date_class_list[$date_num + 1];
            }
        }
        ?>
    </h1>
    <?php
    //image print

    if ($date !== "Sun" && $date !== "Mon" && $date !== "Tue" && $date !== "Wed" && $date !== "Thu") {
    ?>
    <h1><?php echo "$day is Holiday</h1>" ?>
        <?php
        } else {
            ?>
            <img class="routine" src="image/<?php echo $date ?>.png" alt="days routine"/>
            <?php
        }
        ?>
        <?php
        }
        ?>
        <title><?php echo $fulldate ?> Class Routine</title>

        </head>

<body>
<?php
//today
date_routine_printer($date, $date_class_list, "Today", $full_date_list, $date_num, $fulldate);
//tomorrow
date_routine_printer($next_date, $date_class_list, "Tomorrow", $full_date_list, $date_num, $fulldate);

?>
</body>

</html>

