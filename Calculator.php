<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>

    <style>
        .col_white{color: #f5f6f6;}
        *{font-family: Arial, Helvetica, sans-serif;}
        body{background-color: #525151;}
        .form{
            display: flex;
            justify-content: center;
        }
        .result{
            height: 44px;
            border: 3px solid grey;
            background-color: whitesmoke;
            color: black;
            font-size: 38px;
            text-align: right;
            border-radius: 10px;
        }
        .first_number,.second_number,.operation,.buttons{
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #1C1C1C;
        }
        button:hover{
            border: 3px solid grey;
            background-color: #f69906;
            width: 200px;
            height: 46px;
            border-radius: 10px;
            text-align: center;
            font-size: 30px;
            color: white;
            cursor: pointer;
        }
        .calculator{
            width: 500px;
            height: 400px;
            margin: 40px 0;
            padding: 40px 50px;
            background-color: #1C1C1C;
            border: 5px solid grey;
            border-radius: 20px;
            z-index: 2;
        }
        h1{
            background-color: #1C1C1C;
            font-size: 28px;
            color: #f5f6f6;
        }
        input{
            border: 2px solid grey;
            background-color: #313131;
            width: 250px;
            height: 40px;
            border-radius: 10px;
            text-align: right;
            font-size: 25px;
            color: #f5f6f6;
        }
        input:hover{
            border: 3px solid #6f6f6f;
            background-color: #313131;
            width: 250px;
            height: 40px;
            border-radius: 10px;
            text-align: right;
            font-size: 25px;
            color: #f5f6f6;
        }
        select{
            border: 2px solid grey;
            background-color: #f69906;
            width: 258px;
            height: 46px;
            border-radius: 10px;
            text-align: center;
            font-size: 25px;
            color: #f5f6f6;
        }
        select:hover{
            border: 3px solid grey;
            background-color: #f69906;
            width: 258px;
            height: 46px;
            border-radius: 10px;
            text-align: center;
            font-size: 30px;
            color: white;
            cursor: pointer;
        }
        option{
            border: 2px solid grey;
            background-color: #f69906;
            width: 258px;
            height: 40px;
            font-size: 25px;
            color: #f5f6f6;
        }
        button{
            border: 2px solid grey;
            background-color: #f69906;
            width: 200px;
            height: 46px;
            border-radius: 10px;
            text-align: center;
            font-size: 25px;
            color: #f5f6f6;
        }
        .header{
            display: flex;
            font-size: 40px;
            background-color: #1C1C1C;
            text-align: center;
            padding-bottom: 40px;
            letter-spacing: 0.4em;
            font-family:Georgia, 'Times New Roman', Times, serif;
        }
        .hidden_div{
            display: flex;
            justify-content: center;
            align-items: flex-start;
        }
        .cumulative{
            width: 500px;
            height: 400px;
            /* margin-top: -530px; */
            padding: 40px 50px;
            background-color: #1C1C1C;
            border: 5px solid grey;
            border-radius: 20px;
            z-index: 0;
        }
        #myCheck{
            position: relative;
            height: 40px;
            width: 40px;
        }
        input[type="checkbox"]{
          -webkit-appearance: none;
          appearance: none;
        }
        #myCheck::before{
            margin-right: 8px;
            font-size: 33px;
            content: attr(data-value);
        }
        .first_lesson , .current_average, .cumulative_average{
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .lesson,.credits,.grade,.attendance,.credit_value,.lesson:hover,.grade:hover,.credits:hover,.attendance:hover,.average{font-size:14px;}
        .lesson,.lesson:hover,.average{
            width: 30%;
        }
        .grade,.grade:hover{
            width: 15%;  
        }
        .credits,.credits:hover{
           width: 10%;
        }
        .attendance,.attendance:hover,.credit_value{
            width: 10%; 
        }
        .cumulative_average, .current_average{
            height: 35px;
            margin: 15px 0;
        }
        #cumul_cal{
            height: 40px;
            width: 30%;
        }
    </style>
