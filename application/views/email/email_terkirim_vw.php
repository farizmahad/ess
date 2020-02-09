<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-content mailbox-content">
                    <div class="file-manager">

                        <button type="button" class="btn btn-block btn-primary compose-mail" data-toggle="modal" data-target="#myModal"> Email Baru</button>


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

                <form method="get" action="index.html" class="pull-right mail-search">
                    <div class="input-group">
                        <input type="text" class="form-control input-sm" name="search" placeholder="Search email">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-sm btn-primary">
                                Search
                            </button>
                        </div>
                    </div>
                </form>
                <h2>
                    Email Terkirim (<?php echo count($email_terkirim); ?>)
                </h2>
                <div class="mail-tools tooltip-demo m-t-md">
                    <div class="btn-group pull-right">
                        <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
                        <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>
                    </div>
                    <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="left" title="Refresh inbox"><i class="fa fa-refresh"></i> <a href="<?php echo base_url(); ?>email-terkirim"><font color="#000000">Refresh</font></a></button>

                    <button class="btn btn-white btn-sm" data-toggle="tooltip" data-placement="top" title="Move to trash"><i class="fa fa-trash-o"></i> </button>

                </div>
            </div>
            <div class="mail-box">

                <table class="table table-hover table-mail">
                    <tbody>
                    <?php foreach($email_terkirim as $mas) :?>


                        <tr <?php if($mas->status==0) { ?> class="unread" <?php }else{ ?>  class="read" <?php } ?>>
                        <td class="check-mail">
                            <input type="checkbox" class="i-checks">
                        </td>
                        <td class="mail-ontact"><a href="<?php echo base_url(); ?>lihat-email/<?php echo $mas->id_email; ?>"><?php $mas->first_name; ?> <?php echo " "; ?> <?php echo $mas->last_name; ?></a></td>
                        <td class="mail-subject"><a href="<?php echo base_url(); ?>lihat-email/<?php echo $mas->id_email; ?>"><?php echo $mas->subjek; ?></a></td>
                        <td class=""><i class="fa fa-paperclip"></i></td>
                        <td class="text-right mail-date"><?php echo $mas->tanggal; ?></td>
                    </tr>

                    <?php endforeach;?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Email Baru</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo base_url();?>Email/kirim_email">
                    <div class="form-group">
                        <label>Penerima</label>
                        <select class="form-control chosen-select" name="id_penerima">
                            <option value="">Tulis Penerima</option>
                             <?php foreach($users as $us):?>
                            <option value="<?php echo $us->email; ?>|<?php echo $us->id; ?>"> <?php echo $us->first_name; ?> <?php echo " "; ?><?php echo $us->last_name; ?></option>
                            <?php endforeach;?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label>Subjek</label>
                        <input type="text" class="form-control" name="subjek" placeholder="Subjek" required oninvalid="this.setCustomValidity('Nama kategori barang')" oninput="setCustomValidity('')">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <textarea class="form-control" cols="10" rows="6" name="isi_email"></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"> <i class="fa fa-close"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tutup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                <button type="submit" class="btn btn-sm btn-primary"> <i class="fa fa-save"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Simpan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
            </div>
            </form>
        </div>
    </div>
</div>


<script>
    $('.chosen-select').chosen({width: "100%"});
    $("#ionrange_1").ionRangeSlider({
        min: 0,
        max: 5000,
        type: 'double',
        prefix: "$",
        maxPostfix: "+",
        prettify: false,
        hasGrid: true
    });

</script>