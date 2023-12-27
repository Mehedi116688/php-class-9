<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>
<body>
    <div class="container bg-light mt-5 p-5">
        <div class="row">
            <div class="col-md-6 offset-3">
                <pre>
                <?php

                    
                    

                    if (isset($_FILES['photo'])) {
                        foreach ($_FILES['photo']['tmp_name'] as $key => $error) {
                            $fileName = $_FILES['photo']['name'][$key];
                            $file_tmp = $_FILES['photo']['tmp_name'][$key];
                            $upload = 'uploads/';
                            $rand = rand(100, 10000);

                            if (move_uploaded_file($file_tmp, $upload . $rand . $fileName)) {
                                echo 'successfully uploaded';
                            }else {
                                echo 'error';
                            }
                        }
                        

                        // move_uploaded_file($file_tmp, $upload . $rand . $fileName);
                    }

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $submitName = isset($_POST['name']) ? htmlspecialchars($_POST['name']): '';
                        $submitEmail = isset($_POST['email']) ? htmlspecialchars($_POST['email']): '';
                        $submitPassword = isset($_POST['password']) ? htmlspecialchars($_POST['password']): '';
                        $Gender = isset($_POST['gender']) ? $_POST['gender'] : 'Not Selected';
                        $SubmitDate = isset($_POST['datepicker']) ? $_POST['datepicker'] : 'Not Selected';
                        $SubmitTime = isset($_POST['timepicker']) ? $_POST['timepicker'] : 'Not Selected';
                        $Options = isset($_POST['options']) ? $_POST['options'] : 'Not Selected';
                        $Subcribe = isset($_POST['subcribe']) ? $_POST['subcribe'] : 'Not Selected';
                        $photo = isset($_FILES['photo'])? 'uploaded': '';
                        


                        echo "<div class='mb-2 alert alert-primary'>Submitted Name: $submitName</div>";
                        echo "<div class='mb-2 alert alert-primary'>Submitted Email: $submitEmail</div>";
                        echo "<div class='mb-2 alert alert-primary'>Submitted Password: $submitPassword</div>";
                        echo "<div class='mb-2 alert alert-primary'>Submitted Gender: $Gender</div>";
                        echo "<div class='mb-2 alert alert-primary'>Submitted Date: $SubmitDate</div>";
                        echo "<div class='mb-2 alert alert-primary'>Time: $SubmitTime</div>";
                        echo "<div class='mb-2 alert alert-primary'>Option: $Options</div>";
                        echo "<div class='mb-2 alert alert-primary'>Subscribe: $Subcribe</div>";
                        echo "<div class='mb-2 alert alert-primary'>Photo: $photo</div>";
                        
                    }
                ?>
                </pre>

                <h1 class="text-center mb-4 ">Registration Form</h1>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Your Name">
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Your Email">
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Your Password">
                    </div>

                    <div class="form-group">
                        <input type="radio" id="male" name="gender" value="male" <?= isset($_POST['gender']) && $_POST['gender'] == 'male' ? 'checked' : '';?>>
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female"<?= isset($_POST['gender']) && $_POST['gender'] == 'female' ? 'checked' : '';?>>
                        <label for="female">Female</label>

                    </div>

                    <div class="form-group">
                        <label for="datepicker">Date of Birth:</label>
                        <input type="text" id="datepicker" name="datepicker" >
                    </div>

                    <div class="form-group">
                        <label for="timepicker">Time:</label>
                        <input type="text" id="timepicker" name="timepicker" class="mt-1 p-2 w-full border rounded-md">
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="option1" name="options" value="option1" <?= isset($_POST['options']) && $_POST['options'] == 'option1' ? 'checked' : '';?>>
                        <label for="option1">Option1</label>
                        <input type="checkbox" id="option2" name="options" value="option2" <?= isset($_POST['options']) && $_POST['options'] == 'option2' ? 'checked' : '';?>>
                        <label for="option2">Option2</label>

                    </div>

                    <div class="form-group">
                        <label for="photo" >Photo:</label>
                        <input type="file" name="photo[]" multiple>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="subcribe" name="subcribe" <?= isset($_POST['subcribe']) && $_POST['subcribe'] == 'on' ? 'checked' : '';?>>
                        <label for="subcribe">Subcribe</label>
                    </div>

                    <div class="text-right">
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

            <script>
                // Initialize Flatpickr for the date and time pickers
                flatpickr("#datepicker", {
                    enableTime: false,
                    dateFormat: "d-m-y",
                });

                flatpickr("#timepicker",{
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                });
            </script>
</body>
</html>