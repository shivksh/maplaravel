@extends('forms.form-template')

@section('content')


 <h1 class="mt-5" > Register </h1>


    <form action=" {{ route('register-data') }} " method="post" enctype="multipart/form-data">      
   {{ @csrf_field() }}

         <div class="mt-5">
               <label for=""> Name </label> <br>
               <input type="text" id="input" name="name" class="form-control" placeholder="Enter Name"><br>
         </div>

         <div >
               <label for=""> Email </label> <br>
               <input type="email" id="input" name="email" class="form-control" placeholder="Enter Email"><br>
         </div>

         <div >
               <label for=""> Phone </label> <br>
               <input type="string" id="input" name="phone" class="form-control" placeholder="Enter Contact "><br>
         </div>

         <div >
               <label for=""> Password </label> <br>
               <input type="password" id="input" name="password" class="form-control" placeholder="Enter Password"><br>
         </div>

         <div >
               <label for=""> Confirm Password </label> <br>
               <input type="password" id="input" name="password_confirmation" class="form-control" placeholder="Confirm Password"><br>
         </div>

         <div >
               <label for=""> Upload Image </label> <br>
               <input type="file" name="image"><br>
         </div>
         <div class="mt-4">
               <label for=""> Latitude </label> <br>
               <input type="string" id="lat" name="lat" class="form-control" placeholder="Please Go On Map Below"><br>
         </div>

         <div >
               <label for=""> Longitude </label> <br>
               <input type="string" id="long" name="long" class="form-control" placeholder="Please Go On Map Below"><br>
         </div>

         <button type="submit" class="btn btn-primary btn-sm btn-block mt-3"> Submit  </button>
         <p class="mt-1">Already Registered ? <a href="/">Login Here</a> </p>

        <div id='map' style="height:200px;width:100%;">
        

        </div>


    </form>     
@endsection

@section('script')
<script>
      function initMap() {
        var myLatlng = {lat: 28.4595, lng: 77.0266};

        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 4, center: myLatlng});

        // Create the initial InfoWindow.
        var infoWindow = new google.maps.InfoWindow(
            {content: 'Click the map to get Lat/Lng!', position: myLatlng});
        infoWindow.open(map);

        // Configure the click listener.
        map.addListener('click', function(mapsMouseEvent) {
          // Close the current InfoWindow.
          infoWindow.close();

          // Create a new InfoWindow.
          infoWindow = new google.maps.InfoWindow({position: mapsMouseEvent.latLng});
          infoWindow.setContent(mapsMouseEvent.latLng.toString());
          $coordinate =  mapsMouseEvent.latLng.toString();
          $coordinate = $coordinate.slice(1,-1);
          $arr = $coordinate.split(',');
          $lati = $arr[0];
          $long = $arr[1];
          document.getElementById('lat').value = $lati;
          document.getElementById('long').value = $long;
          infoWindow.open(map);
        });
      }
    </script>
    <script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBLwluJqwWjZLR0L59g_OwolOEZ5myY0kE&callback=initMap">
    </script>

@endsection