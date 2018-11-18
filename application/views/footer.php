<div class="footer">
  <div class="footer-inner">
    <div class="container-fluid">
      <div class="row">
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </div>
  <!-- /footer-inner -->
</div>
<!-- /footer -->

<!-- remote modals -->
<div id="loading-modal">
    <div class="modal fade" id="loadingModal" role="dialog"  aria-labelledby="loadingModal" aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-body">
                    <div class="loader"></div>
               </div>
            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal -->
</div>


<div id="error-modals">
    <div class="modal fade" id="errorModal" role="dialog" aria-labelledby="errorModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-body">
                  <div class="row">
                    <div  class="col-xs-2">
                        <i class="fa fa-times-circle fa-3x" aria-hidden="true"></i>
                    </div>
                      <div  class="col-xs-10">
                        <p class="messageError"><?php echo $this->lang->line('modal_error_msg'); ?></p>
                      </div>
                  </div>
               </div>
               <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->lang->line('modal_confirm_acept'); ?></button>
               </div>

            </div> <!-- /.modal-content -->
        </div> <!-- /.modal-dialog -->
    </div> <!-- /.modal -->
</div>

</body>



</html>
