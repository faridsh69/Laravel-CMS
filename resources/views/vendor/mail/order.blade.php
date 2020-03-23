<style>
    td {
        border: 1px solid #000;
        padding: 10px;
    }
</style>
<div>
    <h1>@lang('Order Registred')</h1>
    <div>
        <h2>@lang('Order Info'):</h2>
        <table cellspacing="0">
            <tbody>
                <tr>
                    <td>@lang('Date'):</td>
                    <td>{{ $order->created_at }}</td>
                </tr>
                <tr>
                    <td>@lang('Total Product Price'):</td>
                    <td>{{ $order->total_price }}</td>
                </tr>
                <tr>
                    <td>@lang('Shipping Price'):</td>
                    <td>{{ $order->shipping_price ?? 0 }}</td>
                </tr>
                <tr>
                    <td>@lang('Total Price'):</td>
                    <td>{{ $order->total_price + ( $order->shipping_price ?? 0 ) }}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <table cellspacing="0">
            <tbody>
                <tr>
                    <td style="background-color: darkgreen; color: white">@lang('Customer Info'):</td>
                </tr>
                <tr>
                    <td>@lang('Name'):</td>
                    <td>{{ $order->user->name }}</td>
                </tr>
                <tr>
                    <td>@lang('Company'):</td>
                    <td>{{ $order->user->company }}</td>
                </tr>
                <tr>
                    <td>@lang('Country')</td>
                    <td>{{ $order->user->country }}</td>
                </tr>
                <tr>
                    <td>@lang('City')</td>
                    <td>{{ $order->user->city }}</td>
                </tr>
                <tr>
                    <td>@lang('Postal Code')</td>
                    <td>{{ $order->user->postal_code }}</td>
                </tr>
                <tr>
                    <td>@lang('Address')</td>
                    <td>{{ $order->user->address }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <h2>@lang('Order Details'):</h2>
        <div>
            <h3>@lang('Products'):</h3>
            <table cellspacing="0">
                <thead>
                    <tr>
                        <th>@lang('Product')</th>
                        <th>@lang('Quantity')</th>
                        <th>@lang('Items')</th>
                        <th>@lang('Price')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderItems as $orderItem)
                        <tr>
                            <td>{{ $orderItem->restaurantProduct->product->name }}</td>
                            <td>{{ $orderItem->quantity }}</td>
                            <td>
                                @php
                                    $productPrice = $orderItem->price;
                                @endphp

                                @foreach($orderItem->orderItemAttributes as $attributeItem)
                                    {{ $attributeItem->restaurantAttributeItem->categoryAttributeItem->categoryAttribute->name}} :
                                    {{ $attributeItem->restaurantAttributeItem->categoryAttributeItem->name }}
                                    <br>
                                    @php
                                        $productPrice += $attributeItem->restaurantAttributeItem->price;
                                    @endphp
                                @endforeach
                            </td>
                            <td>{{ $productPrice * $orderItem->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
