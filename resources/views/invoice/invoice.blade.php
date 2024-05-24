<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            background: url('{{ public_path('assets/images/invoice-background.webp') }}') no-repeat center center;
            background-size: cover;
            color: #333;
            padding: 5px;
        }
        .invoice-box {
            width: 100%;
            margin: auto;
            padding: 20px;
            
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 14px;
            line-height: 24px;
            font-family: 'DejaVu Sans', sans-serif;
            color: #555;
            background: rgba(255, 255, 255, 0.526); /* Adding a slight white background to make text more readable */
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        .invoice-box table td {
            padding: 0px;
            vertical-align: top;
        }
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
        .terms {
            margin-top: 20px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                          
                            <td>
                                Invoice #: {{ $invoiceNumber }}<br>
                                Created: {{ $invoiceDate }}<br>
                                Due: {{ $dueDate }}<br><br>
                                {{ $seller['name'] }}<br>
                                Contact: {{ $seller['contact'] }}<br>
                                Address: {{ $seller['address'] }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Inventory<br>
                                123 Warehouse Road<br>
                                Khulna, 019999999
                            </td>
                            <td>
                                {{ $customer->name }}<br>
                                {{ $customer->address }}<br>
                                {{ $customer->phone }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>QTY</td>
                <td>DESCRIPTION</td>
                <td>UNIT PRICE</td>
                <td>AMOUNT</td>
            </tr>
            
            @foreach ($cartItems as $item)
                <tr class="item">
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->name }}</td>
                    <td>${{ number_format($item->price, 2) }}</td>
                    <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                </tr>
            @endforeach
            
            <tr class="total">
                <td colspan="3"></td>
                <td>Subtotal: ${{ number_format($subtotal, 2) }}</td>
            </tr>
            <tr class="total">
                <td colspan="3"></td>
                <td>Sales Tax (5%): ${{ number_format($tax, 2) }}</td>
            </tr>
            <tr class="total">
                <td colspan="3"></td>
                <td><strong>Invoice Total: ${{ number_format($total, 2) }}</strong></td>
            </tr>
        </table>
        <div class="terms">
            <p>Terms & Conditions</p>
            <p>Payment is due within 15 days</p>
            <p>Sonali Bank<br>
            Account number: 1234567890<br>
       
        </div>
    </div>
</body>
</html>
