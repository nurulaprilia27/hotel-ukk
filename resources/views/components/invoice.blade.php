<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{--
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    {{--
    <link rel="stylesheet" type="text/css"
        href="http://fonts.googleapis.com/css?family=Ubuntu:regular,bold&subset=Latin"> --}}
    <title>Document</title>
</head>

<body>
    <div class="content">
        <h1> Hotel </h1>
        {{--
        <hr style="margin-top: 10px; background-color: black; height: 1.3px"> --}}
        <hr style="margin-top: -5px; background-color: black; height: 0.1px">
        <div class="customer-detail">
            <h2 style="font-weight: 500; text-transform: uppercase;">Detail Transaksi</h2>
            <label style="display: block; font-size: 19px;">Nama Pemesan : {{ $transaksi->user->name }}</label>
            <label style="display: block; font-size: 19px;">Email : {{ $transaksi->user->email }}</label>

        </div>
        <div class="payment-detail" style="margin-top: 20px;">
            <table style="border: 1px solid; width:100%;">
                <thead>
                    <tr style="padding: 10px;">
                        <th style="border: 1px solid;">Tipe Kamar</th>
                        <th style="border: 1px solid;">Jumlah Kamar</th>
                        <th style="border: 1px solid;">Checkin</th>
                        <th style="border: 1px solid;">Checkout</th>
                        <th style="border: 1px solid;">Total Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="padding: 10px;">
                        <td style="border: 1px solid; text-align: center;">{{ $transaksi->tipe_kamar->nama_kamar }}</td>
                        <td style="border: 1px solid; text-align: center;">{{ $transaksi->jumlah_kamar }}</td>
                        <td style="border: 1px solid; text-align: center;">{{ $transaksi->tanggal_checkin }}</td>
                        <td style="border: 1px solid; text-align: center;">{{ $transaksi->tanggal_checkout }}</td>
                        <td style="border: 1px solid; text-align: center;">Rp . {{
                            number_format($transaksi->total_biaya) }}
                        </td>

                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>