<footer class="pt-5">
  <div class="wrapper text-kh">
    <div class="container-fluid">
    <hr>
    
      <div class="row p-3">
        <div class="col-md-4 col-12 text-center-sm pt-2">
          <!-- <div class="row text-center-sm">
            <img class="" style="width: 150px;" src="{{asset('images/logo.png')}}" alt="">
          </div> -->
          <h6 class="font-weight-bold">
          អាសយដ្ឋាន
            </h6>
          <strong><p class="text-center-sm">ក្រុមហុន : {{$company[0]->campanyName}}</p></strong>
          <span>
            {{$company[0]->campanyAddress}} <br>
          </span>
          <span>
          លេខចុះបញ្ជី : {{$company[0]->campanyReg}}
          </span>
          

        </div>



        <div class="col-12 col-md-4 text-center-sm pt-2">
           <h6 class="font-weight-bold">
              ទំនាក់ទំនង
            </h6>
          <span class="font-weight-bold">{{$company[0]->campanyPhone}}</span><br>
          <span>Email : {{$company[0]->campanyEmail}}</span><br>
          <!-- <a href=" https://www.instagram.com/theyeon_cambodia"><i class="fab fa-instagram-square">sdfdf</i></a> -->
          <!-- <i class="fab fa-instagram-square"></i> -->
          <br>
          <a href=" https://www.instagram.com/theyeon_cambodia" target="_blank"><i class="fab fa-instagram fa-3x"></i></a>
          <a href="https://www.facebook.com/theyeoncambodia" target="_blank"><i class="pl-4 fab fa-facebook-square fa-3x"></i></a>    
        </div>

        <div class="pt-2 col-12 col-md-4 text-center-sm">
          <img class="border shadow img-fluid" src="{{asset('images/logo-sm.jpg')}}" alt="">
        </div>
        
        
        


      </div>

      <hr>
        <div class="row text-center-sm">
          <div data-toggle="tooltip" data-placement="top" class="col text-center" title="">
            <!-- <p class="pt-2">COPYRIGHT © THEYEON CAMBODIA ALL RIGHTS RESERVED.</p> -->
            <p class="">© 2020 រក្សា​សិទ្ធិ​គ្រប់​យ៉ាង​ដោយ​ The Yeon Cambodia</p>
          </div>
        </div>


    </div>
  </div>
</footer>