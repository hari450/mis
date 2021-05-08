@extends('frontend.theme')
@section('content')




<h2>Part number Page</h2>
<div class="container">
    <div class="row">
    <div class="col-md-3">
    <ul>
    @foreach($specification as $spec1)
            @foreach($spec1->specification as $spec2)
                   <label for="spec">{{  $spec2->name }}</label> <br>
                   @foreach($spec2->specificationTypes as $spec3)
                   <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                        <label for="vehicle1"> {{ $spec3->spec_type }}</label><br>
                
                   @endforeach

                   <br>
            @endforeach
        
    @endforeach
    </ul>
    </div>
        <div class="col-md-9">
            
                        @foreach($part_number as $part)
                        <div class="col-sm-4 col-md-3 box-product-outer">
                          <div class="box-product">
                              <div class="img-wrapper">
                                  <a href="{{  route('website.part', $part->id) }}">
                                      <img alt="Product" src="{{url('')}}/uploads/1619883414_110301998260_002.jpg">
                                  </a>
                                  <div class="tags">
                                      <span class="label-tags"><span class="label label-danger">Sale</span></span>
                                      <span class="label-tags"><span class="label label-info">Featured</span></span>
                                      <span class="label-tags"><span class="label label-warning">Polo</span></span>
                                  </div>
                                  <div class="option">
                                      <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add to Cart"><i class="ace-icon fa fa-shopping-cart"></i></a>
                                      <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Compare"><i class="ace-icon fa fa-align-left"></i></a>
                                      <a href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Wishlist"><i class="ace-icon fa fa-heart"></i></a>
                                  </div>
                              </div>
                              <h6><a href="detail.html">{{ $part->part_number }}</a></h6>
                              <div class="price">
                                  <div>$16.59<span class="price-down">-10%</span></div>
                                  <span class="price-old">$15.00</span>
                              </div>
                          </div>
                        </div>  

                        @endforeach
                      
            
        </div>
    </div>
</div>



@endsection