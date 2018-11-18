<?php echo $header; ?>
   
<div class="containerPage">
         <div class="panel panel-default" id="panelProducts">
                <div class="panel-heading"><?php echo $this->lang->line('title_products'); ?></div>
  		        <div class="panel-body">
                    <table id="tableProducts" class="table table-striped cell-bordered table-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo $this->lang->line('title_table_products_code'); ?></th>
                                <th><?php echo $this->lang->line('title_table_products_name'); ?></th>
                                <th><?php echo $this->lang->line('title_table_products_dscp'); ?></th>
                            </tr>
                        </thead>
                        <tbody id="bodyTableProducts">
                            <!--                            -->
                        </tbody>
                    </table>   
                    
                </div>
        </div>
</div>



<script type="text/javascript" src="/application/resources/js/dataProduct.js"></script>
    
    
<?php echo $footer; ?>
