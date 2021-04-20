<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Player Lookup</title>
    <meta name="description" content="Sports Player Lookup">

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    
    <!-- Fontawesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!-- MY CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/athlete_style.css">
</head>
<body>

    <div class="container-fluid extend">
            <!-- As a link -->
        <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url();?>"><i class="fas fa-running"></i>Sports Player Lookup</a>
        </div>
        </nav>

        <div class="row align-items-start m-0">

            <div class="col-3 p-4">

                <h4>Search Users</h4>
                <form action="/athletes/search" method="POST">

                    <input class="form-control" type="text" name="name" placeholder="Name" aria-label="default input example">

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" name="gender[]" value="male" id="male">
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="gender[]" value="female" id="female">
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                    </div>

                    <p class="mt-3 mb-0">Sports</p>

                <!-- Generate checkbox based on the sports saved on the database -->
<?php           foreach($sports as $sport){     ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="sport[]" value="<?=$sport['sport']?>" id="<?=$sport['id']?>">
                        <label class="form-check-label" for="<?=$sport['sport']?>">
                            <?=$sport['sport']?>
                        </label>
                    </div>
<?php           }                               ?>

                    <input class="btn btn-primary btn-sm float-end" type="submit" value="Search">
                </form>
            </div>

            <div class="col-9 p-2">
                <!-- Displaying list of athletes -->
                <div class="row">
<?php           foreach($athletes as $athlete){     ?>
                
                    <div class="col-sm-3">
                        <div class="card">
                        <div class="card-body">
                            <img src="<?=$athlete['picture']?>" class="rounded rounded mx-auto d-block profile p-0 " alt="...">
                            <p class="text-center"><?=$athlete['name']?></p>
                        </div>
                        </div>
                    </div>
<?php           }                               ?>                     
                </div>

            </div>

        </div>

    </div>

</body>
</html>