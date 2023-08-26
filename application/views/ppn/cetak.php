<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <style type="text/css">
    p {
        margin: 5px 0 0 0;
    }

    p.footer {
        text-align: right;
        font-size: 11px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
        display: block;
    }

    .bold {
        font-weight: bold;
    }

    #footer {
        clear: both;
        position: relative;
        height: 40px;
        margin-top: -40px;
    }
    </style>
</head>

<body style="font-size: 16px">
    <p align="center">
        <span style="font-size: 20px"><b>LAPORAN PEMBELIAN <br> CV. INDOGRAPH</b></span> <br>
    </p>
    <hr><br>
    <table style="border: 1px solid black;border-collapse: collapse;font-size: 18px" width="100%">
        <tr style="margin: 5px">
            <th style="border: 1px solid black;">No</th>
            <th style="border: 1px solid black;">Tanggal</th>
            <th style="border: 1px solid black;">Pajak Keluaran</th>
            <th style="border: 1px solid black;">Pajak Masukan</th>
            <th style="border: 1px solid black;">Bayar Pajak</th>
        </tr>
        <?php
        $no = 1;
        foreach ($ppn as $l) : ?>
        <tr style="margin: 5px">
            <td style="border: 1px solid black;" align="center"><?= $no++ ?></td>
            <td style="border: 1px solid black;" align="center"><?= $l->tanggal ?></td>
            <td style="border: 1px solid black;" align="center">Rp.<?= number_format($l->pajak_keluaran,'0','','.');?>
            </td>
            <td style="border: 1px solid black;" align="center">Rp.<?= number_format($l->pajak_masukan,'0','','.');?>
            </td>
            <td style="border: 1px solid black;" align="center">Rp.<?= number_format($l->bayar_pajak,'0','','.');?></td>
        </tr>
        <?php endforeach; ?>

    </table>
    </p>

    <br>
    <p>
        Demikian Laporan PPN ini dibuat dengan sebenar-benarnya, untuk diketahui dan digunakan dengan
        semestinya.</p>
    <p>
    <table width="100%">
        <tr>
            <td align="right">Diketahui oleh<br><br><br><br><br><u>(________________________)</u><br>Penanggungjawab
                CV. Indograph
            </td>
        </tr>
        <tr> <br><br>
            <td align="left">
                <h5><?= $label;?></h5>
            </td>
        </tr>
    </table>
    </p>
    <script type="text/javascript">
    window.print();
    </script>
    <p class="footer">
        <small>Tim Asset</small>
    </p>
</body>

</html>