@php
    use App\Models\Product;
@endphp
@extends('Fronted.master')
@section('content')
<div class="col-md-4 order-md-2 mb-4">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill"><?php echo Cart::count(); ?></span>
    </h4>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Product</th>
                <th scope="col">Qty</th>
                <th scope="col">Price</th>
                <th scope="col">Subtotal</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach(Cart::content() as $row) :?>
            @php
            // $product['image'] = explode('|', $product->image);
            $images = $row->image;
        @endphp
                <tr>
                    <td><img src="{{ asset('uploads/product/' . $images) }}"></td>
                    <td>
                        <p><strong><?php echo $row->name; ?></strong></p>
                        <p><?php echo ($row->options->has('size') ? $row->options->size : ''); ?></p>
                    </td>
                    <td><input type="text" value="<?php echo $row->qty; ?>"></td>
                    <td>$<?php echo $row->price; ?></td>
                    <td>$<?php echo $row->total; ?></td>
                </tr>

            <?php endforeach;?>

        </tbody>

        <tfoot>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>Subtotal</td>
                <td><?php echo Cart::subtotal(); ?></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>Tax</td>
                <td><?php echo Cart::tax(); ?></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
                <td>Total</td>
                <td><?php echo Cart::total(); ?></td>
            </tr>
        </tfoot>
 </table>
</div>
    @endsection
