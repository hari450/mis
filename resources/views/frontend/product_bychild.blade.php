@extends('frontend.theme')
@section('content')


<div class="container">
    <div class="row">

            <h3>{{ $childcategory->name }}</h3>

        <div class="col-md-12 product_list">
            @foreach ($products as $product)
                <div class="product">
                    <a href="#" class="product_id" id="{{ $product->id }}">
                        <img class="center-block" src="{{url('')}}/uploads/{{ $product->image }}" alt="" width="50%">
                        <div class="text-center">{{ $product->name }}</div>
                    </a>
                </div>
            @endforeach
            <div class="product product_id" id="0">
                <a href="#" class="product_id" >

                    <div class="text-center">See ALL</div>
                </a>
            </div>
        </div>
    </div>

    <div class="row">

        @include('frontend.parentlist.datatables')
    </div>
</div>

<style>
   .product_list
   {
       display: flex
    }
    .product{
        width: 17%;
    }
    .product:hover{
        border: 1px solid #8580e0;
    }
</style>



<script>


    //datatables
    $(function () {
        var table;
        datatables(null);
        $(".product_id").click(function(){
            var p_id = $(this).attr('id')
            $('.data-table').DataTable().destroy();
            datatables(p_id);
        })


function datatables(p_id){
    table = $('.data-table').DataTable({
    processing: true,
    serverSide: true,
    ajax: {
          url: "{{ route('website.products', request()->route('childategory_id') ) }}",
          type: 'GET',
          data: function (d) {
          d.prod_id = p_id;
          }
         },

    columns: [
        {data: 'img', name: 'img'},
        {data: 'part_number', name: 'part_number'},
        {data: 'nominal_thread_m', name: 'nominal_thread_m'},
        {data: 'nominal_thread_inch', name: 'nominal_thread_inch'},
        {data: 'product_length', name: 'product_length'},
        {data: 'mounting_hole_shape', name: 'mounting_hole_shape'},
        {data: 'material', name: 'material'},
        {data: 'quantity', name: 'quantity'},

        // {data: 'email', name: 'email'},
        // {data: 'action', name: 'action', orderable: false, searchable: false},
    ]
});
}

});
</script>

@endsection
