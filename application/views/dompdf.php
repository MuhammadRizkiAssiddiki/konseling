<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="<?php echo base_url('assets/'); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <style>
      .line-title{
        border: 0;
        border-style: inset;
        border-top: 1px solid #000;
      }
    </style>
  </head>
  <body style="background-color:white">
    <img src="img/hpc.jpg" alt="" style="position: absolute; width:100px; height:auto;margin-left:90px;margin-top:-25px;">
    <table style="width:100%;">
      <tr>
        <td align="center">
          <span style="line-height:1.6;font-weight:bold;">
            HUMANIKA PSYCHOLOGY CENTER
            <br> PEKANBARU, RIAU
          </span>
          <br>
          <span>Jl. Arifin Ahmad No 4 Pekanbaru 28125 Pekanbaru</span>
        </td>
      </tr>
    </table>
    <hr class="line-title">

    <h4 align="center" style="line-height:1.6;font-weight:bold;text-decoration: underline"><?php echo $ket; ?></h4>

    <table class="table table-bordered" style="border: solid black 1px;" style="text-align:center">
      <thead style="text-align:center">
        <tr>

        <th style="text-align:center">No</th>
        <th style="text-align:center">No PMR</th>
        <th style="text-align:center">Nama Pasien</th>
        <th style="text-align:center">Tanggal PMR</th>
        <th style="text-align:center; width:150px;">keluhan</th>
        <th style="text-align:center; width:150px;">Observasi</th>
        <th style="text-align:center; width:150px;">Diagnosa</th>
        <th style="text-align:center; width:150px;">Treatment</th>

      </tr>
      </thead>
      <tbody>
        <?php $i=1; foreach ($data as $a): ?>
        <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo $a->nopmr; ?></td>
          <td style="text-align:justify;"><?php echo $a->namapasien; ?></td>
          <td style="text-align:justify;"><?php echo $a->tanggalpmr; ?></td>
          <td style="text-align:center;"><?php echo $a->keluhan; ?></td>
          <td style="text-align:center;"><?php echo $a->observasi; ?></td>
          <td style="text-align:center;"><?php echo $a->diagnosa; ?></td>
          <td style="text-align:center;"><?php echo $a->treatment; ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </body>
</html>
