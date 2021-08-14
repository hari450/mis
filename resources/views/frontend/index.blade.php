@extends('frontend.theme')
@section('content')
<form action="home.php" id="loginfrm" name="loginfrm" method="post" target="_top">
    <div class="login-wrapper">
        <div class="card login-card">
            <div class="card-body px-5  ">
                <h1 class="text-center login-title mt-3 mb-4">Login</h1>
                <div class='alert alert-success' role='alert'>Your login details has been sent to your email.</div>
                <div id="msgbox">Sample Message</div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="input-group login-input-wrapper">
                                <div class="input-group-addon login-input-icon-wrapper">
                                    <span class="bi bi-envelope login-input-icon"></span>
                                </div>
                                <input required name="txtemail" id="txtemail" type="email"
                                    placeholder="Input your user ID or Email" name="pass"
                                    class="login-input form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="input-group login-input-wrapper">
                                <div class="input-group-addon login-input-icon-wrapper">
                                    <span class="bi bi-key login-input-icon"></span>
                                </div>
                                <input required name="pwd" id="pwd" type="password" placeholder="Input your password"
                                    name="pass" class="login-input form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-sm-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Default checkbox
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6 text-end">
                        <a class="login-forgot" href="./forgot-password.php">Forgot password</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <button type="submit" id="login_btn" class="btn btn-primary btn-login">
                            <span class="bi bi-box-arrow-right"></span> LOG IN
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<div class="m-5">
    <h4 class="mb-0 text-secondary">Bootstrap 4</h4>
    <h1>Vertical Collapsible Nav <small class="text-secondary">without CSS/JS</small></h1>
    <ul class="nav flex-column">
        @foreach($category as $k=>$cat)
        <li class="nav-item"><a class="nav-link" href="#first{{$k}}" data-toggle="collapse" aria-expanded="false"
                aria-controls="first">{{ $cat->name }}</a>
            <div class="collapse" id="first{{$k}}">
                <ul class="nav flex-column ml-3" style="margin-left: 70px;">
                    @foreach($cat->subcategory as $kk=>$subcat)
                    <li class="nav-item"><a class="nav-link"
                            href="{{ route('website.parentcats',$subcat->id) }}">{{ $subcat->name }}</a>

                        {{-- <div class="collapse" id="first{{$k}}{{$kk}}">
                        <ul class="nav flex-column ml-3" style="margin-left: 70px;">
                            @foreach($subcat->parentcategory as $kkk=>$parentcat)
                            <li class="nav-item"><a class="nav-link" href="#first{{$k}}{{$kk}}{{$kkk}}"
                                    data-toggle="collapse" aria-expanded="false" aria-controls="first"
                                    href="#">{{ $parentcat->name }}</a>

                                <div class="collapse" id="first{{$k}}{{$kk}}{{$kkk}}">
                                    <ul class="nav flex-column ml-3" style="margin-left: 70px;">
                                        @foreach($parentcat->childcategories as $childcat)
                                        <li class="nav-item"><a href="{{  route('website.product', $childcat->id) }}"
                                                class="nav-link">{{ $childcat->name }}</a>

                                        </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </li>
                            @endforeach
                        </ul>
            </div> --}}
        </li>
        @endforeach
    </ul>
</div>
</li>
@endforeach

</ul>
</div>


<!--


<div class="m-5">
  <h4 class="mb-0 text-secondary">Bootstrap 4</h4>
  <h1>Vertical Collapsible Nav <small class="text-secondary">without CSS/JS</small></h1>
  <ul class="nav flex-column">
    <li class="nav-item"><a class="nav-link" href="#first" data-toggle="collapse" aria-expanded="false" aria-controls="first">First</a>
      <div class="collapse" id="first">
        <ul class="nav flex-column ml-3">
          <li class="nav-item"><a class="nav-link" href="#0">1 First</a></li>
          <li class="nav-item"><a class="nav-link" href="#0">2 First</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item"><a class="nav-link active" href="#second" data-toggle="collapse" aria-expanded="false" aria-controls="second">Second</a>
      <div class="collapse" id="second">
        <ul class="nav flex-column ml-3">
          <li class="nav-item"><a class="nav-link" href="#0">1 Second</a></li>
          <li class="nav-item"><a class="nav-link" href="#0">2 Second</a></li>
          <li class="nav-item"><a class="nav-link" href="#0">3 Second</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item"><a class="nav-link" href="#third" data-toggle="collapse" aria-expanded="false" aria-controls="third">Third</a>
      <div class="collapse" id="third">
        <ul class="nav flex-column ml-3">
          <li class="nav-item"><a class="nav-link" href="#0">1 Third</a></li>
          <li class="nav-item"><a class="nav-link" href="#0">2 Third</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item"><a class="nav-link disabled" href="#0">Fourth</a></li>
  </ul>
</div> -->
<!--
<ul >
@foreach($category as $cat)
  <li>
    {{ $cat->name }}
       <ul  >
       @foreach($cat->subcategory as $subcat)
         <li>{{ $subcat->name }}
            <ul  >
                     @foreach($subcat->parentcategory as $parentcat)
                        <li>{{ $parentcat->name }}
                               <ul  >
                                    @foreach($parentcat->childcategories as $childcat)
                                        <li>{{ $childcat->name }}
                                            <ul  >
                                                @foreach($childcat->products as $product)
                                                    <li> {{ $product->name }}
                                                            <ul  >
                                                                @foreach($product->product_part_number as $partnumber)
                                                                <li>{{ $partnumber->part_number }}

                                                                </li>
                                                                @endforeach
                                                            </ul >
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                               </ul>
                        </li>
                     @endforeach
            </ul>
         </li>
       @endforeach
       </ul>
  </li>
@endforeach
</ul> -->

@endsection