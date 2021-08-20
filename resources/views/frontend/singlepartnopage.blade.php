@extends('frontend.theme')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-5">

            <img src="{{ url('')."/uploads/$part_number->icon" }}" alt="" width="500px">

        </div>
        <div class="col-sm-7">
            <h3>Specification</h3>
            <table class="table">
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
</div>


@endsection