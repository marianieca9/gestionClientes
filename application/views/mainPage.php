<?php echo $header; ?>
<!-- Page Content -->
            <div class="container-fluid" id="mainpage">
                <div class="row">
                    <div class="col-lg-8 col-md-10 col-xs-12" id="boxMainPage">
                        <form action="/product/chargeFile" method="post" enctype="multipart/form-data">
                            <input id="filUpload" type="file" name="file" style="margin: auto;"/>
                        </form>
                        <a href="/product/list" class="linkCenter"><?php echo $this->lang->line('txt_without_data'); ?></a>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        
<script type="text/javascript" src="/application/resources/js/product.js"></script>

<?php echo $footer; ?>

