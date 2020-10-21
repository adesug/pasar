
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Receipt</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <style>
    @page { size: 58mm 100mm } /* output size */
    body.receipt .sheet { width: 58mm; height: 100mm } /* sheet size */
    @media print { body.receipt { width: 58mm } } /* fix for Chrome */
  </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body onclick="window.print();">

  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-0mm">

    <table border="1">
            <tr>
                <td colspan="3"><h4>Bukti Transaksi</h4></td>
            </tr>
            <tr>
                <td>Nomor Invoice</td>
                <td>Nomor Invoice</td>
            </tr> 
            <tr>
                <td>Nomor Invoice</td>
                <td>Nomor Invoice</td>
            </tr> 
            <tr>
                <td>Nomor Invoice</td>
                <td>Nomor Invoice</td>
            </tr> 
            <tr>
                <td>Nomor Invoice</td>
                <td>Nomor Invoice</td>
            </tr> 
            <tr>
                <td>Nomor Invoice</td>
                <td>Nomor Invoice</td>
            </tr> 
           
        </table>

  </section>

</body>

</html>