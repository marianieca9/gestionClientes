<?php echo $header; ?>
   
<div class="containerPage">
         <div class="panel panel-default" id="panelProducts">
                <div class="panel-heading"></div>
  		        <div class="panel-body">
                    <div class="divFirstRelProductsClients">
                        <div class="col-sm-12 col-md-12 col-lg-5">
                            <h5 class="titleListRel"><?php echo $this->lang->line('title_table_rel_first'); ?></h5>
                            <table id="tableRelProductClient" class="table table-striped cell-bordered table-responsive" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('title_table_products_code'); ?></th>
                                        <th><?php echo $this->lang->line('title_table_products_name'); ?></th>
                                    </tr>
                                </thead>
                                <tbody id="bodyTableRelProductClient">
                                    <!--                            -->
                                </tbody>
                            </table> 
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-2 divArrowUpDown" style="text-align: center;">
                            <a href="#" onclick="upNewProduct()"><span class="glyphicon glyphicon-arrow-up arrowChangeTable"></span></a>
                            <a href="#" onclick="downProduct()"><span class="glyphicon glyphicon-arrow-down arrowChangeTable"></span></a>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-2 divArrowLeftRight" style="text-align: center;">
                            <a href="#" onclick="upNewProduct()" style="display: block;"><span class="glyphicon glyphicon-arrow-left arrowChangeTable"></span></a>
                            <a href="#" onclick="downProduct()"  style="display: block;"><span class="glyphicon glyphicon-arrow-right arrowChangeTable"></span></a>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-5">
                            <h5 class="titleListRel"><?php echo $this->lang->line('title_table_rel_two'); ?></h5>
                            <table id="tableRelProductNoClient" class="table table-striped cell-bordered table-responsive" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th><?php echo $this->lang->line('title_table_products_code'); ?></th>
                                        <th><?php echo $this->lang->line('title_table_products_name'); ?></th>
                                    </tr>
                                </thead>
                                <tbody id="bodyTableRelProductNoClient">
                                    <!--                            -->
                                </tbody>
                            </table> 
                        </div>
                        
                        <div class="col-lg-12 col-md-12 col-xs-12 divInputData">
                                <button type="button" class="btn btn-default btn-default-center" onclick="saveDataCP()"><?php echo $this->lang->line('btn_save'); ?></button>
                        </div>
                        
                        <form id="formprodclient" style="display:none;">
                           <input type="text" id="dniClient" name="dniClient" value="<?php echo $dni; ?>" style="display:none;">
                           <select name="selectProducts[]" id="selectProducts" style="display:none;" multiple></select>
                        </form>
                    </div>
                </div>
        </div>
</div>

<script type="text/javascript" src="/application/resources/js/rel_client_product.js"></script>
    
    
<?php echo $footer; ?>
