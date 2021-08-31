@extends('frontend.theme')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-5">
            <div class="card my-3 p-3">
                <img src="{{ url('')."/uploads/$part_number->icon" }}" alt="" width="500px">
            </div>

        </div>
        <div class="col-sm-7">
            <div class="card my-3 p-3">
                <h3 class="nav-category-title">Specification</h3>

                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th scope="row">Part Number</th>
                            <td>{{ $part_number->part_number }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nominal Thread M</th>
                            <td>{{ $part_number->nominal_thread_m }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Nominal Thread Inch</th>
                            <td>{{ $part_number->nominal_thread_inch }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Product Length</th>
                            <td>{{ $part_number->product_length }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Pinch</th>
                            <td>{{ $part_number->pinch }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Detailed Ship</th>
                            <td>{{ $part_number->detailed_ship }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Mounting Hole Shape</th>
                            <td>{{ $part_number->mounting_hole_shape }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Basic Shape</th>
                            <td>{{ $part_number->basic_shape }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Material</th>
                            <td>{{ $part_number->material }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Surface Treatment</th>
                            <td>{{ $part_number->surface_treatment }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Tip Shape</th>
                            <td>{{ $part_number->tip_shape }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Additional Shape</th>
                            <td>{{ $part_number->additional_shape }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Sales Unit</th>
                            <td>{{ $part_number->additional_shape }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Screw Type</th>
                            <td>{{ $part_number->screw_type }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="row product_data">
        <input type="hidden" class="product_id" value="{{ $part_number->id }}"> <!-- Your Product ID -->
        <input type="text" class="qty-input" value="1"> <!-- Your Number of Quantity -->
        <button type="button" class="add-to-cart-btn btn btn-primary">Add to Cart</button>
        </div>

        {{-- <p class="btn-holder"><a href="{{ route('add.to.cart', $part_number->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p> --}}

    </div>
</div>

<script>
    $(document).ready(function () {
        $('.add-to-cart-btn').click(function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product_id = $(this).closest('.product_data').find('.product_id').val();
            var quantity = $(this).closest('.product_data').find('.qty-input').val();

            $.ajax({
                url: "{{ route('add-to-cart') }}",
                method: "POST",
                data: {
                    'quantity': quantity,
                    'product_id': product_id,
                },
                success: function (response) {
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                },
            });
        });
    });
</script>

@endsection
