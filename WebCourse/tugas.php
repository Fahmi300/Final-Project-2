<?php


session_start();

     if (!isset($_SESSION["login"])) {
         echo "<script>
                 alert('Login terlebih dahulu');
                document.location.href = 'login.php';
                </script>";
  exit;
 }


include 'layout/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css"> <!-- Link to your stylesheet -->
    <title>Material Viewer</title>
    <style>
        /* CSS for this specific page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

     

        .material-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center; /* Center items vertically */
            text-align: center; /* Center text within each section */
        }

        .material-image {
            max-width: 400px; /* Adjust the image width as needed */
            height: 400px;
            margin-right: 20px;
        }

        .material-info {
            flex: 1; /* Expand to fill remaining space */
            width: 100%;
            text-align: left; /* Align text to the left */
        }

        .material-info h2 {
            text-align: center;
            font-size: 44px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0%
        }

        .material-info p {
            font-size: 16px;
            margin-bottom: 280px;
        }

        .material-actions {
            text-align: left; /* Align buttons to the left */
        }

        .btn-open-material {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn-open-material:hover {
            background-color: #0056b3;
        }

        .btn-like, .btn-save {
            background-color: #f0f0f0;
            color: #007BFF;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
.upload-form {
    text-align: center;
    margin: 20px auto;
    padding: 20px;
    max-width: 300px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f2f2f2;
    display: none; /* Initially hide the form */
}

.upload-form input[type="file"] {
    margin-bottom: 10px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.upload-form button[type="submit"] {
    padding: 10px 20px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.upload-form button[type="submit"]:hover {
    background-color: #0056b3;
}

/* Style the "Toggle Form" button */
#toggleFormButton {
    margin-left: 43%;
    margin-top: 20px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
}

#toggleFormButton:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>

    <div class="material-container">
        <img class="material-image" src="https://m.media-amazon.com/images/W/MEDIAX_792452-T2/images/I/61XlLatziOL._AC_UF1000,1000_QL80_.jpg" alt="Material 1 Cover">
        <div>
            <div class="material-info">
                <h2>Assignments</h2>
                <p class="desc">A book is a medium for recording information in the form of writing or images, typically composed of many pages (made of papyrus, parchment, vellum, or paper) bound together and protected by a cover.
                </p>
                
            </div>
            <div class="material-actions">
                            <button class="btn-like">Like</button>
                <button class="btn-save">Save</button>
            </div>
            <button id="toggleFormButton">Upload</button>
            <form id="submissionForm" action="submit-assignment" method="post" enctype="multipart/form-data" class="upload-form" style="display: none;">
                <input type="file" name="assignmentFile" id="assignmentFile" accept=".pdf,.docx">
                <button type="submit">Upload Material</button>
            </form>   
        </div>
        
    </div>
    <script>document.addEventListener('DOMContentLoaded', function() {
        const toggleFormButton = document.getElementById('toggleFormButton');
        const submissionForm = document.getElementById('submissionForm');
    
        // Add a click event listener to the button
        toggleFormButton.addEventListener('click', function() {
            // Toggle the form's visibility
            if (submissionForm.style.display === 'none' || submissionForm.style.display === '') {
                submissionForm.style.display = 'block';
            } else {
                submissionForm.style.display = 'none';
            }
        });
    });</script>
</body>
</html>