</head>
<body>
    <form class="form" autocomplete="off">
        <div class="calculator">
            <div class="header col_white">
                CALCULATOR
                <input type="checkbox" id="myCheck" onclick="myFunction()">
            </div>
            <div class="result">
                <?php
                    $result = 0;
                    if(isset($_GET['submit'])){
                        $first_num = $_GET['first_num'];
                        $second_num = $_GET['second_num'];
                        $operation = $_GET['operations'];
                        if(is_numeric($first_num) && is_numeric($second_num)){
                            switch($operation){
                                case "None":
                                    echo "Please choose any operation";
                                    $result = "";
                                break;
                                case "Add":
                                    $result = $first_num + $second_num;
                                break;
                                case "Subtract":
                                    $result = $first_num - $second_num;
                                break;
                                case "Multiply":
                                    $result = $first_num * $second_num;
                                break;
                                case "Divide":
                                    if($second_num == 0){
                                        $result = "Cannot divide by zero!";
                                    }
                                    else{
                                    $result = $first_num / $second_num;
                                    }
                                break;
                                case "Power":
                                    $result = $first_num ** $second_num;
                                break;
                                case "Root":
                                    if($second_num == 0){
                                        $result = "Undefined!";
                                    }
                                    else{
                                    $result  = pow($first_num, 1/$second_num);
                                    }
                                break;
                            }
                        }
                        else{
                            echo "Please write number!";
                            $result = "";
                        }
                    }
                    echo $result;
                ?>
            </div>
            <div class="first_number">
                <h1>First Number</h1>
                <input class="hover" type="text" name="first_num">
            </div>
            <div class="operation">
                <h1>Operation</h1>
                <select name="operations">
                    <option value="None">None</option>
                    <option value="Add">Add</option>
                    <option value="Subtract">Subtract</option>
                    <option value="Multiply">Multiply</option>
                    <option value="Divide">Divide</option>
                    <option value="Power">Power</option>
                    <option value="Root">Root</option>
                </select>
            </div>
            <div class="second_number">
                <h1>Second Number</h1>
                <input class="hover" type="text" name="second_num">
            </div>
            <br>
            <div class="buttons">
                <button name="submit" type="submit">Calculate</button>
                <button name="clear" type="submit">Clear</button>
            </div>
        </div>
    </form>
    <form  autocomplete="off">
            <div class="hidden_div" >
                <div class="cumulative" id="cumulative" style="margin-top: -530px;">
                    <div class="lessons">
                        <div class="first_lesson">
                            <h3 class="lesson col_white">Course</h3>
                            <h3 class="credits col_white">Credits</h3>
                            <h3 class="grade col_white">Grade</h3>
                            <h3 class="attendance col_white">Attendance</h3>
                            <h3 class="credit_value col_white">Value</h3>
                        </div>
                        <div class="first_lesson">
                            <input type="text" class="lesson col_white" name="lesson_a" value="<?php if(isset($_GET['tamam'])){ echo $_GET['lesson_a'];} ?>">
                            <input type="number" class="credits col_white" name="credit_a" value="<?php if(isset($_GET['tamam'])){ echo $_GET['credit_a'];} ?>">
                            <input type="number" class="grade col_white" name="grade_a" value="<?php if(isset($_GET['tamam'])){ echo $_GET['grade_a'];} ?>">
                            <select name="attendance_a" id="att" class="attendance">
                                <option value="Ok">&#10004;</option>
                                <option value="No">&#10006;</option>
                            </select>
                            <h1 class="credit_value">
                                <?php
                                    $grade_value_a = 0;
                                    $credit_a = 0;
                                    $grade_a = 0;
                                    if(isset($_GET['tamam'])){
                                        if($_GET['credit_a'] == '' || $_GET['grade_a'] == ''){
                                            $grade_value_a = 0;
                                        }
                                        else{
                                        $credit_a = $_GET['credit_a'];
                                        $grade_a= $_GET['grade_a'];
                                        $grade_value_a = $credit_a * $grade_a;
                                        }
                                    }
                                    echo $grade_value_a;
                                ?>
                            </h1>
                        </div>
                        <div class="first_lesson">
                            <input type="text" class="lesson col_white" name="lesson_b" value="<?php if(isset($_GET['tamam'])){ echo $_GET['lesson_b'];} ?>">
                            <input type="number" class="credits col_white" name="credit_b" value="<?php if(isset($_GET['tamam'])){ echo $_GET['credit_b'];} ?>">
                            <input type="number" class="grade col_white" name="grade_b" value="<?php if(isset($_GET['tamam'])){ echo $_GET['grade_b'];} ?>">
                            <select name="attendance_b" id="att" class="attendance">
                                <option value="Ok">&#10004;</option>
                                <option value="No">&#10006;</option>
                            </select>
                            <h1 class="credit_value">
                                <?php
                                    $grade_value_b = 0;
                                    $credit_b = 0;
                                    $grade_b = 0;
                                    if(isset($_GET['tamam'])){
                                        if($_GET['credit_b'] == ''  ||  $_GET['grade_b'] == ''){
                                            $grade_value_b = 0;
                                        }
                                        else{
                                        $credit_b = $_GET['credit_b'];
                                        $grade_b = $_GET['grade_b'];
                                        $grade_value_b = $credit_b * $grade_b;
                                    }
                                    }
                                    echo $grade_value_b;
                                ?>
                            </h1>
                        </div>
                        <div class="first_lesson">
                            <input type="text" class="lesson col_white" name="lesson_c" value="<?php if(isset($_GET['tamam'])){ echo $_GET['lesson_c'];} ?>">
                            <input type="number" class="credits col_white" name="credit_c" value="<?php if(isset($_GET['tamam'])){ echo $_GET['credit_c'];} ?>">
                            <input type="number" class="grade col_white" name="grade_c" value="<?php if(isset($_GET['tamam'])){ echo $_GET['grade_c'];} ?>">
                            <select name="attendance_c" id="att" class="attendance">
                                <option value="Ok">&#10004;</option>
                                <option value="No">&#10006;</option>
                            </select>
                            <h1 class="credit_value">
                                <?php
                                    $grade_value_c = 0;
                                    $credit_c =  0;
                                    $grade_c = 0;
                                    if(isset($_GET['tamam'])){
                                        if($_GET['credit_c'] == ''  ||  $_GET['grade_c'] == ''){
                                            $grade_value_c = 0;
                                        }
                                        else{
                                        $credit_c = $_GET['credit_c'];
                                        $grade_c = $_GET['grade_c'];
                                        $grade_value_c = $credit_c * $grade_c;
                                    }
                                }
                                    echo $grade_value_c;
                                ?>
                            </h1>
                        </div>
                        <div class="first_lesson">
                            <input type="text" class="lesson col_white" name="lesson_d"  value="<?php if(isset($_GET['tamam'])){ echo $_GET['lesson_d'];} ?>">
                            <input type="number" class="credits col_white" name="credit_d" value="<?php if(isset($_GET['tamam'])){ echo $_GET['credit_d'];} ?>">
                            <input type="number" class="grade col_white" name="grade_d" value="<?php if(isset($_GET['tamam'])){ echo $_GET['grade_d'];} ?>">
                            <select name="attendance_d" id="att" class="attendance">
                                <option value="Ok">&#10004;</option>
                                <option value="No">&#10006;</option>
                            </select>
                            <h1 class="credit_value">
                                <?php
                                    $grade_value_d = 0;
                                    $grade_d = 0;
                                    $credit_d = 0;
                                    if(isset($_GET['tamam'])){
                                        if($_GET['credit_d'] == ''  ||  $_GET['grade_d'] == ''){
                                            $grade_value_d = 0;
                                        }
                                        else{
                                        $credit_d = $_GET['credit_d'];
                                        $grade_d = $_GET['grade_d'];
                                        $grade_value_d = $credit_d * $grade_d;
                                    }
                                }
                                    echo $grade_value_d;
                                ?>
                            </h1>
                        </div>
                        <div class="first_lesson">
                            <input type="text" class="lesson col_white" name="lesson_e"  value="<?php if(isset($_GET['tamam'])){ echo $_GET['lesson_e'];} ?>">
                            <input type="number" class="credits col_white" name="credit_e" value="<?php if(isset($_GET['tamam'])){ echo $_GET['credit_e'];} ?>">
                            <input type="number" class="grade col_white" name="grade_e" value="<?php if(isset($_GET['tamam'])){ echo $_GET['grade_e'];} ?>">
                            <select name="attendance_e" id="att" class="attendance">
                                <option value="Ok">&#10004;</option>
                                <option value="No">&#10006;</option>
                            </select>
                            <h1 class="credit_value">
                                <?php
                                    $grade_value_e = 0;
                                    $credit_e = 0;
                                    $grade_e = 0;
                                    if(isset($_GET['tamam'])){
                                        if($_GET['credit_e'] == ''  ||  $_GET['grade_e'] == ''){
                                            $grade_value_e = 0;
                                        }
                                        else{
                                        $credit_e = $_GET['credit_e'];
                                        $grade_e = $_GET['grade_e'];
                                        $grade_value_e = $credit_e * $grade_e;
                                    }
                                }
                                    echo $grade_value_e;
                                ?>
                            </h1>
                        </div>
                    </div>
                    <div class="current_average col_white">
                        <h4 class="average">Current Average:</h4>
                        <div class="total_cur_credit" style="width: 20%; text-align:center;">
                            <?php
                                if(isset($_GET['tamam'])){
                                    if($_GET['credit_a'] == ''){
                                        $_GET['credit_a'] = 0;
                                    }
                                    if($_GET['credit_b'] == ''){
                                        $_GET['credit_b'] = 0;
                                    }
                                    if($_GET['credit_c'] == ''){
                                        $_GET['credit_c'] = 0;
                                    }
                                    if($_GET['credit_d'] == ''){
                                        $_GET['credit_d'] = 0;
                                    }
                                    if($_GET['credit_e'] == ''){
                                        $_GET['credit_e'] = 0;
                                    }
                                    $total_cur_credit = $_GET['credit_a'] + $_GET['credit_b'] + $_GET['credit_c'] + $_GET['credit_d'] + $_GET['credit_e'];
                                    echo $total_cur_credit;
                                }
                            ?>
                        </div>
                        <div class="total_cur_grade" style="width: 20%; text-align:center;">
                            <?php
                                if(isset($_GET['tamam'])){
                                    if($_GET['grade_a'] == ''){
                                        $_GET['grade_a'] = 0;
                                    }
                                    if($_GET['grade_b'] == ''){
                                        $_GET['grade_b'] = 0;
                                    }
                                    if($_GET['grade_c'] == ''){
                                        $_GET['grade_c'] = 0;
                                    }
                                    if($_GET['grade_d'] == ''){
                                        $_GET['grade_d'] = 0;
                                    }
                                    if($_GET['grade_e'] == ''){
                                        $_GET['grade_e'] = 0;
                                    }
                                    $total_cur_grade = ($credit_a * $grade_a) + ($credit_b * $grade_b) + ($credit_c * $grade_c) + ($credit_d * $grade_d) + ($credit_e * $grade_e);
                                    echo $total_cur_grade;
                                }
                            ?>
                        </div>
                        <div class="current_percentage" style="width: 25%; text-align:center;">
                            <?php 
                                if(isset($_GET['tamam'])){
                                    $total_current_percentage = $total_cur_grade / $total_cur_credit;
                                    echo $total_current_percentage . "%";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="cumulative_average col_white">
                        <h3 class="average">Cumulative Average:</h3>
                        <div class="total_cumul_credit" style="width: 20%; text-align:center;">
                            <?php
                                if(isset($_GET['tamam'])){
                                    $total_cumul_credit = 0;
                                    $attendance_a = $_GET['attendance_a'];
                                    $attendance_b = $_GET['attendance_b'];
                                    $attendance_c = $_GET['attendance_c'];
                                    $attendance_d = $_GET['attendance_d'];
                                    $attendance_e = $_GET['attendance_e'];
                                    switch($attendance_a){
                                        case "Ok":
                                            $total_cumul_credit = $total_cumul_credit + $credit_a;
                                        break;
                                    }
                                    switch($attendance_b){
                                        case "Ok":
                                            $total_cumul_credit = $total_cumul_credit + $credit_b;
                                        break;
                                    }
                                    switch($attendance_c){
                                        case "Ok":
                                            $total_cumul_credit = $total_cumul_credit + $credit_c;
                                        break;
                                    }
                                    switch($attendance_d){
                                        case "Ok":
                                            $total_cumul_credit = $total_cumul_credit + $credit_d;
                                        break;
                                    }
                                    switch($attendance_e){
                                        case "Ok":
                                            $total_cumul_credit = $total_cumul_credit + $credit_e;
                                        break;
                                    }

                                    echo $total_cumul_credit;
                                }
                            ?>
                        </div>
                        <div class="total_cumul_grade" style="width: 20%; text-align:center;">
                        <?php
                                if(isset($_GET['tamam'])){
                                    $total_cumul_grade = 0;
                                    $attendance_a = $_GET['attendance_a'];
                                    $attendance_b = $_GET['attendance_b'];
                                    $attendance_c = $_GET['attendance_c'];
                                    $attendance_d = $_GET['attendance_d'];
                                    $attendance_e = $_GET['attendance_e'];
                                    switch($attendance_a){
                                        case "Ok":
                                            $total_cumul_grade = $total_cumul_grade + ($credit_a * $grade_a);
                                        break;
                                    }
                                    switch($attendance_b){
                                        case "Ok":
                                            $total_cumul_grade = $total_cumul_grade + ($credit_b * $grade_b);
                                        break;
                                    }
                                    switch($attendance_c){
                                        case "Ok":
                                            $total_cumul_grade = $total_cumul_grade + ($credit_c * $grade_c);
                                        break;
                                    }
                                    switch($attendance_d){
                                        case "Ok":
                                            $total_cumul_grade = $total_cumul_grade + ($credit_d * $grade_d);
                                        break;
                                    }
                                    switch($attendance_e){
                                        case "Ok":
                                            $total_cumul_grade = $total_cumul_grade + ($credit_e * $grade_e);
                                        break;
                                    }

                                    echo $total_cumul_grade;
                                }
                            ?>
                        </div>
                        <div class="cumulative_percentage" style="width: 25%; text-align:center;">
                            <?php 
                                if(isset($_GET['tamam'])){
                                    $total_cum_percentage = $total_cumul_grade / $total_cumul_credit;
                                    echo $total_cum_percentage . "%";
                                }
                            ?>
                        </div>
                    </div>
                    <div>
                        <button name="tamam" type="submit" id="cumul_cal">Calculate</button>
                    </div>
                </div>
            </div>
    </form>
    <script>
        document.getElementById("myCheck").setAttribute('data-value', "\u2261");

        function myFunction(){
        if (document.getElementById("myCheck").checked == true){
            document.getElementById("cumulative").style.marginTop = "-45px";
            checkBox.setAttribute('data-value', "\xD7");
        }else{
            document.getElementById("cumulative").style.marginTop = "-530px";
            document.getElementById("myCheck").setAttribute('data-value', "\u2261");
        }
        }
    </script>
</body>
</html>