<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            color: #555;
        }
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        .invoice-box table td {
            padding: 5px;
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
        .unpaid {
            color: red;
            font-weight: bold;
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
                            <td class="title">
                                <img src="{{ asset('path/to/logo.png') }}" style="width:100%; max-width:300px;">
                            </td>
                            <td>
                                Invoice #: {{ $reservasi->id }}<br>
                                Created: {{ \Carbon\Carbon::now()->format('d/m/Y') }}<br>
                                Due: {{ \Carbon\Carbon::now()->addDays(7)->format('d/m/Y') }}
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
                                PT Deneva<br>
                                Genius Idea Coworking And Office Space Yogyakarta<br>
                                Jl. Magelang, Cokrodiningratan, Jetis, Kota Yogyakarta<br>
                                Daerah Istimewa Yogyakarta, 55233<br>
                                NPWP: 80.820.685.8-542.000
                            </td>
                            <td>
                                {{ $reservasi->nama_pemesan }}<br>
                                {{ $reservasi->alamat }}<br>
                                {{ $reservasi->telepon }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>Description</td>
                <td>Total</td>
            </tr>
            <tr class="item">
                <td>{{ $reservasi->nama_mobil }}({{ $reservasi->tanggalpesan_start }} - {{ $reservasi->tanggalpesan_end }})</td>
                <td>Rp {{ number_format($reservasi->harga) }}</td>
            </tr>
          
            <tr class="total">
                <td></td>
                <td>Sub Total: Rp {{ number_format($reservasi->harga) }}</td>
            </tr>
          
            <tr class="total">
                <td></td>
                <td>Total: Rp {{ number_format(($reservasi->harga) ) }}</td>
            </tr>
        </table>
        <a href="{{ url()->previous() }}" class="back-button">Kembali</a>
    </div>
</body>
</html>
