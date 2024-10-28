<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
        .center{
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
        }
        .font_size{
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }
        .img_size{
            width: 160px;
            height: 160px;
        }
        .th_color{
            background: skyblue;
        }
        .th_deg{
            padding: 30px;
        }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')

     @include('admin.header')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">

                <h2 class="font_size">All Products</h2>

                <table class="center">
                    
                    <tr class="th_color">
                    <th class="th_deg">Product Title</th>
                    <th class="th_deg">Description</th>
                    <th class="th_deg">Quantity</th>
                    <th class="th_deg">Category</th>
                    <th class="th_deg">Price</th>
                    <th class="th_deg">Discount Price</th>
                    <th class="th_deg">Product Image</th>
                    </tr>

                    @foreach($product as $product)

                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount}}</td>
                        <td>
                            <img class="img_size" src="/product/{{$product->image}}">
                        </td>
                    </tr>

                    @endforeach

                </table>

            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  
</body>
</html>