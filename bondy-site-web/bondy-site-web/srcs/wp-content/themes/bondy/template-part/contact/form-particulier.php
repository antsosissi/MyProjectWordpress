<!-- form particulier -->
<div class="form-particulier-content navTabsAccordion-bloc">
	<nav class="nav-tabs-list">
	 	<ul id="tabsParticulier" class="tabsParticulier nav nav-tabs" role="tablist">
            <li class="nav-item active">
                <a href="#tabForm-particulier-1" class="nav-link <?php if ( !$benevole && !$informationBondy ):?>active<?php endif;?>" id="tabLink-particulier-1" data-toggle="tab" role="tab" aria-controls="tabForm-particulier-1" aria-selected="true">
                    <i class="icobnd-develop-land"></i>
                    <span class="txt">J'ai un terrain que je veux valoriser</span>
                    <span class="angle">
                        <i class="icobnd-chevron-down"></i>
                        <i class="icobnd-angle-down"></i>
                    </span>
                    <span class="circle-toggle">
	                  <span class="horizontal"></span>
	                  <span class="vertical"></span>
	              </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#tabForm-particulier-2" class="nav-link <?php if ( $benevole ):?>active<?php endif;?>" id="tabLink-particulier-2" data-toggle="tab" role="tab" aria-controls="tabForm-particulier-2" aria-selected="false">
                    <i class="icobnd-volunteers"></i>
                    <span class="txt"><span class="text-vert">Bénévoles :</span> investir dans l’environnement et contribuer</span>
                    <span class="angle">
                        <i class="icobnd-chevron-down"></i>
                        <i class="icobnd-angle-down"></i>
                    </span>
                    <span class="circle-toggle">
	                  <span class="horizontal"></span>
	                  <span class="vertical"></span>
	              </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#tabForm-particulier-3" class="nav-link <?php if ( $informationBondy ):?>active<?php endif;?>" id="tabLink-particulier-3" data-toggle="tab" role="tab" aria-controls="tabForm-particulier-3" aria-selected="false">
                    <i class="icon-img icon-bondy"><img src="<?php echo get_template_directory_uri()?>/assets/images/logo-bondy-vh-210.png" alt="Bôndy"></i>
                    <span class="txt">Je souhaite avoir des informations sur Bôndy</span>
                    <span class="angle">
                        <i class="icobnd-chevron-down"></i>
                        <i class="icobnd-angle-down"></i>
                    </span>
                    <span class="circle-toggle">
	                  <span class="horizontal"></span>
	                  <span class="vertical"></span>
	              </span>
                </a>
            </li>
	    </ul>
	</nav>

	<div id="form-tabContent" class="tab-content tab-content-particulier" role="tablist">
		<p class="required-label"><span class="required">*</span>champ obligatoire</p>

		<div class="tab-pane fade <?php if ( !$benevole && !$informationBondy ):?>show active<?php endif;?>" id="tabForm-particulier-1" role="tabpanel" aria-labelledby="tabLink-particulier-1">
			<div class="card-header" role="tab" id="head-collapse-part-1">
                <h5 class="card-title">
                    <a class="card-title-link" data-toggle="collapse" href="#content-collapse-part-1" data-parent="#form-tabContent" aria-expanded="true" aria-controls="content-collapse-part-1">
                        <i class="icobnd-develop-land"></i>
	                    <span>J'ai un terrain que je veux valoriser</span>
	                    <span class="circle-toggle">
		                	<span class="horizontal"></span>
		                	<span class="vertical"></span>
		              	</span>
                    </a>
                </h5>
            </div>
            <div id="content-collapse-part-1" class="collapse show" role="tabpanel" aria-labelledby="head-collapse-part-1"  data-parent="#form-tabContent">
                <div class="card-body">
                    <?php
			            $array_ID_Captc = [$form_terrain_valoriser_id,$bondy_options['google_captcha_key_public']];
			            set_query_var( 'dataArray', $array_ID_Captc );
			            get_template_part('template-part/contact/particulier/form-terrain-valoriser');
		            ?>
                </div>
            </div>
        </div>
		<div class="tab-pane fade <?php if ( $benevole ):?>show active<?php endif;?>" id="tabForm-particulier-2" role="tabpanel" aria-labelledby="tabLink-particulier-2">
			<div class="card-header" role="tab" id="head-collapse-part-2">
                <h5 class="card-title">
                    <a class="card-title-link" data-toggle="collapse" href="#content-collapse-part-2" data-parent="#form-tabContent" aria-expanded="false" aria-controls="content-collapse-part-2">
                        <i class="icobnd-volunteers"></i>
	                    <span><span class="text-vert">Bénévoles :</span> investir dans l’environnement et contribuer</span>
	                    <span class="circle-toggle">
		                	<span class="horizontal"></span>
		                	<span class="vertical"></span>
		              </span>
                    </a>
                </h5>
            </div>
            <div id="content-collapse-part-2" class="collapse" role="tabpanel" aria-labelledby="head-collapse-part-2" data-parent="#form-tabContent">
                <div class="card-body">
		            <?php
			            $array_ID_Captc = [$form_contact_benevol_id,$bondy_options['google_captcha_key_public']];
			            set_query_var( 'dataArray', $array_ID_Captc );
			            get_template_part('template-part/contact/particulier/form-contact-benevole');
		            ?>
		        </div>
		    </div>
		</div>
		<div class="tab-pane fade <?php if ( $informationBondy ):?>show active<?php endif;?>" id="tabForm-particulier-3" role="tabpanel" aria-labelledby="tabLink-particulier-3">
			<div class="card-header" role="tab" id="head-collapse-part-3">
				<h5 class="card-title">
		            <a class="card-title-link" data-toggle="collapse" href="#content-collapse-part-3" data-parent="#form-tabContent" aria-expanded="false" aria-controls="content-collapse-part-3">
		                <i class="icon-img icon-bondy"><img src="<?php echo get_template_directory_uri()?>/assets/images/logo-bondy-vh-210.png" alt="Bôndy"></i>
	                    <span>Je souhaite avoir des informations sur Bôndy</span>
	                    <span class="circle-toggle">
		                	<span class="horizontal"></span>
		                	<span class="vertical"></span>
		              	</span>
		            </a>
		        </h5>
		    </div>
	        <div id="content-collapse-part-3" class="collapse" role="tabpanel" aria-labelledby="head-collapse-part-3"  data-parent="#form-tabContent">
	        	<div class="card-body">
		            <?php
			            $array_ID_Captc = [$form_contact_particulier_id,$bondy_options['google_captcha_key_public']];
			            set_query_var( 'dataArray', $array_ID_Captc );
			            get_template_part('template-part/contact/particulier/form-contact-particulier');
		            ?>
		        </div>
	        </div>
		</div>
	</div>
</div>

<!-- /form particulier -->

