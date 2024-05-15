<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Selected Agriculture Courses</title>
<link rel="stylesheet" href="style2.css">
</head>
<body>
<section>


    <h2>Your Selected Courses:</h2>
    <ul>
        <?php
        if(isset($_POST['course']) && is_array($_POST['course'])) {
            $selectedCourses = $_POST['course'];
            if (!empty($selectedCourses)) {
                $count = 0;
                foreach ($selectedCourses as $course) {
                    echo "<li>$course</li>";
                    $count++;
                    if ($count >= 3) {
                        break; // Limit to maximum 3 courses
                    }
                }
            } else {
                echo "<li>No courses selected.</li>";
            }
        } else {
            echo "<li>No courses selected or invalid data.</li>";
        }
        ?>


</section>
<section>
    <h2>APPLY NOW</h2>
    <h2>Universities Providing</h2>
    <ul>
        <li><a href="https://www.nust.na/admissions">Namibia University of Science and Technology</a> </li>
        <li><a href="https://www.unam.edu.na/online-application">University of Namibia</a> </li>
        <li><a href="https://ium.edu.na/application-forms/">The International University of Management</a> </li>
        <li><a href="https://namibiahub.com/triumphant-college-admission-application-forms/">The International University of Management</a> </li>

    </ul>
</section>
</body>
</html>

