<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" action="form_processor.php" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Week 5 Lab - Course Manager</title>
</head>

<body>
    <h1>Course Manager</h1>
    <form enctype="multipart/form-data" action="form_processor.php" method="post" id="courseForm">
        <input type="text" name="courseNameToAdd" id="courseName" placeholder="ex.COMP3015" />
        <span><input type="submit" value="ADD" /></span>
        <br>
        <br>
        <?php include("main.php") ?>
        <div>
            <!-- <img src="<?php echo $picture; ?>" /> -->
        </div>
        <br>
        <br>
    </form>
    <script>
        document.querySelectorAll(".courseNames").forEach(e => {
            e.addEventListener("change", event => {
                const courseName = event.target.getAttribute("name");
                const form = document.getElementById("courseForm");
                const input = document.createElement("input");
                input.setAttribute("type", "hidden");
                input.setAttribute("name", "courseNameToToggle");
                input.setAttribute("value", courseName);
                form.appendChild(input);
                form.submit();
            });
        });
        document.querySelectorAll(".deleteButtons").forEach(e => {
            e.addEventListener("click", event => {
                const courseName = event.target.getAttribute("name");
                const form = document.getElementById("courseForm");
                const input = document.createElement("input");
                input.setAttribute("type", "hidden");
                input.setAttribute("name", "courseNameToDelete");
                input.setAttribute("value", courseName);
                form.appendChild(input);
                form.submit();
            });
        });

        document.querySelectorAll(".editButtons").forEach(e => {
            e.addEventListener("click", event => {
                const newCourseName = prompt("Please enter new course name.");
                const courseName = event.target.getAttribute("name");
                const form = document.getElementById("courseForm");
                var inputOne = document.createElement("input");
                inputOne.setAttribute("type", "hidden");
                inputOne.setAttribute("name", "courseNameToEdit");
                inputOne.setAttribute("value", courseName);
                form.appendChild(inputOne);
                var inputTwo = document.createElement("input");
                inputTwo.setAttribute("type", "hidden");
                inputTwo.setAttribute("name", "courseNameToEditTo");
                inputTwo.setAttribute("value", newCourseName);
                form.appendChild(inputTwo);
                form.submit();
            });
        });
    </script>

    <footer>
    </footer>

</body>

</html>