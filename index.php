<?php
$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];
function park($hotels)
{
    $filterHotel = [];
    $parkValue = null;
    
    if (isset($_GET['parking'])) {
        $parkValue = $_GET['parking'];
    }

    if ($parkValue == 1) {
        $filterHotel = [];
        foreach ($hotels as $hotel) {
            if ($hotel['parking']) {
                array_push($filterHotel, $hotel);
            }
        }
        return $filterHotel;
    } 

    elseif ($parkValue == 2) {
        $filterHotel = [];
        foreach ($hotels as $hotel) {
            if (!$hotel['parking']) {
                array_push($filterHotel, $hotel);
            }
        }
        return $filterHotel;
    } 
    
    else {
        return $hotels;
    }

}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>PhP-hotel</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-12 d-flex align-items-center justify-content-center flex-wrap">
                <form action="./index.php" methods="GET">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="parking" id="flexRadioDefault1" value="1">
                        <label class="form-check-label" for="flexRadioDefault1">With parking</label>
                    </div>
                    <div class="form-check my-2">
                        <input class="form-check-input" type="radio" name="parking" id="flexRadioDefault2" value="2">
                        <label class="form-check-label" for="flexRadioDefault2">Without parking</label>
                    </div>
                    <button type="submit" class="btn btn-success py-2 px-4 m-3">Filter</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Parking</th>
                            <th scope="col">Vote</th>
                            <th scope="col">Distance to center</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (park($hotels) as $hotel) { ?>
                            <tr>
                                <td>
                                    <p><?php echo $hotel['name']; ?></p>
                                </td>
                                <td>
                                    <p><?php echo $hotel['description']; ?></p>
                                </td>
                                <td>
                                    <p>
                                        <?php
                                        if ($hotel['parking']) {
                                            echo 'Yes';
                                        } else {
                                            echo 'No';
                                        }
                                        ?>
                                    </p>
                                </td>
                                <td>
                                    <p><?php echo $hotel['vote']; ?></p>
                                </td>
                                <td>
                                    <p><?php echo $hotel['distance_to_center']; ?> km</p>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>