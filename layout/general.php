<?php

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));
$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$showsidepost = ($hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT));

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($showsidepost) {
    $bodyclasses[] = 'side-post-only';
} else if (!$showsidepost) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has-custom-menu';
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
<!--
        ETH-LET-Theme for Moodle 2.2

        © 2012 by GRiDDS GmbH, ch-8606 Greifensee, Fon +41 (0)44 994 50 00
        Web: http://www.gridds.com - Mailto:contact@gridds.com  - Skype:gridds ***
        Don't hesistate to contact us for your professional OpenSource requirements
-->

    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
</head>

<body id="<?php echo $PAGE->bodyid ?>" class="<?php echo $PAGE->bodyclasses.' '.join(' ', $bodyclasses) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page-wrapper">

<?php if ($hascustommenu) { ?>
<div id="custommenu"><?php echo $custommenu; ?></div>
<?php } ?>

<div id="page">

    	<?php if ($hasheading || $hasnavbar) { ?>

		<!-- START OF HEADER -->
		
		<?php if ($hasheading) { ?>
        	<div id="page-header">
        		<div class="headermenu"><?php
                 	echo $OUTPUT->login_info();
                    if (!empty($PAGE->layout_options['langmenu'])) {
                    	echo $OUTPUT->lang_menu();
                 	}
                 	echo $OUTPUT->lang_menu();
                  	echo $PAGE->headingmenu ?>
            	</div>
            	<h1 class="headermain"><div class="headTitle"><?php echo $PAGE->heading ?></div></h1>
          	</div>
       	<?php } ?>
		
		<?php if ($hasnavbar) { ?>
      		<div class="navbar">
             	<div class="wrapper clearfix">
                  	<div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
               		<div class="navbutton"> <?php echo $PAGE->button; ?></div>
         		</div>
       		</div>
        <?php } ?>

		<!-- END OF HEADER -->

    	<?php } ?>


		<!-- START OF CONTENT -->

        <div id="page-content-wrapper" class="wrapper clearfix">
            <div id="page-content">
            
            	<?php if($hassidepre && $showsidepost) { ?>
            	
            	<div id="column-main-outer" class="layout-3-column">
            		<div id="column-left-outer" class="layout-3-column">
		               	<div id="column-main-wrap" class="layout-3-column">
		             		<div id="column-main" class="layout-3-column">
		               			<div class="column-content layout-3-column">
		                  			<?php echo core_renderer::MAIN_CONTENT_TOKEN; ?>
		              			</div>
		             		</div>
		              	</div>
		                <div id="column-left" class="block-column layout-3-column">
		                    <div class="column-content layout-3-column">
		                        <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
		                    </div>
		                </div>
			                <div id="column-right" class="block-column layout-3-column">
		                    <div class="column-content layout-3-column">
		                        <?php echo $OUTPUT->blocks_for_region('side-post') ?>
		                    </div>
		                </div>
		   			</div>
		  		</div>
            			
            	<?php } else if($hassidepre && !$showsidepost) { ?>
            	
            	<div id="column-main-outer" class="layout-2-column-left">
            		<div id="column-left-outer" class="layout-2-column-left">
		               	<div id="column-main-wrap" class="layout-2-column-left">
		             		<div id="column-main" class="layout-2-column-left">
		               			<div class="column-content layout-2-column-left">
		                  			<?php echo core_renderer::MAIN_CONTENT_TOKEN; ?>
		              			</div>
		             		</div>
		              	</div>
		                <div id="column-left" class="block-column layout-2-column-left">
		                    <div class="column-content layout-2-column-left">
		                        <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
		                    </div>
		                </div>
		   			</div>
		  		</div>
            	
            	
            	
            	<?php 	} else if(!$hassidepre && $showsidepost) { ?>
            	
            		<div id="column-left-outer" class="layout-2-column-right">
		               	<div id="column-main-wrap" class="layout-2-column-right">
		             		<div id="column-main" class="layout-2-column-right">
		               			<div class="column-content layout-2-column-right">
		                  			<?php echo core_renderer::MAIN_CONTENT_TOKEN; ?>
		              			</div>
		             		</div>
		              	</div>
		                <div id="column-right" class="block-column layout-2-column-right">
		                    <div class="column-content layout-2-column-right">
		                        <?php echo $OUTPUT->blocks_for_region('side-pre') ?>
		                    </div>
		                </div>
		   			</div>
		  		</div>	
            	
            	
            	<?php 	} else { 
            		echo core_renderer::MAIN_CONTENT_TOKEN;
            		
            		} ?>
		  		
            </div>
        </div>

		<!-- END OF CONTENT -->

        <?php if ($hasfooter) { ?>
        
        	<!-- START OF FOOTER -->
        
            <div id="page-footer" class="wrapper">
                <p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>
                <?php
                    echo $OUTPUT->login_info();
                    echo $OUTPUT->home_link();
                    echo $OUTPUT->standard_footer_html();
                ?>
            </div>
            
            <!-- END OF FOOTER -->
            
        <?php } ?>

</div>
</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>
</body>
</html>
