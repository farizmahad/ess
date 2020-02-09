<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ess_prototype</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arvo">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/smoothproducts.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
</head>

<body>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-6">
                    <div>
                        <h5 class="text-center p-3"><strong>Konfirmasi Purchase Request</strong></h5>
                        <p class="text-center text-size"><strong>No. PR</strong>: ...</p>
                        <p class="p-2 text-size">Dear Bapak / Ibu General Manager,<br><br>Berikut merupakan permintaan Purchase Request yang perlu dikonfirmasi oleh Anda.</p>
                        <div class="table-responsive text-size">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td><strong>Tanggal</strong></td>
                                        <td>...</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nama Pemohon</strong></td>
                                        <td>...</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Divisi</strong></td>
                                        <td>...</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Jabatan</strong></td>
                                        <td>...</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tgl. Permintaan</strong></td>
                                        <td>...</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Tgl. Dibutuhkan</strong></td>
                                        <td>...</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Jenis Permintaan</strong></td>
                                        <td>...</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Keterangan</strong></td>
                                        <td>...</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status Terakhir</strong></td>
                                        <td>...</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Lampiran</strong></td>
                                        <td>...</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Metode Pembayaran</strong></td>
                                        <td>...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive text-size mt-4 mb-4">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>Permintaan</th>
                                        <th class="text-center">Qty</th>
                                        <th>Harga</th>
                                        <th>Subtotal</th>
                                        <th>Vendor</th>
                                        <th>Penerima</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><strong>Total</strong></td>
                                        <td colspan="6">...</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><strong>PPN</strong></td>
                                        <td colspan="6">...</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><strong>Total Keseluruhan</strong></td>
                                        <td colspan="6">...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-xl-6">
                    <div>
                        <form>
                            <div class="form-row">
                                <div class="col-12 col-xl-12">
                                    <div class="form-group"><label><strong>Status Konfirmasi:</strong></label></div>
                                </div>
                                <div class="col-12 col-xl-12">
                                    <div class="form-group">
                                        <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label text-primary" for="formCheck-1"><strong>DITERIMA</strong></label></div>
                                        <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label text-warning" for="formCheck-1"><strong>DIREVISI</strong></label></div>
                                        <div class="form-check form-check-inline"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label text-danger" for="formCheck-1"><strong>DITOLAK</strong></label></div>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-12">
                                    <div class="form-group"><label><strong>Catatan</strong>:</label><textarea class="form-control"></textarea></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row no-gutters justify-content-center mb-3">
                <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-2">
                    <div><button class="btn btn-primary btn-block" type="button"><span><i class="fas fa-check-circle icon-size"></i></span><span><br>Selesai</span></button></div>
                </div>
            </div>
        </div>
    </section>
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/smoothproducts.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/theme.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/styles.js"></script>
</body>

</html>