<?php echo $header; ?>

<div class="containerPage">
         <div class="panel panel-default" id="panelDataClients">
                <div class="panel-heading"><?php echo $this->lang->line('title_data_clients'); ?></div>
  		        <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <strong class="txtmsgerror" id="errorDataClient"></strong>
                        </div>
                    </div>
                    <form id="formDataClient">
                        <input type="text" id="dniClient" name="dniClient" value="<?php echo $dniOld; ?>" style="display:none;">
                        <div class="row">
                            <!-- Name -->
                            <div class="col-lg-6 col-md-8 col-xs-12 divInputData">
                                <div class="form-group">
                                    <?php if($client!='' && $client[0]!='' && $client[0]->name!=''){ ?>
                                        <input type="text" id="inputName" name="inputName" class="form-control" value="<?php echo $client[0]->name; ?>" required>
                                    <?php }else {?>
                                        <input type="text" id="inputName" name="inputName" class="form-control" required>
                                    <?php }?>
                                    <label class="form-control-placeholder" for="inputName"><?php echo $this->lang->line('input_name_client_txt'); ?></label>
                                </div>
                            </div>
                            <!-- Surname -->
                            <div class="col-lg-6 col-md-8 col-xs-12 divInputData">
                                <div class="form-group">
                                    <?php if($client!='' && $client[0]!='' && $client[0]->surname!=''){ ?>
                                        <input type="text" id="inputSurname" name="inputSurname" class="form-control" value="<?php echo $client[0]->surname; ?>" required>
                                    <?php }else {?>
                                        <input type="text" id="inputSurname" name="inputSurname" class="form-control" required>
                                    <?php }?>
                                    <label class="form-control-placeholder" for="inputSurname"><?php echo $this->lang->line('input_surname_client_txt'); ?></label>
                                </div>
                            </div>
                            <!-- DNI -->
                            <div class="col-lg-4 col-md-6 col-xs-12 divInputData">
                                <div class="form-group">
                                    <?php if($client!='' && $client[0]!='' && $client[0]->dni!=''){ ?>
                                        <input type="text" id="inputDni" name="inputDni" class="form-control" value="<?php echo $client[0]->dni; ?>" required>
                                    <?php }else {?>
                                        <input type="text" id="inputDni" name="inputDni" class="form-control" required>
                                    <?php }?>
                                    <label class="form-control-placeholder" for="inputDni"><?php echo $this->lang->line('input_dni_client_txt'); ?></label>
                                </div>
                            </div>
                            <!-- Address -->
                            <div class="col-lg-8 col-md-10 col-xs-12 divInputData">
                                <div class="form-group">
                                    <?php if($client!='' && $client[0]!='' && $client[0]->address!=''){ ?>
                                        <input type="text" id="inputAddress" name="inputAddress" class="form-control" value="<?php echo $client[0]->address; ?>" required>
                                    <?php }else {?>
                                        <input type="text" id="inputAddress" name="inputAddress" class="form-control" required>
                                    <?php }?>
                                    <label class="form-control-placeholder" for="inputAddress"><?php echo $this->lang->line('input_address_client_txt'); ?></label>
                                </div>
                            </div>
                            <!-- Phone -->
                            <div class="col-lg-4 col-md-6 col-xs-12 divInputData">
                                <div class="form-group">
                                    <?php if($client!='' && $client[0]!='' && $client[0]->phone!=''){ ?>
                                        <input type="tel" id="inputPhone" name="inputPhone" class="form-control" value="<?php echo $client[0]->phone; ?>" required>
                                    <?php }else {?>
                                        <input type="tel" id="inputPhone" name="inputPhone" class="form-control" required>
                                    <?php }?>
                                    <label class="form-control-placeholder" for="inputPhone"><?php echo $this->lang->line('input_phone_client_txt'); ?></label>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="col-lg-4 col-md-6 col-xs-12 divInputData">
                                <div class="form-group">
                                    <?php if($client!='' && $client[0]!='' && $client[0]->email!=''){ ?>
                                        <input type="email" id="inputEmail" name="inputEmail" class="form-control" value="<?php echo $client[0]->email; ?>" required>
                                    <?php }else {?>
                                        <input type="email" id="inputEmail" name="inputEmail" class="form-control" required>
                                    <?php }?>
                                    <label class="form-control-placeholder" for="inputEmail"><?php echo $this->lang->line('input_email_client_txt'); ?></label>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-xs-12 divInputData">
                                <button type="button" class="btn btn-default btn-default-center" onclick="saveDataClient()"><?php echo $this->lang->line('btn_save'); ?></button>
                            </div>
                        </div>
                    <!-- /.row -->
                    </form>
                    
                </div>
        </div>
</div>

<script type="text/javascript" src="/application/resources/js/dataClient.js"></script>
    

<?php echo $footer; ?>

