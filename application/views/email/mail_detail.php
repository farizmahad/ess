<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-content mailbox-content">
                    <div class="file-manager">
                        <a class="btn btn-block btn-primary compose-mail" href="mail_compose.html">Email Baru</a>
                        <div class="space-25"></div>
                        <h5>Folders</h5>
                        <ul class="folder-list m-b-md" style="padding: 0">
                            <li><a href="<?php echo base_url(); ?>kotak-masuk"> <i class="fa fa-inbox "></i> Kotak masuk <span class="label label-warning pull-right"><?php echo count($email_masuk); ?></span> </a></li>
                            <li><a href="<?php echo base_url(); ?>email-terkirim"> <i class="fa fa-envelope-o"></i> Email terkirim <span class="label label-danger pull-right"><?php echo count($email_terkirim); ?></span></a></li>

                        </ul>


                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 animated fadeInRight">
            <div class="mail-box-header">
                <div class="pull-right tooltip-demo">
                    <a href="mail_compose.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Reply"><i class="fa fa-reply"></i> Reply</a>
                    <a href="#" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Print email"><i class="fa fa-print"></i> </a>
                    <a href="mailbox.html" class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </a>
                </div>
                <?php foreach($email_detail as $em): ?>
                <h2>
                   Lihat Pesan
                </h2>
                <div class="mail-tools tooltip-demo m-t-md">


                    <h3>
                        <span class="font-normal">Subjek: </span> <?php echo $em->subjek; ?>.
                    </h3>
                    <h5>
                        <span class="pull-right font-normal"><?php echo date('d F Y', strtotime($em->tanggal)); ?></span>
                        <span class="font-normal">Dari: </span>

                         <?php
                         $pengirim=$em->id_pengirim;
                           $cek_email=$this->Email_model->cek_email_pengirim($pengirim);

                           foreach($cek_email as $ce){
                         ?>


                       <?php echo $ce->email;?>

                        <?php } ?>
                    </h5>
                </div>
            </div>
            <div class="mail-box">


                <div class="mail-body">
                    <p>
                     <?php echo $em->isi_email; ?>
                    </p>
                </div>


                <div class="mail-body text-right tooltip-demo">
                    <a class="btn btn-sm btn-white" href="mail_compose.html"><i class="fa fa-reply"></i> Reply</a>
                    <a class="btn btn-sm btn-white" href="mail_compose.html"><i class="fa fa-arrow-right"></i> Forward</a>
                    <button title="" data-placement="top" data-toggle="tooltip" type="button" data-original-title="Print" class="btn btn-sm btn-white"><i class="fa fa-print"></i> Print</button>
                    <button title="" data-placement="top" data-toggle="tooltip" data-original-title="Trash" class="btn btn-sm btn-white"><i class="fa fa-trash-o"></i> Remove</button>
                </div>
                <div class="clearfix"></div>

<?php endforeach;?>
            </div>
        </div>
    </div>
</div>