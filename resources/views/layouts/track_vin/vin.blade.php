<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vin Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>
   
    <table class="table">
        <thead>
          <tr>
            <th scope="col">VIN NO</th>
            <th scope="col">{{ $vin_details[0]['vin'] }}</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">COLOR</th>
            <td>{{ @$vin_details[0]['color'] }}</td>
            
          </tr>
          <tr>
            <th scope="row">KEYS</th>
            <td>{{ @$vin_details[0]['key'] }}</td>
    
          </tr>
          <tr>
            <th scope="row">AUCTION</th>
            <td>{{ @$vin_details[0]['auction'] }}</td>
            
          </tr>
          
          <tr>
            <th scope="row">LOT</th>
            <td>{{ @$vin_details[0]['lot'] }}</td>
            
          </tr>
          <tr>
            <th scope="row">DELIEVERED TO WAREHOUSE</th>
            <td>{{ @$vin_details[0]['port'] }}</td>
            
          </tr>
          <tr>
            <th scope="row">BUYER NO</th>
            <td>{{ @$vin_details[0]['buyer_id'] }}</td>
            
          </tr>
        </tbody>
      </table>    

      <div class="container">
        <div class="row">
          <div class="flex flex-wrap">
            @foreach ($vin_details[0]['warehouse_image'] as $warehouse_images)
            <img src="{{asset($warehouse_images['name'])}}" alt=""class="" width="50">

            @endforeach

            @foreach ($vin_details[0]['auction_image'] as $auction_images)
            <img src="{{asset($auction_images['name'])}}" alt=""class="" width="50">

            @endforeach

            @foreach ($vin_details[0]['pickupimages'] as $pickup_image)
            <img src="{{asset($pickup_image['name'])}}" alt=""class="" width="50">

            @endforeach
          </div>
        </div>
      </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>