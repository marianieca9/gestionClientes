<?php echo $header; ?>
   
<div class="containerPage">
         <div class="panel panel-default" id="panelClients">
                <div class="panel-heading"><?php echo $this->lang->line('title_clients'); ?></div>
  		        <div class="panel-body">
                    <table id="tableClients" class="table table-striped cell-bordered table-responsive" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><?php echo $this->lang->line('title_table_clients_name'); ?></th>
                                <th><?php echo $this->lang->line('title_table_clients_surname'); ?></th>
                                <th><?php echo $this->lang->line('title_table_clients_dni'); ?></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="bodyTableClients">
                            <!--                            -->
                        </tbody>
                    </table>   
                    
                </div>
        </div>
    
        <div class="modal" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content text-center">
                    <div class="modal-body">
                      <div class="row">
                          <div  class="col-xs-12">
                            <span class="glyphicon glyphicon-warning-sign iconModal" style="color: orange;"></span>
                            <label class="messageDelete msgModal"><?php echo $this->lang->line('modal_confirm_msg'); ?></label>
                          </div>
                      </div>
                    </div>
                   <div class="modal-footer">
                        <button type="button" class="btn btn-default btnModal" data-dismiss="modal" onclick="closeModal()"><?php echo $this->lang->line('modal_confirm_cancel'); ?></button>
                        <button type="button" class="btn btn-danger btnModal" onclick="confirmDeleteClient()"><?php echo $this->lang->line('modal_confirm_acept'); ?></button>
                   </div>

                </div> <!-- /.modal-content -->
            </div> <!-- /.modal-dialog -->
        </div> <!-- /.modal -->
</div>



<script type="text/javascript" src="/application/resources/js/client.js"></script>
    
    
<?php echo $footer; ?>
