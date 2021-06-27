@extends('frontend.theme')
@section('content')

<div class="col-lg-3 col-sm-3 col-md-3 left">
    <ul class="list-group accordion flex-column">
       @foreach ($parent_categorys as $k=>$parent_category)
            <li class="list-group-item">
                <a class="nav-link" href="#first{{$k}}" data-toggle="collapse" aria-expanded="false" aria-controls="first">{{ $parent_category->name }}</a>
                        <div class="collapse" id="first{{$k}}">
                            <ul class="nav flex-column ml-3" style="margin-left: 70px;">
                                @foreach($parent_category->childcategories as $kk=>$child)
                                            <li class="nav-item"><a class="nav-link" href="#first{{$k}}{{$kk}}" data-toggle="collapse" aria-expanded="false" aria-controls="first" href="#">{{ $child->name }}</a>

                                                <div class="collapse" id="first{{$k}}{{$kk}}">
                                                        <ul class="nav flex-column ml-3" style="margin-left: 70px;">
                                                        @foreach($child->products as $product)
                                                            <li class="nav-item"><a href="{{  route('website.productpartnumber', $product->id) }}" class="nav-link"   >{{ $product->name }}</a>

                                                            </li>
                                                        @endforeach
                                                        </ul>
                                                </div>

                                        </li>
                                @endforeach
                            </ul>
                        </div>
            </li>
       @endforeach
      </ul>
  </div>


  <div class="col-md-9 col-lg-9 col-sm-9 right">
    @foreach ($parent_categorys as $parent_category)
       <div class="col-md-4 hover">
            <img class="center-block" src="{{url('')}}/uploads/{{ $parent_category->icon }}" alt="">
             <div class="text-center">{{ $parent_category->name }}</div>
       </div>

    @endforeach

</div>

